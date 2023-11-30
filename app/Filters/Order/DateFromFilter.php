<?php
namespace App\Filters\Order;

use App\Filters\AbstractBasicFilter;

class DateFromFilter extends AbstractBasicFilter{
    public function filter($value)
    {
        return $this->builder->where('order_date','>=',$value);
    }
}
