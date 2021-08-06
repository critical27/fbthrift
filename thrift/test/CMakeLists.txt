set(FBTHRIFT_TEST_HOME ${CMAKE_CURRENT_SOURCE_DIR})

# Compile thrift file and link by manual
thrift_library(
    "AnnotationTest"            # file
    ""                          # services
    "cpp2"                      # language
    ""                          # options
    "${FBTHRIFT_TEST_HOME}"     # file path
    "${FBTHRIFT_TEST_HOME}"     # output path
    "thrift/test"               # include_prefix
)
add_executable(
    annotation_test
    AnnotationTest.cpp
)
target_link_libraries(
    annotation_test
    AnnotationTest-cpp2
    ${LIBGFLAGS_LIBRARY}
    ${GTEST_BOTH_LIBRARIES}
    ${GMOCK_BOTH_LIBRARIES}
)
