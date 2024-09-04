<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
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
    public function register(Request $request)
    {
        try {
            $validateData = $request->validate([
                'name' => 'required',
                'email' => 'required|email:users',
                'password' => 'required|min:8|max:12',
                'role_id' => 'required'
            ]);
            // dd($validateData);
            $user = new User();
            $user->name = $validateData['name'];
            $user->email = $validateData['email'];
            $user->password = $validateData['password'];
            $user->role_id = $validateData['role_id'];
            $user->save();
            $cart = Order::create([
                'user_id' => $user->id
            ]);

            return redirect()->route('loginRegister')->with('successRegister', "you created account successfully");
        } catch (QueryException $e) {
            if ($e->errorInfo[1] == 1062) {
                return redirect()->route('loginRegister')->with('failedRegister', "email already exists");
            }
            return redirect()->back()->with('failedRegister', 'Something went wrong. Please try again.');
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
