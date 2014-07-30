<?php


namespace Vu\AMQPCarapace\Model;

class Transport {
    /**
     * @var string
     */
    public $exchange = "";
    /**
     * @var string
     */
    public $routing_key = "";
    /**
     * @var bool
     */
    public $mandatory = false;
    /**
     * @var bool
     */
    public $immediate = false;
    /**
     * @var mixed
     */
    public $ticket = null;
}
 