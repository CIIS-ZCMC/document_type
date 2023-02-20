<?php

namespace App\Http\Controllers;

use App\Models\BenefitRequirement;
use Illuminate\Http\Request;
use App\Models\User;

class BenefitRequirementController extends Controller
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
    public function store(Request $request, $id = null)
    {
        $requirement =  $request->input('requirement');
        foreach($requirement  as $key => $value) {     
            if($requirement!=null) 
            {
                $benefitrequirementsave = new BenefitRequirement();
                $benefitrequirementsave->requirement_id = $value;
                $benefitrequirementsave->benefit_id =$id;
                $benefitrequirementsave->save();

            }
        
        
        }

        session_start();
        $_SESSION['success'] ="success";
        
        return redirect()->back()->with('success');  
        exit;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BenefitRequirement  $benefitRequirement
     * @return \Illuminate\Http\Response
     */
    public function show(BenefitRequirement $benefitRequirement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BenefitRequirement  $benefitRequirement
     * @return \Illuminate\Http\Response
     */
    public function edit(BenefitRequirement $benefitRequirement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BenefitRequirement  $benefitRequirement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BenefitRequirement $benefitRequirement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BenefitRequirement  $benefitRequirement
     * @return \Illuminate\Http\Response
     */
    public function destroy(BenefitRequirement $benefitRequirement)
    {
        //
    }

    public function select_benefit_requirements(Request $request)
    {
        // $benefit_id = $request->input('benefit_id');
        // $requirement_id = $request->input('requirement_id');
        // $sundays = $request->input('requirement_id');
        // $sundaysArray = array();
        // foreach($sundays as $sunday){
        //     $sundaysArray = $sunday;
        //     $benefit_requirement_save = new BenefitRequirement();
        //     $benefit_requirement_save->benefit_id =$benefit_id;
        //     $benefit_requirement_save->requirement_id =json_encode($sundaysArray);
        //     $benefit_requirement_save->save();
        //  }
        
        $LoggedInUser = User::where('id', '=', session('LoggedUser'))->first();
        
        $benefit_id = $request->input('benefit_id');
        $requirement_id = $request->input('requirement_id');

        foreach($requirement_id  as $key => $value) {     
            if($requirement_id!=null) 
            {
                if (BenefitRequirement::where('benefit_id','=', $benefit_id)
                ->where('requirement_id','=', $requirement_id[$key])
                ->exists())
                {
                    BenefitRequirement::where('benefit_id','=', $benefit_id)
                    ->where('requirement_id','=', $requirement_id[$key])
                    ->update(['removed_status'=>1,'removed_by'=>$LoggedInUser->name,'removed_date'=>Now()]);
                }
                else{
                    $benefitrequirementsave = new BenefitRequirement();
                    $benefitrequirementsave->requirement_id = $requirement_id[$key];
                    $benefitrequirementsave->benefit_id =$benefit_id;
                    $benefitrequirementsave->save();
                }
         
            } 
        }
        
        session_start();
        $_SESSION['success'] ="success";
        
        return redirect()->back()->with('success');  
        exit;
    }
}
