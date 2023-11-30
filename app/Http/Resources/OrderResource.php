<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Resources\OrderDetailsCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource  into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {

        // user data, address data, orders, range of dates, range or prices,
        return[
            'id'        =>$this->id,
            'order_date'=>Carbon::parse($this->order_date)->format('Y-m-d'),
            'total'     => round($this->total,2),
            'items'     =>OrderDetailsCollection::collection($this->orderDetails),
        ];
    }
}
