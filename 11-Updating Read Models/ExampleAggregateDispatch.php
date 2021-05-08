<?php

$order = Order::place($orderId, $products, $customer);

$events = $order->pendingEvents();
$eventStore->persist($events);
$eventDispatcher->dispatch($events);