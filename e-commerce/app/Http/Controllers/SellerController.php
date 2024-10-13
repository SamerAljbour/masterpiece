<?php

namespace App\Http\Controllers;

use App\Models\PaymentHistory;
use App\Models\Product;
use App\Models\Review;
use App\Models\Seller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SellerController extends Controller
{
    public function homeSeller(Seller $seller)
    {
        // Fetch seller information
        $sellerInfo = Seller::with('products')->where('user_id', Auth::user()->id)->first();

        // Get the IDs of the products belonging to the seller
        $productIds = $sellerInfo->products->pluck('id')->toArray();
        $reviews = Review::with('user')->whereIn('product_id', $productIds)
            ->get();
        // dd($reviews);
        // Calculate total totalSales from the seller's products
        $totalSales = PaymentHistory::whereIn('product_id', $productIds)
            ->where('seller_id', $sellerInfo->id)
            ->sum('amount');

        // this for the chart
        // Define the start date for daily sales
        $startDate = Carbon::now()->subDays(7);

        // Get daily sales data for the last 7 days
        $dailySales = PaymentHistory::selectRaw('SUM(amount) as total, DATE(created_at) as date')
            ->where('created_at', '>=', $startDate)
            ->whereIn('product_id', $productIds)
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        // Prepare data for the chart
        $labels = [];
        $dailyData = [];
        $weeklyData = []; // For storing weekly sales

        // Initialize arrays for daily and weekly sales
        for ($i = 0; $i < 7; $i++) {
            $date = $startDate->copy()->addDays($i)->toDateString();
            $labels[] = $date;

            // Daily sales
            $sale = $dailySales->where('date', $date)->first();
            $dailyData[] = $sale ? $sale->total : 0; // If no sales, set to 0

            // Calculate cumulative sales for the week up to the current day
            $weeklyTotal = PaymentHistory::whereIn('product_id', $productIds)
                ->where('created_at', '>=', Carbon::now()->subWeek()->startOfWeek()) // Weekly total from the start of the week
                ->where('created_at', '<=', Carbon::now()->startOfWeek()->addDays($i)->endOfDay()) // Up to current date
                ->sum('amount');

            $weeklyData[] = $weeklyTotal; // Store cumulative weekly sales
        }
        // dd($sellerInfo);
        $productCount = Product::with(["category", "seller", "reviews"])->where('seller_id', $sellerInfo->id)->count();

        return view('dashboard.indexSeller', compact(
            'sellerInfo',
            'totalSales',
            'labels', // Labels for the chart
            'dailyData', // Daily sales data for the chart
            'weeklyData', // Weekly sales data for the chart
            'productCount',
            'reviews',
        ));
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
                'store_location' => 'required', // Ensure this is a file input
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
                    'location' => $data['store_location'],
                    'is_setup' => 1,
                ]);

            return redirect()->back()->with('success', 'Congratulations, you updated your store successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'There was an error: ' . $e->getMessage());
        }
    }
}
