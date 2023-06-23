<?php

namespace Business\trackers\ports;

interface TrackersRepository {
    public function updateStatus(array $payload) : bool;
    public function publishNotification(array $payload) : bool;
}