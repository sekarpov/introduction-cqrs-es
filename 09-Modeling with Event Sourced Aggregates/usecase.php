<?php

$order = Order::place($orderId, $products, $customer);
$order->confirm($employee);
$order->receivePayment(Money::fromString('11.21', new Currency('EUR')));
$order->receivePayment(Money::fromString('3.79', new Currency('EUR')));

$events = $order->pendingEvents();
$eventStore->persist($events);
$eventDispatcher->dispatch($events);

$events = $eventStore->eventsFor($orderId);
$order = Order::rebuildFrom($events);

$order->fulfill($employee);