<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12 col-md-10 mb-5">
           
                <div class="data-privacy">
                    <div class="card mt-3">
                        
                        <div class="card-header">
                           <h2>{{$details['title']}}</h2>
                        </div>

                        <div class="card-body">
                           
                            <p>{{$clientdetails->last_name}} , {{$clientdetails->first_name}}  {{$clientdetails->middle_name}} {{$clientdetails->extension_name}}. {{$details['body']}}
                               is {{$clientapplication->application_reference_number}} .Please use your reference number to track your application.
                                <p>
                              <p>

                        </div>
                    </div>
                </div>

        </div>
    </div>
</div>