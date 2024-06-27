<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_code',
        'customer',
        'items',
        'total_price',
        'note',
        'address',
        'status',
        'payment_method',
        'payment_status',
    ];
}
