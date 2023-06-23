<?php

namespace Config\rabbitmq;

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;
use PhpAmqpLib\Channel\AMQPChannel;

class RabbitMqConfig {

    private AMQPChannel $channel;
    private AMQPStreamConnection $stream;
    private AMQPMessage $message;

    function __construct() {
        
        $this->stream  = new AMQPStreamConnection(
            RabbitMqConfig::config('host'),
            RabbitMqConfig::config('port'),
            RabbitMqConfig::config('user'),
            RabbitMqConfig::config('password')
        );

        $this->channel = $this->stream->channel();
        $this->message = new AMQPMessage();
    }

    public static function init() {
        return new RabbitMqConfig();
    }

    public static function config(string $name) : ?string {

        $config =  [
            'host'     => $_ENV['RABBIT_MQ_HOST'],
            'port'     => $_ENV['RABBIT_MQ_PORT'],
            'user'     => $_ENV['RABBIT_MQ_USER'],
            'password' => $_ENV['RABBIT_MQ_PASSWORD'],
            'qos'      => 5
        ];

        return $config[$name] ?? null;
    }

    public function channel() {
        return $this->channel;
    }

    public function stream() {
        return $this->stream;
    }

    public function setMessage($body) : AMQPMessage {
        $this->message->setBody(json_encode($body));
        return $this->message;
    }
}