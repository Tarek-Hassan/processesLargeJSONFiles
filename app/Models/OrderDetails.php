<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderDetails extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'quantity',
        'price',
        'order_id',
    ];


    public function order()
    {
        return $this->hasOne(Order::class, 'order_id');
    }
}
