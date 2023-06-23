<?php

namespace Consumer;

use Consumer\ConsumerResolver;
use Config\Config;
use Consumer\injectors\PaymentRequesterInjectors;

class Consumers extends ConsumerResolver
{
    public static function listen(Config &$config) : void
    {
        self::init()::register([
            PaymentRequesterInjectors::controller($config)
        ]);
    }
}