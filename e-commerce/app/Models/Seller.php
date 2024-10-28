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
    // public function discountCopons()
    // {
    //     return $this->hasMany(DiscountCoupon::class);
    // }
    public function discountCoupons()
    {
        return $this->hasMany(DiscountCoupon::class);
    }
    public function paymentHistories()
    {
        return $this->hasMany(PaymentHistory::class);
    }
    public function createAccountNotification()
    {
        $existingNotifications = Notification::where('user_id', $this->id)
            ->where('notifiable_type', 'App\Models\Seller')
            ->where('type', 'account_created')
            ->where('admin', 1)
            ->get();

        $hasUnreadNotification = $existingNotifications->contains('read_at', null);

        if (!$hasUnreadNotification) {
            $newNotification = new Notification();
            $newNotification->user_id = $this->id; // The seller's user ID
            $newNotification->admin = 1; // Setting the admin flag
            $newNotification->type = 'account_created'; // Notification type
            $newNotification->notifiable_type = 'App\Models\Seller'; // Specify the notifiable type
            $newNotification->notifiable_id = $this->id; // The seller's ID
            $newNotification->data = json_encode([ // Store data as JSON
                'message' => "Seller {$this->name} just created an account.",
                'seller_id' => $this->id
            ]);

            // Save the new notification
            $newNotification->save();


            return [
                'newNotification' => $newNotification,
                'existingNotifications' => $existingNotifications,
            ];
        }

        return [
            'newNotification' => null,
            'existingNotifications' => $existingNotifications,
        ];
    }


    public function createBadReviewNotification($review)
    {
        if ($review->rating <= 2) {
            $notification = new Notification();
            $notification->user_id = $this->id; // The seller's user ID
            $notification->admin = 1; // Setting the admin flag
            $notification->type = 'bad_review'; // Notification type
            $notification->notifiable_type = 'App\Models\Seller'; // Specify the notifiable type
            $notification->notifiable_id = $this->id; // The seller's ID
            $notification->data = json_encode([ // Store data as JSON
                'message' => "A bad review was left for a product. Review ID: {$review->id}",
                'review_id' => $review->id
            ]);

            // Save the new notification
            $notification->save();

            return [
                'newNotification' => $notification,
                'existingNotifications' => Notification::where('user_id', $this->id)
                    ->where('type', 'bad_review')
                    ->get(),
            ];
        }

        return [
            'newNotification' => null,
            'existingNotifications' => collect(),
        ];
    }
}
