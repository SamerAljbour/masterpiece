<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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
    protected $dates = ['valid_from', 'valid_until'];
    public function updateActivity()
    {
        $today = Carbon::today();

        // Check if today's date is within the valid date range
        $isActive = $this->valid_from <= $today && $this->valid_until >= $today;

        $this->is_active = $isActive;
        $this->save();
    }
    public function seller()
    {
        return $this->hasMany(Seller::class);
    }
}
