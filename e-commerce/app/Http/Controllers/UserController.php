<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Seller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function viewReg()
    {
        return view('regAndLogin/loginRegister');
    }
    public function viewSellerReg()
    {
        return view('regAndLogin/sellerRegister');
    }
    public function register(Request $request)
    {
        try {
            // dd($request->input('role_id'));
            if ($request->input('role_id') == 1) { // as user
                $validateData = $request->validate([
                    'name' => 'required',
                    'email' => 'required|email:users',
                    'password' => 'required|min:8|max:12',
                    'role_id' => 'required',
                ]);
            } elseif ($request->input('role_id') == 2) { // as seller
                $validateData = $request->validate([
                    'name' => 'required',
                    'email' => 'required|email:users',
                    'password' => 'required|min:8|max:12',
                    'phone' => 'required|min:10|max:10',
                    'address' => 'required',
                    'role_id' => 'required',
                ]);
            }


            $mainImagePath = null;
            if ($request->hasFile('user_image')) {
                $file = $request->file('user_image');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $mainImagePath = $file->storeAs('public/usersImages', $filename);
            } else {
                $mainImagePath = 'public/usersImages/userDefaultImage.jpeg';
            }

            // dd($validateData);
            $user = new User();
            $user->name = $validateData['name'];
            $user->email = $validateData['email'];
            $user->password = $validateData['password'];
            if ($request->input('role_id') == 2) {
                $user->phone = $validateData['phone'];
                $user->address = $validateData['address'];
            }
            $user->role_id = $validateData['role_id'];
            $user->user_image = $mainImagePath;
            $user->save();
            Cart::create([
                'user_id' => $user->id
            ]);
            if ($request->input('role_id') == 2) {
                Seller::create([
                    'user_id' =>  $user->id,
                    'store_name' =>  "my store",
                    'store_description' =>  "my store description",
                    'rating' =>  0,

                ]);
            }

            return redirect()->route('loginRegister')->with('successRegister', "you created account successfully");
        } catch (QueryException $e) {
            if ($e->errorInfo[1] == 1062) {
                return redirect()->route('loginRegister')->with('failedRegister', "email already exists");
            }
            return redirect()->back()->with('failedRegister', 'Something went wrong. Please try again: ' . $e->getMessage());
        }
    }
    public function viewLogin()
    {
        return;
    }
    public function login(Request $request)
    {
        $validateData = $request->validate([
            'email' => 'required|email:users',
            'password' => 'required|min:8|max:12'
        ]);
        $user = User::where('email', $validateData['email'])->first();
        if ($user) {
            if ($validateData['password'] == $user->password) {
                Auth::login($user);
                if ($user->role_id == 1)
                    return redirect('home');
                else
                    return redirect('dashboard');
            } else {
                return back()->with('failedLogin', 'Password not match!');
            }
        } else {
            return back()->with('failedLogin', 'This email is not register.');
        }
    }
    public function logout()
    {
        Auth::logout();
        Session::flush(); // Clear all session data
        Session::regenerate(); // Regenerate the session ID
        return redirect()->route('home');
    }
}
