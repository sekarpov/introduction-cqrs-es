<?php

class PaymentWasReceived {
    private $amount;
    private $orderId;

    public function __construct($orderId, $amount) {
        $this->amount = $amount;
        $this->orderId = $orderId;
    }

    public function orderId() {
        return $this->orderId;
    }

    public function amount() {
        return $this->amount;
    }
}