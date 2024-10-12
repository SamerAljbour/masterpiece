<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\PaymentHistory;
use App\Models\Product;
use App\Models\ProductPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $topRated = Product::withAvg('reviews', 'rating') // Calculate the average rating
            ->orderByDesc('reviews_avg_rating') // Order by average rating in descending order
            ->paginate(3);
        // dd($topRated);

        $bestSale = Product::withCount('paymentHistories')
            ->orderBy('payment_histories_count', 'desc')
            ->paginate(3);
        $cart = Cart::where("user_id", Auth::user()->id)->first();
        $cartData = $cart->products()
            ->wherePivotNull('deleted_at') // Ensure soft-deleted products are excluded
            ->get();
        // dd($bestSale);
        return view('frontend/home', compact('topRated', 'bestSale', 'cartData'));
    }
}
