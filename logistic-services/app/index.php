<?php

require __DIR__.'/../vendor/autoload.php';

use FrameworkX\App as App;
use Api\Routers;
use Consumer\Consumers;
use Config\Config;

(\Dotenv\Dotenv::createImmutable('env/'))->load();

$app    = new App();

$config = new Config();

Routers::registerPath($app, $config);

Consumers::listen($config);

$app->run();