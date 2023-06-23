<?php

namespace Repositories\approval;

use Config\Config;
use Business\approval\ports\ApprovalRepository as portRepository;

class ApprovalRepository implements portRepository{
    
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

    public function getListOfApprovedPayment(int $id) : array {
        return [];
    }

    public function getApprovedPayment() : array {
        return [];
    }

    public function publishPaidBacklog(array $payload) : bool {
        $messaging = $this->config->messaging();
        $message   = $messaging->setMessage($payload);
        $messaging->channel()->basic_publish($message, EXCHANGER, PAYMENT_APPROVAL_ROUTING_KEY);
        return true;
    }

}