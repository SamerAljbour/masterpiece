<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
class AdminController extends Controller
{
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

    public function createUser(){
        $roles = Role::all();

        return view('dashboard/user/createUser', compact('roles'));
    }

    public function storeNewUser(Request $request){
        $validateData = $request->validate([
            'name'=> 'required',
            'email'=> 'required',
            'password'=> 'required',
            'role_id' => 'required'
        ]);
        $user = new User();
        $user->name= $validateData['name'];
        $user->email= $validateData['email'];
        $user->password= $validateData['password'];
        $user->role_id= $validateData['role_id'];
        if( $user->save()){

            return redirect()->route('allUsers')->with('successCreating' , 'User Created Successfully');
        }else{
            return redirect()->route('allUsers')->with('ErrorCreating' , 'Somthing went wronge while creating user');
        }

    }

    public function viewOneUser(Request $request , string $id){
        $user = User::find('$id');
        return view('adminDashboard/user/userIndex' , compact('user'));
    }
    public function editUser(string $id){
        $roles = Role::all();
        $user = User::find($id);

        return view('adminDashboard/user/updateUser', compact('roles' , 'user'));
    }

    public function updateUser(Request $request , string $id){
        $validateData = $request->validate([
            'name'=> 'required',
            'email'=> 'required',
            'password'=> 'required',
            'role_id' => 'required'
        ]);
        $user = User::find($id);
        if($user){
            $user->name= $validateData['name'];
            $user->email= $validateData['email'];
            $user->password= $validateData['password'];
            $user->role_id= $validateData['role_id'];
            if( $user->save()){

                return redirect()->route('allUsers')->with('successUpdating' , 'User Updated Successfully');
            }else{
                return redirect()->route('allUsers')->with('ErrorUpdating' , 'Somthing went wronge while creating user');
            }
        }else{
            return redirect()->route('allUsers')->with('ErrorUpdating' , 'User Not Found');
        }

    }
    public function deleteUser(string $id){
        $user = User::find($id);
        if($user){
            $user->delete();
            return redirect()->route('allUsers')->with('successDeleting' , 'User Not Found');
        }else{
            return redirect()->route('allUsers')->with('ErrorDeleting' , 'User Not Found');

        }
    }
        // <=================================== End of User CRUD ===========================================>

}
