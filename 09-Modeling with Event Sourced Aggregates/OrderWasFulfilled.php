<?php

class OrderWasFulfilled implements DomainEvent {
    /** @var EmployeeId */
    private $employeeId;
    /** @var OrderId */
    private $orderId;

    public function __construct(OrderId $orderId, EmployeeId $employeeId) {
        $this->employeeId = $employeeId;
        $this->orderId = $orderId;
    }

    public function orderId() {
        return $this->orderId;
    }

    public function employeeId() {
        return $this->employeeId;
    }

    public function payload() {
        return [
            'employeeId' => $this->employeeId->toString(),
            'orderId' => $this->orderId->toString(),
        ];
    }

    public static function fromArray(array $payload) {
        return new OrderWasFulfilled(
            OrderId::fromString($payload['orderId']),
            EmployeeId::fromString($payload['employeeId'])
        );
    }
}