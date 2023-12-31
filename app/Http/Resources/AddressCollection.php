<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AddressCollection extends JsonResource
{
    /**
     * Transform the resource  into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {

        return[
            'id'        =>$this->id,
            'street'    =>$this->street,
            'city'      =>$this->city,
            'state'     =>$this->state,
            'zip'       =>$this->zip,
        ];
    }
}
