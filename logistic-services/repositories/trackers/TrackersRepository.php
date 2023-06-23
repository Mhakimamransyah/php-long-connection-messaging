<?php

namespace Repositories\trackers;

use Config\Config;
use Business\trackers\ports\TrackersRepository as portRepository;

class TrackersRepository implements portRepository{
    
    private Config $config;

    function __construct(&$config) {
        $this->config = $config;
    }

    public function updateStatus(array $payload) : bool {
        return true;
    }

    public function publishNotification(array $payload) : bool {
        $messaging = $this->config->messaging();
        $message   = $messaging->setMessage($payload);
        $messaging->channel()->basic_publish($message, EXCHANGER, LOGISTICS_DELIVER_STATUS_ROUTING_KEY);
        return true;
    }
}