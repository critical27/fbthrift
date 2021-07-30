#
# Autogenerated by Thrift
#
# DO NOT EDIT UNLESS YOU ARE SURE THAT YOU KNOW WHAT YOU ARE DOING
#  @generated
#

import folly.iobuf as __iobuf
import thrift.py3.types
import thrift.py3.exceptions
from thrift.py3.types import __NotSet, NOTSET
import typing as _typing
from typing_extensions import Final

import sys
import itertools


__property__ = property


class TypedEnum(thrift.py3.types.Enum):
    VAL1: TypedEnum = ...
    VAL2: TypedEnum = ...


class MyUnion(thrift.py3.types.Union, _typing.Hashable):
    class __fbthrift_IsSet:
        anInteger: bool
        aString: bool
        pass

    anInteger: Final[int] = ...

    aString: Final[str] = ...

    def __init__(
        self, *,
        anInteger: _typing.Optional[int]=None,
        aString: _typing.Optional[str]=None
    ) -> None: ...

    def __hash__(self) -> int: ...
    def __lt__(self, other: 'MyUnion') -> bool: ...
    def __gt__(self, other: 'MyUnion') -> bool: ...
    def __le__(self, other: 'MyUnion') -> bool: ...
    def __ge__(self, other: 'MyUnion') -> bool: ...

    class Type(thrift.py3.types.Enum):
        EMPTY: MyUnion.Type = ...
        anInteger: MyUnion.Type = ...
        aString: MyUnion.Type = ...

    @staticmethod
    def fromValue(value: _typing.Union[None, int, str]) -> MyUnion: ...
    @__property__
    def value(self) -> _typing.Union[None, int, str]: ...
    @__property__
    def type(self) -> "MyUnion.Type": ...


class MyField(thrift.py3.types.Struct, _typing.Hashable, _typing.Iterable[_typing.Tuple[str, _typing.Any]]):
    class __fbthrift_IsSet:
        opt_value: bool
        value: bool
        req_value: bool
        pass

    opt_value: Final[_typing.Optional[int]] = ...

    value: Final[int] = ...

    req_value: Final[int] = ...

    def __init__(
        self, *,
        opt_value: _typing.Optional[int]=None,
        value: _typing.Optional[int]=None,
        req_value: _typing.Optional[int]=None
    ) -> None: ...

    def __call__(
        self, *,
        opt_value: _typing.Union[int, __NotSet, None]=NOTSET,
        value: _typing.Union[int, __NotSet, None]=NOTSET,
        req_value: _typing.Union[int, __NotSet, None]=NOTSET
    ) -> MyField: ...

    def __reduce__(self) -> _typing.Tuple[_typing.Callable, _typing.Tuple[_typing.Type['MyField'], bytes]]: ...
    def __iter__(self) -> _typing.Iterator[_typing.Tuple[str, _typing.Any]]: ...
    def __hash__(self) -> int: ...
    def __lt__(self, other: 'MyField') -> bool: ...
    def __gt__(self, other: 'MyField') -> bool: ...
    def __le__(self, other: 'MyField') -> bool: ...
    def __ge__(self, other: 'MyField') -> bool: ...


class MyStruct(thrift.py3.types.Struct, _typing.Hashable, _typing.Iterable[_typing.Tuple[str, _typing.Any]]):
    class __fbthrift_IsSet:
        pass

    opt_ref: Final[_typing.Optional['MyField']] = ...

    ref: Final[_typing.Optional['MyField']] = ...

    req_ref: Final[_typing.Optional['MyField']] = ...

    def __init__(
        self, *,
        opt_ref: _typing.Optional['MyField']=None,
        ref: _typing.Optional['MyField']=None,
        req_ref: _typing.Optional['MyField']=None
    ) -> None: ...

    def __call__(
        self, *,
        opt_ref: _typing.Union['MyField', __NotSet, None]=NOTSET,
        ref: _typing.Union['MyField', __NotSet, None]=NOTSET,
        req_ref: _typing.Union['MyField', __NotSet, None]=NOTSET
    ) -> MyStruct: ...

    def __reduce__(self) -> _typing.Tuple[_typing.Callable, _typing.Tuple[_typing.Type['MyStruct'], bytes]]: ...
    def __iter__(self) -> _typing.Iterator[_typing.Tuple[str, _typing.Any]]: ...
    def __hash__(self) -> int: ...
    def __lt__(self, other: 'MyStruct') -> bool: ...
    def __gt__(self, other: 'MyStruct') -> bool: ...
    def __le__(self, other: 'MyStruct') -> bool: ...
    def __ge__(self, other: 'MyStruct') -> bool: ...


class StructWithUnion(thrift.py3.types.Struct, _typing.Hashable, _typing.Iterable[_typing.Tuple[str, _typing.Any]]):
    class __fbthrift_IsSet:
        aDouble: bool
        f: bool
        pass

    u: Final[_typing.Optional['MyUnion']] = ...

    aDouble: Final[float] = ...

    f: Final['MyField'] = ...

    def __init__(
        self, *,
        u: _typing.Optional['MyUnion']=None,
        aDouble: _typing.Optional[float]=None,
        f: _typing.Optional['MyField']=None
    ) -> None: ...

    def __call__(
        self, *,
        u: _typing.Union['MyUnion', __NotSet, None]=NOTSET,
        aDouble: _typing.Union[float, __NotSet, None]=NOTSET,
        f: _typing.Union['MyField', __NotSet, None]=NOTSET
    ) -> StructWithUnion: ...

    def __reduce__(self) -> _typing.Tuple[_typing.Callable, _typing.Tuple[_typing.Type['StructWithUnion'], bytes]]: ...
    def __iter__(self) -> _typing.Iterator[_typing.Tuple[str, _typing.Any]]: ...
    def __hash__(self) -> int: ...
    def __lt__(self, other: 'StructWithUnion') -> bool: ...
    def __gt__(self, other: 'StructWithUnion') -> bool: ...
    def __le__(self, other: 'StructWithUnion') -> bool: ...
    def __ge__(self, other: 'StructWithUnion') -> bool: ...


class RecursiveStruct(thrift.py3.types.Struct, _typing.Hashable, _typing.Iterable[_typing.Tuple[str, _typing.Any]]):
    class __fbthrift_IsSet:
        mes: bool
        pass

    mes: Final[_typing.Optional[_typing.Sequence['RecursiveStruct']]] = ...

    def __init__(
        self, *,
        mes: _typing.Optional[_typing.Sequence['RecursiveStruct']]=None
    ) -> None: ...

    def __call__(
        self, *,
        mes: _typing.Union[_typing.Sequence['RecursiveStruct'], __NotSet, None]=NOTSET
    ) -> RecursiveStruct: ...

    def __reduce__(self) -> _typing.Tuple[_typing.Callable, _typing.Tuple[_typing.Type['RecursiveStruct'], bytes]]: ...
    def __iter__(self) -> _typing.Iterator[_typing.Tuple[str, _typing.Any]]: ...
    def __hash__(self) -> int: ...
    def __lt__(self, other: 'RecursiveStruct') -> bool: ...
    def __gt__(self, other: 'RecursiveStruct') -> bool: ...
    def __le__(self, other: 'RecursiveStruct') -> bool: ...
    def __ge__(self, other: 'RecursiveStruct') -> bool: ...


class StructWithContainers(thrift.py3.types.Struct, _typing.Hashable, _typing.Iterable[_typing.Tuple[str, _typing.Any]]):
    class __fbthrift_IsSet:
        pass

    list_ref: Final[_typing.Optional[_typing.Sequence[int]]] = ...

    set_ref: Final[_typing.Optional[_typing.AbstractSet[int]]] = ...

    map_ref: Final[_typing.Optional[_typing.Mapping[int, int]]] = ...

    list_ref_unique: Final[_typing.Optional[_typing.Sequence[int]]] = ...

    set_ref_shared: Final[_typing.Optional[_typing.AbstractSet[int]]] = ...

    list_ref_shared_const: Final[_typing.Optional[_typing.Sequence[int]]] = ...

    def __init__(
        self, *,
        list_ref: _typing.Optional[_typing.Sequence[int]]=None,
        set_ref: _typing.Optional[_typing.AbstractSet[int]]=None,
        map_ref: _typing.Optional[_typing.Mapping[int, int]]=None,
        list_ref_unique: _typing.Optional[_typing.Sequence[int]]=None,
        set_ref_shared: _typing.Optional[_typing.AbstractSet[int]]=None,
        list_ref_shared_const: _typing.Optional[_typing.Sequence[int]]=None
    ) -> None: ...

    def __call__(
        self, *,
        list_ref: _typing.Union[_typing.Sequence[int], __NotSet, None]=NOTSET,
        set_ref: _typing.Union[_typing.AbstractSet[int], __NotSet, None]=NOTSET,
        map_ref: _typing.Union[_typing.Mapping[int, int], __NotSet, None]=NOTSET,
        list_ref_unique: _typing.Union[_typing.Sequence[int], __NotSet, None]=NOTSET,
        set_ref_shared: _typing.Union[_typing.AbstractSet[int], __NotSet, None]=NOTSET,
        list_ref_shared_const: _typing.Union[_typing.Sequence[int], __NotSet, None]=NOTSET
    ) -> StructWithContainers: ...

    def __reduce__(self) -> _typing.Tuple[_typing.Callable, _typing.Tuple[_typing.Type['StructWithContainers'], bytes]]: ...
    def __iter__(self) -> _typing.Iterator[_typing.Tuple[str, _typing.Any]]: ...
    def __hash__(self) -> int: ...
    def __lt__(self, other: 'StructWithContainers') -> bool: ...
    def __gt__(self, other: 'StructWithContainers') -> bool: ...
    def __le__(self, other: 'StructWithContainers') -> bool: ...
    def __ge__(self, other: 'StructWithContainers') -> bool: ...


class StructWithSharedConst(thrift.py3.types.Struct, _typing.Hashable, _typing.Iterable[_typing.Tuple[str, _typing.Any]]):
    class __fbthrift_IsSet:
        pass

    opt_shared_const: Final[_typing.Optional['MyField']] = ...

    shared_const: Final[_typing.Optional['MyField']] = ...

    req_shared_const: Final[_typing.Optional['MyField']] = ...

    def __init__(
        self, *,
        opt_shared_const: _typing.Optional['MyField']=None,
        shared_const: _typing.Optional['MyField']=None,
        req_shared_const: _typing.Optional['MyField']=None
    ) -> None: ...

    def __call__(
        self, *,
        opt_shared_const: _typing.Union['MyField', __NotSet, None]=NOTSET,
        shared_const: _typing.Union['MyField', __NotSet, None]=NOTSET,
        req_shared_const: _typing.Union['MyField', __NotSet, None]=NOTSET
    ) -> StructWithSharedConst: ...

    def __reduce__(self) -> _typing.Tuple[_typing.Callable, _typing.Tuple[_typing.Type['StructWithSharedConst'], bytes]]: ...
    def __iter__(self) -> _typing.Iterator[_typing.Tuple[str, _typing.Any]]: ...
    def __hash__(self) -> int: ...
    def __lt__(self, other: 'StructWithSharedConst') -> bool: ...
    def __gt__(self, other: 'StructWithSharedConst') -> bool: ...
    def __le__(self, other: 'StructWithSharedConst') -> bool: ...
    def __ge__(self, other: 'StructWithSharedConst') -> bool: ...


class Empty(thrift.py3.types.Struct, _typing.Hashable, _typing.Iterable[_typing.Tuple[str, _typing.Any]]):
    class __fbthrift_IsSet:
        pass

    def __init__(
        self, 
    ) -> None: ...

    def __call__(
        self, 
    ) -> Empty: ...

    def __reduce__(self) -> _typing.Tuple[_typing.Callable, _typing.Tuple[_typing.Type['Empty'], bytes]]: ...
    def __iter__(self) -> _typing.Iterator[_typing.Tuple[str, _typing.Any]]: ...
    def __hash__(self) -> int: ...
    def __lt__(self, other: 'Empty') -> bool: ...
    def __gt__(self, other: 'Empty') -> bool: ...
    def __le__(self, other: 'Empty') -> bool: ...
    def __ge__(self, other: 'Empty') -> bool: ...


class StructWithRef(thrift.py3.types.Struct, _typing.Hashable, _typing.Iterable[_typing.Tuple[str, _typing.Any]]):
    class __fbthrift_IsSet:
        pass

    def_field: Final[_typing.Optional['Empty']] = ...

    opt_field: Final[_typing.Optional['Empty']] = ...

    req_field: Final[_typing.Optional['Empty']] = ...

    def __init__(
        self, *,
        def_field: _typing.Optional['Empty']=None,
        opt_field: _typing.Optional['Empty']=None,
        req_field: _typing.Optional['Empty']=None
    ) -> None: ...

    def __call__(
        self, *,
        def_field: _typing.Union['Empty', __NotSet, None]=NOTSET,
        opt_field: _typing.Union['Empty', __NotSet, None]=NOTSET,
        req_field: _typing.Union['Empty', __NotSet, None]=NOTSET
    ) -> StructWithRef: ...

    def __reduce__(self) -> _typing.Tuple[_typing.Callable, _typing.Tuple[_typing.Type['StructWithRef'], bytes]]: ...
    def __iter__(self) -> _typing.Iterator[_typing.Tuple[str, _typing.Any]]: ...
    def __hash__(self) -> int: ...
    def __lt__(self, other: 'StructWithRef') -> bool: ...
    def __gt__(self, other: 'StructWithRef') -> bool: ...
    def __le__(self, other: 'StructWithRef') -> bool: ...
    def __ge__(self, other: 'StructWithRef') -> bool: ...


class StructWithRefTypeUnique(thrift.py3.types.Struct, _typing.Hashable, _typing.Iterable[_typing.Tuple[str, _typing.Any]]):
    class __fbthrift_IsSet:
        pass

    def_field: Final[_typing.Optional['Empty']] = ...

    opt_field: Final[_typing.Optional['Empty']] = ...

    req_field: Final[_typing.Optional['Empty']] = ...

    def __init__(
        self, *,
        def_field: _typing.Optional['Empty']=None,
        opt_field: _typing.Optional['Empty']=None,
        req_field: _typing.Optional['Empty']=None
    ) -> None: ...

    def __call__(
        self, *,
        def_field: _typing.Union['Empty', __NotSet, None]=NOTSET,
        opt_field: _typing.Union['Empty', __NotSet, None]=NOTSET,
        req_field: _typing.Union['Empty', __NotSet, None]=NOTSET
    ) -> StructWithRefTypeUnique: ...

    def __reduce__(self) -> _typing.Tuple[_typing.Callable, _typing.Tuple[_typing.Type['StructWithRefTypeUnique'], bytes]]: ...
    def __iter__(self) -> _typing.Iterator[_typing.Tuple[str, _typing.Any]]: ...
    def __hash__(self) -> int: ...
    def __lt__(self, other: 'StructWithRefTypeUnique') -> bool: ...
    def __gt__(self, other: 'StructWithRefTypeUnique') -> bool: ...
    def __le__(self, other: 'StructWithRefTypeUnique') -> bool: ...
    def __ge__(self, other: 'StructWithRefTypeUnique') -> bool: ...


class StructWithRefTypeShared(thrift.py3.types.Struct, _typing.Hashable, _typing.Iterable[_typing.Tuple[str, _typing.Any]]):
    class __fbthrift_IsSet:
        pass

    def_field: Final[_typing.Optional['Empty']] = ...

    opt_field: Final[_typing.Optional['Empty']] = ...

    req_field: Final[_typing.Optional['Empty']] = ...

    def __init__(
        self, *,
        def_field: _typing.Optional['Empty']=None,
        opt_field: _typing.Optional['Empty']=None,
        req_field: _typing.Optional['Empty']=None
    ) -> None: ...

    def __call__(
        self, *,
        def_field: _typing.Union['Empty', __NotSet, None]=NOTSET,
        opt_field: _typing.Union['Empty', __NotSet, None]=NOTSET,
        req_field: _typing.Union['Empty', __NotSet, None]=NOTSET
    ) -> StructWithRefTypeShared: ...

    def __reduce__(self) -> _typing.Tuple[_typing.Callable, _typing.Tuple[_typing.Type['StructWithRefTypeShared'], bytes]]: ...
    def __iter__(self) -> _typing.Iterator[_typing.Tuple[str, _typing.Any]]: ...
    def __hash__(self) -> int: ...
    def __lt__(self, other: 'StructWithRefTypeShared') -> bool: ...
    def __gt__(self, other: 'StructWithRefTypeShared') -> bool: ...
    def __le__(self, other: 'StructWithRefTypeShared') -> bool: ...
    def __ge__(self, other: 'StructWithRefTypeShared') -> bool: ...


class StructWithRefTypeSharedConst(thrift.py3.types.Struct, _typing.Hashable, _typing.Iterable[_typing.Tuple[str, _typing.Any]]):
    class __fbthrift_IsSet:
        pass

    def_field: Final[_typing.Optional['Empty']] = ...

    opt_field: Final[_typing.Optional['Empty']] = ...

    req_field: Final[_typing.Optional['Empty']] = ...

    def __init__(
        self, *,
        def_field: _typing.Optional['Empty']=None,
        opt_field: _typing.Optional['Empty']=None,
        req_field: _typing.Optional['Empty']=None
    ) -> None: ...

    def __call__(
        self, *,
        def_field: _typing.Union['Empty', __NotSet, None]=NOTSET,
        opt_field: _typing.Union['Empty', __NotSet, None]=NOTSET,
        req_field: _typing.Union['Empty', __NotSet, None]=NOTSET
    ) -> StructWithRefTypeSharedConst: ...

    def __reduce__(self) -> _typing.Tuple[_typing.Callable, _typing.Tuple[_typing.Type['StructWithRefTypeSharedConst'], bytes]]: ...
    def __iter__(self) -> _typing.Iterator[_typing.Tuple[str, _typing.Any]]: ...
    def __hash__(self) -> int: ...
    def __lt__(self, other: 'StructWithRefTypeSharedConst') -> bool: ...
    def __gt__(self, other: 'StructWithRefTypeSharedConst') -> bool: ...
    def __le__(self, other: 'StructWithRefTypeSharedConst') -> bool: ...
    def __ge__(self, other: 'StructWithRefTypeSharedConst') -> bool: ...


class StructWithRefAndAnnotCppNoexceptMoveCtor(thrift.py3.types.Struct, _typing.Hashable, _typing.Iterable[_typing.Tuple[str, _typing.Any]]):
    class __fbthrift_IsSet:
        pass

    def_field: Final[_typing.Optional['Empty']] = ...

    def __init__(
        self, *,
        def_field: _typing.Optional['Empty']=None
    ) -> None: ...

    def __call__(
        self, *,
        def_field: _typing.Union['Empty', __NotSet, None]=NOTSET
    ) -> StructWithRefAndAnnotCppNoexceptMoveCtor: ...

    def __reduce__(self) -> _typing.Tuple[_typing.Callable, _typing.Tuple[_typing.Type['StructWithRefAndAnnotCppNoexceptMoveCtor'], bytes]]: ...
    def __iter__(self) -> _typing.Iterator[_typing.Tuple[str, _typing.Any]]: ...
    def __hash__(self) -> int: ...
    def __lt__(self, other: 'StructWithRefAndAnnotCppNoexceptMoveCtor') -> bool: ...
    def __gt__(self, other: 'StructWithRefAndAnnotCppNoexceptMoveCtor') -> bool: ...
    def __le__(self, other: 'StructWithRefAndAnnotCppNoexceptMoveCtor') -> bool: ...
    def __ge__(self, other: 'StructWithRefAndAnnotCppNoexceptMoveCtor') -> bool: ...


_List__RecursiveStructT = _typing.TypeVar('_List__RecursiveStructT', bound=_typing.Sequence['RecursiveStruct'])


class List__RecursiveStruct(_typing.Sequence['RecursiveStruct'], _typing.Hashable):
    def __init__(self, items: _typing.Optional[_typing.Sequence['RecursiveStruct']]=None) -> None: ...
    def __len__(self) -> int: ...
    def __hash__(self) -> int: ...
    def __copy__(self) -> _typing.Sequence['RecursiveStruct']: ...
    @_typing.overload
    def __getitem__(self, i: int) -> 'RecursiveStruct': ...
    @_typing.overload
    def __getitem__(self, s: slice) -> _typing.Sequence['RecursiveStruct']: ...
    def __add__(self, other: _typing.Sequence['RecursiveStruct']) -> 'List__RecursiveStruct': ...
    def __radd__(self, other: _List__RecursiveStructT) -> _List__RecursiveStructT: ...
    def __reversed__(self) -> _typing.Iterator['RecursiveStruct']: ...
    def __iter__(self) -> _typing.Iterator['RecursiveStruct']: ...


_List__i32T = _typing.TypeVar('_List__i32T', bound=_typing.Sequence[int])


class List__i32(_typing.Sequence[int], _typing.Hashable):
    def __init__(self, items: _typing.Optional[_typing.Sequence[int]]=None) -> None: ...
    def __len__(self) -> int: ...
    def __hash__(self) -> int: ...
    def __copy__(self) -> _typing.Sequence[int]: ...
    @_typing.overload
    def __getitem__(self, i: int) -> int: ...
    @_typing.overload
    def __getitem__(self, s: slice) -> _typing.Sequence[int]: ...
    def __add__(self, other: _typing.Sequence[int]) -> 'List__i32': ...
    def __radd__(self, other: _List__i32T) -> _List__i32T: ...
    def __reversed__(self) -> _typing.Iterator[int]: ...
    def __iter__(self) -> _typing.Iterator[int]: ...


class Set__i32(_typing.AbstractSet[int], _typing.Hashable):
    def __init__(self, items: _typing.Optional[_typing.AbstractSet[int]]=None) -> None: ...
    def __len__(self) -> int: ...
    def __hash__(self) -> int: ...
    def __copy__(self) -> _typing.AbstractSet[int]: ...
    def __contains__(self, x: object) -> bool: ...
    def union(self, other: _typing.AbstractSet[int]) -> 'Set__i32': ...
    def intersection(self, other: _typing.AbstractSet[int]) -> 'Set__i32': ...
    def difference(self, other: _typing.AbstractSet[int]) -> 'Set__i32': ...
    def symmetric_difference(self, other: _typing.AbstractSet[int]) -> 'Set__i32': ...
    def issubset(self, other: _typing.AbstractSet[int]) -> bool: ...
    def issuperset(self, other: _typing.AbstractSet[int]) -> bool: ...
    def __iter__(self) -> _typing.Iterator[int]: ...


class Map__i32_i32(_typing.Mapping[int, int], _typing.Hashable):
    def __init__(self, items: _typing.Optional[_typing.Mapping[int, int]]=None) -> None: ...
    def __len__(self) -> int: ...
    def __hash__(self) -> int: ...
    def __copy__(self) -> _typing.Mapping[int, int]: ...
    def __getitem__(self, key: int) -> int: ...
    def __iter__(self) -> _typing.Iterator[int]: ...


kStructWithRef: StructWithRef = ...
kStructWithRefTypeUnique: StructWithRefTypeUnique = ...
kStructWithRefTypeShared: StructWithRefTypeShared = ...
kStructWithRefTypeSharedConst: StructWithRefTypeSharedConst = ...
