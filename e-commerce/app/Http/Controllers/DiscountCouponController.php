<?php

namespace App\Http\Controllers;

use App\Models\DiscountCoupon;
use App\Models\Seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiscountCouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all discount coupons with their associated seller
        if (Auth::user()->role_id == 2)
            $discounts = DiscountCoupon::with('seller')->where('seller_id', Auth::user()->id)->get();
        else {
            $discounts = DiscountCoupon::with('seller')->get();
        }
        foreach ($discounts as $discount) {
            // Format the 'valid_from' and 'valid_until' dates to 'Y-m-d'
            $discount->valid_from = \Carbon\Carbon::parse($discount->valid_from)->format('Y-m-d');
            $discount->valid_until = \Carbon\Carbon::parse($discount->valid_until)->format('Y-m-d');

            // Call the method to update the activity status of the discount coupon
            $discount->updateActivity();
        }

        // Return the view with the list of discount coupons
        return view('dashboard.discount.indexDiscount', compact('discounts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $allSellers = Seller::with('user')->get();
        return view('dashboard/discount/createDiscount', compact('allSellers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validateData = $request->validate([
            'code' => 'required|string|max:255', // Ensure code is required, is a string, and has a maximum length of 255 characters
            'discount_amount' => 'required|numeric|min:0', // Ensure discount_amount is required, is a number, and is non-negative
            'valid_from' => 'required|date|after_or_equal:today', // Ensure valid_from is required, is a valid date, and is today or in the future
            'valid_until' => 'required|date|after:valid_from', // Ensure valid_until is required, is a valid date, and is after valid_from
        ]);

        // Conditionally add validation rule for 'toSeller'
        if (Auth::user()->role_id == 3) {
            $validateData['toSeller'] = 'required';
        }

        // Create a new DiscountCoupon instance
        $discount = new DiscountCoupon();
        $discount->code = $validateData['code'];
        $discount->user_id = Auth::user()->id;
        $discount->discount_amount = $validateData['discount_amount']; // Use validated value
        $discount->with_on_sale = $request->input('with_on_sale', false); // Default to false if not provided
        $discount->valid_from = $validateData['valid_from']; // Use validated value
        $discount->valid_until = $validateData['valid_until']; // Use validated value
        $discount->is_active = 1; // means default is active

        // Check if 'toSeller' is present in the request and assign it
        if ($request->has('toSeller')) {
            $discount->seller_id = $request->input('toSeller'); // Use the input from the request
        }

        // Attempt to save the discount coupon
        try {
            if ($discount->save()) {
                $discount->updateActivity();
                return redirect()->route('alldiscounts')->with('success', 'You created a discount');
            }
        } catch (\Illuminate\Database\QueryException $e) {
            // Check for a specific error code related to duplicate entry
            if ($e->errorInfo[1] == 1062) {
                return redirect()->route('alldiscounts')->with('error', 'The discount code already exists. Please choose a different code.');
            }
            // Handle other query exceptions
            return redirect()->route('alldiscounts')->with('error', 'An error occurred while creating the discount: ' . $e->getMessage());
        }

        // Fallback for failure (should not be hit if save() works correctly)
        return redirect()->route('alldiscounts')->with('error', 'Error occurs while creating a discount');
    }


    /**
     * Display the specified resource.
     */
    public function show(DiscountCoupon $discountCoupon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DiscountCoupon $discountCoupon, string $id)
    {
        $discountCoupon = DiscountCoupon::find($id);
        $discountCoupon->valid_from = \Carbon\Carbon::parse($discountCoupon->valid_from)->format('Y-m-d');
        $discountCoupon->valid_until = \Carbon\Carbon::parse($discountCoupon->valid_from)->format('Y-m-d');
        return view('dashboard/discount/updateDiscount', compact('discountCoupon'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the request data
        $validateData = $request->validate([
            'code' => 'required|string|max:255', // Ensure code is required, is a string, and has a maximum length of 255 characters
            'discount_amount' => 'required|numeric|min:0',
            // 'with_on_sale' => 'required',
            'valid_from' => 'required|date|after_or_equal:today', // Ensure valid_from is required, is a valid date, and is today or in the future
            'valid_until' => 'required|date|after:valid_from', // Ensure valid_until is required, is a valid date, and is after valid_from
        ]);

        $discount = DiscountCoupon::find($id);
        if ($discount) {
            $discount->code = $validateData['code'];
            $discount->discount_amount = $validateData['discount_amount'];
            $discount->valid_from = $validateData['valid_from'];
            $discount->valid_until = $validateData['valid_until'];
            $discount->with_on_sale = $request->input('with_on_sale', false); // Default to false if not provided
            $discount->is_active = 1; // means default is active

            // Attempt to save the discount coupon
            try {
                if ($discount->save()) {
                    $discount->updateActivity();
                    return redirect()->route('alldiscounts')->with('success', 'You updated the discount');
                }
            } catch (\Illuminate\Database\QueryException $e) {
                // Check for a specific error code related to duplicate entry
                if ($e->errorInfo[1] == 1062) {
                    return redirect()->route('alldiscounts')->with('error', 'The discount code already exists. Please choose a different code.');
                }
                // Handle other query exceptions
                return redirect()->route('alldiscounts')->with('error', 'An error occurred while updating the discount: ' . $e->getMessage());
            }

            // Fallback for failure (should not be hit if save() works correctly)
            return redirect()->route('alldiscounts')->with('error', 'Error occurs while updating the discount');
        } else {
            return redirect()->route('alldiscounts')->with('error', 'Discount not found');
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DiscountCoupon $discountCoupon, string $id)
    {
        $discount = DiscountCoupon::find($id);
        if ($discount) {
            $discount->delete();
            return redirect()->route('alldiscounts')->with('deleted', 'Discount copon Deleted');
        } else {
        }
    }
    // showing the seller discount that he created
    public function showsSellerDiscount($sellerId)
    {
        $discounts = DiscountCoupon::where("user_id", $sellerId)->get();


        return view('dashboard/discount/indexDiscount', compact('discounts'));
    }
}
