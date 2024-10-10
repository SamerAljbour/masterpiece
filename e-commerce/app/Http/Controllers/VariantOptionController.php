<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Seller;
use App\Models\VariantOption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VariantOptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sellerId = Auth::user()->id;


        $sellerInfo = Seller::where('user_id', $sellerId)->first();
        $productCount = Product::with(["category", "seller", "reviews"])->where('seller_id', $sellerId)->count();
        return view("dashboard.store", compact("sellerInfo"));
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
