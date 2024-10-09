<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartProduct;
use App\Models\Payment;
use App\Models\PaymentHistory;
use App\Models\Product;
use App\Models\ProductVariantCombination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd();
        return view('frontend.payment');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $paymentData = $request->validate([
            'card_number' => 'required',
            'card_holder' => 'required',
            'exp_month' => 'required',
            'exp_year' => 'required',
            'cvv' => 'required',
        ]);
        $cart = Cart::where('user_id', Auth::user()->id)->first();
        $recipe = new PaymentHistory;
        $recipe->user_id = Auth::user()->id;
        $recipe->cart_id = $cart->id;
        $recipe->amount = $cart->total_amount;
        $recipe->save();
        // this to decrement the quantity after buying the products
        $cartinfos = $cart->products()->whereNull('deleted_at')->get();
        foreach ($cartinfos as $cartinfo) {
            ProductVariantCombination::where('product_id', $cartinfo->id)->decrement('stock', $cartinfo->pivot->quantity);
            Product::where('id', $cartinfo->id)->decrement('total_stock', $cartinfo->pivot->quantity);
        }
        // this a proccess for empty the cart and update the total amount
        CartProduct::where('cart_id', $cart->id)
            ->whereNull('deleted_at')
            ->delete();
        $totalAmount = $cart->products()->whereNull('cart_product.deleted_at')->get()->sum(function ($product) {
            return $product->pivot->quantity * $product->price;
        });
        $cart->total_amount = $totalAmount;
        $cart->save();
        // dd($cart);
        return redirect()->route('productList'); // Change to your success route
    }

    /**
     * Display the specified resource.
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        //
    }
    public function clearCart()
    {
        session()->forget('afterDiscount');

        $cart = Cart::where("user_id", Auth::user()->id)->first();
        CartProduct::where('cart_id', $cart->id)
            ->whereNull('deleted_at')
            ->delete();
        $totalAmount = $cart->products()->whereNull('cart_product.deleted_at')->get()->sum(function ($product) {
            return $product->pivot->quantity * $product->price;
        });
        $cart->total_amount = $totalAmount;
        $cart->save();
        $cartData = $cart->products()
            ->wherePivotNull('deleted_at') // Ensure soft-deleted products are excluded
            ->get();
        return redirect()->route('cart', Auth::user()->id)->with('successClear', "the data deleted");
    }
}
