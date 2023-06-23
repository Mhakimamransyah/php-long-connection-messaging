<?php

namespace Business\trackers\ports;

interface TrackersService {
    public function cascading(array $payload) : bool;
}