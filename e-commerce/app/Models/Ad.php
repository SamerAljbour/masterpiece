<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    use HasFactory;

    // The fields that are mass assignable
    protected $fillable = [
        'title',
        'description',
        'price',
        'image_url',
        'status',
        'user_id',
        'product_id',
        'ad_type',
    ];
    // $activeAds = Ad::active()->get();
    // $expiredAds = Ad::expired()->get();
    // $rejectedAds = Ad::rejected()->get();

    /**
     * Relationship to the User model
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relationship to the Product model
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Scope to filter active ads
     */
    // public function scopeActive($query)
    // {
    //     return $query->where('status', 'active');
    // }

    /**
     * Scope to filter expired ads
     */
    // public function scopeExpired($query)
    // {
    //     return $query->where('status', 'expired');
    // }

    /**
     * Scope to filter rejected ads
     */
    // public function scopeRejected($query)
    // {
    //     return $query->where('status', 'rejected');
    // }
    public function updateAdActivityAds()
    {
        // Get today's date
        $today = Carbon::today();

        // If the ad is currently active or was previously active
        if ($this->status === 'active' || ($this->status !== 'expired' && $today > $this->ad_to)) {
            // Check if today's date is past the ad's valid date range
            if ($today > $this->ad_to) {
                // If expired, set status to expired
                $this->status = 'expired';
            }
        }

        // Save the changes to the database if there are updates
        if ($this->isDirty('status')) {
            $this->save();
        }
    }
}
