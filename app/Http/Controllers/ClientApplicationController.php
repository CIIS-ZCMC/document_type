<?php

namespace App\Http\Controllers;

use App\Models\ClientApplication;
use Illuminate\Http\Request;
use App\Models\Barangay;

class ClientApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



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
     * @param  \App\Models\ClientApplication  $clientApplication
     * @return \Illuminate\Http\Response
     */
    public function show(ClientApplication $clientApplication)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ClientApplication  $clientApplication
     * @return \Illuminate\Http\Response
     */
    public function edit(ClientApplication $clientApplication)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ClientApplication  $clientApplication
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClientApplication $clientApplication)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ClientApplication  $clientApplication
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClientApplication $clientApplication)
    {
        //
    }
}
