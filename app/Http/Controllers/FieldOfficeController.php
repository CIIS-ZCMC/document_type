<?php

namespace App\Http\Controllers;

use App\Models\FieldOffice;
use Illuminate\Http\Request;

class FieldOfficeController extends Controller
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
       


        $fosave = new FieldOffice();
     
        $fosave->name = $request->input('name');
        $fosave->address = $request->input('address');
       
        $fosave->save();

    
        session_start();
        $_SESSION['success'] ="success";
        
        return redirect()->back()->with('success');  
        exit;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FieldOffice  $fieldOffice
     * @return \Illuminate\Http\Response
     */
    public function show(FieldOffice $fieldOffice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FieldOffice  $fieldOffice
     * @return \Illuminate\Http\Response
     */
    public function edit(FieldOffice $fieldOffice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FieldOffice  $fieldOffice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FieldOffice $fieldOffice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FieldOffice  $fieldOffice
     * @return \Illuminate\Http\Response
     */
    public function destroy(FieldOffice $fieldOffice)
    {
        //
    }
}
