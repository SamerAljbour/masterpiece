<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    use HasFactory;
    protected $fillable = [
        'seller_id',
        'sub_category_id',
        'category_id',
        'name',
        'description',
        'price',
        // 'stock_quantity',
        'image_url'
    ];


    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }
    public function variants()
    {
        return $this->hasMany(ProductVariantCombination::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // public function cartProducts()
    // {
    //     return $this->belongsToMany(CartProduct::class);
    // }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function photos()
    {
        return $this->hasMany(ProductPhoto::class);
    }

    public function carts()
    {
        return $this->belongsToMany(Cart::class, 'cart_product')
            ->withPivot('quantity', 'price');
    }
    public function paymentHistories()
    {
        return $this->hasMany(PaymentHistory::class, 'product_id');
    }
}
