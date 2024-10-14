<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\PaymentHistory;
use App\Models\Product;
use App\Models\ProductPhoto;
use App\Models\Review;
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

        $onSale = Product::whereNotNull("on_sale")
            ->inRandomOrder()
            ->paginate(3);

        $RandomProducts = Product::inRandomOrder()->paginate(3);
        // get cart Qua
        $cart = Cart::where("user_id", Auth::user()->id)->first();
        $cartData = $cart->products()
            ->wherePivotNull('deleted_at') // Ensure soft-deleted products are excluded
            ->get();
        // dd($bestSale);
        $categoryOne = Category::where('id', 1)->with('products')->first();
        $categoryTwo = Category::where('id', 2)->with('products')->first();
        $categoryThree = Category::where('id', 3)->with('products')->first();
        $categoryFour = Category::where('id', 4)->with('products')->first();
        // dd($categoryOne);
        return view('frontend/home', compact('categoryFour', 'categoryThree', 'categoryTwo', 'categoryOne', 'topRated', 'bestSale', 'cartData', 'onSale', 'RandomProducts'));
    }
    public function showUserProfile()
    {

        // $userInfo = Auth::user()->id;
        // dd($userInfo);
        return view('frontend/userprofile',);
    }
}
