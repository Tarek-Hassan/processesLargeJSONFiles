<?php
namespace App\Filters\User;

use App\Filters\AbstractBasicFilter;

class AddressFilter extends AbstractBasicFilter{
    public function filter($value)
    {
        return $this->builder->whereHas('addresses', function($query)use($value){
            $query->where('street','like',"%{$value}%")
            ->orWhere('type','like',"%{$value}%")
            ->orWhere('city','like',"%{$value}%")
            ->orWhere('state','like',"%{$value}%")
            ->orWhere('zip','like',"%{$value}%");
        });
    }
}
