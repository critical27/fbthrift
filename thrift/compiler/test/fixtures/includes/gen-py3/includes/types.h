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
#include "gen-cpp2/includes_data.h"
#include "gen-cpp2/includes_types.h"
#include "gen-cpp2/includes_metadata.h"
namespace thrift {
namespace py3 {



template<>
void reset_field<::cpp2::Included>(
    ::cpp2::Included& obj, uint16_t index) {
  switch (index) {
    case 0:
      obj.MyIntField_ref().copy_from(default_inst<::cpp2::Included>().MyIntField_ref());
      return;
    case 1:
      obj.MyTransitiveField_ref().copy_from(default_inst<::cpp2::Included>().MyTransitiveField_ref());
      return;
  }
}

template<>
const std::unordered_map<std::string_view, std::string_view>& PyStructTraits<
    ::cpp2::Included>::namesmap() {
  static const folly::Indestructible<NamesMap> map {
    {
    }
  };
  return *map;
}
} // namespace py3
} // namespace thrift
