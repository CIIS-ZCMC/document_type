<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12 col-md-10 mb-5">
           
                <div class="data-privacy">
                    <div class="card mt-3">
                        
                        <div class="card-header">
                           <h2>{{$details['title']}}</h2>
                        </div>

                        <div class="card-body">
                           
                            <p>{{$clientdetails->last_name}} , {{$clientdetails->first_name}}  {{$clientdetails->middle_name}} {{$clientdetails->extension_name}}. Your application
                               with reference number {{$clientcardsave->application_reference_number}} is verified.Please use your password {{$clientusersave->password}} and your email to login into your account.
                                <p>
                              <p>

                        </div>
                    </div>
                </div>

        </div>
    </div>
</div>