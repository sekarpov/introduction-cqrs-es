<?php

class Order {
    /** @var array */
    private $recordedEvents = [];
    /** @var OrderId */
    private $orderId;
    /** @var Products */
    private $products;
    /** @var CustomerId */
    private $customerId;
    /** @var Payments */
    private $payments;
    /** @var string */
    private $state;

    public function __construct() {
        $this->payments = new Payments;
    }

    public static function place(OrderId $orderId, Products $products, CustomerId $customerId) {
        if ($products->empty()) {
            throw new OrderCantHaveNoProducts;
        }
        $order = new Order;
        $order->raise(new OrderWasPlaced($orderId, $products, $customerId));
        return $order;
    }

    public function pay(Payment $payment) {
        $this->raise(new PaymentWasReceived($payment->id(), $payment->amount()));

        if ($this->payments->totalAmount() == $this->totalAmount()) {
            $this->raise(new OrderWasCompleted($this->orderId, new DateTime));
        }
    }

    public function totalAmount() {
        return $this->products->totalAmount();
    }

    public function raise(DomainEvent $event) {
        $this->recordedEvents[] = $event;
        $this->apply($event);
    }

    public function apply(DomainEvent $event) {
        switch(get_class($event)) {
            case OrderWasPlaced::class:
                $this->applyOrderWasPlaced($event);
                break;
            case PaymentWasReceived::class:
                $this->applyPaymentWasReceived($event);
                break;
            case OrderWasCompleted::class:
                $this->applyOrderWasCompleted($event);
                break;
        }
    }

    private function applyOrderWasPlaced(OrderWasPlaced $event) {
        $this->orderId = $event->orderId();
        $this->customerId = $event->customerId();
        $this->products = $event->products();
        $this->state = 'placed';
    }

    private function applyPaymentWasReceived(PaymentWasReceived $event) {
        $this->payments->add(new Payment($event->paymentId(), $event->amount()));
    }

    private function applyOrderWasCompleted(OrderWasCompleted $event) {
        $this->state = 'completed';
    }
}