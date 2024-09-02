<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class ProductPhoto extends Model
{
    use HasFactory;
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function getImageAttribute()
    {
        $image = Arr::get($this->attributes, 'image');
        if ($image) {
            $imagePath = ltrim($image, '/');
            return config('app.url') . '/storage/' . $imagePath;
        }
        return $image;
    }
}
