<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\QueryException;
class UserController extends Controller
{
    public function viewReg(){
        return view('regAndLogin/loginRegister');
    }
    public function register( Request $request){
        try{
            $validateData = $request->validate([
                'name'=>'required',
                'email'=>'required|email:users',
                'password'=>'required|min:8|max:12'
            ]);
            $user = new User();
            $user->name = $validateData['name'];
            $user->email = $validateData['email'];
            $user->password = $validateData['password'];
            $user->save();
                return redirect()->route('home')->with('successRegister' , "you created account successfully");




        } catch(QueryException $e){
            if($e->errorInfo[1] == 1062){
                return redirect()->route('loginRegister')->with('failedRegister' , "email already exists");
            }
            return redirect()->back()->with('failedRegister', 'Something went wrong. Please try again.');
        }

    }
    public function viewLogin(){
        return;
    }
    public function login(Request $request){
        $validateData=$request->validate([
            'email'=>'required|email:users',
            'password'=>'required|min:8|max:12'
        ]);
        $user = User::where('email' , $validateData['email'])->first();
        if($user){
            if($validateData['password'] == $user->password){
                return redirect('dashboard');

            }else {
                return back()->with('fail','Password not match!');

            }
        }else {
            return back()->with('fail','This email is not register.');

        }
    }
}
