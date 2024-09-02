<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductPhoto;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $products = Product::all();
        $categories = Category::all();
        return view('index' , compact('products' ,'categories'));
    }
    public function productDetails( string $id){
        $product = Product::with('photos')->find($id);
        // dd($product);
        // $productPhotos = ProductPhoto::where('product_id', $id)->get();

        return view('product-detail' , compact('product' ));
    }

}
