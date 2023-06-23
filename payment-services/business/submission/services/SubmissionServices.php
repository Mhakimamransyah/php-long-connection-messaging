<?php

namespace Business\submission\services;

use Business\submission\ports\SubmissionService as portService;
use Business\submission\ports\SubmissionRepository;

class SubmissionServices implements portService {

    private SubmissionRepository $submissionRepository;

    function __construct(SubmissionRepository &$approvalRepository) {
        $this->submissionRepository = $approvalRepository;
    }
    
    public function submit(array $payload) : bool {
        print_r($payload);
        return true;
    }
    
}