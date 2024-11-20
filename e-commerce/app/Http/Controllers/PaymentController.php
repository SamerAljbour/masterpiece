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
        $cartProducts = CartProduct::where('cart_id', $cart->id)->whereNull('deleted_at')->get();

        // Check if cart products are empty
        if ($cartProducts->isEmpty()) {
            return redirect()->back()->with('error', 'Your cart is empty.');
        }

        // Initialize total amount for the payment history
        $totalAmount = 0;

        // Iterate over the cart products
        foreach ($cartProducts as $cartinfo) {
            // Check if the product exists and is not soft-deleted
            $product = Product::with('seller')->find($cartinfo->product_id);
            if (!$product || $product->trashed()) { // Check for soft-deletion
                // Remove the product from the cart
                $cartinfo->delete();
                continue; // Continue to the next product
            }

            // Get the product variant
            $variant = ProductVariantCombination::where('product_id', $cartinfo->product_id)->first();

            // Ensure the product variant exists and has stock
            if (!$variant || $variant->stock == 0) {
                // Remove the product from the cart
                $cartinfo->delete();
                continue; // Continue to the next product
            }

            // Check if the requested quantity exceeds available stock
            if ($cartinfo->quantity > $variant->stock) {
                // Remove the product from the cart here
                $cartinfo->delete();
                continue; // Continue to the next product
            }

            // Decrement the stock for the purchased product variant
            ProductVariantCombination::where('product_id', $cartinfo->product_id)
                ->decrement('stock', $cartinfo->quantity);

            // Calculate the amount for the current product
            $amount = $cartinfo->quantity * $cartinfo->price;
            $totalAmount += $amount;

            // Create a new payment history record for each product
            PaymentHistory::create([
                'user_id' => Auth::user()->id,
                'cart_id' => $cart->id,
                'product_id' => $cartinfo->product_id, // Store the product ID
                'amount' => $amount,
                'seller_id' => $product->seller_id, // Store the seller ID
            ]);

            // Decrement the stock for the main Product model
            Product::where('id', $cartinfo->product_id)->decrement('total_stock', $cartinfo->quantity);
        }

        // Empty the cart of any remaining products
        CartProduct::where('cart_id', $cart->id)
            ->whereNull('deleted_at')
            ->delete();

        // Update the total amount in the cart to 0 after payment
        $cart->total_amount = 0;
        $cart->save();

        return redirect()->route('successPayment'); // Change to your success route
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

        // Find the cart for the authenticated user
        $cart = Cart::where("user_id", Auth::user()->id)->first();

        // Get all products in the cart
        $cartProducts = $cart->products()->whereNull('cart_product.deleted_at')->get();

        // Loop through each product in the cart
        foreach ($cartProducts as $product) {
            // Check if the product has been soft-deleted
            if ($product->trashed()) { // Assumes the Product model uses SoftDeletes
                // Remove the soft-deleted product from the cart
                $cart->products()->detach($product->id);
            }
        }

        // Now, delete the remaining products that are not soft-deleted
        CartProduct::where('cart_id', $cart->id)
            ->whereNull('deleted_at')
            ->delete();

        // Recalculate the total amount in the cart
        $totalAmount = $cart->products()
            ->whereNull('cart_product.deleted_at') // Ensure soft-deleted products are excluded
            ->get()
            ->sum(function ($product) {
                return $product->pivot->quantity * $product->price;
            });

        // Update the cart's total amount
        $cart->total_amount = $totalAmount;
        $cart->save();

        // Retrieve updated cart data
        $cartData = $cart->products()
            ->wherePivotNull('deleted_at') // Ensure soft-deleted products are excluded
            ->get();

        return redirect()->route('cart', Auth::user()->id)->with('successClear', "The data has been deleted.");
    }

    public function showSuccessPayment()
    {
        return view('frontend.paymentSuccess');
    }
}
