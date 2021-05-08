<?php

function placeOrder(OrderId $orderId, CustomerId $customerId, Cart $cart) {
    if ($cart->isEmpty()) {
        throw new OrderMustContainProducts($orderId, $customerId);
    }
    $this->raise(new OrderWasPlaced($orderId, $customerId, $cart->products()));
}