<?php

namespace Api;

use FrameworkX\App as App;
use Config\Config;
use Api\v1\trackers\Router as TrackersRouter;

class Routers
{
    public static function registerPath(App &$app, Config &$config) {
        (new TrackersRouter())->init($app, $config)->registerPath();
    }
}