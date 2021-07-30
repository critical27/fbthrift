#
# Autogenerated by Thrift
#
# DO NOT EDIT UNLESS YOU ARE SURE THAT YOU KNOW WHAT YOU ARE DOING
#  @generated
#

import typing as _typing

import folly.iobuf as __iobuf
import thrift.py3.builder


import module.types as _module_types


class ComplexUnion_Builder(thrift.py3.builder.StructBuilder):
    intValue: _typing.Optional[int]
    stringValue: _typing.Optional[str]
    intListValue: _typing.Optional[list]
    stringListValue: _typing.Optional[list]
    typedefValue: _typing.Optional[dict]
    stringRef: _typing.Optional[str]

    def __iter__(self) -> _typing.Iterator[_typing.Tuple[str, _typing.Any]]: ...


class ListUnion_Builder(thrift.py3.builder.StructBuilder):
    intListValue: _typing.Optional[list]
    stringListValue: _typing.Optional[list]

    def __iter__(self) -> _typing.Iterator[_typing.Tuple[str, _typing.Any]]: ...


class DataUnion_Builder(thrift.py3.builder.StructBuilder):
    binaryData: _typing.Optional[bytes]
    stringData: _typing.Optional[str]

    def __iter__(self) -> _typing.Iterator[_typing.Tuple[str, _typing.Any]]: ...


class Val_Builder(thrift.py3.builder.StructBuilder):
    strVal: _typing.Optional[str]
    intVal: _typing.Optional[int]
    typedefValue: _typing.Optional[dict]

    def __iter__(self) -> _typing.Iterator[_typing.Tuple[str, _typing.Any]]: ...


class ValUnion_Builder(thrift.py3.builder.StructBuilder):
    v1: _typing.Any
    v2: _typing.Any

    def __iter__(self) -> _typing.Iterator[_typing.Tuple[str, _typing.Any]]: ...


class VirtualComplexUnion_Builder(thrift.py3.builder.StructBuilder):
    thingOne: _typing.Optional[str]
    thingTwo: _typing.Optional[str]

    def __iter__(self) -> _typing.Iterator[_typing.Tuple[str, _typing.Any]]: ...


class NonCopyableStruct_Builder(thrift.py3.builder.StructBuilder):
    num: _typing.Optional[int]

    def __iter__(self) -> _typing.Iterator[_typing.Tuple[str, _typing.Any]]: ...


class NonCopyableUnion_Builder(thrift.py3.builder.StructBuilder):
    s: _typing.Any

    def __iter__(self) -> _typing.Iterator[_typing.Tuple[str, _typing.Any]]: ...


