<?php

namespace Business\approval\ports;

interface ApprovalRepository {
    public function store(array $payload) : bool;
    public function getListOfApprovedPayment(int $id) : array;
    public function getApprovedPayment() : array;
    public function publishPaidBacklog(array $payload) : bool;
}