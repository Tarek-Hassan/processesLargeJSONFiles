<?php

namespace App\Filters\User;

use App\Filters\AbstractFilter;

class IndexFilter extends AbstractFilter{
    protected $filters = [
        //
        'name'=>NameFilter::class,
        'email'=>EmailFilter::class,
        'address'=>AddressFilter::class,
        'number_of_orders'=>BalanceMinFilter::class,
    ];
}
