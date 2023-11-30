<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderDetailsCollection extends JsonResource
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
            'name'      =>$this->name,
            'quantity'  => intVal($this->quantity),
            'price'     => round($this->price,2),
        ];
    }
}
