<?php

namespace App\Services;


use App\Models\User;

class OrderService
{



    public function processOrderData(User $user, $orders)
    {
        // foreach (array_chunk($orders, 100) as $orderData) {
            foreach ($orders as $orderData) {
                $order=$user->orders()->create($orderData);
                $order->orderDetails()->createMany($orderData['items']);
            }
    }

}
