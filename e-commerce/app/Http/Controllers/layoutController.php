<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Seller;
use App\Models\VariantOption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class layoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get the cart for the authenticated user
        $cart = Cart::where("user_id", Auth::user()->id)->first();

        // Check if the cart exists
        if (!$cart) {
            // Handle the case where the cart is not found
            return view('home', [
                'cartData' => collect(), // No cart data
                'totalAmount' => 0, // Total amount is zero
            ]);
        }

        // Get the cart products, ensuring soft-deleted products are excluded
        $cartData = $cart->products()
            ->wherePivotNull('deleted_at') // Ensure soft-deleted products are excluded
            ->get();

        // Check if cartData is empty
        if ($cartData->isEmpty()) {
            return view('home', [
                'cartData' => $cartData,
                'totalAmount' => 0, // No products in the cart
            ]);
        }



        // Debugging: Uncomment the line below to inspect $cartData
        // dd($cartData);

        return view('home', [
            'cartData' => $cartData,

        ]);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(VariantOption $variantOption)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VariantOption $variantOption)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, VariantOption $variantOption)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VariantOption $variantOption)
    {
        //
    }
}
