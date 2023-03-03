<?php

namespace App\Http\Controllers;

use App\Models\MedicalAssistanceRequirement;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
class MedicalAssistanceRequirementController extends Controller
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
    public function applymedical(Request $request ,$id=null)
    {
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
                $requirementsave->client_id = $clientid;
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
                $requirementsave->client_id = $clientid;
                $requirementsave->save();
                
            }
        }

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MedicalAssistanceRequirement  $medicalAssistanceRequirement
     * @return \Illuminate\Http\Response
     */
    public function show(MedicalAssistanceRequirement $medicalAssistanceRequirement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MedicalAssistanceRequirement  $medicalAssistanceRequirement
     * @return \Illuminate\Http\Response
     */
    public function edit(MedicalAssistanceRequirement $medicalAssistanceRequirement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MedicalAssistanceRequirement  $medicalAssistanceRequirement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MedicalAssistanceRequirement $medicalAssistanceRequirement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MedicalAssistanceRequirement  $medicalAssistanceRequirement
     * @return \Illuminate\Http\Response
     */
    public function destroy(MedicalAssistanceRequirement $medicalAssistanceRequirement)
    {
        //
    }
}
