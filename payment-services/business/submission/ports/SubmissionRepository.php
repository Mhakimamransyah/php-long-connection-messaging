<?php

namespace Business\submission\ports;

interface SubmissionRepository {
    public function store(array $payload) : bool;
}