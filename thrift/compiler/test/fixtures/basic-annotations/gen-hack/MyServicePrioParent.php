<?hh // strict
/**
 * Autogenerated by Thrift
 *
 * DO NOT EDIT UNLESS YOU ARE SURE THAT YOU KNOW WHAT YOU ARE DOING
 *  @generated
 */

/**
 * Original thrift service:-
 * MyServicePrioParent
 */
interface MyServicePrioParentAsyncIf extends \IThriftAsyncIf {
  /**
   * Original thrift definition:-
   * void
   *   ping();
   */
  public function ping(): Awaitable<void>;

  /**
   * Original thrift definition:-
   * void
   *   pong();
   */
  public function pong(): Awaitable<void>;
}

/**
 * Original thrift service:-
 * MyServicePrioParent
 */
interface MyServicePrioParentIf extends \IThriftSyncIf {
  /**
   * Original thrift definition:-
   * void
   *   ping();
   */
  public function ping(): void;

  /**
   * Original thrift definition:-
   * void
   *   pong();
   */
  public function pong(): void;
}

/**
 * Original thrift service:-
 * MyServicePrioParent
 */
interface MyServicePrioParentClientIf extends \IThriftSyncIf {
  /**
   * Original thrift definition:-
   * void
   *   ping();
   */
  public function ping(): Awaitable<void>;

  /**
   * Original thrift definition:-
   * void
   *   pong();
   */
  public function pong(): Awaitable<void>;
}

/**
 * Original thrift service:-
 * MyServicePrioParent
 */
interface MyServicePrioParentAsyncRpcOptionsIf extends \IThriftAsyncRpcOptionsIf {
  /**
   * Original thrift definition:-
   * void
   *   ping();
   */
  public function ping(\RpcOptions $rpc_options): Awaitable<void>;

  /**
   * Original thrift definition:-
   * void
   *   pong();
   */
  public function pong(\RpcOptions $rpc_options): Awaitable<void>;
}

/**
 * Original thrift service:-
 * MyServicePrioParent
 */
trait MyServicePrioParentClientBase {
  require extends \ThriftClientBase;

  protected function sendImpl_ping(): int {
    $currentseqid = $this->getNextSequenceID();
    $args = MyServicePrioParent_ping_args::withDefaultValues();
    try {
      $this->eventHandler_->preSend('ping', $args, $currentseqid);
      if ($this->output_ is \TBinaryProtocolAccelerated)
      {
        \thrift_protocol_write_binary($this->output_, 'ping', \TMessageType::CALL, $args, $currentseqid, $this->output_->isStrictWrite(), false);
      }
      else if ($this->output_ is \TCompactProtocolAccelerated)
      {
        \thrift_protocol_write_compact($this->output_, 'ping', \TMessageType::CALL, $args, $currentseqid, false);
      }
      else
      {
        $this->output_->writeMessageBegin('ping', \TMessageType::CALL, $currentseqid);
        $args->write($this->output_);
        $this->output_->writeMessageEnd();
        $this->output_->getTransport()->flush();
      }
    } catch (\THandlerShortCircuitException $ex) {
      switch ($ex->resultType) {
        case \THandlerShortCircuitException::R_EXPECTED_EX:
        case \THandlerShortCircuitException::R_UNEXPECTED_EX:
          $this->eventHandler_->sendError('ping', $args, $currentseqid, $ex->result);
          throw $ex->result;
        case \THandlerShortCircuitException::R_SUCCESS:
        default:
          $this->eventHandler_->postSend('ping', $args, $currentseqid);
          return $currentseqid;
      }
    } catch (\Exception $ex) {
      $this->eventHandler_->sendError('ping', $args, $currentseqid, $ex);
      throw $ex;
    }
    $this->eventHandler_->postSend('ping', $args, $currentseqid);
    return $currentseqid;
  }

  protected function recvImpl_ping(?int $expectedsequenceid = null, shape(?'read_options' => int) $options = shape()): void {
    try {
      $this->eventHandler_->preRecv('ping', $expectedsequenceid);
      if ($this->input_ is \TBinaryProtocolAccelerated) {
        $result = \thrift_protocol_read_binary($this->input_, 'MyServicePrioParent_ping_result', $this->input_->isStrictRead(), Shapes::idx($options, 'read_options', 0));
      } else if ($this->input_ is \TCompactProtocolAccelerated)
      {
        $result = \thrift_protocol_read_compact($this->input_, 'MyServicePrioParent_ping_result', Shapes::idx($options, 'read_options', 0));
      }
      else
      {
        $rseqid = 0;
        $fname = '';
        $mtype = 0;

        $this->input_->readMessageBegin(
          inout $fname,
          inout $mtype,
          inout $rseqid,
        );
        if ($mtype == \TMessageType::EXCEPTION) {
          $x = new \TApplicationException();
          $x->read($this->input_);
          $this->input_->readMessageEnd();
          throw $x;
        }
        $result = MyServicePrioParent_ping_result::withDefaultValues();
        $result->read($this->input_);
        $this->input_->readMessageEnd();
        if ($expectedsequenceid !== null && ($rseqid != $expectedsequenceid)) {
          throw new \TProtocolException("ping failed: sequence id is out of order");
        }
      }
    } catch (\THandlerShortCircuitException $ex) {
      switch ($ex->resultType) {
        case \THandlerShortCircuitException::R_EXPECTED_EX:
          $this->eventHandler_->recvException('ping', $expectedsequenceid, $ex->result);
          throw $ex->result;
        case \THandlerShortCircuitException::R_UNEXPECTED_EX:
          $this->eventHandler_->recvError('ping', $expectedsequenceid, $ex->result);
          throw $ex->result;
        case \THandlerShortCircuitException::R_SUCCESS:
        default:
          $this->eventHandler_->postRecv('ping', $expectedsequenceid, $ex->result);
          return;
      }
    } catch (\Exception $ex) {
      $this->eventHandler_->recvError('ping', $expectedsequenceid, $ex);
      throw $ex;
    }
    $this->eventHandler_->postRecv('ping', $expectedsequenceid, null);
    return;
  }

  protected function sendImpl_pong(): int {
    $currentseqid = $this->getNextSequenceID();
    $args = MyServicePrioParent_pong_args::withDefaultValues();
    try {
      $this->eventHandler_->preSend('pong', $args, $currentseqid);
      if ($this->output_ is \TBinaryProtocolAccelerated)
      {
        \thrift_protocol_write_binary($this->output_, 'pong', \TMessageType::CALL, $args, $currentseqid, $this->output_->isStrictWrite(), false);
      }
      else if ($this->output_ is \TCompactProtocolAccelerated)
      {
        \thrift_protocol_write_compact($this->output_, 'pong', \TMessageType::CALL, $args, $currentseqid, false);
      }
      else
      {
        $this->output_->writeMessageBegin('pong', \TMessageType::CALL, $currentseqid);
        $args->write($this->output_);
        $this->output_->writeMessageEnd();
        $this->output_->getTransport()->flush();
      }
    } catch (\THandlerShortCircuitException $ex) {
      switch ($ex->resultType) {
        case \THandlerShortCircuitException::R_EXPECTED_EX:
        case \THandlerShortCircuitException::R_UNEXPECTED_EX:
          $this->eventHandler_->sendError('pong', $args, $currentseqid, $ex->result);
          throw $ex->result;
        case \THandlerShortCircuitException::R_SUCCESS:
        default:
          $this->eventHandler_->postSend('pong', $args, $currentseqid);
          return $currentseqid;
      }
    } catch (\Exception $ex) {
      $this->eventHandler_->sendError('pong', $args, $currentseqid, $ex);
      throw $ex;
    }
    $this->eventHandler_->postSend('pong', $args, $currentseqid);
    return $currentseqid;
  }

  protected function recvImpl_pong(?int $expectedsequenceid = null, shape(?'read_options' => int) $options = shape()): void {
    try {
      $this->eventHandler_->preRecv('pong', $expectedsequenceid);
      if ($this->input_ is \TBinaryProtocolAccelerated) {
        $result = \thrift_protocol_read_binary($this->input_, 'MyServicePrioParent_pong_result', $this->input_->isStrictRead(), Shapes::idx($options, 'read_options', 0));
      } else if ($this->input_ is \TCompactProtocolAccelerated)
      {
        $result = \thrift_protocol_read_compact($this->input_, 'MyServicePrioParent_pong_result', Shapes::idx($options, 'read_options', 0));
      }
      else
      {
        $rseqid = 0;
        $fname = '';
        $mtype = 0;

        $this->input_->readMessageBegin(
          inout $fname,
          inout $mtype,
          inout $rseqid,
        );
        if ($mtype == \TMessageType::EXCEPTION) {
          $x = new \TApplicationException();
          $x->read($this->input_);
          $this->input_->readMessageEnd();
          throw $x;
        }
        $result = MyServicePrioParent_pong_result::withDefaultValues();
        $result->read($this->input_);
        $this->input_->readMessageEnd();
        if ($expectedsequenceid !== null && ($rseqid != $expectedsequenceid)) {
          throw new \TProtocolException("pong failed: sequence id is out of order");
        }
      }
    } catch (\THandlerShortCircuitException $ex) {
      switch ($ex->resultType) {
        case \THandlerShortCircuitException::R_EXPECTED_EX:
          $this->eventHandler_->recvException('pong', $expectedsequenceid, $ex->result);
          throw $ex->result;
        case \THandlerShortCircuitException::R_UNEXPECTED_EX:
          $this->eventHandler_->recvError('pong', $expectedsequenceid, $ex->result);
          throw $ex->result;
        case \THandlerShortCircuitException::R_SUCCESS:
        default:
          $this->eventHandler_->postRecv('pong', $expectedsequenceid, $ex->result);
          return;
      }
    } catch (\Exception $ex) {
      $this->eventHandler_->recvError('pong', $expectedsequenceid, $ex);
      throw $ex;
    }
    $this->eventHandler_->postRecv('pong', $expectedsequenceid, null);
    return;
  }

}

class MyServicePrioParentAsyncClient extends \ThriftClientBase implements MyServicePrioParentAsyncIf {
  use MyServicePrioParentClientBase;

  /**
   * Original thrift definition:-
   * void
   *   ping();
   */
  public async function ping(): Awaitable<void> {
    await $this->asyncHandler_->genBefore("MyServicePrioParent", "ping");
    $currentseqid = $this->sendImpl_ping();
    $channel = $this->channel_;
    $out_transport = $this->output_->getTransport();
    $in_transport = $this->input_->getTransport();
    if ($channel !== null && $out_transport is \TMemoryBuffer && $in_transport is \TMemoryBuffer) {
      $msg = $out_transport->getBuffer();
      $out_transport->resetBuffer();
      list($result_msg, $_read_headers) = await $channel->genSendRequestResponse(new \RpcOptions(), $msg);
      $in_transport->resetBuffer();
      $in_transport->write($result_msg);
    } else {
      await $this->asyncHandler_->genWait($currentseqid);
    }
    $this->recvImpl_ping($currentseqid);
  }

  /**
   * Original thrift definition:-
   * void
   *   pong();
   */
  public async function pong(): Awaitable<void> {
    await $this->asyncHandler_->genBefore("MyServicePrioParent", "pong");
    $currentseqid = $this->sendImpl_pong();
    $channel = $this->channel_;
    $out_transport = $this->output_->getTransport();
    $in_transport = $this->input_->getTransport();
    if ($channel !== null && $out_transport is \TMemoryBuffer && $in_transport is \TMemoryBuffer) {
      $msg = $out_transport->getBuffer();
      $out_transport->resetBuffer();
      list($result_msg, $_read_headers) = await $channel->genSendRequestResponse(new \RpcOptions(), $msg);
      $in_transport->resetBuffer();
      $in_transport->write($result_msg);
    } else {
      await $this->asyncHandler_->genWait($currentseqid);
    }
    $this->recvImpl_pong($currentseqid);
  }

}

class MyServicePrioParentClient extends \ThriftClientBase implements MyServicePrioParentClientIf {
  use MyServicePrioParentClientBase;

  /**
   * Original thrift definition:-
   * void
   *   ping();
   */
  public async function ping(): Awaitable<void> {
    await $this->asyncHandler_->genBefore("MyServicePrioParent", "ping");
    $currentseqid = $this->sendImpl_ping();
    $channel = $this->channel_;
    $out_transport = $this->output_->getTransport();
    $in_transport = $this->input_->getTransport();
    if ($channel !== null && $out_transport is \TMemoryBuffer && $in_transport is \TMemoryBuffer) {
      $msg = $out_transport->getBuffer();
      $out_transport->resetBuffer();
      list($result_msg, $_read_headers) = await $channel->genSendRequestResponse(new \RpcOptions(), $msg);
      $in_transport->resetBuffer();
      $in_transport->write($result_msg);
    } else {
      await $this->asyncHandler_->genWait($currentseqid);
    }
    $this->recvImpl_ping($currentseqid);
  }

  /**
   * Original thrift definition:-
   * void
   *   pong();
   */
  public async function pong(): Awaitable<void> {
    await $this->asyncHandler_->genBefore("MyServicePrioParent", "pong");
    $currentseqid = $this->sendImpl_pong();
    $channel = $this->channel_;
    $out_transport = $this->output_->getTransport();
    $in_transport = $this->input_->getTransport();
    if ($channel !== null && $out_transport is \TMemoryBuffer && $in_transport is \TMemoryBuffer) {
      $msg = $out_transport->getBuffer();
      $out_transport->resetBuffer();
      list($result_msg, $_read_headers) = await $channel->genSendRequestResponse(new \RpcOptions(), $msg);
      $in_transport->resetBuffer();
      $in_transport->write($result_msg);
    } else {
      await $this->asyncHandler_->genWait($currentseqid);
    }
    $this->recvImpl_pong($currentseqid);
  }

  /* send and recv functions */
  public function send_ping(): int {
    return $this->sendImpl_ping();
  }
  public function recv_ping(?int $expectedsequenceid = null): void {
    $this->recvImpl_ping($expectedsequenceid);
  }
  public function send_pong(): int {
    return $this->sendImpl_pong();
  }
  public function recv_pong(?int $expectedsequenceid = null): void {
    $this->recvImpl_pong($expectedsequenceid);
  }
}

class MyServicePrioParentAsyncRpcOptionsClient extends \ThriftClientBase implements MyServicePrioParentAsyncRpcOptionsIf {
  use MyServicePrioParentClientBase;

  /**
   * Original thrift definition:-
   * void
   *   ping();
   */
  public async function ping(\RpcOptions $rpc_options): Awaitable<void> {
    await $this->asyncHandler_->genBefore("MyServicePrioParent", "ping");
    $currentseqid = $this->sendImpl_ping();
    $channel = $this->channel_;
    $out_transport = $this->output_->getTransport();
    $in_transport = $this->input_->getTransport();
    if ($channel !== null && $out_transport is \TMemoryBuffer && $in_transport is \TMemoryBuffer) {
      $msg = $out_transport->getBuffer();
      $out_transport->resetBuffer();
      list($result_msg, $_read_headers) = await $channel->genSendRequestResponse($rpc_options, $msg);
      $in_transport->resetBuffer();
      $in_transport->write($result_msg);
    } else {
      await $this->asyncHandler_->genWait($currentseqid);
    }
    $this->recvImpl_ping($currentseqid);
  }

  /**
   * Original thrift definition:-
   * void
   *   pong();
   */
  public async function pong(\RpcOptions $rpc_options): Awaitable<void> {
    await $this->asyncHandler_->genBefore("MyServicePrioParent", "pong");
    $currentseqid = $this->sendImpl_pong();
    $channel = $this->channel_;
    $out_transport = $this->output_->getTransport();
    $in_transport = $this->input_->getTransport();
    if ($channel !== null && $out_transport is \TMemoryBuffer && $in_transport is \TMemoryBuffer) {
      $msg = $out_transport->getBuffer();
      $out_transport->resetBuffer();
      list($result_msg, $_read_headers) = await $channel->genSendRequestResponse($rpc_options, $msg);
      $in_transport->resetBuffer();
      $in_transport->write($result_msg);
    } else {
      await $this->asyncHandler_->genWait($currentseqid);
    }
    $this->recvImpl_pong($currentseqid);
  }

}

abstract class MyServicePrioParentAsyncProcessorBase extends \ThriftAsyncProcessor {
  abstract const type TThriftIf as MyServicePrioParentAsyncIf;
  protected async function process_ping(int $seqid, \TProtocol $input, \TProtocol $output): Awaitable<void> {
    $handler_ctx = $this->eventHandler_->getHandlerContext('ping');
    $reply_type = \TMessageType::REPLY;

    $this->eventHandler_->preRead($handler_ctx, 'ping', dict[]);

    if ($input is \TBinaryProtocolAccelerated) {
      $args = \thrift_protocol_read_binary_struct($input, 'MyServicePrioParent_ping_args');
    } else if ($input is \TCompactProtocolAccelerated) {
      $args = \thrift_protocol_read_compact_struct($input, 'MyServicePrioParent_ping_args');
    } else {
      $args = MyServicePrioParent_ping_args::withDefaultValues();
      $args->read($input);
    }
    $input->readMessageEnd();
    $this->eventHandler_->postRead($handler_ctx, 'ping', $args);
    $result = MyServicePrioParent_ping_result::withDefaultValues();
    try {
      $this->eventHandler_->preExec($handler_ctx, 'MyServicePrioParent', 'ping', $args);
      await $this->handler->ping();
      $this->eventHandler_->postExec($handler_ctx, 'ping', $result);
    } catch (\Exception $ex) {
      $reply_type = \TMessageType::EXCEPTION;
      $this->eventHandler_->handlerError($handler_ctx, 'ping', $ex);
      $result = new \TApplicationException($ex->getMessage()."\n".$ex->getTraceAsString());
    }
    $this->eventHandler_->preWrite($handler_ctx, 'ping', $result);
    if ($output is \TBinaryProtocolAccelerated)
    {
      \thrift_protocol_write_binary($output, 'ping', $reply_type, $result, $seqid, $output->isStrictWrite());
    }
    else if ($output is \TCompactProtocolAccelerated)
    {
      \thrift_protocol_write_compact($output, 'ping', $reply_type, $result, $seqid);
    }
    else
    {
      $output->writeMessageBegin("ping", $reply_type, $seqid);
      $result->write($output);
      $output->writeMessageEnd();
      $output->getTransport()->flush();
    }
    $this->eventHandler_->postWrite($handler_ctx, 'ping', $result);
  }
  protected async function process_pong(int $seqid, \TProtocol $input, \TProtocol $output): Awaitable<void> {
    $handler_ctx = $this->eventHandler_->getHandlerContext('pong');
    $reply_type = \TMessageType::REPLY;

    $this->eventHandler_->preRead($handler_ctx, 'pong', dict[]);

    if ($input is \TBinaryProtocolAccelerated) {
      $args = \thrift_protocol_read_binary_struct($input, 'MyServicePrioParent_pong_args');
    } else if ($input is \TCompactProtocolAccelerated) {
      $args = \thrift_protocol_read_compact_struct($input, 'MyServicePrioParent_pong_args');
    } else {
      $args = MyServicePrioParent_pong_args::withDefaultValues();
      $args->read($input);
    }
    $input->readMessageEnd();
    $this->eventHandler_->postRead($handler_ctx, 'pong', $args);
    $result = MyServicePrioParent_pong_result::withDefaultValues();
    try {
      $this->eventHandler_->preExec($handler_ctx, 'MyServicePrioParent', 'pong', $args);
      await $this->handler->pong();
      $this->eventHandler_->postExec($handler_ctx, 'pong', $result);
    } catch (\Exception $ex) {
      $reply_type = \TMessageType::EXCEPTION;
      $this->eventHandler_->handlerError($handler_ctx, 'pong', $ex);
      $result = new \TApplicationException($ex->getMessage()."\n".$ex->getTraceAsString());
    }
    $this->eventHandler_->preWrite($handler_ctx, 'pong', $result);
    if ($output is \TBinaryProtocolAccelerated)
    {
      \thrift_protocol_write_binary($output, 'pong', $reply_type, $result, $seqid, $output->isStrictWrite());
    }
    else if ($output is \TCompactProtocolAccelerated)
    {
      \thrift_protocol_write_compact($output, 'pong', $reply_type, $result, $seqid);
    }
    else
    {
      $output->writeMessageBegin("pong", $reply_type, $seqid);
      $result->write($output);
      $output->writeMessageEnd();
      $output->getTransport()->flush();
    }
    $this->eventHandler_->postWrite($handler_ctx, 'pong', $result);
  }
}
class MyServicePrioParentAsyncProcessor extends MyServicePrioParentAsyncProcessorBase {
  const type TThriftIf = MyServicePrioParentAsyncIf;
}

abstract class MyServicePrioParentSyncProcessorBase extends \ThriftSyncProcessor {
  abstract const type TThriftIf as MyServicePrioParentIf;
  protected function process_ping(int $seqid, \TProtocol $input, \TProtocol $output): void {
    $handler_ctx = $this->eventHandler_->getHandlerContext('ping');
    $reply_type = \TMessageType::REPLY;

    $this->eventHandler_->preRead($handler_ctx, 'ping', dict[]);

    if ($input is \TBinaryProtocolAccelerated) {
      $args = \thrift_protocol_read_binary_struct($input, 'MyServicePrioParent_ping_args');
    } else if ($input is \TCompactProtocolAccelerated) {
      $args = \thrift_protocol_read_compact_struct($input, 'MyServicePrioParent_ping_args');
    } else {
      $args = MyServicePrioParent_ping_args::withDefaultValues();
      $args->read($input);
    }
    $input->readMessageEnd();
    $this->eventHandler_->postRead($handler_ctx, 'ping', $args);
    $result = MyServicePrioParent_ping_result::withDefaultValues();
    try {
      $this->eventHandler_->preExec($handler_ctx, 'MyServicePrioParent', 'ping', $args);
      $this->handler->ping();
      $this->eventHandler_->postExec($handler_ctx, 'ping', $result);
    } catch (\Exception $ex) {
      $reply_type = \TMessageType::EXCEPTION;
      $this->eventHandler_->handlerError($handler_ctx, 'ping', $ex);
      $result = new \TApplicationException($ex->getMessage()."\n".$ex->getTraceAsString());
    }
    $this->eventHandler_->preWrite($handler_ctx, 'ping', $result);
    if ($output is \TBinaryProtocolAccelerated)
    {
      \thrift_protocol_write_binary($output, 'ping', $reply_type, $result, $seqid, $output->isStrictWrite());
    }
    else if ($output is \TCompactProtocolAccelerated)
    {
      \thrift_protocol_write_compact($output, 'ping', $reply_type, $result, $seqid);
    }
    else
    {
      $output->writeMessageBegin("ping", $reply_type, $seqid);
      $result->write($output);
      $output->writeMessageEnd();
      $output->getTransport()->flush();
    }
    $this->eventHandler_->postWrite($handler_ctx, 'ping', $result);
  }
  protected function process_pong(int $seqid, \TProtocol $input, \TProtocol $output): void {
    $handler_ctx = $this->eventHandler_->getHandlerContext('pong');
    $reply_type = \TMessageType::REPLY;

    $this->eventHandler_->preRead($handler_ctx, 'pong', dict[]);

    if ($input is \TBinaryProtocolAccelerated) {
      $args = \thrift_protocol_read_binary_struct($input, 'MyServicePrioParent_pong_args');
    } else if ($input is \TCompactProtocolAccelerated) {
      $args = \thrift_protocol_read_compact_struct($input, 'MyServicePrioParent_pong_args');
    } else {
      $args = MyServicePrioParent_pong_args::withDefaultValues();
      $args->read($input);
    }
    $input->readMessageEnd();
    $this->eventHandler_->postRead($handler_ctx, 'pong', $args);
    $result = MyServicePrioParent_pong_result::withDefaultValues();
    try {
      $this->eventHandler_->preExec($handler_ctx, 'MyServicePrioParent', 'pong', $args);
      $this->handler->pong();
      $this->eventHandler_->postExec($handler_ctx, 'pong', $result);
    } catch (\Exception $ex) {
      $reply_type = \TMessageType::EXCEPTION;
      $this->eventHandler_->handlerError($handler_ctx, 'pong', $ex);
      $result = new \TApplicationException($ex->getMessage()."\n".$ex->getTraceAsString());
    }
    $this->eventHandler_->preWrite($handler_ctx, 'pong', $result);
    if ($output is \TBinaryProtocolAccelerated)
    {
      \thrift_protocol_write_binary($output, 'pong', $reply_type, $result, $seqid, $output->isStrictWrite());
    }
    else if ($output is \TCompactProtocolAccelerated)
    {
      \thrift_protocol_write_compact($output, 'pong', $reply_type, $result, $seqid);
    }
    else
    {
      $output->writeMessageBegin("pong", $reply_type, $seqid);
      $result->write($output);
      $output->writeMessageEnd();
      $output->getTransport()->flush();
    }
    $this->eventHandler_->postWrite($handler_ctx, 'pong', $result);
  }
}
class MyServicePrioParentSyncProcessor extends MyServicePrioParentSyncProcessorBase {
  const type TThriftIf = MyServicePrioParentIf;
}
// For backwards compatibility
class MyServicePrioParentProcessor extends MyServicePrioParentSyncProcessor {}

// HELPER FUNCTIONS AND STRUCTURES

class MyServicePrioParent_ping_args implements \IThriftStruct, \IThriftShapishStruct {
  use \ThriftSerializationTrait;

  const dict<int, this::TFieldSpec> SPEC = dict[
  ];
  const dict<string, int> FIELDMAP = dict[
  ];

  const type TConstructorShape = shape(
  );

  const type TShape = shape(
    ...
  );
  const int STRUCTURAL_ID = 957977401221134810;

  public function __construct(  )[] {
  }

  public static function withDefaultValues()[]: this {
    return new static();
  }

  public static function fromShape(self::TConstructorShape $shape)[]: this {
    return new static(
    );
  }

  public function getName(): string {
    return 'MyServicePrioParent_ping_args';
  }

  public static function getAllStructuredAnnotations(): \TStructAnnotations {
    return shape(
      'struct' => dict[],
      'fields' => dict[
      ],
    );
  }

  public static function __fromShape(self::TShape $shape)[]: this {
    return new static(
    );
  }

  public function __toShape()[]: self::TShape {
    return shape(
    );
  }
  public function readFromJson(string $jsonText): void {
    $parsed = json_decode($jsonText, true);

    if ($parsed === null || !($parsed is KeyedContainer<_, _>)) {
      throw new \TProtocolException("Cannot parse the given json string.");
    }

  }

}

class MyServicePrioParent_ping_result implements \IThriftStruct {
  use \ThriftSerializationTrait;

  const dict<int, this::TFieldSpec> SPEC = dict[
  ];
  const dict<string, int> FIELDMAP = dict[
  ];

  const type TConstructorShape = shape(
  );

  const int STRUCTURAL_ID = 957977401221134810;

  public function __construct(  )[] {
  }

  public static function withDefaultValues()[]: this {
    return new static();
  }

  public static function fromShape(self::TConstructorShape $shape)[]: this {
    return new static(
    );
  }

  public function getName(): string {
    return 'MyServicePrioParent_ping_result';
  }

  public static function getAllStructuredAnnotations(): \TStructAnnotations {
    return shape(
      'struct' => dict[],
      'fields' => dict[
      ],
    );
  }

  public function readFromJson(string $jsonText): void {
    $parsed = json_decode($jsonText, true);

    if ($parsed === null || !($parsed is KeyedContainer<_, _>)) {
      throw new \TProtocolException("Cannot parse the given json string.");
    }

  }

}

class MyServicePrioParent_pong_args implements \IThriftStruct, \IThriftShapishStruct {
  use \ThriftSerializationTrait;

  const dict<int, this::TFieldSpec> SPEC = dict[
  ];
  const dict<string, int> FIELDMAP = dict[
  ];

  const type TConstructorShape = shape(
  );

  const type TShape = shape(
    ...
  );
  const int STRUCTURAL_ID = 957977401221134810;

  public function __construct(  )[] {
  }

  public static function withDefaultValues()[]: this {
    return new static();
  }

  public static function fromShape(self::TConstructorShape $shape)[]: this {
    return new static(
    );
  }

  public function getName(): string {
    return 'MyServicePrioParent_pong_args';
  }

  public static function getAllStructuredAnnotations(): \TStructAnnotations {
    return shape(
      'struct' => dict[],
      'fields' => dict[
      ],
    );
  }

  public static function __fromShape(self::TShape $shape)[]: this {
    return new static(
    );
  }

  public function __toShape()[]: self::TShape {
    return shape(
    );
  }
  public function readFromJson(string $jsonText): void {
    $parsed = json_decode($jsonText, true);

    if ($parsed === null || !($parsed is KeyedContainer<_, _>)) {
      throw new \TProtocolException("Cannot parse the given json string.");
    }

  }

}

class MyServicePrioParent_pong_result implements \IThriftStruct {
  use \ThriftSerializationTrait;

  const dict<int, this::TFieldSpec> SPEC = dict[
  ];
  const dict<string, int> FIELDMAP = dict[
  ];

  const type TConstructorShape = shape(
  );

  const int STRUCTURAL_ID = 957977401221134810;

  public function __construct(  )[] {
  }

  public static function withDefaultValues()[]: this {
    return new static();
  }

  public static function fromShape(self::TConstructorShape $shape)[]: this {
    return new static(
    );
  }

  public function getName(): string {
    return 'MyServicePrioParent_pong_result';
  }

  public static function getAllStructuredAnnotations(): \TStructAnnotations {
    return shape(
      'struct' => dict[],
      'fields' => dict[
      ],
    );
  }

  public function readFromJson(string $jsonText): void {
    $parsed = json_decode($jsonText, true);

    if ($parsed === null || !($parsed is KeyedContainer<_, _>)) {
      throw new \TProtocolException("Cannot parse the given json string.");
    }

  }

}

class MyServicePrioParentStaticMetadata implements \IThriftServiceStaticMetadata {
  public static function getServiceMetadata(): \tmeta_ThriftService {
    return tmeta_ThriftService::fromShape(
      shape(
        "name" => "MyServicePrioParent",
        "functions" => vec[
          tmeta_ThriftFunction::fromShape(
            shape(
              "name" => "ping",
              "return_type" => tmeta_ThriftType::fromShape(
                shape(
                  "t_primitive" => tmeta_ThriftPrimitiveType::THRIFT_VOID_TYPE,
                )
              ),
            )
          ),
          tmeta_ThriftFunction::fromShape(
            shape(
              "name" => "pong",
              "return_type" => tmeta_ThriftType::fromShape(
                shape(
                  "t_primitive" => tmeta_ThriftPrimitiveType::THRIFT_VOID_TYPE,
                )
              ),
            )
          ),
        ],
      )
    );
  }
  public static function getAllStructuredAnnotations(): \TServiceAnnotations {
    return shape(
      'service' => dict[],
      'functions' => dict[
      ],
    );
  }
}

