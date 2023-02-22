<?php

namespace App\Http\Controllers;
use App\Models\ClientApplicationRequirement;
use App\Helpers\Helper;
use App\Models\Barangay;
use App\Models\Client;
use App\Models\ClientUser;
use App\Models\ClientCard;
use App\Models\BenefitApplicationRequirement;
use Illuminate\Support\Facades\Session;
use App\Models\ClientType;
use App\Models\ClientBenefit;
use App\Models\Benefit;

use App\Models\ClientApplication;
use App\Models\BenefitApplication;
use App\Models\BenefitApplicationLog;

use App\Models\CommunityInvolvement;
use App\Models\DisabilityCause;
use App\Models\DisabilityType;
use App\Models\Education;
use App\Models\FamilyComposition;
use App\Models\IdentificationCard;
use App\Models\Occupation;
use App\Models\Organization;
use App\Models\Physician;
use App\Models\SeminarTraining;
use App\Models\User;

use App\Models\BenefitRequirement;
use App\Models\ClientSchedule;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Mail;

class BenefitApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function applybenefitform()
     {
         $barangaylist = Barangay::select('id', 'name')->get();
         return view('main/benefitapplication/loginbenefit', [
             // Specify the base layout.
             // Eg: 'side-menu', 'simple-menu', 'top-menu', 'login'
             // The default value is 'side-menu'
 
             // 'layout' => 'side-menu'
             ])->with(compact('barangaylist'));
     }
     public function storebenefitapplication(Request $request,$userid=null,$clienttype=null,$id=null)
   
     {
        $application_date= now()->toDateString('Ymd');
        $yearOnly=substr($application_date,0,4);
        $generator = Helper::IDGenerator(new BenefitApplication,'application_reference_number',9,'BID-'.$yearOnly,$yearOnly);
        $applicationsave = new BenefitApplication();
        $applicationsave->application_date= now()->toDateString('Y-m-d');
        $applicationsave->client_type = $clienttype;
        $applicationsave->application_Status = 'Applied';   
        $applicationsave->application_reference_number =$generator;
        $applicationsave->application_process = 'Online-Ongoing';
        $applicationsave->client_id =$userid;
        $applicationsave->benefit_id =$id;
        $applicationsave->client_card_id =$id;
        $applicationsave->save();

        $image =  $request->file('benefitrequirement');
        $reqname =  $request->input('reqname');
        foreach($image  as $key => $value) {     
            if($image!=null)
            {
                $string = str_replace(' ', '', $reqname[$key]);

                $folder = 'images/' . $string. '/';
                $filename = $string .  $userid . '.' . $image[$key]->getClientOriginalExtension();
                if (!File::exists($folder)) {
                    File::makeDirectory($folder, 0775, true, true);
                    $location = 'images/' . $string.'/' . $filename;
                    Image::make($image[$key])->resize(800,400)->save($location); //resizing and saving the image
                }
                if (File::exists($folder)) {
                 
                    $location = 'images/' . $string.'/' . $filename;
                    Image::make($image[$key])->resize(800,400)->save($location); //resizing and saving the image
                }
                
                $requirementsave = new BenefitApplicationRequirement();
                $requirementsave ->client_id = $userid;
                $requirementsave ->name = $reqname[$key];
                $requirementsave ->benefit_application_id = $applicationsave->id;
                $requirementsave ->filename =  $filename;
            
                $requirementsave->save();

            }
         
        
        }
     }
     public function userloginpage(Request $request)
     {  
       

      $barangaylist = Barangay::select('id', 'name')->get();
         return view('main/user/userlogin');
     }

     public function userlogin(Request $request)
     {  
        $userInfo = Client::where('email_address', '=', $request->input('email'))->first();
      
            if (!$userInfo) {
                return back()->with('fail', 'We do not recognize your email address');
            } else 
            {
             
                $request->session()->put('LoggedUser', $userInfo->id);
                $userpassword = ClientUser::where('client_id', '=', $userInfo->id)->first();
                $password=$request->input('password');
              
                if ($password == $userpassword->password) {
                    $userInfo = Client::where('email_address', '=', $request->input('email'))->first();
                    $data = ['LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first()];

                    $clientcard= ClientCard::where('client_id', '=', $userInfo->id)->get();
                    // $card_type= $clientcard->card_type;
                    // foreach($card_type  as $key => $value) {     
                    //     if($card_type!=null) 
                    //     {
                    //       $card_id=ClientType::where('name','=',$card_type);
                    //       $clientbenefits =ClientBenefit::where('client_type_id','=',$card_id->id);
                    //       foreach($clientbenefits  as $key => $value) {  
                    //             $benefitid=Benefit::where('id','=',$clientbenefits->benefit_id);

                    //       }


                    
                    //     }
                    //   }
                    Session::put('userid', $userInfo->id);
                    return view('main/user/dashboard', $data,[
                    ])->with(compact('userInfo'));
                    
                 }

                else
                {
                    return back()->with('fail', 'We do not recognize your email address');

                }
        }

     }

     public function dummyform()
     {
         $barangaylist = Barangay::select('id', 'name')->get();
         return view('main/benefitapplication/dummyform', [
       
             ])->with(compact('barangaylist'));
     }
    

    public function searchseniorcashincentivesform()
    {
        $barangaylist = Barangay::select('id', 'name')->get();
        return view('main/searchseniorbenefit/searchseniorcashincentivesform', [
   
            ])->with(compact('barangaylist'));
    }

    public function searchsenioroctogenarianform()
    {
        $barangaylist = Barangay::select('id', 'name')->get();
        return view('main/searchseniorbenefit/searchsenioroctogenarianform', [
     
            ])->with(compact('barangaylist'));
    }
    public function searchseniornonagenarianform()
    {
        $barangaylist = Barangay::select('id', 'name')->get();
        return view('main/searchseniorbenefit/searchseniornonagenarianform', [
            // Specify the base layout.
            // Eg: 'side-menu', 'simple-menu', 'top-menu', 'login'
            // The default value is 'side-menu'

            // 'layout' => 'side-menu'
            ])->with(compact('barangaylist'));
    }
    public function searchseniorcentenarianform()
    {

        $barangaylist = Barangay::select('id', 'name')->get();
        return view('main/searchseniorbenefit/searchseniorcentenarianform', [
            // Specify the base layout.
            // Eg: 'side-menu', 'simple-menu', 'top-menu', 'login'
            // The default value is 'side-menu'

            // 'layout' => 'side-menu'
            ])->with(compact('barangaylist'));
    }
    
    public function seniorcashincentivesform(Request $request)
    {
            $barangaylist = Barangay::select('id', 'name')->get();
            $client= Client::where('first_name','=',$request->input('firstname'))->where('last_name','=',$request->input('lastname'))->where('middle_name','=',$request->input('middlename'))->whereHas("client_cards", function($subQuery) use ($request)  {
                $subQuery->where("client_cards.card_number", "=", $request->input('number'))->where("client_cards.card_type", "=", 'Senior'); 
            })->with(["client_cards" => function($subQuery) use ($request){
                $subQuery->where("client_cards.card_number", "=", $request->input('number'))->where("client_cards.card_type", "=",'Senior'); 
            }])->first();

        if($client == null)
            {

                session_start();
                $_SESSION['fail'] ="fail";

                return redirect()->back()->with('fail');  
                exit;
            
            }

            else{
            
        
                $clientapplication= Client::where('id','=',$client->id)->whereHas("benefit_applications", function($subQuery) use ($request)  {
                    $subQuery->where("benefit_applications.application_type", "=", 'Senior')->where("benefit_applications.benefit_type", "=", 'Cash Incentives'); 
                })->with(["benefit_applications" => function($subQuery) use ($request){
                    $subQuery->where("benefit_applications.application_type", "=", 'Senior')->where("benefit_applications.benefit_type", "=",'Cash Incentives'); 
                }])->first();


                if($clientapplication == null)
            {

            
                return view('main/seniorbenefit/seniorcashincentivesform', [
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
    public function senioroctogenarianform(Request $request)
    {
                $barangaylist = Barangay::select('id', 'name')->get();
               
                $client= Client::where('first_name','=',$request->input('firstname'))->where('last_name','=',$request->input('lastname'))->where('middle_name','=',$request->input('middlename'))->whereHas("client_cards", function($subQuery) use ($request)  {
                    $subQuery->where("client_cards.card_number", "=", $request->input('number'))->where("client_cards.card_type", "=", 'Senior'); 
                })->with(["client_cards" => function($subQuery) use ($request){
                    $subQuery->where("client_cards.card_number", "=", $request->input('number'))->where("client_cards.card_type", "=",'Senior'); 
                }])->first();

            




            if($client == null)
                {

                
            
                    session_start();
                    $_SESSION['fail'] ="fail";

                    return redirect()->back()->with('fail');  
                    exit;
                
                }

                else{

                    $dob = Carbon::parse($client->birth_date);
                    $age = $dob->age;
                    

                    $clientapplication= Client::where('id','=',$client->id)->whereHas("benefit_applications", function($subQuery) use ($request)  {
                        $subQuery->where("benefit_applications.application_type", "=", 'Senior')->where("benefit_applications.benefit_type", "=", 'Octogenarian'); 
                    })->with(["benefit_applications" => function($subQuery) use ($request){
                        $subQuery->where("benefit_applications.application_type", "=", 'Senior')->where("benefit_applications.benefit_type", "=",'Octogenarian'); 
                    }])->first();
                  
                    if($clientapplication == null && $age >= 80)
                {
                
                
                    return view('main/seniorbenefit/senioroctogenarianform', [
                        // Specify the base layout.
                        // Eg: 'side-menu', 'simple-menu', 'top-menu', 'login'
                        // The default value is 'side-menu'
            
                        // 'layout' => 'side-menu'
                        ])->with(compact('client','barangaylist'));

                }
                elseif ($clientapplication == null && $age < 80)
                {

                
                    session_start();
                    $_SESSION['fail'] ="fail";

                    return redirect()->back()->with('fail');  
                    exit;
                
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
    public function seniornonagenarianform(Request $request)
    {
                $barangaylist = Barangay::select('id', 'name')->get();
                $client= Client::where('first_name','=',$request->input('firstname'))->where('last_name','=',$request->input('lastname'))->where('middle_name','=',$request->input('middlename'))->whereHas("client_cards", function($subQuery) use ($request)  {
                    $subQuery->where("client_cards.card_number", "=", $request->input('number'))->where("client_cards.card_type", "=", 'Senior'); 
                })->with(["client_cards" => function($subQuery) use ($request){
                    $subQuery->where("client_cards.card_number", "=", $request->input('number'))->where("client_cards.card_type", "=",'Senior'); 
                }])->first();

            




                if($client == null)
                {

                
            
                    session_start();
                    $_SESSION['fail'] ="fail";

                    return redirect()->back()->with('fail');  
                    exit;
                
                }

                else{

                    $dob = Carbon::parse($client->birth_date);
                    $age = $dob->age;
                    
                    $clientapplication= Client::where('id','=',$client->id)->whereHas("benefit_applications", function($subQuery) use ($request)  {
                        $subQuery->where("benefit_applications.application_type", "=", 'Senior')->where("benefit_applications.benefit_type", "=", 'Nonagenarian'); 
                    })->with(["benefit_applications" => function($subQuery) use ($request){
                        $subQuery->where("benefit_applications.application_type", "=", 'Senior')->where("benefit_applications.benefit_type", "=",'Nonagenarian'); 
                    }])->first();
                  

                    if($clientapplication == null && $age >= 90)
                {
                
                    
                    return view('main/seniorbenefit/seniornonagenarianform', [
                        // Specify the base layout.
                        // Eg: 'side-menu', 'simple-menu', 'top-menu', 'login'
                        // The default value is 'side-menu'
            
                        // 'layout' => 'side-menu'
                        ])->with(compact('client','barangaylist'));

                }
                elseif ($clientapplication == null && $age < 90)
                {

                
                    session_start();
                    $_SESSION['fail'] ="fail";

                    return redirect()->back()->with('fail');  
                    exit;
                
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
    public function seniorcentenarianform(Request $request)
    {
            $barangaylist = Barangay::select('id', 'name')->get();
            $client= Client::where('first_name','=',$request->input('firstname'))->where('last_name','=',$request->input('lastname'))->where('middle_name','=',$request->input('middlename'))->whereHas("client_cards", function($subQuery) use ($request)  {
                $subQuery->where("client_cards.card_number", "=", $request->input('number'))->where("client_cards.card_type", "=", 'Senior'); 
            })->with(["client_cards" => function($subQuery) use ($request){
                $subQuery->where("client_cards.card_number", "=", $request->input('number'))->where("client_cards.card_type", "=",'Senior'); 
            }])->first();


        




            if($client == null)
            {

            
        
                session_start();
                $_SESSION['fail'] ="fail";

                return redirect()->back()->with('fail');  
                exit;
            
            }

            else{

                $dob = Carbon::parse($client->birth_date);
                $age = $dob->age;
                $clientapplication= Client::where('id','=',$client->id)->whereHas("benefit_applications", function($subQuery) use ($request)  {
                    $subQuery->where("benefit_applications.application_type", "=", 'Senior')->where("benefit_applications.benefit_type", "=", 'Centenarian'); 
                })->with(["benefit_applications" => function($subQuery) use ($request){
                    $subQuery->where("benefit_applications.application_type", "=", 'Senior')->where("benefit_applications.benefit_type", "=",'Centenarian'); 
                }])->first();

            
                if($clientapplication == null && $age >= 100)
            {
            

            
                return view('main/seniorbenefit/seniorcentenarianform', [
                    // Specify the base layout.
                    // Eg: 'side-menu', 'simple-menu', 'top-menu', 'login'
                    // The default value is 'side-menu'
        
                    // 'layout' => 'side-menu'
                    ])->with(compact('client','barangaylist'));

            }
            elseif ($clientapplication == null && $age < 100)
            {

            
                session_start();
                $_SESSION['fail'] ="fail";

                return redirect()->back()->with('fail');  
                exit;
            
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


    public function createseniorcashincentives(Request $request)
    {
       
     
       
        $latestreferencenumber = BenefitApplication::where('id','DESC')->first();
        $dob = Carbon::parse($request->input('birthdate'))->format('Y-m-d');
      
          
        $clientid =  $request->input('clientid');
        $cardid =  $request->input('cardid');
        $application_date= now()->toDateString('Ymd');
        $yearOnly=substr($application_date,0,4);
        $generator = Helper::IDGenerator(new ClientApplication,'application_reference_number',9,'BSCI-'.$yearOnly,$yearOnly);
            $applicationsave = new BenefitApplication();
        
            $applicationsave->application_date= now()->toDateString('Y-m-d');;
            $applicationsave->application_type = 'Senior';
            $applicationsave->benefit_type = 'Cash Incentives';
            $applicationsave->application_Status = 'Applied';
                  
                        $applicationsave->application_reference_number = $generator;
                    
        
            $applicationsave->application_process = 'Online-Ongoing';
            $applicationsave->client_card_id =$cardid;
            $applicationsave->save();


            session_start();
            $_SESSION['success'] ="success";

            return view('main/landing', [
                // Specify the base layout.
                // Eg: 'side-menu', 'simple-menu', 'top-menu', 'login'
                // The default value is 'side-menu'
    
                // 'layout' => 'side-menu'
                ])->with('success');
            
           


         
          

        
    }

    
    public function createsenioroctogenarian(Request $request)
    {
       
     
       
        $latestreferencenumber = BenefitApplication::where('id','DESC')->first();
        $dob = Carbon::parse($request->input('birthdate'))->format('Y-m-d');
      
          
       
        $clientid =  $request->input('clientid');
        $cardid =  $request->input('cardid');
        $application_date= now()->toDateString('Ymd');
        $yearOnly=substr($application_date,0,4);
        $generator = Helper::IDGenerator(new ClientApplication,'application_reference_number',9,'BSO-'.$yearOnly,$yearOnly);
            $applicationsave = new BenefitApplication();
        
            $applicationsave->application_date= now()->toDateString('Y-m-d');;
            $applicationsave->application_type = 'Senior';
            $applicationsave->benefit_type = 'Octogenarian';
            $applicationsave->application_Status = 'Applied';
                   
            $applicationsave->application_reference_number =  $generator;
                    
        
            $applicationsave->application_process = 'Online-Ongoing';
            $applicationsave->client_card_id =$cardid;
            $applicationsave->save();




            session_start();
            $_SESSION['success'] ="success";
            return view('main/landing', [
                // Specify the base layout.
                // Eg: 'side-menu', 'simple-menu', 'top-menu', 'login'
                // The default value is 'side-menu'
    
                // 'layout' => 'side-menu'
                ])->with('success');
            
           


         
          

        
    }
    
    public function createseniornonagenarian(Request $request)
    {
       
     
       
        $latestreferencenumber = BenefitApplication::where('id','DESC')->first();
        $dob = Carbon::parse($request->input('birthdate'))->format('Y-m-d');
      
          
       
        $clientid =  $request->input('clientid');
        $cardid =  $request->input('cardid');
        $application_date= now()->toDateString('Ymd');
        $yearOnly=substr($application_date,0,4);
        $generator = Helper::IDGenerator(new ClientApplication,'application_reference_number',9,'BSN-'.$yearOnly,$yearOnly);
            $applicationsave = new BenefitApplication();
        
            $applicationsave->application_date= now()->toDateString('Y-m-d');;
            $applicationsave->application_type = 'Senior';
            $applicationsave->benefit_type = 'Nonagenarian';
            $applicationsave->application_Status = 'Applied';
                  
            $applicationsave->application_reference_number = $generator;
                    
        
            $applicationsave->application_process = 'Online-Ongoing';
            $applicationsave->client_card_id =$cardid;
            $applicationsave->save();


         

            session_start();
            $_SESSION['success'] ="success";
            return view('main/landing', [
                // Specify the base layout.
                // Eg: 'side-menu', 'simple-menu', 'top-menu', 'login'
                // The default value is 'side-menu'
    
                // 'layout' => 'side-menu'
                ])->with('success');
            
           


         
          

        
    }

    public function createseniorcentenarian(Request $request)
    {
       
     
       
        $latestreferencenumber = BenefitApplication::where('id','DESC')->first();
        $dob = Carbon::parse($request->input('birthdate'))->format('Y-m-d');
      
          
      
        $clientid =  $request->input('clientid');
        $cardid =  $request->input('cardid');
        $application_date= now()->toDateString('Ymd');
        $yearOnly=substr($application_date,0,4);
        $generator = Helper::IDGenerator(new ClientApplication,'application_reference_number',9,'BSC-'.$yearOnly,$yearOnly);
            $applicationsave = new BenefitApplication();
        
            $applicationsave->application_date= now()->toDateString('Y-m-d');;
            $applicationsave->application_type = 'Senior';
            $applicationsave->benefit_type = 'Centenarian';
            $applicationsave->application_Status = 'Applied';
                  
                        $applicationsave->application_reference_number = $generator;
                    
        
            $applicationsave->application_process = 'Online-Ongoing';
            $applicationsave->client_card_id =$cardid;
            $applicationsave->save();






          
            session_start();
            $_SESSION['success'] ="success";

            return view('main/landing', [
                // Specify the base layout.
                // Eg: 'side-menu', 'simple-menu', 'top-menu', 'login'
                // The default value is 'side-menu'
    
                // 'layout' => 'side-menu'
                ])->with('success');
            
           


         
          

        
    }


    public function evaluateseniorbenefit($clientid = null,$applicationid=null,$benefittype)
    {
       
       
        $applicationlogsave = new BenefitApplicationLog();
     
        $applicationlogsave->process_name = 'Evaluation-Approved';
        $applicationlogsave->date= now()->toDateString('Y-m-d');
        $applicationlogsave->client_card_id = $clientid;

        
        $applicationlogsave->benefit_application_id = $applicationid;
     
        $applicationlogsave->save();

        BenefitApplication::where('id',$applicationid)->where('application_type','=','Senior')->where('benefit_type','=',$benefittype)->update(['application_status'=>'EVALUATED-APPROVED']);


       
        session_start();
        $_SESSION['success'] ="success";
       
     
        
        return redirect()->back()->with('success');  
        exit;
    }
    
    public function approveseniorbenefit(Request $request,$clientid = null,$applicationid=null)
    {
        
        $schedule = Carbon::parse($request->input('schedule'))->format('Y-m-d');
        // $applicationlogsave = new BenefitApplicationLog();
     
        // $applicationlogsave->process_name = 'Approval-Approved';
        // $applicationlogsave->date= now()->toDateString('Y-m-d');;
        // $applicationlogsave->client_card_id = $clientid;

        
        // $applicationlogsave->benefit_application_id = $applicationid;
     
        // $applicationlogsave->save();

        // $clientschedulesave = new ClientSchedule();
     
        // $clientschedulesave->date = $schedule;
        // $clientschedulesave->date_created= now()->toDateString('Y-m-d');
        // $clientschedulesave->client_application_id = $applicationid;
     
        // $clientschedulesave->save();

        $clientdetails=Client::where('id',$clientid)->first();

        BenefitApplication::where('id',$applicationid)->where('application_type','=','Senior')->update(['application_status'=>'APPROVAL-APPROVED']);
        $details = [
            'title' => 'Mail from City Social Welfare and Development',
            'body' => 'You are scheduled on'

        ];
        // Mail::to($clientdetails->email_address)->send(new ScheduleMail($details, $clientschedulesave, $clientdetails));

       
     
        session_start();
        $_SESSION['success'] ="success";
      
     
        return redirect()->back()->with('success');  
        exit;
    }

    public function verifyseniorbenefit(Request $request,$clientid = null,$applicationid=null)
    {
       
    
        // $applicationlogsave = new BenefitApplicationLog();
     
        // $applicationlogsave->process_name = 'Verification-Approved';
        // $applicationlogsave->date= now()->toDateString('Y-m-d');
        // $applicationlogsave->client_card_id = $clientid;

        
        // $applicationlogsave->benefit_application_id = $applicationid;
        // $applicationlogsave->save();

        // $clientcardsave = new ClientCard();
     
        // $clientcardsave->card_status = 'Active';
        // $clientcardsave->card_type = 'Senior';
        // $clientcardsave->client_application_id = $applicationid;
        // $clientcardsave->client_id = $clientid;

     
        // $clientcardsave->save();

        BenefitApplication::where('id',$applicationid)->where('application_type','=','Senior')->update(['application_status'=>'VERIFY-RELEASED','application_process'=>'Online-Registered']);


       
        session_start();
        $_SESSION['success'] ="success";
      
     
        
        return redirect()->back()->with('success');  
        exit;
    }


    public function searchpwdcashincentivesform()
    {
        $barangaylist = Barangay::select('id', 'name')->get();
        return view('main/searchpwdbenefit/searchpwdcashincentivesform', [
            // Specify the base layout.
            // Eg: 'side-menu', 'simple-menu', 'top-menu', 'login'
            // The default value is 'side-menu'

            // 'layout' => 'side-menu'
            ])->with(compact('barangaylist'));
    }

    public function pwdcashincentivesform(Request $request)
    {
        $barangaylist = Barangay::select('id', 'name')->get();
    
        $client= Client::where('first_name','=',$request->input('firstname'))->where('last_name','=',$request->input('lastname'))->where('middle_name','=',$request->input('middlename'))->whereHas("client_cards", function($subQuery) use ($request)  {
            $subQuery->where("client_cards.card_number", "=", $request->input('number'))->where("client_cards.card_type", "=", 'PWD'); 
        })->with(["client_cards" => function($subQuery) use ($request){
            $subQuery->where("client_cards.card_number", "=", $request->input('number'))->where("client_cards.card_type", "=",'PWD'); 
        }])->first();


        


        


       




            if($client == null)
                {

                
            
                    session_start();
                    $_SESSION['fail'] ="fail";

                    return redirect()->back()->with('fail');  
                    exit;
                
                }

                else{
                
            
                 

                    $clientapplication= Client::where('id','=',$client->id)->whereHas("benefit_applications", function($subQuery) use ($request)  {
                        $subQuery->where("benefit_applications.application_type", "=", 'PWD')->where("benefit_applications.benefit_type", "=", 'Cash Incentives'); 
                    })->with(["benefit_applications" => function($subQuery) use ($request){
                        $subQuery->where("benefit_applications.application_type", "=", 'PWD')->where("benefit_applications.benefit_type", "=",'Cash Incentives'); 
                    }])->first();

                    if($clientapplication == null)
                {

                
                    return view('main/pwdbenefit/pwdcashincentivesform', [
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

    public function createpwdcashincentives(Request $request)
    {
       
     
       
        $latestreferencenumber = BenefitApplication::where('id','DESC')->first();
        $dob = Carbon::parse($request->input('birthdate'))->format('Y-m-d');
      
          
        $clientid =  $request->input('clientid');
        $cardid =  $request->input('cardid');
        $application_date= now()->toDateString('Ymd');
        $yearOnly=substr($application_date,0,4);
        $generator = Helper::IDGenerator(new ClientApplication,'application_reference_number',9,'BPCI-'.$yearOnly,$yearOnly);
            $applicationsave = new BenefitApplication();
        
            $applicationsave->application_date= now()->toDateString('Y-m-d');;
            $applicationsave->application_type = 'PWD';
            $applicationsave->benefit_type = 'Cash Incentives';
            $applicationsave->application_Status = 'Applied';
                 
                        $applicationsave->application_reference_number = $generator;
                    
        
            $applicationsave->application_process = 'Online-Ongoing';
            $applicationsave->client_card_id =$cardid;
            $applicationsave->save();



            session_start();
            $_SESSION['success'] ="success";
            return view('main/landing', [
                // Specify the base layout.
                // Eg: 'side-menu', 'simple-menu', 'top-menu', 'login'
                // The default value is 'side-menu'
    
                // 'layout' => 'side-menu'
                ])->with('success');
            
           


         
          

        
    }


    public function trackcardapplication(Request $request)
    {
            $barangaylist = Barangay::select('id', 'name')->get();
            $client= Client::where('first_name','=',$request->input('firstname'))->where('last_name','=',$request->input('lastname'))->where('middle_name','=',$request->input('middlename'))->whereHas("client_applications", function($subQuery) use ($request)  {
                $subQuery->where("client_applications.application_reference_number", "=", $request->input('number')); 
            })->with(["client_applications" => function($subQuery) use ($request){
                $subQuery->where("client_applications.application_reference_number", "=", $request->input('number')); 
            }])->first();
          
        if($client == null)
            {

                session_start();
                $_SESSION['fail'] ="fail";

                return redirect()->back()->with('fail');  
                exit;
            
            }

            else{
            
        

            
                return view('main/track/trackcardapplicationform', [
                    // Specify the base layout.
                    // Eg: 'side-menu', 'simple-menu', 'top-menu', 'login'
                    // The default value is 'side-menu'
        
                    // 'layout' => 'side-menu'
                    ])->with(compact('client','barangaylist'));

        }
    }

    public function trackbenefitapplication(Request $request)
    {
            $barangaylist = Barangay::select('id', 'name')->get();
            $client= Client::where('first_name','=',$request->input('firstname'))->where('last_name','=',$request->input('lastname'))->where('middle_name','=',$request->input('middlename'))->whereHas("benefit_applications", function($subQuery) use ($request)  {
                $subQuery->where("benefit_applications.application_reference_number", "=", $request->input('number')); 
            })->with(["benefit_applications" => function($subQuery) use ($request){
                $subQuery->where("benefit_applications.application_reference_number", "=", $request->input('number')); 
            }])->first();

        if($client == null)
            {

                session_start();
                $_SESSION['fail'] ="fail";

                return redirect()->back()->with('fail');  
                exit;
            
            }

            else{
            
        

          

            
                return view('main/track/trackbenefitapplicationform', [
                    // Specify the base layout.
                    // Eg: 'side-menu', 'simple-menu', 'top-menu', 'login'
                    // The default value is 'side-menu'
        
                    // 'layout' => 'side-menu'
                    ])->with(compact('client','barangaylist'));

          
        }
    }
    public function updatecardapplication(Request $request)
    {
            $barangaylist = Barangay::select('id', 'name')->get();
           

          
      
         
        if($request->input('type') == 'Citizen' )
        {
            $client= Client::with("occupations","barangays","client_applications","client_application_requirements")->where('first_name','=',$request->input('firstname'))->where('last_name','=',$request->input('lastname'))->where('middle_name','=',$request->input('middlename'))->whereHas("client_applications", function($subQuery) use ($request)  {
                $subQuery->where("client_applications.application_reference_number", "=", $request->input('number')); 
            })->with(["client_applications" => function($subQuery) use ($request){
                $subQuery->where("client_applications.application_reference_number", "=", $request->input('number')); 
            }])
            ->first();

            // $app=$client1->client_application_id;
              
            // $clients = $client1->whereHas("client_application_requirements", function($subQuery) use ($app)  {
            //     $subQuery->where("client_application_requirements.client_application_id", "=", $app); 
            // })->with(["client_application_requirements" => function($subQuery) use ($app){
            //     $subQuery->where("client_application_requirements.client_application_id", "=", $app); 
            // }])->first();;

          

              
            return view('main/track/updatecitizencardapplication', [
             
                ])->with(compact('barangaylist','client'));
        }
        elseif($request->input('type') == 'Senior')

        
        {
                    $client= Client::with("occupations","barangays","client_applications","client_application_requirements")->where('first_name','=',$request->input('firstname'))->where('last_name','=',$request->input('lastname'))->where('middle_name','=',$request->input('middlename'))->whereHas("client_applications", function($subQuery) use ($request)  {
                        $subQuery->where("client_applications.application_reference_number", "=", $request->input('number')); 
                    })->with(["client_applications" => function($subQuery) use ($request){
                        $subQuery->where("client_applications.application_reference_number", "=", $request->input('number')); 
                    }])->first();

                    // $app=$client1->client_application_id;
                  
                    // $client = $client1->whereHas("client_application_requirements", function($subQuery) use ($app)  {
                    //     $subQuery->where("client_application_requirements.client_application_id", "=", $app); 
                    // })->with(["client_application_requirements" => function($subQuery) use ($app){
                    //     $subQuery->where("client_application_requirements.client_application_id", "=", $app); 
                    // }])->first();;
                   
                    return view('main/track/updateseniorcardapplication', [
                    
                        ])->with(compact('client','barangaylist'));
        }
        elseif($request->input('type') == 'PWD')


        {
            
            $client= Client::with("occupations","barangays","identification_cards","physicians","disability_types","disability_causes","organizations","family_compositions","client_applications","client_application_requirements")->where('first_name','=',$request->input('firstname'))->where('last_name','=',$request->input('lastname'))->where('middle_name','=',$request->input('middlename'))->whereHas("client_applications", function($subQuery) use ($request)  {
                $subQuery->where("client_applications.application_reference_number", "=", $request->input('number')); 
            })->with(["client_applications" => function($subQuery) use ($request){
                $subQuery->where("client_applications.application_reference_number", "=", $request->input('number')); 
            }])->first();

        //    $app=$client1->client_application_id;
            
        //     $client = $client1->whereHas("client_application_requirements", function($subQuery) use ($app)  {
        //         $subQuery->where("client_application_requirements.client_application_id", "=", $app); 
        //     })->with(["client_application_requirements" => function($subQuery) use ($app){
        //         $subQuery->where("client_application_requirements.client_application_id", "=", $app); 
        //     }])->first();
            
            return view('main/track/updatepwdcardapplication', [
             
                ])->with(compact('client','barangaylist'));
        }
        else
        {
            $client= Client::with("occupations","barangays","family_compositions","education","community_involvements","seminar_trainings","client_applications","client_application_requirements")->where('first_name','=',$request->input('firstname'))->where('last_name','=',$request->input('lastname'))->where('middle_name','=',$request->input('middlename'))->whereHas("client_applications", function($subQuery) use ($request)  {
                $subQuery->where("client_applications.application_reference_number", "=", $request->input('number')); 
            })->with(["client_applications" => function($subQuery) use ($request){
                $subQuery->where("client_applications.application_reference_number", "=", $request->input('number')); 
            }])->first();

            // $app=$client1->client_application_id;
            
            // $client = $client1->whereHas("client_application_requirements", function($subQuery) use ($app)  {
            //     $subQuery->where("client_application_requirements.client_application_id", "=", $app); 
            // })->with(["client_application_requirements" => function($subQuery) use ($app){
            //     $subQuery->where("client_application_requirements.client_application_id", "=", $app); 
            // }])->first();;
            
            return view('main/track/updatesoloparentcardapplication', [
             
                ])->with(compact('barangaylist','client'));

        }

    }

    public function updatebenefitapplication(Request $request)
    {
            $barangaylist = Barangay::select('id', 'name')->get();

          
            if($request->input('type') == 'Citizen' )
            {
                $client= Client::with("occupations","barangays","client_applications")->where('first_name','=',$request->input('firstname'))->where('last_name','=',$request->input('lastname'))->where('middle_name','=',$request->input('middlename'))->whereHas("benefit_applications", function($subQuery) use ($request)  {
                    $subQuery->where("benefit_applications.application_reference_number", "=", $request->input('number')); 
                })->with(["benefit_applications" => function($subQuery) use ($request){
                    $subQuery->where("benefit_applications.application_reference_number", "=", $request->input('number')); 
                }])
                ->first();
    
                foreach ($client->benefit_applications as $app) {
                   
                }
                  
                $clients = $client->whereHas("client_application_requirements", function($subQuery) use ($app)  {
                    $subQuery->where("client_application_requirements.client_application_id", "=", $app->id); 
                })->with(["client_application_requirements" => function($subQuery) use ($app){
                    $subQuery->where("client_application_requirements.client_application_id", "=", $app->id); 
                }])->first();;
                
             
    
                  
                return view('main/track/updatecitizencardapplication', [
                 
                    ])->with(compact('client','clients','barangaylist'));
            }
            elseif($request->input('type') == 'Senior')
            {
                        $client= Client::with("occupations","barangays","client_applications")->where('first_name','=',$request->input('firstname'))->where('last_name','=',$request->input('lastname'))->where('middle_name','=',$request->input('middlename'))->whereHas("benefit_applications", function($subQuery) use ($request)  {
                            $subQuery->where("benefit_applications.application_reference_number", "=", $request->input('number')); 
                        })->with(["benefit_applications" => function($subQuery) use ($request){
                            $subQuery->where("benefit_applications.application_reference_number", "=", $request->input('number')); 
                        }])->first();
    
                        foreach ($client->benefit_applications as $app) {
                        
                        }
                        
                        $client = $client->whereHas("client_application_requirements", function($subQuery) use ($app)  {
                            $subQuery->where("client_application_requirements.client_application_id", "=", $app->id); 
                        })->with(["client_application_requirements" => function($subQuery) use ($app){
                            $subQuery->where("client_application_requirements.client_application_id", "=", $app->id); 
                        }])->first();;
                        
                        return view('main/track/updateseniorcardapplication', [
                        
                            ])->with(compact('client','barangaylist'));
            }
            elseif($request->input('type') == 'PWD')
    
    
            {
                
                $client= Client::with("occupations","barangays","identification_cards","physicians","disability_types","disability_causes","organizations","family_compositions","client_applications")->where('first_name','=',$request->input('firstname'))->where('last_name','=',$request->input('lastname'))->where('middle_name','=',$request->input('middlename'))->whereHas("benefit_applications", function($subQuery) use ($request)  {
                    $subQuery->where("benefit_applications.application_reference_number", "=", $request->input('number')); 
                })->with(["benefit_applications" => function($subQuery) use ($request){
                    $subQuery->where("benefit_applications.application_reference_number", "=", $request->input('number')); 
                }])->first();
    
                foreach ($client->benefit_applications as $app) {
                    
                }
                
                $client = $client->whereHas("client_application_requirements", function($subQuery) use ($app)  {
                    $subQuery->where("client_application_requirements.client_application_id", "=", $app->id); 
                })->with(["client_application_requirements" => function($subQuery) use ($app){
                    $subQuery->where("client_application_requirements.client_application_id", "=", $app->id); 
                }])->first();;
                
                return view('main/track/updatepwdcardapplication', [
                 
                    ])->with(compact('client','barangaylist'));
            }
            else
            {
                $client= Client::with("occupations","barangays","family_compositions","education","community_involvements","seminar_trainings","client_applications")->where('first_name','=',$request->input('firstname'))->where('last_name','=',$request->input('lastname'))->where('middle_name','=',$request->input('middlename'))->whereHas("benefit_applications", function($subQuery) use ($request)  {
                    $subQuery->where("benefit_applications.application_reference_number", "=", $request->input('number')); 
                })->with(["benefit_applications" => function($subQuery) use ($request){
                    $subQuery->where("benefit_applications.application_reference_number", "=", $request->input('number')); 
                }])->first();
    
                foreach ($client->benefit_applications as $app) {
                    
                }
                
                $client = $client->whereHas("client_application_requirements", function($subQuery) use ($app)  {
                    $subQuery->where("client_application_requirements.client_application_id", "=", $app->id); 
                })->with(["client_application_requirements" => function($subQuery) use ($app){
                    $subQuery->where("client_application_requirements.client_application_id", "=", $app->id); 
                }])->first();;
                
                return view('main/track/updatesoloparentcardapplication', [
                 
                    ])->with(compact('client','barangaylist'));
    
            }
    
    }

    public function updateclientcardapplication(Request $request)
    {
            $barangaylist = Barangay::select('id', 'name')->get();
           
            $dob = Carbon::parse($request->input('birthdate'))->format('Y-m-d');

            // $client= Client::with("occupations","barangays")->where('first_name','=',$request->input('firstname'))->where('last_name','=',$request->input('lastname'))->where('middle_name','=',$request->input('middlename'))->whereHas("client_applications", function($subQuery) use ($request)  {
            //     $subQuery->where("client_applications.application_reference_number", "=", $request->input('number')); 
            // })->with(["client_applications" => function($subQuery) use ($request){
            //     $subQuery->where("client_applications.application_reference_number", "=", $request->input('number')); 
            // }])
            // ->first();
              
            Client::where('id',$request->input('clientid'))->update(['first_name'=> $request->input('firstname'),'last_name' => $request->input('lastname'),'middle_name' => $request->input('middlename')
            ,'extension_name' =>  $request->input('extensionname'),'sex' =>  $request->input('gender'),'blood_type' =>  $request->input('bloodtype'),'civil_status' =>  $request->input('civilstatus')
            ,'nationality' =>  $request->input('nationality'),'religion' =>  $request->input('religion'),'birth_date' =>  $dob,'birth_place' =>   $request->input('birthplace')
            ,'email_address' =>  $request->input('emailaddress'),'contact_number' => $request->input('mobilenumber'),'landline_number' =>  $request->input('landlinenumber'),'street' =>  $request->input('street')
            ,'barangay_id' => $request->input('barangay'),'municipality' =>  $request->input('city'),'province' =>  $request->input('province'),'region' =>  $request->input('region')
            ,'skills_talents' =>  $request->input('skill'),'hobbies' => $request->input('hobbies'),'educational_attainment' =>  $request->input('educationalattainment')]);
            // foreach ($client->client_applications as $app) {
                    
         ClientApplication::where('id',$request->input('appid'))->update(['application_status'=>'Applied']);
         Occupation::where('client_id',$request->input('clientid'))->update(['employment_status'=> $request->input('employmentstatus'),'employment_type'=> $request->input('employmenttype'),'employment_category'=> $request->input('employmentcategory'),'occupation'=> $request->input('occupation'),'salary'=> $request->input('salary')]);
           
            


            if ($request->hasFile('imagebirth')) {
                $image_tmp = $request->file('imagebirth');
                if ($image_tmp->isValid()) {
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = $request['lastname']  .  $request->input('clientid')  . 'senior.' . $extension;
                    File::delete(public_path('images/birth/'.$filename));
                    $large_image_path = 'images/birth/' . $filename;
                    Image::make($image_tmp)->save($large_image_path);

                    // Store image name in products table
                    $requirementsave = new ClientApplicationRequirement();
        
                    $requirementsave->name = 'Birth Certificate';
                    $requirementsave->filename = $filename;
                    $requirementsave->client_application_id =$request->input('appid');
                    $requirementsave->save();
                    
                }
            }

            if ($request->hasFile('imagebarangay')) {
                $image_tmp = $request->file('imagebarangay');
                if ($image_tmp->isValid()) {
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = $request['lastname']  .  $request->input('clientid')  . 'senior.' . $extension;
                    File::delete(public_path('images/barangay/'.$filename));
                    $large_image_path = 'images/barangay/' . $filename;
                    Image::make($image_tmp)->save($large_image_path);

                    // Store image name in pevaluroducts table
                    $requirementsave = new ClientApplicationRequirement();
        
                    $requirementsave->name = 'Barangay Certificate';
                    $requirementsave->filename = $filename;
                    $requirementsave->client_application_id =$request->input('appid');
                    $requirementsave->save();
                    
                }
            }

            if ($request->hasFile('imagepicture')) {
                $image_tmp = $request->file('imagepicture');
                if ($image_tmp->isValid()) {
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = $request['lastname']  .  $request->input('clientid')  . 'senior.' . $extension;
                    File::delete(public_path('images/picture/'.$filename));
                    $large_image_path = 'images/picture/' . $filename;
                    Image::make($image_tmp)->save($large_image_path);
                
                    // Store image name in products table
                    $requirementsave = new ClientApplicationRequirement();
        
                    $requirementsave->name = 'Picture';
                    $requirementsave->filename = $filename;
                    $requirementsave->client_application_id =$request->input('appid');
                    $requirementsave->save();
                    
                }

            }






              
            session_start();
            $_SESSION['success'] ="success";
           
         
            return view('main/landing', [
                // Specify the base layout.
                // Eg: 'side-menu', 'simple-menu', 'top-menu', 'login'
                // The default value is 'side-menu'
    
                // 'layout' => 'side-menu'
            ])->with('success');
         
            
            exit;
            // return view('main/landing', [
             
            //     ])->with(compact('barangaylist'));
   
    }

    
    public function updateseniorcardapplication(Request $request)
    {
            $barangaylist = Barangay::select('id', 'name')->get();
           
            $dob = Carbon::parse($request->input('birthdate'))->format('Y-m-d');

            // $client= Client::with("occupations","barangays")->where('first_name','=',$request->input('firstname'))->where('last_name','=',$request->input('lastname'))->where('middle_name','=',$request->input('middlename'))->whereHas("client_applications", function($subQuery) use ($request)  {
            //     $subQuery->where("client_applications.application_reference_number", "=", $request->input('number')); 
            // })->with(["client_applications" => function($subQuery) use ($request){
            //     $subQuery->where("client_applications.application_reference_number", "=", $request->input('number')); 
            // }])
            // ->first();
              
            Client::where('id',$request->input('clientid'))->update(['first_name'=> $request->input('firstname'),'last_name' => $request->input('lastname'),'middle_name' => $request->input('middlename')
            ,'extension_name' =>  $request->input('extensionname'),'sex' =>  $request->input('gender'),'blood_type' =>  $request->input('bloodtype'),'civil_status' =>  $request->input('civilstatus')
            ,'nationality' =>  $request->input('nationality'),'religion' =>  $request->input('religion'),'birth_date' =>  $dob,'birth_place' =>   $request->input('birthplace')
            ,'email_address' =>  $request->input('emailaddress'),'contact_number' => $request->input('mobilenumber'),'landline_number' =>  $request->input('landlinenumber'),'street' =>  $request->input('street')
            ,'barangay_id' => $request->input('barangay'),'municipality' =>  $request->input('city'),'province' =>  $request->input('province'),'region' =>  $request->input('region')
            ,'skills_talents' =>  $request->input('skill'),'hobbies' => $request->input('hobbies'),'educational_attainment' =>  $request->input('educationalattainment')]);
            // foreach ($client->client_applications as $app) {
                    
        
         ClientApplication::where('id',$request->input('appid'))->update(['application_status'=>'Applied']);
         Occupation::where('client_id',$request->input('clientid'))->update(['employment_status'=> $request->input('employmentstatus'),'employment_type'=> $request->input('employmenttype'),'employment_category'=> $request->input('employmentcategory'),'occupation'=> $request->input('occupation'),'salary'=> $request->input('salary')]);
        

     


            if ($request->hasFile('imagebirth')) {
                $image_tmp = $request->file('imagebirth');
                if ($image_tmp->isValid()) {
                    ClientApplicationRequirement::where('client_application_id',$request->input('appid'))->where('name','=','Birth Certificate')->delete();
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = $request['lastname']  .  $request->input('clientid')  . 'senior.' . $extension;
                    File::delete(public_path('images/birth/'.$filename));
                    $large_image_path = 'images/birth/' . $filename;
                    Image::make($image_tmp)->save($large_image_path);

                    // Store image name in products table
                    $requirementsave = new ClientApplicationRequirement();
        
                    $requirementsave->name = 'Birth Certificate';
                    $requirementsave->filename = $filename;
                    $requirementsave->client_application_id =$request->input('appid');
                    $requirementsave->save();
                    
                }
            }

            if ($request->hasFile('imagebarangay')) {
                $image_tmp = $request->file('imagebarangay');
                if ($image_tmp->isValid()) {
                    ClientApplicationRequirement::where('client_application_id',$request->input('appid'))->where('name','=','Barangay Certificate')->delete();
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = $request['lastname']  .  $request->input('clientid')  . 'senior.' . $extension;
                    File::delete(public_path('images/barangay/' .$filename));
                    $large_image_path = 'images/barangay/' . $filename;
                    Image::make($image_tmp)->save($large_image_path);

                    // Store image name in pevaluroducts table
                    $requirementsave = new ClientApplicationRequirement();
        
                    $requirementsave->name = 'Barangay Certificate';
                    $requirementsave->filename = $filename;
                    $requirementsave->client_application_id =$request->input('appid');
                    $requirementsave->save();
                    
                }
            }

            if ($request->hasFile('imagepicture')) {
                $image_tmp = $request->file('imagepicture');
                if ($image_tmp->isValid()) {
                    ClientApplicationRequirement::where('client_application_id',$request->input('appid'))->where('name','=','Picture')->delete();
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = $request['lastname']  .  $request->input('clientid')  . 'senior.' . $extension;
                    File::delete(public_path('images/picture/'.$filename));
                    $large_image_path = 'images/picture/' . $filename;
                    Image::make($image_tmp)->save($large_image_path);
                
                    // Store image name in products table
                    $requirementsave = new ClientApplicationRequirement();
        
                    $requirementsave->name = 'Picture';
                    $requirementsave->filename = $filename;
                    $requirementsave->client_application_id =$request->input('appid');
                    $requirementsave->save();
                    
                }

            }





            session_start();
            $_SESSION['success'] ="success";
           
         
            return view('main/landing', [
                // Specify the base layout.
                // Eg: 'side-menu', 'simple-menu', 'top-menu', 'login'
                // The default value is 'side-menu'
    
                // 'layout' => 'side-menu'
            ])->with('success');
         
            
            exit;

              
            // return view('main/landing', [
             
            //     ])->with(compact('barangaylist'));
   
    }


    
    public function updatepwdcardapplication(Request $request)
    {
            $barangaylist = Barangay::select('id', 'name')->get();
           
            $dob = Carbon::parse($request->input('birthdate'))->format('Y-m-d');

            Client::where('id',$request->input('clientid'))->update(['first_name'=> $request->input('firstname'),'last_name' => $request->input('lastname'),'middle_name' => $request->input('middlename')
            ,'extension_name' =>  $request->input('extensionname'),'sex' =>  $request->input('gender'),'blood_type' =>  $request->input('bloodtype'),'civil_status' =>  $request->input('civilstatus')
            ,'nationality' =>  $request->input('nationality'),'religion' =>  $request->input('religion'),'birth_date' =>  $dob,'birth_place' =>   $request->input('birthplace')
            ,'email_address' =>  $request->input('emailaddress'),'contact_number' => $request->input('mobilenumber'),'landline_number' =>  $request->input('landlinenumber'),'street' =>  $request->input('street')
            ,'barangay_id' => $request->input('barangay'),'municipality' =>  $request->input('city'),'province' =>  $request->input('province'),'region' =>  $request->input('region')
            ,'skills_talents' =>  $request->input('skill'),'hobbies' => $request->input('hobbies'),'educational_attainment' =>  $request->input('educationalattainment')]);
          
                    
            ClientApplication::where('id',$request->input('appid'))->update(['application_status'=>'Applied']);
            Occupation::where('client_id',$request->input('clientid'))->update(['employment_status'=> $request->input('employmentstatus'),'employment_type'=> $request->input('employmenttype'),'employment_category'=> $request->input('employmentcategory'),'occupation'=> $request->input('occupation'),'salary'=> $request->input('salary')]);
            Organization::where('client_id',$request->input('clientid'))->update(['organization_affiliated'=> $request->input('organizationaffiliated'),'contact_person'=> $request->input('contactperson'),'office_address'=> $request->input('officeaddress'),'contact_number'=> $request->input('contactnumber')]);
            IdentificationCard::where('client_id',$request->input('clientid'))->update(['sss_number'=> $request->input('sssnumber'),'gsis_number'=> $request->input('gsisnumber'),'pagibig_number'=> $request->input('pagibignumber'),'psn_number'=> $request->input('psnnumber'),'philhealth_number'=> $request->input('philhealthnumber')]);
            Physician::where('client_id',$request->input('clientid'))->update(['license_number'=> $request->input('licensenumber'),'first_name'=> $request->input('physicianfirstname'),'last_name'=> $request->input('physicianlastname'),'middle_name'=> $request->input('physicianmiddlename')]);


            FamilyComposition::where('client_id',$request->input('clientid'))->delete();
            $lastname =  $request->input('familylastname');
            $firstname =  $request->input('familyfirstname');
            $middlename =  $request->input('familymiddlename');
            $extensionname =  $request->input('familyextensionname'); 
            $sex =  $request->input('familygender');
            $birthdate =  $request->input('familybirthdate');
            $relationship =  $request->input('relationship');

            foreach($relationship  as $key => $value) {       
                $familysave = new FamilyComposition();
                $familysave ->relationship = $value;
                $familysave ->last_name = $lastname[$key];
                $familysave ->first_name = $firstname[$key];
                $familysave ->middle_name = $middlename[$key];
                $familysave ->extension_name = $extensionname[$key];
                $familysave ->sex = $sex[$key];
                $familysave ->birth_date = $birthdate[$key];
                $familysave->client_id =$request->input('clientid');
                $familysave->save();
            
            }

            DisabilityType::where('client_id',$request->input('clientid'))->delete();
            $type =  $request->input('type');
            foreach($type  as $key => $value) {       
                $disabilitytypesave = new DisabilityType();
                $disabilitytypesave ->name = $value;
                $disabilitytypesave->client_id =$request->input('clientid');
                $disabilitytypesave->save();
            

            }
                             DisabilityCause::where('client_id',$request->input('clientid'))->delete();
                                      $acquired =  $request->input('acquired');
                                    $othersacquired =  $request->input('othersacquired');
                                    foreach($acquired  as $key => $value) {       
                                        $disabilitycausesave = new DisabilityCause();
                                        $disabilitycausesave ->name = $value;
                                        $disabilitycausesave ->type = 'Acquired';
                                        $disabilitycausesave ->others = $othersacquired;
                                        $disabilitycausesave->client_id =$request->input('clientid');
                                        $disabilitycausesave->save();
                                    
                                    }

                                    $inborn =  $request->input('inborn');
                                    $othersinborn =  $request->input('othersinborn');
                                    foreach($inborn  as $key => $value) {       
                                        $disabilitycausesave = new DisabilityCause();
                                        $disabilitycausesave ->name = $value;
                                        $disabilitycausesave ->type = 'Congenital/Inborn';
                                        $disabilitycausesave ->others = $othersinborn;
                                        $disabilitycausesave->client_id =$request->input('clientid');
                                        $disabilitycausesave->save();
                                    
                                    }


            if ($request->hasFile('imageid')) {
                $image_tmp = $request->file('imageid');
                if ($image_tmp->isValid()) {
                    ClientApplicationRequirement::where('client_application_id',$request->input('appid'))->where('name','=','Valid ID')->delete();
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = $request['lastname']  .  $request->input('clientid')  . 'pwd.' . $extension;
                    File::delete(public_path('images/id/'.$filename));
                    $large_image_path = 'images/id/' . $filename;
                    Image::make($image_tmp)->save($large_image_path);

                    // Store image name in products table
                    $requirementsave = new ClientApplicationRequirement();
        
                    $requirementsave->name = 'Valid ID';
                    $requirementsave->filename = $filename;
                    $requirementsave->client_application_id =$request->input('appid');
                    $requirementsave->save();
                    
                }
            }

            if ($request->hasFile('imagebarangay')) {
                $image_tmp = $request->file('imagebarangay');
                if ($image_tmp->isValid()) {
                    ClientApplicationRequirement::where('client_application_id',$request->input('appid'))->where('name','=','Barangay Certificate')->delete();
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename =$request['lastname']  .  $request->input('clientid')  . 'pwd.' . $extension;
                    File::delete(public_path('images/barangay/'.$filename));
                    $large_image_path = 'images/barangay/' . $filename;
                    Image::make($image_tmp)->save($large_image_path);

                    // Store image name in products table
                    $requirementsave = new ClientApplicationRequirement();
        
                    $requirementsave->name = 'Barangay Certificate';
                    $requirementsave->filename = $filename;
                    $requirementsave->client_application_id =$request->input('appid');
                    $requirementsave->save();
                    
                }
            }

            if ($request->hasFile('imagepicture')) {
                $image_tmp = $request->file('imagepicture');
                if ($image_tmp->isValid()) {
                    ClientApplicationRequirement::where('client_application_id',$request->input('appid'))->where('name','=','Picture')->delete();
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = $request['lastname']  .  $request->input('clientid')  . 'pwd.' . $extension;
                    File::delete(public_path('images/picture/'.$filename));
                    $large_image_path = 'images/picture/' . $filename;
                    Image::make($image_tmp)->save($large_image_path);

                    // Store image name in products table
                    $requirementsave = new ClientApplicationRequirement();
        
                    $requirementsave->name = 'Picture';
                    $requirementsave->filename = $filename;
                    $requirementsave->client_application_id =$request->input('appid');
                    $requirementsave->save();
                    
                }
            }
            if ($request->hasFile('imagedisability')) {
                $image_tmp = $request->file('imagedisability');
                if ($image_tmp->isValid()) {
                    ClientApplicationRequirement::where('client_application_id',$request->input('appid'))->where('name','=','Certificate of Disability')->delete();
                    $extension = $image_tmp->getClientOriginalExtension();
                       $filename = $request['lastname']  .  $request->input('clientid')  . 'pwd.' . $extension;
                       File::delete(public_path('images/disability/'.$filename));
                    $large_image_path = 'images/disability/' . $filename;
                    Image::make($image_tmp)->save($large_image_path);

                    // Store image name in products table
                    $requirementsave = new ClientApplicationRequirement();
        
                    $requirementsave->name = 'Certificate of Disability';
                    $requirementsave->filename = $filename;
                    $requirementsave->client_application_id =$request->input('appid');
                    $requirementsave->save();
                    
                }
            }






            session_start();
            $_SESSION['success'] ="success";
           
         
            return view('main/landing', [
                // Specify the base layout.
                // Eg: 'side-menu', 'simple-menu', 'top-menu', 'login'
                // The default value is 'side-menu'
    
                // 'layout' => 'side-menu'
            ])->with('success');
         
            
            exit;
              
            // return view('main/landing', [
             
            //     ])->with(compact('barangaylist'));
   
    }


    public function updatesoloparentcardapplication(Request $request)
    {
            $barangaylist = Barangay::select('id', 'name')->get();
           
            $dob = Carbon::parse($request->input('birthdate'))->format('Y-m-d');

            // $client= Client::with("occupations","barangays")->where('first_name','=',$request->input('firstname'))->where('last_name','=',$request->input('lastname'))->where('middle_name','=',$request->input('middlename'))->whereHas("client_applications", function($subQuery) use ($request)  {
            //     $subQuery->where("client_applications.application_reference_number", "=", $request->input('number')); 
            // })->with(["client_applications" => function($subQuery) use ($request){
            //     $subQuery->where("client_applications.application_reference_number", "=", $request->input('number')); 
            // }])
            // ->first();
              
            Client::where('id',$request->input('clientid'))->update(['first_name'=> $request->input('firstname'),'last_name' => $request->input('lastname'),'middle_name' => $request->input('middlename')
            ,'extension_name' =>  $request->input('extensionname'),'sex' =>  $request->input('gender'),'blood_type' =>  $request->input('bloodtype'),'civil_status' =>  $request->input('civilstatus')
            ,'nationality' =>  $request->input('nationality'),'religion' =>  $request->input('religion'),'birth_date' =>  $dob,'birth_place' =>   $request->input('birthplace')
            ,'email_address' =>  $request->input('emailaddress'),'contact_number' => $request->input('mobilenumber'),'landline_number' =>  $request->input('landlinenumber'),'street' =>  $request->input('street')
            ,'barangay_id' => $request->input('barangay'),'municipality' =>  $request->input('city'),'province' =>  $request->input('province'),'region' =>  $request->input('region')
            ,'skills_talents' =>  $request->input('skill'),'hobbies' => $request->input('hobbies'),'educational_attainment' =>  $request->input('educationalattainment')]);
            // foreach ($client->client_applications as $app) {
                    
         ClientApplication::where('id',$request->input('appid'))->update(['application_status'=>'Applied']);
           
           

         Occupation::where('client_id',$request->input('clientid'))->update(['employment_status'=> $request->input('employmentstatus'),'employment_type'=> $request->input('employmenttype'),'employment_category'=> $request->input('employmentcategory'),'occupation'=> $request->input('occupation'),'salary'=> $request->input('salary')]);

         Education::where('client_id',$request->input('clientid'))->delete();
         $type =  $request->input('type');
         $schoolname =  $request->input('schoolname');
         $course =  $request->input('course');
         $yeargraduated =  $request->input('yeargraduated'); 
         $achievementaward =  $request->input('achievementaward');
       
 
         foreach($type  as $key => $value) {       
             $educationsave = new Education();
             $educationsave ->educational_attainment = $value;
             $educationsave ->school = $schoolname[$key];
             $educationsave ->course = $course[$key];
             $educationsave ->year_graduated = $yeargraduated[$key];
             $educationsave ->achievement_award = $achievementaward[$key];
             $educationsave->client_id =$request->input('clientid');
             $educationsave->save();
         
         }

         FamilyComposition::where('client_id',$request->input('clientid'))->delete();
 
         $lastname =  $request->input('familylastname');
         $firstname =  $request->input('familyfirstname');
         $middlename =  $request->input('familymiddlename');
         $extensionname =  $request->input('familyextensionname'); 
         $sex =  $request->input('familygender');
         $birthdate =  $request->input('familybirthdate');
         $relationship =  $request->input('relationship');
 
         foreach($relationship  as $key => $value) {       
             $familysave = new FamilyComposition();
             $familysave ->relationship = $value;
             $familysave ->last_name = $lastname[$key];
             $familysave ->first_name = $firstname[$key];
             $familysave ->middle_name = $middlename[$key];
             $familysave ->extension_name = $extensionname[$key];
             $familysave ->sex = $sex[$key];
             $familysave ->birth_date = $birthdate[$key];
             $familysave->client_id =$request->input('clientid');
             $familysave->save();
         
         }

         CommunityInvolvement::where('client_id',$request->input('clientid'))->delete();
       
         $organizationname =  $request->input('organizationname');
         $position =  $request->input('position');
         $commmunitydate =  $request->input('commmunitydate');
       
 
         foreach($organizationname  as $key => $value) {       
             $communitysave = new CommunityInvolvement();
             $communitysave ->organization_name = $value;
             $communitysave ->position = $position[$key];
             $communitysave ->date = $commmunitydate[$key];
             $communitysave->client_id =$request->input('clientid');
             $communitysave->save();
         
         }
 

         SeminarTraining::where('client_id',$request->input('clientid'))->delete();
         $seminarorganizationname =  $request->input('seminarorganizationname');
         $seminarposition =  $request->input('seminarposition');
         $seminardate =  $request->input('seminardate');
       
 
         foreach($seminarorganizationname  as $key => $value) {       
             $seminarsave = new SeminarTraining();
             $seminarsave ->organization_name = $value;
             $seminarsave ->position = $seminarposition[$key];
             $seminarsave ->date = $seminardate[$key];
             $seminarsave->client_id =$request->input('clientid');
             $seminarsave->save();
         
         }

            if ($request->hasFile('imageid')) {
                $image_tmp = $request->file('imageid');
                if ($image_tmp->isValid()) {
                    ClientApplicationRequirement::where('client_application_id',$request->input('appid'))->where('name','=','Valid ID')->delete();
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = $request['lastname']  .  $request->input('clientid')  . 'soloparent.' . $extension;
                    File::delete(public_path('images/id/'.$filename));
                    $large_image_path = 'images/id/' . $filename;
                    Image::make($image_tmp)->save($large_image_path);
    
                    // Store image name in products table
                    $requirementsave = new ClientApplicationRequirement();
        
                    $requirementsave->name = 'Valid ID';
                    $requirementsave->filename = $filename;
                    $requirementsave->client_application_id =$request->input('appid');
                    $requirementsave->save();
                    
                }
            }
    
            if ($request->hasFile('imagebarangay')) {
                $image_tmp = $request->file('imagebarangay');
                if ($image_tmp->isValid()) {
                    ClientApplicationRequirement::where('client_application_id',$request->input('appid'))->where('name','=','Barangay Certificate')->delete();
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = $request['lastname']  .  $request->input('clientid')  . 'soloparent.' . $extension;
                    File::delete(public_path('images/barangay/'.$filename));
                    $large_image_path = 'images/barangay' . $filename;
                    Image::make($image_tmp)->save($large_image_path);
    
                    // Store image name in products table
                    $requirementsave = new ClientApplicationRequirement();
        
                    $requirementsave->name = 'Barangay Certificate';
                    $requirementsave->filename = $filename;
                    $requirementsave->client_application_id =$request->input('appid');
                    $requirementsave->save();
                    
                }
            }
    
            if ($request->hasFile('imagepicture')) {
                $image_tmp = $request->file('imagepicture');
                if ($image_tmp->isValid()) {
                    ClientApplicationRequirement::where('client_application_id',$request->input('appid'))->where('name','=','Picture')->delete();
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = $request['lastname']  .  $request->input('clientid')  . 'soloparent.' . $extension;
                    File::delete(public_path('images/picture/'.$filename));
                    $large_image_path = 'images/picture/' . $filename;
                    Image::make($image_tmp)->save($large_image_path);
    
                    // Store image name in products table
                    $requirementsave = new ClientApplicationRequirement();
        
                    $requirementsave->name = 'Picture';
                    $requirementsave->filename = $filename;
                    $requirementsave->client_application_id =$request->input('appid');
                    $requirementsave->save();
                    
                }
            }
            if ($request->hasFile('imagebirth')) {
                $image_tmp = $request->file('imagebirth');
                if ($image_tmp->isValid()) {
                    ClientApplicationRequirement::where('client_application_id',$request->input('appid'))->where('name','=','Birth Certificate')->delete();
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename =$request['lastname']  .  $request->input('clientid')  . 'soloparent.' . $extension;
                    File::delete(public_path('images/birth/'.$filename));
                    $large_image_path = 'images/birth/' . $filename;
                    Image::make($image_tmp)->save($large_image_path);
    
                    // Store image name in products table
                    $requirementsave = new ClientApplicationRequirement();
        
                    $requirementsave->name = 'Birth Certificate';
                    $requirementsave->filename = $filename;
                    $requirementsave->client_application_id =$request->input('appid');
                    $requirementsave->save();
                    
                }
            }
    
    





            session_start();
            $_SESSION['success'] ="success";
           
         
            return view('main/landing', [
                // Specify the base layout.
                // Eg: 'side-menu', 'simple-menu', 'top-menu', 'login'
                // The default value is 'side-menu'
    
                // 'layout' => 'side-menu'
            ])->with('success');
         
            
            exit;

              
            // return view('main/landing', [
             
            //     ])->with(compact('barangaylist'));
   
    }






    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *  
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BenefitApplication  $benefitApplication
     * @return \Illuminate\Http\Response
     */
    public function show(BenefitApplication $benefitApplication)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BenefitApplication  $benefitApplication
     * @return \Illuminate\Http\Response
     */
    public function edit(BenefitApplication $benefitApplication)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BenefitApplication  $benefitApplication
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BenefitApplication $benefitApplication)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BenefitApplication  $benefitApplication
     * @return \Illuminate\Http\Response
     */
    public function destroy(BenefitApplication $benefitApplication)
    {
        //
    }
}
