/*
 * Copyright (c) Facebook, Inc. and its affiliates.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

#include <algorithm>

#include <openssl/sha.h>

#include <thrift/compiler/lib/cpp2/util.h>
#include <thrift/compiler/util.h>

#include <boost/algorithm/string/join.hpp>
#include <boost/algorithm/string/split.hpp>
#include <thrift/compiler/ast/t_list.h>
#include <thrift/compiler/ast/t_map.h>
#include <thrift/compiler/ast/t_set.h>
#include <thrift/compiler/ast/t_struct.h>

namespace apache {
namespace thrift {
namespace compiler {
namespace cpp2 {

static bool is_dot(char const c) {
  return c == '.';
}

std::vector<std::string> get_gen_namespace_components(
    t_program const& program) {
  auto const& cpp2 = program.get_namespace("cpp2");
  auto const& cpp = program.get_namespace("cpp");

  std::vector<std::string> components;

  if (!cpp2.empty()) {
    boost::algorithm::split(components, cpp2, is_dot);
  } else if (!cpp.empty()) {
    boost::algorithm::split(components, cpp, is_dot);
    components.push_back("cpp2");
  } else {
    components.push_back("cpp2");
  }

  return components;
}

std::string get_gen_namespace(t_program const& program) {
  auto const components = get_gen_namespace_components(program);
  return "::" + boost::algorithm::join(components, "::");
}

bool is_orderable(
    std::unordered_set<t_type const*>& seen,
    std::unordered_map<t_type const*, bool>& memo,
    t_type const& type) {
  bool has_disqualifying_annotation = type.has_annotation({
      "cpp.template",
      "cpp2.template",
      "cpp.type",
      "cpp2.type",
  });
  auto memo_it = memo.find(&type);
  if (memo_it != memo.end()) {
    return memo_it->second;
  }
  if (!seen.insert(&type).second) {
    return true;
  }
  auto g = make_scope_guard([&] { seen.erase(&type); });
  // TODO: Consider why typedef is not resolved in this method
  if (type.is_base_type()) {
    return true;
  }
  if (type.is_enum()) {
    return true;
  }
  bool result = false;
  auto g2 = make_scope_guard([&] { memo[&type] = result; });
  if (type.is_typedef()) {
    auto const& real = [&]() -> auto&& {
      return *type.get_true_type();
    };
    auto const& next = *(dynamic_cast<t_typedef const&>(type).get_type());
    return result = is_orderable(seen, memo, next) &&
        (!(real().is_set() || real().is_map()) ||
         !has_disqualifying_annotation);
  }
  if (type.is_struct() || type.is_xception()) {
    const auto& as_sturct = static_cast<t_struct const&>(type);
    return result = std::all_of(
               as_sturct.fields().begin(),
               as_sturct.fields().end(),
               [&](auto f) {
                 return is_orderable(seen, memo, *(f->get_type()));
               });
  }
  if (type.is_list()) {
    return result = is_orderable(
               seen,
               memo,
               *(dynamic_cast<t_list const&>(type).get_elem_type()));
  }
  if (type.is_set()) {
    return result = !has_disqualifying_annotation &&
        is_orderable(
               seen, memo, *(dynamic_cast<t_set const&>(type).get_elem_type()));
  }
  if (type.is_map()) {
    return result = !has_disqualifying_annotation &&
        is_orderable(
               seen,
               memo,
               *(dynamic_cast<t_map const&>(type).get_key_type())) &&
        is_orderable(
               seen, memo, *(dynamic_cast<t_map const&>(type).get_val_type()));
  }
  return false;
}

bool is_orderable(t_type const& type) {
  std::unordered_set<t_type const*> seen;
  std::unordered_map<t_type const*, bool> memo;
  return is_orderable(seen, memo, type);
}

std::string const& get_type(const t_type* type) {
  return type->get_annotation({"cpp.type", "cpp2.type"});
}

bool is_implicit_ref(const t_type* type) {
  auto const* resolved_typedef = type->get_true_type();
  return resolved_typedef != nullptr && resolved_typedef->is_binary() &&
      get_type(resolved_typedef).find("std::unique_ptr") != std::string::npos &&
      get_type(resolved_typedef).find("folly::IOBuf") != std::string::npos;
}

bool is_explicit_ref(const t_field* f) {
  return f->has_annotation(
      {"cpp.ref", "cpp2.ref", "cpp.ref_type", "cpp2.ref_type"});
}

std::string const& get_ref_type(const t_field* f) {
  return f->get_annotation({"cpp.ref_type", "cpp2.ref_type"});
}

bool is_unique_ref(const t_field* f) {
  return f->has_annotation({"cpp.ref", "cpp2.ref"}) ||
      get_ref_type(f) == "unique";
}

bool is_stack_arguments(
    std::map<std::string, std::string> const& options,
    t_function const& function) {
  if (function.has_annotation("cpp.stack_arguments")) {
    return function.get_annotation("cpp.stack_arguments") != "0";
  }
  return options.count("stack_arguments");
}

int32_t get_split_count(std::map<std::string, std::string> const& options) {
  auto iter = options.find("types_cpp_splits");
  if (iter == options.end()) {
    return 0;
  }
  return std::stoi(iter->second);
}

bool is_mixin(const t_field& field) {
  return field.has_annotation("cpp.mixin");
}

static void get_mixins_and_members_impl(
    const t_struct& strct,
    const t_field* top_level_mixin,
    std::vector<mixin_member>& out) {
  for (const auto* member : strct.fields()) {
    if (is_mixin(*member)) {
      assert(member->get_type()->get_true_type()->is_struct());
      auto mixin_struct =
          static_cast<const t_struct*>(member->get_type()->get_true_type());
      auto mixin = top_level_mixin ? top_level_mixin : member;

      // import members from mixin field
      for (const auto* member_from_mixin : mixin_struct->fields()) {
        out.push_back({mixin, member_from_mixin});
      }

      // import members from nested mixin field
      get_mixins_and_members_impl(*mixin_struct, mixin, out);
    }
  }
}

std::vector<mixin_member> get_mixins_and_members(const t_struct& strct) {
  std::vector<mixin_member> ret;
  get_mixins_and_members_impl(strct, nullptr, ret);
  return ret;
}

namespace {

struct get_gen_type_class_options {
  bool gen_indirection = false;
  bool gen_indirection_inner_ = false;
};

std::string get_gen_type_class_(
    t_type const& type_,
    get_gen_type_class_options opts) {
  std::string const ns = "::apache::thrift::";
  std::string const tc = ns + "type_class::";

  auto const& type = *type_.get_true_type();

  bool const ind = type.has_annotation("cpp.indirection");
  if (ind && opts.gen_indirection && !opts.gen_indirection_inner_) {
    opts.gen_indirection_inner_ = true;
    auto const inner = get_gen_type_class_(type_, opts);
    auto const tag = ns + "detail::indirection_tag";
    auto const fun = ns + "detail::apply_indirection_fn";
    return tag + "<" + inner + ", " + fun + ">";
  }
  opts.gen_indirection_inner_ = false;

  if (type.is_void()) {
    return tc + "nothing";
  } else if (type.is_bool() || type.is_byte() || type.is_any_int()) {
    return tc + "integral";
  } else if (type.is_floating_point()) {
    return tc + "floating_point";
  } else if (type.is_enum()) {
    return tc + "enumeration";
  } else if (type.is_string()) {
    return tc + "string";
  } else if (type.is_binary()) {
    return tc + "binary";
  } else if (type.is_list()) {
    auto& list = dynamic_cast<t_list const&>(type);
    auto& elem = *list.get_elem_type();
    auto elem_tc = get_gen_type_class_(elem, opts);
    return tc + "list<" + elem_tc + ">";
  } else if (type.is_set()) {
    auto& set = dynamic_cast<t_set const&>(type);
    auto& elem = *set.get_elem_type();
    auto elem_tc = get_gen_type_class_(elem, opts);
    return tc + "set<" + elem_tc + ">";
  } else if (type.is_map()) {
    auto& map = dynamic_cast<t_map const&>(type);
    auto& key = *map.get_key_type();
    auto& val = *map.get_val_type();
    auto key_tc = get_gen_type_class_(key, opts);
    auto val_tc = get_gen_type_class_(val, opts);
    return tc + "map<" + key_tc + ", " + val_tc + ">";
  } else if (type.is_union()) {
    return tc + "variant";
  } else if (type.is_struct() || type.is_xception()) {
    return tc + "structure";
  } else {
    return tc + "unknown";
  }
}

} // namespace

std::string get_gen_type_class(t_type const& type) {
  get_gen_type_class_options opts;
  return get_gen_type_class_(type, opts);
}

std::string get_gen_type_class_with_indirection(t_type const& type) {
  get_gen_type_class_options opts;
  opts.gen_indirection = true;
  return get_gen_type_class_(type, opts);
}

std::string sha256_hex(std::string const& in) {
  std::uint8_t mid[SHA256_DIGEST_LENGTH];
  SHA256_CTX hasher;
  SHA256_Init(&hasher);
  SHA256_Update(&hasher, in.data(), in.size());
  SHA256_Final(mid, &hasher);

  constexpr auto alpha = "0123456789abcdef";

  std::string out;
  for (size_t i = 0; i < SHA256_DIGEST_LENGTH; ++i) {
    constexpr auto mask = std::uint8_t(std::uint8_t(~std::uint8_t(0)) >> 4);
    auto hi = (mid[i] >> 4) & mask;
    auto lo = (mid[i] >> 0) & mask;
    out.push_back(alpha[hi]);
    out.push_back(alpha[lo]);
  }
  return out;
}

} // namespace cpp2
} // namespace compiler
} // namespace thrift
} // namespace apache
