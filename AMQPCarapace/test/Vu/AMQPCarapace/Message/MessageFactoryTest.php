<?php


namespace Vu\AMQPCarapace\Message;


use Vu\AMQPCarapace\Model\Message;

class MessageFactoryTest extends \PHPUnit_Framework_TestCase {

    public function test_createAmqpMessageShouldCreateAmqpMessageWithMatchingBody(){
        $message = new Message();
        $expected = "rawr";
        $message->body = $expected;

        $amqp_message = MessageFactory::createAmqpMessage($message);
        $actual = $amqp_message->body;

        $this->assertEquals($expected, $actual);
    }

    public function test_createAmqpMessageShouldCreateAmqpMessageWithMatchingAppId(){
        $message = $this->createMessage();
        $object_vars = get_object_vars($message);
        $matching_property = 'app_id';
        $expected = $object_vars[$matching_property];

        $amqp_message = MessageFactory::createAmqpMessage($message);
        $amqp_properties = $amqp_message->get_properties();
        $actual = $amqp_properties[$matching_property];

        $this->assertEquals($expected, $actual);
    }

    public function test_createAmqpMessageShouldCreateAmqpMessageWithMatchingContentType(){
        $message = $this->createMessage();
        $object_vars = get_object_vars($message);
        $matching_property = 'content_type';
        $expected = $object_vars[$matching_property];

        $amqp_message = MessageFactory::createAmqpMessage($message);
        $amqp_properties = $amqp_message->get_properties();
        $actual = $amqp_properties[$matching_property];

        $this->assertEquals($expected, $actual);
    }

    public function test_createAmqpMessageShouldCreateAmqpMessageWithMatchingContentEncoding(){
        $message = $this->createMessage();
        $object_vars = get_object_vars($message);
        $matching_property = 'content_encoding';
        $expected = $object_vars[$matching_property];

        $amqp_message = MessageFactory::createAmqpMessage($message);
        $amqp_properties = $amqp_message->get_properties();
        $actual = $amqp_properties[$matching_property];

        $this->assertEquals($expected, $actual);
    }

    public function test_createAmqpMessageShouldCreateAmqpMessageWithMatchingApplicationHeaders(){
        $message = $this->createMessage();
        $object_vars = get_object_vars($message);
        $matching_property = 'application_headers';
        $expected = $object_vars[$matching_property];

        $amqp_message = MessageFactory::createAmqpMessage($message);
        $amqp_properties = $amqp_message->get_properties();
        $actual = $amqp_properties[$matching_property];

        $this->assertEquals($expected, $actual);
    }

    public function test_createAmqpMessageShouldCreateAmqpMessageWithMatchingDeliveryMode(){
        $message = $this->createMessage();
        $object_vars = get_object_vars($message);
        $matching_property = 'delivery_mode';
        $expected = $object_vars[$matching_property];

        $amqp_message = MessageFactory::createAmqpMessage($message);
        $amqp_properties = $amqp_message->get_properties();
        $actual = $amqp_properties[$matching_property];

        $this->assertEquals($expected, $actual);
    }

    public function test_createAmqpMessageShouldCreateAmqpMessageWithMatchingPriority(){
        $message = $this->createMessage();
        $object_vars = get_object_vars($message);
        $matching_property = 'priority';
        $expected = $object_vars[$matching_property];

        $amqp_message = MessageFactory::createAmqpMessage($message);
        $amqp_properties = $amqp_message->get_properties();
        $actual = $amqp_properties[$matching_property];

        $this->assertEquals($expected, $actual);
    }

    public function test_createAmqpMessageShouldCreateAmqpMessageWithMatchingCorrelationId(){
        $message = $this->createMessage();
        $object_vars = get_object_vars($message);
        $matching_property = 'correlation_id';
        $expected = $object_vars[$matching_property];

        $amqp_message = MessageFactory::createAmqpMessage($message);
        $amqp_properties = $amqp_message->get_properties();
        $actual = $amqp_properties[$matching_property];

        $this->assertEquals($expected, $actual);
    }

    public function test_createAmqpMessageShouldCreateAmqpMessageWithMatchingReplyTo(){
        $message = $this->createMessage();
        $object_vars = get_object_vars($message);
        $matching_property = 'reply_to';
        $expected = $object_vars[$matching_property];

        $amqp_message = MessageFactory::createAmqpMessage($message);
        $amqp_properties = $amqp_message->get_properties();
        $actual = $amqp_properties[$matching_property];

        $this->assertEquals($expected, $actual);
    }

    public function test_createAmqpMessageShouldCreateAmqpMessageWithMatchingExpiration(){
        $message = $this->createMessage();
        $object_vars = get_object_vars($message);
        $matching_property = 'expiration';
        $expected = $object_vars[$matching_property];

        $amqp_message = MessageFactory::createAmqpMessage($message);
        $amqp_properties = $amqp_message->get_properties();
        $actual = $amqp_properties[$matching_property];

        $this->assertEquals($expected, $actual);
    }

    public function test_createAmqpMessageShouldCreateAmqpMessageWithMatchingMessageId(){
        $message = $this->createMessage();
        $object_vars = get_object_vars($message);
        $matching_property = 'message_id';
        $expected = $object_vars[$matching_property];

        $amqp_message = MessageFactory::createAmqpMessage($message);
        $amqp_properties = $amqp_message->get_properties();
        $actual = $amqp_properties[$matching_property];

        $this->assertEquals($expected, $actual);
    }

    public function test_createAmqpMessageShouldCreateAmqpMessageWithMatchingTimestamp(){
        $message = $this->createMessage();
        $object_vars = get_object_vars($message);
        $matching_property = 'timestamp';
        $expected = $object_vars[$matching_property];

        $amqp_message = MessageFactory::createAmqpMessage($message);
        $amqp_properties = $amqp_message->get_properties();
        $actual = $amqp_properties[$matching_property];

        $this->assertEquals($expected, $actual);
    }

    public function test_createAmqpMessageShouldCreateAmqpMessageWithMatchingType(){
        $message = $this->createMessage();
        $object_vars = get_object_vars($message);
        $matching_property = 'type';
        $expected = $object_vars[$matching_property];

        $amqp_message = MessageFactory::createAmqpMessage($message);
        $amqp_properties = $amqp_message->get_properties();
        $actual = $amqp_properties[$matching_property];

        $this->assertEquals($expected, $actual);
    }

    /**
     * @return Message
     */
    private function createMessage(){
        $message = new Message();
        $message->app_id = "rawr";
        $message->delivery_mode = "rawr";
        $message->application_headers = "rawr";
        $message->cluster_id = "rawr";
        $message->content_encoding = "rawr";
        $message->content_type = "rawr";
        $message->correlation_id = "rawr";
        $message->expiration = "rawr";
        $message->message_id = "rawr";
        $message->priority = "rawr";
        $message->reply_to = "rawr";
        $message->timestamp = "rawr";
        $message->type = "rawr";
        $message->user_id = "rawr";

        return $message;
    }

}
 