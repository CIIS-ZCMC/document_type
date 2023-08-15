<?php

namespace App\Http\Controllers;

use App\Http\Resources\Detail;
use App\Models\Detail as ModelsDetail;
use App\Models\DocumentTypeDetail;
use Illuminate\Http\Request;

class DocumentTypeDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       
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
    public function store(Request $request,$document_type_id=null)
    {
        $document_type_details_store = new DocumentTypeDetail();
        $document_type_details_store->document_type_id = $document_type_id;
        $document_type_details_store->save();

        $name =  $request->name;
        $details =  $request->detail;
        

        foreach($name  as $key => $value) {       
            if($name!=null)
            {
            $detail = new ModelsDetail();
            $detail->name = $value;
            $detail->description = $details[$key];
            $detail->document_type_detail_id = $document_type_details_store->id;
            $detail->save();
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
     * @param  \App\Models\DocumentTypeDetail  $documentTypeDetail
     * @return \Illuminate\Http\Response
     */
    public function show(DocumentTypeDetail $documentTypeDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DocumentTypeDetail  $documentTypeDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(DocumentTypeDetail $documentTypeDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DocumentTypeDetail  $documentTypeDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DocumentTypeDetail $documentTypeDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DocumentTypeDetail  $documentTypeDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(DocumentTypeDetail $documentTypeDetail)
    {
        //
    }
}
