AMQPCarapace
============
[![Build Status](https://travis-ci.org/vuhl/AMQPCarapace.svg?branch=master)](https://travis-ci.org/vuhl/AMQPCarapace)
Introduction
------------
AMQPCarapace is a simple wrapper for [videlalvaro/php-amqplib](https://github.com/videlalvaro/php-amqplib)
to make using its features easier and a little cleaner.

Important Notes
---------------
- AMQPCarapace currently only has publish capabilities. Consuming and other abilities may be added in the future.
- Mandatory flag on a message is not currently supported. You should keep this flag as false otherwise an exception will be thrown.

Installation Using Composer
---------------------------
Add "vu/amqp-carapace" to the require section of your composer.json file and run a respective install or update.
For more information on Composer, please visit [their website](https://getcomposer.org/).

Basic Usage
-----------

Creating a Connection
---------------------
Begin by creating a ConnectionSettings object with all of your exchange connection settings

```php
$connection_settings = new \Vu\AMQPCarapace\Model\ConnectionSettings();
$connection_settings->host = "0.0.0.0";
$connection_settings->port = 12345;
$connection_settings->user = "john";
$connection_settings->password = "smith";

$amqp_connection = new \Vu\AMQPCarapace\Connection\Connection();
$amqp_connection->connect($connection_settings);
```

Creating or Opening a Channel
-----------------------------
Using your AMQP connection object, you can create a new channel or retrieve an existing one. This will return an AMQPChannel object which has wrapped the basic functionality of a videlalvaro/php-amqplib AMQPChannel object.

```php
//Create a new channel
$amqp_channel = $amqp_connection->createChannel();
//OR retrieve an existing channel
$channel_id = 12;
$amqp_channel = $amqp_connection->retrieveExistingChannel($channel_id);
```

Publishing a Single Message
--------------------
Create a transport object with your exchange-specific information and a message object with your message properties. After creating these objects, you pass them into the basicPublish method.

```php
$transport = new \Vu\AMQPCarapace\Model\Transport();
$transport->exchange = "php_test";
$transport->routing_key = "php_key";

$message = new \Vu\AMQPCarapace\Model\Message();
$message->body = "This is my message - rawr";
$message->content_type = "text/plain";
$message->content_encoding = "UTF-8";

$amqp_channel->basicPublish($message, $transport);
```

Batch Publishing Messages
-------------------------
Use the same transport and message setup as publishing a single message above. Then add each message to the batch publish queue. Finally, call basicPublishBatch();

```php
//Create messages 1, 2, and 3...
//Create transport 2

$amqp_channel->addMessageToBatchPublishQueue($message_1, $transport);
$amqp_channel->addMessageToBatchPublishQueue($message_2, $transport);
$amqp_channel->addMessageToBatchPublishQueue($message_3, $transport_2);
$amqp_channel->basicPublishBatch(); //Publishes all 3 messages with their separate transport settings
```

Closing a Channel or Connection
-------------------------------
Just simply call close on the channel or connection object

```php
$amqp_channel->close();
$amqp_connection->close();
```
