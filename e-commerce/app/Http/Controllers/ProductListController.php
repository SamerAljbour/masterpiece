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
        $categories = Category::withCount('products')->get();

        // Validate the request
        $request->validate([
            'categories' => 'array',
            'categories.*' => 'integer|exists:categories,id',
        ]);

        // Initialize filters
        $minPrice = $request->input('minPrice', 0);
        $maxPrice = $request->input('maxPrice', 99999999);
        $location = $request->input('location', "");
        $date = $request->input('date', "");
        $selectedCategories = $request->input('categories', []);
        $show = $request->input('show', 10);
        $sortBy = $request->input('sortBy', '');
        $searchTerm = $request->input('q'); // Get the search term

        // Start building the query
        $products = Product::with('seller')->when($selectedCategories, function ($query) use ($selectedCategories) {
            return $query->whereIn('category_id', $selectedCategories);
        })
            ->when($minPrice, function ($query) use ($minPrice) {
                return $query->where('price', '>=', $minPrice);
            })
            ->when($maxPrice, function ($query) use ($maxPrice) {
                return $query->where('price', '<=', $maxPrice);
            })
            ->when($location, function ($query) use ($location) {
                return $query->whereHas('seller', function ($query) use ($location) {
                    return $query->where('location', '=', $location);
                });
            })
            // Include the search functionality
            ->when($searchTerm, function ($query) use ($searchTerm) {
                return $query->where('name', 'LIKE', '%' . $searchTerm . '%'); // Assuming 'name' is the column to search
            });

        // Sorting logic
        if ($sortBy == 'Price asc') {
            $products = $products->orderBy('price', 'asc');
        } elseif ($sortBy == 'Price desc') {
            $products = $products->orderBy('price', 'desc');
        } elseif ($sortBy == 'Rate asc') {
            $products = $products->orderBy('rating', 'asc');
        } elseif ($sortBy == 'Rate desc') {
            $products = $products->orderBy('rating', 'desc');
        } elseif ($sortBy == 'Date desc') {
            $products = $products->orderBy('created_at', 'desc');
        } elseif ($sortBy == 'Date asc') {
            $products = $products->orderBy('created_at', 'asc');
        }

        // Paginate the results
        $products = $products->paginate($show);

        return view('frontend.productList', compact('products', 'categories'));
    }


    public function productDetails(string $id)
    {
        $product = Product::with(['photos', 'variants'])->where('id', $id)->first();
        $reviews = Review::with(['product', 'user'])->where('product_id', $id)->get();

        // dd($reviews);
        return view('frontend.productdetail',  compact('product', 'reviews'));
    }
}
