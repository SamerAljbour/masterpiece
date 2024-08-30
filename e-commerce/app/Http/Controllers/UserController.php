<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function viewReg(){
        return;
    }
    public function register( Request $request){
        $validateData = $request->validate([
            'name'=>'required',
            'email'=>'required|email:users',
            'password'=>'required|min:8|max:12'
        ]);
        $user = new User();
        $user->name = $validateData['name'];
        $user->email = $validateData['email'];
        $user->password = $validateData['password'];
        if($user->save()){
            return redirect()->with('success login' , "you created account successfully");
        }else{
            return redirect()->with('failed login' , "somthing went wronge while register");

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
