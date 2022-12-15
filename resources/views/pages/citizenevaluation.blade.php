@extends('../layout/' . $layout)
<link rel="stylesheet" href=" https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
@section('subhead')
    <title>Citizen Evaluation | Social Welfare Registration and Benefits System</title>
@endsection

@section('subcontent')

 
    <h2 class="intro-y text-lg font-medium mt-10">List of Items</h2>
    <div class="grid grid-cols-12 gap-6 mt-5">       <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
          
          
                
               
          
           
           
        </div>


        

       
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table id="datatable" class="table table-report mt-2" style="width: 100%">
                <thead>
                    <tr>
                        <th class="whitespace-nowrap">No.</th>
                        <th class="whitespace-nowrap">Name</th>
                        <th class="whitespace-nowrap">Address</th>
                        <th class="whitespace-nowrap">Reference Number</th>
                         <th class="whitespace-nowrap">Date Applied</th>
                         <th id="filename" class="whitespace-nowrap">filename</th>
                       
                        <th id="filename" class="whitespace-nowrap">firstname</th>
                        <th id="filename" class="whitespace-nowrap">lastname</th>
                        <th id="filename" class="whitespace-nowrap">middlname</th>
                        <th id="filename" class="whitespace-nowrap">extensionname</th>
                        <th id="filename" class="whitespace-nowrap">street</th>
                        <th id="filename" class="whitespace-nowrap">city</th>
                        <th id="filename" class="whitespace-nowrap">province</th>
                        <th id="filename" class="whitespace-nowrap">sex</th>
                        <th id="filename" class="whitespace-nowrap">birthdate</th>
                        <th id="filename" class="whitespace-nowrap">birthplace</th>
                        <th id="filename" class="whitespace-nowrap">civilstatus</th>
                        <th id="filename" class="whitespace-nowrap">education</th>
                        <th id="filename" class="whitespace-nowrap">religion</th>
                        <th id="filename" class="whitespace-nowrap">nationality</th>
                        <th id="filename" class="whitespace-nowrap">skill</th>
                        <th id="filename" class="whitespace-nowrap">hobby</th>
                        <th id="filename" class="whitespace-nowrap">employment status</th>
                        <th id="filename" class="whitespace-nowrap">employment category</th>
                        <th id="filename" class="whitespace-nowrap">employment type</th>
                        <th id="filename" class="whitespace-nowrap">occupation</th>
                        <th id="filename" class="whitespace-nowrap">salary</th>
                        <th id="filename" class="whitespace-nowrap">id</th>
                        <th id="filename" class="whitespace-nowrap">appid</th>
                       

                        <th id="filename" class="whitespace-nowrap">salary</th>
                        <th id="filename" class="whitespace-nowrap">id</th>
                        <th id="filename" class="whitespace-nowrap">appid</th>
                       
                       
                       
                       
                        <th class="text-center whitespace-nowrap">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($clients as $index => $client) 
                    
                            {{-- @php
                                dd($clients)
                            @endphp --}}
                          
                                <tr class="intro-x">
                                    <td id="clientid">{{$index + 1}}</td>
                                    <td>{{ $client->last_name}}, {{ $client->first_name}} {{ $client->middle_name}} {{ $client->extension_name}}</td>
                                    <td>{{$client->barangays->name}}
                                    <td> @foreach($client->client_applications as  $clientapp)
                                        {{$clientapp->application_reference_number}}
                                      @endforeach</td>
                                      <td> @foreach($client->client_applications as  $clientapp)
                                        {{$clientapp->application_date}}
                                      @endforeach</td>    
                                      <td id="filename"> 
                                        {{$client->client_application_requirements[0]->filename}}
                                      </td>
                                      <td id="filename">{{ $client->first_name}}</td>    
                                      <td id="filename">{{ $client->last_name}}</td>    
                                      <td id="filename">{{ $client->middle_name}}</td>    
                                      <td id="filename">{{ $client->extension_name}}</td>    
                                      <td id="filename"> {{ $client->street}}</td>    
                                      <td id="filename">{{ $client->municipality}}</td>    
                                      <td id="filename">{{ $client->province}}</td>   
                                      <td id="filename">{{ $client->sex}}</td>    
                                      <td id="filename">{{ $client->birth_date}}</td>    
                                      <td id="filename">{{ $client->birth_place}}</td>   
                                      <td id="filename">{{ $client->civil_status}}</td>   
                                      <td id="filename">{{ $client->educational_attainment}}</td>  
                                      <td id="filename">{{ $client->nationality}}</td>    
                                      <td id="filename">{{ $client->religion}}</td>    
                                      <td id="filename">{{ $client->skills_talents}}</td>    
                                      <td id="filename">{{ $client->hobbies}}</td>  
                                      <td id="filename">{{$client->occupations->employment_status}}
                                        <td id="filename">{{$client->occupations->employment_type}}
                                        <td id="filename">{{$client->occupations->employment_category}}
                                        <td id="filename">{{$client->occupations->occupation}}
                                        <td id="filename">{{$client->occupations->salary}}
                                            <td id="filename">{{$client->id}}
                                             
                                                    <td  id="filename"> @foreach($client->client_applications as  $clientapp)
                                                        {{$clientapp->id}}
                                                      @endforeach</td>
                                        
                                                      <td id="filename">{{$client->contact_number}}
                                                        <td id="filename">{{$client->email_address}}
                                                            <td id="filename">{{$client->landline_number}}
                                                       
                                                     
                                   
                                
                                
                                    <td class="table-report__action w-56">
                                        <div class="flex justify-center items-center" >
                                        <button href="javascript:;" class="btn btn-outline-primary w-32 mr-1 edit" data-tw-toggle="modal" data-tw-target="#evaluateclient">Evaluate</button>
                                        
                                        </a>
                                        
                                        </div>
                                    </td>
                                </tr>
                           
                        
                        
                   
                    @endforeach
                   
                </tbody>
            </table>
        </div>
        <!-- END: Data List -->
        <!-- BEGIN: Pagination -->
        {{-- <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
            <nav class="w-full sm:w-auto sm:mr-auto">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="#">
                            <i class="w-4 h-4" data-lucide="chevrons-left"></i>
                        </a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">
                            <i class="w-4 h-4" data-lucide="chevron-left"></i>
                        </a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">...</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">1</a>
                    </li>
                    <li class="page-item active">
                        <a class="page-link" href="#">2</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">3</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">...</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">
                            <i class="w-4 h-4" data-lucide="chevron-right"></i>
                        </a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">
                            <i class="w-4 h-4" data-lucide="chevrons-right"></i>
                        </a>
                    </li>
                </ul>
            </nav>
            <select class="w-20 form-select box mt-3 sm:mt-0">
                <option>10</option>
                <option>25</option>
                <option>35</option>
                <option>50</option>
            </select>
        </div> --}}
        <!-- END: Pagination -->
    </div>
  
   
      <!-- BEGIN: New field office Modal -->
      <div id="evaluateclient" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content2">
                <div class="modal-header">
                    <h2 class="font-medium text-base mr-auto">Evaluate Client</h2>
                </div>
                <form action="/evaluatecitizen" method="POST" method="POST" enctype="multipart/form-data" id="editform" >
                    @csrf
                    <div class="intro-y box px-5 pt-5 mt-5">
                        <div class="flex flex-col lg:flex-row border-b border-slate-200/60 dark:border-darkmode-400 pb-5 -mx-5">
                            <div class="flex flex-1 px-5 items-center justify-center lg:justify-start">
                               <div class="w-20 h-20 sm:w-24 sm:h-24 flex-none lg:w-32 lg:h-32 image-fit relative">
                                   <img  class="rounded-full" id="userphoto">
                                   
                                </div>
                              
                                
                                
                                <div class="ml-5">
                                    <div id="type" class="w-24 sm:w-40 truncate sm:whitespace-normal font-medium text-lg"></div>
                                    <div id="date" class="text-slate-500"></div>
                                    <div id="sex" class="text-slate-500"></div>
                                    <div id="age" class="text-slate-500"></div>
                                </div>
                            </div>


                            <div class="mt-6 lg:mt-0 flex-1 px-5 border-l border-r border-slate-200/60 dark:border-darkmode-400 border-t lg:border-t-0 pt-5 lg:pt-0">
                                <div class="font-medium text-center lg:text-left lg:mt-3">Client Name</div>
                                <div class="flex flex-col justify-center items-center lg:items-start mt-4">
                                    <div id="firstname" class="truncate sm:whitespace-normal flex items-center"> <i data-lucide="mail" class="w-4 h-4 mr-2"></i> johnnydepp@left4code.com </div>
                                    <div id="middlename" class="truncate sm:whitespace-normal flex items-center mt-3"> <i data-lucide="instagram" class="w-4 h-4 mr-2"></i> Instagram Johnny Depp </div>
                                    <div id="lastname" class="truncate sm:whitespace-normal flex items-center mt-3"> <i data-lucide="twitter" class="w-4 h-4 mr-2"></i> Twitter Johnny Depp </div>
                                    <div id="middlename1" class="truncate sm:whitespace-normal flex items-center mt-3"> <i data-lucide="twitter" class="w-4 h-4 mr-2"></i> Twitter Johnny Depp </div>
                                </div>
                            </div>
                            <div class="mt-6 lg:mt-0 flex-1 px-5 border-l border-r border-slate-200/60 dark:border-darkmode-400 border-t lg:border-t-0 pt-5 lg:pt-0">
                                <div class="font-medium text-center lg:text-left lg:mt-3">Clent Address</div>
                                <div class="flex flex-col justify-center items-center lg:items-start mt-4">
                                    <div id="street" class="truncate sm:whitespace-normal flex items-center"> <i data-lucide="mail" class="w-4 h-4 mr-2"></i> johnnydepp@left4code.com </div>
                                    <div id="barangay" class="truncate sm:whitespace-normal flex items-center mt-3"> <i data-lucide="instagram" class="w-4 h-4 mr-2"></i> Instagram Johnny Depp </div>
                                    <div id="city" class="truncate sm:whitespace-normal flex items-center mt-3"> <i data-lucide="twitter" class="w-4 h-4 mr-2"></i> Twitter Johnny Depp </div>
                                    <div id="province" class="truncate sm:whitespace-normal flex items-center mt-3"> <i data-lucide="twitter" class="w-4 h-4 mr-2"></i> Twitter Johnny Depp </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="intro-y box mt-5">
                        <div class="flex items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                            <h2 class="font-medium text-base mr-auto">
                               Contact Information
                            </h2>
                        </div>
                        <div class="p-5">
                            <div class="grid grid-cols-12 gap-x-5">
                                <div class="col-span-12 xl:col-span-6">
                                    <div >
                                        <label for="update-profile-form-6" class="form-label">Contact Number</label>
                                        <input id="contactnumber" type="text" class="form-control"  value="" disabled>
                                    </div>
                                    <div >
                                        <label for="update-profile-form-6" class="form-label">Landline Number</label>
                                        <input id="landlinenumber" type="text" class="form-control"  value="" disabled>
                                    </div>
                                   
                                    
                                </div>
                                <div class="col-span-12 xl:col-span-6">
                                    <div class="mt-3 xl:mt-0">
                                        <label for="religion" class="form-label">Email Address</label>
                                        <input id="emailaddress" type="text" class="form-control" placeholder="Input text" value="" disabled>
                                    </div>
                                 

                                   
                                </div>
                            </div>
                           
                        </div>
                    </div>
                   
                    <div class="intro-y box mt-5">
                        <div class="flex items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                            <h2 class="font-medium text-base mr-auto">
                               Other Personal Information
                            </h2>
                        </div>
                        <div class="p-5">
                            <div class="grid grid-cols-12 gap-x-5">
                                <div class="col-span-12 xl:col-span-6">
                                    <div >
                                        <label for="update-profile-form-6" class="form-label">Date of Birth</label>
                                        <input id="birthdate" type="text" class="form-control"  value="" disabled>
                                    </div>
                                    <div class="mt-3">
                                        <label for="" class="form-label">Place of Birth</label>
                                        <input id="birthplace" type="text" class="form-control" placeholder="Input text" value="" disabled>
                                    </div>
                                    <div class="mt-3">
                                        <label for="" class="form-label">Civil Status</label>
                                        <input id="civilstatus" type="text" class="form-control" placeholder="Input text" value="" disabled>
                                    </div>
                                    <div class="mt-3">
                                        <label for="" class="form-label">Educational Attainment</label>
                                        <input id="educational" type="text" class="form-control" placeholder="Input text" value="" disabled>
                                    </div>
                                    
                                </div>
                                <div class="col-span-12 xl:col-span-6">
                                    <div class="mt-3 xl:mt-0">
                                        <label for="religion" class="form-label">Religion</label>
                                        <input id="religion" type="text" class="form-control" placeholder="Input text" value="" disabled>
                                    </div>
                                    <div class="mt-3">
                                        <label for="update-profile-form-11" class="form-label">Nationality</label>
                                        <input id="nationality" type="text" class="form-control" placeholder="Input text" value="" disabled>
                                    </div>
                                    <div class="mt-3">
                                        <label for="update-profile-form-12" class="form-label">Skill/Talent</label>
                                        <input id="skills" type="text" class="form-control" placeholder="Input text" value="" disabled>
                                    </div>
                                    <div class="mt-3">
                                        <label for="update-profile-form-13" class="form-label">Hobbies</label>
                                        <input id="hobbies" type="text" class="form-control" placeholder="Input text" value="" disabled>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                    

                    <div class="intro-y box mt-5">
                        <div class="flex items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                            <h2 class="font-medium text-base mr-auto">
                                Occupation
                            </h2>
                        </div>
                        <div class="p-5">
                            <div class="grid grid-cols-12 gap-x-5">
                                <div class="col-span-12 xl:col-span-6">
                                    <div >
                                        <label for="update-profile-form-6" class="form-label">Status of Employment</label>
                                        <input id="status" type="text" class="form-control"  value="" disabled>
                                    </div>
                                    <div class="mt-3">
                                        <label for="" class="form-label">Category of Employment</label>
                                        <input id="category" type="text" class="form-control" placeholder="Input text" value="" disabled>
                                    </div>
                                    <div class="mt-3">
                                        <label for="" class="form-label">Type of Employment</label>
                                        <input id="typeemp" type="text" class="form-control" placeholder="Input text" value="" disabled>
                                    </div>
                                    
                                </div>
                                <div class="col-span-12 xl:col-span-6">
                                    <div class="mt-3 xl:mt-0">
                                        <label for="religion" class="form-label">Occupation</label>
                                        <input id="occupation" type="text" class="form-control" placeholder="Input text" value="" disabled>
                                    </div>
                                    <div class="mt-3">
                                        <label for="update-profile-form-11" class="form-label">Salary</label>
                                        <input id="salary" type="text" class="form-control" placeholder="Input text" value="" disabled>
                                    </div>
                                    
                                </div>
                            </div>
                           
                        </div>
                    </div>

                  
               
                    

                      
                           
                       

                         <!-- BEGIN: Multiple Item -->
                         <div class="intro-y box mt-5">
                            <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                                <h2 class="font-medium text-base mr-auto">
                                    Requirements
                                </h2>
                               
                            </div>
                            <div class="grid grid-cols-12 gap-5 mt-5 pt-5 border-t">
                                <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#add-item-modal" class="intro-y block col-span-12 sm:col-span-4 2xl:col-span-3">
                                    <div class="box rounded-md p-3 relative zoom-in">
                                        <div class="flex-none relative block before:block before:w-full before:pt-[100%]">
                                            <div class="absolute top-0 left-0 w-full h-full image-fit">
                                                <img id="picture"  class="rounded-md" src="dist/images/food-beverage-16.jpg">
                                            </div>
                                        </div>
                                        <div class="block font-medium text-center truncate mt-3">2x2 Picture</div>
                                    </div>
                                </a>
                                <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#add-item-modal" class="intro-y block col-span-12 sm:col-span-4 2xl:col-span-3">
                                    <div class="box rounded-md p-3 relative zoom-in">
                                        <div class="flex-none relative block before:block before:w-full before:pt-[100%]">
                                            <div class="absolute top-0 left-0 w-full h-full image-fit">
                                                <img id="birth"  class="rounded-md" src="dist/images/food-beverage-16.jpg">
                                            </div>
                                        </div>
                                        <div class="block font-medium text-center truncate mt-3">Birth Certificate</div>
                                    </div>
                                </a>
                                <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#add-item-modal" class="intro-y block col-span-12 sm:col-span-4 2xl:col-span-3">
                                    <div class="box rounded-md p-3 relative zoom-in">
                                        <div class="flex-none relative block before:block before:w-full before:pt-[100%]">
                                            <div class="absolute top-0 left-0 w-full h-full image-fit">
                                                <img id="barangaycert" class="rounded-md" src="dist/images/food-beverage-14.jpg">
                                            </div>
                                        </div>
                                        <div class="block font-medium text-center truncate mt-3">Barangay Certificate</div>
                                    </div>
                                </a>
                               
                            </div>
                        </div>
                        <!-- END: Multiple Item -->
                        

                        
                      

                        
                        
                        <!-- END: Post Info -->
                        <div class="modal-footer text-right">
                            <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-32 mr-1">Cancel</button>
                            <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#next-overlapping-modal-preview" class="btn btn-primary">Decline</a> 
                            <button type="submit" id="addfo" name="additem" class="btn btn-primary w-32">Evaluate</button>
                        </div>
                    
                   
                     </div>
                </form>
        </div>
    </div>
    <!-- END: New Order Modal -->
    <div id="next-overlapping-modal-preview" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
           
                <div class="modal-content">
                    <!-- BEGIN: Modal Header -->
                    <div class="modal-header">
                        <h2 class="font-medium text-base mr-auto">
                            Decline Client
                        </h2>
                        
                       
                    </div>
                    <!-- END: Modal Header -->
                    <!-- BEGIN: Modal Body -->
                    <form action="/declinecitizenevaluation" method="POST" method="POST" enctype="multipart/form-data" id="declineform" >
                        @csrf
                        <div class="modal-body">
                            <div>
                                
                                <div id="basic-select" class="p-5">

                                    <div class="preview">
                                        <!-- BEGIN: Basic Select -->
                                        <div>
                                            <label>Select Decline Reason</label>
                                            <div class="mt-2">
                                                <select data-placeholder="Select Decline Reason" class="tom-select w-full" name="declinetype">
                                                    <option value="1">Leonardo DiCaprio</option>
                                                    <option value="2">Johnny Deep</option>
                                                    <option value="3">Robert Downey, Jr</option>
                                                    <option value="4">Samuel L. Jackson</option>
                                                    <option value="5">Morgan Freeman</option>
                                                </select>
                                        
                                            </div>
                                    <div>
                                        <!-- END: Basic Select -->
                            </div>
                            <div class="input-form"  style="margin-top:20px;">
                                
                            </div>

                            <div class="input-form">
                                <label for="validation-form-6" class="form-label w-full flex flex-col sm:flex-row"> Remarks <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Required, at least 10 characters</span> </label>
                                <textarea id="validation-form-6" class="form-control" name="declinereason" placeholder="Type your remarks" minlength="10" required></textarea>
                            </div>
                        
                        </div>
                    <!-- END: Modal Body -->
                    <!-- BEGIN: Modal Footer -->
                        <div class="modal-footer">
                            <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">Cancel</button>
                            <button type="submit" class="btn btn-primary w-20">Decline</button>
                        </div>
                    <!-- END: Modal Footer -->
                    </form>
                
                </div>
        </div>
    </div>
    

    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <?php
      session_start();
            if (isset($_SESSION['success']) == 'success') 
            {
                ?>
                    <script>
                    swal({
                            
                            title: "EVALUATED",
                            text: "Successfully evaluated!",
                            icon: "success",
                            button: "ok",
                        })
                        
                    
                    </script>
                <?php
                unset($_SESSION['success']);
            }
                    
            if (isset($_SESSION['fail']) == 'fail') 
            {
                ?>
                <script>
                    swal({
                        
                            title: "Fail",
                            text: "Fail to Evaluate!",
                            icon: "error",
                            button: "ok",
                        })
                    
                    
                    </script>
                <?php
                unset($_SESSION['fail']);
            }
       
    ?>
    <script type="text/javascript">
        $(document).ready(function()
        {
    
        
                    $("#datatable").DataTable({
            "bPaginate": true,
            "bLengthChange": false,
            "bFilter": true,
            "bInfo": false,
            "bAutoWidth": false });
       
            $("#datatable").on('click', '.edit', function()
            {
                $tr=$(this).closest('tr');
                if ($($tr).hasClass('child'))
                {
                    $tr = $tr.prev('.parent');
                }
              
    
                var data = $('#datatable').DataTable(
                    {
                        "retrieve": true,
                        "bPaginate": false,
                          "bFilter": false,
           
                    }
                ).row($tr).data();
               
                // document.getElementById('fullname').innerHTML
                //     = data[1];
                    document.getElementById('type').innerHTML
                        = "Citizen: "+data[3];
                    document.getElementById('date').innerHTML
                    = "Date Applied: "+data[4];
                    document.getElementById('firstname').innerHTML
                    = "First Name: " + data[6];
                    document.getElementById('lastname').innerHTML
                    = "Last Name: " + data[7];
                    document.getElementById('middlename').innerHTML
                    = "Middle Name: " + data[8];
                    document.getElementById('middlename1').innerHTML
                    = "Extension Name: " + data[9];
                    document.getElementById('street').innerHTML
                    = "Street: " + data[10];
                    document.getElementById('barangay').innerHTML
                    = "Barangay: " + data[2];
                    document.getElementById('city').innerHTML
                    = "City: " + data[11];
                    document.getElementById('province').innerHTML
                    = "Province: " + data[12];
                    document.getElementById('sex').innerHTML
                    = "Sex: " + data[13];
                    var dob=data[14];
                    document.getElementById('birthdate').value
                    =  data[14];
                    const ageInYears = moment().diff(new Date(dob), 'years');
                    document.getElementById('age').innerHTML
                    = "Age: " + ageInYears;
                    document.getElementById('birthplace').value
                    =  data[15];
                    document.getElementById('civilstatus').value
                    =  data[16];
                    document.getElementById('educational').value
                    =  data[17];
                    document.getElementById('religion').value
                    =  data[18];
                    document.getElementById('nationality').value
                    =  data[19];
                    document.getElementById('skills').value
                    =  data[20];
                    document.getElementById('hobbies').value
                    =  data[21];
                    document.getElementById('status').value
                    =  data[22];
                    document.getElementById('category').value
                    =  data[23];
                    document.getElementById('typeemp').value
                    =  data[24];
                    document.getElementById('occupation').value
                    =  data[25];
                    document.getElementById('salary').value
                    =  data[26];
                    
                    document.getElementById('contactnumber').value
                =  data[29];
                document.getElementById('landlinenumber').value
                =  data[31];
                document.getElementById('emailaddress').value
                =  data[30];
             
                   
                $('#editform').attr('action','/evaluatecitizen/' + data[27]+'/'+data[28]);
                $('#userphoto').attr("src","/images/picture/"+data[5]);
                $('#picture').attr("src","/images/picture/"+data[5]);
                $('#birth').attr("src","/images/birth/"+data[5]);
                $('#barangaycert').attr("src","/images/barangay/"+data[5]);
                $('#declineform').attr('action','/declinecitizenevaluation/' + data[27]+'/'+data[28]);
            })
    
        })
    
    </script>
    
    


    
   
@endsection

