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

        // Fetch the user's cart
        $cart = Cart::where('user_id', Auth::user()->id)->first();
        $cartProduct = CartProduct::withTrashed()->where('cart_id', $cart->id)->get();

        // Check if cart products are empty
        if ($cartProduct->isEmpty()) {
            return redirect()->back()->with('error', 'Your cart is empty.');
        }

        // Initialize total amount for the payment history
        $totalAmount = 0;

        // Iterate over the cart products
        foreach ($cartProduct as $cartinfo) {
            // Get the product variant and associated product
            $variant = ProductVariantCombination::where('product_id', $cartinfo->product_id)->first();

            // Ensure the product exists and has stock
            if (!$variant || $variant->stock == 0) {
                CartProduct::where('cart_id', $cart->id)
                    ->where('product_id', $cartinfo->product_id)
                    ->delete();
                return redirect()->back()->with('error', 'Out of stock. The product has been deleted.');
            }

            // Check if the requested quantity exceeds available stock
            if ($cartinfo->quantity > $variant->stock) {
                CartProduct::where('cart_id', $cart->id)
                    ->where('product_id', $cartinfo->product_id)
                    ->delete();
                return redirect()->back()->with('error', 'Requested quantity exceeds available stock. The product has been deleted.');
            }

            // Decrement the stock for the purchased product variant
            ProductVariantCombination::where('product_id', $cartinfo->product_id)
                ->decrement('stock', $cartinfo->quantity);

            // Calculate the amount for the current product
            $amount = $cartinfo->quantity * $cartinfo->price;
            $totalAmount += $amount;

            // Get the product model to retrieve the seller ID
            $product = Product::with('seller')->find($cartinfo->product_id);
            // dd($product->seller_id);
            // Create a new payment history record for each product
            PaymentHistory::create([
                'user_id' => Auth::user()->id,
                'cart_id' => $cart->id,
                'product_id' => $cartinfo->product_id, // Store the product ID
                'amount' => $amount,
                'seller_id' => $product->seller_id, // Store the seller ID
            ]);
        }

        // Empty the cart
        CartProduct::where('cart_id', $cart->id)
            ->whereNull('deleted_at')
            ->delete();

        // Update the total amount in the cart
        $cart->total_amount = $totalAmount;
        $cart->save();

        return redirect()->route('home'); // Change to your success route
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
