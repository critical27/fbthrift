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

#include <thrift/compiler/ast/t_annotated.h>
#include <thrift/compiler/ast/t_const.h>

namespace apache {
namespace thrift {
namespace compiler {

namespace {
const std::string kEmpty{};
}

// Must be defined here for t_const's destructor's defintion.
t_annotated::~t_annotated() = default;

bool t_annotated::has_annotation(
    std::initializer_list<std::string> names) const {
  for (const auto& name : names) {
    if (has_annotation(name)) {
      return true;
    }
  }
  return false;
}

const std::string* t_annotated::get_annotation_or_null(
    const std::string& name) const {
  auto itr = annotations_.find(name);
  if (itr != annotations_.end()) {
    return &itr->second;
  }
  return nullptr;
}

const std::string& t_annotated::get_annotation(
    const std::string& name,
    const std::string* default_value) const {
  if (const auto* value = get_annotation_or_null(name)) {
    return *value;
  }
  return default_value == nullptr ? kEmpty : *default_value;
}

std::string t_annotated::get_annotation(
    const std::string& name,
    std::string default_value) const {
  if (const auto* value = get_annotation_or_null(name)) {
    return *value;
  }
  return default_value;
}

const std::string* t_annotated::get_annotation_or_null(
    std::initializer_list<std::string> names) const {
  for (const auto& name : names) {
    auto itr = annotations_.find(name);
    if (itr != annotations_.end()) {
      return &itr->second;
    }
  }
  return nullptr;
}

const std::string& t_annotated::get_annotation(
    std::initializer_list<std::string> names,
    const std::string* default_value) const {
  if (const auto* value = get_annotation_or_null(names)) {
    return *value;
  }
  return default_value == nullptr ? kEmpty : *default_value;
}

std::string t_annotated::get_annotation(
    std::initializer_list<std::string> names,
    std::string default_value) const {
  if (const auto* value = get_annotation_or_null(names)) {
    return *value;
  }
  return default_value;
}

void t_annotated::set_annotation(
    const std::string& key,
    std::unique_ptr<t_const> value) {
  annotation_objects_[key] = std::move(value);
}

void t_annotated::add_structured_annotation(std::unique_ptr<t_const> annot) {
  structured_annotations_raw_.emplace_back(annot.get());
  structured_annotations_.emplace_back(std::move(annot));
}

} // namespace compiler
} // namespace thrift
} // namespace apache
