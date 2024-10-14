<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'store_name',
        'store_description',
        'store_logo',
        'store_address'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function Cart()
    {
        return $this->hasMany(Cart::class);
    }

    public function ratings()
    {
        return $this->hasMany(Review::class);
    }
    public function discountCopons()
    {
        return $this->hasMany(DiscountCoupon::class);
    }
    public function paymentHistories()
    {
        return $this->hasMany(PaymentHistory::class);
    }
}
