<?php


namespace Vu\AMQPCarapace\Connection;

use PhpAmqpLib\Connection\AMQPConnection;
use Phake;

class ConnectionTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var AMQPConnection
     */
    protected $amqp_connection;

    /**
     * @var Connection
     */
    protected $carapace_connection;

    public function setUp(){
        $this->amqp_connection = Phake::mock('PhpAmqpLib\Connection\AMQPConnection');
        $this->carapace_connection = new Connection();
        $this->carapace_connection->setAmqpConnection($this->amqp_connection);
    }

    public function test_closeShouldCallAmqpConnectionCloseIfConnectionIsNotNull(){
        $this->carapace_connection->close();

        Phake::verify($this->amqp_connection, Phake::times(1))
            ->close();
    }

    public function test_createChannelShouldReturnInstanceOfAmqpCarapaceChannel(){
        $expected = 'Vu\AMQPCarapace\Channel\Channel';
        $mock_amqp_channel = Phake::mock('PhpAmqpLib\Channel\AMQPChannel');
        Phake::when($this->amqp_connection)
            ->channel()
            ->thenReturn($mock_amqp_channel);

        $actual = $this->carapace_connection->createChannel();

        $this->assertInstanceOf($expected, $actual);
    }

    public function test_retrieveExistingChannelWithChannelId4ShouldReturnInstanceOfAmqpCarapaceChannel(){
        $channel_id = 4;
        $expected = 'Vu\AMQPCarapace\Channel\Channel';
        $mock_amqp_channel = Phake::mock('PhpAmqpLib\Channel\AMQPChannel');
        Phake::when($this->amqp_connection)
            ->channel($channel_id)
            ->thenReturn($mock_amqp_channel);

        $actual = $this->carapace_connection->retrieveExistingChannel($channel_id);

        $this->assertInstanceOf($expected, $actual);
    }

    public function test_retrieveExistingChannelWithChannelId99ShouldReturnInstanceOfAmqpCarapaceChannel(){
        $channel_id = 99;
        $expected = 'Vu\AMQPCarapace\Channel\Channel';
        $mock_amqp_channel = Phake::mock('PhpAmqpLib\Channel\AMQPChannel');
        Phake::when($this->amqp_connection)
            ->channel($channel_id)
            ->thenReturn($mock_amqp_channel);

        $actual = $this->carapace_connection->retrieveExistingChannel($channel_id);

        $this->assertInstanceOf($expected, $actual);
    }

}
 