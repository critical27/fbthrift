/*
 * Copyright (c) Facebook, Inc. and its affiliates.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

#include <folly/portability/GTest.h>
#include <thrift/lib/cpp2/PluggableFunction.h>
#include <thrift/lib/cpp2/server/RequestsRegistry.h>

using namespace apache::thrift;

namespace {
static uint32_t getCurrentServerTickCallCount = 0;
static uint64_t currentTick = 0;

THRIFT_PLUGGABLE_FUNC_SET(uint64_t, getCurrentServerTick) {
  ++getCurrentServerTickCallCount;
  return currentTick;
}
} // namespace

// RecentRequestCounter tests
class RecentRequestCounterTest : public testing::Test {
 protected:
  void SetUp() override {
    // Reset mock getCurrentServerTick pluggable function
    getCurrentServerTickCallCount = 0;
    currentTick = 0;
  }

  RecentRequestCounter create() {
    return {};
  }
};

TEST_F(RecentRequestCounterTest, testGetCurrentBucket) {
  auto counter = create();
  counter.increment();
  currentTick += 512;
  auto counts = counter.get();
  EXPECT_EQ(getCurrentServerTickCallCount, 2);
  EXPECT_EQ(counts[0], 0);
}

TEST_F(RecentRequestCounterTest, testIncrement) {
  auto counter = create();
  counter.increment();
  auto counts = counter.get();
  EXPECT_EQ(counts[0], 1);

  counter.increment();
  ++currentTick;
  counter.increment();
  counts = counter.get();
  EXPECT_EQ(counts[0], 1);
  EXPECT_EQ(counts[1], 2);
}

TEST_F(RecentRequestCounterTest, testGetReturnsMostRecentBucketFirst) {
  auto counter = create();
  counter.increment();
  currentTick = 256;
  counter.increment();
  counter.increment();
  auto counts = counter.get();
  EXPECT_EQ(counts[0], 2);
  EXPECT_EQ(counts[256], 1);
}
