<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Http\model\Rating;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /** use Notifiable;
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'name',
        'email',
        'password',
        'address',
        'phone_number',
        'status',
        'image_url',
        'role_id',
    ];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];





    // public function orders()
    // {
    //     return $this->hasMany(Order::class);
    // }

    public function wishlist()
    {
        return $this->hasOne(Wishlist::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function ratings()
    {
        return $this->hasMany(Review::class);
    }

    public function seller()
    {
        return $this->hasOne(Seller::class);
    }
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
    // public function soldProducts()
    // {
    //     return $this->hasMany(Product::class, 'seller_id'); // Assuming your products have a seller_id field
    // }
}
