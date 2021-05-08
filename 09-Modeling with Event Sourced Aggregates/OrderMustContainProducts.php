<?php

class OrderMustContainProducts extends Exception {
    public function __construct(OrderId $orderId, CustomerId $customerId) {
        parent::__construct("Order [{$orderId}] for customer [{$customerId}] must contain products.");
    }
}