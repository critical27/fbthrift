/**
 * Autogenerated by Thrift for src/include1.thrift
 *
 * DO NOT EDIT UNLESS YOU ARE SURE THAT YOU KNOW WHAT YOU ARE DOING
 *  @generated
 */
#pragma once

#include <thrift/lib/cpp2/visitation/visit_by_thrift_field_metadata.h>
#include "thrift/compiler/test/fixtures/frozen-struct/gen-cpp2/include1_metadata.h"

namespace apache {
namespace thrift {
namespace detail {

template <>
struct VisitByThriftId<::some::ns::IncludedA> {
  template <typename F, typename T>
  void operator()(FOLLY_MAYBE_UNUSED F&& f, size_t id, FOLLY_MAYBE_UNUSED T&& t) const {
    switch (id) {
    case 1:
      return f(0, static_cast<T&&>(t).i32Field_ref());
    case 2:
      return f(1, static_cast<T&&>(t).strField_ref());
    default:
      throwInvalidThriftId(id, "::some::ns::IncludedA");
    }
  }
};
} // namespace detail
} // namespace thrift
} // namespace apache