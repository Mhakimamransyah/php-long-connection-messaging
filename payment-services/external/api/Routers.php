<?php

namespace Api;

use FrameworkX\App as App;
use Api\v1\approval\Router as ApprovalRouter;
use Config\Config;

class Routers
{
    public static function registerPath(App &$app, Config &$config) {
        (new ApprovalRouter())->init($app, $config)->registerPath();
    }
}