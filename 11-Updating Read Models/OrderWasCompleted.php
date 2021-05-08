<?php

class OrderWasCompleted  {
    private $orderId;

    public function __construct($orderId) {
        $this->orderId = $orderId;
    }
}
