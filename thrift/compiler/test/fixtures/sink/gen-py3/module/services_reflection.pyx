#
# Autogenerated by Thrift
#
# DO NOT EDIT UNLESS YOU ARE SURE THAT YOU KNOW WHAT YOU ARE DOING
#  @generated
#

from thrift.py3.reflection cimport (
  MethodSpec as __MethodSpec,
  ArgumentSpec as __ArgumentSpec,
  NumberType as __NumberType,
)

import folly.iobuf as __iobuf


cimport module.types as _module_types


cdef __InterfaceSpec get_reflection__SinkService(bint for_clients):
    cdef __InterfaceSpec spec = __InterfaceSpec.create(
        name="SinkService",
        annotations={
        },
    )
    return spec
