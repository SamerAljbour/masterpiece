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
        // Initialize an array to hold notification data
        $notificationData = [
            'newNotification' => null,
            'existingNotifications' => collect(),
        ];

        // Check if there's already a notification for this seller account creation with admin flag
        $existingNotifications = Notification::where('user_id', $this->id)
            ->where('notifiable_type', 'App\Models\Seller')
            ->where('type', 'account_created')
            ->where('admin', 1) // Only fetch notifications for admin
            ->get();

        // Check if any existing notification is unread
        $hasUnreadNotification = $existingNotifications->contains(function ($notification) {
            return $notification->read_at === null;
        });

        // If there are no unread notifications, create a new one
        if (!$hasUnreadNotification) {
            $newNotification = Notification::create([
                'user_id' => $this->id, // The seller's user ID
                'admin' => 1, // Setting admin flag
                'type' => 'account_created', // Custom type for account creation
                'notifiable_type' => 'App\Models\Seller',
                'notifiable_id' => $this->id,
                'data' => json_encode([
                    'message' => "Seller, {$this->name}! Just created an account.",
                    'seller_id' => $this->id
                ]),
            ]);

            // Set the new notification in the data array
            $notificationData['newNotification'] = $newNotification;
        }

        // Fetch existing notifications for the seller
        $notificationData['existingNotifications'] = $existingNotifications;

        // Return the new notification and the existing notifications
        return $notificationData;
    }

    public function createBadReviewNotification($review)
    {
        // Initialize an array to hold notification data
        $notificationData = [
            'newNotification' => null,
            'existingNotifications' => collect(),
        ];

        // Check if the review rating is 2 or below
        if ($review->rating <= 2) {
            // Create the notification
            $notification = Notification::create([
                'user_id' => $this->id, // The seller's user ID
                'admin_id' => 1, // The seller's user ID
                'type' => 'bad_review', // Custom type for bad review notification
                'notifiable_type' => 'App\Models\Seller',
                'notifiable_id' => $this->id,
                'data' => json_encode([
                    'message' => "A bad review was left for a product the review id is", // Use 'comment' instead of 'content'
                    'review_id' => $review->id
                ]),
            ]);

            // Set the new notification in the data array
            $notificationData['newNotification'] = $notification;

            // Fetch existing bad review notifications for the seller
            $notificationData['existingNotifications'] = Notification::where('user_id', $this->id)
                ->where('type', 'bad_review')
                ->get();
        }

        return $notificationData;
    }
}
