<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;

class ProductListController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::with(['category', 'reviews', 'variants'])->paginate(10);
        $categories = Category::withCount('products')->get();
        $request->validate([
            'categories' => 'array',
            'categories.*' => 'integer|exists:categories,id',
        ]);
        $minPrice = $request->input('minPrice', 0); // Default to 0 if not set
        $maxPrice = $request->input('maxPrice', 99999999); // Set a high default for maximum price
        // Access selected categories
        $selectedCategories = $request->input('categories', []);
        $show = $request->input('show');

        if (is_null($show) || trim($show) === '') {
            $show = 10; // Default to showing 10 products per page
        } else {
            $show = (int)$show;
        }
        $sortBy = $request->input('sortBy', '');
        // Retrieve products that based on  to the selected categories or price
        $products = Product::when($selectedCategories, function ($query) use ($selectedCategories) { // use allow the function to use the selectedCategories
            return $query->whereIn('category_id', $selectedCategories);
        })
            ->when($minPrice, function ($query) use ($minPrice) {
                return $query->where('price', '>=', $minPrice);
            })
            ->when($maxPrice, function ($query) use ($maxPrice) {
                return $query->where('price', '<=', $maxPrice);
            });
        if ($sortBy == 'Price asc') {
            $products = $products->orderBy('price', 'asc');
        } elseif ($sortBy == 'Price desc') {
            $products = $products->orderBy('price', 'desc');
        } elseif ($sortBy == 'Rate asc') {
            $products = $products->orderBy('rating', 'asc');
        } elseif ($sortBy == 'Rate desc') {
            $products = $products->orderBy('rating', 'desc');
        }
        $products = $products->paginate($show);
        // dd($categories);
        return view('frontend.productList', compact('products', 'categories'));
    }

    public function productDetails(string $id)
    {
        $product = Product::with(['photos', 'variants'])->where('id', $id)->first();
        $reviews = Review::with(['product', 'user'])->where('product_id', $id)->get();

        // dd($product->variants);
        return view('frontend.productdetail',  compact('product', 'reviews'));
    }
}
