<?php

class Order extends Aggregate {
    /** @var OrderId */
    private $id;
    /** @var Products */
    private $products;
    /** @var Money */
    private $amountPaid;
    /** @var EmployeeId */
    private $confirmedBy;
    /** @var EmployeeId */
    private $fulfilledBy;
    /** @var Payments */
    private $payments;
    /** @var bool */
    private $wasCompleted = false;

    protected function __construct() {
        $this->amountPaid = Money::fromCents(0, new Currency('EUR'));
    }

    public static function place(OrderId $orderId, CustomerId $customerId, Products $products) {
        if ($products->isEmpty()) {
            throw new OrderMustContainProducts($orderId, $customerId);
        }
        $order = new Order;
        $order->raise(new OrderWasPlaced($orderId, $customerId, $products));
        return $order;
    }

    public function confirm(EmployeeId $employee) {
        if (isset($this->confirmedBy)) {
            throw new OrderHasAlreadyBeenConfirmed($this->id);
        }
        $this->raise(new OrderWasConfirmed($this->id, $employee));
    }

    public function receivePayment(Money $amount) {
        if ($amount->toCents() <= 0) {
            throw new PaymentsMustBePositiveAmounts;
        }
        if ( ! isset($this->confirmedBy)) {
            throw new UnconfirmedOrdersCannotReceivePayments;
        }
        if ($this->wasCompleted) {
            throw new CannotReceivePaymentsForCompletedOrders;
        }
        $this->raise(new PaymentWasReceived($this->id, $amount));

        if ($this->payments->totalAmount()->equals($this->amountPaid)) {
            $this->raise(new OrderWasCompleted($this->id));
        }
    }

    public function fulfill(EmployeeId $employee) {
        if ( ! isset($this->confirmedBy)) {
            throw new CannotFulfillAnUnconfirmedOrder;
        }
        if ( ! isset($this->wasFulfilledBy)) {
            throw new OrderCannotBeFulfilledTwice;
        }
        $this->raise(new OrderWasFulfilled($this->id, $employee));
    }

    public function apply($event) {
        switch (get_class($event)) {
            case OrderWasPlaced::class:
                $this->id = $event->orderId();
                $this->products = $event->products();
                break;
            case OrderWasConfirmed::class:
                $this->confirmedBy = $event->employeeId();
                break;
            case PaymentWasReceived::class:
                $this->amountPaid->add($event->amount());
                break;
            case OrderWasCompleted::class:
                $this->wasCompleted = true;
                break;
            case OrderWasFulfilled::class:
                $this->fulfilledBy = $event->employeeId();
                break;
            default:
                throw new CouldNotApplyEvent(get_class($event) . ' to aggregate of type ' . get_class($this));
        }
    }
}
