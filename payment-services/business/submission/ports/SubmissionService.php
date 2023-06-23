<?php

namespace Business\submission\ports;

interface SubmissionService {
    public function submit(array $payload) : bool;
}