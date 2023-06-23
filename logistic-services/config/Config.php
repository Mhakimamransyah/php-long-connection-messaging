<?php

namespace Config;

include_once 'config/Constants.php';

use Config\rabbitmq\RabbitMqConfig;

class Config {

    private RabbitMqConfig $rabbit;

    function __construct() {
        $this->rabbit = new RabbitMqConfig();
    }

    public function messaging() {
        return $this->rabbit;
    }
    
}