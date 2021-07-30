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

#include <thrift/lib/cpp2/transport/rocket/server/RocketRoutingHandler.h>

#ifndef _WIN32
#include <dlfcn.h>
#endif

#include <memory>
#include <string>
#include <utility>
#include <vector>

#include <folly/SocketAddress.h>
#include <folly/io/async/AsyncTransport.h>

#include <thrift/lib/cpp2/PluggableFunction.h>
#include <thrift/lib/cpp2/server/Cpp2Worker.h>
#include <thrift/lib/cpp2/transport/rocket/framing/FrameType.h>
#include <thrift/lib/cpp2/transport/rocket/server/RocketServerConnection.h>
#include <thrift/lib/cpp2/transport/rocket/server/ThriftRocketServerHandler.h>

namespace apache {
namespace thrift {
namespace {

#define REGISTER_SERVER_EXTENSION_DEFAULT(FUNC)                   \
  THRIFT_PLUGGABLE_FUNC_REGISTER(                                 \
      std::unique_ptr<apache::thrift::rocket::SetupFrameHandler>, \
      FUNC,                                                       \
      apache::thrift::ThriftServer&) {                            \
    return {};                                                    \
  }

REGISTER_SERVER_EXTENSION_DEFAULT(createRocketDebugSetupFrameHandler)
REGISTER_SERVER_EXTENSION_DEFAULT(createRocketMonitoringSetupFrameHandler)
REGISTER_SERVER_EXTENSION_DEFAULT(createRocketProfilingSetupFrameHandler)

#undef REGISTER_SERVER_EXTENSION_DEFAULT

} // namespace

RocketRoutingHandler::RocketRoutingHandler(ThriftServer& server)
    : ingressMemoryLimitObserver_(
          folly::observer::makeObserver([&server]() -> int64_t {
            return **server.getIngressMemoryLimitObserver() /
                server.getNumIOWorkerThreads();
          })),
      minPayloadSizeToEnforceIngressMemoryLimitObserver_(
          server.getMinPayloadSizeToEnforceIngressMemoryLimitObserver()) {
  auto addSetupFramehandler = [&](auto&& handlerFactory) {
    if (auto handler = handlerFactory(server)) {
      setupFrameHandlers_.push_back(std::move(handler));
    }
  };
  addSetupFramehandler(
      THRIFT_PLUGGABLE_FUNC(createRocketDebugSetupFrameHandler));
  addSetupFramehandler(
      THRIFT_PLUGGABLE_FUNC(createRocketMonitoringSetupFrameHandler));
  addSetupFramehandler(
      THRIFT_PLUGGABLE_FUNC(createRocketProfilingSetupFrameHandler));
}

RocketRoutingHandler::~RocketRoutingHandler() {
  stopListening();
}

void RocketRoutingHandler::stopListening() {
  listening_ = false;
}

bool RocketRoutingHandler::canAcceptConnection(
    const std::vector<uint8_t>& bytes) {
  class FrameHeader {
   public:
    /*
     * Sample start of an Rsocket frame (version 1.0) in Octal:
     * 0x0000 2800 0000 0004 0000 0100 00....
     * Rsocket frame length - 24 bits
     * StreamId             - 32 bits
     * Frame type           -  6 bits
     * Flags                - 10 bits
     * Major version        - 16 bits
     * Minor version        - 16 bits
     */
    static uint16_t getMajorVersion(const std::vector<uint8_t>& bytes) {
      return bytes[9] << 8 | bytes[10];
    }
    static uint16_t getMinorVersion(const std::vector<uint8_t>& bytes) {
      return bytes[11] << 8 | bytes[12];
    }
    static rocket::FrameType getType(const std::vector<uint8_t>& bytes) {
      return rocket::FrameType(bytes[7] >> 2);
    }
  };

  return listening_ &&
      // This only supports Rsocket protocol version 1.0
      FrameHeader::getMajorVersion(bytes) == 1 &&
      FrameHeader::getMinorVersion(bytes) == 0 &&
      FrameHeader::getType(bytes) == rocket::FrameType::SETUP;
}

bool RocketRoutingHandler::canAcceptEncryptedConnection(
    const std::string& protocolName) {
  return listening_ && protocolName == "rs";
}

void RocketRoutingHandler::handleConnection(
    wangle::ConnectionManager* connectionManager,
    folly::AsyncTransport::UniquePtr sock,
    folly::SocketAddress const* address,
    wangle::TransportInfo const&,
    std::shared_ptr<Cpp2Worker> worker) {
  if (!listening_) {
    return;
  }

  auto* const sockPtr = sock.get();
  auto* const server = worker->getServer();
  auto memLimitParams =
      rocket::RocketServerConnection::IngressMemoryLimitStateRef(
          worker->getIngressMemoryUsageRef(),
          ingressMemoryLimitObserver_,
          minPayloadSizeToEnforceIngressMemoryLimitObserver_);
  auto* const connection = new rocket::RocketServerConnection(
      std::move(sock),
      std::make_unique<rocket::ThriftRocketServerHandler>(
          worker, *address, sockPtr, setupFrameHandlers_),
      server->getStreamExpireTime(),
      server->getWriteBatchingInterval(),
      server->getWriteBatchingSize(),
      std::move(memLimitParams));
  onConnection(*connection);
  // set negotiated compression algorithm on this connection
  auto compression = static_cast<FizzPeeker*>(worker->getFizzPeeker())
                         ->getNegotiatedParameters()
                         .compression;
  if (compression != CompressionAlgorithm::NONE) {
    connection->setNegotiatedCompressionAlgorithm(compression);
  }
  connectionManager->addConnection(connection);

  if (auto* observer = server->getObserver()) {
    observer->connAccepted();
    observer->activeConnections(
        connectionManager->getNumConnections() *
        server->getNumIOWorkerThreads());
  }
}

} // namespace thrift
} // namespace apache
