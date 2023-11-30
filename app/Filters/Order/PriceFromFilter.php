<?php
namespace App\Filters\Order;

use App\Filters\AbstractBasicFilter;

class PriceFromFilter extends AbstractBasicFilter{
    public function filter($value)
    {
        return $this->builder->where('total','>=',$value);
    }
}
