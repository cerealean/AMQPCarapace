<?php


namespace Vu\AMQPCarapace\Channel;

use Vu\AMQPCarapace\Message\MessageFactory;
use Vu\AMQPCarapace\Model\Message;
use Vu\AMQPCarapace\Model\Transport;
use PhpAmqpLib\Channel\AMQPChannel;
use Phake;

class ChannelTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var AMQPChannel
     */
    protected $amqp_channel;

    /**
     * @var Channel
     */
    protected $carapace_channel;

    public function setUp(){
        $this->amqp_channel = Phake::mock('PhpAmqpLib\Channel\AMQPChannel');
        $this->carapace_channel = new Channel();
        $this->carapace_channel->setAmqpChannel($this->amqp_channel);
    }

    private function generateMessage(){
        $message = new Message();
        $message->body = "rawr";
        $message->content_type = "text/plain";
        $message->content_encoding = "UTF-8";

        return $message;
    }

    private function generateTransport(){
        $transport = new Transport();
        $transport->exchange = "rawr_exchange";

        return $transport;
    }

    public function test_basicPublishShouldCallAmqpBasicPublishWithCorrectAmqpMessage(){
        $message = $this->generateMessage();
        $transport = $this->generateTransport();
        $amqp_message = MessageFactory::createAmqpMessage($message);

        $this->carapace_channel->basicPublish($message, $transport);

        Phake::verify($this->amqp_channel)
            ->basic_publish($amqp_message, $transport->exchange, $transport->routing_key, $transport->mandatory, $transport->immediate, $transport->ticket);
    }

    public function test_basicPublishShouldCallAmqpBasicPublishWithCorrectTransportExchange(){
        $message = $this->generateMessage();
        $transport = $this->generateTransport();
        $transport->exchange = "test exchange";
        $amqp_message = MessageFactory::createAmqpMessage($message);

        $this->carapace_channel->basicPublish($message, $transport);

        Phake::verify($this->amqp_channel)
            ->basic_publish($amqp_message, $transport->exchange, $transport->routing_key, $transport->mandatory, $transport->immediate, $transport->ticket);
    }

    public function test_basicPublishShouldCallAmqpBasicPublishWithCorrectTransportRoutingKey(){
        $message = $this->generateMessage();
        $transport = $this->generateTransport();
        $transport->routing_key = "test routing key";
        $amqp_message = MessageFactory::createAmqpMessage($message);

        $this->carapace_channel->basicPublish($message, $transport);

        Phake::verify($this->amqp_channel)
            ->basic_publish($amqp_message, $transport->exchange, $transport->routing_key, $transport->mandatory, $transport->immediate, $transport->ticket);
    }

    public function test_basicPublishShouldCallAmqpBasicPublishWithCorrectTransportMandatory(){
        $message = $this->generateMessage();
        $transport = $this->generateTransport();
        $transport->routing_key = "test mandatory";
        $amqp_message = MessageFactory::createAmqpMessage($message);

        $this->carapace_channel->basicPublish($message, $transport);

        Phake::verify($this->amqp_channel)
            ->basic_publish($amqp_message, $transport->exchange, $transport->routing_key, $transport->mandatory, $transport->immediate, $transport->ticket);
    }

    public function test_basicPublishShouldCallAmqpBasicPublishWithCorrectTransportImmediate(){
        $message = $this->generateMessage();
        $transport = $this->generateTransport();
        $transport->routing_key = "test immediate";
        $amqp_message = MessageFactory::createAmqpMessage($message);

        $this->carapace_channel->basicPublish($message, $transport);

        Phake::verify($this->amqp_channel)
            ->basic_publish($amqp_message, $transport->exchange, $transport->routing_key, $transport->mandatory, $transport->immediate, $transport->ticket);
    }

    public function test_basicPublishShouldCallAmqpBasicPublishWithCorrectTransportTicket(){
        $message = $this->generateMessage();
        $transport = $this->generateTransport();
        $transport->routing_key = "test ticket";
        $amqp_message = MessageFactory::createAmqpMessage($message);

        $this->carapace_channel->basicPublish($message, $transport);

        Phake::verify($this->amqp_channel)
            ->basic_publish($amqp_message, $transport->exchange, $transport->routing_key, $transport->mandatory, $transport->immediate, $transport->ticket);
    }

    public function test_addMessageToBatchPublishQueueShouldCallAmqpBatchBasicPublishWithCorrectAmqpMessage(){
        $message = $this->generateMessage();
        $transport = $this->generateTransport();
        $amqp_message = MessageFactory::createAmqpMessage($message);

        $this->carapace_channel->basicPublish($message, $transport);

        Phake::verify($this->amqp_channel)
            ->basic_publish($amqp_message, $transport->exchange, $transport->routing_key, $transport->mandatory, $transport->immediate, $transport->ticket);
    }

    public function test_addMessageToBatchPublishQueueShouldCallAmqpBatchBasicPublishWithCorrectTransportExchange(){
        $message = $this->generateMessage();
        $transport = $this->generateTransport();
        $transport->exchange = "test exchange";
        $amqp_message = MessageFactory::createAmqpMessage($message);

        $this->carapace_channel->basicPublish($message, $transport);

        Phake::verify($this->amqp_channel)
            ->basic_publish($amqp_message, $transport->exchange, $transport->routing_key, $transport->mandatory, $transport->immediate, $transport->ticket);
    }

    public function test_addMessageToBatchPublishQueueShouldCallAmqpBatchBasicPublishWithCorrectTransportRoutingKey(){
        $message = $this->generateMessage();
        $transport = $this->generateTransport();
        $transport->routing_key = "test routing key";
        $amqp_message = MessageFactory::createAmqpMessage($message);

        $this->carapace_channel->basicPublish($message, $transport);

        Phake::verify($this->amqp_channel)
            ->basic_publish($amqp_message, $transport->exchange, $transport->routing_key, $transport->mandatory, $transport->immediate, $transport->ticket);
    }

    public function test_addMessageToBatchPublishQueueShouldCallAmqpBatchBasicPublishWithCorrectTransportMandatory(){
        $message = $this->generateMessage();
        $transport = $this->generateTransport();
        $transport->routing_key = "test mandatory";
        $amqp_message = MessageFactory::createAmqpMessage($message);

        $this->carapace_channel->basicPublish($message, $transport);

        Phake::verify($this->amqp_channel)
            ->basic_publish($amqp_message, $transport->exchange, $transport->routing_key, $transport->mandatory, $transport->immediate, $transport->ticket);
    }

    public function test_addMessageToBatchPublishQueueShouldCallAmqpBatchBasicPublishWithCorrectTransportImmediate(){
        $message = $this->generateMessage();
        $transport = $this->generateTransport();
        $transport->routing_key = "test immediate";
        $amqp_message = MessageFactory::createAmqpMessage($message);

        $this->carapace_channel->basicPublish($message, $transport);

        Phake::verify($this->amqp_channel)
            ->basic_publish($amqp_message, $transport->exchange, $transport->routing_key, $transport->mandatory, $transport->immediate, $transport->ticket);
    }

    public function test_addMessageToBatchPublishQueueShouldCallAmqpBatchBasicPublishWithCorrectTransportTicket(){
        $message = $this->generateMessage();
        $transport = $this->generateTransport();
        $transport->routing_key = "test ticket";
        $amqp_message = MessageFactory::createAmqpMessage($message);

        $this->carapace_channel->basicPublish($message, $transport);

        Phake::verify($this->amqp_channel)
            ->basic_publish($amqp_message, $transport->exchange, $transport->routing_key, $transport->mandatory, $transport->immediate, $transport->ticket);
    }

    public function test_basicPublishBatchShouldCallAmqpChannelPublishBatch(){
        $this->carapace_channel->basicPublishBatch();

        Phake::verify($this->amqp_channel)
            ->publish_batch();
    }

    public function test_closeShouldCallAmqpChannelCloseIfAmqpChannelIsNotNull(){
        $this->carapace_channel->close();

        Phake::verify($this->amqp_channel)
            ->close();
    }

}
 