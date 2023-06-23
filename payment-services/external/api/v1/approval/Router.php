<?php

namespace Api\v1\approval;

use Api\RouterResolver;
use Api\v1\approval\injectors\PaymentApprovalInjector;

class Router extends RouterResolver {

    public function registerPath() : void
    {
        $this->resolve([
            ['GET','/api/v1/approval','getPaymentApproval',PaymentApprovalInjector::class],
            ['GET','/api/v1/approval/{id}','getPaymentApproval',PaymentApprovalInjector::class],
            ['GET','/api/v1/approval/{id}/invoice','getInvoiceApproval',PaymentApprovalInjector::class],
            ['POST','/api/v1/approval','approvePayment',PaymentApprovalInjector::class]
        ]);
    }

}