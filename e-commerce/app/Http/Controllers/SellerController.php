<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use App\Models\Seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SellerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $sellerId = Auth::user()->id;
        // $rating = Review::with("Product")->get();
        $searchInput = $request->input('search');
        if (trim($searchInput)) {
            $products = Product::with(["category", "seller", "reviews"])->where('seller_id', $sellerId)
                ->where('name', 'LIKE', '%' . $searchInput . '%')->get();
        } else {
            $products = Product::with(["category", "seller", "reviews"])->where('seller_id', $sellerId)->get();
        }
        $sellerInfo = Seller::where('user_id', $sellerId)->first();
        $productCount = Product::with(["category", "seller", "reviews"])->where('seller_id', $sellerId)->count();
        // $products = Product::with(["category", "seller", "reviews"])->where('seller_id', $sellerId)->get();
        // dd($sellerInfo);
        return view("dashboard.store", compact("products", "sellerInfo", "productCount"));
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
    public function show(Seller $seller)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Seller $seller)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Seller $seller)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Seller $seller)
    {
        //
    }
    public function searchOnProduct(Request $request)
    {
        $sellerId = Auth::user()->id;


        return view("dashboard.store", compact("products"));
    }
}
