<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiscountCoupon extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'discount_amount',
        'type',
        'valid_from',
        'valid_until',
        'is_active',
    ];
}
