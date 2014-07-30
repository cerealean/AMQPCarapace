<?php


namespace Vu\AMQPCarapace\Connection;

use Vu\AMQPCarapace\Channel\Channel;
use Vu\AMQPCarapace\Model\ConnectionSettings;
use PhpAmqpLib\Connection\AMQPConnection;

class Connection {

    /**
     * @var AMQPConnection
     */
    protected $amqp_connection = null;

    /**
     * @param AMQPConnection $amqp_connection
     */
    public function setAmqpConnection(AMQPConnection $amqp_connection){
        $this->amqp_connection = $amqp_connection;
    }
    /**
     * @param ConnectionSettings $connection_settings
     */
    public function connect(ConnectionSettings $connection_settings){
        $this->amqp_connection = new AMQPConnection(
            $connection_settings->host,
            $connection_settings->port,
            $connection_settings->user,
            $connection_settings->password,
            $connection_settings->vhost,
            $connection_settings->insist,
            $connection_settings->login_method,
            $connection_settings->locale,
            $connection_settings->connection_timeout,
            $connection_settings->read_write_timeout,
            $connection_settings->context
        );
    }

    /**
     * @return mixed
     */
    public function close(){
        if($this->amqp_connection != null){
            $this->amqp_connection->close();
        }
    }

    /**
     * @return Channel
     */
    public function createChannel(){
        $channel = new Channel();
        $amqp_channel = $this->amqp_connection->channel();
        $channel->setAmqpChannel($amqp_channel);

        return $channel;
    }

    /**
     * @param int $channel_id
     * @return Channel
     */
    public function retrieveExistingChannel($channel_id){
        $channel = new Channel();
        $amqp_channel = $this->amqp_connection->channel($channel_id);
        $channel->setAmqpChannel($amqp_channel);

        return $channel;
    }

}
 