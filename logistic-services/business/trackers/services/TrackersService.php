<?php

namespace Business\trackers\services;

use Business\trackers\ports\TrackersService as portService;
use Business\trackers\ports\TrackersRepository;

class TrackersService implements portService
{
    private TrackersRepository $trackingRepository;

    function __construct(TrackersRepository &$trackingRepository) {
        $this->trackingRepository = $trackingRepository;
    }

    public function cascading(array $payload) : bool {
        $result = $this->trackingRepository->updateStatus($payload);
        $result = ($result)? $this->trackingRepository->publishNotification($payload) : $result;
        return $result;
    }
}