<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'seller_id', 'total_price', 'status', 'shipping_id', 'payment_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function shipping()
    {
        return $this->belongsTo(ShippingOption::class);
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }
}
