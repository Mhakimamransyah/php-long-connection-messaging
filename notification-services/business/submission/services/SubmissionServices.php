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
        
        echo "\n-- JUST RECEIVED NEW NOTIFICATIONS --\n";
        print_r($payload);

        /**
         * processing notifications priority
         */

        $result = $this->submissionRepository->store($payload);
        if ($result) {
            $this->submissionRepository->pushNotifications($payload);
            $this->submissionRepository->sendEmail($payload);
        }
        
        return true;
    }
    
}