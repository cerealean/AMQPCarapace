<?php


namespace Vu\AMQPCarapace\Model;

class Message {
    /**
     * @var string
     */
    public $body;
    /**
     * @var string
     */
    public $content_type;
    /**
     * @var string
     */
    public $content_encoding;
    /**
     * @var string[]
     */
    public $application_headers;
    /**
     * @var int
     */
    public $delivery_mode;
    /**
     * @var int
     */
    public $priority;
    /**
     * @var string
     */
    public $correlation_id;
    /**
     * @var string
     */
    public $reply_to;
    /**
     * @var string
     */
    public $expiration;
    /**
     * @var string
     */
    public $message_id;
    /**
     * @var string
     */
    public $timestamp;
    /**
     * @var string
     */
    public $type;
    /**
     * @var string
     */
    public $user_id;
    /**
     * @var string
     */
    public $app_id;
    /**
     * @var string
     */
    public $cluster_id;
}
 