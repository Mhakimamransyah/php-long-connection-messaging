<?php

namespace Repositories\submission;

use Config\Config;
use Business\submission\ports\SubmissionRepository as portRepository;

class SubmissionRepository implements portRepository{
    
    private Config $config;

    function __construct(&$config) {
        $this->config = $config;
    }

    public function store(array $payload) : bool {
        /**
         * DB implementation here
         */
        return true;
    }

    public function pushNotifications(array $payload) : bool {
        /**
         * Push notifications
         */
        return true;
    }

    public function sendEmail(array $payload) : bool {
        /**
         * send Email
         */
        return true;
    }
}