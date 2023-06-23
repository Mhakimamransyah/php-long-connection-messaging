<?php

namespace Business\approval\ports;

interface ApprovalService {
    public function approve(array $payload) : bool;
    public function getApprovedPayment(?int $id) : array;
}