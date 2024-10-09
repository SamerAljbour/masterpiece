<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartProduct;
use App\Models\DiscountCoupon;
use App\Models\Product;
use App\Models\ProductVariantCombination;
use Error;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    public function storeToCart(Request $request)
    {
        try {
            // Validate the request data
            $validator = Validator::make($request->all(), [
                'cart_id' => 'required|integer|exists:users,id',
                'product_id' => 'required|integer|exists:products,id',
                'quantity' => 'required|integer|min:1',
                'price' => 'required|numeric|min:0',
            ]);

            // Uncomment if you want to handle validation errors
            // if ($validator->fails()) {
            //     return response()->json(['errors' => $validator->errors()], 422);
            // }

            // Extract inputs
            $userId = Auth::user()->id;
            $productId = $request->input('product_id');
            $quantity = $request->input('quantity');
            $price = $request->input('price');
            $variantId = $request->input('variant_id');

            // Get the variant quantity and check stock
            $variant = ProductVariantCombination::where('product_id', $productId)->first();

            if (!$variant || $variant->stock == 0) {
                return redirect()->back()->with('error', 'Out of stock');
            }

            // Check if desired quantity exceeds available stock
            if ($quantity > $variant->stock) {
                return redirect()->back()->with('error', 'Requested quantity exceeds available stock.');
            }

            // Calculate the total amount for the current product
            $totalAmount = $price * $quantity;

            // Create or find the cart for the user
            $cart = Cart::where('user_id', $userId)->first();

            // Check if the product is already in the cart
            $existingProduct = $cart->products()->whereNull('deleted_at')->where('product_id', $productId)->first();

            if ($existingProduct) {
                // Check if adding the quantity exceeds stock
                $newQuantity = $existingProduct->pivot->quantity + $quantity;
                if ($newQuantity > $variant->stock) {
                    return redirect()->back()->with('error', 'Requested quantity exceeds available stock.');
                }

                // Update the existing product's quantity and price in the cart
                $cart->products()->updateExistingPivot($productId, [
                    'quantity' => $newQuantity,
                    'price' => $price,
                    'variant_id' => $variantId,
                ]);

                // Update the cart's total amount
                $cart->total_amount += $totalAmount;
            } else {
                // Attach the new product to the cart
                $cart->products()->attach($productId, [
                    'quantity' => $quantity,
                    'price' => $price,
                    'variant_id' => $variantId,
                ]);

                // Update the cart's total amount
                $cart->total_amount += $totalAmount;
            }

            // Save the updated cart total
            $cart->save();

            // Return a success response
            return redirect()->back()->with('success', 'Product added to the cart.');
        } catch (\Exception $e) {
            // Catch any errors and return with an error message
            return redirect()->back()->with('error', 'Something went wrong while adding the product to the cart.');
        }
    }



    public function storeToCartQua(Request $request)
    {

        try {
            $products = Product::all();
            // Validate the request data
            $validator = Validator::make($request->all(), [
                'cart_id' => 'required|integer|exists:users,id',
                'product_id' => 'required|integer|exists:products,id',
                'variant_id' => 'required|exists:cart_product,id', // Ensure this matches your DB structure
                'quantity' => 'required|integer|min:1',
                'price' => 'required|numeric|min:0',
            ]);

            if (is_null($request->input('variant_id'))) {
                return redirect()->back()->with('error', 'You should pick a variant.')->withInput();
            }
            // Check if validation fails
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            // Extract inputs
            $userId = Auth::user()->id;
            $productId = $request->input('product_id');
            $quantity = $request->input('quantity');
            $price = $request->input('price');
            $variant = $request->input('variant_id');

            // Calculate the total amount for the current product
            $totalAmount = $price * $quantity;

            // Create or find the cart for the user
            $cart = Cart::firstOrCreate([
                'user_id' => $userId,
            ]);

            // Check if the product with the same variant is already in the cart
            $existingProduct = $cart->products()
                ->whereNull('deleted_at')
                ->where('product_id', $productId)
                ->where('variant_id', $variant) // Add variant check here
                ->first();

            if ($existingProduct) {
                // Update the existing product's quantity and price in the cart
                $cart->products()->updateExistingPivot($productId, [
                    'quantity' => $existingProduct->pivot->quantity + $quantity,
                    'price' => $price, // Optionally update price
                ]);

                // Update the cart's total amount
                $cart->total_amount += $totalAmount;
            } else {
                // Attach the new product to the cart with variant details
                $cart->products()->attach($productId, [
                    'quantity' => $quantity,
                    'price' => $price,
                    'variant_id' => $variant,
                ]);

                // Update the cart's total amount
                $cart->total_amount += $totalAmount;
            }

            // Save the updated cart total
            $cart->save();

            // Return a success response
            return redirect()->route('productdetail', $productId)->with('success', 'Product added to the cart');
        } catch (\Exception $e) {
            // Handle the exception and return error message
            return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }


    // display cart data
    public function showCartData(string $cartId)
    {

        try {
            $cart = Cart::where("user_id", $cartId)->first();

            // Assuming 'products' is a relation or property
            $cartData = $cart->products()
                ->wherePivotNull('deleted_at') // Ensure soft-deleted products are excluded
                ->get();
        } catch (Exception $e) {
            // Handle the error (e.g., log the error, show a message)
            $cartData = [];
            // echo 'Error: ' . $e->getMessage();
        }
        // dd($cartData);
        $totalCartPrice = Cart::where('user_id', Auth::user()->id)->first();

        return view('frontend/cart', ['cart' => $cart, 'cartData' => $cartData, 'totalCartPrice' => $totalCartPrice]);
    }

    // update cart quantity
    public function updateCart(Request $request, string $productId)
    {
        // Retrieve the quantity from the request
        $quantity = $request->input('quantity');
        // $cartId = Auth::user()->id;

        // Find the cart
        $cart = Cart::where("user_id", Auth::user()->id)->first();

        if ($cart) {
            // Update the quantity of the product in the cart
            $cart->products()->updateExistingPivot($productId, ['quantity' => $quantity]);

            // Recalculate the total amount
            $totalAmount = $cart->products->sum(function ($product) {
                return $product->pivot->quantity * $product->price;
            });

            // Update the cart's total amount
            $cart->total_amount = $totalAmount;
            $cart->save();
        }

        // Retrieve updated cart data
        $cartData = $cart->products()
            ->wherePivotNull('deleted_at') // Ensure soft-deleted products are excluded
            ->get();

        return redirect()->route('cart', Auth::user()->id)->with('successClear', "the data updated");
    }

    // delete from cart

    function deleteFromCart(string $productId)
    {
        session()->forget('afterDiscount');

        $cart = Cart::where("user_id", Auth::user()->id)->first();
        // dd($cart);
        // Find the product in the cart pivot table (cart_product)
        $cartProduct = CartProduct::where('cart_id', $cart->id)
            ->where('product_id', $productId)
            ->first();

        if ($cartProduct) {
            // Soft delete the pivot record
            $cartProduct->delete();  // This will set 'deleted_at' without detaching
        }

        // Recalculate the total amount for the cart
        $totalAmount = $cart->products()->whereNull('cart_product.deleted_at')->get()->sum(function ($product) {
            return $product->pivot->quantity * $product->price;
        });

        $cart->total_amount = $totalAmount;
        $cart->save();

        // Get the cart data (excluding soft deleted products)
        $cartData = $cart->products()
            ->wherePivotNull('deleted_at') // Ensure soft-deleted products are excluded
            ->get();

        return redirect()->route('cart', Auth::user()->id)->with('successClear', "the one  data deleted");
    }

    // // clear cart data
    function clearCart()
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
        // return view('frontend/cart', ['cart' => $cart, 'cartData' => $cartData]);
        return redirect()->route('cart', Auth::user()->id)->with('successClear', "the data deleted");
    }

    // apply discount for the total amount
    function addDiscount(Request $request)
    {
        session()->forget('afterDiscount');
        $discountCopon = $request->input('discountCopon');
        $discount = DiscountCoupon::where('code', $discountCopon)->first();
        $cart = Cart::where("user_id", Auth::user()->id)->first();

        $cartData = $cart->products()
            ->wherePivotNull('deleted_at')
            ->get();
        // dd()
        if ($discount) {
            if ($discount->is_active) {
                if ($cartData->count() > 0) {
                    $cart = Cart::where('user_id', Auth::user()->id)->first();
                    // dd($cart);
                    $totalAmount = $cart->total_amount;
                    // dd($cart->total_amount);
                    $totalAmount = $totalAmount - ($discount->discount_amount *  $totalAmount);
                    session(['afterDiscount' => $totalAmount]);
                } else {
                    return redirect()->route('cart', Auth::user()->id)->with('error', "You can not apply discount on empty cart");
                }
            } else {
                return redirect()->route('cart', Auth::user()->id)->with('error', "Discount Expired");
            }
        } else {
            return redirect()->route('cart', Auth::user()->id)->with('error', "not found");
        }
        // dd($totalAmount); // the total wrong
        return redirect()->route('cart', Auth::user()->id)->with('successapply', "Discount Applied");
    }
}
