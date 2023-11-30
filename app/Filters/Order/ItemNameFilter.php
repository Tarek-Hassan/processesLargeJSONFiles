<?php
namespace App\Filters\Order;

use App\Filters\AbstractBasicFilter;

class ItemNameFilter extends AbstractBasicFilter{

    public function filter($value)
    {
        return $this->builder->whereHas('orderDetails', function($query)use($value){
            $query->where('name','like',"%{$value}%");
        });
    }
}
