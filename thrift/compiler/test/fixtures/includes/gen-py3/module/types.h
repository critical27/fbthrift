/**
 * Autogenerated by Thrift
 *
 * DO NOT EDIT UNLESS YOU ARE SURE THAT YOU KNOW WHAT YOU ARE DOING
 *  @generated
 */

#pragma once

#include <functional>
#include <folly/Range.h>

#include <thrift/lib/py3/enums.h>
#include "gen-cpp2/module_data.h"
#include "gen-cpp2/module_types.h"
#include "gen-cpp2/module_metadata.h"
namespace thrift {
namespace py3 {



template<>
void reset_field<::cpp2::MyStruct>(
    ::cpp2::MyStruct& obj, uint16_t index) {
  switch (index) {
    case 0:
      obj.MyIncludedField_ref().copy_from(default_inst<::cpp2::MyStruct>().MyIncludedField_ref());
      return;
    case 1:
      obj.MyOtherIncludedField_ref().copy_from(default_inst<::cpp2::MyStruct>().MyOtherIncludedField_ref());
      return;
    case 2:
      obj.MyIncludedInt_ref().copy_from(default_inst<::cpp2::MyStruct>().MyIncludedInt_ref());
      return;
  }
}

template<>
const std::unordered_map<std::string_view, std::string_view>& PyStructTraits<
    ::cpp2::MyStruct>::namesmap() {
  static const folly::Indestructible<NamesMap> map {
    {
    }
  };
  return *map;
}
} // namespace py3
} // namespace thrift
