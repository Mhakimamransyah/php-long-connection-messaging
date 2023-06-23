<?php

namespace Business\approval\services;

use Business\approval\ports\ApprovalService as portService;
use Business\approval\ports\ApprovalRepository;

class ApprovalService implements portService {
    
    private ApprovalRepository $approvalRepository;

    function __construct(ApprovalRepository &$approvalRepository) {
        $this->approvalRepository = $approvalRepository;
    }

    public function approve(array $payload) : bool {
        
        $result = $this->approvalRepository->store($payload);
        $result = ($result) ? $this->approvalRepository->publishPaidBacklog($payload)  : $result;
        return true;
    }

    public function getApprovedPayment(?int $id) : array {
        return [];
    }
}