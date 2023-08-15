<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use GuzzleHttp\Psr7\Request as Psr7Request;
use Illuminate\Support\Facades\Request as FacadesRequest;
use App\Models\Client;
use Illuminate\Support\Facades\Session;
use App\Models\Barangay;
use App\Models\ClientApplication;
use App\Models\ClientApplicationLog;
use App\Models\ClientApplicationRequirement;
use App\Models\ClientCard;
use App\Models\ClientType;

class AuthController extends Controller
{

function loginView()
{
    return view('login.main', [
        'layout' => 'login'
    ]);
}

function resetPassword()
{
    return view('auth.resetPassword');
}


function forgotPassword()
{
    return view('auth.forgotPasswoampprd');
}


function login(Request $request)
{
    //Validate requests
    $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    $userInfo = User::where('email', '=', $request->input('email'))->first();

    if (!$userInfo) {
        return back()->with('fail', 'We do not recognize your email address');
    } 
    else
    {
        $request->session()->put('LoggedUser', $userInfo->id);
        //check password
        $password=$request->input('password');
   
        if($password = $userInfo->password) {


                if ($userInfo->role == 'ADMIN') {
                    $request->session()->put('LoggedUser', $userInfo->id);
                    $data = ['LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first()];
                   return view('pages/dashboard-overview-1', $data);
                }
        } 
        else {
            return back()->with('fail', 'Incorrect password');
        }
    }
}
    function logout()
    {
        if (session()->has('LoggedUser')) {
            session()->pull('LoggedUser');
            return redirect('login');
        }
    }
 }

