<?php

namespace App\Http\Controllers;

use App\Models\ClientCard;
use App\Models\Client;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
class ClientCardController extends Controller
{



    public function verifyclient($cardnumber,$token)
    {
       $verifclient= ClientCard::where('card_number',$cardnumber)->where('token',$token)->first();
       $clientid= $verifclient->client_id;
       $clientdetails= Client::where('id',$clientid)->first();
        if($verifclient == null)
        {

          
          
         
            return view('pages/verification/notverifiedclient', [
            
            ])->with('fail');
         
            
            

        
        }
        else
        {
       
         
            return view('pages/verification/verifiedclient', [
               
            ])->with('fail')->with(compact('clientdetails','verifclient'));
         
            
        

        }
        
    }

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
     * @param  \App\Models\ClientCard  $clientCard
     * @return \Illuminate\Http\Response
     */
    public function show(ClientCard $clientCard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ClientCard  $clientCard
     * @return \Illuminate\Http\Response
     */
    public function edit(ClientCard $clientCard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ClientCard  $clientCard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClientCard $clientCard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ClientCard  $clientCard
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClientCard $clientCard)
    {
        //
    }
}
