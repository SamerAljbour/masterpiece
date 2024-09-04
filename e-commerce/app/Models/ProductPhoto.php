<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class ProductPhoto extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'photo_url',
        'alt_text'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function getImageAttribute()
    {
        $image = Arr::get($this->attributes, 'photo_url'); // Fixed attribute name
        if ($image) {
            $imagePath = ltrim($image, '/');
            return config('app.url') . '/storage/' . $imagePath;
        }
        return $image;
    }
}
