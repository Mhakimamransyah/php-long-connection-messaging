<?php

namespace Consumer\injectors;

use Config\Config;
use Consumer\ControllerFactory as factory;
use Business\submission\services\SubmissionServices;
use Repositories\submission\SubmissionRepository;
use Consumer\controllers\NotificationBacklogsController;

class NotificationBacklogsInjectors implements factory {
    
    public static function controller(?Config &$config) {

        $repository = new SubmissionRepository($config);
        $service    = new SubmissionServices($repository);
        $controller = new NotificationBacklogsController($service);

        return $controller;
    }

}