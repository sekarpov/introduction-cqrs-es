<?php

class OrderWasPlaced implements DomainEvent {
    /** @var OrderId */
    private $orderId;
    /** @var CustomerId */
    private $customerId;
    /** @var Products */
    private $products;

    public function __construct(OrderId $orderId, CustomerId $customerId, Products $products) {
        $this->orderId = $orderId;
        $this->customerId = $customerId;
        $this->products = $products;
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

    public function payload() {
        return [
            'orderId' => $this->orderId->toString(),
            'customerId' => $this->customerId->toString(),
            'products' => $this->products->toArray()
        ];
    }

    public static function fromArray(array $payload) {
        return new OrderWasPlaced(
            OrderId::fromString($payload['orderId']),
            CustomerId::fromString($payload['customerId']),
            new Products($payload['products'])
        );
    }
}