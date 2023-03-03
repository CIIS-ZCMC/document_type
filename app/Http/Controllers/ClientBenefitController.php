<?php

namespace App\Http\Controllers;

use App\Models\ClientBenefit;
use Illuminate\Http\Request;

class ClientBenefitController extends Controller
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
        $benefit =  $request->input('benefit');
        foreach($benefit  as $key => $value) {     
            if($benefit!=null) 
            {
                $check=ClientBenefit::where(['client_type_id' => $id])->where(['benefit_id' => $value])->first();
                if($check==null)
                {
                $benefitrequirementsave = new ClientBenefit();
             
                $benefitrequirementsave->client_type_id =$id;
                $benefitrequirementsave->benefit_id = $value;
                $benefitrequirementsave->save();
                }

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
     * @param  \App\Models\ClientBenefit  $clientBenefit
     * @return \Illuminate\Http\Response
     */
    public function show(ClientBenefit $clientBenefit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ClientBenefit  $clientBenefit
     * @return \Illuminate\Http\Response
     */
    public function edit(ClientBenefit $clientBenefit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ClientBenefit  $clientBenefit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClientBenefit $clientBenefit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ClientBenefit  $clientBenefit
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClientBenefit $clientBenefit)
    {
        //
    }
}
