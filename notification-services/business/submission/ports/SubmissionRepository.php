<?php

namespace Business\submission\ports;

interface SubmissionRepository {
    public function store(array $payload) : bool;
    public function pushNotifications(array $payload) : bool;
    public function sendEmail(array $payload) : bool;
}