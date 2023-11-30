<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\HasFilter;

class Order extends Model
{
    use HasFactory,HasFilter;
    protected $fillable = [
        'order_date',
        'total',
        'user_id',
    ];

    protected $with = [
        'orderDetails',
        'user'
    ];



    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function orderDetails() {
        return $this->hasMany(OrderDetails::class, 'order_id');
    }
}
