<?php

namespace App\Http\Controllers;

use App\Models\DiscountCoupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiscountCouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $discounts = DiscountCoupon::all();

        foreach ($discounts as $discount) {
            $discount->valid_from = \Carbon\Carbon::parse($discount->valid_from)->format('Y-m-d');
            $discount->valid_until = \Carbon\Carbon::parse($discount->valid_until)->format('Y-m-d');
            $discount->updateActivity();
        }

        return view('dashboard/discount/indexDiscount', compact('discounts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard/discount/createDiscount');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // Validate the request data
        $validateData = $request->validate([
            'code' => 'required|string|max:255', // Ensure code is required, is a string, and has a maximum length of 255 characters
            'discount_amount' => 'required|numeric|min:0', // Ensure discount_amount is required, is a number, and is non-negative
            'with_on_sale' => 'required',
            'valid_from' => 'required|date|after_or_equal:today', // Ensure valid_from is required, is a valid date, and is today or in the future
            'valid_until' => 'required|date|after:valid_from', // Ensure valid_until is required, is a valid date, and is after valid_from
        ]);
        $discount = new DiscountCoupon();
        $discount->code = $validateData['code'];
        $discount->user_id = Auth::user()->id;
        $discount->discount_amount = $validateData['discount_amount'];
        $discount->with_on_sale = $validateData['with_on_sale'];
        $discount->valid_from = $validateData['valid_from'];
        $discount->valid_until = $validateData['valid_until'];
        $discount->is_active = 1; // means default is active
        if ($discount->save()) {
            $discount->updateActivity();
            return redirect()->route('alldiscounts')->with('discountCreated', 'You created an discount');
        } else {
            return redirect()->route('alldiscounts')->with('discountFailed', 'Error occcurs while creating an discount');
        }
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
            'with_on_sale' => 'required',
            'valid_from' => 'required|date|after_or_equal:today', // Ensure valid_from is required, is a valid date, and is today or in the future
            'valid_until' => 'required|date|after:valid_from', // Ensure valid_until is required, is a valid date, and is after valid_from
        ]);
        $discount = DiscountCoupon::find($id);
        if ($discount) {
            $discount->code = $validateData['code'];
            $discount->discount_amount = $validateData['discount_amount'];
            $discount->valid_from = $validateData['valid_from'];
            $discount->valid_until = $validateData['valid_until'];
            $discount->with_on_sale = $validateData['with_on_sale'];
            $discount->is_active = 1; // means default is active
            if ($discount->save()) {
                $discount->updateActivity();
                return redirect()->route('alldiscounts')->with('discountCreated', 'You created an discount');
            } else {
                return redirect()->route('alldiscounts')->with('discountFailed', 'Error occcurs while creating an discount');
            }
        } else {
            return redirect()->route('alldiscounts')->with('discountFailed', 'discount not found');
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
