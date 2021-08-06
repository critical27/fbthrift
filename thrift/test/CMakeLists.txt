set(FBTHRIFT_TEST_HOME ${CMAKE_CURRENT_SOURCE_DIR})

# Compile thrift file and link by manual
# thrift_library(
#     "AnnotationTest"            # file
#     ""                          # services
#     "cpp2"                      # language
#     ""                          # options
#     "${FBTHRIFT_TEST_HOME}"     # file path
#     "${FBTHRIFT_TEST_HOME}"     # output path
#     "thrift/test"               # include_prefix
# )
# add_executable(
#     annotation_test
#     AnnotationTest.cpp
# )
# target_link_libraries(
#     annotation_test
#     AnnotationTest-cpp2
#     ${LIBGFLAGS_LIBRARY}
#     ${GTEST_BOTH_LIBRARIES}
#     ${GMOCK_BOTH_LIBRARIES}
# )

# set(THRIFT_LIBRARIES
#     thriftcpp2
#     rocketupgrade
#     async
#     thriftprotocol
#     transport
#     concurrency
#     thriftfrozen2
#     thrift-core
#     rpcmetadata
#     thriftmetadata
# )

function(doodle_test thrift_file services cpp_file output_name)
    thrift_library(
        ${thrift_file}              # file
        "${services}"               # services
        "cpp2"                      # language
        ""                          # options
        ${FBTHRIFT_TEST_HOME}       # file path
        ${FBTHRIFT_TEST_HOME}       # output path
        "thrift/test"               # include_prefix
    )
    add_executable(
        ${output_name}
        ${cpp_file}
    )
    target_link_libraries(
        ${output_name}
        ${thrift_file}-cpp2
        ${GLOG_LIBRARIES}
        ${LIBGFLAGS_LIBRARY}
        ${GTEST_BOTH_LIBRARIES}
        ${GMOCK_BOTH_LIBRARIES}
        ${ARGN}
        pthread
    )
    gtest_add_tests(${output_name} "" ${cpp_file})
endfunction(doodle_test)

# Works, the tests of same thrift file can only compile one at a time
doodle_test(AnnotationTest          ""              AnnotationTest.cpp          annotation_test)
doodle_test(test                    ""              constants_test.cpp          constants_test)
doodle_test(Cpp2OpsNative           ""              Cpp2OpsTest.cpp             cpp2ops_test)
# doodle_test(DebugProtoTest          ""              Benchmark.cpp               benchmark           Folly::follybenchmark)
# doodle_test(DebugProtoTest          ""              Cpp2ProtocolTest.cpp        cpp2protocol_test)
doodle_test(DebugProtoTest          ""              DebugProtoTest.cpp          debug_proto_test)


# FAILED TO COMPILE
# AnyTest
# doodle_test(cpp_name                "MyService"     cpp_name_test.cpp       cpp_name_test       Folly::folly)
# doodle_test(ThriftTest              ""              CompressTest.cpp        compress_test       Folly::follybenchmark)
# doodle_test(CppAllocatorTest        ""              CppAllocatorTest.cpp    cpp_allocator_test)
# doodle_test(CustomStruct            "CustomStruct"  CustomStructTest.cpp    custom_struct_test)
# doodle_test(DeserializationBench    ""              DeserializationBench.cpp    deserial_bench      Folly::follybenchmark)