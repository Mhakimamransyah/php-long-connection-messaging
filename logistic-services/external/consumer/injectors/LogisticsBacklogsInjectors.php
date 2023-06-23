<?php

namespace Consumer\injectors;

use Config\Config;
use Consumer\ControllerFactory as factory;
use Business\submission\services\SubmissionServices;
use Repositories\submission\SubmissionRepository;
use Consumer\controllers\LogisticsBacklogsController;

class LogisticsBacklogsInjectors implements factory {
    
    public static function controller(?Config &$config) {

        $repository = new SubmissionRepository($config);
        $service    = new SubmissionServices($repository);
        $controller = new LogisticsBacklogsController($service);

        return $controller;
    }

}