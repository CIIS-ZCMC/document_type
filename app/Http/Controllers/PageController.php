<?php

namespace App\Mail;
namespace App\Http\Controllers;
use App\Mail\ScheduleMail;
use App\Models\Client;
use Illuminate\Support\Facades\Session;
use App\Models\Barangay;
use App\Models\ClientApplication;
use App\Models\ClientApplicationLog;
use App\Models\ClientApplicationRequirement;
use App\Models\ClientCard;
use App\Models\ClientSchedule;
use App\Models\ClientType;
use App\Models\ClientBenefit;
use App\Models\BenefitRequirement;
use App\Models\Benefit;
use App\Models\Requirement;
use App\Models\CommunityInvolvement;
use App\Models\DeclinedClient;
use App\Models\DeclinedClientLog;
use App\Models\DisabilityCause;
use App\Models\DisabilityType;
use App\Models\Education;
use App\Models\FamilyComposition;
use App\Models\IdentificationCard;
use App\Models\Occupation;
use App\Models\Organization;
use App\Models\User;
use App\Models\Physician;
use App\Models\SeminarTraining;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Mail;


class PageController extends Controller
{
    
    public function dashboardOverview1()
    {
        $data = ['LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first()];
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
        return view('pages/dashboard-overview-1',$data, [
        
        ])->with(compact('citizencount','seniorcount','pwdcount','soloparentcount','pendingcitizencount','pendingseniorcount','pendingpwdcount','pendingsoloparentcount'));
    }

    // top-bar-menu
    public function profile() {
        $data = ['LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first()];
             return view('layout/top-bar-menu/profile',$data,[]);
    }


    public function main()
    {
        $data = ['LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first()];
        $clienttype = ClientType::get();
        return view('main/landing',$data)->with(compact('clienttype'));
    }
    public function registration()
    {
        $data = ['LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first()];
        $barangaylist = Barangay::select('id', 'name')->get();
        return view('main/citizenregistration',$data, [
        
        ])->with(compact('barangaylist'));
    }

  
    public function seniorregistration()
    {
        $data = ['LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first()];
        $barangaylist = Barangay::select('id', 'name')->get();
        return view('main/seniorregistration', $data, [
        
            ])->with(compact('barangaylist'));
    }

  

    public function pwdregistration()
    {
        $data = ['LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first()];
        $barangaylist = Barangay::select('id', 'name')->get();
        return view('main/pwdregistration',$data, [
        
            ])->with(compact('barangaylist'));
    }
    public function soloparentregistration()
    {
        $barangaylist = Barangay::select('id', 'name')->get();
        return view('main/soloparentregistration', [
        
            ])->with(compact('barangaylist'));
    }

    public function registeredsenior()
    {
        $barangaylist = Barangay::select('id', 'name')->get();
        return view('main/searchregistered/searchregisteredsenior', [
        
            ])->with(compact('barangaylist'));
    }
    public function registeredpwd()
    {
        $barangaylist = Barangay::select('id', 'name')->get();
        return view('main/searchregistered/searchregisteredpwd', [
        
            ])->with(compact('barangaylist'));
    }
    public function registeredsoloparent()
    {
        $barangaylist = Barangay::select('id', 'name')->get();
        return view('main/searchregistered/searchregisteredsoloparent', [
        
            ])->with(compact('barangaylist'));
    }

    public function registeredseniorpage()
    {
        $barangaylist = Barangay::select('id', 'name')->get();
        return view('main/registeredclientpage/registeredseniorpage', [
        
            ])->with(compact('barangaylist'));
    }
    public function registeredpwdpage()
    {
        $barangaylist = Barangay::select('id', 'name')->get();
        return view('main/registeredclientpage/registeredpwdpage', [
        
            ])->with(compact('barangaylist'));
    }
    public function registeredsoloparentpage()
    {
        $barangaylist = Barangay::select('id', 'name')->get();
        return view('main/registeredclientpage/registeredsoloparentpage', [
        
            ])->with(compact('barangaylist'));
    }

    public function trackcardform()
    {
        $barangaylist = Barangay::select('id', 'name')->get();
        return view('main/track/trackcardform', [
        
            ])->with(compact('barangaylist'));
    }
    public function trackbenefitform()
    {
        $barangaylist = Barangay::select('id', 'name')->get();
        return view('main/track/trackbenefitform', [
        
            ])->with(compact('barangaylist'));
    }


    public function registeredseniorcreate(Request $request)
    {
        $latestreferencenumber = ClientApplication::where('id','DESC')->first();
        $applicationsave = new ClientApplication();
        $clientid =  $request->input('clientid');
        
        $applicationsave->application_date= now()->toDateString('Y-m-d');;
        $applicationsave->application_type = 'Senior';
        $applicationsave->application_Status = 'Applied';
                if($latestreferencenumber===null)
                {
                    $applicationsave->application_reference_number = '#'.str_pad( 1, 8, "0", STR_PAD_LEFT);;
                }
                else
                {
                    $applicationsave->application_reference_number = '#'.str_pad($latestreferencenumber->application_reference_number  + 1, 8, "0", STR_PAD_LEFT);
                }
    
        $applicationsave->application_process = 'Online';
        $applicationsave->client_id =$clientid;
        $applicationsave->save();

        session_start();
        $_SESSION['success'] ="success";
       
     
        return redirect()->back()->with('success');  
        exit;
      
      
    }


    public function registersenior(Request $request)
    {
        $latestreferencenumber = ClientApplication::where('id','DESC')->first();
        $applicationsave = new ClientApplication();
        $clientid =  $request->input('clientid');
        
        $applicationsave->application_date= now()->toDateString('Y-m-d');;
        $applicationsave->application_type = 'Senior';
        $applicationsave->application_Status = 'Applied';
        if($latestreferencenumber===null)
        {
            $applicationsave->application_reference_number = '#'.str_pad( 1, 8, "0", STR_PAD_LEFT);;
        }
        else
        {
            $applicationsave->application_reference_number = '#'.str_pad($latestreferencenumber->application_reference_number  + 1, 8, "0", STR_PAD_LEFT);
        }

            $applicationsave->application_process = 'Online';
            $applicationsave->client_id =$clientid;
            $applicationsave->save();

            if ($request->hasFile('imagebirth')) {
                $image_tmp = $request->file('imagebirth');
                if ($image_tmp->isValid()) {
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = $request['lastname']  .  $clientid  . 'senior.' . $extension;
                    $large_image_path = 'images/birth/' . $filename;
                    Image::make($image_tmp)->save($large_image_path);

                    // Store image name in products table
                    $requirementsave = new ClientApplicationRequirement();
        
                    $requirementsave->name = 'Birth Certificate';
                    $requirementsave->filename = $filename;
                    $requirementsave->client_application_id =$applicationsave->id;
                    $requirementsave->save();
                    
                }
            }

            if ($request->hasFile('imagebarangay')) {
                $image_tmp = $request->file('imagebarangay');
                if ($image_tmp->isValid()) {
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = $request['lastname']  .  $clientid  . 'senior.' . $extension;
                    $large_image_path = 'images/barangay/' . $filename;
                    Image::make($image_tmp)->save($large_image_path);

                    // Store image name in products table
                    $requirementsave = new ClientApplicationRequirement();
        
                    $requirementsave->name = 'Barangay Certificate';
                    $requirementsave->filename = $filename;
                    $requirementsave->client_application_id =$applicationsave->id;
                    $requirementsave->save();
                    
                }
            }

            if ($request->hasFile('imagepicture')) {
                $image_tmp = $request->file('imagepicture');
                if ($image_tmp->isValid()) {
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = $request['lastname']  .  $clientid  . 'senior.' . $extension;
                    $large_image_path = 'images/picture/' . $filename;
                    Image::make($image_tmp)->save($large_image_path);

                    // Store image name in products table
                    $requirementsave = new ClientApplicationRequirement();
        
                    $requirementsave->name = 'Picture';
                    $requirementsave->filename = $filename;
                    $requirementsave->client_application_id =$applicationsave->id;
                    $requirementsave->save();
                    
                }
            }


            session_start();
            $_SESSION['success'] ="success";

        
            // return view('main/landing', [
            //     // Specify the base layout.
            //     // Eg: 'side-menu', 'simple-menu', 'top-menu', 'login'
            //     // The default value is 'side-menu'
    
            //     // 'layout' => 'side-menu'
            //     ])->with('success');

         
    }

    public function searchregisteredsenior(Request $request)
    {
            $barangaylist = Barangay::select('id', 'name')->get();
        


            $client= Client::where('first_name','=',$request->input('firstname'))->where('last_name','=',$request->input('lastname'))->where('middle_name','=',$request->input('middlename'))->whereHas("client_cards", function($subQuery) use ($request)  {
                $subQuery->where("client_cards.card_type", "=", 'Citizen')->where("client_cards.card_number", "=" ,$request->input('number')); 
            })->with(["client_cards" => function($subQuery) use ($request){
                $subQuery->where("client_cards.card_type", "=", 'Citizen')->where("client_cards.card_number", "=" ,$request->input('number')); 
            }])->first();

        if($client == null)
            {

            
        
                session_start();
                $_SESSION['fail'] ="fail";

                return redirect()->back()->with('fail');  
                exit;
            
            }

            else{

                $clientapplication=ClientApplication::where('client_id',$client->id)->where('application_type','=','Senior')->first();

                if($clientapplication == null)
                {
                 
            
                return view('main/registeredclientpage/registeredsenior', [
                    // Specify the base layout.
                    // Eg: 'side-menu', 'simple-menu', 'top-menu', 'login'
                    // The default value is 'side-menu'
        
                    // 'layout' => 'side-menu'
                    ])->with(compact('client','barangaylist'));
                }
                else
                {
    
                    session_start();
                    $_SESSION['Error'] ="Error";
                   
                 
                    
                    return redirect()->back()->with('Error');  
                    exit;
    
                }
    

          
            
            }
        
    }
    public function searchregisteredpwd(Request $request)
    {
            $barangaylist = Barangay::select('id', 'name')->get();
         
            $client= Client::where('first_name','=',$request->input('firstname'))->where('last_name','=',$request->input('lastname'))->where('middle_name','=',$request->input('middlename'))->whereHas("client_cards", function($subQuery) use ($request)  {
                $subQuery->where("client_cards.card_type", "=", 'Citizen')->where("client_cards.card_number", "=" ,$request->input('number')); 
            })->with(["client_cards" => function($subQuery) use ($request){
                $subQuery->where("client_cards.card_type", "=", 'Citizen')->where("client_cards.card_number", "=" ,$request->input('number')); 
            }])->first();

    
    
            
    
    
    
    
        if($client == null)
            {
    
            
        
                session_start();
                $_SESSION['fail'] ="fail";
    
                return redirect()->back()->with('fail');  
                exit;
                
            }
    
      
              
            
            else
            {
    
                $clientapplication=ClientApplication::where('client_id',$client->id)->where('application_type','=','PWD')->first();

                if($clientapplication == null)
                {
                 
            
                    return view('main/registeredclientpage/registeredpwdpage', [
                        // Specify the base layout.
                        // Eg: 'side-menu', 'simple-menu', 'top-menu', 'login'
                        // The default value is 'side-menu'
            
                        // 'layout' => 'side-menu'
                        ])->with(compact('client','barangaylist'));
                }
                else
                {
    
                    session_start();
                    $_SESSION['Error'] ="Error";
                   
                 
                    
                    return redirect()->back()->with('Error');  
                    exit;
    
                }
    
              
    
            }
        
    }
    public function searchregisteredsoloparent(Request $request)
    {
            $barangaylist = Barangay::select('id', 'name')->get();
            $client= Client::where('first_name','=',$request->input('firstname'))->where('last_name','=',$request->input('lastname'))->where('middle_name','=',$request->input('middlename'))->whereHas("client_cards", function($subQuery) use ($request)  {
                $subQuery->where("client_cards.card_type", "=", 'Citizen')->where("client_cards.card_number", "=" ,$request->input('number')); 
            })->with(["client_cards" => function($subQuery) use ($request){
                $subQuery->where("client_cards.card_type", "=", 'Citizen')->where("client_cards.card_number", "=" ,$request->input('number')); 
            }])->first();

    
            
    
    
    
    
        if($client == null)
            {
    
            
        
                session_start();
                $_SESSION['fail'] ="fail";
    
                return redirect()->back()->with('fail');  
                exit;
                
            }
    
            else{
    
            
                $clientapplication=ClientApplication::where('client_id',$client->id)->where('application_type','=','Solo Parent')->first();

                if($clientapplication == null)
                {
                 
            
                    return view('main/registeredclientpage/registeredsoloparent', [
                        // Specify the base layout.
                        // Eg: 'side-menu', 'simple-menu', 'top-menu', 'login'
                        // The default value is 'side-menu'
            
                        // 'layout' => 'side-menu'
                        ])->with(compact('client','barangaylist'));
                }
                else
                {
    
                    session_start();
                    $_SESSION['Error'] ="Error";
                   
                 
                    
                    return redirect()->back()->with('Error');  
                    exit;
    
    
                }
    
             
    
          
        }
    }




    public function ongoingsenior()
    {
        $barangaylist = Barangay::select('id', 'name')->get();
        return view('main/searchongoing/searchongoingsenior', [
        
            ])->with(compact('barangaylist'));
    }
    public function ongoingpwd()
    {
        $barangaylist = Barangay::select('id', 'name')->get();
        return view('main/searchongoing/searchongoingpwd', [
        
            ])->with(compact('barangaylist'));
    }
    public function ongoingsoloparent()
    {
        $barangaylist = Barangay::select('id', 'name')->get();
        return view('main/searchongoing/searchongoingsoloparent', [
        
            ])->with(compact('barangaylist'));
    }


    public function searchongoingsenior(Request $request)
    {
        $barangaylist = Barangay::select('id', 'name')->get();
        
            $client= Client::where('first_name','=',$request->input('firstname'))->where('last_name','=',$request->input('lastname'))->where('middle_name','=',$request->input('middlename'))->whereHas("client_applications", function($subQuery) use ($request)  {
                    $subQuery->where("client_applications.application_type", "=", 'Citizen')->where("client_applications.application_process", "=", 'Online-Ongoing')->where("client_applications.application_reference_number", "=" ,$request->input('number')); 
                })->with(["client_applications" => function($subQuery) use ($request){
                    $subQuery->where("client_applications.application_type", "=", 'Citizen')->where("client_applications.application_process", "=", 'Online-Ongoing')->where("client_applications.application_reference_number", "=" ,$request->input('number')); 
                }])->first();


            if($client == null)
            {
            

            
                

                        session_start();
                        $_SESSION['fail'] ="fail";

                        return redirect()->back()->with('fail');  
                        exit;
            }

                    
                    

            else{
            

             

                $clientid=$client->id;

                $clientsenior= Client::where('first_name','=',$request->input('firstname'))->where('last_name','=',$request->input('lastname'))->where('middle_name','=',$request->input('middlename'))->whereHas("client_applications", function($subQuery) use ($clientid)  {
                    $subQuery->where("client_applications.application_type", "=", 'Senior')->where("client_id", $clientid); 
                })->with(["client_applications" => function($subQuery) use ($clientid){
                    $subQuery->where("client_applications.application_type", "=", 'Senior') ->where("client_id", "=" ,$clientid); 
                }])->first();
        

                if($clientsenior == null)
                {
                    return view('main/ongoingclient/ongoingseniorpage', [
                        // Specify the base layout.
                        // Eg: 'side-menu', 'simple-menu', 'top-menu', 'login'
                        // The default value is 'side-menu'
            
                        // 'layout' => 'side-menu'
                        ])->with(compact('client','barangaylist'));
               
    
                }
                else
                {
                    session_start();
                    $_SESSION['Error'] ="Error";
    
                    return redirect()->back()->with('Error');  
                    exit;

          
    
                }
             
            }
         
      }
    
     

     


    

        
        
    

    public function searchongoingpwd(Request $request)
    {
        $barangaylist = Barangay::select('id', 'name')->get();
        
        $client= Client::where('first_name','=',$request->input('firstname'))->where('last_name','=',$request->input('lastname'))->where('middle_name','=',$request->input('middlename'))->whereHas("client_applications", function($subQuery) use ($request)  {
                $subQuery->where("client_applications.application_type", "=", 'Citizen')->where("client_applications.application_process", "=", 'Online-Ongoing')->where("client_applications.application_reference_number", "=" ,$request->input('number')); 
            })->with(["client_applications" => function($subQuery) use ($request){
                $subQuery->where("client_applications.application_type", "=", 'Citizen')->where("client_applications.application_process", "=", 'Online-Ongoing')->where("client_applications.application_reference_number", "=" ,$request->input('number')); 
            }])->first();


        if($client == null)
        {
        

            $clientregistered= Client::where('first_name','=',$request->input('firstname'))->where('last_name','=',$request->input('lastname'))->where('middle_name','=',$request->input('middlename'))->whereHas("client_applications", function($subQuery) use ($request)  {
                $subQuery->where("client_applications.application_type", "=", 'Citizen')->where("client_applications.application_process", "=", 'Online-Registered')->where("client_applications.application_reference_number", "=" ,$request->input('number')); 
            })->with(["client_applications" => function($subQuery) use ($request){
                $subQuery->where("client_applications.application_type", "=", 'Citizen')->where("client_applications.application_process", "=", 'Online-Registered')->where("client_applications.application_reference_number", "=" ,$request->input('number')); 
            }])->first();
            


            if($clientregistered==null)
            {
                session_start();
                $_SESSION['fail'] ="fail";

                return redirect()->back()->with('fail');  
                exit;

            }
            else
            {
               
        
                session_start();
                $_SESSION['error'] ="error";

                return redirect()->back()->with('error');  
                exit;

            }
                   
        }

                
                

        else{
        

         

            $clientid=$client->id;

            $clientsenior= Client::where('first_name','=',$request->input('firstname'))->where('last_name','=',$request->input('lastname'))->where('middle_name','=',$request->input('middlename'))->whereHas("client_applications", function($subQuery) use ($clientid)  {
                $subQuery->where("client_applications.application_type", "=", 'PWD')->where("client_id", $clientid); 
            })->with(["client_applications" => function($subQuery) use ($clientid){
                $subQuery->where("client_applications.application_type", "=", 'PWD') ->where("client_id", "=" ,$clientid); 
            }])->first();
    

            if($clientsenior == null)
            {
                return view('main/ongoingclient/ongoingpwd', [
                    
                    ])->with(compact('client','barangaylist'));
           

            }
            else
            {
                session_start();
                $_SESSION['Error'] ="Error";

                return redirect()->back()->with('Error');  
                exit;

      

            }
         
        }
     
     
    }

    public function searchongoingsoloparent(Request $request)
    {
        $barangaylist = Barangay::select('id', 'name')->get();
        
        $client= Client::where('first_name','=',$request->input('firstname'))->where('last_name','=',$request->input('lastname'))->where('middle_name','=',$request->input('middlename'))->whereHas("client_applications", function($subQuery) use ($request)  {
                $subQuery->where("client_applications.application_type", "=", 'Citizen')->where("client_applications.application_process", "=", 'Online-Ongoing')->where("client_applications.application_reference_number", "=" ,$request->input('number')); 
            })->with(["client_applications" => function($subQuery) use ($request){
                $subQuery->where("client_applications.application_type", "=", 'Citizen')->where("client_applications.application_process", "=", 'Online-Ongoing')->where("client_applications.application_reference_number", "=" ,$request->input('number')); 
            }])->first();


        if($client == null)
        {
        

            $clientregistered= Client::where('first_name','=',$request->input('firstname'))->where('last_name','=',$request->input('lastname'))->where('middle_name','=',$request->input('middlename'))->whereHas("client_applications", function($subQuery) use ($request)  {
                $subQuery->where("client_applications.application_type", "=", 'Citizen')->where("client_applications.application_process", "=", 'Online-Registered')->where("client_applications.application_reference_number", "=" ,$request->input('number')); 
            })->with(["client_applications" => function($subQuery) use ($request){
                $subQuery->where("client_applications.application_type", "=", 'Citizen')->where("client_applications.application_process", "=", 'Online-Registered')->where("client_applications.application_reference_number", "=" ,$request->input('number')); 
            }])->first();
            


            if($clientregistered==null)
            {
                session_start();
                $_SESSION['fail'] ="fail";

                return redirect()->back()->with('fail');  
                exit;

            }
            else
            {
               
        
                session_start();
                $_SESSION['error'] ="error";

                return redirect()->back()->with('error');  
                exit;

            }
                   
        }

                
                

        else{
        

         

            $clientid=$client->id;

            $clientsenior= Client::where('first_name','=',$request->input('firstname'))->where('last_name','=',$request->input('lastname'))->where('middle_name','=',$request->input('middlename'))->whereHas("client_applications", function($subQuery) use ($clientid)  {
                $subQuery->where("client_applications.application_type", "=", 'Solo Parent')->where("client_id", $clientid); 
            })->with(["client_applications" => function($subQuery) use ($clientid){
                $subQuery->where("client_applications.application_type", "=", 'Solo Parent') ->where("client_id", "=" ,$clientid); 
            }])->first();
    

            if($clientsenior == null)
            {
                return view('main/ongoingclient/ongoingsoloparent', [
                    
                    ])->with(compact('client','barangaylist'));
           

            }
            else
            {
                session_start();
                $_SESSION['Error'] ="Error";

                return redirect()->back()->with('Error');  
                exit;

      

            }
         
        }
     
    }
    
    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function account()
    {

        $data = ['LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first()];
        $user = DB::table('users')
        ->select()
        ->get();
        return view('pages/user',$data)->with(compact('user'));
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function dashboardOverview3()
    {
        $data = ['LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first()];
        return view('pages/dashboard-overview-3',$data);
    }


    public function userdashboard()
    {
        $data = ['LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first()];
        return view('main/user/dashboard',$data);
    }

    public function userbenefits()
    {
        $userid = Session::get('userid');
        $data = ['LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first()];
        $client=  Client::with("occupations","barangays","client_cards")->where('id','=', $userid)->get();
        foreach($client as $client)
        {
            foreach($client->client_cards as $clientcard)
            {
                $clienttype[]=$clientcard->client_type;
            }
       
            
        }
       

       $clientbenefit= ClientType::with('benefits')->find($clienttype);
                     
       foreach($clientbenefit as $benefit)
        {
            foreach($benefit->benefits as $userbenefit)
            {
               
                $userbenefit1[] =  $userbenefit;
            }
            
        }
      
       

        return view('main/user/benefits',$data)->with(compact('clientbenefit','userbenefit1','userid'));
    }

    public function applybenefit($id=null,$userid=null,$clienttype=null)
    {
        $data = ['LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first()];
   
     
       $clientbenefit= Benefit::with('requirements')->find($id);
      
       foreach($clientbenefit->requirements as $benefit)
        {
            
               
                $userbenefit1[] =  $benefit;
            
            
        }
   
       
 
        return view('main/user/requirements',$data)->with(compact('clienttype','clientbenefit','userbenefit1','userid','id'));;
    }

    
    public function assistance()
    {
        $userid = Session::get('userid');
        $data = ['LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first()];
        $client=  Client::with("occupations","barangays","client_cards")->where('id','=', $userid)->get();
        foreach($client as $client)
        {
            foreach($client->client_cards as $clientcard)
            {
                $clienttype[]=$clientcard->client_type;
            }
       
            
        }
       

       $clientbenefit= ClientType::with('benefits')->find($clienttype);
                     
       foreach($clientbenefit as $benefit)
        {
            foreach($benefit->benefits as $userbenefit)
            {
               
                $userbenefit1[] =  $userbenefit;
            }
            
        }
      
       
 
        return view('main/user/assistance',$data)->with(compact('clientbenefit','userbenefit1','userid'));;
    }

    public function userapplications()
    {
        $data = ['LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first()];
        return view('main/user/applications',$data);
    }
    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function dashboardOverview4()
    {
        $data = ['LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first()];
        return view('pages/dashboard-overview-4',$data);
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function inbox()
    {
        $data = ['LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first()];
        return view('pages/inbox',$data);
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function fileManager()
    {
        return view('pages/file-manager');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function pointOfSale()
    {
        return view('pages/point-of-sale');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function chat()
    {
        return view('pages/chat');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function post()
    {
        return view('pages/post');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function calendar()
    {
        return view('pages/calendar');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function crudDataList()
    {
        return view('pages/crud-data-list');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function crudForm()
    {
        return view('pages/crud-form');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function users()
    {
        $fo = DB::table('users')
        ->select()
        ->get();
        return view('pages/user')->with(compact('user'));
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function usersLayout2()
    {
        return view('pages/users-layout-2');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function usersLayout3()
    {
        return view('pages/users-layout-3');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function profileOverview1()
    { 
        $data = ['LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first()];
        return view('pages/profile-overview-1',$data);
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function profileOverview2()
    {
        return view('pages/profile-overview-2');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function profileOverview3()
    {
        return view('pages/profile-overview-3');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function wizardLayout1()
    {
        return view('pages/wizard-layout-1');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function wizardLayout2()
    {
        return view('pages/wizard-layout-2');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function wizardLayout3()
    {
        return view('pages/wizard-layout-3');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function blogLayout1()
    {
        return view('pages/blog-layout-1');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function blogLayout2()
    {
        return view('pages/blog-layout-2');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function blogLayout3()
    {
        return view('pages/blog-layout-3');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function pricingLayout1()
    {
        return view('pages/pricing-layout-1');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function pricingLayout2()
    {
        return view('pages/pricing-layout-2');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function invoiceLayout1()
    {
        return view('pages/invoice-layout-1');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function invoiceLayout2()
    {
        return view('pages/invoice-layout-2');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function faqLayout1()
    {
        return view('pages/faq-layout-1');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function faqLayout2()
    {
        return view('pages/faq-layout-2');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function faqLayout3()
    {
        return view('pages/faq-layout-3');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('pages/login');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register()
    {
        return view('pages/register');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function errorPage()
    {
        return view('pages/error-page');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateProfile()
    {
        return view('pages/update-profile');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function changePassword()
    {
        return view('pages/change-password');
    }


    public function fieldoffice()
    {
        $data = ['LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first()];
        $fo = DB::table('field_offices')
        ->select()
        ->get();
        return view('pages/fieldoffice',$data)->with(compact('fo'));
    }

    public function benefit()
    {
        $data = ['LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first()];
        $fo = DB::table('benefits')
        ->select()
        ->get();

        $requirements = DB::table('requirements')
        ->select()
        ->get();
        return view('pages/benefits',$data)->with(compact('fo','requirements'));
    }
    public function requirement()
    {
        $data = ['LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first()];
        $fo = DB::table('requirements')
        ->select()
        ->get();
        return view('pages/requirements',$data)->with(compact('fo'));
    }
    public function clientbenefit()
    {
        $data = ['LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first()];
        $fo = DB::table('client_types')
        ->select()
        ->get();

        $benefits = DB::table('benefits')
        ->select()
        ->get();
        return view('pages/clientbenefits',$data)->with(compact('fo','benefits'));
    }
    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function seniorevaluation()
    {
  
        $data = ['LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first()];
        $clients=  Client::with("occupations","barangays")->whereHas("client_applications", function($subQuery) {
            $subQuery->where("client_applications.application_type", "=", 'Senior')->where("client_applications.application_status", "=", 'Applied'); 
        })->with(["client_applications" => function($subQuery){
            $subQuery->where("client_applications.application_type", "=", 'Senior')->where("client_applications.application_status", "=", 'Applied');
        }])->get();
            
      
       
      
      
      
        return view('pages/seniorevaluation',$data)->with(compact('clients'));

        
     }

     public function seniorapproval()
     {
        $data = ['LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first()];
 
        $clients=  Client::with("occupations","barangays")->whereHas("client_applications", function($subQuery) {
            $subQuery->where("client_applications.application_type", "=", 'Senior')->where("client_applications.application_status", "=", 'EVALUATED-APPROVED'); 
        })->with(["client_applications" => function($subQuery){
            $subQuery->where("client_applications.application_type", "=", 'Senior')->where("client_applications.application_status", "=", 'EVALUATED-APPROVED');
        }])->get();
    
         return view('pages/seniorapproval',$data)->with(compact('clients'));
 
         
      }

      public function verifysenior()
      {
  
        $data = ['LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first()];
        $clients=  Client::with("occupations","barangays")->whereHas("client_applications", function($subQuery) {
            $subQuery->where("client_applications.application_type", "=", 'Senior')->where("client_applications.application_status", "=", 'APPROVAL-APPROVED'); 
        })->with(["client_applications" => function($subQuery){
            $subQuery->where("client_applications.application_type", "=", 'Senior')->where("client_applications.application_status", "=", 'APPROVAL-APPROVED');
        }])->get();
        
     
          return view('pages/verifysenior',$data)->with(compact('clients'));
  
          
       }

       public function cardsenior()
    {

       
        $data = ['LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first()];

        $clients= Client::with("occupations","barangays")->whereHas("client_cards", function($subQuery) {
            $subQuery->where("client_cards.card_status", "=", 'Active')->where("client_cards.card_type", "=", 'Senior'); 
        })->with(["client_cards" => function($subQuery){
            $subQuery->where("client_cards.card_status", "=", 'Active')->where("client_cards.card_type", "=", 'Senior');
        }])->get();

        
    
        return view('pages/card/cardsenior',$data)->with(compact('clients'));

        
     }


       public function citizenbenefitevaluation()
    {

        $data = ['LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first()];

        $clients=Client::with("occupations","barangays","client_cards.benefit_applications")->whereHas('benefit_applications', function($q) {
            $q->where('application_status', '=','Applied')
            ->where('application_type', '=', 'Citizen');})
       
        ->get();
      
   
        return view('pages/citizenbenefitevaluation',$data)->with(compact('clients'));

        
     }

     public function citizenbenefitapproval()
     {
        $data = ['LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first()];
         $clients=Client::with("occupations","barangays","client_cards.benefit_applications")->whereHas('benefit_applications', function($q){
             $q->where('application_status', '=','EVALUATED-APPROVED')
             ->where('application_type', '=', 'Citizen');})
        
         ->get();
       
    
         return view('pages/citizenbenefitapproval',$data)->with(compact('clients'));
 
         
      }

      public function citizenbenefitverification()
      {
  
        $data = ['LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first()];
          $clients=Client::with("occupations","barangays","benefit_applications.benefit_schedules")->whereHas('benefit_applications', function($q) {
              $q->where('application_status', '=','APPROVAL-APPROVED')
              ->where('application_type', '=','Citizen');})
         
          ->get();
        
     
          return view('pages/citizenbenefitverification',$data)->with(compact('clients'));
  
          
       }

       public function seniorbenefitevaluation()
       {

        
        $data = ['LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first()];
      
        $clients=  Client::with("occupations","barangays")->whereHas("benefit_applications", function($subQuery) {
            $subQuery->where("benefit_applications.application_type", "=", 'Senior')->where("benefit_applications.application_status", "=", 'Applied'); 
        })->with(["benefit_applications" => function($subQuery){
            $subQuery->where("benefit_applications.application_type", "=", 'Senior')->where("benefit_applications.application_status", "=", 'Applied');
        }])->get();
            
          
          
           return view('pages/seniorbenefitevaluation',$data)->with(compact('clients'));
   
           
        }
   
        public function seniorbenefitapproval()
        {
            $data = ['LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first()];

            $clients=  Client::with("occupations","barangays")->whereHas("benefit_applications", function($subQuery) {
                $subQuery->where("benefit_applications.application_type", "=", 'Senior')->where("benefit_applications.application_status", "=", 'EVALUATED-APPROVED'); 
            })->with(["benefit_applications" => function($subQuery){
                $subQuery->where("benefit_applications.application_type", "=", 'Senior')->where("benefit_applications.application_status", "=", 'EVALUATED-APPROVED');
            }])->get();
                
           
         
       
            return view('pages/seniorbenefitapproval',$data)->with(compact('clients'));
    
            
         }
   
         public function seniorbenefitverification()
         {
            $data = ['LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first()];
            $clients=  Client::with("occupations","barangays")->whereHas("benefit_applications", function($subQuery) {
                $subQuery->where("benefit_applications.application_type", "=", 'Senior')->where("benefit_applications.application_status", "=", 'APPROVAL-APPROVED'); 
            })->with(["benefit_applications" => function($subQuery){
                $subQuery->where("benefit_applications.application_type", "=", 'Senior')->where("benefit_applications.application_status", "=", 'APPROVAL-APPROVED');
            }])->get();
                
           
          
           
           
        
             return view('pages/seniorbenefitverification',$data)->with(compact('clients'));
     
             
          }
   

     
   
   


       public function pwdbenefitevaluation()
    {

        $data = ['LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first()];
        $clients=  Client::with("occupations","barangays")->whereHas("benefit_applications", function($subQuery) {
            $subQuery->where("benefit_applications.application_type", "=", 'PWD')->where("benefit_applications.application_status", "=", 'Applied'); 
        })->with(["benefit_applications" => function($subQuery){
            $subQuery->where("benefit_applications.application_type", "=", 'PWD')->where("benefit_applications.application_status", "=", 'Applied');
        }])->get();
            
          
        
       
      
 
        return view('pages/pwdbenefitevaluation',$data)->with(compact('clients'));

        
     }

     public function pwdbenefitapproval()
     {
 
        $data = ['LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first()];
        $clients=Client::with("occupations","barangays")->whereHas("benefit_applications", function($subQuery) {
            $subQuery->where("benefit_applications.application_type", "=", 'PWD')->where("benefit_applications.application_status", "=", 'EVALUATED-APPROVED'); 
        })->with(["benefit_applications" => function($subQuery){
            $subQuery->where("benefit_applications.application_type", "=", 'PWD')->where("benefit_applications.application_status", "=", 'EVALUATED-APPROVED');
        }])->get();
            
     
       
    
         return view('pages/pwdbenefitapproval',$data)->with(compact('clients'));
 
         
      }

      public function pwdbenefitverification()
      {
  
        $data = ['LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first()];
        
        $clients=  Client::with("occupations","barangays")->whereHas("benefit_applications", function($subQuery) {
            $subQuery->where("benefit_applications.application_type", "=", 'PWD')->where("benefit_applications.application_status", "=", 'APPROVAL-APPROVED'); 
        })->with(["benefit_applications" => function($subQuery){
            $subQuery->where("benefit_applications.application_type", "=", 'PWD')->where("benefit_applications.application_status", "=", 'APPROVAL-APPROVED');
        }])->get();
            
     
          return view('pages/pwdbenefitverification',$data)->with(compact('clients'));
  
          
       }


       public function soloparentbenefitevaluation()
       {
        $data = ['LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first()];
   
        $clients=  Client::with("occupations","barangays")->whereHas("benefit_applications", function($subQuery) {
            $subQuery->where("benefit_applications.application_type", "=", 'Solo Parent')->where("benefit_applications.application_status", "=", 'Applied'); 
        })->with(["benefit_applications" => function($subQuery){
            $subQuery->where("benefit_applications.application_type", "=", 'Solo Parent')->where("benefit_applications.application_status", "=", 'Applied');
        }])->get();
            
         
      
        return view('pages/soloparentbenefitevaluation',$data)->with(compact('clients'));
   
           
        }
   
        public function soloparentbenefitapproval()
        { 
    
            $data = ['LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first()];
            $clients=  Client::with("occupations","barangays")->whereHas("benefit_applications", function($subQuery) {
                $subQuery->where("benefit_applications.application_type", "=", 'Solo Parent')->where("benefit_applications.application_status", "=", 'EVALUATED-APPROVED'); 
            })->with(["benefit_applications" => function($subQuery){
                $subQuery->where("benefit_applications.application_type", "=", 'Solo Parent')->where("benefit_applications.application_status", "=", 'EVALUATED-APPROVED');
            }])->get();
                
        
          
       
            return view('pages/soloparentbenefitapproval',$data)->with(compact('clients'));
    
            
         }
   
         public function soloparentbenefitverification()
         {
            $data = ['LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first()];
            $clients=  Client::with("occupations","barangays")->whereHas("benefit_applications", function($subQuery) {
                $subQuery->where("benefit_applications.application_type", "=", 'Solo Parent')->where("benefit_applications.application_status", "=", 'APPROVAL-APPROVED'); 
            })->with(["benefit_applications" => function($subQuery){
                $subQuery->where("benefit_applications.application_type", "=", 'Solo Parent')->where("benefit_applications.application_status", "=", 'APPROVAL-APPROVED');
            }])->get();
        
             return view('pages/soloparentbenefitverification',$data)->with(compact('clients'));
     
             
          }


         
      
      
   

          public function declineseniorbenefit()

          {
            $data = ['LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first()];

            $clients= Client::with('client_cards.benefit_applications')->whereHas("benefit_applications.decline_benefits", function($subQuery) {
                $subQuery->where("decline_benefits.client_type", "=", 'Senior'); 
            })->with(["decline_benefits" => function($subQuery){
                $subQuery->where("decline_benefits.client_type", "=", 'Senior');
            }])->get();
     
              return view('pages/declinedbenefit/declinedseniorbenefit',$data)->with(compact('clients'));
              
           }

           

           public function declinesoloparentbenefit()
           {
             
       
            $data = ['LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first()];
            $clients= Client::with('client_cards.benefit_applications')->whereHas("benefit_applications.decline_benefits", function($subQuery) {
                $subQuery->where("decline_benefits.client_type", "=", 'Solo Parent'); 
            })->with(["decline_benefits" => function($subQuery){
                $subQuery->where("decline_benefits.client_type", "=", 'Solo Parent');
            }])->get();
     
             
          
            return view('pages/declinedbenefit/declinedsoloparentbenefit',$data)->with(compact('clients'));
       
               
            }

            public function declinepwdbenefit()
           {
             
       
            $data = ['LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first()];
            $clients= Client::with('client_cards.benefit_applications')->whereHas("benefit_applications.decline_benefits", function($subQuery) {
                $subQuery->where("decline_benefits.client_type", "=", 'PWD'); 
            })->with(["decline_benefits" => function($subQuery){
                $subQuery->where("decline_benefits.client_type", "=", 'PWD');
            }])->get();
     
             
            return view('pages/declinedbenefit/declinedpwdbenefit',$data)->with(compact('clients'));
          
               
               
            }

            public function declinecitizenbenefit()
            {
              
         $data = ['LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first()];
                
                $clients= Client::with('client_cards.benefit_applications')->whereHas("benefit_applications.decline_benefits", function($subQuery) {
                    $subQuery->where("decline_benefits.client_type", "=", 'Citizen'); 
                })->with(["decline_benefits" => function($subQuery){
                    $subQuery->where("decline_benefits.client_type", "=", 'Citizen');
                }])->get();
         
             
           
                return view('pages/declinedbenefit/declinedcitizenbenefit',$data)->with(compact('clients'));
        
                
             }

             
       public function citizenevaluation()
       {
   
        $data = ['LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first()];
        $clients=  Client::with("occupations","barangays")->whereHas("client_applications", function($subQuery) {
            $subQuery->where("client_applications.application_type", "=", 'Citizen')->where("client_applications.application_status", "=", 'Applied'); 
        })->with(["client_applications" => function($subQuery){
            $subQuery->where("client_applications.application_type", "=", 'Citizen')->where("client_applications.application_status", "=", 'Applied');
        }])->get();
            
      
         
      
           return view('pages/citizenevaluation',$data)->with(compact('clients'));
   
           
        }
   
        public function citizenapproval()
        {
            $data = ['LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first()];
    
            $clients=  Client::with("occupations","barangays")->whereHas("client_applications", function($subQuery) {
                $subQuery->where("client_applications.application_type", "=", 'Citizen')->where("client_applications.application_status", "=", 'EVALUATED-APPROVED'); 
            })->with(["client_applications" => function($subQuery){
                $subQuery->where("client_applications.application_type", "=", 'Citizen')->where("client_applications.application_status", "=", 'EVALUATED-APPROVED');
            }])->get();
          
       
            return view('pages/citizenapproval',$data)->with(compact('clients'));
    
            
         }
   
         public function citizenverification()
         {
     
            $data = ['LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first()];
            $clients=  Client::with("occupations","barangays")->whereHas("client_applications", function($subQuery) {
                $subQuery->where("client_applications.application_type", "=", 'Citizen')->where("client_applications.application_status", "=", 'APPROVAL-APPROVED'); 
            })->with(["client_applications" => function($subQuery){
                $subQuery->where("client_applications.application_type", "=", 'Citizen')->where("client_applications.application_status", "=", 'APPROVAL-APPROVED');
            }])->get();
            
         
            
      
           
        
             return view('pages/citizenverification',$data)->with(compact('clients'));
     
             
          }
   
          public function cardcitizen()
          {
      
            $data = ['LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first()];
            $clients= Client::with("occupations","barangays")->whereHas("client_cards", function($subQuery) {
                $subQuery->where("client_cards.card_status", "=", 'Active')->where("client_cards.card_type", "=", 'Citizen'); 
            })->with(["client_cards" => function($subQuery){
                $subQuery->where("client_cards.card_status", "=", 'Active')->where("client_cards.card_type", "=", 'Citizen');
            }])->get();
            
         
              return view('pages/card/cardcitizen',$data)->with(compact('clients'));
      
              
           }
   
   
          public function pwdevaluation()
       {
   
        $data = ['LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first()];
        $clients=  Client::with("occupations","barangays","identification_cards","physicians","disability_types","disability_causes","organizations","family_compositions")->whereHas("client_applications", function($subQuery) {
            $subQuery->where("client_applications.application_type", "=", 'PWD')->where("client_applications.application_status", "=", 'Applied'); 
        })->with(["client_applications" => function($subQuery){
            $subQuery->where("client_applications.application_type", "=", 'PWD')->where("client_applications.application_status", "=", 'Applied');
        }])->get();
            
         
           return view('pages/pwdevaluation',$data)->with(compact('clients'));
   
           
        }
   
        public function pwdapproval()
        {

            $data = ['LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first()];
    
            $clients=  Client::with("occupations","barangays","identification_cards","physicians","disability_types","disability_causes","organizations","family_compositions")->whereHas("client_applications", function($subQuery) {
                $subQuery->where("client_applications.application_type", "=", 'PWD')->where("client_applications.application_status", "=", 'EVALUATED-APPROVED'); 
            })->with(["client_applications" => function($subQuery){
                $subQuery->where("client_applications.application_type", "=", 'PWD')->where("client_applications.application_status", "=", 'EVALUATED-APPROVED');
            }])->get();
          
       
            return view('pages/pwdapproval',$data)->with(compact('clients'));
    
            
         }
   
         public function pwdverification()
         {
            $data = ['LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first()];
     
            $clients=  Client::with("occupations","barangays","identification_cards","physicians","disability_types","disability_causes","organizations","family_compositions")->whereHas("client_applications", function($subQuery) {
                $subQuery->where("client_applications.application_type", "=", 'PWD ')->where("client_applications.application_status", "=", 'APPROVAL-APPROVED'); 
            })->with(["client_applications" => function($subQuery){
                $subQuery->where("client_applications.application_type", "=", 'PWD ')->where("client_applications.application_status", "=", 'APPROVAL-APPROVED');
            }])->get();
            
        
             return view('pages/pwdverification',$data)->with(compact('clients'));
     
             
          }
   
          public function cardpwd()
          {
            $data = ['LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first()];
            $clients= Client::with("occupations","barangays","identification_cards","physicians","disability_types","disability_causes","organizations","family_compositions")->whereHas("client_cards", function($subQuery) {
                $subQuery->where("client_cards.card_status", "=", 'Active')->where("client_cards.card_type", "=", 'PWD'); 
            })->with(["client_cards" => function($subQuery){
                $subQuery->where("client_cards.card_status", "=", 'Active')->where("client_cards.card_type", "=", 'PWD');
            }])->get();
       
              return view('pages/card/cardpwd',$data)->with(compact('clients'));
      
              
           }
   
   
          public function soloparentevaluation()
          {
            $data = ['LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first()];
      
            $clients=  Client::with("occupations","barangays","family_compositions","education","community_involvements","seminar_trainings")->whereHas("client_applications", function($subQuery) {
                $subQuery->where("client_applications.application_type", "=", 'Solo Parent')->where("client_applications.application_status", "=", 'Applied'); 
            })->with(["client_applications" => function($subQuery){
                $subQuery->where("client_applications.application_type", "=", 'Solo Parent')->where("client_applications.application_status", "=", 'Applied');
            }])->get();
           
            
         
           return view('pages/soloparentevaluation',$data)->with(compact('clients'));
      
              
           }
      
           public function soloparentapproval()
           { 
       
            $data = ['LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first()];
            $clients=  Client::with("occupations","barangays","family_compositions","education","community_involvements","seminar_trainings")->whereHas("client_applications", function($subQuery) {
                $subQuery->where("client_applications.application_type", "=", 'Solo Parent')->where("client_applications.application_status", "=", 'EVALUATED-APPROVED'); 
            })->with(["client_applications" => function($subQuery){
                $subQuery->where("client_applications.application_type", "=", 'Solo Parent')->where("client_applications.application_status", "=", 'EVALUATED-APPROVED');
            }])->get();
          
             
          
               return view('pages/soloparentapproval',$data)->with(compact('clients'));
       
               
            }
      
            public function soloparentverification()
            {
        
                $data = ['LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first()];
                $clients=  Client::with("occupations","barangays","family_compositions","education","community_involvements","seminar_trainings")->whereHas("client_applications", function($subQuery) {
                    $subQuery->where("client_applications.application_type", "=", 'Solo Parent')->where("client_applications.application_status", "=", 'APPROVAL-APPROVED'); 
                })->with(["client_applications" => function($subQuery){
                    $subQuery->where("client_applications.application_type", "=", 'Solo Parent')->where("client_applications.application_status", "=", 'APPROVAL-APPROVED');
                }])->get();
                
         
                return view('pages/soloparentverification',$data)->with(compact('clients'));
        
                
             }
   
   
             public function cardsoloparent()
             {

                $data = ['LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first()];

         
                $clients= Client::with("occupations","barangays","family_compositions","education","community_involvements","seminar_trainings")->whereHas("client_cards", function($subQuery) {
                    $subQuery->where("client_cards.card_status", "=", 'Active')->where("client_cards.card_type", "=", 'SOLO PARENT'); 
                })->with(["client_cards" => function($subQuery){
                    $subQuery->where("client_cards.card_status", "=", 'Active')->where("client_cards.card_type", "=", 'SOLO PARENT');
                }])->get();
            
              return view('pages/card/cardsoloparent',$data)->with(compact('clients'));
         
                 
              }
      
   
             public function declinesenior()
             {


                $data = ['LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first()];
               
   
                $clients= Client::whereHas("client_applications.declined_clients", function($subQuery) {
                    $subQuery->where("client_type", "=", 'Senior'); 
                })->with(["client_applications.declined_clients" => function($subQuery){
                    $subQuery->where("client_type", "=", 'Senior');
                }])->get();
                
               
           
                 return view('pages/declined/declinedsenior',$data)->with(compact('clients'));
         
                 
              }
   
              
   
              public function declinesoloparent()
              {
                
          
                $data = ['LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first()];
                $clients= Client::with("occupations","barangays","family_compositions","education","community_involvements","seminar_trainings")->whereHas("client_applications.declined_clients", function($subQuery) {
                    $subQuery->where("client_type", "=", 'Solo Parent'); 
                })->with(["client_applications.declined_clients" => function($subQuery){
                    $subQuery->where("client_type", "=", 'Solo Parent');
                }])->get();
                
                
             
                  return view('pages/declined/declinedsoloparent',$data)->with(compact('clients'));
          
                  
               }
   
               public function declinepwd()
              {
                
                $data = ['LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first()];
               
                $clients= Client::with("occupations","barangays","identification_cards","physicians","disability_types","disability_causes","organizations","family_compositions")->whereHas("client_applications.declined_clients", function($subQuery) {
                    $subQuery->where("client_type", "=", 'PWD'); 
                })->with(["client_applications.declined_clients" => function($subQuery){
                    $subQuery->where("client_type", "=", 'PWD');
                }])->get();
                
         
                
               
                  return view('pages/declined/declinedpwd',$data)->with(compact('clients'));
             
                  
                  
               }
   
               public function declinecitizen()
               {
                $data = ['LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first()];
             
                $clients= Client::whereHas("client_applications.declined_clients", function($subQuery) {
                    $subQuery->where("client_type", "=", 'Citizen'); 
                })->with(["client_applications.declined_clients" => function($subQuery){
                    $subQuery->where("client_type", "=", 'Citizen');
                }])->get();
                
         
                
               
              
                   return view('pages/declined/declinedcitizen',$data)->with(compact('clients'));
           
                   
                }
 

            


       public function citizencard()
       {
        $data = ['LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first()];
   
        $clients= Client::with("occupations","barangays")->whereHas("client_cards", function($subQuery) {
            $subQuery->where("client_cards.card_status", "=", 'Active')->where("client_cards.card_type", "=", 'Citizen'); 
        })->with(["client_cards" => function($subQuery){
            $subQuery->where("client_cards.card_status", "=", 'Active')->where("client_cards.card_type", "=", 'Citizen');
        }])->get();
    
      
           return view('pages/verifysenior',$data)->with(compact('clients'));
   
           
        }
    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function regularTable()
    {
        return view('pages/regular-table');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function tabulator()
    {
       
      
        $item = DB::table('items')
        ->select()
        ->get();
        return view('pages/tabulator')->with(compact('item'));
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function modal()
    {
        return view('pages/modal');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function slideOver()
    {
        return view('pages/slide-over');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function notification()
    {
        return view('pages/notification');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function tab()
    {
        return view('pages/tab');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function accordion()
    {
        return view('pages/accordion');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function button()
    {
        return view('pages/button');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function alert()
    {
        return view('pages/alert');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function progressBar()
    {
        return view('pages/progress-bar');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function tooltip()
    {
        return view('pages/tooltip');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function dropdown()
    {
        return view('pages/dropdown');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function typography()
    {
        return view('pages/typography');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function icon()
    {
        return view('pages/icon');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function loadingIcon()
    {
        return view('pages/loading-icon');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function regularForm()
    {
        return view('pages/regular-form');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function datepicker()
    {
        return view('pages/datepicker');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function tomSelect()
    {
        return view('pages/tom-select');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function fileUpload()
    {
        return view('pages/file-upload');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function wysiwygEditorClassic()
    {
        return view('pages/wysiwyg-editor-classic');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function wysiwygEditorInline()
    {
        return view('pages/wysiwyg-editor-inline');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function wysiwygEditorBalloon()
    {
        return view('pages/wysiwyg-editor-balloon');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function wysiwygEditorBalloonBlock()
    {
        return view('pages/wysiwyg-editor-balloon-block');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function wysiwygEditorDocument()
    {
        return view('pages/wysiwyg-editor-document');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function validation()
    {
        return view('pages/validation');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function chart()
    {
        return view('pages/chart');
    }

    
    public function slider()
    {
        return view('pages/slider');
    }

    
    public function imageZoom()
    {
        return view('pages/image-zoom');
    }
}
