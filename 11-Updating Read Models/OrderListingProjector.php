<?php

class OrderListingProjector {

    public function handle($event) {
        switch (get_class($event)) {
            case OrderWasPlaced::class:
                DB::table('order_listing')->insert([
                    'order_id'    => (string) $event->orderId(),
                    'order_status' => 'placed',
                    'customer_id' => (string) $event->customerId(),
                    'customer_name' => $event->customerName(),
                    'customer_email' => $event->customerEmail(),
                    'product_list' => $event->products(),
                ]);
                break;
            case OrderWasConfirmed::class:
                DB::table('order_listing')
                    ->where('order_id', $event->orderId())
                    ->update(['order_status' => 'confirmed']);
                break;
            case PaymentWasReceived::class:
                DB::table('order_listing')
                    ->where('order_id', $event->orderId())
                    ->increment('payment_made', $event->amount());
                break;
            case OrderWasCompleted::class:
                DB::table('order_listing')
                    ->where('order_id', $event->orderId())
                    ->update(['order_status' => 'completed']);
                break;
            case OrderWasFulfilled::class:
                DB::table('order_listing')
                    ->where('order_id', $event->orderId())
                    ->update(['order_status' => 'fulfilled']);
                break;
        }
    }
}