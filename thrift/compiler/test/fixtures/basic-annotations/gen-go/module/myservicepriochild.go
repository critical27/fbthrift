// Autogenerated by Thrift Compiler (facebook)
// DO NOT EDIT UNLESS YOU ARE SURE THAT YOU KNOW WHAT YOU ARE DOING
// @generated

package module

import (
	"bytes"
	"context"
	"sync"
	"fmt"
	thrift "github.com/facebook/fbthrift/thrift/lib/go/thrift"
)

// (needed to ensure safety because of naive import list construction.)
var _ = thrift.ZERO
var _ = fmt.Printf
var _ = sync.Mutex{}
var _ = bytes.Equal
var _ = context.Background

type MyServicePrioChild interface {
MyServicePrioParent

  Pang() (err error)
}

type MyServicePrioChildClientInterface interface {
  thrift.ClientInterface
  Pang() (err error)
}

type MyServicePrioChildClient struct {
  MyServicePrioChildClientInterface
  *MyServicePrioParentClient
}

func(client *MyServicePrioChildClient) Open() error {
  return client.CC.Open()
}

func(client *MyServicePrioChildClient) Close() error {
  return client.CC.Close()
}

func(client *MyServicePrioChildClient) IsOpen() bool {
  return client.CC.IsOpen()
}

func NewMyServicePrioChildClientFactory(t thrift.Transport, f thrift.ProtocolFactory) *MyServicePrioChildClient {
  return &MyServicePrioChildClient{MyServicePrioParentClient: NewMyServicePrioParentClientFactory(t, f)}
}

func NewMyServicePrioChildClient(t thrift.Transport, iprot thrift.Protocol, oprot thrift.Protocol) *MyServicePrioChildClient {
  return &MyServicePrioChildClient{MyServicePrioParentClient: NewMyServicePrioParentClient(t, iprot, oprot)}
}

func NewMyServicePrioChildClientProtocol(prot thrift.Protocol) *MyServicePrioChildClient {
  return NewMyServicePrioChildClient(prot.Transport(), prot, prot)
}

func (p *MyServicePrioChildClient) Pang() (err error) {
  var args MyServicePrioChildPangArgs
  err = p.CC.SendMsg("pang", &args, thrift.CALL)
  if err != nil { return }
  return p.recvPang()
}


func (p *MyServicePrioChildClient) recvPang() (err error) {
  var result MyServicePrioChildPangResult
  return p.CC.RecvMsg("pang", &result)
}


type MyServicePrioChildThreadsafeClient struct {
  MyServicePrioChildClientInterface
  *MyServicePrioParentThreadsafeClient
}

func(client *MyServicePrioChildThreadsafeClient) Open() error {
  client.Mu.Lock()
  defer client.Mu.Unlock()
  return client.CC.Open()
}

func(client *MyServicePrioChildThreadsafeClient) Close() error {
  client.Mu.Lock()
  defer client.Mu.Unlock()
  return client.CC.Close()
}

func(client *MyServicePrioChildThreadsafeClient) IsOpen() bool {
  client.Mu.Lock()
  defer client.Mu.Unlock()
  return client.CC.IsOpen()
}

func NewMyServicePrioChildThreadsafeClientFactory(t thrift.Transport, f thrift.ProtocolFactory) *MyServicePrioChildThreadsafeClient {
  return &MyServicePrioChildThreadsafeClient{MyServicePrioParentThreadsafeClient: NewMyServicePrioParentThreadsafeClientFactory(t, f)}
}

func NewMyServicePrioChildThreadsafeClient(t thrift.Transport, iprot thrift.Protocol, oprot thrift.Protocol) *MyServicePrioChildThreadsafeClient {
  return &MyServicePrioChildThreadsafeClient{MyServicePrioParentThreadsafeClient: NewMyServicePrioParentThreadsafeClient(t, iprot, oprot)}
}

func NewMyServicePrioChildThreadsafeClientProtocol(prot thrift.Protocol) *MyServicePrioChildThreadsafeClient {
  return NewMyServicePrioChildThreadsafeClient(prot.Transport(), prot, prot)
}

func (p *MyServicePrioChildThreadsafeClient) Pang() (err error) {
  p.Mu.Lock()
  defer p.Mu.Unlock()
  var args MyServicePrioChildPangArgs
  err = p.CC.SendMsg("pang", &args, thrift.CALL)
  if err != nil { return }
  return p.recvPang()
}


func (p *MyServicePrioChildThreadsafeClient) recvPang() (err error) {
  var result MyServicePrioChildPangResult
  return p.CC.RecvMsg("pang", &result)
}


type MyServicePrioChildChannelClient struct {
  *MyServicePrioParentChannelClient
}

func (c *MyServicePrioChildChannelClient) Close() error {
  return c.RequestChannel.Close()
}

func (c *MyServicePrioChildChannelClient) IsOpen() bool {
  return c.RequestChannel.IsOpen()
}

func (c *MyServicePrioChildChannelClient) Open() error {
  return c.RequestChannel.Open()
}

func NewMyServicePrioChildChannelClient(channel thrift.RequestChannel) *MyServicePrioChildChannelClient {
  return &MyServicePrioChildChannelClient{MyServicePrioParentChannelClient: NewMyServicePrioParentChannelClient(channel)}
}

func (p *MyServicePrioChildChannelClient) Pang(ctx context.Context) (err error) {
  args := MyServicePrioChildPangArgs{
  }
  var result MyServicePrioChildPangResult
  err = p.RequestChannel.Call(ctx, "pang", &args, &result)
  if err != nil { return }

  return nil
}


type MyServicePrioChildProcessor struct {
  *MyServicePrioParentProcessor
}

func NewMyServicePrioChildProcessor(handler MyServicePrioChild) *MyServicePrioChildProcessor {
  self10 := &MyServicePrioChildProcessor{NewMyServicePrioParentProcessor(handler)}
  self10.AddToProcessorMap("pang", &myServicePrioChildProcessorPang{handler:handler})
  return self10
}

type myServicePrioChildProcessorPang struct {
  handler MyServicePrioChild
}

func (p *myServicePrioChildProcessorPang) Read(iprot thrift.Protocol) (thrift.Struct, thrift.Exception) {
  args := MyServicePrioChildPangArgs{}
  if err := args.Read(iprot); err != nil {
    return nil, err
  }
  iprot.ReadMessageEnd()
  return &args, nil
}

func (p *myServicePrioChildProcessorPang) Write(seqId int32, result thrift.WritableStruct, oprot thrift.Protocol) (err thrift.Exception) {
  var err2 error
  messageType := thrift.REPLY
  switch result.(type) {
  case thrift.ApplicationException:
    messageType = thrift.EXCEPTION
  }
  if err2 = oprot.WriteMessageBegin("pang", messageType, seqId); err2 != nil {
    err = err2
  }
  if err2 = result.Write(oprot); err == nil && err2 != nil {
    err = err2
  }
  if err2 = oprot.WriteMessageEnd(); err == nil && err2 != nil {
    err = err2
  }
  if err2 = oprot.Flush(); err == nil && err2 != nil {
    err = err2
  }
  return err
}

func (p *myServicePrioChildProcessorPang) Run(argStruct thrift.Struct) (thrift.WritableStruct, thrift.ApplicationException) {
  var result MyServicePrioChildPangResult
  if err := p.handler.Pang(); err != nil {
    switch err.(type) {
    default:
      x := thrift.NewApplicationException(thrift.INTERNAL_ERROR, "Internal error processing pang: " + err.Error())
      return x, x
    }
  }
  return &result, nil
}


// HELPER FUNCTIONS AND STRUCTURES

type MyServicePrioChildPangArgs struct {
  thrift.IRequest
}

func NewMyServicePrioChildPangArgs() *MyServicePrioChildPangArgs {
  return &MyServicePrioChildPangArgs{}
}

func (p *MyServicePrioChildPangArgs) Read(iprot thrift.Protocol) error {
  if _, err := iprot.ReadStructBegin(); err != nil {
    return thrift.PrependError(fmt.Sprintf("%T read error: ", p), err)
  }


  for {
    _, fieldTypeId, fieldId, err := iprot.ReadFieldBegin()
    if err != nil {
      return thrift.PrependError(fmt.Sprintf("%T field %d read error: ", p, fieldId), err)
    }
    if fieldTypeId == thrift.STOP { break; }
    if err := iprot.Skip(fieldTypeId); err != nil {
      return err
    }
    if err := iprot.ReadFieldEnd(); err != nil {
      return err
    }
  }
  if err := iprot.ReadStructEnd(); err != nil {
    return thrift.PrependError(fmt.Sprintf("%T read struct end error: ", p), err)
  }
  return nil
}

func (p *MyServicePrioChildPangArgs) Write(oprot thrift.Protocol) error {
  if err := oprot.WriteStructBegin("pang_args"); err != nil {
    return thrift.PrependError(fmt.Sprintf("%T write struct begin error: ", p), err) }
  if err := oprot.WriteFieldStop(); err != nil {
    return thrift.PrependError("write field stop error: ", err) }
  if err := oprot.WriteStructEnd(); err != nil {
    return thrift.PrependError("write struct stop error: ", err) }
  return nil
}

func (p *MyServicePrioChildPangArgs) String() string {
  if p == nil {
    return "<nil>"
  }

  return fmt.Sprintf("MyServicePrioChildPangArgs({})")
}

type MyServicePrioChildPangResult struct {
  thrift.IResponse
}

func NewMyServicePrioChildPangResult() *MyServicePrioChildPangResult {
  return &MyServicePrioChildPangResult{}
}

func (p *MyServicePrioChildPangResult) Read(iprot thrift.Protocol) error {
  if _, err := iprot.ReadStructBegin(); err != nil {
    return thrift.PrependError(fmt.Sprintf("%T read error: ", p), err)
  }


  for {
    _, fieldTypeId, fieldId, err := iprot.ReadFieldBegin()
    if err != nil {
      return thrift.PrependError(fmt.Sprintf("%T field %d read error: ", p, fieldId), err)
    }
    if fieldTypeId == thrift.STOP { break; }
    if err := iprot.Skip(fieldTypeId); err != nil {
      return err
    }
    if err := iprot.ReadFieldEnd(); err != nil {
      return err
    }
  }
  if err := iprot.ReadStructEnd(); err != nil {
    return thrift.PrependError(fmt.Sprintf("%T read struct end error: ", p), err)
  }
  return nil
}

func (p *MyServicePrioChildPangResult) Write(oprot thrift.Protocol) error {
  if err := oprot.WriteStructBegin("pang_result"); err != nil {
    return thrift.PrependError(fmt.Sprintf("%T write struct begin error: ", p), err) }
  if err := oprot.WriteFieldStop(); err != nil {
    return thrift.PrependError("write field stop error: ", err) }
  if err := oprot.WriteStructEnd(); err != nil {
    return thrift.PrependError("write struct stop error: ", err) }
  return nil
}

func (p *MyServicePrioChildPangResult) String() string {
  if p == nil {
    return "<nil>"
  }

  return fmt.Sprintf("MyServicePrioChildPangResult({})")
}


