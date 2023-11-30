<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Order;
use App\Filters\order\IndexFilter;
use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;
use App\Http\Resources\OrderCollection;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders=Order::filter(new IndexFilter(request()))->withCount('orderDetails')->simplePaginate(30);
        return OrderCollection::collection($orders);
    }

    public function show(Order $order)
    {
        return new OrderResource($order);
    }

}
