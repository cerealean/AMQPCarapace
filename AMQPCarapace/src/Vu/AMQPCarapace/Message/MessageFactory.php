<?php


namespace Vu\AMQPCarapace\Message;

use Vu\AMQPCarapace\Model\Message;
use PhpAmqpLib\Message\AMQPMessage;

class MessageFactory {

    /**
     * @param Message $message
     * @return AMQPMessage
     */
    public static function createAmqpMessage(Message $message){
        $message_body = $message->body;
        $message_properties = self::generateMessageProperties($message);
        $amqp_message = new AMQPMessage($message_body, $message_properties);

        return $amqp_message;
    }

    /**
     * @param Message $message
     * @return array
     */
    private static function generateMessageProperties(Message $message){
        $object_properties = get_object_vars($message);
        $message_properties = [];
        unset($object_properties['body']);
        foreach ($object_properties as $key => $value) {
            if(isset($value) && $value != null){
                $message_properties[$key] = $value;
            }
        }

        return $message_properties;
    }

}
 