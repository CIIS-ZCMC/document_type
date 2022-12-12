<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use GuzzleHttp\Psr7\Request as Psr7Request;
use Illuminate\Support\Facades\Request as FacadesRequest;
use App\Models\Client;

use App\Models\Barangay;
use App\Models\ClientApplication;
use App\Models\ClientApplicationLog;
use App\Models\ClientApplicationRequirement;
use App\Models\ClientCard;

class AuthController extends Controller
{
//     /**
//      * Show specified view.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @return \Illuminate\Http\Response
//      */
//     public function loginView()
//     {
//         return view('login.main', [
//             'layout' => 'login'
//         ]);
//     }

//     /**
//      * Authenticate login user.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @return \Illuminate\Http\Response
//      */
//     public function login(LoginRequest $request)
//     {
//         if (!Auth::attempt([
//             'email' => $request->email,
//             'password' => $request->password
//         ])) {
//             throw new \Exception('Wrong email or password.');
//         }
//     }

//     /**
//      * Logout user.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @return \Illuminate\Http\Response
//      */
//     public function logout()
//     {
//         Auth::logout();
//         return redirect('login');
//     }



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
    return view('auth.forgotPasswoampp
    rd');
}
function login(Request $request)
{
    //Validate requests
    $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    $userInfo = User::where('email', '=', $request->email)->first();

    if (!$userInfo) {
        return back()->with('fail', 'We do not recognize your email address');
    } else {
        //check password
        if ($request->password = $userInfo->password) {
            if ($userInfo->active == 1) {
                $request->session()->put('LoggedUser', $userInfo->id);
               
                $citizen = ClientCard::where('card_type', '=', 'Citizen')->get();
                $citizencount = $citizen->count();
                $senior = ClientCard::where('card_type', '=', 'Senior')->get();
                $seniorcount = $senior->count();
                $pwd = ClientCard::where('card_type', '=', 'PWD')->get();
                $pwdcount = $pwd->count();
                $soloparent = ClientCard::where('card_type', '=', 'Solo Parent')->get();
                $soloparentcount = $soloparent->count();
        
                $pendingcitizen = ClientApplication::where('application_type', '=', 'Citizen')->where('application_process', '=', 'Online-Ongoing')->get();
                $pendingcitizencount = $pendingcitizen->count();
                $pendingsenior = ClientApplication::where('application_type', '=', 'Senior')->where('application_process', '=', 'Online-Ongoing')->get();
                $pendingseniorcount = $pendingsenior->count();
                $pendingpwd = ClientApplication::where('application_type', '=', 'PWD')->where('application_process', '=', 'Online-Ongoing')->get();
                $pendingpwdcount = $pendingpwd->count();
                $pendingsoloparent = ClientApplication::where('application_type', '=', 'Solo Parent')->where('application_process', '=', 'Online-Ongoing')->get();
                $pendingsoloparentcount = $pendingsoloparent->count();

                if ($userInfo->role == 'ADMIN') {
                return view('pages/dashboard-overview-1', [
                    // Specify the base layout.
                    // Eg: 'side-menu', 'simple-menu', 'top-menu', 'login'
                    // The default value is 'side-menu'
        
                    // 'layout' => 'side-menu'
                ])->with(compact('citizencount','seniorcount','pwdcount','soloparentcount','pendingcitizencount','pendingseniorcount','pendingpwdcount','pendingsoloparentcount'));
                }

                  if ($userInfo->role == 'SENIOR ADMIN') {
                    return view('pages/dashboard-overview-3', [
                        // Specify the base layout.
                        // Eg: 'side-menu', 'simple-menu', 'top-menu', 'login'
                        // The default value is 'side-menu'
            
                        // 'layout' => 'side-menu'
                    ])->with(compact('citizencount','seniorcount','pwdcount','soloparentcount','pendingcitizencount','pendingseniorcount','pendingpwdcount','pendingsoloparentcount'));
                    }

                    
                  if ($userInfo->role == 'SENIOR EVALUATOR') {
                    return view('pages/senior-evaluator-dashboard', [
                        // Specify the base layout.
                        // Eg: 'side-menu', 'simple-menu', 'top-menu', 'login'
                        // The default value is 'side-menu'
            
                        // 'layout' => 'side-menu'
                    ])->with(compact('citizencount','seniorcount','pwdcount','soloparentcount','pendingcitizencount','pendingseniorcount','pendingpwdcount','pendingsoloparentcount'));
                    }

                          
                  if ($userInfo->role == 'SENIOR APPROVER') {
                    return view('pages/senior-approver-dashboard', [
                        // Specify the base layout.
                        // Eg: 'side-menu', 'simple-menu', 'top-menu', 'login'
                        // The default value is 'side-menu'
            
                        // 'layout' => 'side-menu'
                    ])->with(compact('citizencount','seniorcount','pwdcount','soloparentcount','pendingcitizencount','pendingseniorcount','pendingpwdcount','pendingsoloparentcount'));
                    }

                    if ($userInfo->role == 'SENIOR VERIFIER') {
                        return view('pages/senior-verifier-dashboard', [
                            // Specify the base layout.
                            // Eg: 'side-menu', 'simple-menu', 'top-menu', 'login'
                            // The default value is 'side-menu'
                
                            // 'layout' => 'side-menu'
                        ])->with(compact('citizencount','seniorcount','pwdcount','soloparentcount','pendingcitizencount','pendingseniorcount','pendingpwdcount','pendingsoloparentcount'));
                        }

                    if ($userInfo->role == 'PWD ADMIN') {
                        return view('pages/dashboard-overview-3', [
                            // Specify the base layout.
                            // Eg: 'side-menu', 'simple-menu', 'top-menu', 'login'
                            // The default value is 'side-menu'
                 
                            // 'layout' => 'side-menu'
                        ])->with(compact('citizencount','seniorcount','pwdcount','soloparentcount','pendingcitizencount','pendingseniorcount','pendingpwdcount','pendingsoloparentcount'));
                        }

                        if ($userInfo->role == 'PWD EVALUATOR') {
                            return view('pages/pwd-evaluator-dashboard', [
                                // Specify the base layout.
                                // Eg: 'side-menu', 'simple-menu', 'top-menu', 'login'
                                // The default value is 'side-menu'
                    
                                // 'layout' => 'side-menu'
                            ])->with(compact('citizencount','seniorcount','pwdcount','soloparentcount','pendingcitizencount','pendingseniorcount','pendingpwdcount','pendingsoloparentcount'));
                            }

                            if ($userInfo->role == 'PWD APPROVER') {
                                return view('pages/pwd-approver-dashboard', [
                                    // Specify the base layout.
                                    // Eg: 'side-menu', 'simple-menu', 'top-menu', 'login'
                                    // The default value is 'side-menu'
                        
                                    // 'layout' => 'side-menu'
                                ])->with(compact('citizencount','seniorcount','pwdcount','soloparentcount','pendingcitizencount','pendingseniorcount','pendingpwdcount','pendingsoloparentcount'));
                                }

                                if ($userInfo->role == 'PWD VERIFIER') {
                                    return view('pages/pwd-verifier-dashboard', [
                                        // Specify the base layout.
                                        // Eg: 'side-menu', 'simple-menu', 'top-menu', 'login'
                                        // The default value is 'side-menu'
                            
                                        // 'layout' => 'side-menu'
                                    ])->with(compact('citizencount','seniorcount','pwdcount','soloparentcount','pendingcitizencount','pendingseniorcount','pendingpwdcount','pendingsoloparentcount'));
                                    }

                        if ($userInfo->role == 'SOLO PARENT ADMIN') {
                            return view('pages/dashboard-overview-3', [
                                // Specify the base layout.
                                // Eg: 'side-menu', 'simple-menu', 'top-menu', 'login'
                                // The default value is 'side-menu'
                    
                                // 'layout' => 'side-menu'
                            ])->with(compact('citizencount','seniorcount','pwdcount','soloparentcount','pendingcitizencount','pendingseniorcount','pendingpwdcount','pendingsoloparentcount'));
                            }

                            if ($userInfo->role == 'SOLO PARENT EVALUATOR') {
                                return view('pages/pwd-verifier-dashboard', [
                                    // Specify the base layout.
                                    // Eg: 'side-menu', 'simple-menu', 'top-menu', 'login'
                                    // The default value is 'side-menu'
                        
                                    // 'layout' => 'side-menu'
                                ])->with(compact('citizencount','seniorcount','pwdcount','soloparentcount','pendingcitizencount','pendingseniorcount','pendingpwdcount','pendingsoloparentcount'));
                                }

                                if ($userInfo->role == 'SOLO PARENT APPROVER') {
                                    return view('pages/pwd-approver-dashboard', [
                                        // Specify the base layout.
                                        // Eg: 'side-menu', 'simple-menu', 'top-menu', 'login'
                                        // The default value is 'side-menu'
                            
                                        // 'layout' => 'side-menu'
                                    ])->with(compact('citizencount','seniorcount','pwdcount','soloparentcount','pendingcitizencount','pendingseniorcount','pendingpwdcount','pendingsoloparentcount'));
                                    }

                                    if ($userInfo->role == 'SOLO PARENT VERIFIER') {
                                        return view('pages/pwd-verifier-dashboard', [
                                            // Specify the base layout.
                                            // Eg: 'side-menu', 'simple-menu', 'top-menu', 'login'
                                            // The default value is 'side-menu'
                                
                                            // 'layout' => 'side-menu'
                                        ])->with(compact('citizencount','seniorcount','pwdcount','soloparentcount','pendingcitizencount','pendingseniorcount','pendingpwdcount','pendingsoloparentcount'));
                                        }
            
        


            } else {
                return back()->with('fail', 'Your account was deactivated ');
            }
        } else {
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

