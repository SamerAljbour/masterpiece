<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CartProduct extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'cart_id',  // Renamed from 'order_id' to 'cart_id'
        'product_id',
        'variant_id', // Add this to link to ProductVariantCombination

        'quantity',
        'price'
    ];
    protected $table = 'cart_product';
    // for soft delete
    protected $dates = ['deleted_at'];

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }
    public function variant()
    {
        return $this->belongsTo(ProductVariantCombination::class, 'variant_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
