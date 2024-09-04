<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'status',
        'total_amount',
        'shipping_address'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cartProducts()
    {
        return $this->hasMany(CartProduct::class);
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
