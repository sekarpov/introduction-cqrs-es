<?php

function placeOrder($orderId, $customerId, $cart) {
    $this->raise(new OrderWasPlaced($orderId, $customerId, $cart->products()));
}