<?php

namespace App\Filters\Order;

use App\Filters\AbstractFilter;

class IndexFilter extends AbstractFilter{
    protected $filters = [
        'item_name'=>ItemNameFilter::class,
        
        'date_from'=>DateFromFilter::class,
        'date_to'=>DateToFilter::class,

        'price_from'=>PriceFromFilter::class,
        'price_to'=>PriceToFilter::class,
    ];
}
