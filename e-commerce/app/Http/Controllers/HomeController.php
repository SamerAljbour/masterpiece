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
        if (Auth::user()) {
            $cart = Cart::where("user_id", Auth::user()->id)->first();
            $cartData = $cart->products()
                ->wherePivotNull('deleted_at') // Ensure soft-deleted products are excluded
                ->get();
        }


        // Get products for each category and limit to 10
        $categoryOne = Category::find(1);
        $categoryOneProducts = $categoryOne->products()->limit(10)->get();

        $categoryTwo = Category::find(2);
        $categoryTwoProducts = $categoryTwo->products()->limit(10)->get();

        $categoryThree = Category::find(3);
        $categoryThreeProducts = $categoryThree->products()->limit(10)->get();

        $categoryFour = Category::find(4);
        $categoryFourProducts = $categoryFour->products()->limit(10)->get();

        // Pass all variables to the view

        if (Auth::user())
            return view('frontend/home', compact(
                'categoryFour',
                'categoryThree',
                'categoryTwo',
                'categoryOne',
                'categoryOneProducts',
                'categoryTwoProducts',
                'categoryThreeProducts',
                'categoryFourProducts',
                'topRated',
                'bestSale',
                'cartData',
                'onSale',
                'RandomProducts'
            ));
        else
            return view('frontend/home', compact(
                'categoryFour',
                'categoryThree',
                'categoryTwo',
                'categoryOne',
                'categoryOneProducts',
                'categoryTwoProducts',
                'categoryThreeProducts',
                'categoryFourProducts',
                'topRated',
                'bestSale',

                'onSale',
                'RandomProducts'
            ));
    }

    public function showUserProfile()
    {

        // $userInfo = Auth::user()->id;
        // dd($userInfo);
        $userPaymentHistory = PaymentHistory::with('product')
            ->where('user_id', auth()->id())
            ->get()
            ->groupBy('created_at'); // Grouping by cart_id to aggregate products in one cart
        // dd($userPaymentHistory);
        return view('frontend/userprofile', compact('userPaymentHistory'));
    }
}
