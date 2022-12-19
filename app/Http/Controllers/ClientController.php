<?php
namespace App\Mail;
namespace App\Http\Controllers;
use App\Mail\ScheduleMail;
use App\Mail\DeclineMail;
use App\Mail\IdMail;
use App\Mail\CardMail;
use App\Mail\ReferenceMail;
use App\Models\Client;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\Barangay;
use App\Models\ClientApplication;
use App\Models\ClientApplicationLog;
use App\Models\ClientApplicationRequirement;
use App\Models\ClientCard;
use App\Models\ClientSchedule;
use App\Models\CommunityInvolvement;
use App\Helpers\Helper;
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
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Str;



class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
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
    public function store(Request $request, $iclientd = null)
    {
       
       $this->validate($request, [
        'firstname' => 'required'

       ]);
       
        $latestreferencenumber = ClientApplication::where('id','DESC')->first();
        $dob = Carbon::parse($request->input('birthdate'))->format('Y-m-d');
        $client= Client::where('first_name','=',$request->input('firstname'))->where('last_name','=',$request->input('lastname'))->where('middle_name','=',$request->input('middlename'))->where('birth_date','=', $request->input('birthdate'))->first();

       
        if ($client == null)
            {
                $application_date= now()->toDateString('Ymd');
                $yearOnly=substr($application_date,0,4);
                $generator = Helper::IDGenerator(new ClientApplication,'application_reference_number',9,'CID-'.$yearOnly,$yearOnly);
                $clientsave = new Client();
                                            
                $clientsave->first_name = $request->input('firstname');
                $clientsave->last_name = $request->input('lastname');
                $clientsave->middle_name = $request->input('middlename');
                $clientsave->extension_name = $request->input('extensionname');
                $clientsave->sex = $request->input('gender');
                $clientsave->blood_type = $request->input('bloodtype');
                $clientsave->civil_status = $request->input('civilstatus');
                $clientsave->nationality = $request->input('nationality');
                $clientsave->religion = $request->input('religion');
                $clientsave->birth_date =$dob;
                $clientsave->birth_place = $request->input('birthplace');
                $clientsave->email_address= $request->input('emailaddress');
                $clientsave->contact_number = $request->input('mobilenumber');
                $clientsave->landline_number = $request->input('landlinenumber');
                $clientsave->street = $request->input('street');
                $clientsave->barangay_id = $request->input('barangay'); ;
                $clientsave->municipality= $request->input('city');
                $clientsave->region = $request->input('region');
                $clientsave->province= $request->input('province');
                $clientsave->educational_attainment = $request->input('education');
                $clientsave->skills_talents= $request->input('skill');
                $clientsave->hobbies= $request->input('hobbies');
                $clientsave->educational_attainment= $request->input('educationalattainment');
                $clientsave->save();

                $applicationsave = new ClientApplication();
            
                $applicationsave->application_date= now()->toDateString('Y-m-d');
                $applicationsave->application_type = 'Citizen';
                $applicationsave->application_Status = 'Applied';
                      
                $applicationsave->application_reference_number =$generator;
                      
            
                $applicationsave->application_process = 'Online-Ongoing';
                $applicationsave->client_id =$clientsave->id;
                $applicationsave->save();


                $occupationsave = new Occupation();
            
                $occupationsave->employment_status = $request->input('employmentstatus');
                $occupationsave->employment_type = $request->input('employmenttype');
                $occupationsave->employment_category = $request->input('employmentcategory');
                $occupationsave->occupation = $request->input('occupation');
                $occupationsave->salary = $request->input('salary');
                $occupationsave->others = $request->input('othersoccupation');
                $occupationsave->client_id =$clientsave->id;
                $occupationsave->save();


                if ($request->hasFile('imagebirth')) {
                    $image_tmp = $request->file('imagebirth');
                    if ($image_tmp->isValid()) {
                        $extension = $image_tmp->getClientOriginalExtension();
                        $filename = $request['lastname']  .  $clientsave->id  . 'senior.' . $extension;
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
                        $filename = $request['lastname']  .  $clientsave->id  . 'senior.' . $extension;
                        $large_image_path = 'images/barangay/' . $filename;
                        Image::make($image_tmp)->save($large_image_path);

                        // Store image name in pevaluroducts table
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
                        $filename = $request['lastname']  .  $clientsave->id  . 'senior.' . $extension;
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

                
       

        $clientapplication=ClientApplication::where('id',$applicationsave->id)->first();
        $clientdetails=Client::where('id',$clientsave->id)->first();

        
        $details = [
            'title' => 'Mail from City Social Welfare and Development',
            'body' => 'Your reference number '

        ];
        Mail::to($clientdetails->email_address)->send(new ReferenceMail($details, $clientapplication, $clientdetails));



                session_start();
                $_SESSION['success'] ="success";
               
             
                return view('main/landing', [
                    // Specify the base layout.
                    // Eg: 'side-menu', 'simple-menu', 'top-menu', 'login'
                    // The default value is 'side-menu'
        
                    // 'layout' => 'side-menu'
                ])->with('success');
             
                
                exit;

               
            }
          
         else {


            
                    // $clientapplication= Client::where('first_name','=',$request->input('firstname'))->where('last_name','=',$request->input('lastname'))->where('middle_name','=',$request->input('middlename'))->where('birth_date','=', $request->input('birthdate'))->whereHas("client_applications", function($subQuery) use ($request)  {
                    //     $subQuery->where("client_applications.application_type", "=", 'Citizen'); 
                    // })->with(["client_applications" => function($subQuery) use ($request){
                    //     $subQuery->where("client_applications.application_type", "=", 'Citizen'); 
                    // }])->first();

                    // if($clientapplication == null)
                    // {

                    //     $applicationsave = new ClientApplication();
            
                    //     $applicationsave->application_date= now()->toDateString('Y-m-d');;
                    //     $applicationsave->application_type = 'Citizen';
                    //     $applicationsave->application_Status = 'Applied';
                    //             if($latestreferencenumber===null)
                    //             {
                    //                 $applicationsave->application_reference_number = '#'.str_pad( 1, 8, "0", STR_PAD_LEFT);;
                    //             }
                    //             else
                    //             {
                    //                 $applicationsave->application_reference_number = '#'.str_pad($latestreferencenumber->application_reference_number  + 1, 8, "0", STR_PAD_LEFT);
                    //             }
                    
                    //     $applicationsave->application_process = 'Online-Ongoing';
                    //     $applicationsave->client_id =$clientapplication->id;
                    //     $applicationsave->save();

                        
                    //         if ($request->hasFile('imagebirth')) {
                    //             $image_tmp = $request->file('imagebirth');
                    //             if ($image_tmp->isValid()) {
                    //                 $extension = $image_tmp->getClientOriginalExtension();
                    //                 $filename = $request['lastname']  .  $clientapplication->id  . 'senior.' . $extension;
                    //                 $large_image_path = 'images/birth/' . $filename;
                    //                 Image::make($image_tmp)->save($large_image_path);

                    //                 // Store image name in products table
                    //                 $requirementsave = new ClientApplicationRequirement();
                        
                    //                 $requirementsave->name = 'Birth Certificate';
                    //                 $requirementsave->filename = $filename;
                    //                 $requirementsave->client_application_id =$applicationsave->id;
                    //                 $requirementsave->save();
                                    
                    //             }
                    //         }

                    //         if ($request->hasFile('imagebarangay')) {
                    //             $image_tmp = $request->file('imagebarangay');
                    //             if ($image_tmp->isValid()) {
                    //                 $extension = $image_tmp->getClientOriginalExtension();
                    //                 $filename = $request['lastname']  .  $clientapplication->id  . 'senior.' . $extension;
                    //                 $large_image_path = 'images/barangay/' . $filename;
                    //                 Image::make($image_tmp)->save($large_image_path);

                    //                 // Store image name in products table
                    //                 $requirementsave = new ClientApplicationRequirement();
                        
                    //                 $requirementsave->name = 'Barangay Certificate';
                    //                 $requirementsave->filename = $filename;
                    //                 $requirementsave->client_application_id =$applicationsave->id;
                    //                 $requirementsave->save();
                                    
                    //             }
                    //         }

                    //         if ($request->hasFile('imagepicture')) {
                    //             $image_tmp = $request->file('imagepicture');
                    //             if ($image_tmp->isValid()) {
                    //                 $extension = $image_tmp->getClientOriginalExtension();
                    //                 $filename = $request['lastname']  .  $clientapplication->id  . 'senior.' . $extension;
                    //                 $large_image_path = 'images/picture/' . $filename;
                    //                 Image::make($image_tmp)->save($large_image_path);

                    //                 // Store image name in products table
                    //                 $requirementsave = new ClientApplicationRequirement();
                        
                    //                 $requirementsave->name = 'Picture';
                    //                 $requirementsave->filename = $filename;
                    //                 $requirementsave->client_application_id =$applicationsave->id;
                    //                 $requirementsave->save();
                                    
                    //             }

                    //         }
        

                    // }
                    // else
                    // {

                        session_start();
                        $_SESSION['fail'] ="fail";
                       
                     
                        return view('main/landing', [
                            // Specify the base layout.
                            // Eg: 'side-menu', 'simple-menu', 'top-menu', 'login'
                            // The default value is 'side-menu'
                
                            // 'layout' => 'side-menu'
                        ])->with('fail');
                     
                        
                        exit;

                    // }

                    









        }  
                    
            
    }


    public function createongoingsenior(Request $request)
    {
       
     
       
        $latestreferencenumber = ClientApplication::where('id','DESC')->first();
        $dob = Carbon::parse($request->input('birthdate'))->format('Y-m-d');
      
          
        $clientid =  $request->input('clientid');
        

        $clientapplication=ClientApplication::where('client_id',$clientid)->where('application_type','=','Senior')->first();

        if($clientapplication == null)

      
        {
            $application_date= now()->toDateString('Ymd');
            $yearOnly=substr($application_date,0,4);
            $generator = Helper::IDGenerator(new ClientApplication,'application_reference_number',9,'OSID-'.$yearOnly,$yearOnly);
                        $applicationsave = new ClientApplication();
                    
                        $applicationsave->application_date= now()->toDateString('Y-m-d');;
                        $applicationsave->application_type = 'Senior';
                        $applicationsave->application_Status = 'Applied';
                              
                                    $applicationsave->application_reference_number = $generator;
                              
                        $applicationsave->application_process = 'Online-Ongoing';
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


                        $clientapplication=ClientApplication::where('id',$applicationsave->id)->first();
                        $clientdetails=Client::where('id',$clientid)->first();
                
                        
                        $details = [
                            'title' => 'Mail from City Social Welfare and Development',
                            'body' => 'Your reference number '
                
                        ];
                        Mail::to($clientdetails->email_address)->send(new ReferenceMail($details, $clientapplication, $clientdetails));
                        session_start();
                        $_SESSION['success'] ="success";
                       
                     
                        return view('main/landing', [
                            // Specify the base layout.
                            // Eg: 'side-menu', 'simple-menu', 'top-menu', 'login'
                            // The default value is 'side-menu'
                
                            // 'layout' => 'side-menu'
                        ])->with('success');
                     
                        
                        exit;
        

        }

        else
            {
                session_start();
                $_SESSION['fail'] ="fail";
               
             
                return view('main/landing', [
                    // Specify the base layout.
                    // Eg: 'side-menu', 'simple-menu', 'top-menu', 'login'
                    // The default value is 'side-menu'
        
                    // 'layout' => 'side-menu'
                ])->with('fail');
             
                
                exit;

            }


         

               
            
           


         
          

        
    }

    
    public function createongoingpwd(Request $request)
    {
       
     
       
        $latestreferencenumber = ClientApplication::where('id','DESC')->first();
        $dob = Carbon::parse($request->input('birthdate'))->format('Y-m-d');
      
          
        $clientid =  $request->input('clientid');
        $application_date= now()->toDateString('Ymd');
        $yearOnly=substr($application_date,0,4);
        $generator = Helper::IDGenerator(new ClientApplication,'application_reference_number',9,'OPID-'.$yearOnly,$yearOnly);

            $applicationsave = new ClientApplication();
        
            $applicationsave->application_date= now()->toDateString('Y-m-d');;
            $applicationsave->application_type = 'PWD';
            $applicationsave->application_Status = 'Applied';
                  
                        $applicationsave->application_reference_number = $generator;
                    
        
            $applicationsave->application_process = 'Online-Ongoing';
            $applicationsave->client_id =$clientid;
            $applicationsave->save();

         

            $organizationsave = new Organization();
        
            $organizationsave->organization_affiliated = $request->input('organizationaffiliated');
            $organizationsave->contact_person = $request->input('contactperson');
            $organizationsave->office_address = $request->input('officeaddress');
            $organizationsave->contact_number = $request->input('contactnumber');
            $organizationsave->client_id =$clientid;
            $organizationsave->save();

            $identificationcardsave = new IdentificationCard();
        
            $identificationcardsave->sss_number = $request->input('sssnumber');
            $identificationcardsave->gsis_number = $request->input('gsisnumber');
            $identificationcardsave->pagibig_number = $request->input('pagibignumber');
            $identificationcardsave->psn_number = $request->input('psnnumber');
            $identificationcardsave->philhealth_number = $request->input('philhealthnumber');
            $identificationcardsave->client_id =$clientid;
            $identificationcardsave->save();


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
                $familysave->client_id =$clientid;
                $familysave->save();
            
            }
            $type =  $request->input('type');
            foreach($type  as $key => $value) {       
                $disabilitytypesave = new DisabilityType();
                $disabilitytypesave ->name = $value;
                $disabilitytypesave->client_id =$clientid;
                $disabilitytypesave->save();
            
            }

            $acquired =  $request->input('acquired');
            $othersacquired =  $request->input('othersacquired');
            foreach($acquired  as $key => $value) {       
                $disabilitycausesave = new DisabilityCause();
                $disabilitycausesave ->name = $value;
                $disabilitycausesave ->type = 'Acquired';
                $disabilitycausesave ->others = $othersacquired;
                $disabilitycausesave->client_id =$clientid;
                $disabilitycausesave->save();
            
            }

            $inborn =  $request->input('inborn');
            $othersinborn =  $request->input('othersinborn');
            foreach($inborn  as $key => $value) {       
                $disabilitycausesave = new DisabilityCause();
                $disabilitycausesave ->name = $value;
                $disabilitycausesave ->type = 'Congenital/Inborn';
                $disabilitycausesave ->others = $othersinborn;
                $disabilitycausesave->client_id =$clientid;
                $disabilitycausesave->save();
            
            }

            $physiciansave = new Physician();
        
            $physiciansave->license_number = $request->input('licensenumber');
            $physiciansave->first_name = $request->input('physicianfirstname');
            $physiciansave->last_name = $request->input('physicianlastname');
            $physiciansave->middle_name = $request->input('physicianmiddlename');
            $physiciansave->client_id =$clientid;
            $physiciansave->save();




            if ($request->hasFile('imageid')) {
                $image_tmp = $request->file('imageid');
                if ($image_tmp->isValid()) {
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = $request['lastname']  .  $clientid  . 'pwd.' . $extension;
                    $large_image_path = 'images/id/' . $filename;
                    Image::make($image_tmp)->save($large_image_path);

                    // Store image name in products table
                    $requirementsave = new ClientApplicationRequirement();
        
                    $requirementsave->name = 'Valid ID';
                    $requirementsave->filename = $filename;
                    $requirementsave->client_application_id =$applicationsave->id;
                    $requirementsave->save();
                    
                }
            }

            if ($request->hasFile('imagebarangay')) {
                $image_tmp = $request->file('imagebarangay');
                if ($image_tmp->isValid()) {
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = $request['lastname']  .  $clientid  . 'pwd.' . $extension;
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
                    $filename = $request['lastname']  .  $clientid  . 'pwd.' . $extension;
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
            if ($request->hasFile('imagedisability')) {
                $image_tmp = $request->file('imagedisability');
                if ($image_tmp->isValid()) {
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = $request['lastname']  .  $clientid  . 'pwd.' . $extension;
                    $large_image_path = 'images/disability/' . $filename;
                    Image::make($image_tmp)->save($large_image_path);

                    // Store image name in products table
                    $requirementsave = new ClientApplicationRequirement();
        
                    $requirementsave->name = 'Certificate of Disability';
                    $requirementsave->filename = $filename;
                    $requirementsave->client_application_id =$applicationsave->id;
                    $requirementsave->save();
                    
                }
            }

            $clientapplication=ClientApplication::where('id',$applicationsave->id)->first();
            $clientdetails=Client::where('id',$clientid)->first();
    
            
            $details = [
                'title' => 'Mail from City Social Welfare and Development',
                'body' => 'Your reference number '
    
            ];
            Mail::to($clientdetails->email_address)->send(new ReferenceMail($details, $clientapplication, $clientdetails));

              session_start();
                $_SESSION['success'] ="success";
               
             
                return view('main/landing', [
                    // Specify the base layout.
                    // Eg: 'side-menu', 'simple-menu', 'top-menu', 'login'
                    // The default value is 'side-menu'
        
                    // 'layout' => 'side-menu'
                ])->with('success');
             
                
                exit;

            
           


         
          

        
    }
    
    public function createongoingsoloparent(Request $request)
    {
       
     
       
        $latestreferencenumber = ClientApplication::where('id','DESC')->first();
        $dob = Carbon::parse($request->input('birthdate'))->format('Y-m-d');
      
          
        $clientid =  $request->input('clientid');
        $application_date= now()->toDateString('Ymd');
        $yearOnly=substr($application_date,0,4);
        $generator = Helper::IDGenerator(new ClientApplication,'application_reference_number',9,'OSPID-'.$yearOnly,$yearOnly);
            $applicationsave = new ClientApplication();
        
            $applicationsave->application_date= now()->toDateString('Y-m-d');;
            $applicationsave->application_type = 'Solo Parent';
            $applicationsave->application_Status = 'Applied';
                  
                        $applicationsave->application_reference_number = $generator;
                    
        
            $applicationsave->application_process = 'Online-Ongoing';
            $applicationsave->client_id =$clientid;
            $applicationsave->save();

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
                $educationsave->client_id =$clientid;
                $educationsave->save();
            
            }
    
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
                $familysave->client_id =$clientid;
                $familysave->save();
            
            }
          
            $organizationname =  $request->input('organizationname');
            $position =  $request->input('position');
            $commmunitydate =  $request->input('commmunitydate');
          
    
            foreach($organizationname  as $key => $value) {       
                $communitysave = new CommunityInvolvement();
                $communitysave ->organization_name = $value;
                $communitysave ->position = $position[$key];
                $communitysave ->date = $commmunitydate[$key];
                $communitysave->client_id =$clientid;
                $communitysave->save();
            
            }
    
            $seminarorganizationname =  $request->input('seminarorganizationname');
            $seminarposition =  $request->input('seminarposition');
            $seminardate =  $request->input('seminardate');
          
    
            foreach($seminarorganizationname  as $key => $value) {       
                $seminarsave = new SeminarTraining();
                $seminarsave ->organization_name = $value;
                $seminarsave ->position = $seminarposition[$key];
                $seminarsave ->date = $seminardate[$key];
                $seminarsave->client_id =$clientid;
                $seminarsave->save();
            
            }
    



            if ($request->hasFile('imageid')) {
                $image_tmp = $request->file('imageid');
                if ($image_tmp->isValid()) {
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = $request['lastname'] . '.' . $extension;
                    $large_image_path = 'images/id/' . $filename;
                    Image::make($image_tmp)->save($large_image_path);
    
                    // Store image name in products table
                    $requirementsave = new ClientApplicationRequirement();
        
                    $requirementsave->name = 'Valid ID';
                    $requirementsave->filename = $filename;
                    $requirementsave->client_application_id =$applicationsave->id;
                    $requirementsave->save();
                    
                }
            }
    
            if ($request->hasFile('imagebarangay')) {
                $image_tmp = $request->file('imagebarangay');
                if ($image_tmp->isValid()) {
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = $request['lastname']  .  $clientid  . 'soloparent.' . $extension;
                    $large_image_path = 'images/barangay' . $filename;
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
                    $filename = $request['lastname']  .  $clientid  . 'soloparent.' . $extension;
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
            if ($request->hasFile('imagebirth')) {
                $image_tmp = $request->file('imagebirth');
                if ($image_tmp->isValid()) {
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename =$request['lastname']  .  $clientid  . 'soloparent.' . $extension;
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

            $clientapplication=ClientApplication::where('id',$applicationsave->id)->first();
            $clientdetails=Client::where('id',$clientid)->first();
    
            
            $details = [
                'title' => 'Mail from City Social Welfare and Development',
                'body' => 'Your reference number '
    
            ];
            Mail::to($clientdetails->email_address)->send(new ReferenceMail($details, $clientapplication, $clientdetails));

            session_start();
            $_SESSION['success'] ="success";
           
         
            return view('main/landing', [
                // Specify the base layout.
                // Eg: 'side-menu', 'simple-menu', 'top-menu', 'login'
                // The default value is 'side-menu'
    
                // 'layout' => 'side-menu'
            ])->with('success');
         
            
            exit;

           


         
          

        
    }


    public function createregistered(Request $request)
    {
       
     
       
        $latestreferencenumber = ClientApplication::where('id','DESC')->first();
        $dob = Carbon::parse($request->input('birthdate'))->format('Y-m-d');
      
          
        $clientid =  $request->input('clientid');
        $application_date= now()->toDateString('Ymd');
        $yearOnly=substr($application_date,0,4);
        $generator = Helper::IDGenerator(new ClientApplication,'application_reference_number',9,'RSID-'.$yearOnly,$yearOnly);
        
            $applicationsave = new ClientApplication();
        
            $applicationsave->application_date= now()->toDateString('Y-m-d');;
            $applicationsave->application_type = 'Senior';
            $applicationsave->application_Status = 'Applied';
                   
                        $applicationsave->application_reference_number = $generator;
                  
            $applicationsave->application_process = 'Online-Ongoing';
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


            $clientapplication=ClientApplication::where('id',$applicationsave->id)->first();
            $clientdetails=Client::where('id',$clientid)->first();
    
            
            $details = [
                'title' => 'Mail from City Social Welfare and Development',
                'body' => 'Your reference number '
    
            ];
            Mail::to($clientdetails->email_address)->send(new ReferenceMail($details, $clientapplication, $clientdetails));

            session_start();
            $_SESSION['success'] ="success";
           
         
            return view('main/landing', [
                // Specify the base layout.
                // Eg: 'side-menu', 'simple-menu', 'top-menu', 'login'
                // The default value is 'side-menu'
    
                // 'layout' => 'side-menu'
            ])->with('success');
         
            
            exit;

            
           


         
          

        
    }

    
    public function createregisteredpwd(Request $request)
    {
       
     
       
        $latestreferencenumber = ClientApplication::where('id','DESC')->first();
        $dob = Carbon::parse($request->input('birthdate'))->format('Y-m-d');
      
          
        $clientid =  $request->input('clientid');
        $application_date= now()->toDateString('Ymd');
        $yearOnly=substr($application_date,0,4);
        $generator = Helper::IDGenerator(new ClientApplication,'application_reference_number',9,'RPID-'.$yearOnly,$yearOnly);
            $applicationsave = new ClientApplication();
        
            $applicationsave->application_date= now()->toDateString('Y-m-d');;
            $applicationsave->application_type = 'PWD';
            $applicationsave->application_Status = 'Applied';
                  
                        $applicationsave->application_reference_number = $generator;
                    
        
            $applicationsave->application_process = 'Online-Ongoing';
            $applicationsave->client_id =$clientid;
            $applicationsave->save();

         

            $organizationsave = new Organization();
        
            $organizationsave->organization_affiliated = $request->input('organizationaffiliated');
            $organizationsave->contact_person = $request->input('contactperson');
            $organizationsave->office_address = $request->input('officeaddress');
            $organizationsave->contact_number = $request->input('contactnumber');
            $organizationsave->client_id =$clientid;
            $organizationsave->save();

            $identificationcardsave = new IdentificationCard();
        
            $identificationcardsave->sss_number = $request->input('sssnumber');
            $identificationcardsave->gsis_number = $request->input('gsisnumber');
            $identificationcardsave->pagibig_number = $request->input('pagibignumber');
            $identificationcardsave->psn_number = $request->input('psnnumber');
            $identificationcardsave->philhealth_number = $request->input('philhealthnumber');
            $identificationcardsave->client_id =$clientid;
            $identificationcardsave->save();


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
                $familysave->client_id =$clientid;
                $familysave->save();
            
            }
            $type =  $request->input('type');
            foreach($type  as $key => $value) {       
                $disabilitytypesave = new DisabilityType();
                $disabilitytypesave ->name = $value;
                $disabilitytypesave->client_id =$clientid;
                $disabilitytypesave->save();
            
            }

            $acquired =  $request->input('acquired');
            $othersacquired =  $request->input('othersacquired');
            foreach($acquired  as $key => $value) {       
                $disabilitycausesave = new DisabilityCause();
                $disabilitycausesave ->name = $value;
                $disabilitycausesave ->type = 'Acquired';
                $disabilitycausesave ->others = $othersacquired;
                $disabilitycausesave->client_id =$clientid;
                $disabilitycausesave->save();
            
            }

            $inborn =  $request->input('inborn');
            $othersinborn =  $request->input('othersinborn');
            foreach($inborn  as $key => $value) {       
                $disabilitycausesave = new DisabilityCause();
                $disabilitycausesave ->name = $value;
                $disabilitycausesave ->type = 'Congenital/Inborn';
                $disabilitycausesave ->others = $othersinborn;
                $disabilitycausesave->client_id =$clientid;
                $disabilitycausesave->save();
            
            }

            $physiciansave = new Physician();
        
            $physiciansave->license_number = $request->input('licensenumber');
            $physiciansave->first_name = $request->input('physicianfirstname');
            $physiciansave->last_name = $request->input('physicianlastname');
            $physiciansave->middle_name = $request->input('physicianmiddlename');
            $physiciansave->client_id =$clientid;
            $physiciansave->save();




            if ($request->hasFile('imageid')) {
                $image_tmp = $request->file('imageid');
                if ($image_tmp->isValid()) {
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = $request['lastname']  .  $clientid  . 'pwd.' . $extension;
                    $large_image_path = 'images/id/' . $filename;
                    Image::make($image_tmp)->save($large_image_path);

                    // Store image name in products table
                    $requirementsave = new ClientApplicationRequirement();
        
                    $requirementsave->name = 'Valid ID';
                    $requirementsave->filename = $filename;
                    $requirementsave->client_application_id =$applicationsave->id;
                    $requirementsave->save();
                    
                }
            }

            if ($request->hasFile('imagebarangay')) {
                $image_tmp = $request->file('imagebarangay');
                if ($image_tmp->isValid()) {
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = $request['lastname']  .  $clientid  . 'pwd.' . $extension;
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
                    $filename = $request['lastname']  .  $clientid  . 'pwd.' . $extension;
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
            if ($request->hasFile('imagedisability')) {
                $image_tmp = $request->file('imagedisability');
                if ($image_tmp->isValid()) {
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = $request['lastname']  .  $clientid  . 'pwd.' . $extension;
                    $large_image_path = 'images/disability/' . $filename;
                    Image::make($image_tmp)->save($large_image_path);

                    // Store image name in products table
                    $requirementsave = new ClientApplicationRequirement();
        
                    $requirementsave->name = 'Certificate of Disability';
                    $requirementsave->filename = $filename;
                    $requirementsave->client_application_id =$applicationsave->id;
                    $requirementsave->save();
                    
                }
            }


            $clientapplication=ClientApplication::where('id',$applicationsave->id)->first();
            $clientdetails=Client::where('id',$clientid)->first();
    
            
            $details = [
                'title' => 'Mail from City Social Welfare and Development',
                'body' => 'Your reference number '
    
            ];
            Mail::to($clientdetails->email_address)->send(new ReferenceMail($details, $clientapplication, $clientdetails));
            

            session_start();
            $_SESSION['success'] ="success";
           
         
            return view('main/landing', [
                // Specify the base layout.
                // Eg: 'side-menu', 'simple-menu', 'top-menu', 'login'
                // The default value is 'side-menu'
    
                // 'layout' => 'side-menu'
            ])->with('success');
         
            
            exit;

           


         
          

        
    }
    
    public function createregisteredsoloparent(Request $request)
    {
       
     
       
        $latestreferencenumber = ClientApplication::where('id','DESC')->first();
        $dob = Carbon::parse($request->input('birthdate'))->format('Y-m-d');
      
          
        $clientid =  $request->input('clientid');
        $application_date= now()->toDateString('Ymd');
        $yearOnly=substr($application_date,0,4);
        $generator = Helper::IDGenerator(new ClientApplication,'application_reference_number',9,'SPID-'.$yearOnly,$yearOnly);
            $applicationsave = new ClientApplication();
        
            $applicationsave->application_date= now()->toDateString('Y-m-d');;
            $applicationsave->application_type = 'Solo Parent';
            $applicationsave->application_Status = 'Applied';
                   
                    
                      $applicationsave->application_reference_number = $generator;
                    
        
            $applicationsave->application_process = 'Online-Ongoing';
            $applicationsave->client_id =$clientid;
            $applicationsave->save();

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
                $educationsave->client_id =$clientid;
                $educationsave->save();
            
            }
    
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
                $familysave->client_id =$clientid;
                $familysave->save();
            
            }
          
            $organizationname =  $request->input('organizationname');
            $position =  $request->input('position');
            $commmunitydate =  $request->input('commmunitydate');
          
    
            foreach($organizationname  as $key => $value) {       
                $communitysave = new CommunityInvolvement();
                $communitysave ->organization_name = $value;
                $communitysave ->position = $position[$key];
                $communitysave ->date = $commmunitydate[$key];
                $communitysave->client_id =$clientid;
                $communitysave->save();
            
            }
    
            $seminarorganizationname =  $request->input('seminarorganizationname');
            $seminarposition =  $request->input('seminarposition');
            $seminardate =  $request->input('seminardate');
          
    
            foreach($seminarorganizationname  as $key => $value) {       
                $seminarsave = new SeminarTraining();
                $seminarsave ->organization_name = $value;
                $seminarsave ->position = $seminarposition[$key];
                $seminarsave ->date = $seminardate[$key];
                $seminarsave->client_id =$clientid;
                $seminarsave->save();
            
            }
    



            if ($request->hasFile('imageid')) {
                $image_tmp = $request->file('imageid');
                if ($image_tmp->isValid()) {
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = $request['lastname'] . '.' . $extension;
                    $large_image_path = 'images/id/' . $filename;
                    Image::make($image_tmp)->save($large_image_path);
    
                    // Store image name in products table
                    $requirementsave = new ClientApplicationRequirement();
        
                    $requirementsave->name = 'Valid ID';
                    $requirementsave->filename = $filename;
                    $requirementsave->client_application_id =$applicationsave->id;
                    $requirementsave->save();
                    
                }
            }
    
            if ($request->hasFile('imagebarangay')) {
                $image_tmp = $request->file('imagebarangay');
                if ($image_tmp->isValid()) {
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = $request['lastname']  .  $clientid  . 'soloparent.' . $extension;
                    $large_image_path = 'images/barangay' . $filename;
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
                    $filename = $request['lastname']  .  $clientid  . 'soloparent.' . $extension;
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
            if ($request->hasFile('imagebirth')) {
                $image_tmp = $request->file('imagebirth');
                if ($image_tmp->isValid()) {
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename =$request['lastname']  .  $clientid  . 'soloparent.' . $extension;
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

            $clientapplication=ClientApplication::where('id',$applicationsave->id)->first();
            $clientdetails=Client::where('id',$clientid)->first();
    
            
            $details = [
                'title' => 'Mail from City Social Welfare and Development',
                'body' => 'Your reference number '
    
            ];
            Mail::to($clientdetails->email_address)->send(new ReferenceMail($details, $clientapplication, $clientdetails));
            session_start();
                $_SESSION['success'] ="success";
               
             
                return view('main/landing', [
                    // Specify the base layout.
                    // Eg: 'side-menu', 'simple-menu', 'top-menu', 'login'
                    // The default value is 'side-menu'
        
                    // 'layout' => 'side-menu'
                ])->with('success');
             
                
                exit;

            
           


         
          

        
    }

    

    public function evaluatecitizen($clientid = null,$applicationid=null)
    {
       
       
        $applicationlogsave = new ClientApplicationLog();
     
        $applicationlogsave->process_name = 'Evaluation-Approved';
        $applicationlogsave->date= now()->toDateString('Y-m-d');
        $applicationlogsave->client_id = $clientid;
        $applicationlogsave->client_application_id = $applicationid;
     
        $applicationlogsave->save();

        ClientApplication::where('id',$applicationid)->where('application_type','=','Citizen')->update(['application_status'=>'EVALUATED-APPROVED']);


     
        session_start();
        $_SESSION['success'] ="success";
      
     
        
        return redirect()->back()->with('success');  
        exit;
    }
    
    public function approvecitizen(Request $request,$clientid = null,$applicationid=null)
    {
       
        $schedule = Carbon::parse($request->input('schedule'))->format('Y-m-d');
        $applicationlogsave = new ClientApplicationLog();
     
        $applicationlogsave->process_name = 'Approval-Approved';
        $applicationlogsave->date= now()->toDateString('Y-m-d');
        $applicationlogsave->client_id = $clientid;
        $applicationlogsave->client_application_id = $applicationid;
     
        $applicationlogsave->save();

        $clientschedulesave = new ClientSchedule();
     
        $clientschedulesave->date = $schedule;
        $clientschedulesave->date_created= now()->toDateString('Y-m-d');;
        $clientschedulesave->client_application_id = $applicationid;
     
        $clientschedulesave->save();

        ClientApplication::where('id',$applicationid)->where('application_type','=','Citizen')->update(['application_status'=>'APPROVAL-APPROVED']);

        $clientdetails=Client::where('id',$clientid)->first();

        
        $details = [
            'title' => 'Mail from City Social Welfare and Development',
            'body' => 'You are scheduled on'

        ];
        Mail::to($clientdetails->email_address)->send(new ScheduleMail($details, $clientschedulesave, $clientdetails));

       
        session_start();
        $_SESSION['success'] ="success";
      
     
        
        return redirect()->back()->with('success');  
        exit;
    }


    public function emailid(Request $request,$cardid = null)
    {
       
      
        $clientcarddetails=ClientCard::where('id',$cardid)->first();
        $clientdetails=Client::where('id',$clientcarddetails->client_id)->first();
        
        $details = [
            'title' => 'Mail from City Social Welfare and Development',
            'body' => 'Identification Card'

        ];
        Mail::to($clientdetails->email_address)->send(new IdMail($details, $clientcarddetails, $clientdetails));

       
        session_start();
        $_SESSION['success'] ="success";
      
     
        
        return redirect()->back()->with('success');  
        exit;
    }

    public function verifycitizen(Request $request,$clientid = null,$applicationid=null)
    {
       
       
        
        $applicationlogsave = new ClientApplicationLog();
      
        $applicationlogsave->process_name = 'Verification-Approved';
        $applicationlogsave->date= now()->toDateString('Y-m-d');
        $applicationlogsave->client_id = $clientid;
        $applicationlogsave->client_application_id = $applicationid;
        $applicationlogsave->save();

        $application_date= now()->toDateString('Ymd');
        $yearOnly=substr($application_date,0,4);
        $generator = Helper::IDGenerator(new ClientCard,'card_number',9,'RCID-'.$yearOnly,$yearOnly);
      

        $logo='/images/barangay/1senior.jpg';
        $path='images/qrcode/';
        $filename=time().$clientid.".png";
       
        $clientcardsave = new ClientCard();
     
        $clientcardsave->card_status = 'Active'; 
        $clientcardsave->card_type = 'Citizen';
        $clientcardsave->GUID = $filename;
        $id = Str::uuid();
        $hash = Hash::make(time());
        $clientcardsave->token = $id;
        $clientcardsave->card_number = $generator;
        $clientcardsave->client_application_id = $applicationid;
        $clientcardsave->client_id = $clientid;

     
        $clientcardsave->save();

        QrCode::format('png')->size(250)->generate('http://127.0.0.1:8000/verify/'.$clientcardsave->card_number.'/'.$clientcardsave->token, $path.$filename);


        ClientApplication::where('id',$applicationid)->where('application_type','=','Citizen')->update(['application_status'=>'VERIFY-RELEASED','application_process'=>'Online-Registered']);


        $clientdetails=Client::where('id',$clientid)->first();

        
        $details = [
            'title' => 'Mail from City Social Welfare and Development',
            'body' => 'You are scheduled on'

        ];
        Mail::to($clientdetails->email_address)->send(new CardMail($details, $clientcardsave, $clientdetails));

   
        session_start();
        $_SESSION['success'] ="success";
      
     
        
        return redirect()->back()->with('success');  
        exit;
    }


    public function savecapture(Request $request,$clientid = null,$applicationid=null)
    {

 
        // Get the incoming image data
        $image = $_POST["image"];
         
        // Remove image/jpeg from left side of image data
        // and get the remaining part
        $image = explode(";", $image)[1];
         
        // Remove base64 from left side of image data
        // and get the remaining part
        $image = explode(",", $image)[1];
         
        // Replace all spaces with plus sign (helpful for larger images)
        $image = str_replace(" ", "+", $image);
         
        // Convert back from base64
        $image = base64_decode($image);
        $large_image_path = 'images/birth/'.$image;
        Image::make($image)->save($large_image_path);
        
      
        session_start();
        $_SESSION['success'] ="success";
      
     
        
        return redirect()->back()->with('success');  
        exit;
    }

     

     
    public function declinecitizenevaluation(Request $request,$clientid = null,$applicationid=null)
    {
       
       
        if (DB::table('declined_clients')
           
        ->where('client_type','=','Citizen')
        ->where('client_application_id','=', $applicationid)
        
        
        ->exists())
        {

            DeclinedClient::where('id',$applicationid)->where('client_type','=','Citizen')->update(['decline_type' => $request->input('declinetype'),'decline_reason' => $request->input('declinereason'),'process_name' => 'Citizen-Evaluation']);
            ClientApplication::where('id',$applicationid)->where('application_type','=','Citizen')->update(['application_status'=>'EVALUATION-DECLINED']);
            $declinedclientid=DeclinedClient::where('client_application_id','=', $applicationid)->where('client_type','=','Citizen')->first();
            $declinedclientlogsave = new DeclinedClientLog();
     
        
            $declinedclientlogsave->date= now()->toDateString('Y-m-d');
            $declinedclientlogsave->process_name= 'Citizen-Evaluation';
            $declinedclientlogsave->decline_type =  $request->input('declinetype');
            $declinedclientlogsave->decline_reason =  $request->input('declinereason');
            $declinedclientlogsave->declined_client_id = $declinedclientid->id;
         
            $declinedclientlogsave->save();

            $clientapplication=ClientApplication::where('id',$applicationid)->first();
            $clientdetails=Client::where('id',$clientid)->first();
    
            
            $details = [
                'title' => 'Mail from City Social Welfare and Development',
                'body' => 'Your reference number '
    
            ];
            Mail::to($clientdetails->email_address)->send(new DeclineMail($details, $clientapplication, $clientdetails));

            session_start();
            $_SESSION['success'] ="success";
            return redirect()->back()->with('success');  
            exit;
    
        }
      
     else {
      
        $declinedclientsave = new DeclinedClient();
     
        
        $declinedclientsave->date= now()->toDateString('Y-m-d');
        $declinedclientsave->client_type= 'Citizen';
        $declinedclientsave->process_name= 'Citizen-Evaluation';
        $declinedclientsave->decline_type =  $request->input('declinetype');
        $declinedclientsave->decline_reason =  $request->input('declinereason');
        $declinedclientsave->client_application_id = $applicationid;
     
        $declinedclientsave->save();

        $declinedclientlogsave = new DeclinedClientLog();
     
        
        $declinedclientlogsave->date= now()->toDateString('Y-m-d');
        $declinedclientlogsave->process_name= 'Citizen-Evaluation';
        $declinedclientlogsave->decline_type =  $request->input('declinetype');
        $declinedclientlogsave->decline_reason =  $request->input('declinereason');
        $declinedclientlogsave->declined_client_id = $declinedclientsave->id;
     
        $declinedclientlogsave->save();


        ClientApplication::where('id',$applicationid)->where('application_type','=','Citizen')->update(['application_status'=>'EVALUATION-DECLINED']);


       
        
        $clientapplication=ClientApplication::where('id',$applicationid)->first();
        $clientdetails=Client::where('id',$clientid)->first();

        
        $details = [
            'title' => 'Mail from City Social Welfare and Development',
            'body' => 'Your reference number '

        ];
        Mail::to($clientdetails->email_address)->send(new DeclineMail($details, $clientapplication, $clientdetails));
        session_start();

        $_SESSION['success'] ="success";
       
     
        
        return redirect()->back()->with('success');  
        exit;
    }
}

    
    public function declinecitizenapproval(Request $request,$clientid = null,$applicationid=null)
    {
      
        if (DB::table('declined_clients')
           
        ->where('client_type','=','Citizen')
        ->where('client_application_id','=', $applicationid)
        
        
        ->exists())
        {

            DeclinedClient::where('id',$applicationid)->where('client_type','=','Citizen')->update(['decline_type' => $request->input('declinetype'),'decline_reason' => $request->input('declinereason'),'process_name' => 'Citizen-Approval']);
            ClientApplication::where('id',$applicationid)->where('application_type','=','Citizen')->update(['application_status'=>'APPROVAL-DECLINED']);
            $declinedclientid=DeclinedClient::where('client_application_id','=', $applicationid)->where('client_type','=','Citizen')->first();
            $declinedclientlogsave = new DeclinedClientLog();
     
        
            $declinedclientlogsave->date= now()->toDateString('Y-m-d');
            $declinedclientlogsave->process_name= 'Citizen-Approval';
            $declinedclientlogsave->decline_type =  $request->input('declinetype');
            $declinedclientlogsave->decline_reason =  $request->input('declinereason');
            $declinedclientlogsave->declined_client_id = $declinedclientid->id;
         
            $declinedclientlogsave->save();
            $clientapplication=ClientApplication::where('id',$applicationid)->first();
            $clientdetails=Client::where('id',$clientid)->first();
    
            
            $details = [
                'title' => 'Mail from City Social Welfare and Development',
                'body' => 'Your reference number '
    
            ];
            Mail::to($clientdetails->email_address)->send(new DeclineMail($details, $clientapplication, $clientdetails));

            session_start();
            $_SESSION['success'] ="success";
            return redirect()->back()->with('success');  
            exit;
        }
      
     else {
       

        $declinedclientsave = new DeclinedClient();
        
        $declinedclientsave->date= now()->toDateString('Y-m-d');
        $declinedclientsave->client_type= 'Citizen';
        $declinedclientsave->process_name= 'Citizen-Approval';
        $declinedclientsave->decline_type =  $request->input('declinetype');
        $declinedclientsave->decline_reason =  $request->input('declinereason');
        $declinedclientsave->client_application_id = $applicationid;
     
        $declinedclientsave->save();

        $declinedclientlogsave = new DeclinedClientLog();
     
        
        $declinedclientlogsave->date= now()->toDateString('Y-m-d');
        $declinedclientlogsave->process_name= 'Citizen-Approval';
        $declinedclientlogsave->decline_type =  $request->input('declinetype');
        $declinedclientlogsave->decline_reason =  $request->input('declinereason');
        $declinedclientlogsave->declined_client_id = $declinedclientsave->id;
     
        $declinedclientlogsave->save();


        ClientApplication::where('id',$applicationid)->where('application_type','=','Citizen')->update(['application_status'=>'APPROVAL-DECLINED']);


        $clientapplication=ClientApplication::where('id',$applicationid)->first();
        $clientdetails=Client::where('id',$clientid)->first();

        
        $details = [
            'title' => 'Mail from City Social Welfare and Development',
            'body' => 'Your reference number '

        ];
        Mail::to($clientdetails->email_address)->send(new DeclineMail($details, $clientapplication, $clientdetails));

        session_start();
        $_SESSION['success'] ="success";
        return redirect()->back()->with('success');  
        exit;
     }
    }

    
    public function declinecitizenverification(Request $request,$clientid = null,$applicationid=null)
    {
       
       
        if (DB::table('declined_clients')
           
        ->where('client_type','=','Citizen')
        ->where('client_application_id','=', $applicationid)
        
        
        ->exists())
        {

            DeclinedClient::where('id',$applicationid)->where('client_type','=','Citizen')->update(['decline_type' => $request->input('declinetype'),'decline_reason' => $request->input('declinereason'),'process_name' => 'Citizen-Verification']);
            ClientApplication::where('id',$applicationid)->where('application_type','=','Citizen')->update(['application_status'=>'VERIFICATION-DECLINED']);
            $declinedclientid=DeclinedClient::where('client_application_id','=', $applicationid)->where('client_type','=','Citizen')->first();
            $declinedclientlogsave = new DeclinedClientLog();
     
        
            $declinedclientlogsave->date= now()->toDateString('Y-m-d');
            $declinedclientlogsave->process_name= 'Citizen-Verification';
            $declinedclientlogsave->decline_type =  $request->input('declinetype');
            $declinedclientlogsave->decline_reason =  $request->input('declinereason');
            $declinedclientlogsave->declined_client_id = $declinedclientid->id;
         
            $declinedclientlogsave->save();
            $clientapplication=ClientApplication::where('id',$applicationid)->first();
            $clientdetails=Client::where('id',$clientid)->first();
    
            
            $details = [
                'title' => 'Mail from City Social Welfare and Development',
                'body' => 'Your reference number '
    
            ];
            Mail::to($clientdetails->email_address)->send(new DeclineMail($details, $clientapplication, $clientdetails));

            session_start();
            $_SESSION['success'] ="success";
            return redirect()->back()->with('success');  
            exit;
        }
      
     else {

        $declinedclientsave = new DeclinedClient();
     
        
        $declinedclientsave->date= now()->toDateString('Y-m-d');
        $declinedclientsave->client_type= 'Citizen';
        $declinedclientsave->process_name= 'Citizen-Verification';
        $declinedclientsave->decline_type =  $request->input('declinetype');
        $declinedclientsave->decline_reason =  $request->input('declinereason');
        $declinedclientsave->client_application_id = $applicationid;
     
        $declinedclientsave->save();

        $declinedclientlogsave = new DeclinedClientLog();
     
        
        $declinedclientlogsave->date= now()->toDateString('Y-m-d');
        $declinedclientlogsave->process_name= 'Citizen-Verification';
        $declinedclientlogsave->decline_type =  $request->input('declinetype');
        $declinedclientlogsave->decline_reason =  $request->input('declinereason');
        $declinedclientlogsave->declined_client_id = $declinedclientsave->id;
     
        $declinedclientlogsave->save();


        ClientApplication::where('id',$applicationid)->where('application_type','=','Citizen')->update(['application_status'=>'VERIFICATION-DECLINED']);


       
        $clientapplication=ClientApplication::where('id',$applicationid)->first();
        $clientdetails=Client::where('id',$clientid)->first();

        
        $details = [
            'title' => 'Mail from City Social Welfare and Development',
            'body' => 'Your reference number '

        ];
        Mail::to($clientdetails->email_address)->send(new DeclineMail($details, $clientapplication, $clientdetails));

        session_start();
        $_SESSION['success'] ="success";
        return redirect()->back()->with('success');  
        exit;
    }
}

    public function evaluatesenior($clientid = null,$applicationid=null)
    {
       
       
        $applicationlogsave = new ClientApplicationLog();
     
        $applicationlogsave->process_name = 'Evaluation-Approved';
        $applicationlogsave->date= now()->toDateString('Y-m-d');
        $applicationlogsave->client_id = $clientid;
        $applicationlogsave->client_application_id = $applicationid;
     
        $applicationlogsave->save();

        ClientApplication::where('id',$applicationid)->where('application_type','=','Senior')->update(['application_status'=>'EVALUATED-APPROVED']);


       
        session_start();
        $_SESSION['success'] ="success";
       
     
        
        return redirect()->back()->with('success');  
        exit;
    }
    
    public function approvesenior(Request $request,$clientid = null,$applicationid=null)
    {
        
        $schedule = Carbon::parse($request->input('schedule'))->format('Y-m-d');
        $applicationlogsave = new ClientApplicationLog();
     
        $applicationlogsave->process_name = 'Approval-Approved';
        $applicationlogsave->date= now()->toDateString('Y-m-d');;
        $applicationlogsave->client_id = $clientid;
        $applicationlogsave->client_application_id = $applicationid;
     
        $applicationlogsave->save();

        $clientschedulesave = new ClientSchedule();
     
        $clientschedulesave->date = $schedule;
        $clientschedulesave->date_created= now()->toDateString('Y-m-d');
        $clientschedulesave->client_application_id = $applicationid;
     
        $clientschedulesave->save();

        $clientdetails=Client::where('id',$clientid)->first();

        ClientApplication::where('id',$applicationid)->where('application_type','=','Senior')->update(['application_status'=>'APPROVAL-APPROVED']);
        $details = [
            'title' => 'Mail from City Social Welfare and Development',
            'body' => 'You are scheduled on'

        ];
        Mail::to($clientdetails->email_address)->send(new ScheduleMail($details, $clientschedulesave, $clientdetails));

       
     
        session_start();
        $_SESSION['success'] ="success";
      
     
        return redirect()->back()->with('success');  
        exit;
    }

    public function verifysenior(Request $request,$clientid = null,$applicationid=null)
    {
       
    
        $applicationlogsave = new ClientApplicationLog();
     
        $applicationlogsave->process_name = 'Verification-Approved';
        $applicationlogsave->date= now()->toDateString('Y-m-d');
        $applicationlogsave->client_id = $clientid;
        $applicationlogsave->client_application_id = $applicationid;
      
        $applicationlogsave->save();

        $application_date= now()->toDateString('Ymd');
        $yearOnly=substr($application_date,0,4);
        $generator = Helper::IDGenerator(new ClientCard,'card_number',9,'RSID-'.$yearOnly,$yearOnly);
      
        $logo='/images/barangay/1senior.jpg';
        $path='images/qrcode/';
        $filename=time().$clientid.".png";
       
        $clientcardsave = new ClientCard();
     
        $clientcardsave->card_status = 'Active'; 
        $clientcardsave->card_type = 'Senior';
        $clientcardsave->GUID = $filename;
        $id = Str::uuid();
        $hash = Hash::make(time());
        $clientcardsave->token = $id;
        $clientcardsave->card_number = $generator;
        $clientcardsave->client_application_id = $applicationid;
        $clientcardsave->client_id = $clientid;

     
        $clientcardsave->save();

        QrCode::format('png')->size(250)->generate('http://127.0.0.1:8000/verify/'.$clientcardsave->card_number.'/'.$clientcardsave->token, $path.$filename);


     
        $clientcardsave->save();

        ClientApplication::where('id',$applicationid)->where('application_type','=','Senior')->update(['application_status'=>'VERIFY-RELEASED','application_process'=>'Online-Registered']);


        $clientdetails=Client::where('id',$clientid)->first();

        
        $details = [
            'title' => 'Mail from City Social Welfare and Development',
            'body' => 'You are scheduled on'

        ];
        Mail::to($clientdetails->email_address)->send(new CardMail($details, $clientcardsave, $clientdetails));


       
        session_start();
        $_SESSION['success'] ="success";
      
     
        
        return redirect()->back()->with('success');  
        exit;
    }

    public function declineseniorevaluation(Request $request,$clientid = null,$applicationid=null)
    {
        if (DB::table('declined_clients')
           
        ->where('client_type','=','Senior')
        ->where('client_application_id','=', $applicationid)
        
        
        ->exists())
        {

            DeclinedClient::where('id',$applicationid)->where('client_type','=','Senior')->update(['decline_type' => $request->input('declinetype'),'decline_reason' => $request->input('declinereason'),'process_name' => 'Senior-Evaluation']);
            ClientApplication::where('id',$applicationid)->where('application_type','=','Senior')->update(['application_status'=>'EVALUATION-DECLINED']);
            $declinedclientid=DeclinedClient::where('client_application_id','=', $applicationid)->where('client_type','=','Senior')->first();
            $declinedclientlogsave = new DeclinedClientLog();
     
        
            $declinedclientlogsave->date= now()->toDateString('Y-m-d');
            $declinedclientlogsave->process_name= 'Senior-Evaluation';
            $declinedclientlogsave->decline_type =  $request->input('declinetype');
            $declinedclientlogsave->decline_reason =  $request->input('declinereason');
            $declinedclientlogsave->declined_client_id = $declinedclientid->id;
         
            $declinedclientlogsave->save();

            $clientapplication=ClientApplication::where('id',$applicationid)->first();
            $clientdetails=Client::where('id',$clientid)->first();
    
            
            $details = [
                'title' => 'Mail from City Social Welfare and Development',
                'body' => 'Your reference number '
    
            ];
            Mail::to($clientdetails->email_address)->send(new DeclineMail($details, $clientapplication, $clientdetails));

            session_start();
            $_SESSION['success'] ="success";
            return redirect()->back()->with('success');  
            exit;
        }
      
     else {
       

        $declinedclientsave = new DeclinedClient();
     
        
        $declinedclientsave->date= now()->toDateString('Y-m-d');
        $declinedclientsave->client_type= 'Senior';
        $declinedclientsave->process_name= 'Senior-Evaluation';
        $declinedclientsave->decline_type =  $request->input('declinetype');
        $declinedclientsave->decline_reason =  $request->input('declinereason');
        $declinedclientsave->client_application_id = $applicationid;
     
        $declinedclientsave->save();

        $declinedclientlogsave = new DeclinedClientLog();
     
        
        $declinedclientlogsave->date= now()->toDateString('Y-m-d');
        $declinedclientlogsave->process_name= 'Senior-Evaluation';
        $declinedclientlogsave->decline_type =  $request->input('declinetype');
        $declinedclientlogsave->decline_reason =  $request->input('declinereason');
        $declinedclientlogsave->declined_client_id = $declinedclientsave->id;
     
        $declinedclientlogsave->save();


        ClientApplication::where('id',$applicationid)->where('application_type','=','Senior')->update(['application_status'=>'EVALUATION-DECLINED']);


       
        $clientapplication=ClientApplication::where('id',$applicationid)->first();
            $clientdetails=Client::where('id',$clientid)->first();
    
            
            $details = [
                'title' => 'Mail from City Social Welfare and Development',
                'body' => 'Your reference number '
    
            ];
            Mail::to($clientdetails->email_address)->send(new DeclineMail($details, $clientapplication, $clientdetails));

            session_start();
            $_SESSION['success'] ="success";
            return redirect()->back()->with('success');  
            exit;
    }
}
    
    public function declineseniorapproval(Request $request,$clientid = null,$applicationid=null)
    {
       
        if (DB::table('declined_clients')
           
        ->where('client_type','=','Senior')
        ->where('client_application_id','=', $applicationid)
        
        
        ->exists())
        {

            DeclinedClient::where('id',$applicationid)->where('client_type','=','Senior')->update(['decline_type' => $request->input('declinetype'),'decline_reason' => $request->input('declinereason'),'process_name' => 'Senior-Approval']);
            ClientApplication::where('id',$applicationid)->where('application_type','=','Senior')->update(['application_status'=>'APPROVAL-DECLINED']);
            $declinedclientid=DeclinedClient::where('client_application_id','=', $applicationid)->where('client_type','=','Senior')->first();
            $declinedclientlogsave = new DeclinedClientLog();
     
        
            $declinedclientlogsave->date= now()->toDateString('Y-m-d');
            $declinedclientlogsave->process_name= 'Senior-Approval';
            $declinedclientlogsave->decline_type =  $request->input('declinetype');
            $declinedclientlogsave->decline_reason =  $request->input('declinereason');
            $declinedclientlogsave->declined_client_id = $declinedclientid->id;
         
            $declinedclientlogsave->save();

            $clientapplication=ClientApplication::where('id',$applicationid)->first();
            $clientdetails=Client::where('id',$clientid)->first();
    
            
            $details = [
                'title' => 'Mail from City Social Welfare and Development',
                'body' => 'Your reference number '
    
            ];
            Mail::to($clientdetails->email_address)->send(new DeclineMail($details, $clientapplication, $clientdetails));

            session_start();
            $_SESSION['success'] ="success";
            return redirect()->back()->with('success');  
            exit;
        }
      
     else {
       

        $declinedclientsave = new DeclinedClient();
     
        
        $declinedclientsave->date= now()->toDateString('Y-m-d');
        $declinedclientsave->client_type= 'Senior';
        $declinedclientsave->process_name= 'Senior-Approval';
        $declinedclientsave->decline_type =  $request->input('declinetype');
        $declinedclientsave->decline_reason =  $request->input('declinereason');
        $declinedclientsave->client_application_id = $applicationid;
     
        $declinedclientsave->save();

        $declinedclientlogsave = new DeclinedClientLog();
     
        
        $declinedclientlogsave->date= now()->toDateString('Y-m-d');
        $declinedclientlogsave->process_name= 'Senior-Approval';
        $declinedclientlogsave->decline_type =  $request->input('declinetype');
        $declinedclientlogsave->decline_reason =  $request->input('declinereason');
        $declinedclientlogsave->declined_client_id = $declinedclientsave->id;
     
        $declinedclientlogsave->save();


        ClientApplication::where('id',$applicationid)->where('application_type','=','Senior')->update(['application_status'=>'APPROVAL-DECLINED']);


       
        $clientapplication=ClientApplication::where('id',$applicationid)->first();
        $clientdetails=Client::where('id',$clientid)->first();

        
        $details = [
            'title' => 'Mail from City Social Welfare and Development',
            'body' => 'Your reference number '

        ];
        Mail::to($clientdetails->email_address)->send(new DeclineMail($details, $clientapplication, $clientdetails));

        session_start();
        $_SESSION['success'] ="success";
        return redirect()->back()->with('success');  
        exit;
    }
}
    
    public function declineseniorverification(Request $request,$clientid = null,$applicationid=null)
    {
       
       
        if (DB::table('declined_clients')
           
        ->where('client_type','=','Senior')
        ->where('client_application_id','=', $applicationid)
        
        
        ->exists())
        {

            DeclinedClient::where('id',$applicationid)->where('client_type','=','Senior')->update(['decline_type' => $request->input('declinetype'),'decline_reason' => $request->input('declinereason'),'process_name' => 'Senior-Verification']);
            ClientApplication::where('id',$applicationid)->where('application_type','=','Senior')->update(['application_status'=>'VERIFICATION-DECLINED']);
            $declinedclientid=DeclinedClient::where('client_application_id','=', $applicationid)->where('client_type','=','Senior')->first();
            $declinedclientlogsave = new DeclinedClientLog();
     
        
            $declinedclientlogsave->date= now()->toDateString('Y-m-d');
            $declinedclientlogsave->process_name= 'Senior-Verification';
            $declinedclientlogsave->decline_type =  $request->input('declinetype');
            $declinedclientlogsave->decline_reason =  $request->input('declinereason');
            $declinedclientlogsave->declined_client_id = $declinedclientid->id;
         
            $declinedclientlogsave->save();
            $clientapplication=ClientApplication::where('id',$applicationid)->first();
            $clientdetails=Client::where('id',$clientid)->first();
    
            
            $details = [
                'title' => 'Mail from City Social Welfare and Development',
                'body' => 'Your reference number '
    
            ];
            Mail::to($clientdetails->email_address)->send(new DeclineMail($details, $clientapplication, $clientdetails));

            session_start();
            $_SESSION['success'] ="success";
            return redirect()->back()->with('success');  
            exit;
        }
      
     else {
        $declinedclientsave = new DeclinedClient();
     
        
        $declinedclientsave->date= now()->toDateString('Y-m-d');
        $declinedclientsave->client_type= 'Senior';
        $declinedclientsave->process_name= 'Senior-Verification';
        $declinedclientsave->decline_type =  $request->input('declinetype');
        $declinedclientsave->decline_reason =  $request->input('declinereason');
        $declinedclientsave->client_application_id = $applicationid;
     
        $declinedclientsave->save();

        $declinedclientlogsave = new DeclinedClientLog();
     
        
        $declinedclientlogsave->date= now()->toDateString('Y-m-d');
        $declinedclientlogsave->process_name= 'Senior-Verification';
        $declinedclientlogsave->decline_type =  $request->input('declinetype');
        $declinedclientlogsave->decline_reason =  $request->input('declinereason');
        $declinedclientlogsave->declined_client_id = $declinedclientsave->id;
     
        $declinedclientlogsave->save();


        ClientApplication::where('id',$applicationid)->where('application_type','=','Senior')->update(['application_status'=>'VERIFICATION-DECLINED']);


       
        $clientapplication=ClientApplication::where('id',$applicationid)->first();
        $clientdetails=Client::where('id',$clientid)->first();

        
        $details = [
            'title' => 'Mail from City Social Welfare and Development',
            'body' => 'Your reference number '

        ];
        Mail::to($clientdetails->email_address)->send(new DeclineMail($details, $clientapplication, $clientdetails));

        session_start();
        $_SESSION['success'] ="success";
        return redirect()->back()->with('success');  
        exit;
    }
}

    public function storesenior(Request $request, $id = null)
    {
       
      
       
        $latestreferencenumber = ClientApplication::where('id','DESC')->first();
        $dob = Carbon::parse($request->input('birthdate'))->format('Y-m-d');

      

        $client= Client::where('first_name','=',$request->input('firstname'))->where('last_name','=',$request->input('lastname'))->where('middle_name','=',$request->input('middlename'))->where('birth_date','=', $request->input('birthdate'))->first();

       
        if ($client == null)
            {

                $application_date= now()->toDateString('Ymd');
                $yearOnly=substr($application_date,0,4);
                $generator = Helper::IDGenerator(new ClientApplication,'application_reference_number',9,'CID-'.$yearOnly,$yearOnly);
                        $clientsave = new Client();
                    
                        $clientsave->first_name = $request->input('firstname');
                        $clientsave->last_name = $request->input('lastname');
                        $clientsave->middle_name = $request->input('middlename');
                        $clientsave->extension_name = $request->input('extensionname');
                        $clientsave->sex = $request->input('gender');
                        $clientsave->blood_type = $request->input('bloodtype');
                        $clientsave->civil_status = $request->input('civilstatus');
                        $clientsave->nationality = $request->input('nationality');
                        $clientsave->religion = $request->input('religion');
                        $clientsave->birth_date =$dob;
                        $clientsave->birth_place = $request->input('birthplace');
                        $clientsave->email_address= $request->input('emailaddress');
                        $clientsave->contact_number = $request->input('mobilenumber');
                        $clientsave->landline_number = $request->input('landlinenumber');
                        $clientsave->street = $request->input('street');
                        $clientsave->barangay_id = $request->input('barangay'); ;
                        $clientsave->municipality= $request->input('city');
                        $clientsave->region = $request->input('region');
                        $clientsave->province= $request->input('province');
                        $clientsave->educational_attainment = $request->input('education');
                        $clientsave->skills_talents= $request->input('skill');
                        $clientsave->hobbies= $request->input('hobbies');
                        $clientsave->educational_attainment= $request->input('educationalattainment');
                        $clientsave->save();

                        $applicationsave = new ClientApplication();
                    
                        $applicationsave->application_date= now()->toDateString('Y-m-d');;
                        $applicationsave->application_type = 'Citizen';
                        $applicationsave->application_Status = 'Applied';
                              
                                    $applicationsave->application_reference_number = $generator;
                               
                    
                        $applicationsave->application_process = 'Online-Ongoing';
                        $applicationsave->client_id =$clientsave->id;
                        $applicationsave->save();


                        $application_date1= now()->toDateString('Ymd');
                        $yearOnly1=substr($application_date1,0,4);
                        $generator1 = Helper::IDGenerator(new ClientApplication,'application_reference_number',9,'SID-'.$yearOnly1,$yearOnly1);
                        $applicationsave = new ClientApplication();
                    
                        $applicationsave->application_date= now()->toDateString('Y-m-d');;
                        $applicationsave->application_type = 'Senior';
                        $applicationsave->application_Status = 'Applied';
                              
                                    $applicationsave->application_reference_number =  $generator1;
                               
                    
                        $applicationsave->application_process = 'Online-Ongoing';
                        $applicationsave->client_id =$clientsave->id;
                        $applicationsave->save();


                        $occupationsave = new Occupation();
                    
                        $occupationsave->employment_status = $request->input('employmentstatus');
                        $occupationsave->employment_type = $request->input('employmenttype');
                        $occupationsave->employment_category = $request->input('employmentcategory');
                        $occupationsave->occupation = $request->input('occupation');
                        $occupationsave->salary = $request->input('salary');
                        $occupationsave->others = $request->input('othersoccupation');
                        $occupationsave->client_id =$clientsave->id;
                        $occupationsave->save();
                        
                        if ($request->hasFile('imagebirth')) {
                            $image_tmp = $request->file('imagebirth');
                            if ($image_tmp->isValid()) {
                                $extension = $image_tmp->getClientOriginalExtension();
                                $filename = $request['lastname']  .  $clientsave->id  . 'senior.' . $extension;
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
                                $filename = $request['lastname']  .  $clientsave->id  . 'senior.' . $extension;
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
                                $filename = $request['lastname']  .  $clientsave->id  . 'senior.' . $extension;
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

                        $clientapplication=ClientApplication::where('id',$applicationsave->id)->first();
                        $clientdetails=Client::where('id',$clientsave->id)->first();
                
                        
                        $details = [
                            'title' => 'Mail from City Social Welfare and Development',
                            'body' => 'Your reference number '
                
                        ];
                        Mail::to($clientdetails->email_address)->send(new ReferenceMail($details, $clientapplication, $clientdetails)); 


                            session_start();
                            $_SESSION['success'] ="success";
                        
                        
                            return view('main/landing', [
                                // Specify the base layout.
                                // Eg: 'side-menu', 'simple-menu', 'top-menu', 'login'
                                // The default value is 'side-menu'
                    
                                // 'layout' => 'side-menu'
                            ])->with('success');
                        
                            
                            exit;
                        
                        
                        
            }
          
         else {


                    // $clientapplication= Client::where('first_name','=',$request->input('firstname'))->where('last_name','=',$request->input('lastname'))->where('middle_name','=',$request->input('middlename'))->whereHas("client_applications", function($subQuery) use ($request)  {
                    //     $subQuery->where("client_applications.application_type", "=", 'Senior'); 
                    // })->with(["client_applications" => function($subQuery) use ($request){
                    //     $subQuery->where("client_applications.application_type", "=", 'Senior'); 
                    // }])->first();

                    // if($clientapplication == null)
                    // {

                    //     $applicationsave = new ClientApplication();
            
                    //     $applicationsave->application_date= now()->toDateString('Y-m-d');;
                    //     $applicationsave->application_type = 'Senior';
                    //     $applicationsave->application_Status = 'Applied';
                    //             if($latestreferencenumber===null)
                    //             {
                    //                 $applicationsave->application_reference_number = '#'.str_pad( 1, 8, "0", STR_PAD_LEFT);;
                    //             }
                    //             else
                    //             {
                    //                 $applicationsave->application_reference_number = '#'.str_pad($latestreferencenumber->application_reference_number  + 1, 8, "0", STR_PAD_LEFT);
                    //             }
                    
                    //     $applicationsave->application_process = 'Online-Ongoing';
                    //     $applicationsave->client_id =$clientapplication->id;
                    //     $applicationsave->save();

                        
                    //         if ($request->hasFile('imagebirth')) {
                    //             $image_tmp = $request->file('imagebirth');
                    //             if ($image_tmp->isValid()) {
                    //                 $extension = $image_tmp->getClientOriginalExtension();
                    //                 $filename = $request['lastname']  .  $clientapplication->id  . 'senior.' . $extension;
                    //                 $large_image_path = 'images/birth/' . $filename;
                    //                 Image::make($image_tmp)->save($large_image_path);

                    //                 // Store image name in products table
                    //                 $requirementsave = new ClientApplicationRequirement();
                        
                    //                 $requirementsave->name = 'Birth Certificate';
                    //                 $requirementsave->filename = $filename;
                    //                 $requirementsave->client_application_id =$applicationsave->id;
                    //                 $requirementsave->save();
                                    
                    //             }
                    //         }

                    //         if ($request->hasFile('imagebarangay')) {
                    //             $image_tmp = $request->file('imagebarangay');
                    //             if ($image_tmp->isValid()) {
                    //                 $extension = $image_tmp->getClientOriginalExtension();
                    //                 $filename = $request['lastname']  .  $clientapplication->id  . 'senior.' . $extension;
                    //                 $large_image_path = 'images/barangay/' . $filename;
                    //                 Image::make($image_tmp)->save($large_image_path);

                    //                 // Store image name in products table
                    //                 $requirementsave = new ClientApplicationRequirement();
                        
                    //                 $requirementsave->name = 'Barangay Certificate';
                    //                 $requirementsave->filename = $filename;
                    //                 $requirementsave->client_application_id =$applicationsave->id;
                    //                 $requirementsave->save();
                                    
                    //             }
                    //         }

                    //         if ($request->hasFile('imagepicture')) {
                    //             $image_tmp = $request->file('imagepicture');
                    //             if ($image_tmp->isValid()) {
                    //                 $extension = $image_tmp->getClientOriginalExtension();
                    //                 $filename = $request['lastname']  .  $clientapplication->id  . 'senior.' . $extension;
                    //                 $large_image_path = 'images/picture/' . $filename;
                    //                 Image::make($image_tmp)->save($large_image_path);

                    //                 // Store image name in products table
                    //                 $requirementsave = new ClientApplicationRequirement();
                        
                    //                 $requirementsave->name = 'Picture';
                    //                 $requirementsave->filename = $filename;
                    //                 $requirementsave->client_application_id =$applicationsave->id;
                    //                 $requirementsave->save();
                                    
                    //             }

                    //         }


                    // }
                    // else
                    // {
                        session_start();
                        $_SESSION['fail'] ="fail";
                       
                     
                        return view('main/landing', [
                            // Specify the base layout.
                            // Eg: 'side-menu', 'simple-menu', 'top-menu', 'login'
                            // The default value is 'side-menu'
                
                            // 'layout' => 'side-menu'
                        ])->with('fail');
                     
                        
                        exit;

                    // }

            





         
          

            }
   }

   public function storeregistered(Request $request, $id = null)
    {
       
      
       
        $latestreferencenumber = ClientApplication::where('id','DESC')->first();
        $dob = Carbon::parse($request->input('birthdate'))->format('Y-m-d');
        if (DB::table('clients')
           
            ->where('last_name','=', $request->input('lastname'))
            ->where('first_name','=', $request->input('firstname'))
            ->where('middle_name','=', $request->input('middlename'))
            ->where('extension_name','=', $request->input('extensionname'))
            ->where('birth_date','=', $request->input('birthdate'))
            
            ->exists())
            {
                session_start();
                $_SESSION['fail'] ="fail";
                return redirect()->back()->with('fail');   
                exit;
            }
          
         else {
         
            $clientsave = new Client();
        
            $clientsave->first_name = $request->input('firstname');
            $clientsave->last_name = $request->input('lastname');
            $clientsave->middle_name = $request->input('middlename');
            $clientsave->extension_name = $request->input('extensionname');
            $clientsave->sex = $request->input('gender');
            $clientsave->blood_type = $request->input('bloodtype');
            $clientsave->civil_status = $request->input('civilstatus');
            $clientsave->nationality = $request->input('nationality');
            $clientsave->religion = $request->input('religion');
            $clientsave->birth_date =$dob;
            $clientsave->birth_place = $request->input('birthplace');
            $clientsave->email_address= $request->input('emailaddress');
            $clientsave->contact_number = $request->input('mobilenumber');
            $clientsave->landline_number = $request->input('landlinenumber');
            $clientsave->street = $request->input('street');
            $clientsave->barangay_id = $request->input('barangay'); ;
            $clientsave->municipality= $request->input('city');
            $clientsave->region = $request->input('region');
            $clientsave->province= $request->input('province');
            $clientsave->educational_attainment = $request->input('education');
            $clientsave->skills_talents= $request->input('skill');
            $clientsave->hobbies= $request->input('hobbies');
            $clientsave->educational_attainment= $request->input('educationalattainment');
            $clientsave->save();

            $applicationsave = new ClientApplication();
                    
            $applicationsave->application_date= now()->toDateString('Y-m-d');;
            $applicationsave->application_type = 'Citizen';
            $applicationsave->application_Status = 'Applied';
                    if($latestreferencenumber===null)
                    {
                        $applicationsave->application_reference_number = '#'.str_pad( 1, 8, "0", STR_PAD_LEFT);;
                    }
                    else
                    {
                        $applicationsave->application_reference_number = '#'.str_pad($latestreferencenumber->application_reference_number  + 1, 8, "0", STR_PAD_LEFT);
                    }
        
            $applicationsave->application_process = 'Online-Ongoing';
            $applicationsave->client_id =$clientsave->id;
            $applicationsave->save();


            $applicationsave = new ClientApplication();
        
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
        
            $applicationsave->application_process = 'Online-Ongoing';
            $applicationsave->client_id =$clientsave->id;
            $applicationsave->save();


            $occupationsave = new Occupation();
        
            $occupationsave->employment_status = $request->input('employmentstatus');
            $occupationsave->employment_type = $request->input('employmenttype');
            $occupationsave->employment_category = $request->input('employmentcategory');
            $occupationsave->occupation = $request->input('occupation');
            $occupationsave->salary = $request->input('salary');
            $occupationsave->others = $request->input('othersoccupation');
            $occupationsave->client_id =$clientsave->id;
            $occupationsave->save();
            
            if ($request->hasFile('imagebirth')) {
                $image_tmp = $request->file('imagebirth');
                if ($image_tmp->isValid()) {
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = $request['lastname']  .  $clientsave->id  . 'senior.' . $extension;
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
                    $filename = $request['lastname']  .  $clientsave->id  . 'senior.' . $extension;
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
                    $filename = $request['lastname']  .  $clientsave->id  . 'senior.' . $extension;
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

            $clientapplication=ClientApplication::where('id',$applicationsave->id)->first();
            $clientdetails=Client::where('id',$clientsave->id)->first();
    
            
            $details = [
                'title' => 'Mail from City Social Welfare and Development',
                'body' => 'Your reference number '
    
            ];
            Mail::to($clientdetails->email_address)->send(new ReferenceMail($details, $clientapplication, $clientdetails));

            session_start();
            $_SESSION['success'] ="success";
           
         
            return redirect()->back()->with('success');  
            exit;
          

    }
   }



   
    public function storepwd(Request $request, $id = null)
    {
       
      
      
        $latestreferencenumber = ClientApplication::where('id','DESC')->first();
        $dob = Carbon::parse($request->input('birthdate'))->format('Y-m-d');
        $client= Client::where('first_name','=',$request->input('firstname'))->where('last_name','=',$request->input('lastname'))->where('middle_name','=',$request->input('middlename'))->where('birth_date','=', $request->input('birthdate'))->first();
         
       
        if ($client == null)
            {

                $application_date= now()->toDateString('Ymd');
                $yearOnly=substr($application_date,0,4);
                $generator = Helper::IDGenerator(new ClientApplication,'application_reference_number',9,'CID-'.$yearOnly,$yearOnly);
                $clientsave = new Client();
            
                $clientsave->first_name = $request->input('firstname');
                $clientsave->last_name = $request->input('lastname');
                $clientsave->middle_name = $request->input('middlename');
                $clientsave->extension_name = $request->input('extensionname');
                $clientsave->sex = $request->input('gender');
                $clientsave->blood_type = $request->input('bloodtype');
                $clientsave->civil_status = $request->input('civilstatus');
                $clientsave->nationality = $request->input('nationality');
                $clientsave->religion = $request->input('religion');
                $clientsave->birth_date =$dob;
                $clientsave->birth_place = $request->input('birthplace');
                $clientsave->email_address= $request->input('emailaddress');
                $clientsave->contact_number = $request->input('mobilenumber');
                $clientsave->landline_number = $request->input('landlinenumber');
                $clientsave->street = $request->input('street');
                $clientsave->barangay_id = $request->input('barangay'); ;
                $clientsave->municipality= $request->input('city');
                $clientsave->region = $request->input('region');
                $clientsave->province= $request->input('province');
                $clientsave->educational_attainment = $request->input('education');
                $clientsave->skills_talents= $request->input('skill');
                $clientsave->hobbies= $request->input('hobbies');
                $clientsave->educational_attainment= $request->input('educationalattainment');
                $clientsave->save();
                $applicationsave = new ClientApplication();
                    
                $applicationsave->application_date= now()->toDateString('Y-m-d');;
                $applicationsave->application_type = 'Citizen';
                $applicationsave->application_Status = 'Applied';
                        $applicationsave->application_reference_number = $generator;
                      
            
                $applicationsave->application_process = 'Online-Ongoing';
                $applicationsave->client_id =$clientsave->id;
                $applicationsave->save();

                $application_date1= now()->toDateString('Ymd');
                $yearOnly1=substr($application_date1,0,4);
                $generator1 = Helper::IDGenerator(new ClientApplication,'application_reference_number',9,'PID-'.$yearOnly1,$yearOnly1);
                $applicationsave = new ClientApplication();
            
                $applicationsave->application_date= now()->toDateString('Y-m-d');;
                $applicationsave->application_type = 'PWD';
                $applicationsave->application_Status = 'Applied';
                      
                            $applicationsave->application_reference_number = $generator1;
                     
            
                $applicationsave->application_process = 'Online-Ongoing';
                $applicationsave->client_id =$clientsave->id;
                $applicationsave->save();


                $occupationsave = new Occupation();
            
                $occupationsave->employment_status = $request->input('employmentstatus');
                $occupationsave->employment_type = $request->input('employmenttype');
                $occupationsave->employment_category = $request->input('employmentcategory');
                $occupationsave->occupation = $request->input('occupation');
                $occupationsave->salary = $request->input('salary');
                $occupationsave->others = $request->input('othersoccupation');
                $occupationsave->client_id =$clientsave->id;
                $occupationsave->save();

                $organizationsave = new Organization();
            
                $organizationsave->organization_affiliated = $request->input('organizationaffiliated');
                $organizationsave->contact_person = $request->input('contactperson');
                $organizationsave->office_address = $request->input('officeaddress');
                $organizationsave->contact_number = $request->input('contactnumber');
                $organizationsave->client_id =$clientsave->id;
                $organizationsave->save();

                $identificationcardsave = new IdentificationCard();
            
                $identificationcardsave->sss_number = $request->input('sssnumber');
                $identificationcardsave->gsis_number = $request->input('gsisnumber');
                $identificationcardsave->pagibig_number = $request->input('pagibignumber');
                $identificationcardsave->psn_number = $request->input('psnnumber');
                $identificationcardsave->philhealth_number = $request->input('philhealthnumber');
                $identificationcardsave->client_id =$clientsave->id;
                $identificationcardsave->save();


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
                    $familysave->client_id =$clientsave->id;
                    $familysave->save();
                
                }
                $type =  $request->input('type');
                foreach($type  as $key => $value) {       
                    $disabilitytypesave = new DisabilityType();
                    $disabilitytypesave ->name = $value;
                    $disabilitytypesave->client_id =$clientsave->id;
                    $disabilitytypesave->save();
                
                }

                $acquired =  $request->input('acquired');
                $othersacquired =  $request->input('othersacquired');
                foreach($acquired  as $key => $value) {       
                    $disabilitycausesave = new DisabilityCause();
                    $disabilitycausesave ->name = $value;
                    $disabilitycausesave ->type = 'Acquired';
                    $disabilitycausesave ->others = $othersacquired;
                    $disabilitycausesave->client_id =$clientsave->id;
                    $disabilitycausesave->save();
                
                }

                $inborn =  $request->input('inborn');
                $othersinborn =  $request->input('othersinborn');
                foreach($inborn  as $key => $value) {       
                    $disabilitycausesave = new DisabilityCause();
                    $disabilitycausesave ->name = $value;
                    $disabilitycausesave ->type = 'Congenital/Inborn';
                    $disabilitycausesave ->others = $othersinborn;
                    $disabilitycausesave->client_id =$clientsave->id;
                    $disabilitycausesave->save();
                
                }

                $physiciansave = new Physician();
            
                $physiciansave->license_number = $request->input('licensenumber');
                $physiciansave->first_name = $request->input('physicianfirstname');
                $physiciansave->last_name = $request->input('physicianlastname');
                $physiciansave->middle_name = $request->input('physicianmiddlename');
                $physiciansave->client_id =$clientsave->id;
                $physiciansave->save();

                if ($request->hasFile('imageid')) {
                    $image_tmp = $request->file('imageid');
                    if ($image_tmp->isValid()) {
                        $extension = $image_tmp->getClientOriginalExtension();
                        $filename = $request['lastname']  .  $clientsave->id  . 'pwd.' . $extension;
                        $large_image_path = 'images/id/' . $filename;
                        Image::make($image_tmp)->save($large_image_path);

                        // Store image name in products table
                        $requirementsave = new ClientApplicationRequirement();
            
                        $requirementsave->name = 'Valid ID';
                        $requirementsave->filename = $filename;
                        $requirementsave->client_application_id =$applicationsave->id;
                        $requirementsave->save();
                        
                    }
                }

                if ($request->hasFile('imagebarangay')) {
                    $image_tmp = $request->file('imagebarangay');
                    if ($image_tmp->isValid()) {
                        $extension = $image_tmp->getClientOriginalExtension();
                        $filename =$request['lastname']  .  $clientsave->id  . 'pwd.' . $extension;
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
                        $filename = $request['lastname']  .  $clientsave->id  . 'pwd.' . $extension;
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
                if ($request->hasFile('imagedisability')) {
                    $image_tmp = $request->file('imagedisability');
                    if ($image_tmp->isValid()) {
                        $extension = $image_tmp->getClientOriginalExtension();
                           $filename = $request['lastname']  .  $clientsave->id  . 'pwd.' . $extension;
                        $large_image_path = 'images/disability/' . $filename;
                        Image::make($image_tmp)->save($large_image_path);

                        // Store image name in products table
                        $requirementsave = new ClientApplicationRequirement();
            
                        $requirementsave->name = 'Certificate of Disability';
                        $requirementsave->filename = $filename;
                        $requirementsave->client_application_id =$applicationsave->id;
                        $requirementsave->save();
                        
                    }
                }

                $clientapplication=ClientApplication::where('id',$applicationsave->id)->first();
                $clientdetails=Client::where('id',$clientsave->id)->first();
        
                
                $details = [
                    'title' => 'Mail from City Social Welfare and Development',
                    'body' => 'Your reference number '
        
                ];
                Mail::to($clientdetails->email_address)->send(new ReferenceMail($details, $clientapplication, $clientdetails));

                session_start();
                $_SESSION['success'] ="success";
               
             
                return view('main/landing', [
                    // Specify the base layout.
                    // Eg: 'side-menu', 'simple-menu', 'top-menu', 'login'
                    // The default value is 'side-menu'
        
                    // 'layout' => 'side-menu'
                ])->with('success');
             
                
                exit;

               
              

            }
          
        else{
                    //     $clientapplication= Client::where('first_name','=',$request->input('firstname'))->where('last_name','=',$request->input('lastname'))->where('middle_name','=',$request->input('middlename'))->whereHas("client_applications", function($subQuery) use ($request)  {
                    //         $subQuery->where("client_applications.application_type", "=", 'PWD'); 
                    //     })->with(["client_applications" => function($subQuery) use ($request){
                    //         $subQuery->where("client_applications.application_type", "=", 'PWD'); 
                    //     }])->first();

                    //     if($clientapplication == null)
                    //     {


                    //                 $applicationsave = new ClientApplication();
                    //                 $applicationsave->application_date= now()->toDateString('Y-m-d');;
                    //                 $applicationsave->application_type = 'PWD';
                    //                 $applicationsave->application_Status = 'Applied';
                    //                         if($latestreferencenumber===null)
                    //                         {
                    //                             $applicationsave->application_reference_number = '#'.str_pad( 1, 8, "0", STR_PAD_LEFT);;
                    //                         }
                    //                         else
                    //                         {
                    //                             $applicationsave->application_reference_number = '#'.str_pad($latestreferencenumber->application_reference_number  + 1, 8, "0", STR_PAD_LEFT);
                    //                         }
                                
                    //                 $applicationsave->application_process = 'Online-Ongoing';
                    //                 $applicationsave->client_id =$clientapplication->id;
                    //                 $applicationsave->save();


                    //                 $occupationsave = new Occupation();
                                
                    //                 $occupationsave->employment_status = $request->input('employmentstatus');
                    //                 $occupationsave->employment_type = $request->input('employmenttype');
                    //                 $occupationsave->employment_category = $request->input('employmentcategory');
                    //                 $occupationsave->occupation = $request->input('occupation');
                    //                 $occupationsave->salary = $request->input('salary');
                    //                 $occupationsave->others = $request->input('othersoccupation');
                    //                 $occupationsave->client_id =$clientapplication->id;
                    //                 $occupationsave->save();

                    //                 $organizationsave = new Organization();
                                
                    //                 $organizationsave->organization_affiliated = $request->input('organizationaffiliated');
                    //                 $organizationsave->contact_person = $request->input('contactperson');
                    //                 $organizationsave->office_address = $request->input('officeaddress');
                    //                 $organizationsave->contact_number = $request->input('contactnumber');
                    //                 $organizationsave->client_id =$clientapplication->id;
                    //                 $organizationsave->save();

                    //                 $identificationcardsave = new IdentificationCard();
                                
                    //                 $identificationcardsave->sss_number = $request->input('sssnumber');
                    //                 $identificationcardsave->gsis_number = $request->input('gsisnumber');
                    //                 $identificationcardsave->pagibig_number = $request->input('pagibignumber');
                    //                 $identificationcardsave->psn_number = $request->input('psnnumber');
                    //                 $identificationcardsave->philhealth_number = $request->input('philhealthnumber');
                    //                 $identificationcardsave->client_id =$clientapplication->id;
                    //                 $identificationcardsave->save();


                    //                 $lastname =  $request->input('familylastname');
                    //                 $firstname =  $request->input('familyfirstname');
                    //                 $middlename =  $request->input('familymiddlename');
                    //                 $extensionname =  $request->input('familyextensionname'); 
                    //                 $sex =  $request->input('familygender');
                    //                 $birthdate =  $request->input('familybirthdate');
                    //                 $relationship =  $request->input('relationship');

                    //                 foreach($relationship  as $key => $value) {       
                    //                     $familysave = new FamilyComposition();
                    //                     $familysave ->relationship = $value;
                    //                     $familysave ->last_name = $lastname[$key];
                    //                     $familysave ->first_name = $firstname[$key];
                    //                     $familysave ->middle_name = $middlename[$key];
                    //                     $familysave ->extension_name = $extensionname[$key];
                    //                     $familysave ->sex = $sex[$key];
                    //                     $familysave ->birth_date = $birthdate[$key];
                    //                     $familysave->client_id =$clientapplication->id;
                    //                     $familysave->save();
                                    
                    //                 }
                    //                 $type =  $request->input('type');
                    //                 foreach($type  as $key => $value) {       
                    //                     $disabilitytypesave = new DisabilityType();
                    //                     $disabilitytypesave ->name = $value;
                    //                     $disabilitytypesave->client_id =$clientapplication->id;
                    //                     $disabilitytypesave->save();
                                    
                    //                 }

                    //                 $acquired =  $request->input('acquired');
                    //                 $othersacquired =  $request->input('othersacquired');
                    //                 foreach($acquired  as $key => $value) {       
                    //                     $disabilitycausesave = new DisabilityCause();
                    //                     $disabilitycausesave ->name = $value;
                    //                     $disabilitycausesave ->type = 'Acquired';
                    //                     $disabilitycausesave ->others = $othersacquired;
                    //                     $disabilitycausesave->client_id =$clientapplication->id;
                    //                     $disabilitycausesave->save();
                                    
                    //                 }

                    //                 $inborn =  $request->input('inborn');
                    //                 $othersinborn =  $request->input('othersinborn');
                    //                 foreach($inborn  as $key => $value) {       
                    //                     $disabilitycausesave = new DisabilityCause();
                    //                     $disabilitycausesave ->name = $value;
                    //                     $disabilitycausesave ->type = 'Congenital/Inborn';
                    //                     $disabilitycausesave ->others = $othersinborn;
                    //                     $disabilitycausesave->client_id =$clientapplication->id;
                    //                     $disabilitycausesave->save();
                                    
                    //                 }

                    //                 $physiciansave = new Physician();
                                
                    //                 $physiciansave->license_number = $request->input('licensenumber');
                    //                 $physiciansave->first_name = $request->input('physicianfirstname');
                    //                 $physiciansave->last_name = $request->input('physicianlastname');
                    //                 $physiciansave->middle_name = $request->input('physicianmiddlename');
                    //                 $physiciansave->client_id =$clientapplication->id;
                    //                 $physiciansave->save();

                    //                 if ($request->hasFile('imageid')) {
                    //                     $image_tmp = $request->file('imageid');
                    //                     if ($image_tmp->isValid()) {
                    //                         $extension = $image_tmp->getClientOriginalExtension();
                    //                         $filename = $request['lastname']  .  $clientapplication->id  . 'pwd.' . $extension;
                    //                         $large_image_path = 'images/id/' . $filename;
                    //                         Image::make($image_tmp)->save($large_image_path);

                    //                         // Store image name in products table
                    //                         $requirementsave = new ClientApplicationRequirement();
                                
                    //                         $requirementsave->name = 'Valid ID';
                    //                         $requirementsave->filename = $filename;
                    //                         $requirementsave->client_application_id =$applicationsave->id;
                    //                         $requirementsave->save();
                                            
                    //                     }
                    //                 }

                    //                 if ($request->hasFile('imagebarangay')) {
                    //                     $image_tmp = $request->file('imagebarangay');
                    //                     if ($image_tmp->isValid()) {
                    //                         $extension = $image_tmp->getClientOriginalExtension();
                    //                         $filename = $request['lastname']  .  $clientapplication->id  . 'pwd.' . $extension;
                    //                         $large_image_path = 'images/barangay/' . $filename;
                    //                         Image::make($image_tmp)->save($large_image_path);

                    //                         // Store image name in products table
                    //                         $requirementsave = new ClientApplicationRequirement();
                                
                    //                         $requirementsave->name = 'Barangay Certificate';
                    //                         $requirementsave->filename = $filename;
                    //                         $requirementsave->client_application_id =$applicationsave->id;
                    //                         $requirementsave->save();
                                            
                    //                     }
                    //                 }

                    //                 if ($request->hasFile('imagepicture')) {
                    //                     $image_tmp = $request->file('imagepicture');
                    //                     if ($image_tmp->isValid()) {
                    //                         $extension = $image_tmp->getClientOriginalExtension();
                    //                         $filename = $request['lastname']  .  $clientapplication->id  . 'pwd.' . $extension;
                    //                         $large_image_path = 'images/picture/' . $filename;
                    //                         Image::make($image_tmp)->save($large_image_path);

                    //                         // Store image name in products table
                    //                         $requirementsave = new ClientApplicationRequirement();
                                
                    //                         $requirementsave->name = 'Picture';
                    //                         $requirementsave->filename = $filename;
                    //                         $requirementsave->client_application_id =$applicationsave->id;
                    //                         $requirementsave->save();
                                            
                    //                     }
                    //                 }
                    //                 if ($request->hasFile('imagedisability')) {
                    //                     $image_tmp = $request->file('imagedisability');
                    //                     if ($image_tmp->isValid()) {
                    //                         $extension = $image_tmp->getClientOriginalExtension();
                    //                         $filename = $request['lastname']  .  $clientapplication->id  . 'pwd.' . $extension;
                    //                         $large_image_path = 'images/disability/' . $filename;
                    //                         Image::make($image_tmp)->save($large_image_path);

                    //                         // Store image name in products table
                    //                         $requirementsave = new ClientApplicationRequirement();
                                
                    //                         $requirementsave->name = 'Certificate of Disability';
                    //                         $requirementsave->filename = $filename;
                    //                         $requirementsave->client_application_id =$applicationsave->id;
                    //                         $requirementsave->save();
                                            
                    //                     }
                    //                 }


                    //                 $_SESSION['success'] ="success";
                    //                 session_start();
                                
                    //                 return redirect()->back()->with('success');  
                    //                 exit;
                                

                    
                        
                    //     }
                    
                    // else{
                        session_start();
                        $_SESSION['fail'] ="fail";
                       
                     
                        return view('main/landing', [
                            // Specify the base layout.
                            // Eg: 'side-menu', 'simple-menu', 'top-menu', 'login'
                            // The default value is 'side-menu'
                
                            // 'layout' => 'side-menu'
                        ])->with('fail');
                     
                        
                        exit;
                        
                        // }

        }


    
    
        
       
    }

    public function evaluatepwd($clientid = null,$applicationid=null)
    {
      
       
        $applicationlogsave = new ClientApplicationLog();
     
        $applicationlogsave->process_name = 'Evaluation-Approved';
        $applicationlogsave->date= now()->toDateString('Y-m-d');
        $applicationlogsave->client_id = $clientid;
        $applicationlogsave->client_application_id = $applicationid;
     
        $applicationlogsave->save();

        ClientApplication::where('id',$applicationid)->where('application_type','=','PWD')->update(['application_status'=>'EVALUATED-APPROVED']);


       
     
        session_start();
        $_SESSION['success'] ="success";
      
     
        return redirect()->back()->with('success');  
        exit;
    }
    
    public function approvepwd(Request $request,$clientid = null,$applicationid=null)
    {
     
        $schedule = Carbon::parse($request->input('schedule'))->format('Y-m-d');
        $applicationlogsave = new ClientApplicationLog();
     
        $applicationlogsave->process_name = 'Approval-Approved';
        $applicationlogsave->date= now()->toDateString('Y-m-d');
        $applicationlogsave->client_id = $clientid;
        $applicationlogsave->client_application_id = $applicationid;
     
        $applicationlogsave->save();

        $clientschedulesave = new ClientSchedule();
     
        $clientschedulesave->date = $schedule;
        $clientschedulesave->date_created= now()->toDateString('Y-m-d');
        $clientschedulesave->client_application_id = $applicationid;
     
        $clientschedulesave->save();

        ClientApplication::where('id',$applicationid)->where('application_type','=','PWD')->update(['application_status'=>'APPROVAL-APPROVED']);

        $clientdetails=Client::where('id',$clientid)->first();

        
        $details = [
            'title' => 'Mail from City Social Welfare and Development',
            'body' => 'You are scheduled on'

        ];
        Mail::to($clientdetails->email_address)->send(new ScheduleMail($details, $clientschedulesave, $clientdetails));
       
     
        session_start();
        $_SESSION['success'] ="success";
       
     
        return redirect()->back()->with('success');  
        exit;
    }

    public function verifypwd(Request $request,$clientid = null,$applicationid=null)
    {
      
    
        $applicationlogsave = new ClientApplicationLog();
     
        $applicationlogsave->process_name = 'Verification-Approved';
        $applicationlogsave->date= now()->toDateString('Y-m-d');
        $applicationlogsave->client_id = $clientid;
        $applicationlogsave->client_application_id = $applicationid;
     
        $applicationlogsave->save();

        $application_date= now()->toDateString('Ymd');
        $yearOnly=substr($application_date,0,4);
        $generator = Helper::IDGenerator(new ClientCard,'card_number',9,'PSID-'.$yearOnly,$yearOnly);
       
        $logo='/images/barangay/1senior.jpg';
        $path='images/qrcode/';
        $filename=time().$clientid.".png";
       
        $clientcardsave = new ClientCard();
     
        $clientcardsave->card_status = 'Active'; 
        $clientcardsave->card_type = 'PWD';
        $clientcardsave->GUID = $filename;
        $id = Str::uuid();
        $hash = Hash::make(time());
        $clientcardsave->token = $id;
        $clientcardsave->card_number = $generator;
        $clientcardsave->client_application_id = $applicationid;
        $clientcardsave->client_id = $clientid;

     
        $clientcardsave->save();

        QrCode::format('png')->size(250)->generate('http://127.0.0.1:8000/verify/'.$clientcardsave->card_number.'/'.$clientcardsave->token, $path.$filename);


     
        $clientcardsave->save();


        ClientApplication::where('id',$applicationid)->where('application_type','=','PWD')->update(['application_status'=>'VERIFY-RELEASED','application_process'=>'Online-Registered']);


        $clientdetails=Client::where('id',$clientid)->first();

        
        $details = [
            'title' => 'Mail from City Social Welfare and Development',
            'body' => 'You are scheduled on'

        ];
        Mail::to($clientdetails->email_address)->send(new CardMail($details, $clientcardsave, $clientdetails));


       
     
        session_start();
        $_SESSION['success'] ="success";
     
        return redirect()->back()->with('success');  
        exit;
     
    }

    public function declinepwdevaluation(Request $request,$clientid = null,$applicationid=null)
    {
       
        
        if (DB::table('declined_clients')
           
        ->where('client_type','=','PWD')
        ->where('client_application_id','=', $applicationid)
        
        
        ->exists())
        {

            DeclinedClient::where('id',$applicationid)->where('client_type','=','PWD')->update(['decline_type' => $request->input('declinetype'),'decline_reason' => $request->input('declinereason'),'process_name' => 'PWD-Evaluation']);
            ClientApplication::where('id',$applicationid)->where('application_type','=','PWD')->update(['application_status'=>'EVALUATION-DECLINED']);
            $declinedclientid=DeclinedClient::where('client_application_id','=', $applicationid)->where('client_type','=','PWD')->first();
            $declinedclientlogsave = new DeclinedClientLog();
     
        
            $declinedclientlogsave->date= now()->toDateString('Y-m-d');
            $declinedclientlogsave->process_name= 'PWD-Evaluation';
            $declinedclientlogsave->decline_type =  $request->input('declinetype');
            $declinedclientlogsave->decline_reason =  $request->input('declinereason');
            $declinedclientlogsave->declined_client_id = $declinedclientid->id;
         
            $declinedclientlogsave->save();
            $clientapplication=ClientApplication::where('id',$applicationid)->first();
            $clientdetails=Client::where('id',$clientid)->first();
    
            
            $details = [
                'title' => 'Mail from City Social Welfare and Development',
                'body' => 'Your reference number '
    
            ];
            Mail::to($clientdetails->email_address)->send(new DeclineMail($details, $clientapplication, $clientdetails));

            session_start();
            $_SESSION['success'] ="success";
            return redirect()->back()->with('success');  
            exit;
        }
      
     else {

        $declinedclientsave = new DeclinedClient();
     
        
        $declinedclientsave->date= now()->toDateString('Y-m-d');
        $declinedclientsave->client_type= 'PWD';
        $declinedclientsave->process_name= 'PWD-Evaluation';
        $declinedclientsave->decline_type =  $request->input('declinetype');
        $declinedclientsave->decline_reason =  $request->input('declinereason');
        $declinedclientsave->client_application_id = $applicationid;
     
        $declinedclientsave->save();

        $declinedclientlogsave = new DeclinedClientLog();
     
        
        $declinedclientlogsave->date= now()->toDateString('Y-m-d');
        $declinedclientlogsave->process_name= 'PWD-Evaluation';
        $declinedclientlogsave->decline_type =  $request->input('declinetype');
        $declinedclientlogsave->decline_reason =  $request->input('declinereason');
        $declinedclientlogsave->declined_client_id = $declinedclientsave->id;
     
        $declinedclientlogsave->save();


        ClientApplication::where('id',$applicationid)->where('application_type','=','PWD')->update(['application_status'=>'EVALUATION-DECLINED']);


       
        $clientapplication=ClientApplication::where('id',$applicationid)->first();
        $clientdetails=Client::where('id',$clientid)->first();

        
        $details = [
            'title' => 'Mail from City Social Welfare and Development',
            'body' => 'Your reference number '

        ];
        Mail::to($clientdetails->email_address)->send(new DeclineMail($details, $clientapplication, $clientdetails));

        session_start();
        $_SESSION['success'] ="success";
        return redirect()->back()->with('success');  
        exit;
    }
}
    
    public function declinepwdapproval(Request $request,$clientid = null,$applicationid=null)
    {
        if (DB::table('declined_clients')
           
        ->where('client_type','=','PWD')
        ->where('client_application_id','=', $applicationid)
        
        
        ->exists())
        {

            DeclinedClient::where('id',$applicationid)->where('client_type','=','PWD')->update(['decline_type' => $request->input('declinetype'),'decline_reason' => $request->input('declinereason'),'process_name' => 'PWD-Approval']);
            ClientApplication::where('id',$applicationid)->where('application_type','=','PWD')->update(['application_status'=>'APPROVAL-DECLINED']);
            $declinedclientid=DeclinedClient::where('client_application_id','=', $applicationid)->where('client_type','=','PWD')->first();
            $declinedclientlogsave = new DeclinedClientLog();
     
        
            $declinedclientlogsave->date= now()->toDateString('Y-m-d');
            $declinedclientlogsave->process_name= 'PWD-Approval';
            $declinedclientlogsave->decline_type =  $request->input('declinetype');
            $declinedclientlogsave->decline_reason =  $request->input('declinereason');
            $declinedclientlogsave->declined_client_id = $declinedclientid->id;
         
            $declinedclientlogsave->save();
            $clientapplication=ClientApplication::where('id',$applicationid)->first();
            $clientdetails=Client::where('id',$clientid)->first();
    
            
            $details = [
                'title' => 'Mail from City Social Welfare and Development',
                'body' => 'Your reference number '
    
            ];
            Mail::to($clientdetails->email_address)->send(new DeclineMail($details, $clientapplication, $clientdetails));

            session_start();
            $_SESSION['success'] ="success";
            return redirect()->back()->with('success');  
            exit;
        }
      
     else {
       

        $declinedclientsave = new DeclinedClient();
     
        
        $declinedclientsave->date= now()->toDateString('Y-m-d');
        $declinedclientsave->client_type= 'PWD';
        $declinedclientsave->process_name= 'PWD-Approval';
        $declinedclientsave->decline_type =  $request->input('declinetype');
        $declinedclientsave->decline_reason =  $request->input('declinereason');
        $declinedclientsave->client_application_id = $applicationid;
     
        $declinedclientsave->save();

        $declinedclientlogsave = new DeclinedClientLog();
     
        
        $declinedclientlogsave->date= now()->toDateString('Y-m-d');
        $declinedclientlogsave->process_name= 'PWD-Approval';
        $declinedclientlogsave->decline_type =  $request->input('declinetype');
        $declinedclientlogsave->decline_reason =  $request->input('declinereason');
        $declinedclientlogsave->declined_client_id = $declinedclientsave->id;
     
        $declinedclientlogsave->save();


        ClientApplication::where('id',$applicationid)->where('application_type','=','PWD')->update(['application_status'=>'APPROVAL-DECLINED']);


       
        $clientapplication=ClientApplication::where('id',$applicationid)->first();
            $clientdetails=Client::where('id',$clientid)->first();
    
            
            $details = [
                'title' => 'Mail from City Social Welfare and Development',
                'body' => 'Your reference number '
    
            ];
            Mail::to($clientdetails->email_address)->send(new DeclineMail($details, $clientapplication, $clientdetails));

            session_start();
            $_SESSION['success'] ="success";
            return redirect()->back()->with('success');  
            exit;
     }
    }
    
    public function declinepwdverification(Request $request,$clientid = null,$applicationid=null)
    {
        if (DB::table('declined_clients')
           
        ->where('client_type','=','PWD')
        ->where('client_application_id','=', $applicationid)
        
        
        ->exists())
        {

            DeclinedClient::where('id',$applicationid)->where('client_type','=','PWD')->update(['decline_type' => $request->input('declinetype'),'decline_reason' => $request->input('declinereason'),'process_name' => 'PWD-Verification']);
            ClientApplication::where('id',$applicationid)->where('application_type','=','PWD')->update(['application_status'=>'VERIFICATION-DECLINED']);
            $declinedclientid=DeclinedClient::where('client_application_id','=', $applicationid)->where('client_type','=','PWD')->first();
            $declinedclientlogsave = new DeclinedClientLog();
     
        
            $declinedclientlogsave->date= now()->toDateString('Y-m-d');
            $declinedclientlogsave->process_name= 'PWD-Verification';
            $declinedclientlogsave->decline_type =  $request->input('declinetype');
            $declinedclientlogsave->decline_reason =  $request->input('declinereason');
            $declinedclientlogsave->declined_client_id = $declinedclientid->id;
         
            $declinedclientlogsave->save();
            $clientapplication=ClientApplication::where('id',$applicationid)->first();
            $clientdetails=Client::where('id',$clientid)->first();
    
            
            $details = [
                'title' => 'Mail from City Social Welfare and Development',
                'body' => 'Your reference number '
    
            ];
            Mail::to($clientdetails->email_address)->send(new DeclineMail($details, $clientapplication, $clientdetails));

            session_start();
            $_SESSION['success'] ="success";
            return redirect()->back()->with('success');  
            exit;
        }
      
     else {
       

        $declinedclientsave = new DeclinedClient();
     
        
        $declinedclientsave->date= now()->toDateString('Y-m-d');
        $declinedclientsave->client_type= 'PWD';
        $declinedclientsave->process_name= 'PWD-Verification';
        $declinedclientsave->decline_type =  $request->input('declinetype');
        $declinedclientsave->decline_reason =  $request->input('declinereason');
        $declinedclientsave->client_application_id = $applicationid;
     
        $declinedclientsave->save();

        $declinedclientlogsave = new DeclinedClientLog();
     
        
        $declinedclientlogsave->date= now()->toDateString('Y-m-d');
        $declinedclientlogsave->process_name= 'PWD-Verification';
        $declinedclientlogsave->decline_type =  $request->input('declinetype');
        $declinedclientlogsave->decline_reason =  $request->input('declinereason');
        $declinedclientlogsave->declined_client_id = $declinedclientsave->id;
     
        $declinedclientlogsave->save();


        ClientApplication::where('id',$applicationid)->where('application_type','=','PWD')->update(['application_status'=>'VERIFICATION-DECLINED']);


       
        session_start();
        $_SESSION['success'] ="success";
       
     
        
        return redirect()->back()->with('success');  
        exit;
     }
    }
    

    


    public function storesoloparent(Request $request, $id = null)
    {
       
      
        
        $latestreferencenumber = ClientApplication::where('id','DESC')->first();
        $dob = Carbon::parse($request->input('birthdate'))->format('Y-m-d');
        $client= Client::where('first_name','=',$request->input('firstname'))->where('last_name','=',$request->input('lastname'))->where('middle_name','=',$request->input('middlename'))->where('birth_date','=', $request->input('birthdate'))->first();

       
        if ($client == null)
        {
            $clientsave = new Client();
            
            $clientsave->first_name = $request->input('firstname');
            $clientsave->last_name = $request->input('lastname');
            $clientsave->middle_name = $request->input('middlename');
            $clientsave->extension_name = $request->input('extensionname');
            $clientsave->sex = $request->input('gender');
            $clientsave->blood_type = $request->input('bloodtype');
            $clientsave->civil_status = $request->input('civilstatus');
            $clientsave->nationality = $request->input('nationality');
            $clientsave->religion = $request->input('religion');
            $clientsave->birth_date =$dob;
            $clientsave->birth_place = $request->input('birthplace');
            $clientsave->email_address= $request->input('emailaddress');
            $clientsave->contact_number = $request->input('mobilenumber');
            $clientsave->landline_number = $request->input('landlinenumber');
            $clientsave->street = $request->input('street');
            $clientsave->barangay_id = $request->input('barangay'); ;
            $clientsave->municipality= $request->input('city');
            $clientsave->region = $request->input('region');
            $clientsave->province= $request->input('province');
            $clientsave->educational_attainment = $request->input('education');
            $clientsave->skills_talents= $request->input('skill');
            $clientsave->hobbies= $request->input('hobbies');
            $clientsave->educational_attainment= $request->input('educationalattainment');
            $clientsave->save();

            $application_date= now()->toDateString('Ymd');
                $yearOnly=substr($application_date,0,4);
                $generator = Helper::IDGenerator(new ClientApplication,'application_reference_number',9,'CID-'.$yearOnly,$yearOnly);
            $applicationsave = new ClientApplication();
                    
            $applicationsave->application_date= now()->toDateString('Y-m-d');;
            $applicationsave->application_type = 'Citizen';
            $applicationsave->application_Status = 'Applied';
                  
            $applicationsave->application_reference_number = $generator;
                   
            $applicationsave->application_process = 'Online-Ongoing';
            $applicationsave->client_id =$clientsave->id;
            $applicationsave->save();

            $application_date1= now()->toDateString('Ymd');
            $yearOnly1=substr($application_date1,0,4);
            $generator1 = Helper::IDGenerator(new ClientApplication,'application_reference_number',9,'PID-'.$yearOnly1,$yearOnly1);

            $applicationsave = new ClientApplication();
                            
                                $applicationsave->application_date= now()->toDateString('Y-m-d');;
                                $applicationsave->application_type = 'Solo Parent';
                                $applicationsave->application_Status = 'Applied';
                                       
                                            $applicationsave->application_reference_number = $generator1;
                                       
                            
                                $applicationsave->application_process = 'Online-Ongoing';
                                $applicationsave->client_id =$clientsave->id;
                                $applicationsave->save();


                                $occupationsave = new Occupation();
                            
                                $occupationsave->employment_status = $request->input('employmentstatus');
                                $occupationsave->employment_type = $request->input('employmenttype');
                                $occupationsave->employment_category = $request->input('employmentcategory');
                                $occupationsave->occupation = $request->input('occupation');
                                $occupationsave->salary = $request->input('salary');
                                $occupationsave->others = $request->input('othersoccupation');
                                $occupationsave->client_id =$clientsave->id;
                                $occupationsave->save();



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
                                    $educationsave->client_id =$clientsave->id;
                                    $educationsave->save();
                                
                                }

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
                                    $familysave->client_id =$clientsave->id;
                                    $familysave->save();
                                
                                }
                            
                                $organizationname =  $request->input('organizationname');
                                $position =  $request->input('position');
                                $commmunitydate =  $request->input('commmunitydate');
                            

                                foreach($organizationname  as $key => $value) {       
                                    $communitysave = new CommunityInvolvement();
                                    $communitysave ->organization_name = $value;
                                    $communitysave ->position = $position[$key];
                                    $communitysave ->date = $commmunitydate[$key];
                                    $communitysave->client_id =$clientsave->id;
                                    $communitysave->save();
                                
                                }

                                $seminarorganizationname =  $request->input('seminarorganizationname');
                                $seminarposition =  $request->input('seminarposition');
                                $seminardate =  $request->input('seminardate');
                            

                                foreach($seminarorganizationname  as $key => $value) {       
                                    $seminarsave = new SeminarTraining();
                                    $seminarsave ->organization_name = $value;
                                    $seminarsave ->position = $seminarposition[$key];
                                    $seminarsave ->date = $seminardate[$key];
                                    $seminarsave->client_id =$clientsave->id;
                                    $seminarsave->save();
                                
                                }

                            

    
           
    
                                if ($request->hasFile('imageid')) {
                                    $image_tmp = $request->file('imageid');
                                    if ($image_tmp->isValid()) {
                                        $extension = $image_tmp->getClientOriginalExtension();
                                        $filename = $request['lastname']  .  $applicationsave->id  . 'soloparent.' . $extension;
                                        $large_image_path = 'images/id/' . $filename;
                                        Image::make($image_tmp)->save($large_image_path);

                                        // Store image name in products table
                                        $requirementsave = new ClientApplicationRequirement();
                            
                                        $requirementsave->name = 'Valid ID';
                                        $requirementsave->filename = $filename;
                                        $requirementsave->client_application_id =$applicationsave->id;
                                        $requirementsave->save();
                                        
                                    }
                                }

                                if ($request->hasFile('imagebarangay')) {
                                    $image_tmp = $request->file('imagebarangay');
                                    if ($image_tmp->isValid()) {
                                        $extension = $image_tmp->getClientOriginalExtension();
                                        $filename = $request['lastname']  .  $applicationsave->id  . 'soloparent.' . $extension;
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
                                        $filename = $request['lastname']  .  $applicationsave->id  . 'soloparent.' . $extension;
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
                                if ($request->hasFile('imagebirth')) {
                                    $image_tmp = $request->file('imagebirth');
                                    if ($image_tmp->isValid()) {
                                        $extension = $image_tmp->getClientOriginalExtension();
                                        $filename = $request['lastname']  .  $applicationsave->id  . 'soloparent.' . $extension;
                                        $large_image_path = 'images/birth/' . $filename;
                                        Image::make($image_tmp)->save($large_image_path);

                                        // Store image name in products table
                                        $requirementsave = new ClientApplicationRequirement();
                            
                                        $requirementsave->name = 'Birth Certificate';
                                        $requirementsave->filename = $filename;
                                        $requirementsave->client_application_id =$applicationsave->id;
                                        $requirementsave->save();
                                        
                                    }

                                    $clientapplication=ClientApplication::where('id',$applicationsave->id)->first();
                                    $clientdetails=Client::where('id',$clientsave->id)->first();
                            
                                    
                                    $details = [
                                        'title' => 'Mail from City Social Welfare and Development',
                                        'body' => 'Your reference number '
                            
                                    ];
                                    Mail::to($clientdetails->email_address)->send(new ReferenceMail($details, $clientapplication, $clientdetails));
                                


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
        }
      
     else{

        // $clientapplication= Client::where('first_name','=',$request->input('firstname'))->where('last_name','=',$request->input('lastname'))->where('middle_name','=',$request->input('middlename'))->whereHas("client_applications", function($subQuery) use ($request)  {
        //                     $subQuery->where("client_applications.application_type", "=", 'Solo Parent'); 
        //                 })->with(["client_applications" => function($subQuery) use ($request){
        //                     $subQuery->where("client_applications.application_type", "=", 'Solo Parent'); 
        //                 }])->first();

        //                 if($clientapplication == null)
        //                 {

        //                         $applicationsave = new ClientApplication();
                            
        //                         $applicationsave->application_date= now()->toDateString('Y-m-d');;
        //                         $applicationsave->application_type = 'Solo Parent';
        //                         $applicationsave->application_Status = 'Applied';
        //                                 if($latestreferencenumber===null)
        //                                 {
        //                                     $applicationsave->application_reference_number = '#'.str_pad( 1, 8, "0", STR_PAD_LEFT);;
        //                                 }
        //                                 else
        //                                 {
        //                                     $applicationsave->application_reference_number = '#'.str_pad($latestreferencenumber->application_reference_number  + 1, 8, "0", STR_PAD_LEFT);
        //                                 }
                            
        //                         $applicationsave->application_process = 'Online-Ongoing';
        //                         $applicationsave->client_id =$clientapplication->id;
        //                         $applicationsave->save();


        //                         $occupationsave = new Occupation();
                            
        //                         $occupationsave->employment_status = $request->input('employmentstatus');
        //                         $occupationsave->employment_type = $request->input('employmenttype');
        //                         $occupationsave->employment_category = $request->input('employmentcategory');
        //                         $occupationsave->occupation = $request->input('occupation');
        //                         $occupationsave->salary = $request->input('salary');
        //                         $occupationsave->others = $request->input('othersoccupation');
        //                         $occupationsave->client_id =$clientapplication->id;
        //                         $occupationsave->save();



        //                         $type =  $request->input('type');
        //                         $schoolname =  $request->input('schoolname');
        //                         $course =  $request->input('course');
        //                         $yeargraduated =  $request->input('yeargraduated'); 
        //                         $achievementaward =  $request->input('achievementaward');
                            

        //                         foreach($type  as $key => $value) {       
        //                             $educationsave = new Education();
        //                             $educationsave ->educational_attainment = $value;
        //                             $educationsave ->school = $schoolname[$key];
        //                             $educationsave ->course = $course[$key];
        //                             $educationsave ->year_graduated = $yeargraduated[$key];
        //                             $educationsave ->achievement_award = $achievementaward[$key];
        //                             $educationsave->client_id =$clientapplication->id;
        //                             $educationsave->save();
                                
        //                         }

        //                         $lastname =  $request->input('familylastname');
        //                         $firstname =  $request->input('familyfirstname');
        //                         $middlename =  $request->input('familymiddlename');
        //                         $extensionname =  $request->input('familyextensionname'); 
        //                         $sex =  $request->input('familygender');
        //                         $birthdate =  $request->input('familybirthdate');
        //                         $relationship =  $request->input('relationship');

        //                         foreach($relationship  as $key => $value) {       
        //                             $familysave = new FamilyComposition();
        //                             $familysave ->relationship = $value;
        //                             $familysave ->last_name = $lastname[$key];
        //                             $familysave ->first_name = $firstname[$key];
        //                             $familysave ->middle_name = $middlename[$key];
        //                             $familysave ->extension_name = $extensionname[$key];
        //                             $familysave ->sex = $sex[$key];
        //                             $familysave ->birth_date = $birthdate[$key];
        //                             $familysave->client_id =$clientapplication->id;
        //                             $familysave->save();
                                
        //                         }
                            
        //                         $organizationname =  $request->input('organizationname');
        //                         $position =  $request->input('position');
        //                         $commmunitydate =  $request->input('commmunitydate');
                            

        //                         foreach($organizationname  as $key => $value) {       
        //                             $communitysave = new CommunityInvolvement();
        //                             $communitysave ->organization_name = $value;
        //                             $communitysave ->position = $position[$key];
        //                             $communitysave ->date = $commmunitydate[$key];
        //                             $communitysave->client_id =$clientapplication->id;
        //                             $communitysave->save();
                                
        //                         }

        //                         $seminarorganizationname =  $request->input('seminarorganizationname');
        //                         $seminarposition =  $request->input('seminarposition');
        //                         $seminardate =  $request->input('seminardate');
                            

        //                         foreach($seminarorganizationname  as $key => $value) {       
        //                             $seminarsave = new SeminarTraining();
        //                             $seminarsave ->organization_name = $value;
        //                             $seminarsave ->position = $seminarposition[$key];
        //                             $seminarsave ->date = $seminardate[$key];
        //                             $seminarsave->client_id =$clientapplication->id;
        //                             $seminarsave->save();
                                
        //                         }

                            

        //                         if ($request->hasFile('imageid')) {
        //                             $image_tmp = $request->file('imageid');
        //                             if ($image_tmp->isValid()) {
        //                                 $extension = $image_tmp->getClientOriginalExtension();
        //                                 $filename = $request['lastname']  .  $clientapplication->id  . 'soloparent.' . $extension;
        //                                 $large_image_path = 'images/id/' . $filename;
        //                                 Image::make($image_tmp)->save($large_image_path);

        //                                 // Store image name in products table
        //                                 $requirementsave = new ClientApplicationRequirement();
                            
        //                                 $requirementsave->name = 'Valid ID';
        //                                 $requirementsave->filename = $filename;
        //                                 $requirementsave->client_application_id =$applicationsave->id;
        //                                 $requirementsave->save();
                                        
        //                             }
        //                         }

        //                         if ($request->hasFile('imagebarangay')) {
        //                             $image_tmp = $request->file('imagebarangay');
        //                             if ($image_tmp->isValid()) {
        //                                 $extension = $image_tmp->getClientOriginalExtension();
        //                                 $filename = $request['lastname']  .  $clientapplication->id  . 'soloparent.' . $extension;
        //                                 $large_image_path = 'images/barangay/' . $filename;
        //                                 Image::make($image_tmp)->save($large_image_path);

        //                                 // Store image name in products table
        //                                 $requirementsave = new ClientApplicationRequirement();
                            
        //                                 $requirementsave->name = 'Barangay Certificate';
        //                                 $requirementsave->filename = $filename;
        //                                 $requirementsave->client_application_id =$applicationsave->id;
        //                                 $requirementsave->save();
                                        
        //                             }
        //                         }

        //                         if ($request->hasFile('imagepicture')) {
        //                             $image_tmp = $request->file('imagepicture');
        //                             if ($image_tmp->isValid()) {
        //                                 $extension = $image_tmp->getClientOriginalExtension();
        //                                 $filename = $request['lastname']  .  $clientapplication->id  . 'soloparent.' . $extension;
        //                                 $large_image_path = 'images/picture/' . $filename;
        //                                 Image::make($image_tmp)->save($large_image_path);

        //                                 // Store image name in products table
        //                                 $requirementsave = new ClientApplicationRequirement();
                            
        //                                 $requirementsave->name = 'Picture';
        //                                 $requirementsave->filename = $filename;
        //                                 $requirementsave->client_application_id =$applicationsave->id;
        //                                 $requirementsave->save();
                                        
        //                             }
        //                         }
        //                         if ($request->hasFile('imagebirth')) {
        //                             $image_tmp = $request->file('imagebirth');
        //                             if ($image_tmp->isValid()) {
        //                                 $extension = $image_tmp->getClientOriginalExtension();
        //                                 $filename = $request['lastname']  .  $clientapplication->id  . 'soloparent.' . $extension;
        //                                 $large_image_path = 'images/birth/' . $filename;
        //                                 Image::make($image_tmp)->save($large_image_path);

        //                                 // Store image name in products table
        //                                 $requirementsave = new ClientApplicationRequirement();
                            
        //                                 $requirementsave->name = 'Birth Certificate';
        //                                 $requirementsave->filename = $filename;
        //                                 $requirementsave->client_application_id =$applicationsave->id;
        //                                 $requirementsave->save();
                                        
        //                             }
        //                         }



        //                         $_SESSION['success'] ="success";
        //                         session_start();
                            
        //                         return redirect()->back()->with('success'); 
        //                         exit;
                                
        //                 }
        //                 else
        //                 {
                session_start();
                $_SESSION['fail'] ="fail";
               
             
                return view('main/landing', [
                    // Specify the base layout.
                    // Eg: 'side-menu', 'simple-menu', 'top-menu', 'login'
                    // The default value is 'side-menu'
        
                    // 'layout' => 'side-menu'
                ])->with('fail');
             
                
                exit;
                        // }
           

        
     }
       

         
               


    
    
        
       
    }

    public function evaluatesoloparent($clientid = null,$applicationid=null)
    {
     
       
        $applicationlogsave = new ClientApplicationLog();
     
        $applicationlogsave->process_name = 'Evaluation-Approved';
        $applicationlogsave->date= now()->toDateString('Y-m-d');
        $applicationlogsave->client_id = $clientid;
        $applicationlogsave->client_application_id = $applicationid;
     
        $applicationlogsave->save();

        ClientApplication::where('id',$applicationid)->where('application_type','=','Solo Parent')->update(['application_status'=>'EVALUATED-APPROVED']);
           
        session_start();
        $_SESSION['success'] ="success";
       
     
        
        return redirect()->back()->with('success');  
        exit;
    }
    
    public function approvesoloparent(Request $request,$clientid = null,$applicationid=null)
    {
      
        $schedule = Carbon::parse($request->input('schedule'))->format('Y-m-d');
        $applicationlogsave = new ClientApplicationLog();
     
        $applicationlogsave->process_name = 'Approval-Approved';
        $applicationlogsave->date= now()->toDateString('Y-m-d');
        $applicationlogsave->client_id = $clientid;
        $applicationlogsave->client_application_id = $applicationid;
     
        $applicationlogsave->save();

        $clientschedulesave = new ClientSchedule();
     
        $clientschedulesave->date = $schedule;
        $clientschedulesave->date_created= now()->toDateString('Y-m-d');
        $clientschedulesave->client_application_id = $applicationid;
     
        $clientschedulesave->save();

        ClientApplication::where('id',$applicationid)->where('application_type','=','Solo Parent')->update(['application_status'=>'APPROVAL-APPROVED']);


        $clientdetails=Client::where('id',$clientid)->first();

        
        $details = [
            'title' => 'Mail from City Social Welfare and Development',
            'body' => 'You are scheduled on'

        ];
        Mail::to($clientdetails->email_address)->send(new ScheduleMail($details, $clientschedulesave, $clientdetails));
        session_start();
        $_SESSION['success'] ="success";
     
     
           return redirect()->back()->with('success');  
           exit;
    }

    public function verifysoloparent(Request $request,$clientid = null,$applicationid=null)
    {
        
        $applicationlogsave = new ClientApplicationLog();
     
        $applicationlogsave->process_name = 'Verification-Approved';
        $applicationlogsave->date= now()->toDateString('Y-m-d');;
        $applicationlogsave->client_id = $clientid;
        $applicationlogsave->client_application_id = $applicationid;
     
        $applicationlogsave->save();

        $application_date= now()->toDateString('Ymd');
        $yearOnly=substr($application_date,0,4);
        $generator = Helper::IDGenerator(new ClientCard,'card_number',9,'SPID-'.$yearOnly,$yearOnly);
    
        $logo='/images/barangay/1senior.jpg';
        $path='images/qrcode/';
        $filename=time().$clientid.".png";
       
        $clientcardsave = new ClientCard();
     
        $clientcardsave->card_status = 'Active'; 
        $clientcardsave->card_type = 'SOLO PARENT';
        $clientcardsave->GUID = $filename;
        $id = Str::uuid();
        $hash = Hash::make(time());
        $clientcardsave->token = $id;
        $clientcardsave->card_number = $generator;
        $clientcardsave->client_application_id = $applicationid;
        $clientcardsave->client_id = $clientid;

     
        $clientcardsave->save();

        QrCode::format('png')->size(250)->generate('http://127.0.0.1:8000/verify/'.$clientcardsave->card_number.'/'.$clientcardsave->token, $path.$filename);


     
        $clientcardsave->save();

        ClientApplication::where('id',$applicationid)->where('application_type','=','Solo Parent')->update(['application_status'=>'VERIFY-RELEASED','application_process'=>'Online-Registered']);


        $clientdetails=Client::where('id',$clientid)->first();

        
        $details = [
            'title' => 'Mail from City Social Welfare and Development',
            'body' => 'You are scheduled on'

        ];
        Mail::to($clientdetails->email_address)->send(new CardMail($details, $clientcardsave, $clientdetails));

       
        session_start();
        $_SESSION['success'] ="success";
       
     
        
        return redirect()->back()->with('success');  
        exit;
    }
    

    public function declinesoloparentevaluation(Request $request,$clientid = null,$applicationid=null)
    {
       
       

        if (DB::table('declined_clients')
           
        ->where('client_type','=','Solo Parent')
        ->where('client_application_id','=', $applicationid)
        
        
        ->exists())
        {

            DeclinedClient::where('id',$applicationid)->where('client_type','=','Solo Parent')->update(['decline_type' => $request->input('declinetype'),'decline_reason' => $request->input('declinereason'),'process_name' => 'Solo Parent-Evaluation']);
            ClientApplication::where('id',$applicationid)->where('application_type','=','Solo Parent')->update(['application_status'=>'EVALUATION-DECLINED']);
            $declinedclientid=DeclinedClient::where('client_application_id','=', $applicationid)->where('client_type','=','PWD')->first();
            $declinedclientlogsave = new DeclinedClientLog();
     
        
            $declinedclientlogsave->date= now()->toDateString('Y-m-d');
            $declinedclientlogsave->process_name= 'Solo Parent-Evaluation';
            $declinedclientlogsave->decline_type =  $request->input('declinetype');
            $declinedclientlogsave->decline_reason =  $request->input('declinereason');
            $declinedclientlogsave->declined_client_id = $declinedclientid->id;
         
            $declinedclientlogsave->save();
            $clientapplication=ClientApplication::where('id',$applicationid)->first();
            $clientdetails=Client::where('id',$clientid)->first();
    
            
            $details = [
                'title' => 'Mail from City Social Welfare and Development',
                'body' => 'Your reference number '
    
            ];
            Mail::to($clientdetails->email_address)->send(new DeclineMail($details, $clientapplication, $clientdetails));

            session_start();
            $_SESSION['success'] ="success";
            return redirect()->back()->with('success');  
            exit;
        }
      
     else {

        $declinedclientsave = new DeclinedClient();
     
        
        $declinedclientsave->date= now()->toDateString('Y-m-d');
        $declinedclientsave->client_type= 'Solo Parent';
        $declinedclientsave->process_name= 'Solo Parent-Evaluation';
        $declinedclientsave->decline_type =  $request->input('declinetype');
        $declinedclientsave->decline_reason =  $request->input('declinereason');
        $declinedclientsave->client_application_id = $applicationid;
     
        $declinedclientsave->save();

        $declinedclientlogsave = new DeclinedClientLog();
     
        
        $declinedclientlogsave->date= now()->toDateString('Y-m-d');
        $declinedclientlogsave->process_name= 'Solo Parent-Evaluation';
        $declinedclientlogsave->decline_type =  $request->input('declinetype');
        $declinedclientlogsave->decline_reason =  $request->input('declinereason');
        $declinedclientlogsave->declined_client_id = $declinedclientsave->id;
     
        $declinedclientlogsave->save();


        ClientApplication::where('id',$applicationid)->where('application_type','=','Solo Parent')->update(['application_status'=>'EVALUATION-DECLINED']);


       
        $clientapplication=ClientApplication::where('id',$applicationid)->first();
        $clientdetails=Client::where('id',$clientid)->first();

        
        $details = [
            'title' => 'Mail from City Social Welfare and Development',
            'body' => 'Your reference number '

        ];
        Mail::to($clientdetails->email_address)->send(new DeclineMail($details, $clientapplication, $clientdetails));

        session_start();
        $_SESSION['success'] ="success";
        return redirect()->back()->with('success');  
        exit;
    }
    }
    
    public function declinesoloparentapproval(Request $request,$clientid = null,$applicationid=null)
    {
       
       

        if (DB::table('declined_clients')
           
        ->where('client_type','=','Solo Parent')
        ->where('client_application_id','=', $applicationid)
        
        
        ->exists())
        {

            DeclinedClient::where('id',$applicationid)->where('client_type','=','Solo Parent')->update(['decline_type' => $request->input('declinetype'),'decline_reason' => $request->input('declinereason'),'process_name' => 'Solo Parent-Approval']);
            ClientApplication::where('id',$applicationid)->where('application_type','=','Solo Parent')->update(['application_status'=>'APPROVAL-DECLINED']);
            $declinedclientid=DeclinedClient::where('client_application_id','=', $applicationid)->where('client_type','=','PWD')->first();
            $declinedclientlogsave = new DeclinedClientLog();
     
        
            $declinedclientlogsave->date= now()->toDateString('Y-m-d');
            $declinedclientlogsave->process_name= 'Solo Parent-Approval';
            $declinedclientlogsave->decline_type =  $request->input('declinetype');
            $declinedclientlogsave->decline_reason =  $request->input('declinereason');
            $declinedclientlogsave->declined_client_id = $declinedclientid->id;
         
            $declinedclientlogsave->save();
            $clientapplication=ClientApplication::where('id',$applicationid)->first();
            $clientdetails=Client::where('id',$clientid)->first();
    
            
            $details = [
                'title' => 'Mail from City Social Welfare and Development',
                'body' => 'Your reference number '
    
            ];
            Mail::to($clientdetails->email_address)->send(new DeclineMail($details, $clientapplication, $clientdetails));

            session_start();
            $_SESSION['success'] ="success";
            return redirect()->back()->with('success');  
            exit;
        }
      
     else {
       

        $declinedclientsave = new DeclinedClient();
     
        
        $declinedclientsave->date= now()->toDateString('Y-m-d');
        $declinedclientsave->client_type= 'Solo Parent';
        $declinedclientsave->process_name= 'Solo Parent-Approval';
        $declinedclientsave->decline_type =  $request->input('declinetype');
        $declinedclientsave->decline_reason =  $request->input('declinereason');
        $declinedclientsave->client_application_id = $applicationid;
     
        $declinedclientsave->save();

        $declinedclientlogsave = new DeclinedClientLog();
     
        
        $declinedclientlogsave->date= now()->toDateString('Y-m-d');
        $declinedclientlogsave->process_name= 'Solo Parent-Approval';
        $declinedclientlogsave->decline_type =  $request->input('declinetype');
        $declinedclientlogsave->decline_reason =  $request->input('declinereason');
        $declinedclientlogsave->declined_client_id = $declinedclientsave->id;
     
        $declinedclientlogsave->save();


        ClientApplication::where('id',$applicationid)->where('application_type','=','Solo Parent')->update(['application_status'=>'APPROVAL-DECLINED']);


        $clientapplication=ClientApplication::where('id',$applicationid)->first();
            $clientdetails=Client::where('id',$clientid)->first();
    
            
            $details = [
                'title' => 'Mail from City Social Welfare and Development',
                'body' => 'Your reference number '
    
            ];
            Mail::to($clientdetails->email_address)->send(new DeclineMail($details, $clientapplication, $clientdetails));

            session_start();
            $_SESSION['success'] ="success";
            return redirect()->back()->with('success');  
            exit;
     }
    }
    
    public function declinesoloparentverification(Request $request,$clientid = null,$applicationid=null)
    {

       
        if (DB::table('declined_clients')
           
        ->where('client_type','=','Solo Parent')
        ->where('client_application_id','=', $applicationid)
        
        
        ->exists())
        {

            DeclinedClient::where('id',$applicationid)->where('client_type','=','Solo Parent')->update(['decline_type' => $request->input('declinetype'),'decline_reason' => $request->input('declinereason'),'process_name' => 'Solo Parent-Verification']);
            ClientApplication::where('id',$applicationid)->where('application_type','=','Solo Parent')->update(['application_status'=>'VERIFICATION-DECLINED']);
            $declinedclientid=DeclinedClient::where('client_application_id','=', $applicationid)->where('client_type','=','PWD')->first();
            $declinedclientlogsave = new DeclinedClientLog();
     
        
            $declinedclientlogsave->date= now()->toDateString('Y-m-d');
            $declinedclientlogsave->process_name= 'Solo Parent-Verification';
            $declinedclientlogsave->decline_type =  $request->input('declinetype');
            $declinedclientlogsave->decline_reason =  $request->input('declinereason');
            $declinedclientlogsave->declined_client_id = $declinedclientid->id;
         
            $declinedclientlogsave->save();

            $clientapplication=ClientApplication::where('id',$applicationid)->first();
            $clientdetails=Client::where('id',$clientid)->first();
    
            
            $details = [
                'title' => 'Mail from City Social Welfare and Development',
                'body' => 'Your reference number '
    
            ];
            Mail::to($clientdetails->email_address)->send(new DeclineMail($details, $clientapplication, $clientdetails));

            session_start();
            $_SESSION['success'] ="success";
            return redirect()->back()->with('success');  
            exit;
        }
      
     else {
       

        $declinedclientsave = new DeclinedClient();
     
        
        $declinedclientsave->date= now()->toDateString('Y-m-d');
        $declinedclientsave->client_type= 'Solo Parent';
        $declinedclientsave->process_name= 'Solo Parent-Verification';
        $declinedclientsave->decline_type =  $request->input('declinetype');
        $declinedclientsave->decline_reason =  $request->input('declinereason');
        $declinedclientsave->client_application_id = $applicationid;
     
        $declinedclientsave->save();

        $declinedclientlogsave = new DeclinedClientLog();
     
        
        $declinedclientlogsave->date= now()->toDateString('Y-m-d');
        $declinedclientlogsave->process_name= 'Solo Parent-Verification';
        $declinedclientlogsave->decline_type =  $request->input('declinetype');
        $declinedclientlogsave->decline_reason =  $request->input('declinereason');
        $declinedclientlogsave->declined_client_id = $declinedclientsave->id;
     
        $declinedclientlogsave->save();


        ClientApplication::where('id',$applicationid)->where('application_type','=','Solo Parent')->update(['application_status'=>'VERIFICATION-DECLINED']);


       
        $clientapplication=ClientApplication::where('id',$applicationid)->first();
        $clientdetails=Client::where('id',$clientid)->first();

        
        $details = [
            'title' => 'Mail from City Social Welfare and Development',
            'body' => 'Your reference number '

        ];
        Mail::to($clientdetails->email_address)->send(new DeclineMail($details, $clientapplication, $clientdetails));

        session_start();
        $_SESSION['success'] ="success";
        return redirect()->back()->with('success');  
        exit;
     }
    }
    
    
    

    public function search(Request $request)

    {
       
        if (DB::table('clients')  
        ->where('','=', 'Approved')
        ->where('application_status','=', 'Approved')
        ->exists())
        {
            
        }
      
           
      
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        //
    }
}
