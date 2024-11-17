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
    public function storeInfo()
    {
        return view('dashboard.storeInfo');
    }
    public function register(Request $request)
    {
        try {
            // Validate the request data
            $validateData = $request->validate([
                'name' => 'required|regex:/^[a-zA-Z]+(?:\s[a-zA-Z]+)?$/', // Full name: 2 parts, no digits, no special characters
                'email' => 'required|email|unique:users,email', // Email must be unique in the users table
                'password' => [
                    'required',
                    'min:8',
                    'max:12',
                    'regex:/[a-z]/', // At least one lowercase letter
                    'regex:/[A-Z]/', // At least one uppercase letter
                    'regex:/[0-9]/', // At least one digit
                    'regex:/[!@#$%^&*(),.?":{}|<>]/', // At least one special character
                ],
                'role_id' => 'required',
                'phone' => 'required|digits:10', // Phone must be exactly 10 digits
            ]);

            // Validate seller-specific data if the role is seller
            if ($request->input('role_id') == 2) { // As seller
                $sellerData = $request->validate([
                    'address' => 'required', // Address should not be empty
                ]);
            }

            // Handle image upload
            $mainImagePath = null;
            if ($request->hasFile('user_image')) {
                $file = $request->file('user_image');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $mainImagePath = $file->storeAs('public/usersImages', $filename);
            } else {
                $mainImagePath = 'public/usersImages/userDefaultImage.jpeg';
            }

            // Create a new user
            $user = new User();
            $user->name = $validateData['name'];
            $user->email = $validateData['email'];
            $user->password = bcrypt($validateData['password']); // Hash the password
            $user->phone = $validateData['phone'];
            if ($request->input('role_id') == 2) {
                $user->address = $sellerData['address'];
            }
            $user->role_id = $validateData['role_id'];
            $user->user_image = $mainImagePath;
            $user->status = 'pending'; // Set the default status to pending
            $user->save();

            // Create a cart for the user
            Cart::create([
                'user_id' => $user->id
            ]);

            // Create seller profile if the role is seller
            if ($request->input('role_id') == 2) {
                $seller = Seller::create([
                    'user_id' =>  $user->id,
                    'store_name' =>  "my store",
                    'store_description' =>  "my store description",
                    'rating' =>  0,
                ]);
            }
            if ($user->role_id == 1) {

                return redirect()->route('loginRegister')->with('successRegister', "You created an account successfully");
            } elseif ($user->role_id == 2 && $seller->is_setup == 0) {
                $seller->createAccountNotification();

                return redirect()->route('storeInfo')->with('successRegister', "You need to add the store info to complete the process");
            } else {
                return redirect()->route('loginRegisterSeller')->with('successRegister', "You created an account successfully");
            }
            // Redirect with success message
        } catch (QueryException $e) {
            if ($e->errorInfo[1] == 1062) {
                return redirect()->route('loginRegisterSeller')->with('failedRegister', "Email already exists");
            }
            return redirect()->back()->with('failedRegister', 'Something went wrong. Please try again: ' . $e->getMessage());
        }
    }


    public function login(Request $request)
    {
        // Validate the form data
        $validateData = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8|max:12',
        ]);

        // Find the user by email
        $user = User::where('email', $validateData['email'])->first();

        if ($user) {
            // Check if the entered password matches the hashed password in the database
            if (Hash::check($validateData['password'], $user->password)) {
                // Check the user's status
                Auth::login($user);
                $seller = User::with('seller')->where('id', Auth::user()->id)->first();

                if ($user->role_id == 2 && $seller->seller->is_setup == 0)
                    return redirect()->route('storeInfo')->with('successRegister', "You need to add the store info to complete the process");

                if ($user->status == 'pending' && $user->role_id == 2) {
                    return redirect('loginRegisterSeller')->with('failedLogin', 'Your account is currently under review. Please check back later for approval.');
                }

                // Log in the user
                // Auth::login($user);

                // Redirect based on the user role
                if ($user->role_id == 1) {
                    return redirect('home')->with('success', 'Welcome back! You have successfully logged in.');
                } elseif ($user->role_id == 2) {

                    if ($user->status == 'rejected') {
                        return redirect('loginRegisterSeller')->with('failedLogin', 'Your account has been rejected.');
                    }
                    return redirect('sellerDashboard')->with('success', 'Welcome back! You have successfully logged in.');
                } else {
                    return redirect('adminDashboard')->with('success', 'Welcome back! You have successfully logged in.');
                }
            } else {
                // Password does not match
                return back()->with('failedLogin', 'Password does not match!');
            }
        } else {
            // User with the given email does not exist
            return back()->with('failedLogin', 'This email is not registered.');
        }
    }

    public function logout()
    {
        Auth::logout();
        Session::flush(); // Clear all session data
        Session::regenerate(); // Regenerate the session ID
        return redirect()->route('home');
    }
    public function updateProfile(Request $request)
    {
        $userData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
            'password' => 'nullable|string|min:8', // nullable in case password isn't updated
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            'user_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // validate the image
        ]);

        $user = Auth::user();

        $user->name = $userData['name'];
        $user->email = $userData['email'];

        // Only update the password if a new one is provided
        if (!empty($userData['password'])) {
            $user->password = bcrypt($userData['password']); // Hash the new password
        }

        $user->phone = $userData['phone'];
        $user->address = $userData['address'];

        // Handle user image upload
        if ($request->hasFile('user_image')) {
            // Store the new image
            $file = $request->file('user_image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $mainImagePath = $file->storeAs('public/usersImages', $filename);
            $user->user_image = $mainImagePath; // Update the user's image path
        }
        // No else clause needed; if no image is uploaded, the old image remains unchanged

        // Save the user data
        if ($user->save()) {
            return redirect()->back()->with('success', 'Your profile data has been updated.');
        } else {
            return redirect()->back()->with('error', 'Something went wrong while updating the profile.');
        }
    }
    public function updateUserProfile(Request $request)
    {
        $user = Auth::user();
        $userData = $request->validate([
            'name' => 'required|regex:/^[a-zA-Z]+(?:\s[a-zA-Z]+)?$/', // Full name: 2 parts, no digits, no special characters
            'email' => 'required|email',
            'password' => [
                'nullable', // make password optional
                'min:8',
                'max:12',
                'regex:/[a-z]/', // At least one lowercase letter
                'regex:/[A-Z]/', // At least one uppercase letter
                'regex:/[0-9]/', // At least one digit
                'regex:/[!@#$%^&*(),.?":{}|<>]/', // At least one special character
            ],
            'phone' => 'required|digits:10', // Phone must be exactly 10 digits
            'user_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validate the image
        ]);
        if (!empty($userData['password'])) {
            $user->password = bcrypt($userData['password']); // Hash the new password
        }

        // Handle user image upload
        if ($request->hasFile('user_image')) {
            $file = $request->file('user_image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $mainImagePath = $file->storeAs('usersImages', $filename, 'public'); // Store without 'public/' prefix
            Auth::user()->user_image = $mainImagePath; // Update the user's image path
        }

        // Update user profile details

        $user->name = $userData['name'];
        $user->email = $userData['email'];
        $user->phone = $userData['phone'];

        // Update password only if provided
        if (!empty($userData['password'])) {
            $user->password = Hash::make($userData['password']); // Hash the password before saving
        }

        // Save the user
        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
}
