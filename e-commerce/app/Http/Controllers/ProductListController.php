<?php

namespace App\Http\Controllers;

use App\Models\Product;
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
        return view('frontend.productdetail',  compact('product'));
    }
}
