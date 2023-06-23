<?php

namespace Api\v1\approval\controller;

use Psr\Http\Message\ServerRequestInterface;
use Business\approval\ports\ApprovalService;
use Api\v1\approval\response\ApprovePaymentResponse;

class PaymentApprovalController {

    use ApprovePaymentResponse;

    private ?ServerRequestInterface $request = null;
    private ApprovalService $approvalService;

    function __construct(ApprovalService &$approvalService) {
        $this->approvalService = $approvalService;
    }

    public function __invoke(ServerRequestInterface &$request) {
        $this->request = $request;
        return call_user_func([$this, $this->request->getAttribute('callback-method-name')]);
    }

    private function getPaymentApproval() {
        return \React\Http\Message\Response::plaintext(
            "get payment approval"
        );
    }

    private function approvePayment() {

        $body   = $this->request->getParsedBody();
        $result = $this->approvalService->approve($body);
        
        if ($result) {
            return $this->successApproveResponse($body['id']);
        }

        return $this->successApproveResponse($body['id']);
    }
    
}

