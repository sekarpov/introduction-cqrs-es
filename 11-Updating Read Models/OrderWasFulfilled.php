<?php

class OrderWasFulfilled {
    private $employeeId;
    private $orderId;

    public function __construct($orderId, $employeeId) {
        $this->employeeId = $employeeId;
        $this->orderId = $orderId;
    }

    public function orderId() {
        return $this->orderId;
    }

    public function employeeId() {
        return $this->employeeId;
    }
}