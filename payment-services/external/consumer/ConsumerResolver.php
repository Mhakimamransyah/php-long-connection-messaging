<?php

namespace Consumer;

use Bunny\Async\Client;
use Bunny\Channel;
use React\EventLoop\Loop;
use Config\rabbitmq\RabbitMqConfig;
use Config\Config;

abstract class ConsumerResolver implements Resolver {
    
    protected static array $options;

    public static function init() {

        self::$options = [
            'host'     => RabbitMqConfig::config("host"),
            'port'     => RabbitMqConfig::config("port"),
            'user'     => RabbitMqConfig::config("user"),
            'password' => RabbitMqConfig::config("password")
        ];

        return self::class;
    }

    public static function register(array $listeners) {
        foreach ($listeners as $listener)
        {
            $loop = new Client( Loop::get(), self::$options);
            $loop->connect()->then( function (Client $client) {
                return $client->channel();
            })->then(function (Channel $channel) use ($listener){
                $listener->invoke($channel);
            });
        }
    }
}

interface Resolver {
    public static function listen(Config &$config) : void;
}