<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function store(Request $request)
    {
        session_start();
        $_SESSION['success'] ="success";


        $usersave = new User();
     
        $usersave->name = $request->input('name');
        $usersave->role = $request->input('role');
        $usersave->email = $request->input('username');
        $usersave->active = '1';
        $usersave->password =  Hash::make($request->input('password'));
       
        $usersave->save();
        
        return redirect()->back()->with('success');  
        exit;
    }

    public function deactivateuser($id)
    {
        $user = User::get();
        $user = json_decode(json_encode($user));
        $user1 = User::where(['id' => $id])->first();
        User::where(['id' => $id])->update(['Active' => '0']);

       
        session_start();
        $_SESSION['success'] ="success";
        return redirect()->back()->with('success');  
        exit;
    }


    
    public function activateuser($id)
    {
        $user = User::get();
        $user = json_decode(json_encode($user));
        $user1 = User::where(['id' => $id])->first();
        User::where(['id' => $id])->update(['Active' => '1']);

       
        session_start();
        $_SESSION['success'] ="success";
        return redirect()->back()->with('success');  
        exit;
    }
}
