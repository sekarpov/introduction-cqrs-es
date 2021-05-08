<?php

class PaymentCannotBeMadeOnUnconfirmedOrder extends Exception {
    public function __construct(OrderId $orderId) {
        parent::__construct("Payment cannot be made on unconfirmed order [{$orderId}].");
    }
}