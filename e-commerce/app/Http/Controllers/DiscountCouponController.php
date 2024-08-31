<?php

namespace App\Http\Controllers;

use App\Models\DiscountCoupon;
use Illuminate\Http\Request;

class DiscountCouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $discounts = DiscountCoupon::all();
        return view('adminDashboard/discount/indexDiscount' ,compact('discounts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('adminDashboard/discount/createDiscount');
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
    $discount = new DiscountCoupon();
    $discount->code = $validateData['code'];
    $discount->discount_amount = $validateData['discount_amount'];
    $discount->valid_from = $validateData['valid_from'];
    $discount->valid_until = $validateData['valid_until'];
    $discount->is_active = 1; // means default is active
    if($discount->save()){
        return redirect()->route('alldiscounts')->with('discountCreated' , 'You created an discount');
    }else{
        return redirect()->route('alldiscounts')->with('discountFailed' , 'Error occcurs while creating an discount');

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
    public function edit(DiscountCoupon $discountCoupon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DiscountCoupon $discountCoupon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DiscountCoupon $discountCoupon)
    {
        //
    }
}
