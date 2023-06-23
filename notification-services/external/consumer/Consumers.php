<?php

namespace Consumer;

use Consumer\ConsumerResolver;
use Config\Config;
use Consumer\injectors\NotificationBacklogsInjectors;

class Consumers extends ConsumerResolver
{
    public static function listen(Config &$config) : void
    {
        self::init()::register([
            NotificationBacklogsInjectors::controller($config)
        ]);
    }
}