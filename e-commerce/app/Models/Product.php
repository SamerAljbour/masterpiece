<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Product extends Model
{
    use SoftDeletes;

    use HasFactory;
    protected $fillable = [
        'seller_id',
        'sub_category_id',
        'category_id',
        'name',
        'description',
        'price',
        // 'stock_quantity',
        'image_url'
    ];
    public function stockNotification($productStock) {}

    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }
    public function variants()
    {
        return $this->hasMany(ProductVariantCombination::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // public function cartProducts()
    // {
    //     return $this->belongsToMany(CartProduct::class);
    // }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function photos()
    {
        return $this->hasMany(ProductPhoto::class);
    }

    public function carts()
    {
        return $this->belongsToMany(Cart::class, 'cart_product')
            ->withPivot('quantity', 'price');
    }
    public function paymentHistories()
    {
        return $this->hasMany(PaymentHistory::class, 'product_id');
    }
    public function notification()
    {
        return $this->morphOne(Notification::class, 'notifiable');
    }
    public static function checkLowStockAndNotify()
    {
        // Fetch low stock products (<= 20) for the authenticated user (seller)
        $lowStockProducts = self::where('seller_id', Auth::user()->id)
            ->where('total_stock', '>', 0)  // Stock must be greater than 0
            ->where('total_stock', '<=', 20) // Low stock threshold
            ->get();

        // Fetch out of stock products (total_stock = 0) for the authenticated user (seller)
        $outOfStockProducts = self::where('seller_id', Auth::user()->id)
            ->where('total_stock', '=', 0) // Out of stock
            ->get();

        // Count low stock and out of stock products
        $countLowStockProducts = $lowStockProducts->count();
        $countOutOfStockProducts = $outOfStockProducts->count();
        $countOfNotifications = $countLowStockProducts + $countOutOfStockProducts;

        // Initialize an array to hold notifications
        $notifications = [];

        // Create notifications for low stock products
        foreach ($lowStockProducts as $product) {
            // Check if there's already a notification for this product
            $existingNotification = Notification::where('user_id', Auth::id())
                ->where('notifiable_type', 'App\Models\Product')
                ->where('notifiable_id', $product->id)
                ->where('type', 'low_stock')
                ->first(); // Use first() instead of get() to check for a single record

            // If there is no existing notification, create a new one
            if (!$existingNotification) {
                $notification = Notification::create([
                    'user_id' => Auth::id(), // The authenticated user
                    'type' => 'low_stock', // Custom type for low stock
                    'notifiable_type' => 'App\Models\Product',
                    'notifiable_id' => $product->id,
                    'data' => json_encode([
                        'message' => "Low stock alert for product {$product->name}: Only {$product->total_stock} left in stock.",
                        'product_id' => $product->id
                    ]),
                ]);
                $notifications[] = $notification; // Add the notification to the array
            }
        }

        // Create notifications for out of stock products
        foreach ($outOfStockProducts as $product) {
            // Check if there's already a notification for this product
            $existingNotification = Notification::where('user_id', Auth::id())
                ->where('notifiable_type', 'App\Models\Product')
                ->where('notifiable_id', $product->id)
                ->where('type', 'out_of_stock')
                ->first(); // Use first() instead of get() to check for a single record

            // If there is no existing notification, create a new one
            if (!$existingNotification) {
                $notification = Notification::create([
                    'user_id' => Auth::id(), // The authenticated user
                    'type' => 'out_of_stock', // Custom type for out of stock
                    'notifiable_type' => 'App\Models\Product',
                    'notifiable_id' => $product->id,
                    'data' => json_encode([
                        'message' => "Out of stock alert for product {$product->name}: No items left in stock.",
                        'product_id' => $product->id
                    ]),
                ]);
                $notifications[] = $notification; // Add the notification to the array
            }
        }

        // Return both low stock and out of stock products along with their counts and notifications
        return [
            'lowStockProducts' => $lowStockProducts,
            'countOfNotifications' => $countOfNotifications,
            'outOfStockProducts' => $outOfStockProducts,
            'notifications' => $notifications, // Return the notifications created
        ];
    }
}
