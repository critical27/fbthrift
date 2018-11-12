from typing import Union, Optional, Iterator, Hashable, Iterable

class IOBuf(Hashable):
    def __init__(self, buffer: Union[IOBuf, bytes, bytearray, memoryview]) -> None: ...
    def clone(self) -> IOBuf: ...
    @property
    def next(self) -> Optional[IOBuf]: ...
    @property
    def prev(self) -> Optional[IOBuf]: ...
    @property
    def is_chained(self) -> bool: ...
    def chain_size(self) -> int: ...
    def chain_count(self) -> int: ...
    def __bytes__(self) -> bytes: ...
    def __bool__(self) -> bool: ...
    def __len__(self) -> int: ...
    def __iter__(
        self
    ) -> Iterator[bytes]: ...  # Lies, but typing likes it for b''.join()
    def __hash__(self) -> int: ...
