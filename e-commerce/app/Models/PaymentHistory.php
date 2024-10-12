<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentHistory extends Model
{
    use HasFactory;
    protected $fillable = [
        'cart_id',
        'user_id',
        'seller_id',
        'product_id',
        'amount',
    ];

    public function Cart()
    {
        return $this->belongsTo(Cart::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
