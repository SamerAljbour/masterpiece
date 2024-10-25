<?php

namespace App\Http\Controllers;

use App\Models\PaymentHistory;
use App\Models\Product;
use App\Models\ProductVariantCombination;
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
        $countOfSoldProduct = PaymentHistory::where('seller_id', $sellerInfo->id)->count();

        // Get the IDs of the products belonging to the seller
        $productIds = $sellerInfo->products->pluck('id')->toArray();

        // Fetch reviews for the seller's products
        $reviews = Review::with('user')->whereIn('product_id', $productIds)->get();

        // Calculate total sales from the seller's products
        $totalSales = PaymentHistory::whereIn('product_id', $productIds)
            ->where('seller_id', $sellerInfo->id)
            ->sum('amount');

        // Define the start date for weekly sales (last 7 weeks)
        $startDate = Carbon::now()->subWeeks(7);

        // Get weekly sales data for the last 7 weeks
        $weeklySales = PaymentHistory::selectRaw('SUM(amount) as total, WEEK(created_at) as week, YEAR(created_at) as year')
            ->where('created_at', '>=', $startDate)
            ->whereIn('product_id', $productIds)
            ->groupBy('year', 'week')
            ->orderBy('year', 'asc')  // Order by year ascending
            ->orderBy('week', 'asc')
            ->get();

        // Prepare data for the weekly chart
        $weeklyLabels = [];
        $weeklyData = [];

        // Initialize arrays for weekly sales
        for ($i = 0; $i < 7; $i++) {
            // Calculate the start and end dates for the week, formatted as Month Day
            $weekStart = $startDate->copy()->addWeeks($i)->startOfWeek()->format('M d');  // e.g., 'Oct 01'
            $weekEnd = $startDate->copy()->addWeeks($i)->endOfWeek()->format('M d');      // e.g., 'Oct 07'
            $weeklyLabels[] = "$weekStart - $weekEnd";  // Label as 'Oct 01 - Oct 07'

            // Find sales data for the specific week
            $sale = $weeklySales->where('week', $startDate->copy()->addWeeks($i)->weekOfYear)
                ->where('year', $startDate->copy()->addWeeks($i)->year)
                ->first();

            // Store the total sales for the week or 0 if no sales
            $weeklyData[] = $sale ? $sale->total : 0;
        }

        // Prepare data for the daily chart
        $dailyLabels = [];
        $dailyData = [];
        $dailyStartDate = Carbon::now()->subDays(7); // Last 7 days

        // Initialize arrays for daily sales
        for ($i = 0; $i < 7; $i++) {
            // Format the date as 'M d' (e.g., 'Oct 01')
            $dailyLabels[] = $dailyStartDate->copy()->addDays($i)->format('M d');

            // Calculate total sales for the day
            $dailySales = PaymentHistory::whereIn('product_id', $productIds)
                ->where('seller_id', $sellerInfo->id)
                ->whereDate('created_at', '=', $dailyStartDate->copy()->addDays($i)->toDateString())
                ->sum('amount');

            // Store the daily sales or 0 if no sales
            $dailyData[] = $dailySales;
        }

        // Count the total number of products for the seller
        $productCount = Product::with(["category", "seller", "reviews"])->where('seller_id', $sellerInfo->id)->count();

        $transactions = PaymentHistory::with(['user'])
            ->where('seller_id', $sellerInfo->id)
            ->orderBy('created_at', 'asc')
            ->paginate(10);
        // dd($transactions);
        // Return view with seller info, sales, and chart data
        return view('dashboard.indexSeller', compact(
            'sellerInfo',
            'totalSales',
            'weeklyLabels',    // Weekly labels for the chart
            'weeklyData',      // Weekly sales data for the chart
            'dailyLabels',     // Daily labels for the chart
            'dailyData',       // Daily sales data for the chart
            'productCount',
            'countOfSoldProduct',
            'reviews',
            'transactions'
        ));
    }


    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Retrieve the seller info based on the authenticated user
        $sellerInfo = Seller::where('user_id', Auth::user()->id)->first();

        // Get the search input from the request
        $searchInput = $request->input('search');

        // Check if there is a search input and fetch paginated products
        if (trim($searchInput)) {
            $products = Product::with(['category', 'seller', 'reviews', 'photos', 'variants'])
                ->where('seller_id', $sellerInfo->id)
                ->where('name', 'LIKE', '%' . $searchInput . '%')
                ->paginate(9);
        } else {
            // Fetch all paginated products for the seller if no search input is provided
            $products = Product::with(['category', 'seller', 'reviews', 'photos', 'variants'])
                ->where('seller_id', $sellerInfo->id)
                ->paginate(9);
        }

        // Count the number of sold products for the seller
        $countOfSoldProduct = PaymentHistory::where('seller_id', $sellerInfo->id)->count();

        // Count the total number of products the seller owns
        $productCount = Product::where('seller_id', $sellerInfo->id)->count();
        // dd($producsts);
        // Return the view with the products, seller info, and product counts
        return view('dashboard.store', compact('products', 'sellerInfo', 'productCount', 'countOfSoldProduct'));
    }

    public function showProfile()
    {

        $sellerInfo = User::with(['seller'])->where('id', Auth::user()->id)->first();
        // dd($sellerInfo);
        return view("dashboard.profile", compact("sellerInfo"));
    }


    public function searchOnProduct(Request $request)
    {
        $sellerId = Auth::user()->id;


        return view("dashboard.store", compact("products"));
    }
    public function updateStoreInfo(Request $request)
    {
        // dd($request->all());
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
            // for redirction purpose
            if (Auth::user()->status == 'pending')
                return redirect()->route('loginRegisterSeller')->with('success', 'Congratulations, you saved your store info successfully');
            else
                return redirect()->back()->with('success', 'Congratulations, you updated your store successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'There was an error: ' . $e->getMessage());
        }
    }
    function updateStockForProductVariant(Request $request, string $id)
    {
        $newStock = $request->validate([
            'newStock' => 'required',
        ]);
        $variant  = ProductVariantCombination::find($id);
        $variant->stock = $newStock['newStock'];
        $updatedTotal = $variant->where('product_id', $variant->product_id)->sum('stock');

        if ($variant->save()) {
            Product::where('id', $variant->product_id)->update([
                'total_stock' => $updatedTotal
            ]);
            return redirect()->back()->with('success', 'Stock updated successfully for the variant.');
        } else {
            return redirect()->back()->with('error', 'An error occurred while updating the stock. Please try again.');
        };
    }
    // for Notification
    public function markAsRead($id)
    {
        $notification = \App\Models\Notification::find($id);

        // Debugging statement
        // dd($notification);

        if ($notification) {
            $notification->read_at = now();
            $notification->save();
        }

        return back()->with('success', 'Notification marked as read.');
    }
}
