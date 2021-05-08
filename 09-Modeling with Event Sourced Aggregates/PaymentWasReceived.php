<?php

class PaymentWasReceived implements DomainEvent {
    /** @var Money */
    private $amount;
    /** @var OrderId */
    private $orderId;

    public function __construct(OrderId $orderId, Money $amount) {
        $this->amount = $amount;
        $this->orderId = $orderId;
    }

    public function orderId() {
        return $this->orderId;
    }

    public function amount() {
        return $this->amount;
    }

    public function payload() {
        return [
            'amount' => $this->amount->toString(),
            'currency' => $this->amount->currency()->toString(),
            'orderId' => $this->orderId->toString(),
        ];
    }

    public static function fromArray(array $payload) {
        return new PaymentWasReceived(
            OrderId::fromString($payload['orderId']),
            Money::fromString($payload['amount'], new Currency($payload['currency']))
        );
    }
}