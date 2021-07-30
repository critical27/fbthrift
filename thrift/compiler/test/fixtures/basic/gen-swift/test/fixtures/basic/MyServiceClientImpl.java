/**
 * Autogenerated by Thrift
 *
 * DO NOT EDIT UNLESS YOU ARE SURE THAT YOU KNOW WHAT YOU ARE DOING
 *  @generated
 */

package test.fixtures.basic;

import com.facebook.nifty.client.RequestChannel;
import com.facebook.swift.codec.*;
import com.facebook.swift.service.*;
import com.facebook.swift.service.metadata.*;
import com.facebook.swift.transport.client.*;
import com.facebook.swift.transport.util.FutureUtil;
import java.io.*;
import java.lang.reflect.Method;
import java.util.*;
import org.apache.thrift.ProtocolId;
import reactor.core.publisher.Mono;

@SwiftGenerated
public class MyServiceClientImpl extends AbstractThriftClient implements MyService {


    // Method Handlers
    private ThriftMethodHandler pingMethodHandler;
    private ThriftMethodHandler getRandomDataMethodHandler;
    private ThriftMethodHandler sinkMethodHandler;
    private ThriftMethodHandler putDataByIdMethodHandler;
    private ThriftMethodHandler hasDataByIdMethodHandler;
    private ThriftMethodHandler getDataByIdMethodHandler;
    private ThriftMethodHandler deleteDataByIdMethodHandler;
    private ThriftMethodHandler lobDataByIdMethodHandler;

    // Method Exceptions
    private static final Class[] pingExceptions = new Class[] {
        org.apache.thrift.TException.class};
    private static final Class[] getRandomDataExceptions = new Class[] {
        org.apache.thrift.TException.class};
    private static final Class[] sinkExceptions = new Class[] {
        org.apache.thrift.TException.class};
    private static final Class[] putDataByIdExceptions = new Class[] {
        org.apache.thrift.TException.class};
    private static final Class[] hasDataByIdExceptions = new Class[] {
        org.apache.thrift.TException.class};
    private static final Class[] getDataByIdExceptions = new Class[] {
        org.apache.thrift.TException.class};
    private static final Class[] deleteDataByIdExceptions = new Class[] {
        org.apache.thrift.TException.class};
    private static final Class[] lobDataByIdExceptions = new Class[] {
        org.apache.thrift.TException.class};

    public MyServiceClientImpl(
        RequestChannel channel,
        Map<Method, ThriftMethodHandler> methods,
        Map<String, String> headers,
        Map<String, String> persistentHeaders,
        List<? extends ThriftClientEventHandler> eventHandlers) {
      super(channel, headers, persistentHeaders, eventHandlers);

      Map<String, ThriftMethodHandler> methodHandlerMap = new HashMap<>();
      methods.forEach(
          (key, value) -> {
            methodHandlerMap.put(key.getName(), value);
          });

      // Set method handlers
      pingMethodHandler = methodHandlerMap.get("ping");
      getRandomDataMethodHandler = methodHandlerMap.get("getRandomData");
      sinkMethodHandler = methodHandlerMap.get("sink");
      putDataByIdMethodHandler = methodHandlerMap.get("putDataById");
      hasDataByIdMethodHandler = methodHandlerMap.get("hasDataById");
      getDataByIdMethodHandler = methodHandlerMap.get("getDataById");
      deleteDataByIdMethodHandler = methodHandlerMap.get("deleteDataById");
      lobDataByIdMethodHandler = methodHandlerMap.get("lobDataById");
    }

    public MyServiceClientImpl(
        Map<String, String> headers,
        Map<String, String> persistentHeaders,
        Mono<? extends RpcClient> rpcClient,
        ThriftServiceMetadata serviceMetadata,
        ThriftCodecManager codecManager,
        ProtocolId protocolId,
        Map<Method, ThriftMethodHandler> methods) {
      super(headers, persistentHeaders, rpcClient, serviceMetadata, codecManager, protocolId);

      Map<String, ThriftMethodHandler> methodHandlerMap = new HashMap<>();
      methods.forEach(
          (key, value) -> {
            methodHandlerMap.put(key.getName(), value);
          });

      // Set method handlers
      pingMethodHandler = methodHandlerMap.get("ping");
      getRandomDataMethodHandler = methodHandlerMap.get("getRandomData");
      sinkMethodHandler = methodHandlerMap.get("sink");
      putDataByIdMethodHandler = methodHandlerMap.get("putDataById");
      hasDataByIdMethodHandler = methodHandlerMap.get("hasDataById");
      getDataByIdMethodHandler = methodHandlerMap.get("getDataById");
      deleteDataByIdMethodHandler = methodHandlerMap.get("deleteDataById");
      lobDataByIdMethodHandler = methodHandlerMap.get("lobDataById");
    }

    @java.lang.Override
    public void close() {
        super.close();
    }


    @java.lang.Override
    public void ping() throws org.apache.thrift.TException {
      pingWrapper(RpcOptions.EMPTY).getData();
    }

    @java.lang.Override
    public void ping(
        RpcOptions rpcOptions) throws org.apache.thrift.TException {
      pingWrapper(rpcOptions).getData();
    }

    @java.lang.Override
    public ResponseWrapper<Void> pingWrapper(
        RpcOptions rpcOptions) throws org.apache.thrift.TException {
      try {
        return FutureUtil.get(executeWrapperWithOptions(pingMethodHandler, pingExceptions, rpcOptions));
      } catch (Throwable t) {
        if (t instanceof org.apache.thrift.TException) {
          throw (org.apache.thrift.TException) t;
        }
        throw new org.apache.thrift.TException(t);
      }
    }

    @java.lang.Override
    public String getRandomData() throws org.apache.thrift.TException {
      return getRandomDataWrapper(RpcOptions.EMPTY).getData();
    }

    @java.lang.Override
    public String getRandomData(
        RpcOptions rpcOptions) throws org.apache.thrift.TException {
      return getRandomDataWrapper(rpcOptions).getData();
    }

    @java.lang.Override
    public ResponseWrapper<String> getRandomDataWrapper(
        RpcOptions rpcOptions) throws org.apache.thrift.TException {
      try {
        return FutureUtil.get(executeWrapperWithOptions(getRandomDataMethodHandler, getRandomDataExceptions, rpcOptions));
      } catch (Throwable t) {
        if (t instanceof org.apache.thrift.TException) {
          throw (org.apache.thrift.TException) t;
        }
        throw new org.apache.thrift.TException(t);
      }
    }

    @java.lang.Override
    public void sink(
        long sink) throws org.apache.thrift.TException {
      sinkWrapper(sink, RpcOptions.EMPTY).getData();
    }

    @java.lang.Override
    public void sink(
        long sink,
        RpcOptions rpcOptions) throws org.apache.thrift.TException {
      sinkWrapper(sink, rpcOptions).getData();
    }

    @java.lang.Override
    public ResponseWrapper<Void> sinkWrapper(
        long sink,
        RpcOptions rpcOptions) throws org.apache.thrift.TException {
      try {
        return FutureUtil.get(executeWrapperWithOptions(sinkMethodHandler, sinkExceptions, rpcOptions, sink));
      } catch (Throwable t) {
        if (t instanceof org.apache.thrift.TException) {
          throw (org.apache.thrift.TException) t;
        }
        throw new org.apache.thrift.TException(t);
      }
    }

    @java.lang.Override
    public void putDataById(
        long id,
        String data) throws org.apache.thrift.TException {
      putDataByIdWrapper(id, data, RpcOptions.EMPTY).getData();
    }

    @java.lang.Override
    public void putDataById(
        long id,
        String data,
        RpcOptions rpcOptions) throws org.apache.thrift.TException {
      putDataByIdWrapper(id, data, rpcOptions).getData();
    }

    @java.lang.Override
    public ResponseWrapper<Void> putDataByIdWrapper(
        long id,
        String data,
        RpcOptions rpcOptions) throws org.apache.thrift.TException {
      try {
        return FutureUtil.get(executeWrapperWithOptions(putDataByIdMethodHandler, putDataByIdExceptions, rpcOptions, id, data));
      } catch (Throwable t) {
        if (t instanceof org.apache.thrift.TException) {
          throw (org.apache.thrift.TException) t;
        }
        throw new org.apache.thrift.TException(t);
      }
    }

    @java.lang.Override
    public boolean hasDataById(
        long id) throws org.apache.thrift.TException {
      return hasDataByIdWrapper(id, RpcOptions.EMPTY).getData();
    }

    @java.lang.Override
    public boolean hasDataById(
        long id,
        RpcOptions rpcOptions) throws org.apache.thrift.TException {
      return hasDataByIdWrapper(id, rpcOptions).getData();
    }

    @java.lang.Override
    public ResponseWrapper<Boolean> hasDataByIdWrapper(
        long id,
        RpcOptions rpcOptions) throws org.apache.thrift.TException {
      try {
        return FutureUtil.get(executeWrapperWithOptions(hasDataByIdMethodHandler, hasDataByIdExceptions, rpcOptions, id));
      } catch (Throwable t) {
        if (t instanceof org.apache.thrift.TException) {
          throw (org.apache.thrift.TException) t;
        }
        throw new org.apache.thrift.TException(t);
      }
    }

    @java.lang.Override
    public String getDataById(
        long id) throws org.apache.thrift.TException {
      return getDataByIdWrapper(id, RpcOptions.EMPTY).getData();
    }

    @java.lang.Override
    public String getDataById(
        long id,
        RpcOptions rpcOptions) throws org.apache.thrift.TException {
      return getDataByIdWrapper(id, rpcOptions).getData();
    }

    @java.lang.Override
    public ResponseWrapper<String> getDataByIdWrapper(
        long id,
        RpcOptions rpcOptions) throws org.apache.thrift.TException {
      try {
        return FutureUtil.get(executeWrapperWithOptions(getDataByIdMethodHandler, getDataByIdExceptions, rpcOptions, id));
      } catch (Throwable t) {
        if (t instanceof org.apache.thrift.TException) {
          throw (org.apache.thrift.TException) t;
        }
        throw new org.apache.thrift.TException(t);
      }
    }

    @java.lang.Override
    public void deleteDataById(
        long id) throws org.apache.thrift.TException {
      deleteDataByIdWrapper(id, RpcOptions.EMPTY).getData();
    }

    @java.lang.Override
    public void deleteDataById(
        long id,
        RpcOptions rpcOptions) throws org.apache.thrift.TException {
      deleteDataByIdWrapper(id, rpcOptions).getData();
    }

    @java.lang.Override
    public ResponseWrapper<Void> deleteDataByIdWrapper(
        long id,
        RpcOptions rpcOptions) throws org.apache.thrift.TException {
      try {
        return FutureUtil.get(executeWrapperWithOptions(deleteDataByIdMethodHandler, deleteDataByIdExceptions, rpcOptions, id));
      } catch (Throwable t) {
        if (t instanceof org.apache.thrift.TException) {
          throw (org.apache.thrift.TException) t;
        }
        throw new org.apache.thrift.TException(t);
      }
    }

    @java.lang.Override
    public void lobDataById(
        long id,
        String data) throws org.apache.thrift.TException {
      lobDataByIdWrapper(id, data, RpcOptions.EMPTY).getData();
    }

    @java.lang.Override
    public void lobDataById(
        long id,
        String data,
        RpcOptions rpcOptions) throws org.apache.thrift.TException {
      lobDataByIdWrapper(id, data, rpcOptions).getData();
    }

    @java.lang.Override
    public ResponseWrapper<Void> lobDataByIdWrapper(
        long id,
        String data,
        RpcOptions rpcOptions) throws org.apache.thrift.TException {
      try {
        return FutureUtil.get(executeWrapperWithOptions(lobDataByIdMethodHandler, lobDataByIdExceptions, rpcOptions, id, data));
      } catch (Throwable t) {
        if (t instanceof org.apache.thrift.TException) {
          throw (org.apache.thrift.TException) t;
        }
        throw new org.apache.thrift.TException(t);
      }
    }
}
