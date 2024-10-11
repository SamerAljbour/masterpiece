<?php

namespace App\Http\Controllers;

use App\Models\PaymentHistory;
use App\Models\Product;
use App\Models\Review;
use App\Models\Seller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SellerController extends Controller
{
    public function homeSeller(Seller $seller)
    {
        $sellerInfo = Seller::with('products')->where('user_id', Auth::user()->id)->first();

        // get the id of the products in array
        $productIds = $sellerInfo->products->pluck('id')->toArray();
        $revenue = PaymentHistory::with('seller')
            ->whereIn('product_id', $productIds) // Filter payment histories by product IDs
            ->where('seller_id', $sellerInfo->id) // Ensure we're filtering for the specific seller
            ->sum('amount');
        // dd($revenue);

        return view('dashboard.indexSeller', compact('sellerInfo', 'revenue'));
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $sellerInfo = Seller::where('user_id', Auth::user()->id)->first();

        // $rating = Review::with("Product")->get();
        $searchInput = $request->input('search');
        if (trim($searchInput)) {
            $products = Product::with(["category", "seller", "reviews", "photos"])->where('seller_id', $sellerInfo->id)
                ->where('name', 'LIKE', '%' . $searchInput . '%')->get();
        } else {
            $products = Product::with(["category", "seller", "reviews", "photos"])->where('seller_id', $sellerInfo->id)->get();
        }
        $countOfSoldProduct = PaymentHistory::where('user_id', Auth::user()->id)->count();
        $productCount = Product::with(["category", "seller", "reviews"])->where('seller_id', $sellerInfo->id)->count();
        // $products = Product::with(["category", "seller", "reviews"])->where('seller_id', $sellerId)->get();
        // dd($sellerInfo);
        return view("dashboard.store", compact("products", "sellerInfo", "productCount", "countOfSoldProduct"));
    }
    public function showProfile()
    {

        $sellerInfo = User::with(['seller'])->where('id', Auth::user()->id)->first();
        // dd($sellerInfo);
        return view("dashboard.profile", compact("sellerInfo"));
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
    public function updateStoreInfo(Request $request)
    {
        try {
            $data = $request->validate([
                'store_name' => 'required',
                'store_description' => 'required',
                'store_thumbnail' => 'required|image', // Ensure this is a file input
            ]);

            $path = null;
            if ($request->hasFile('store_thumbnail')) {
                $file = $request->file('store_thumbnail');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $path = $file->storeAs('public/thumbnails', $filename); // Store the image and get the path
            }

            Seller::where('user_id', Auth::user()->id)
                ->update([
                    'store_name' => $data['store_name'],
                    'store_description' => $data['store_description'],
                    'store_thumbnail' => $path,
                    'is_setup' => 1,
                ]);

            return redirect()->back()->with('success', 'Congratulations, you updated your store successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'There was an error: ' . $e->getMessage());
        }
    }
}
