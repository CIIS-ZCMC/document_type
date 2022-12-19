<?php

namespace App\Mail;
namespace App\Http\Controllers;
use App\Mail\ScheduleMail;
use App\Models\Client;

use App\Models\Barangay;
use App\Models\ClientApplication;
use App\Models\ClientApplicationLog;
use App\Models\ClientApplicationRequirement;
use App\Models\ClientCard;
use App\Models\ClientSchedule;
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
use App\Models\Physician;
use App\Models\SeminarTraining;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Mail;


class PageController extends Controller
{
    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function dashboardOverview1()
    {
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
        return view('pages/dashboard-overview-1', [
            // Specify the base layout.
            // Eg: 'side-menu', 'simple-menu', 'top-menu', 'login'
            // The default value is 'side-menu'

            // 'layout' => 'side-menu'
        ])->with(compact('citizencount','seniorcount','pwdcount','soloparentcount','pendingcitizencount','pendingseniorcount','pendingpwdcount','pendingsoloparentcount'));;
    }

    // top-bar-menu
    public function profile() {
        return view('layout/top-bar-menu/profile',[]);
    }


    public function main()
    {
        return view('main/landing', [
            // Specify the base layout.
            // Eg: 'side-menu', 'simple-menu', 'top-menu', 'login'
            // The default value is 'side-menu'

            // 'layout' => 'side-menu'
        ]);
    }
    public function registration()
    {
        $barangaylist = Barangay::select('id', 'name')->get();
        return view('main/citizenregistration', [
            // Specify the base layout.
            // Eg: 'side-menu', 'simple-menu', 'top-menu', 'login'
            // The default value is 'side-menu'

            // 'layout' => 'side-menu'
        ])->with(compact('barangaylist'));
    }

  
    public function seniorregistration()
    {
        $barangaylist = Barangay::select('id', 'name')->get();
        return view('main/seniorregistration', [
            // Specify the base layout.
            // Eg: 'side-menu', 'simple-menu', 'top-menu', 'login'
            // The default value is 'side-menu'

            // 'layout' => 'side-menu'
            ])->with(compact('barangaylist'));
    }

  

    public function pwdregistration()
    {
        $barangaylist = Barangay::select('id', 'name')->get();
        return view('main/pwdregistration', [
            // Specify the base layout.
            // Eg: 'side-menu', 'simple-menu', 'top-menu', 'login'
            // The default value is 'side-menu'

            // 'layout' => 'side-menu'
            ])->with(compact('barangaylist'));
    }
    public function soloparentregistration()
    {
        $barangaylist = Barangay::select('id', 'name')->get();
        return view('main/soloparentregistration', [
            // Specify the base layout.
            // Eg: 'side-menu', 'simple-menu', 'top-menu', 'login'
            // The default value is 'side-menu'

            // 'layout' => 'side-menu'
            ])->with(compact('barangaylist'));
    }

    public function registeredsenior()
    {
        $barangaylist = Barangay::select('id', 'name')->get();
        return view('main/searchregistered/searchregisteredsenior', [
            // Specify the base layout.
            // Eg: 'side-menu', 'simple-menu', 'top-menu', 'login'
            // The default value is 'side-menu'

            // 'layout' => 'side-menu'
            ])->with(compact('barangaylist'));
    }
    public function registeredpwd()
    {
        $barangaylist = Barangay::select('id', 'name')->get();
        return view('main/searchregistered/searchregisteredpwd', [
            // Specify the base layout.
            // Eg: 'side-menu', 'simple-menu', 'top-menu', 'login'
            // The default value is 'side-menu'

            // 'layout' => 'side-menu'
            ])->with(compact('barangaylist'));
    }
    public function registeredsoloparent()
    {
        $barangaylist = Barangay::select('id', 'name')->get();
        return view('main/searchregistered/searchregisteredsoloparent', [
            // Specify the base layout.
            // Eg: 'side-menu', 'simple-menu', 'top-menu', 'login'
            // The default value is 'side-menu'

            // 'layout' => 'side-menu'
            ])->with(compact('barangaylist'));
    }

    public function registeredseniorpage()
    {
        $barangaylist = Barangay::select('id', 'name')->get();
        return view('main/registeredclientpage/registeredseniorpage', [
            // Specify the base layout.
            // Eg: 'side-menu', 'simple-menu', 'top-menu', 'login'
            // The default value is 'side-menu'

            // 'layout' => 'side-menu'
            ])->with(compact('barangaylist'));
    }
    public function registeredpwdpage()
    {
        $barangaylist = Barangay::select('id', 'name')->get();
        return view('main/registeredclientpage/registeredpwdpage', [
            // Specify the base layout.
            // Eg: 'side-menu', 'simple-menu', 'top-menu', 'login'
            // The default value is 'side-menu'

            // 'layout' => 'side-menu'
            ])->with(compact('barangaylist'));
    }
    public function registeredsoloparentpage()
    {
        $barangaylist = Barangay::select('id', 'name')->get();
        return view('main/registeredclientpage/registeredsoloparentpage', [
            // Specify the base layout.
            // Eg: 'side-menu', 'simple-menu', 'top-menu', 'login'
            // The default value is 'side-menu'

            // 'layout' => 'side-menu'
            ])->with(compact('barangaylist'));
    }

    public function trackcardform()
    {
        $barangaylist = Barangay::select('id', 'name')->get();
        return view('main/track/trackcardform', [
            // Specify the base layout.
            // Eg: 'side-menu', 'simple-menu', 'top-menu', 'login'
            // The default value is 'side-menu'

            // 'layout' => 'side-menu'
            ])->with(compact('barangaylist'));
    }
    public function trackbenefitform()
    {
        $barangaylist = Barangay::select('id', 'name')->get();
        return view('main/track/trackbenefitform', [
            // Specify the base layout.
            // Eg: 'side-menu', 'simple-menu', 'top-menu', 'login'
            // The default value is 'side-menu'

            // 'layout' => 'side-menu'
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
            // Specify the base layout.
            // Eg: 'side-menu', 'simple-menu', 'top-menu', 'login'
            // The default value is 'side-menu'

            // 'layout' => 'side-menu'
            ])->with(compact('barangaylist'));
    }
    public function ongoingpwd()
    {
        $barangaylist = Barangay::select('id', 'name')->get();
        return view('main/searchongoing/searchongoingpwd', [
            // Specify the base layout.
            // Eg: 'side-menu', 'simple-menu', 'top-menu', 'login'
            // The default value is 'side-menu'

            // 'layout' => 'side-menu'
            ])->with(compact('barangaylist'));
    }
    public function ongoingsoloparent()
    {
        $barangaylist = Barangay::select('id', 'name')->get();
        return view('main/searchongoing/searchongoingsoloparent', [
            // Specify the base layout.
            // Eg: 'side-menu', 'simple-menu', 'top-menu', 'login'
            // The default value is 'side-menu'

            // 'layout' => 'side-menu'
            ])->with(compact('barangaylist'));
    }


    public function searchongoingsenior(Request $request)
    {
        $barangaylist = Barangay::select('id', 'name')->get();
    //    $client=Client::with("client_applications")->where('first_name','=',$request->input('firstname'))->where('last_name','=',$request->input('lastname'))->where('middle_name','=',$request->input('middlename'))->whereHas('client_applications', function($q) use ($request) {
    //         $q->where('application_type', '=', 'Senior')
    //         ->where('application_reference_number', '=', $request->input('number'));})
       
    //     ->first();



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

            if($clientregistered == null)
            {

                session_start();
                $_SESSION['fail'] ="fail";

                return redirect()->back()->with('fail');  
                exit;
            }
            else
            {
                session_start();
                $_SESSION['Error'] ="Error";

                return redirect()->back()->with('Error');  
                exit;

            }

           
        }

        else{
            
                
        $clientapplication=ClientApplication::where('client_id',$client->id)->where('application_type','=','Senior')->first();

        if($clientapplication == null)
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
                $_SESSION['fail'] ="fail";
               
             
                
                return redirect()->back()->with('fail');  
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

            if($clientregistered == null)
            {

                session_start();
                $_SESSION['fail'] ="fail";

                return redirect()->back()->with('fail');  
                exit;
            }
            else
            {
                session_start();
                $_SESSION['Error'] ="Error";

                return redirect()->back()->with('Error');  
                exit;

            }
        }

        else{

                   
        $clientapplication=ClientApplication::where('client_id',$client->id)->where('application_type','=','PWD')->first();
          
        if($clientapplication == null)
        {
         
            return view('main/ongoingclient/ongoingpwd', [
                // Specify the base layout.
                // Eg: 'side-menu', 'simple-menu', 'top-menu', 'login'
                // The default value is 'side-menu'
    
                // 'layout' => 'side-menu'
                ])->with(compact('client','barangaylist'));
            }
            else
            {

                session_start();
                $_SESSION['fail'] ="fail";
               
             
                
                return redirect()->back()->with('fail');  
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

            if($clientregistered == null)
            {

             $clientregistered= Client::where('first_name','=',$request->input('firstname'))->where('last_name','=',$request->input('lastname'))->where('middle_name','=',$request->input('middlename'))->whereHas("client_applications", function($subQuery) use ($request)  {
                $subQuery->where("client_applications.application_type", "=", 'Citizen')->where("client_applications.application_process", "=", 'Online-Registered')->where("client_applications.application_reference_number", "=" ,$request->input('number')); 
            })->with(["client_applications" => function($subQuery) use ($request){
                $subQuery->where("client_applications.application_type", "=", 'Citizen')->where("client_applications.application_process", "=", 'Online-Registered')->where("client_applications.application_reference_number", "=" ,$request->input('number')); 
            }])->first();

            if($clientregistered == null)
            {

                session_start();
                $_SESSION['fail'] ="fail";

                return redirect()->back()->with('fail');  
                exit;
            }
            else
            {
                session_start();
                $_SESSION['Error'] ="Error";

                return redirect()->back()->with('Error');  
                exit;

            }
            }
            else
            {
                session_start();
                $_SESSION['Error'] ="Error";

                return redirect()->back()->with('Error');  
                exit;

            }
        }

        else{


           
             
            $clientapplication=ClientApplication::where('client_id',$client->id)->where('application_type','=','Solo Parent')->first();

            if($clientapplication == null)
            {
             
                return view('main/ongoingclient/ongoingsoloparent', [
                    // Specify the base layout.
                    // Eg: 'side-menu', 'simple-menu', 'top-menu', 'login'
                    // The default value is 'side-menu'
        
                    // 'layout' => 'side-menu'
                    ])->with(compact('client','barangaylist'));
                }
                else
                {
    
                    session_start();
                    $_SESSION['fail'] ="fail";
                   
                 
                    
                    return redirect()->back()->with('fail');  
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


        $user = DB::table('users')
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
    public function dashboardOverview3()
    {
        return view('pages/dashboard-overview-3');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function dashboardOverview4()
    {
        return view('pages/dashboard-overview-4');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function inbox()
    {
        return view('pages/inbox');
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
        return view('pages/profile-overview-1');
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
        $fo = DB::table('field_offices')
        ->select()
        ->get();
        return view('pages/fieldoffice')->with(compact('fo'));
    }
    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function seniorevaluation()
    {
  

        $clients=  Client::with("occupations","barangays")->whereHas("client_applications", function($subQuery) {
            $subQuery->where("client_applications.application_type", "=", 'Senior')->where("client_applications.application_status", "=", 'Applied'); 
        })->with(["client_applications" => function($subQuery){
            $subQuery->where("client_applications.application_type", "=", 'Senior')->where("client_applications.application_status", "=", 'Applied');
        }])->get();
            
      
       
      
      
      
        return view('pages/seniorevaluation')->with(compact('clients'));

        
     }

     public function seniorapproval()
     {
 
        $clients=  Client::with("occupations","barangays")->whereHas("client_applications", function($subQuery) {
            $subQuery->where("client_applications.application_type", "=", 'Senior')->where("client_applications.application_status", "=", 'EVALUATED-APPROVED'); 
        })->with(["client_applications" => function($subQuery){
            $subQuery->where("client_applications.application_type", "=", 'Senior')->where("client_applications.application_status", "=", 'EVALUATED-APPROVED');
        }])->get();
    
         return view('pages/seniorapproval')->with(compact('clients'));
 
         
      }

      public function verifysenior()
      {
  
        $clients=  Client::with("occupations","barangays")->whereHas("client_applications", function($subQuery) {
            $subQuery->where("client_applications.application_type", "=", 'Senior')->where("client_applications.application_status", "=", 'APPROVAL-APPROVED'); 
        })->with(["client_applications" => function($subQuery){
            $subQuery->where("client_applications.application_type", "=", 'Senior')->where("client_applications.application_status", "=", 'APPROVAL-APPROVED');
        }])->get();
        
     
          return view('pages/verifysenior')->with(compact('clients'));
  
          
       }

       public function cardsenior()
    {

       


        $clients= Client::with("occupations","barangays")->whereHas("client_cards", function($subQuery) {
            $subQuery->where("client_cards.card_status", "=", 'Active')->where("client_cards.card_type", "=", 'Senior'); 
        })->with(["client_cards" => function($subQuery){
            $subQuery->where("client_cards.card_status", "=", 'Active')->where("client_cards.card_type", "=", 'Senior');
        }])->get();

        
    
        return view('pages/card/cardsenior')->with(compact('clients'));

        
     }


       public function citizenbenefitevaluation()
    {

      

        $clients=Client::with("occupations","barangays","client_cards.benefit_applications")->whereHas('benefit_applications', function($q) {
            $q->where('application_status', '=','Applied')
            ->where('application_type', '=', 'Citizen');})
       
        ->get();
      
   
        return view('pages/citizenbenefitevaluation')->with(compact('clients'));

        
     }

     public function citizenbenefitapproval()
     {
 
         $clients=Client::with("occupations","barangays","client_cards.benefit_applications")->whereHas('benefit_applications', function($q){
             $q->where('application_status', '=','EVALUATED-APPROVED')
             ->where('application_type', '=', 'Citizen');})
        
         ->get();
       
    
         return view('pages/citizenbenefitapproval')->with(compact('clients'));
 
         
      }

      public function citizenbenefitverification()
      {
  
          $clients=Client::with("occupations","barangays","benefit_applications.benefit_schedules")->whereHas('benefit_applications', function($q) {
              $q->where('application_status', '=','APPROVAL-APPROVED')
              ->where('application_type', '=','Citizen');})
         
          ->get();
        
     
          return view('pages/citizenbenefitverification')->with(compact('clients'));
  
          
       }

       public function seniorbenefitevaluation()
       {

        
   
      
        $clients=  Client::with("occupations","barangays")->whereHas("benefit_applications", function($subQuery) {
            $subQuery->where("benefit_applications.application_type", "=", 'Senior')->where("benefit_applications.application_status", "=", 'Applied'); 
        })->with(["benefit_applications" => function($subQuery){
            $subQuery->where("benefit_applications.application_type", "=", 'Senior')->where("benefit_applications.application_status", "=", 'Applied');
        }])->get();
            
          
          
           return view('pages/seniorbenefitevaluation')->with(compact('clients'));
   
           
        }
   
        public function seniorbenefitapproval()
        {

            $clients=  Client::with("occupations","barangays")->whereHas("benefit_applications", function($subQuery) {
                $subQuery->where("benefit_applications.application_type", "=", 'Senior')->where("benefit_applications.application_status", "=", 'EVALUATED-APPROVED'); 
            })->with(["benefit_applications" => function($subQuery){
                $subQuery->where("benefit_applications.application_type", "=", 'Senior')->where("benefit_applications.application_status", "=", 'EVALUATED-APPROVED');
            }])->get();
                
           
         
       
            return view('pages/seniorbenefitapproval')->with(compact('clients'));
    
            
         }
   
         public function seniorbenefitverification()
         {
            $clients=  Client::with("occupations","barangays")->whereHas("benefit_applications", function($subQuery) {
                $subQuery->where("benefit_applications.application_type", "=", 'Senior')->where("benefit_applications.application_status", "=", 'APPROVAL-APPROVED'); 
            })->with(["benefit_applications" => function($subQuery){
                $subQuery->where("benefit_applications.application_type", "=", 'Senior')->where("benefit_applications.application_status", "=", 'APPROVAL-APPROVED');
            }])->get();
                
           
          
           
           
        
             return view('pages/seniorbenefitverification')->with(compact('clients'));
     
             
          }
   

     
   
   


       public function pwdbenefitevaluation()
    {

        $clients=  Client::with("occupations","barangays")->whereHas("benefit_applications", function($subQuery) {
            $subQuery->where("benefit_applications.application_type", "=", 'PWD')->where("benefit_applications.application_status", "=", 'Applied'); 
        })->with(["benefit_applications" => function($subQuery){
            $subQuery->where("benefit_applications.application_type", "=", 'PWD')->where("benefit_applications.application_status", "=", 'Applied');
        }])->get();
            
          
        
       
      
 
        return view('pages/pwdbenefitevaluation')->with(compact('clients'));

        
     }

     public function pwdbenefitapproval()
     {
 
        $clients=Client::with("occupations","barangays")->whereHas("benefit_applications", function($subQuery) {
            $subQuery->where("benefit_applications.application_type", "=", 'PWD')->where("benefit_applications.application_status", "=", 'EVALUATED-APPROVED'); 
        })->with(["benefit_applications" => function($subQuery){
            $subQuery->where("benefit_applications.application_type", "=", 'PWD')->where("benefit_applications.application_status", "=", 'EVALUATED-APPROVED');
        }])->get();
            
     
       
    
         return view('pages/pwdbenefitapproval')->with(compact('clients'));
 
         
      }

      public function pwdbenefitverification()
      {
  
        
        $clients=  Client::with("occupations","barangays")->whereHas("benefit_applications", function($subQuery) {
            $subQuery->where("benefit_applications.application_type", "=", 'PWD')->where("benefit_applications.application_status", "=", 'APPROVAL-APPROVED'); 
        })->with(["benefit_applications" => function($subQuery){
            $subQuery->where("benefit_applications.application_type", "=", 'PWD')->where("benefit_applications.application_status", "=", 'APPROVAL-APPROVED');
        }])->get();
            
     
          return view('pages/pwdbenefitverification')->with(compact('clients'));
  
          
       }


       public function soloparentbenefitevaluation()
       {
   
        $clients=  Client::with("occupations","barangays")->whereHas("benefit_applications", function($subQuery) {
            $subQuery->where("benefit_applications.application_type", "=", 'Solo Parent')->where("benefit_applications.application_status", "=", 'Applied'); 
        })->with(["benefit_applications" => function($subQuery){
            $subQuery->where("benefit_applications.application_type", "=", 'Solo Parent')->where("benefit_applications.application_status", "=", 'Applied');
        }])->get();
            
         
      
        return view('pages/soloparentbenefitevaluation')->with(compact('clients'));
   
           
        }
   
        public function soloparentbenefitapproval()
        { 
    
            $clients=  Client::with("occupations","barangays")->whereHas("benefit_applications", function($subQuery) {
                $subQuery->where("benefit_applications.application_type", "=", 'Solo Parent')->where("benefit_applications.application_status", "=", 'EVALUATED-APPROVED'); 
            })->with(["benefit_applications" => function($subQuery){
                $subQuery->where("benefit_applications.application_type", "=", 'Solo Parent')->where("benefit_applications.application_status", "=", 'EVALUATED-APPROVED');
            }])->get();
                
        
          
       
            return view('pages/soloparentbenefitapproval')->with(compact('clients'));
    
            
         }
   
         public function soloparentbenefitverification()
         {
            
            $clients=  Client::with("occupations","barangays")->whereHas("benefit_applications", function($subQuery) {
                $subQuery->where("benefit_applications.application_type", "=", 'Solo Parent')->where("benefit_applications.application_status", "=", 'APPROVAL-APPROVED'); 
            })->with(["benefit_applications" => function($subQuery){
                $subQuery->where("benefit_applications.application_type", "=", 'Solo Parent')->where("benefit_applications.application_status", "=", 'APPROVAL-APPROVED');
            }])->get();
        
             return view('pages/soloparentbenefitverification')->with(compact('clients'));
     
             
          }


         
      
      
   

          public function declineseniorbenefit()

          {

            $clients= Client::with('client_cards.benefit_applications')->whereHas("benefit_applications.decline_benefits", function($subQuery) {
                $subQuery->where("decline_benefits.client_type", "=", 'Senior'); 
            })->with(["decline_benefits" => function($subQuery){
                $subQuery->where("decline_benefits.client_type", "=", 'Senior');
            }])->get();
     
              return view('pages/declinedbenefit/declinedseniorbenefit')->with(compact('clients'));
              
           }

           

           public function declinesoloparentbenefit()
           {
             
       
            
            $clients= Client::with('client_cards.benefit_applications')->whereHas("benefit_applications.decline_benefits", function($subQuery) {
                $subQuery->where("decline_benefits.client_type", "=", 'Solo Parent'); 
            })->with(["decline_benefits" => function($subQuery){
                $subQuery->where("decline_benefits.client_type", "=", 'Solo Parent');
            }])->get();
     
             
          
            return view('pages/declinedbenefit/declinedsoloparentbenefit')->with(compact('clients'));
       
               
            }

            public function declinepwdbenefit()
           {
             
       
          
            $clients= Client::with('client_cards.benefit_applications')->whereHas("benefit_applications.decline_benefits", function($subQuery) {
                $subQuery->where("decline_benefits.client_type", "=", 'PWD'); 
            })->with(["decline_benefits" => function($subQuery){
                $subQuery->where("decline_benefits.client_type", "=", 'PWD');
            }])->get();
     
             
            return view('pages/declinedbenefit/declinedpwdbenefit')->with(compact('clients'));
          
               
               
            }

            public function declinecitizenbenefit()
            {
              
        
                
                $clients= Client::with('client_cards.benefit_applications')->whereHas("benefit_applications.decline_benefits", function($subQuery) {
                    $subQuery->where("decline_benefits.client_type", "=", 'Citizen'); 
                })->with(["decline_benefits" => function($subQuery){
                    $subQuery->where("decline_benefits.client_type", "=", 'Citizen');
                }])->get();
         
             
           
                return view('pages/declinedbenefit/declinedcitizenbenefit')->with(compact('clients'));
        
                
             }

             
       public function citizenevaluation()
       {
   
   
        $clients=  Client::with("occupations","barangays")->whereHas("client_applications", function($subQuery) {
            $subQuery->where("client_applications.application_type", "=", 'Citizen')->where("client_applications.application_status", "=", 'Applied'); 
        })->with(["client_applications" => function($subQuery){
            $subQuery->where("client_applications.application_type", "=", 'Citizen')->where("client_applications.application_status", "=", 'Applied');
        }])->get();
            
      
         
      
           return view('pages/citizenevaluation')->with(compact('clients'));
   
           
        }
   
        public function citizenapproval()
        {
    
            $clients=  Client::with("occupations","barangays")->whereHas("client_applications", function($subQuery) {
                $subQuery->where("client_applications.application_type", "=", 'Citizen')->where("client_applications.application_status", "=", 'EVALUATED-APPROVED'); 
            })->with(["client_applications" => function($subQuery){
                $subQuery->where("client_applications.application_type", "=", 'Citizen')->where("client_applications.application_status", "=", 'EVALUATED-APPROVED');
            }])->get();
          
       
            return view('pages/citizenapproval')->with(compact('clients'));
    
            
         }
   
         public function citizenverification()
         {
     
            $clients=  Client::with("occupations","barangays")->whereHas("client_applications", function($subQuery) {
                $subQuery->where("client_applications.application_type", "=", 'Citizen')->where("client_applications.application_status", "=", 'APPROVAL-APPROVED'); 
            })->with(["client_applications" => function($subQuery){
                $subQuery->where("client_applications.application_type", "=", 'Citizen')->where("client_applications.application_status", "=", 'APPROVAL-APPROVED');
            }])->get();
            
         
            
      
           
        
             return view('pages/citizenverification')->with(compact('clients'));
     
             
          }
   
          public function cardcitizen()
          {
      
      
            $clients= Client::with("occupations","barangays")->whereHas("client_cards", function($subQuery) {
                $subQuery->where("client_cards.card_status", "=", 'Active')->where("client_cards.card_type", "=", 'Citizen'); 
            })->with(["client_cards" => function($subQuery){
                $subQuery->where("client_cards.card_status", "=", 'Active')->where("client_cards.card_type", "=", 'Citizen');
            }])->get();
            
         
              return view('pages/card/cardcitizen')->with(compact('clients'));
      
              
           }
   
   
          public function pwdevaluation()
       {
   
        $clients=  Client::with("occupations","barangays","identification_cards","physicians","disability_types","disability_causes","organizations","family_compositions")->whereHas("client_applications", function($subQuery) {
            $subQuery->where("client_applications.application_type", "=", 'PWD')->where("client_applications.application_status", "=", 'Applied'); 
        })->with(["client_applications" => function($subQuery){
            $subQuery->where("client_applications.application_type", "=", 'PWD')->where("client_applications.application_status", "=", 'Applied');
        }])->get();
            
         
           return view('pages/pwdevaluation')->with(compact('clients'));
   
           
        }
   
        public function pwdapproval()
        {
    
            $clients=  Client::with("occupations","barangays","identification_cards","physicians","disability_types","disability_causes","organizations","family_compositions")->whereHas("client_applications", function($subQuery) {
                $subQuery->where("client_applications.application_type", "=", 'PWD')->where("client_applications.application_status", "=", 'EVALUATED-APPROVED'); 
            })->with(["client_applications" => function($subQuery){
                $subQuery->where("client_applications.application_type", "=", 'PWD')->where("client_applications.application_status", "=", 'EVALUATED-APPROVED');
            }])->get();
          
       
            return view('pages/pwdapproval')->with(compact('clients'));
    
            
         }
   
         public function pwdverification()
         {
     
            $clients=  Client::with("occupations","barangays","identification_cards","physicians","disability_types","disability_causes","organizations","family_compositions")->whereHas("client_applications", function($subQuery) {
                $subQuery->where("client_applications.application_type", "=", 'PWD ')->where("client_applications.application_status", "=", 'APPROVAL-APPROVED'); 
            })->with(["client_applications" => function($subQuery){
                $subQuery->where("client_applications.application_type", "=", 'PWD ')->where("client_applications.application_status", "=", 'APPROVAL-APPROVED');
            }])->get();
            
        
             return view('pages/pwdverification')->with(compact('clients'));
     
             
          }
   
          public function cardpwd()
          {
            $clients= Client::with("occupations","barangays","identification_cards","physicians","disability_types","disability_causes","organizations","family_compositions")->whereHas("client_cards", function($subQuery) {
                $subQuery->where("client_cards.card_status", "=", 'Active')->where("client_cards.card_type", "=", 'PWD'); 
            })->with(["client_cards" => function($subQuery){
                $subQuery->where("client_cards.card_status", "=", 'Active')->where("client_cards.card_type", "=", 'PWD');
            }])->get();
       
              return view('pages/card/cardpwd')->with(compact('clients'));
      
              
           }
   
   
          public function soloparentevaluation()
          {
      
            $clients=  Client::with("occupations","barangays","family_compositions","education","community_involvements","seminar_trainings")->whereHas("client_applications", function($subQuery) {
                $subQuery->where("client_applications.application_type", "=", 'Solo Parent')->where("client_applications.application_status", "=", 'Applied'); 
            })->with(["client_applications" => function($subQuery){
                $subQuery->where("client_applications.application_type", "=", 'Solo Parent')->where("client_applications.application_status", "=", 'Applied');
            }])->get();
           
            
         
           return view('pages/soloparentevaluation')->with(compact('clients'));
      
              
           }
      
           public function soloparentapproval()
           { 
       
            $clients=  Client::with("occupations","barangays","family_compositions","education","community_involvements","seminar_trainings")->whereHas("client_applications", function($subQuery) {
                $subQuery->where("client_applications.application_type", "=", 'Solo Parent')->where("client_applications.application_status", "=", 'EVALUATED-APPROVED'); 
            })->with(["client_applications" => function($subQuery){
                $subQuery->where("client_applications.application_type", "=", 'Solo Parent')->where("client_applications.application_status", "=", 'EVALUATED-APPROVED');
            }])->get();
          
             
          
               return view('pages/soloparentapproval')->with(compact('clients'));
       
               
            }
      
            public function soloparentverification()
            {
        
                $clients=  Client::with("occupations","barangays","family_compositions","education","community_involvements","seminar_trainings")->whereHas("client_applications", function($subQuery) {
                    $subQuery->where("client_applications.application_type", "=", 'Solo Parent')->where("client_applications.application_status", "=", 'APPROVAL-APPROVED'); 
                })->with(["client_applications" => function($subQuery){
                    $subQuery->where("client_applications.application_type", "=", 'Solo Parent')->where("client_applications.application_status", "=", 'APPROVAL-APPROVED');
                }])->get();
                
         
                return view('pages/soloparentverification')->with(compact('clients'));
        
                
             }
   
   
             public function cardsoloparent()
             {

           

         
                $clients= Client::with("occupations","barangays","family_compositions","education","community_involvements","seminar_trainings")->whereHas("client_cards", function($subQuery) {
                    $subQuery->where("client_cards.card_status", "=", 'Active')->where("client_cards.card_type", "=", 'SOLO PARENT'); 
                })->with(["client_cards" => function($subQuery){
                    $subQuery->where("client_cards.card_status", "=", 'Active')->where("client_cards.card_type", "=", 'SOLO PARENT');
                }])->get();
            
              return view('pages/card/cardsoloparent')->with(compact('clients'));
         
                 
              }
      
   
             public function declinesenior()
             {

               
   
                $clients= Client::whereHas("client_applications.declined_clients", function($subQuery) {
                    $subQuery->where("client_type", "=", 'Senior'); 
                })->with(["client_applications.declined_clients" => function($subQuery){
                    $subQuery->where("client_type", "=", 'Senior');
                }])->get();
                
               
           
                 return view('pages/declined/declinedsenior')->with(compact('clients'));
         
                 
              }
   
              
   
              public function declinesoloparent()
              {
                
          
              
                $clients= Client::with("occupations","barangays","family_compositions","education","community_involvements","seminar_trainings")->whereHas("client_applications.declined_clients", function($subQuery) {
                    $subQuery->where("client_type", "=", 'Solo Parent'); 
                })->with(["client_applications.declined_clients" => function($subQuery){
                    $subQuery->where("client_type", "=", 'Solo Parent');
                }])->get();
                
                
             
                  return view('pages/declined/declinedsoloparent')->with(compact('clients'));
          
                  
               }
   
               public function declinepwd()
              {
                
          
               
                $clients= Client::with("occupations","barangays","identification_cards","physicians","disability_types","disability_causes","organizations","family_compositions")->whereHas("client_applications.declined_clients", function($subQuery) {
                    $subQuery->where("client_type", "=", 'PWD'); 
                })->with(["client_applications.declined_clients" => function($subQuery){
                    $subQuery->where("client_type", "=", 'PWD');
                }])->get();
                
         
                
               
                  return view('pages/declined/declinedpwd')->with(compact('clients'));
             
                  
                  
               }
   
               public function declinecitizen()
               {
                 
             
                $clients= Client::whereHas("client_applications.declined_clients", function($subQuery) {
                    $subQuery->where("client_type", "=", 'Citizen'); 
                })->with(["client_applications.declined_clients" => function($subQuery){
                    $subQuery->where("client_type", "=", 'Citizen');
                }])->get();
                
         
                
               
              
                   return view('pages/declined/declinedcitizen')->with(compact('clients'));
           
                   
                }
 

            


       public function citizencard()
       {
   
        $clients= Client::with("occupations","barangays")->whereHas("client_cards", function($subQuery) {
            $subQuery->where("client_cards.card_status", "=", 'Active')->where("client_cards.card_type", "=", 'Citizen'); 
        })->with(["client_cards" => function($subQuery){
            $subQuery->where("client_cards.card_status", "=", 'Active')->where("client_cards.card_type", "=", 'Citizen');
        }])->get();
    
      
           return view('pages/verifysenior')->with(compact('clients'));
   
           
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

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function slider()
    {
        return view('pages/slider');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function imageZoom()
    {
        return view('pages/image-zoom');
    }
}
