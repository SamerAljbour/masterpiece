<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartProduct;
use App\Models\DiscountCoupon;
use App\Models\PaymentHistory;
use App\Models\Product;
use App\Models\ProductVariantCombination;
use App\Models\Review;
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

            if (!Auth::user()) {
                return redirect()->back()->with('error', 'You need to create account or login to access this feature.');
            }
            // Validate the request data
            $validator = Validator::make($request->all(), [
                'product_id' => 'required|integer|exists:products,id',
                'quantity' => 'required|integer|min:1',
                'price' => 'required|numeric|min:0',
                'variant_id' => 'required|integer|exists:product_variant_combinations,id', // Added this line for validation
            ]);

            // Handle validation errors
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            // Extract inputs
            $userId = Auth::user()->id;
            $productId = $request->input('product_id');
            $quantity = $request->input('quantity');
            $price = $request->input('price');
            $variantId = $request->input('variant_id');

            // Get the variant and check stock
            $variant = ProductVariantCombination::findOrFail($variantId);
            // dd($variant);

            // Check if the desired quantity exceeds available stock
            if ($quantity > $variant->stock) {
                return redirect()->back()->with('error', 'Requested quantity exceeds available stock.');
            }

            // Create or find the cart for the user
            $cart = Cart::firstOrCreate(['user_id' => $userId]);

            // Check if the product is already in the cart (excluding soft-deleted ones)
            $existingProduct = $cart->products()
                ->where('product_id', $productId)
                ->where('variant_id', $variantId) // Include variant check if necessary
                ->whereNull('cart_product.deleted_at') // Ensure that the product in cart is not soft-deleted
                ->whereNull('products.deleted_at') // Ensure the product itself is not soft-deleted
                ->first();

            // Calculate total amount for the current product
            $productTotal = $price * $quantity;

            if ($existingProduct) {
                // If the product is found and not soft-deleted, update the quantity
                $newQuantity = $existingProduct->pivot->quantity + $quantity;

                // Check if adding the quantity exceeds the available stock
                if ($newQuantity > $variant->stock) {
                    return redirect()->back()->with('error', 'Requested quantity exceeds available stock.');
                }

                // Calculate the new total for the updated quantity
                $newProductTotal = $price * $newQuantity;

                // Update the existing product's quantity in the pivot table
                $cart->products()->updateExistingPivot($productId, [
                    'quantity' => $newQuantity,
                    'price' => $price,
                    'variant_id' => $variantId,
                ]);

                // Update the cart's total by adjusting the amount for the updated product
                $cart->total_amount -= $existingProduct->pivot->quantity * $price; // Remove old amount
                $cart->total_amount += $newProductTotal; // Add new amount
            } else {
                // If the product is not found in the cart or was soft-deleted, attach it as a new product
                $cart->products()->attach($productId, [
                    'quantity' => $quantity,
                    'price' => $price,
                    'variant_id' => $variantId,
                ]);

                // Add the product's total price to the cart's total amount
                $cart->total_amount += $productTotal;
            }

            // Save the updated cart total
            $cart->save();

            // Return a success response
            return redirect()->back()->with('success', 'Product added to the cart.');
        } catch (\Exception $e) {
            // Catch any errors and return with an error message
            return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }





    public function storeToCartQua(Request $request)
    {
        try {
            if (!Auth::user()) {
                return redirect()->back()->with('error', 'You need to create account or login to access this feature.');
            }
            // Validate the request data
            $validator = Validator::make($request->all(), [
                'cart_id' => 'required|integer|exists:users,id',
                'product_id' => 'required|integer|exists:products,id',
                'variant_id' => 'required|exists:product_variant_combinations,id',
                'quantity' => 'required|integer|min:1',
                'price' => 'required|numeric|min:0',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            // Extract inputs
            $userId = Auth::user()->id;
            $productId = $request->input('product_id');
            $quantity = $request->input('quantity');
            $price = $request->input('price');
            $variantId = $request->input('variant_id');

            $variant = ProductVariantCombination::findOrFail($variantId);

            // Calculate the total amount for the current product
            $totalAmount = $price * $quantity;

            // Create or find the cart for the user
            $cart = Cart::firstOrCreate(['user_id' => $userId]);

            // Check if the product with the same variant is already in the cart, including soft-deleted products
            $existingProduct = $cart->products()
                ->where('product_id', $productId)
                ->where('variant_id', $variantId) // Include variant check if necessary
                ->whereNull('cart_product.deleted_at') // Ensure that the product in cart is not soft-deleted
                ->whereNull('products.deleted_at') // Ensure the product itself is not soft-deleted
                ->first();

            // Handle product already in cart
            if ($existingProduct) {
                // If the product is found and not soft-deleted, update the quantity
                $newQuantity = $existingProduct->pivot->quantity + $quantity;

                // Check if adding the quantity exceeds the available stock
                if ($newQuantity > $variant->stock) {
                    return redirect()->back()->with('error', 'Requested quantity exceeds available stock.');
                }

                // Calculate the new total for the updated quantity
                $newProductTotal = $price * $newQuantity;

                // Update the existing product's quantity in the pivot table
                $cart->products()->updateExistingPivot($productId, [
                    'quantity' => $newQuantity,
                    'price' => $price,
                    'variant_id' => $variantId,
                ]);

                // Update the cart's total by adjusting the amount for the updated product
                $cart->total_amount -= $existingProduct->pivot->quantity * $price; // Remove old amount
                $cart->total_amount += $newProductTotal; // Add new amount
            } else {
                // If the product is not found in the cart or was soft-deleted, attach it as a new product
                $cart->products()->attach($productId, [
                    'quantity' => $quantity,
                    'price' => $price,
                    'variant_id' => $variantId,
                ]);

                // Add the product's total price to the cart's total amount
                // $cart->total_amount += $newProductTotal;
            }


            // Recalculate total amount for the cart
            $this->updateCartTotal($cart);

            return redirect()->route('productdetail', $productId)->with('success', 'Product added to the cart.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }


    // Helper method to update cart total
    private function updateCartTotal($cart)
    {
        $totalAmount = $cart->products()
            ->wherePivot('deleted_at', null) // Only consider non-deleted products for total calculation
            ->get()
            ->sum(function ($product) {
                return $product->pivot->quantity * $product->price; // Use the price directly
            });

        $cart->total_amount = $totalAmount;
        $cart->save();
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
        // dd($cartData);
        return view('frontend/cart', ['cart' => $cart, 'cartData' => $cartData, 'totalCartPrice' => $totalCartPrice]);
    }
    public function updateCart(Request $request, string $productId)
    {
        // Retrieve the quantity from the request
        $quantity = intval($request->input('quantity'));
        // Find the cart for the authenticated user
        $cart = Cart::where("user_id", Auth::user()->id)->first();

        if ($cart) {
            // Update the quantity of the product in the cart
            $cart->products()->updateExistingPivot($productId, ['quantity' => $quantity]);

            // Recalculate the total amount based on product pricing and any discounts
            $totalAmount = $cart->products()
                ->wherePivot('deleted_at', null)
                ->get()
                ->sum(function ($product) {
                    // Check if the product is on sale
                    if ($product->on_sale) {
                        $price = $product->price - ($product->price * $product->on_sale);
                    } else {
                        $price = $product->price;
                    }
                    // dd($price * $product->pivot->quantity);
                    return $product->pivot->quantity * $price; // Calculate total for this product
                });
            // dd($totalAmount);

            // Update the cart's total amount
            $cart->total_amount = $totalAmount;
            $cart->save();
        }

        // Retrieve updated cart data
        $cartData = $cart->products()
            ->wherePivotNull('deleted_at') // Ensure soft-deleted products are excluded
            ->get();

        return redirect()->route('cart', Auth::user()->id)->with('successClear', "The data has been updated.");
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

        return redirect()->back()->with('successClear', "the one  data deleted");
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
        // $isOnSale = $request->input('on_sale');
        // if ($isOnSale) {
        //     return redirect()->route('cart', Auth::user()->id)->with('error', "You can not apply discount on product already on sale");
        // }
        $discount = DiscountCoupon::where('code', $discountCopon)->first();
        $cart = Cart::where("user_id", Auth::user()->id)->first();

        $cartData = $cart->products()
            ->wherePivotNull('deleted_at')
            ->get();
        // dd()
        if ($discount) {
            if ($discount->is_active) {
                if ($cartData->count() > 0) {
                    $cart = CartProduct::with(['product', 'cart'])->get();
                    dd($cart);
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
