#
# Autogenerated by Thrift
#
# DO NOT EDIT UNLESS YOU ARE SURE THAT YOU KNOW WHAT YOU ARE DOING
#  @generated
#

from thrift.py3.reflection cimport (
  InterfaceSpec as __InterfaceSpec,
)


cdef __InterfaceSpec get_reflection__MyService(bint for_clients)

cdef extern from "src/gen-cpp2/MyService.h" namespace "::cpp2":
    cdef cppclass cMyServiceSvIf "::cpp2::MyServiceSvIf":
        pass

cdef __InterfaceSpec get_reflection__MyServiceFast(bint for_clients)

cdef extern from "src/gen-cpp2/MyServiceFast.h" namespace "::cpp2":
    cdef cppclass cMyServiceFastSvIf "::cpp2::MyServiceFastSvIf":
        pass

cdef __InterfaceSpec get_reflection__DbMixedStackArguments(bint for_clients)

cdef extern from "src/gen-cpp2/DbMixedStackArguments.h" namespace "::cpp2":
    cdef cppclass cDbMixedStackArgumentsSvIf "::cpp2::DbMixedStackArgumentsSvIf":
        pass
