<?php

namespace App\Http\Controllers;

use App\Models\Ad;
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
        $topRated = Product::withAvg('reviews', 'rating')
            ->orderByDesc('reviews_avg_rating')
            ->paginate(3);
        // dd($topRated);

        $bestSale = Product::withCount('paymentHistories')
            ->orderBy('payment_histories_count', 'desc')
            ->paginate(3);

        $onSale = Product::whereNotNull("on_sale")
            ->inRandomOrder()
            ->paginate(3);
        // Featured
        $RandomProducts = Product::inRandomOrder()->paginate(3);
        // get cart Qua
        if (Auth::user()) {
            $cart = Cart::where("user_id", Auth::user()->id)->first();
            $cartData = $cart->products()
                ->wherePivotNull('deleted_at') // Ensure soft-deleted products are excluded
                ->get();
        }


        // Get products for each category and limit to 10
        $categoryOne = Category::find(5); // 5
        $categoryOneProducts = $categoryOne->products()->limit(10)->get();

        $categoryTwo = Category::find(1); //6
        $categoryTwoProducts = $categoryTwo->products()->limit(10)->get();

        $categoryThree = Category::find(6);
        $categoryThreeProducts = $categoryThree->products()->limit(10)->get();

        $categoryFour = Category::find(2);
        $categoryFourProducts = $categoryFour->products()->limit(10)->get();

        // Pass all variables to the view
        $ads = Ad::with('product')->where('location', 'homepage')->where('status', 'active')->get();
        // dd($ads);
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
                'ads',
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
                'ads',
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
