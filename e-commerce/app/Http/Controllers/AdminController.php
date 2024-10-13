<?php

namespace App\Http\Controllers;

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

        return view('dashboard.indexAdmin', compact(
            'totalUsers',
            'totalSellers',
            'totalAdmins',
            'totalSales',
            'totalOrders',
            'salesData',
            'monthlyData', // Pass the monthly sales data to the view
            'totalWeeklySales' // Pass the total weekly sales to the view
        ));
    }

    public function showAllStores()
    {
        $allSellers = Seller::with('user', 'products')
            ->withCount('products')
            // ->withCount('products')
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
        // dd($users);
        // foreach ($users as $user) {
        //     echo $user->role->name; // Access the role name
        // }
        return view('dashboard/user/userIndex', compact('users'));
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

        return view('adminDashboard/user/updateUser', compact('roles', 'user'));
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

                return redirect()->route('allUsers')->with('successUpdating', 'User Updated Successfully');
            } else {
                return redirect()->route('allUsers')->with('ErrorUpdating', 'Somthing went wronge while creating user');
            }
        } else {
            return redirect()->route('allUsers')->with('ErrorUpdating', 'User Not Found');
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
    // <=================================== End of User CRUD ===========================================>

}
