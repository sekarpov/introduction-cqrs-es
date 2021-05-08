<?php

class OrderV1 {
    private $orderId;
    private $customerId;
    private $products;
    private $state;

    public function orderId() {
        return $this->orderId;
    }

    public function customerId() {
        return $this->customerId;
    }

    public function products() {
        return $this->products;
    }

    public function isFulfilled() {
        return $this->state === 'fulfilled';
    }
}