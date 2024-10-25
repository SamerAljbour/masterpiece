<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use App\Models\PaymentHistory;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Seller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function adminHome()
    {
        $totalUsers = User::count();
        $totalSellers = Seller::count();
        $totalAdmins = User::where('role_id', 3)->count();
        $totalSales = PaymentHistory::sum('amount');
        $totalOrders = PaymentHistory::count();

        // Fetch daily sales for the current week
        $dailySales = PaymentHistory::selectRaw('DAYOFWEEK(created_at) as day, SUM(amount) as total')
            ->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])
            ->groupBy('day')
            ->orderBy('day')
            ->pluck('total', 'day');

        // Ensure all days of the week are included, even if no sales occurred
        $daysOfWeek = [1, 2, 3, 4, 5, 6, 7]; // 1 = Sunday, 2 = Monday, ..., 7 = Saturday
        $salesData = [];
        foreach ($daysOfWeek as $day) {
            $salesData[] = $dailySales->get($day, 0); // Default to 0 if no sales for the day
        }

        // Fetch monthly sales for the current year
        $monthlySales = PaymentHistory::selectRaw('MONTH(created_at) as month, SUM(amount) as total')
            ->whereYear('created_at', now()->year)
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('total', 'month');

        // Ensure all months are included
        $monthsOfYear = range(1, 12); // Months from 1 to 12
        $monthlyData = [];
        foreach ($monthsOfYear as $month) {
            $monthlyData[] = $monthlySales->get($month, 0); // Default to 0 if no sales for the month
        }

        // Calculate total weekly sales
        $totalWeeklySales = PaymentHistory::whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])
            ->sum('amount');
        $stores = Seller::with('user', 'paymentHistories')->get();
        $feedbacks = ContactUs::all();
        // $payment  = PaymentHistory::with('seller', 'user')->get();
        // dd($stores);
        return view('dashboard.indexAdmin', compact(
            'totalUsers',
            'totalSellers',
            'totalAdmins',
            'totalSales',
            'totalOrders',
            'salesData',
            'feedbacks',
            'stores',
            'monthlyData', // Pass the monthly sales data to the view
            'totalWeeklySales' // Pass the total weekly sales to the view
        ));
    }

    public function showAllStores()
    {
        $allSellers = Seller::with(['user', 'products' => function ($query) {
            $query->withCount('reviews'); // Count reviews for each product
        }])
            ->withCount('products') // Count the number of products for each seller
            ->get();



        // dd($allSellers);
        return view('dashboard.allStores', compact('allSellers'));
    }

    public function viewStore(string $id)
    {
        $sellerInfo = Seller::with('user')->where('id', $id)->first();
        $products = Product::with(["category", "seller", "reviews", "photos"])->where('seller_id', $id)->get();
        $countOfSoldProduct = PaymentHistory::where('user_id', $id)->count();
        $productCount = Product::with(["category", "seller", "reviews"])->where('seller_id', $sellerInfo->id)->count();
        // dd($sellerInfo->rating);

        return view('dashboard.viewStore', compact('sellerInfo', 'products', 'productCount', 'countOfSoldProduct'));
    }



    // <=================================== User CRUD ===========================================>
    public function allUsers()
    {
        $users = User::with('role')->get();
        $pendingSellers = User::where('status', 'pending')->where('role_id', 2)->get();
        $pendingCount = $pendingSellers->count(); // Get the count of pending sellers



        // dd($users);
        // foreach ($users as $user) {
        //     echo $user->role->name; // Access the role name
        // }
        return view('dashboard/user/userIndex', compact('users', 'pendingCount'));
    }

    public function createUser()
    {
        $roles = Role::all();

        return view('dashboard/user/createUser', compact('roles'));
    }

    public function storeNewUser(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role_id' => 'required'
        ]);
        $user = new User();
        $user->name = $validateData['name'];
        $user->email = $validateData['email'];
        $user->password = $validateData['password'];
        $user->role_id = $validateData['role_id'];
        $user->status = 'pending';
        $user->user_image = 'public/usersImages/userDefaultImage.jpeg';
        if ($user->save()) {

            return redirect()->route('allUsers')->with('successCreating', 'User Created Successfully');
        } else {
            return redirect()->route('allUsers')->with('ErrorCreating', 'Somthing went wronge while creating user');
        }
    }

    public function viewOneUser(Request $request, string $id)
    {
        $user = User::find('$id');
        return view('adminDashboard/user/userIndex', compact('user'));
    }
    public function editUser(string $id)
    {
        $roles = Role::all();
        $user = User::find($id);

        return view('dashboard.user.updateUser', compact('roles', 'user'));
    }

    public function updateUser(Request $request, string $id)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role_id' => 'required'
        ]);
        $user = User::find($id);
        if ($user) {
            $user->name = $validateData['name'];
            $user->email = $validateData['email'];
            $user->password = $validateData['password'];
            $user->role_id = $validateData['role_id'];
            if ($user->save()) {

                return redirect()->route('allUsers')->with('success', 'User Updated Successfully');
            } else {
                return redirect()->route('allUsers')->with('Error', 'Somthing went wronge while creating user');
            }
        } else {
            return redirect()->route('allUsers')->with('Error', 'User Not Found');
        }
    }
    public function deleteUser(string $id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
            return redirect()->route('allUsers')->with('successDeleting', 'User Not Found');
        } else {
            return redirect()->route('allUsers')->with('ErrorDeleting', 'User Not Found');
        }
    }
    public function showPendingUsers()
    {
        $pendingSellers = User::with('seller')->where('role_id', 2)->where('status', 'pending')->get();
        // dd($pendingSellers);
        return view('dashboard.user.pendingUsers', compact('pendingSellers'));
    }
    public function approveSeller(string $id)
    {
        $seller = User::where('id', $id)->first();
        $seller->status = 'approved';
        $seller->save();
        // dd($seller);
        return redirect()->back()->with('success', `You approved on the seller  $seller->name`);
    }
    public function rejectSeller(string $id)
    {
        $seller = User::where('id', $id)->first();
        $seller->status = 'rejected';
        $seller->save();
        // dd($seller);
        return redirect()->back()->with('success', `You approved on the seller  $seller->name`);
    }
    // <=================================== End of User CRUD ===========================================>
    public function updateStoreInfo(Request $request, $storeID)
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

            Seller::where('id', $storeID)
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
