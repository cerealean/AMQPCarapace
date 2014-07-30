<?php


namespace Vu\AMQPCarapace\Model;

class ConnectionSettings {
    /**
     * @var string
     */
    public $host;
    /**
     * @var int
     */
    public $port;
    /**
     * @var string
     */
    public $user;
    /**
     * @var string
     */
    public $password;
    /**
     * @var string
     */
    public $vhost = "/";
    /**
     * @var bool
     */
    public $insist = false;
    /**
     * @var string
     */
    public $login_method = "AMQPLAIN";
    /**
     * @var mixed
     */
    public $login_response = null;
    /**
     * @var string
     */
    public $locale = "en_US";
    /**
     * @var int
     */
    public $connection_timeout = 3;
    /**
     * @var int
     */
    public $read_write_timeout = 3;
    /**
     * @var resource
     */
    public $context = null;
}
 