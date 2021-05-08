<?php

class OrderWasCompleted implements DomainEvent {
    /** @var OrderId */
    private $orderId;

    public function __construct(OrderId $orderId) {
        $this->orderId = $orderId;
    }

    public function payload() {
        return [
            'orderId' => $this->orderId->toString()
        ];
    }

    public static function fromArray(array $payload) {
        return new OrderWasCompleted(OrderId::fromString($payload['orderId']));
    }
}
