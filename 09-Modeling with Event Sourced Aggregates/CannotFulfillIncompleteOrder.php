<?php

class CannotFulfillIncompleteOrder extends \Exception {
    public function __construct(OrderId $orderId) {
        parent::__construct("Cannot fulfill incomplete order [{$orderId}].");
    }
}