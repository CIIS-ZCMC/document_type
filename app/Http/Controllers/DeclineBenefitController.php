<?php

namespace App\Http\Controllers;

use App\Models\BenefitApplication;
use App\Models\BenefitClaim;
use App\Models\DeclineBenefit;
use App\Models\DeclinedBenefitLogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DeclineBenefitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
     * @param  \App\Models\DeclineBenefit  $declineBenefit
     * @return \Illuminate\Http\Response
     */
    public function show(DeclineBenefit $declineBenefit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DeclineBenefit  $declineBenefit
     * @return \Illuminate\Http\Response
     */
    public function edit(DeclineBenefit $declineBenefit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DeclineBenefit  $declineBenefit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DeclineBenefit $declineBenefit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DeclineBenefit  $declineBenefit
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeclineBenefit $declineBenefit)
    {
        //
    }

    public function declineseniorevaluationbenefit(Request $request,$clientid = null,$applicationid=null)
    {
        if (DB::table('decline_benefits')
           
        ->where('client_type','=','Senior')
        ->where('benefit_application_id','=', $applicationid)
        
        
        ->exists())
        {

            DeclineBenefit::where('id',$applicationid)->where('client_type','=','Senior')->update(['decline_type' => $request->input('declinetype'),'decline_reason' => $request->input('declinereason'),'process_name' => 'Senior-Evaluation']);
            BenefitApplication::where('id',$applicationid)->where('application_type','=','Senior')->update(['application_status'=>'EVALUATION-DECLINED']);
            $declinedclientid=DeclineBenefit::where('client_application_id',$applicationid)->where('client_type','=','Senior')->first();
      
            $declinedclientlogsave = new DeclinedBenefitLogs();
     
        
            $declinedclientlogsave->date= now()->toDateString('Y-m-d');
            $declinedclientlogsave->process_name= 'Senior-Evaluation';
            $declinedclientlogsave->decline_type =  $request->input('declinetype');
            $declinedclientlogsave->decline_reason =  $request->input('declinereason');
            $declinedclientlogsave->declined_client_id = $declinedclientid->id;
         
            $declinedclientlogsave->save();

            $_SESSION['fail'] ="fail";
            return redirect()->back()->with('fail');   
            exit;
        }
      
     else {
       

        $declinedclientsave = new DeclineBenefit();
     
        
        $declinedclientsave->date= now()->toDateString('Y-m-d');
        $declinedclientsave->client_type= 'Senior';
        $declinedclientsave->process_name= 'Senior-Evaluation';
        $declinedclientsave->decline_type =  $request->input('declinetype');
        $declinedclientsave->decline_reason =  $request->input('declinereason');
        $declinedclientsave->client_application_id = $applicationid;
     
        $declinedclientsave->save();

        $declinedclientlogsave = new DeclinedBenefitLogs();
     
        
        $declinedclientlogsave->date= now()->toDateString('Y-m-d');
        $declinedclientlogsave->process_name= 'Senior-Evaluation';
        $declinedclientlogsave->decline_type =  $request->input('declinetype');
        $declinedclientlogsave->decline_reason =  $request->input('declinereason');
        $declinedclientlogsave->declined_client_id = $declinedclientsave->id;
     
        $declinedclientlogsave->save();


        BenefitApplication::where('id',$applicationid)->where('application_type','=','Senior')->update(['application_status'=>'EVALUATION-DECLINED']);


       
        session_start();
        $_SESSION['success'] ="success";
       
     
        
        return redirect()->back()->with('success');  
        exit;
    }
}
    
    public function declineseniorapprovalbenefit(Request $request,$clientid = null,$applicationid=null)
    {
       
        if (DB::table('decline_benefits')
           
        ->where('client_type','=','Senior')
        ->where('benefit_application_id','=', $applicationid)
        
        
        ->exists())
        
      
        {

            DeclineBenefit::where('id',$applicationid)->where('client_type','=','Senior')->update(['decline_type' => $request->input('declinetype'),'decline_reason' => $request->input('declinereason'),'process_name' => 'Senior-Approval']);
            BenefitApplication::where('id',$applicationid)->where('application_type','=','Senior')->update(['application_status'=>'APPROVAL-DECLINED']);
            $declinedclientid=DeclineBenefit::where('client_application_id',$applicationid)->where('client_type','=','Senior')->first();
      
            $declinedclientlogsave = new DeclinedBenefitLogs();
     
        
            $declinedclientlogsave->date= now()->toDateString('Y-m-d');
            $declinedclientlogsave->process_name= 'Senior-Evaluation';
            $declinedclientlogsave->decline_type =  $request->input('declinetype');
            $declinedclientlogsave->decline_reason =  $request->input('declinereason');
            $declinedclientlogsave->declined_client_id = $declinedclientid->id;
         
            $declinedclientlogsave->save();

            $_SESSION['fail'] ="fail";
            return redirect()->back()->with('fail');   
            exit;
        }
      
     else {
       

        $declinedclientsave = new DeclineBenefit();
     
        
        $declinedclientsave->date= now()->toDateString('Y-m-d');
        $declinedclientsave->client_type= 'Senior';
        $declinedclientsave->process_name= 'Senior-Approval';
        $declinedclientsave->decline_type =  $request->input('declinetype');
        $declinedclientsave->decline_reason =  $request->input('declinereason');
        $declinedclientsave->client_application_id = $applicationid;
     
        $declinedclientsave->save();

        $declinedclientlogsave = new DeclinedBenefitLogs();
     
        
        $declinedclientlogsave->date= now()->toDateString('Y-m-d');
        $declinedclientlogsave->process_name= 'Senior-Approval';
        $declinedclientlogsave->decline_type =  $request->input('declinetype');
        $declinedclientlogsave->decline_reason =  $request->input('declinereason');
        $declinedclientlogsave->declined_client_id = $declinedclientsave->id;
     
        $declinedclientlogsave->save();


        BenefitApplication::where('id',$applicationid)->where('application_type','=','Senior')->update(['application_status'=>'APPROVAL-DECLINED']);


       
        session_start();
        $_SESSION['success'] ="success";
       
     
        
        return redirect()->back()->with('success');  
        exit;
    }
}
    
    public function declineseniorverificationbenefit(Request $request,$clientid = null,$applicationid=null)
    {
       
       
        if (DB::table('decline_benefits')
           
        ->where('client_type','=','Senior')
        ->where('benefit_application_id','=', $applicationid)
        
        
        ->exists())
        {

            DeclineBenefit::where('id',$applicationid)->where('client_type','=','Senior')->update(['decline_type' => $request->input('declinetype'),'decline_reason' => $request->input('declinereason'),'process_name' => 'Senior-Verification']);
            BenefitApplication::where('id',$applicationid)->where('application_type','=','Senior')->update(['application_status'=>'VERIFICATION-DECLINED']);
            $declinedclientid=DeclineBenefit::where('client_application_id',$applicationid)->where('client_type','=','Senior')->first();
      
            $declinedclientlogsave = new DeclinedBenefitLogs();
     
        
            $declinedclientlogsave->date= now()->toDateString('Y-m-d');
            $declinedclientlogsave->process_name= 'Senior-Evaluation';
            $declinedclientlogsave->decline_type =  $request->input('declinetype');
            $declinedclientlogsave->decline_reason =  $request->input('declinereason');
            $declinedclientlogsave->declined_client_id = $declinedclientid->id;
         
            $declinedclientlogsave->save();

            $_SESSION['fail'] ="fail";
            return redirect()->back()->with('fail');   
            exit;
        }
      
     else {
        $declinedclientsave = new DeclineBenefit();
     
        
        $declinedclientsave->date= now()->toDateString('Y-m-d');
        $declinedclientsave->client_type= 'Senior';
        $declinedclientsave->process_name= 'Senior-Verification';
        $declinedclientsave->decline_type =  $request->input('declinetype');
        $declinedclientsave->decline_reason =  $request->input('declinereason');
        $declinedclientsave->client_application_id = $applicationid;
     
        $declinedclientsave->save();

        $declinedclientlogsave = new DeclinedBenefitLogs();
     
        
        $declinedclientlogsave->date= now()->toDateString('Y-m-d');
        $declinedclientlogsave->process_name= 'Senior-Verification';
        $declinedclientlogsave->decline_type =  $request->input('declinetype');
        $declinedclientlogsave->decline_reason =  $request->input('declinereason');
        $declinedclientlogsave->declined_client_id = $declinedclientsave->id;
     
        $declinedclientlogsave->save();


        BenefitApplication::where('id',$applicationid)->where('application_type','=','Senior')->update(['application_status'=>'VERIFICATION-DECLINED']);


       
        session_start();
        $_SESSION['success'] ="success";
       
     
        
        return redirect()->back()->with('success');  
        exit;
    }
}


 
public function declinecitizenevaluation(Request $request,$clientid = null,$applicationid=null)
{
   
   
    if (DB::table('decline_benefits')
           
    ->where('client_type','=','Citizen')
    ->where('benefit_application_id','=', $applicationid)
    
    
    ->exists())
    {

        DeclineBenefit::where('id',$applicationid)->where('client_type','=','Citizen')->update(['decline_type' => $request->input('declinetype'),'decline_reason' => $request->input('declinereason'),'process_name' => 'Citizen-Evaluation']);
        BenefitApplication::where('id',$applicationid)->where('application_type','=','Citizen')->update(['application_status'=>'EVALUATION-DECLINED']);
        $declinedclientid=DeclineBenefit::where('client_application_id',$applicationid)->where('client_type','=','Citizen')->first();
      
        $declinedclientlogsave = new DeclinedBenefitLogs();
 
    
        $declinedclientlogsave->date= now()->toDateString('Y-m-d');
        $declinedclientlogsave->process_name= 'Citizen-Evaluation';
        $declinedclientlogsave->decline_type =  $request->input('declinetype');
        $declinedclientlogsave->decline_reason =  $request->input('declinereason');
        $declinedclientlogsave->declined_client_id = $declinedclientid->id;
     
        $declinedclientlogsave->save();

        $_SESSION['fail'] ="fail";
        return redirect()->back()->with('fail');   
        exit;
    }
  
 else {
  
    $declinedclientsave = new DeclineBenefit();
 
    
    $declinedclientsave->date= now()->toDateString('Y-m-d');
    $declinedclientsave->client_type= 'Citizen';
    $declinedclientsave->process_name= 'Citizen-Evaluation';
    $declinedclientsave->decline_type =  $request->input('declinetype');
    $declinedclientsave->decline_reason =  $request->input('declinereason');
    $declinedclientsave->client_application_id = $applicationid;
 
    $declinedclientsave->save();

    $declinedclientlogsave = new DeclinedBenefitLogs();
 
    
    $declinedclientlogsave->date= now()->toDateString('Y-m-d');
    $declinedclientlogsave->process_name= 'Citizen-Evaluation';
    $declinedclientlogsave->decline_type =  $request->input('declinetype');
    $declinedclientlogsave->decline_reason =  $request->input('declinereason');
    $declinedclientlogsave->declined_client_id = $declinedclientsave->id;
 
    $declinedclientlogsave->save();


    BenefitApplication::where('id',$applicationid)->where('application_type','=','Citizen')->update(['application_status'=>'EVALUATION-DECLINED']);


   
    session_start();
    $_SESSION['success'] ="success";
   
 
    
    return redirect()->back()->with('success');  
    exit;
}
}


public function declinecitizenapprovalbenefit(Request $request,$clientid = null,$applicationid=null)
{
  
    if (DB::table('decline_benefits')
           
    ->where('client_type','=','Citizen')
    ->where('benefit_application_id','=', $applicationid)
    
    
    ->exists())
    {

        
        DeclineBenefit::where('id',$applicationid)->where('client_type','=','Citizen')->update(['decline_type' => $request->input('declinetype'),'decline_reason' => $request->input('declinereason'),'process_name' => 'Citizen-Approval']);
        BenefitApplication::where('id',$applicationid)->where('application_type','=','Citizen')->update(['application_status'=>'APPROVAL-DECLINED']);
        $declinedclientid=DeclineBenefit::where('client_application_id',$applicationid)->where('client_type','=','Citizen')->first();
      
        $declinedclientlogsave = new DeclinedBenefitLogs();
 
    
        $declinedclientlogsave->date= now()->toDateString('Y-m-d');
        $declinedclientlogsave->process_name= 'Citizen-Approval';
        $declinedclientlogsave->decline_type =  $request->input('declinetype');
        $declinedclientlogsave->decline_reason =  $request->input('declinereason');
        $declinedclientlogsave->declined_client_id = $declinedclientid->id;
     
        $declinedclientlogsave->save();

        $_SESSION['fail'] ="fail";
        return redirect()->back()->with('fail');   
        exit;
    }
  
 else {
   

    $declinedclientsave = new DeclineBenefit();
    
    $declinedclientsave->date= now()->toDateString('Y-m-d');
    $declinedclientsave->client_type= 'Citizen';
    $declinedclientsave->process_name= 'Citizen-Approval';
    $declinedclientsave->decline_type =  $request->input('declinetype');
    $declinedclientsave->decline_reason =  $request->input('declinereason');
    $declinedclientsave->client_application_id = $applicationid;
 
    $declinedclientsave->save();

    $declinedclientlogsave = new DeclinedBenefitLogs();
 
    
    $declinedclientlogsave->date= now()->toDateString('Y-m-d');
    $declinedclientlogsave->process_name= 'Citizen-Approval';
    $declinedclientlogsave->decline_type =  $request->input('declinetype');
    $declinedclientlogsave->decline_reason =  $request->input('declinereason');
    $declinedclientlogsave->declined_client_id = $declinedclientsave->id;
 
    $declinedclientlogsave->save();


    BenefitApplication::where('id',$applicationid)->where('application_type','=','Citizen')->update(['application_status'=>'APPROVAL-DECLINED']);


   
    session_start();
    $_SESSION['success'] ="success";
   
 
    
    return redirect()->back()->with('success');  
    exit;
 }
}


public function declinecitizenverificationbenefit(Request $request,$clientid = null,$applicationid=null)
{
   
    if (DB::table('decline_benefits')
           
    ->where('client_type','=','Citizen')
    ->where('benefit_application_id','=', $applicationid)
    
    
    ->exists())
    {

        DeclineBenefit::where('id',$applicationid)->where('client_type','=','Citizen')->update(['decline_type' => $request->input('declinetype'),'decline_reason' => $request->input('declinereason'),'process_name' => 'Citizen-Verification']);
        BenefitApplication::where('id',$applicationid)->where('application_type','=','Citizen')->update(['application_status'=>'VERIFICATION-DECLINED']);
        $declinedclientid=DeclineBenefit::where('client_application_id',$applicationid)->where('client_type','=','Citizen')->first();
      
        $declinedclientlogsave = new DeclinedBenefitLogs();
 
    
        $declinedclientlogsave->date= now()->toDateString('Y-m-d');
        $declinedclientlogsave->process_name= 'Citizen-Evaluation';
        $declinedclientlogsave->decline_type =  $request->input('declinetype');
        $declinedclientlogsave->decline_reason =  $request->input('declinereason');
        $declinedclientlogsave->declined_client_id = $declinedclientid->id;
     
        $declinedclientlogsave->save();

        $_SESSION['fail'] ="fail";
        return redirect()->back()->with('fail');   
        exit;
    }
  
 else {

    $declinedclientsave = new DeclineBenefit();
 
    
    $declinedclientsave->date= now()->toDateString('Y-m-d');
    $declinedclientsave->client_type= 'Citizen';
    $declinedclientsave->process_name= 'Citizen-Verification';
    $declinedclientsave->decline_type =  $request->input('declinetype');
    $declinedclientsave->decline_reason =  $request->input('declinereason');
    $declinedclientsave->client_application_id = $applicationid;
 
    $declinedclientsave->save();

    $declinedclientlogsave = new DeclinedBenefitLogs();
 
    
    $declinedclientlogsave->date= now()->toDateString('Y-m-d');
    $declinedclientlogsave->process_name= 'Citizen-Verification';
    $declinedclientlogsave->decline_type =  $request->input('declinetype');
    $declinedclientlogsave->decline_reason =  $request->input('declinereason');
    $declinedclientlogsave->declined_client_id = $declinedclientsave->id;
 
    $declinedclientlogsave->save();


    DeclineBenefit::where('id',$applicationid)->where('application_type','=','Citizen')->update(['application_status'=>'VERIFICATION-DECLINED']);


   
    session_start();
    $_SESSION['success'] ="success";
   
 
    
    return redirect()->back()->with('success');  
    exit;
}
}

public function declinepwdevaluationbenefit(Request $request,$clientid = null,$applicationid=null)
{
   
    
    if (DB::table('decline_benefits')
           
    ->where('client_type','=','PWD')
    ->where('benefit_application_id','=', $applicationid)
    
    
    ->exists())
    {

        DeclineBenefit::where('id',$applicationid)->where('client_type','=','PWD')->update(['decline_type' => $request->input('declinetype'),'decline_reason' => $request->input('declinereason'),'process_name' => 'PWD-Evaluation']);
        BenefitApplication::where('id',$applicationid)->where('application_type','=','PWD')->update(['application_status'=>'EVALUATION-DECLINED']);
        $declinedclientid=DeclineBenefit::where('client_application_id',$applicationid)->where('client_type','=','PWD')->first();
      
        $declinedclientlogsave = new DeclinedBenefitLogs();
 
    
        $declinedclientlogsave->date= now()->toDateString('Y-m-d');
        $declinedclientlogsave->process_name= 'PWD-Evaluation';
        $declinedclientlogsave->decline_type =  $request->input('declinetype');
        $declinedclientlogsave->decline_reason =  $request->input('declinereason');
        $declinedclientlogsave->declined_client_id = $declinedclientid->id;
     
        $declinedclientlogsave->save();

        $_SESSION['fail'] ="fail";
        return redirect()->back()->with('fail');   
        exit;
    }
  
 else {

    $declinedclientsave = new DeclineBenefit();
 
    
    $declinedclientsave->date= now()->toDateString('Y-m-d');
    $declinedclientsave->client_type= 'PWD';
    $declinedclientsave->process_name= 'PWD-Evaluation';
    $declinedclientsave->decline_type =  $request->input('declinetype');
    $declinedclientsave->decline_reason =  $request->input('declinereason');
    $declinedclientsave->client_application_id = $applicationid;
 
    $declinedclientsave->save();

    $declinedclientlogsave = new DeclinedBenefitLogs();
 
    
    $declinedclientlogsave->date= now()->toDateString('Y-m-d');
    $declinedclientlogsave->process_name= 'PWD-Evaluation';
    $declinedclientlogsave->decline_type =  $request->input('declinetype');
    $declinedclientlogsave->decline_reason =  $request->input('declinereason');
    $declinedclientlogsave->declined_client_id = $declinedclientsave->id;
 
    $declinedclientlogsave->save();


    BenefitApplication::where('id',$applicationid)->where('application_type','=','PWD')->update(['application_status'=>'EVALUATION-DECLINED']);


   
    session_start();
    $_SESSION['success'] ="success";
   
 
    
    return redirect()->back()->with('success');  
    exit;
}
}

public function declinepwdapprovalbenefit(Request $request,$clientid = null,$applicationid=null)
{
    if (DB::table('decline_benefits')
           
    ->where('client_type','=','PWD')
    ->where('benefit_application_id','=', $applicationid)
    
    
    ->exists())
    {

        DeclineBenefit::where('id',$applicationid)->where('client_type','=','PWD')->update(['decline_type' => $request->input('declinetype'),'decline_reason' => $request->input('declinereason'),'process_name' => 'PWD-Approval']);
        BenefitApplication::where('id',$applicationid)->where('application_type','=','PWD')->update(['application_status'=>'APPROVAL-DECLINED']);
        $declinedclientid=DeclineBenefit::where('client_application_id',$applicationid)->where('client_type','=','PWD')->first();
        $declinedclientlogsave = new DeclinedBenefitLogs();
 
    
        $declinedclientlogsave->date= now()->toDateString('Y-m-d');
        $declinedclientlogsave->process_name= 'PWD-Evaluation';
        $declinedclientlogsave->decline_type =  $request->input('declinetype');
        $declinedclientlogsave->decline_reason =  $request->input('declinereason');
        $declinedclientlogsave->declined_client_id = $declinedclientid->id;
     
        $declinedclientlogsave->save();

        $_SESSION['fail'] ="fail";
        return redirect()->back()->with('fail');   
        exit;
    }
  
 else {
   

    $declinedclientsave = new DeclineBenefit();
 
    
    $declinedclientsave->date= now()->toDateString('Y-m-d');
    $declinedclientsave->client_type= 'PWD';
    $declinedclientsave->process_name= 'PWD-Evaluation';
    $declinedclientsave->decline_type =  $request->input('declinetype');
    $declinedclientsave->decline_reason =  $request->input('declinereason');
    $declinedclientsave->client_application_id = $applicationid;
 
    $declinedclientsave->save();

    $declinedclientlogsave = new DeclinedBenefitLogs();
 
    
    $declinedclientlogsave->date= now()->toDateString('Y-m-d');
    $declinedclientlogsave->process_name= 'PWD-Evaluation';
    $declinedclientlogsave->decline_type =  $request->input('declinetype');
    $declinedclientlogsave->decline_reason =  $request->input('declinereason');
    $declinedclientlogsave->declined_client_id = $declinedclientsave->id;
 
    $declinedclientlogsave->save();


    BenefitApplication::where('id',$applicationid)->where('application_type','=','PWD')->update(['application_status'=>'APPROVAL-DECLINED']);


   
    session_start();
    $_SESSION['success'] ="success";
   
 
    
    return redirect()->back()->with('success');  
    exit;
 }
}

public function declinepwdverificationbenefit(Request $request,$clientid = null,$applicationid=null)
{
    if (DB::table('decline_benefits')
           
    ->where('client_type','=','PWD')
    ->where('benefit_application_id','=', $applicationid)
    
    
    ->exists())
    {

        DeclineBenefit::where('id',$applicationid)->where('client_type','=','PWD')->update(['decline_type' => $request->input('declinetype'),'decline_reason' => $request->input('declinereason'),'process_name' => 'PWD-Verification']);
        BenefitApplication::where('id',$applicationid)->where('application_type','=','PWD')->update(['application_status'=>'VERIFICATION-DECLINED']);
        $declinedclientid=DeclineBenefit::where('client_application_id',$applicationid)->where('client_type','=','PWD')->first();
        $declinedclientlogsave = new DeclinedBenefitLogs();
 
    
        $declinedclientlogsave->date= now()->toDateString('Y-m-d');
        $declinedclientlogsave->process_name= 'PWD-Evaluation';
        $declinedclientlogsave->decline_type =  $request->input('declinetype');
        $declinedclientlogsave->decline_reason =  $request->input('declinereason');
        $declinedclientlogsave->declined_client_id = $declinedclientid->id;
     
        $declinedclientlogsave->save();

        $_SESSION['fail'] ="fail";
        return redirect()->back()->with('fail');   
        exit;
    }
  
 else {
   

    $declinedclientsave = new DeclineBenefit();
 
    
    $declinedclientsave->date= now()->toDateString('Y-m-d');
    $declinedclientsave->client_type= 'PWD';
    $declinedclientsave->process_name= 'PWD-Evaluation';
    $declinedclientsave->decline_type =  $request->input('declinetype');
    $declinedclientsave->decline_reason =  $request->input('declinereason');
    $declinedclientsave->client_application_id = $applicationid;
 
    $declinedclientsave->save();

    $declinedclientlogsave = new DeclinedBenefitLogs();
 
    
    $declinedclientlogsave->date= now()->toDateString('Y-m-d');
    $declinedclientlogsave->process_name= 'PWD-Evaluation';
    $declinedclientlogsave->decline_type =  $request->input('declinetype');
    $declinedclientlogsave->decline_reason =  $request->input('declinereason');
    $declinedclientlogsave->declined_client_id = $declinedclientsave->id;
 
    $declinedclientlogsave->save();


    BenefitApplication::where('id',$applicationid)->where('application_type','=','PWD')->update(['application_status'=>'VERIFICATION-DECLINED']);


   
    session_start();
    $_SESSION['success'] ="success";
   
 
    
    return redirect()->back()->with('success');  
    exit;
 }
}


public function declinesoloparentevaluationbenefit(Request $request,$clientid = null,$applicationid=null)
    {
       
       

        if (DB::table('decline_benefits')
           
    ->where('client_type','=','Solo Parent')
    ->where('benefit_application_id','=', $applicationid)
    
    
    ->exists())
        {

            DeclineBenefit::where('id',$applicationid)->where('client_type','=','Solo Parent')->update(['decline_type' => $request->input('declinetype'),'decline_reason' => $request->input('declinereason'),'process_name' => 'Solo Parent-Evaluation']);
            BenefitApplication::where('id',$applicationid)->where('application_type','=','Solo Parent')->update(['application_status'=>'EVALUATION-DECLINED']);
            $declinedclientid=DeclineBenefit::where('client_application_id',$applicationid)->where('client_type','=','Solo Parent')->first();
            $declinedclientlogsave = new DeclinedBenefitLogs();
     
        
            $declinedclientlogsave->date= now()->toDateString('Y-m-d');
            $declinedclientlogsave->process_name= 'Solo Parent-Evaluation';
            $declinedclientlogsave->decline_type =  $request->input('declinetype');
            $declinedclientlogsave->decline_reason =  $request->input('declinereason');
            $declinedclientlogsave->declined_client_id = $declinedclientid->id;
         
            $declinedclientlogsave->save();

            $_SESSION['fail'] ="fail";
            return redirect()->back()->with('fail');   
            exit;
        }
      
     else {

        $declinedclientsave = new DeclineBenefit();
     
        
        $declinedclientsave->date= now()->toDateString('Y-m-d');
        $declinedclientsave->client_type= 'Solo Parent';
        $declinedclientsave->process_name= 'Solo Parent-Evaluation';
        $declinedclientsave->decline_type =  $request->input('declinetype');
        $declinedclientsave->decline_reason =  $request->input('declinereason');
        $declinedclientsave->client_application_id = $applicationid;
     
        $declinedclientsave->save();

        $declinedclientlogsave = new DeclinedBenefitLogs();
     
        
        $declinedclientlogsave->date= now()->toDateString('Y-m-d');
        $declinedclientlogsave->process_name= 'Solo Parent-Evaluation';
        $declinedclientlogsave->decline_type =  $request->input('declinetype');
        $declinedclientlogsave->decline_reason =  $request->input('declinereason');
        $declinedclientlogsave->declined_client_id = $declinedclientsave->id;
     
        $declinedclientlogsave->save();


        BenefitApplication::where('id',$applicationid)->where('application_type','=','Solo Parent')->update(['application_status'=>'EVALUATION-DECLINED']);


       
        session_start();
        $_SESSION['success'] ="success";
       
     
        
        return redirect()->back()->with('success');  
        exit;
    }
    }
    
    public function declinesoloparentapprovalbenefit(Request $request,$clientid = null,$applicationid=null)
    {
       
       

        if (DB::table('decline_benefits')
           
        ->where('client_type','=','Solo Parent')
        ->where('benefit_application_id','=', $applicationid)
        
        
        ->exists())
        {

            DeclineBenefit::where('id',$applicationid)->where('client_type','=','Solo Parent')->update(['decline_type' => $request->input('declinetype'),'decline_reason' => $request->input('declinereason'),'process_name' => 'Solo Parent-Approval']);
            BenefitApplication::where('id',$applicationid)->where('application_type','=','Solo Parent')->update(['application_status'=>'APPROVAL-DECLINED']);
            $declinedclientid=DeclineBenefit::where('client_application_id',$applicationid)->where('client_type','=','Solo Parent')->first();
            $declinedclientlogsave = new DeclinedBenefitLogs();
     
        
            $declinedclientlogsave->date= now()->toDateString('Y-m-d');
            $declinedclientlogsave->process_name= 'Solo Parent-Evaluation';
            $declinedclientlogsave->decline_type =  $request->input('declinetype');
            $declinedclientlogsave->decline_reason =  $request->input('declinereason');
            $declinedclientlogsave->declined_client_id = $declinedclientid->id;
         
            $declinedclientlogsave->save();

            $_SESSION['fail'] ="fail";
            return redirect()->back()->with('fail');   
            exit;
        }
      
     else {
       

        $declinedclientsave = new DeclineBenefit();
     
        
        $declinedclientsave->date= now()->toDateString('Y-m-d');
        $declinedclientsave->client_type= 'Solo Parent';
        $declinedclientsave->process_name= 'Solo Parent-Evaluation';
        $declinedclientsave->decline_type =  $request->input('declinetype');
        $declinedclientsave->decline_reason =  $request->input('declinereason');
        $declinedclientsave->client_application_id = $applicationid;
     
        $declinedclientsave->save();

        $declinedclientlogsave = new DeclinedBenefitLogs();
     
        
        $declinedclientlogsave->date= now()->toDateString('Y-m-d');
        $declinedclientlogsave->process_name= 'Solo Parent-Evaluation';
        $declinedclientlogsave->decline_type =  $request->input('declinetype');
        $declinedclientlogsave->decline_reason =  $request->input('declinereason');
        $declinedclientlogsave->declined_client_id = $declinedclientsave->id;
     
        $declinedclientlogsave->save();


        BenefitApplication::where('id',$applicationid)->where('application_type','=','Solo Parent')->update(['application_status'=>'APPROVAL-DECLINED']);


       
        session_start();
        $_SESSION['success'] ="success";
       
     
        
        return redirect()->back()->with('success');  
        exit;
     }
    }
    
    public function declinesoloparentverificationbenefit(Request $request,$clientid = null,$applicationid=null)
    {

       
        if (DB::table('decline_benefits')
           
    ->where('client_type','=','Solo Parent')
    ->where('benefit_application_id','=', $applicationid)
    
    
    ->exists())
        {

            DeclineBenefit::where('id',$applicationid)->where('client_type','=','Solo Parent')->update(['decline_type' => $request->input('declinetype'),'decline_reason' => $request->input('declinereason'),'process_name' => 'Solo Parent-Verification']);
            BenefitApplication::where('id',$applicationid)->where('application_type','=','Solo Parent')->update(['application_status'=>'VERIFICATION-DECLINED']);
            $declinedclientid=DeclineBenefit::where('client_application_id',$applicationid)->where('client_type','=','Solo Parent')->first();
            $declinedclientlogsave = new DeclinedBenefitLogs();
     
        
            $declinedclientlogsave->date= now()->toDateString('Y-m-d');
            $declinedclientlogsave->process_name= 'Solo Parent-Evaluation';
            $declinedclientlogsave->decline_type =  $request->input('declinetype');
            $declinedclientlogsave->decline_reason =  $request->input('declinereason');
            $declinedclientlogsave->declined_client_id = $declinedclientid->id;
         
            $declinedclientlogsave->save();

            $_SESSION['fail'] ="fail";
            return redirect()->back()->with('fail');   
            exit;
        }
      
     else {
       

        $declinedclientsave = new DeclineBenefit();
     
        
        $declinedclientsave->date= now()->toDateString('Y-m-d');
        $declinedclientsave->client_type= 'Solo Parent';
        $declinedclientsave->process_name= 'Solo Parent-Evaluation';
        $declinedclientsave->decline_type =  $request->input('declinetype');
        $declinedclientsave->decline_reason =  $request->input('declinereason');
        $declinedclientsave->client_application_id = $applicationid;
     
        $declinedclientsave->save();

        $declinedclientlogsave = new DeclinedBenefitLogs();
     
        
        $declinedclientlogsave->date= now()->toDateString('Y-m-d');
        $declinedclientlogsave->process_name= 'Solo Parent-Evaluation';
        $declinedclientlogsave->decline_type =  $request->input('declinetype');
        $declinedclientlogsave->decline_reason =  $request->input('declinereason');
        $declinedclientlogsave->declined_client_id = $declinedclientsave->id;
     
        $declinedclientlogsave->save();


        BenefitApplication::where('id',$applicationid)->where('application_type','=','Solo Parent')->update(['application_status'=>'VERIFICATION-DECLINED']);


       
        session_start();
        $_SESSION['success'] ="success";
       
     
        
        return redirect()->back()->with('success');  
        exit;
     }
    }
}
