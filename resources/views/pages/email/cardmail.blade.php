<link rel="stylesheet" href="{{ asset('dist/css/card.css') }}"/>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12 col-md-10 mb-5">
           
                <div class="data-privacy">
                    <div class="card mt-3">
                        
                        <div class="card-header">
                           <h2>{{$details['title']}}</h2>
                        </div>

                        <div class="card-body">
                           
                            <div class="container1">
                                <div class="padding">
                                    <div class="font">
                                        <div class="top">
                                            <img id="photo">
                                        </div>
                                        <div class="bottom">
                                            <p id="fullname">{{$clientdetails->last_name}} , {{$clientdetails->first_name}}  {{$clientdetails->middle_name}} {{$clientdetails->extension_name}}</p>
                                            <p class="desi"></p>
                                            <div class="barcode">
                                                <img src="{{ $message->embed(public_path().'/images/qrcode/'.$clientcardsave->GUID) }}">
                                            </div>
                                            <br>
                                            <p id="phone" class="no">+91 8980849796</p>
                                            <p id="address" class="no">part-1,89 harinadad d...sdv..sdf..sfd..sd.</p>
                                        </div>
                                    </div>
                                </div>
                           
                         
                  </div>

                  

                        </div>
                    </div>
                </div>

        </div>
    </div>
</div>