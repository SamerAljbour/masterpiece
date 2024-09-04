<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    public function storeToCart(Request $request)
    {
        $products = Product::all();
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'cart_id' => 'required|integer|exists:users,id',
            'product_id' => 'required|integer|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Extract inputs
        $userId = Auth::user()->id;
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');
        $price = $request->input('price');

        // Calculate the total amount for the current product
        $totalAmount = $price * $quantity;

        // Create or find the cart for the user
        $cart = Cart::firstOrCreate([
            'user_id' => $userId,
        ]);

        // Check if the product is already in the cart
        $existingProduct = $cart->products()->where('product_id', $productId)->first();

        if ($existingProduct) {
            // Update the existing product's quantity and price in the cart
            $cart->products()->updateExistingPivot($productId, [
                'quantity' => $existingProduct->pivot->quantity + $quantity,
                'price' => $price, // You can decide whether to update the price or not
            ]);

            // Update the cart's total amount
            $cart->total_amount += $totalAmount;
        } else {
            // Attach the new product to the cart
            $cart->products()->attach($productId, [
                'quantity' => $quantity,
                'price' => $price,
            ]);

            // Update the cart's total amount
            $cart->total_amount += $totalAmount;
        }

        // Save the updated cart total
        $cart->save();

        // Return a success response
        return view('frontend.productList', compact('products'))->with('success', 'Product added to the cart');
    }
}
