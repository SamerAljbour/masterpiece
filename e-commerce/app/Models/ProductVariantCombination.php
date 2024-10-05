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

    protected $casts = [
        'variant_options' => 'array', // Cast the variant_options to an array
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
