<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;

class ProductListController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get();
        // dd($products);
        return view('frontend.productList', compact('products'));
    }
    public function productDetails(string $id)
    {
        $product = Product::with('photos')->where('id', $id)->first();
        $reviews = Review::with(['product', 'user'])->where('product_id', $id)->get();

        // dd($reviews);
        return view('frontend.productdetail',  compact('product', 'reviews'));
    }
}
