<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingOption extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'shipping_address',
        'delivery_status',
        'estimated_delivery_date'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
