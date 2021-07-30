#
# Autogenerated by Thrift
#
# DO NOT EDIT UNLESS YOU ARE SURE THAT YOU KNOW WHAT YOU ARE DOING
#  @generated
#
cimport cython as __cython
from cpython.bytes cimport PyBytes_AsStringAndSize
from cpython.object cimport PyTypeObject, Py_LT, Py_LE, Py_EQ, Py_NE, Py_GT, Py_GE
from libcpp.memory cimport shared_ptr, make_shared, unique_ptr, make_unique
from libcpp.string cimport string
from libcpp cimport bool as cbool
from libcpp.iterator cimport inserter as cinserter
from cpython cimport bool as pbool
from cython.operator cimport dereference as deref, preincrement as inc, address as ptr_address
import thrift.py3.types
cimport thrift.py3.types
cimport thrift.py3.exceptions
from thrift.py3.std_libcpp cimport sv_to_str as __sv_to_str, string_view as __cstring_view
from thrift.py3.types cimport (
    cSetOp as __cSetOp,
    richcmp as __richcmp,
    set_op as __set_op,
    setcmp as __setcmp,
    list_index as __list_index,
    list_count as __list_count,
    list_slice as __list_slice,
    list_getitem as __list_getitem,
    set_iter as __set_iter,
    map_iter as __map_iter,
    map_contains as __map_contains,
    map_getitem as __map_getitem,
    reference_shared_ptr as __reference_shared_ptr,
    get_field_name_by_index as __get_field_name_by_index,
    reset_field as __reset_field,
    translate_cpp_enum_to_python,
    SetMetaClass as __SetMetaClass,
    const_pointer_cast,
    constant_shared_ptr,
    NOTSET as __NOTSET,
    EnumData as __EnumData,
    EnumFlagsData as __EnumFlagsData,
    UnionTypeEnumData as __UnionTypeEnumData,
    createEnumDataForUnionType as __createEnumDataForUnionType,
)
cimport thrift.py3.std_libcpp as std_libcpp
cimport thrift.py3.serializer as serializer
import folly.iobuf as __iobuf
from folly.optional cimport cOptional
from folly.memory cimport to_shared_ptr as __to_shared_ptr
from folly.range cimport Range as __cRange

import sys
from collections.abc import Sequence, Set, Mapping, Iterable
import weakref as __weakref
import builtins as _builtins
cimport transitive.types as _transitive_types
import transitive.types as _transitive_types

cimport includes.types_reflection as _types_reflection



@__cython.auto_pickle(False)
cdef class Included(thrift.py3.types.Struct):
    def __init__(Included self, **kwargs):
        self._cpp_obj = make_shared[cIncluded]()
        self._fields_setter = __fbthrift_types_fields.__Included_FieldsSetter.create(self._cpp_obj.get())
        super().__init__(**kwargs)

    def __call__(Included self, **kwargs):
        if not kwargs:
            return self
        cdef Included __fbthrift_inst = Included.__new__(Included)
        __fbthrift_inst._cpp_obj = make_shared[cIncluded](deref(self._cpp_obj))
        __fbthrift_inst._fields_setter = __fbthrift_types_fields.__Included_FieldsSetter.create(__fbthrift_inst._cpp_obj.get())
        for __fbthrift_name, __fbthrift_value in kwargs.items():
            __fbthrift_inst.__fbthrift_set_field(__fbthrift_name, __fbthrift_value)
        return __fbthrift_inst

    cdef void __fbthrift_set_field(self, str name, object value) except *:
        self._fields_setter.set_field(name.encode("utf-8"), value)

    cdef object __fbthrift_isset(self):
        return thrift.py3.types._IsSet("Included", {
          "MyIntField": deref(self._cpp_obj).MyIntField_ref().has_value(),
          "MyTransitiveField": deref(self._cpp_obj).MyTransitiveField_ref().has_value(),
        })

    @staticmethod
    cdef create(shared_ptr[cIncluded] cpp_obj):
        __fbthrift_inst = <Included>Included.__new__(Included)
        __fbthrift_inst._cpp_obj = cmove(cpp_obj)
        return __fbthrift_inst

    @property
    def MyIntField(self):

        return deref(self._cpp_obj).MyIntField_ref().value()

    @property
    def MyTransitiveField(self):

        if self.__fbthrift_cached_MyTransitiveField is None:
            self.__fbthrift_cached_MyTransitiveField = _transitive_types.Foo.create(__reference_shared_ptr(deref(self._cpp_obj).MyTransitiveField_ref().ref(), self._cpp_obj))
        return self.__fbthrift_cached_MyTransitiveField


    def __hash__(Included self):
        return  super().__hash__()

    def __copy__(Included self):
        cdef shared_ptr[cIncluded] cpp_obj = make_shared[cIncluded](
            deref(self._cpp_obj)
        )
        return Included.create(cmove(cpp_obj))

    def __richcmp__(self, other, int op):
        r = self.__cmp_sametype(other, op)
        return __richcmp[cIncluded](
            self._cpp_obj,
            (<Included>other)._cpp_obj,
            op,
        ) if r is None else r

    @staticmethod
    def __get_reflection__():
        return _types_reflection.get_reflection__Included()

    cdef __fbthrift_cThriftMetadata __get_metadata__(self) except *:
        cdef __fbthrift_cThriftMetadata meta
        StructMetadata[cIncluded].gen(meta)
        return meta

    cdef str __get_thrift_name__(self):
        return "includes.Included"

    cdef __cstring_view __fbthrift_get_field_name_by_index(self, size_t idx):
        return __get_field_name_by_index[cIncluded](idx)

    def __cinit__(self):
        self.__fbthrift_struct_size = 2

    cdef __iobuf.IOBuf _serialize(Included self, __Protocol proto):
        cdef unique_ptr[__iobuf.cIOBuf] data
        with nogil:
            data = cmove(serializer.cserialize[cIncluded](self._cpp_obj.get(), proto))
        return __iobuf.from_unique_ptr(cmove(data))

    cdef cuint32_t _deserialize(Included self, const __iobuf.cIOBuf* buf, __Protocol proto) except? 0:
        cdef cuint32_t needed
        self._cpp_obj = make_shared[cIncluded]()
        with nogil:
            needed = serializer.cdeserialize[cIncluded](buf, self._cpp_obj.get(), proto)
        return needed


ExampleIncluded = Included.create(constant_shared_ptr(cExampleIncluded()))
IncludedConstant = 42
IncludedInt64 = int
TransitiveFoo = _transitive_types.Foo
