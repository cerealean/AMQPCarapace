<?php


namespace Vu\AMQPCarapace\Channel;

use Vu\AMQPCarapace\Message\MessageFactory;
use Vu\AMQPCarapace\Model\Message;
use Vu\AMQPCarapace\Model\Transport;
use PhpAmqpLib\Channel\AMQPChannel;

class Channel {

    /**
     * @var AMQPChannel
     */
    protected $amqp_channel = null;

    /**
     * @param AMQPChannel $amqp_channel
     */
    public function setAmqpChannel(AMQPChannel $amqp_channel){
        $this->amqp_channel = $amqp_channel;
    }

    /**
     * @return mixed
     */
    public function close(){
        if($this->amqp_channel != null){
            $this->amqp_channel->close();
        }
    }

    /**
     * @param Message $message
     * @param Transport $transport
     */
    public function basicPublish(Message $message, Transport $transport){
        $this->throwNotImplementedExceptionForTransportMandatoryTrue($transport);
        $amqp_message = MessageFactory::createAmqpMessage($message);
        $this->amqp_channel->basic_publish($amqp_message,
                                           $transport->exchange,
                                           $transport->routing_key,
                                           $transport->mandatory,
                                           $transport->immediate,
                                           $transport->ticket);
    }

    /**
     * @param Message $message
     * @param Transport $transport
     *
     * Adds a message to a queue of messages to be published
     */
    public function addMessageToBatchPublishQueue(Message $message, Transport $transport){
        $this->throwNotImplementedExceptionForTransportMandatoryTrue($transport);
        $amqp_message = MessageFactory::createAmqpMessage($message);
        $this->amqp_channel->batch_basic_publish($amqp_message,
                                           $transport->exchange,
                                           $transport->routing_key,
                                           $transport->mandatory,
                                           $transport->immediate,
                                           $transport->ticket);
    }

    /**
     * @param Transport $transport
     * @throws \Exception
     *
     * This is only implemented temporarily until further versions where the mandatory option will be used
     */
    private function throwNotImplementedExceptionForTransportMandatoryTrue(Transport $transport){
        if($transport->mandatory){
            throw new \Exception("Mandatory option not implemented");
        }
    }

    /**
     * Publishes all of the messages added to the batch queue
     */
    public function basicPublishBatch(){
        $this->amqp_channel->publish_batch();
    }

}
 