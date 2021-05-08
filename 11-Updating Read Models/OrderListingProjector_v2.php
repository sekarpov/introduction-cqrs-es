<?php

class OrderListingProjector extends Projector {

    protected function OrderWasPlaced(OrderWasPlaced $event) {
        DB::table('order_listing')->insert([
            'order_id'    => (string) $event->orderId(),
            'order_status' => 'placed',
            'customer_id' => (string) $event->customerId(),
            'customer_name' => '',
            'customer_email' => '',
            'product_list' => $event->products(),
        ]);
    }

    protected function OrderWasConfirmed(OrderWasConfirmed $event) {
        DB::table('order_listing')
            ->where('order_id', $event->orderId())
            ->update(['order_status' => 'confirmed']);
    }

    protected function PaymentWasReceived(PaymentWasReceived $event) {
        DB::table('order_listing')
            ->where('order_id', $event->orderId())
            ->increment('payment_made', $event->amount());
    }

    protected function OrderWasCompleted(OrderWasCompleted $event) {
        DB::table('order_listing')
            ->where('order_id', $event->orderId())
            ->update(['order_status' => 'completed']);
    }

    protected function OrderWasFulfilled(OrderWasFulfilled $event) {
        DB::table('order_listing')
            ->where('order_id', $event->orderId())
            ->update(['order_status' => 'fulfilled',]);
    }
}