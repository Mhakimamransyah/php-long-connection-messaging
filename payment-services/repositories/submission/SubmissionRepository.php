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
}