#
# Autogenerated by Thrift
#
# DO NOT EDIT UNLESS YOU ARE SURE THAT YOU KNOW WHAT YOU ARE DOING
#  @generated
#

from thrift.py3.reflection cimport (
  InterfaceSpec as __InterfaceSpec,
)


cdef __InterfaceSpec get_reflection__HsTestService(bint for_clients)

cdef extern from "gen-cpp2/HsTestService.h" namespace "::cpp2":
    cdef cppclass cHsTestServiceSvIf "::cpp2::HsTestServiceSvIf":
        pass
