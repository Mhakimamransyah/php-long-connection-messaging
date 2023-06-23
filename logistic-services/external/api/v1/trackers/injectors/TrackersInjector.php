<?php

namespace Api\v1\trackers\injectors;

use Config\Config;
use Api\v1\trackers\controller\TrackersController;
use Business\trackers\services\TrackersService;
use Repositories\trackers\TrackersRepository;
use Api\ControllerFactory as factory;

class TrackersInjector implements factory {
    
    public static function controller(?Config &$config) : array {

        $repository = new TrackersRepository($config);
        $service    = new TrackersService($repository);
        $controller = new TrackersController($service);

        return [$controller];
    }

}