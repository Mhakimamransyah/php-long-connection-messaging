<?php

namespace Api\v1\approval\injectors;

use Config\Config;
use Api\v1\approval\controller\PaymentApprovalController;
use Business\approval\services\ApprovalService;
use Repositories\approval\ApprovalRepository;
use Api\ControllerFactory as factory;

class PaymentApprovalInjector implements factory {
    
    public static function controller(?Config &$config) : array {

        $repository = new ApprovalRepository($config);
        $service    = new ApprovalService($repository);
        $controller = new PaymentApprovalController($service);

        return [$controller];
    }

}