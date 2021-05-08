<?php

class OrderV2 {
    /** @var array */
    private $recordedEvents = [];
    /** @var OrderId */
    private $orderId;
    /** @var CustomerId */
    private $customerId;
    /** @var Products */
    private $products;
    /** @var string */
    private $state;
    
    public function __construct(OrderId $orderId, CustomerId $customerId, Cart $cart) {
        if ($cart->isEmpty()) {
            throw new OrderMustContainProducts($orderId, $customerId);
        }
        $this->raise(new OrderWasPlaced($orderId, $customerId, $cart->products()));
    }

    public function raise(DomainEvent $event) {
        $this->recordedEvents[] = $event;
        $this->apply($event);
    }

    public function applyEvent(DomainEvent $event) {
        switch (get_class($event)) {
            case OrderWasPlaced::class:
                $this->orderId = $event->orderId();
                $this->customerId = $event->customerId();
                $this->products = $event->products();
                $this->state = 'placed';
                break;
        }
    }

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