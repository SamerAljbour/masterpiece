<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariantCombination extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'variant_options', // Store as JSON
        'stock',
        'price',
    ];
    // this to make the laravel to handle json converter auto and specfiy it
    protected $casts = [
        'variant_options' => 'object', // Ensure this is present
    ];
    public function cartProducts()
    {
        return $this->hasMany(CartProduct::class, 'variant_id'); // Add this relationship
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
