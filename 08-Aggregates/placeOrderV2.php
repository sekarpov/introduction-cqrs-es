<?php

function placeOrder(OrderId $orderId, CustomerId $customerId, Cart $cart) {
    $this->raise(new OrderWasPlaced($orderId, $customerId, $cart->products()));
}