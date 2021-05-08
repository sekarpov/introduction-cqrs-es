<?php

class OrderWasPlaced  {
    private $orderId;
    private $customerId;
    private $customerName;
    private $customerEmail;
    private $products;

    public function __construct($orderId, $customerId, $customerName, $customerEmail, $products) {
        $this->orderId = $orderId;
        $this->customerId = $customerId;
        $this->customerName = $customerName;
        $this->customerEmail = $customerEmail;
        $this->products = $products;
    }

    public function orderId() {
        return $this->orderId;
    }

    public function customerId() {
        return $this->customerId;
    }

    public function customerName() {
        return $this->customerName;
    }

    public function customerEmail() {
        return $this->customerEmail;
    }

    public function products() {
        return $this->products;
    }
}