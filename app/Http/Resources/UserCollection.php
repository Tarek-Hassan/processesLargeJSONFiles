<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Resources\AddressCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class UserCollection extends JsonResource
{
    /**
     * Transform the resource  into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {

        return[
            'id'            =>$this->id,
            'name'          =>$this->name,
            'email'         =>$this->email,
            'addresses'     =>AddressCollection::collection($this->addresses),
            'orders_count'  =>$this->orders_count,
        ];
    }
}
