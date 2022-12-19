@extends('../layout/' . $layout)
<link rel="stylesheet" href=" https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
@section('subhead')
    <title>PWD Card | Social Welfare Registration and Benefits System</title>
@endsection

@section('subcontent')

 
    <h2 class="intro-y text-lg font-medium mt-10">List of Registered PWD</h2>
    <div class="grid grid-cols-12 gap-6 mt-5">       <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
          
          
                
               
          
           
           
        </div>


        

       
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table id="datatable" class="table table-report -mt-2">
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
                       
                        <th id="filename"  class="whitespace-nowrap">firstname</th>
                        <th id="filename" class="whitespace-nowrap">lastname</th>
                        <th id="filename" class="whitespace-nowrap">middlename</th>
                        <th id="filename" class="whitespace-nowrap">extensionname</th>
                        <th id="filename" class="whitespace-nowrap">sex</th>
                        <th id="filename" class="whitespace-nowrap">relationship</th>
                        <th id="filename" class="whitespace-nowrap">age</th>
                        <th id="filename" class="whitespace-nowrap">birth date</th>

                        <th id="filename"  class="whitespace-nowrap">dissabilitype</th>
                        <th id="filename" class="whitespace-nowrap">disabilitycause</th>
                        <th id="filename" class="whitespace-nowrap">disabilitycausetype</th>
                      
                        <th id="filename"  class="whitespace-nowrap">sssnumber</th>
                        <th id="filename" class="whitespace-nowrap">gsisnumber</th>
                        <th id="filename" class="whitespace-nowrap">pagibignumber</th>
                        <th id="filename"  class="whitespace-nowrap">psnnumber</th>
                        <th id="filename" class="whitespace-nowrap">philhealthnumber</th>
                      


                        <th id="filename"  class="whitespace-nowrap">license number</th>
                        <th id="filename" class="whitespace-nowrap">firstname</th>
                        <th id="filename" class="whitespace-nowrap">middlename</th>
                        <th id="filename" class="whitespace-nowrap">lastname</th>

                        
                        <th id="filename"  class="whitespace-nowrap">organization</th>
                        <th id="filename" class="whitespace-nowrap">contactperson</th>
                        <th id="filename" class="whitespace-nowrap">officeaddress</th>
                        <th id="filename" class="whitespace-nowrap">telno</th>

                        <th id="filename" class="whitespace-nowrap">contactperson</th>
                        <th id="filename" class="whitespace-nowrap">officeaddress</th>
                        <th id="filename" class="whitespace-nowrap">telno</th>

                   
                      
                       
                        <th id="filename"  class="whitespace-nowrap">appid</th>
                        <th id="filename" class="whitespace-nowrap">appid</th>
                       
                       
                        <th id="filename" class="whitespace-nowrap">appid</th>
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
                                    <td>{{$client->barangays->name}}</td>
                                    <td>
                                        @foreach($client->client_cards as  $client_card)
                                        {{$client_card->card_number}}
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
                                        <td id="filename"> @foreach($client->family_compositions as  $family){{$family->first_name}},@endforeach</td>
                                        <td id="filename"> @foreach($client->family_compositions as  $family){{$family->last_name}},@endforeach</td>
                                        <td id="filename"> @foreach($client->family_compositions as  $family){{$family->middle_name}},@endforeach</td>
                                        <td id="filename"> @foreach($client->family_compositions as  $family){{$family->extension_name}},@endforeach</td>
                                        <td id="filename"> @foreach($client->family_compositions as  $family){{$family->sex}},@endforeach</td>
                                        <td id="filename"> @foreach($client->family_compositions as  $family){{$family->relationship}},@endforeach</td>
                                        <td id="filename"> @foreach($client->family_compositions as  $family){{$family->age}},@endforeach</td>
                                        <td id="filename"> @foreach($client->family_compositions as  $family){{$family->birth_date}},@endforeach</td>

                                        <td id="filename"> @foreach($client->disability_types as  $disability_types){{$disability_types->name}},@endforeach</td>
                                        <td id="filename"> @foreach($client->disability_causes as  $disability_cause){{$disability_cause->name}},@endforeach</td>
                                        <td id="filename"> @foreach($client->disability_causes as  $disability_cause){{$disability_cause->type}},@endforeach</td>

                                        <td id="filename">{{ $client->identification_cards->sss_number}}</td>  
                                        <td id="filename">{{ $client->identification_cards->gsis_number}}</td>  
                                        <td id="filename">{{ $client->identification_cards->pagibig_number}}</td>  
                                        <td id="filename">{{ $client->identification_cards->psn_number}}</td>  
                                        <td id="filename">{{ $client->identification_cards->philhealth_number}}</td>  
                                    
                                        <td id="filename">{{ $client->physicians->license_number}}</td>  
                                        <td id="filename">{{ $client->physicians->first_name}}</td>  
                                        <td id="filename">{{ $client->physicians->middle_name}}</td>  
                                        <td id="filename">{{ $client->physicians->last_name}}</td>  

                                        <td id="filename">{{ $client->organizations->organization_affiliated}}</td>  
                                        <td id="filename">{{ $client->organizations->contact_person}}</td>  
                                        <td id="filename">{{ $client->organizations->office_address}}</td>  
                                        <td id="filename">{{ $client->organizations->contact_number}}</td>  
                                    
                                     
                                        <td id="filename">{{$client->contact_number}}
                                        <td id="filename">{{$client->email_address}}
                                        <td id="filename">{{$client->landline_number}}
                                   
                                            <td id="filename"> @foreach($client->client_cards as  $clientapp)
                                                {{$clientapp->id}}
                                              @endforeach</td>
                                              <td id="filename"> @foreach($client->client_cards as  $clientapp)
                                                {{$clientapp->card_type}}
                                              @endforeach</td>

                                              <td  id="filename"> @foreach($client->client_applications as  $clientapp)
                                                {{$clientapp->id}}
                                              @endforeach</td>
                                              <td id="filename"> @foreach($client->client_cards as  $clientapp)
                                                {{$clientapp->GUID}}
                                              @endforeach</td>



                                    <td class="table-report__action w-56">
                                        <div class="flex justify-center items-center" >
                                            <button href="javascript:;" class="btn btn-outline-primary w-32 mr-1 edit" data-tw-toggle="modal" data-tw-target="#evaluateclient">View</button>
                                            <button href="javascript:;" class="btn btn-outline-primary w-32 mr-1 add" data-tw-toggle="modal" data-tw-target="#evaluateclient1">Print</button>
                                            
                                        
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
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
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
        </div>
        <!-- END: Pagination -->
    </div>
  
   
      <!-- BEGIN: New field office Modal -->
      <div id="evaluateclient" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content2">
                <div class="modal-header">
                    <h2 class="font-medium text-base mr-auto">Evaluate Client</h2>
                </div>
                <form action="/evaluatecitizen" method="POST" method="POST" enctype="multipart/form-data" id="editform" name="editform" >
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

                    <div class="intro-y box mt-5">
                        <div class="flex items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                            <h2 class="font-medium text-base mr-auto">
                                Family Compositions
                            </h2>
                        </div>
                        <div class="p-5">
                            <div class="grid grid-cols-12 gap-x-5">
                                

                               
                                    <div class="col-span-12 xl:col-span-6">
                                        <div id="family" class="mt-3 xl:mt-0">

                                        </div> 
                                      
                                    </div>
                                    <div class="col-span-12 xl:col-span-6">
                                        <div id="fam" class="mt-3 xl:mt-0">
                                         
                                        </div>
                                        
                                    </div>
                               
                            </div>
                           
                        </div>
                    </div>

                    <div class="intro-y box mt-5">
                        <div class="flex items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                            <h2 class="font-medium text-base mr-auto">
                                Disability
                            </h2>
                        </div>
                        <div class="p-5">
                            <div class="grid grid-cols-12 gap-x-5">
                                

                               
                                    <div class="col-span-12 xl:col-span-6">
                                        <label for="update-profile-form-6" class="form-label">Type of Disability</label>
                                        <div id="disability" class="mt-3 xl:mt-0">
                                           
                                            <input id="organization" type="text" class="form-control"  value="" disabled>
                                        </div> 
                                      
                                    </div>
                                    <div class="col-span-12 xl:col-span-6">
                                        <label for="update-profile-form-6" class="form-label">Cause of Disability</label>
                                      
                                        <div id="dis" class="mt-3 xl:mt-0">
                                           
                                        </div>
                                        
                                        
                                    </div>
                               
                            </div>
                           
                        </div>
                    </div>


                    <div class="intro-y box mt-5">
                        <div class="flex items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                            <h2 class="font-medium text-base mr-auto">
                                Organization
                            </h2>
                        </div>
                        <div class="p-5">
                            <div class="grid grid-cols-12 gap-x-5">
                                <div class="col-span-12 xl:col-span-6">
                                    <div >
                                        <label for="update-profile-form-6" class="form-label">Organization Affiliated</label>
                                        <input id="organization" type="text" class="form-control"  value="" disabled>
                                    </div>
                                    <div class="mt-3">
                                        <label for="" class="form-label">Contact Person</label>
                                        <input id="contact" type="text" class="form-control" placeholder="Input text" value="" disabled>
                                    </div>
                                   
                                    
                                </div>
                                <div class="col-span-12 xl:col-span-6">
                                    <div class="mt-3 xl:mt-0">
                                        <label for="religion" class="form-label">Office Address</label>
                                        <input id="office" type="text" class="form-control" placeholder="Input text" value="" disabled>
                                    </div>
                                    <div class="mt-3">
                                        <label for="update-profile-form-11" class="form-label">Tel. Nos.</label>
                                        <input id="tel" type="text" class="form-control" placeholder="Input text" value="" disabled>
                                    </div>
                                    
                                </div>
                            </div>
                           
                        </div>
                    </div>

                    <div class="intro-y box mt-5">
                        <div class="flex items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                            <h2 class="font-medium text-base mr-auto">
                                Identification Card
                            </h2>
                        </div>
                        <div class="p-5">
                            <div class="grid grid-cols-12 gap-x-5">
                                <div class="col-span-12 xl:col-span-6">
                                    <div >
                                        <label for="update-profile-form-6" class="form-label">SSS Number</label>
                                        <input id="sss" type="text" class="form-control"  value="" disabled>
                                    </div>
                                    <div class="mt-3">
                                        <label for="" class="form-label">GSIS Number</label>
                                        <input id="gsis" type="text" class="form-control" placeholder="Input text" value="" disabled>
                                    </div>
                                    <div class="mt-3">
                                        <label for="" class="form-label"> PAG-IBIG Number</label>
                                        <input id="pagibig" type="text" class="form-control" placeholder="Input text" value="" disabled>
                                    </div>
                                    
                                </div>
                                <div class="col-span-12 xl:col-span-6">
                                    <div class="mt-3 xl:mt-0">
                                        <label for="religion" class="form-label">PSN Number</label>
                                        <input id="psn" type="text" class="form-control" placeholder="Input text" value="" disabled>
                                    </div>
                                    <div class="mt-3">
                                        <label for="update-profile-form-11" class="form-label">PhilHealth Number</label>
                                        <input id="philhealth" type="text" class="form-control" placeholder="Input text" value="" disabled>
                                    </div>
                                    
                                </div>
                            </div>
                           
                        </div>
                    </div>


                    <div class="intro-y box mt-5">
                        <div class="flex items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                            <h2 class="font-medium text-base mr-auto">
                               Physician
                            </h2>
                        </div>
                        <div class="p-5">
                            <div class="grid grid-cols-12 gap-x-5">
                                <div class="col-span-12 xl:col-span-6">
                                    <div >
                                        <label for="update-profile-form-6" class="form-label">First Name</label>
                                        <input id="pfirstname" type="text" class="form-control"  value="" disabled>
                                    </div>
                                    <div class="mt-3">
                                        <label for="" class="form-label">Middle Name</label>
                                        <input id="pmiddlename" type="text" class="form-control" placeholder="Input text" value="" disabled>
                                    </div>
                                    <div class="mt-3">
                                        <label for="" class="form-label">Last Name</label>
                                        <input id="plastname" type="text" class="form-control" placeholder="Input text" value="" disabled>
                                    </div>
                                    
                                </div>
                                <div class="col-span-12 xl:col-span-6">
                                    <div class="mt-3 xl:mt-0">
                                        <label for="religion" class="form-label">License Number</label>
                                        <input id="license" type="text" class="form-control" placeholder="Input text" value="" disabled>
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
                                        <div class="block font-medium text-center truncate mt-3">1x1 Picture</div>
                                    </div>
                                </a>
                                <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#add-item-modal" class="intro-y block col-span-12 sm:col-span-4 2xl:col-span-3">
                                    <div class="box rounded-md p-3 relative zoom-in">
                                        <div class="flex-none relative block before:block before:w-full before:pt-[100%]">
                                            <div class="absolute top-0 left-0 w-full h-full image-fit">
                                                <img id="id"  class="rounded-md" src="dist/images/food-beverage-16.jpg">
                                            </div>
                                        </div>
                                        <div class="block font-medium text-center truncate mt-3">Valid ID</div>
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
                                <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#add-item-modal" class="intro-y block col-span-12 sm:col-span-4 2xl:col-span-3">
                                    <div class="box rounded-md p-3 relative zoom-in">
                                        <div class="flex-none relative block before:block before:w-full before:pt-[100%]">
                                            <div class="absolute top-0 left-0 w-full h-full image-fit">
                                                <img id="disabilitypic" class="rounded-md">
                                            </div>
                                        </div>
                                        <div class="block font-medium text-center truncate mt-3">Certificate of Disability</div>
                                    </div>
                                </a>
                               
                            </div>
                        </div>
                        <!-- END: Multiple Item -->
                        

                        
                      

                        
                        
                        <!-- END: Post Info -->
                        <div class="modal-footer text-right">
                            <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-32 mr-1">Back</button>
                            <button type="submit" id="addfo" name="additem" class="btn btn-primary w-32">Print</button>
                        </div>
                    
                   
                     </div>
                </form>
        </div>
    </div>

    <div id="evaluateclient1" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-m">
            <div class="modal-content2">
                <div class="modal-header">Identification Card</h2>
                </div>

             
                   
              <form action="/email/completeid" method="POST" id="formid" name="formid">
                 @csrf
                        <div class="container1" >
                                        <div class="padding" id="capture">
                                            <div class="font" >
                                                <div class="top">
                                                    <img id="photo">
                                                </div>
                                                <div class="bottom">

                                                    <input type="text" name="idcard" id="idcard" hidden>
                                                    <input type="text" name="cardtype" id="cardtype" hidden>
                                                    <input type="text" name="sendemail" id="sendemail" hidden>
                                                  
                                                    <p id="fullname"></p>
                                                    <p class="desi"></p>
                                                    <div class="barcode">
                                                        <img id="qrcode">
                                                    </div>
                                                    <br>
                                                    <p id="phone" class="no">+91 8980849796</p>
                                                    <p id="address" class="no">part-1,89 harinadad d...sdv..sdf..sfd..sd.</p>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <div class="back">
                                            <h1 class="Details">information</h1>
                                            <hr class="hr">
                                            <div class="details-info">
                                                <p><b>Email : </b></p>
                                                <p>Planicsdevloper@gmail.com</p>
                                                <p><b>Mobile No: </b></p>
                                                <p>8460304196</p>
                                                <p><b>Office Address:</b></p>
                                                <p>part-1,89 harinadad d...sdv..sdf..sfd..sd.road,india</p>
                                                </div>
                                                <div class="logo">
                                                    <img src="barcode.PNG">
                                                </div>
                            
                                                
                                                <hr>
                                            </div>
                                        </div> --}}
                                
                        </div>

                        
            
                            
                            

                                
                                
                                <!-- END: Post Info -->
                                <div class="modal-footer text-right">
                                    <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-32 mr-1">Back</button>
                               
                                    <button onclick="doCapture();">Capture</button>
                                    <button class="submit" type="submit" value="Submit" id="secondbutton" hidden>Capture</button>
                                </div>
            </form>


                       
                   
                     </div>
              
        </div>
      </div>


   
    

    
            


    
   
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script>
<script src="{{ asset('dist/js/html2canvas.js') }}"></script>
<?php
  session_start();
		if (isset($_SESSION['success']) == 'success') 
		{
			?>
				<script>
				swal({
						
						title: "SAVED",
						text: "Successfully saved!",
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
						text: "Successfully saved!",
						icon: "error",
						button: "ok",
					})
				
				
				</script>
			<?php
			unset($_SESSION['fail']);
		}
   
?>

<script>

    function doCapture() {
        window.scrollTo(0, 0);
       
        event.preventDefault();
     
        html2canvas(document.getElementById("capture")).then(function (canvas) {
            var name = $("#idcard").val();
       
             var dataString = 'name='+ name;
            
            // Create an AJAX object
            var ajax = new XMLHttpRequest();
     
            // Setting method, server file name, and asynchronous
            ajax.open("POST", "save-capture.php", true);
     
            // Setting headers for POST method
            ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
     
            // Sending image data to server
            // ajax.send("image=" + canvas.toDataURL("image/png", 0.9));
        
    
          
      
            // Receiving response from server
            // This function will be called multiple times
            ajax.onreadystatechange = function () {
     
                // Check when the requested is completed
                if (this.readyState == 4 && this.status == 200) {
     
                    // Displaying response from server
                    console.log(this.responseText);
                }
            };
    
    
          
            
        var name = $("#idcard").val();
        var cardtype = $("#cardtype").val();
        var sendemail = $("#sendemail").val();
        var count_id = "count";
        var dataString = 'name='+ name;
        var dataString1 = 'count_id='+ count_id;
    
        $.ajax({
                type: "POST",
                url: "save-capture.php",
                data:{registration: "success", sendemail: sendemail, cardtype: cardtype, name: name, image:canvas.toDataURL("image/png", 0.9)},
                success : handleData
                
    
    
    
            });
    
            
        });
     
    
       
    }
    
    function handleData(data) {
        $("#secondbutton").click();
                                                                                                                                                                                                                                                                                                                                                                                                                                                       }
      
     </script>


<script type="text/javascript">
    $(document).ready(function()
    {

        $("#datatable").DataTable({
            "bPaginate": true,
            "bLengthChange": false,
            "bFilter": true,
            "bInfo": false,
            "bAutoWidth": false });
       
        $('#evaluateclient').on('hidden.bs.modal', function(e){
           $(this).find('editform')[0].reset();           
    });
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

                document.getElementById('sss').value
                =  data[40];
                document.getElementById('gsis').value
                =  data[41];
                document.getElementById('pagibig').value
                =  data[42];
                document.getElementById('psn').value
                =  data[43];
                document.getElementById('philhealth').value
                =  data[44];

                document.getElementById('license').value
                =  data[45];
                document.getElementById('pfirstname').value
                =  data[46];
                document.getElementById('pmiddlename').value
                =  data[47];
                document.getElementById('plastname').value
                =  data[48];

                document.getElementById('organization').value
                =  data[45];
                document.getElementById('contact').value
                =  data[46];
                document.getElementById('office').value
                =  data[47];
                document.getElementById('tel').value
                =  data[48];

                document.getElementById('contactnumber').value
                =  data[49];
                document.getElementById('landlinenumber').value
                =  data[50];
                document.getElementById('emailaddress').value
                =  data[51];

             




                $("#family").empty();
                $("#fam").empty();

                var arrayname = new Array();
                var arraylastname = new Array();
                var arraymiddlename = new Array();
                var arrayextensionname = new Array();
                var arraysex = new Array();
                var arrayrelationship = new Array();
                var arrayage = new Array();
                var arraybirthdate = new Array();

                var names = data[29];
                var lastname = data[30];
                var middlename = data[31];
                var extensionname = data[32];
                var sex = data[33];
                var relationship = data[34];
                var age = data[35];
                var birthdate = data[36];

                arrayname = names.split(',');
                arraylastname = lastname.split(',');
                arraymiddlename = middlename.split(',');
                arrayextensionname = extensionname.split(',');
                arraysex = sex.split(',');
                arrayrelationship = relationship.split(',');
                arrayage = age.split(',');
                arraybirthdate = birthdate.split(',');

                for (let i = 0; i < arrayname.length - 1; i++) {
                    var name =  arrayname[i];
                    var lastname =  arraylastname[i];
                    var middlename =  arraymiddlename[i];
                    var extensionname =  arrayextensionname[i];
                    var sex =  arraysex[i];
                    var relationship =  arrayrelationship[i];
                    var age =  arrayage[i];
                    var birthdate =  arraybirthdate[i];


                  
                    let birthDate = moment(birthdate);
                    let famage = moment().diff(birthDate, 'years');

                   
                        $("#family").append($('<label for="update-profile-form-6" class="form-label">First name</label><input id="familyfirstname[]" type="text" class="form-control"  value="" disabled>').val(name),$('<label for="update-profile-form-6" class="form-label">Last name</label><input id="familyfirstname[]" type="text" class="form-control" value="" disabled>').val(lastname),$('<label for="update-profile-form-6" class="form-label">Middle name</label><input id="familyfirstname[]" type="text" class="form-control"  value="" disabled>').val(middlename),$('<label for="update-profile-form-6" class="form-label">Extension name</label><input id="familyfirstname[]" type="text" class="form-control"  value="" disabled>').val(extensionname),'<div class="p-5""></div>')
                        $("#fam").append($('<label for="update-profile-form-6" class="form-label">Sex</label><input id="familyfirstname[]" type="text" class="form-control"  value="" disabled>').val(sex),$('<label for="update-profile-form-6" class="form-label">Relationship</label><input id="familyfirstname[]" type="text" class="form-control" value="" disabled>').val(relationship),$('<label for="update-profile-form-6" class="form-label">Age</label><input id="familyfirstname[]" type="text" class="form-control"  value="" disabled>').val(famage),$('<label for="update-profile-form-6" class="form-label">Date of Birth</label><input id="familyfirstname[]" type="text" class="form-control"  value="" disabled>').val(birthdate),'<div class="p-5""></div>')
                        
                    }



                 
                $("#disability").empty();
                $("#dis").empty();

                var arraydisabilitytype = new Array();
                var arraydisabilitycause = new Array();
                var arraydisabilitycausetype= new Array();
               
                var disabilitytype = data[37];
                var disabilitycause  = data[38];
                var disabilitycausetype = data[39];
             
                arraydisabilitytype = disabilitytype.split(',');
                arraydisabilitycause = disabilitycause.split(',');
                arraydisabilitycausetype = disabilitycausetype.split(',');
            
               

                for (let i = 0; i < arraydisabilitytype.length - 1; i++) {
                    var disabilitytype =  arraydisabilitytype[i];
                    
                        $("#disability").append($('<input id="familyfirstname[]" type="text" class="form-control"  value="" disabled>').val(disabilitytype))
                        
                    }
                  

                    
                for (let i = 0; i < arraydisabilitycause.length - 1; i++) {
                    var disabilitycause =  arraydisabilitycause[i];
                    var disabilitycausetype =  arraydisabilitycausetype[i];
                        $("#dis").append($('<input id="familyfirstname[]" type="text" class="form-control"  value="" disabled>').val(disabilitycausetype+ ': ' + disabilitycause  ))
                        
                    }
                  
                  
                  
                
                  
                  
                
                    

                 
                            
           

             
                                
             
               
            $('#editform').attr('action','/evaluatepwd/' + data[27]+'/'+data[28]);
            $('#userphoto').attr("src","/images/picture/"+data[5]);
            $('#picture').attr("src","/images/picture/"+data[5]);
            $('#id').attr("src","/images/id/"+data[5]);
            $('#barangaycert').attr("src","/images/barangay/"+data[5]);
            $('#disabilitypic').attr("src","/images/disability/"+data[5]);

           
          
        })

        $("#datatable").on('click', '.add', function()
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
           
         
                
               
           
             
           
            document.getElementById('fullname').innerHTML
                =  data[6] + " " +  data[7] + " " +  data[8];
                document.getElementById('address').innerHTML
                =  data[10] +  " " +  data[2] + " " +  data[11];
                document.getElementById('phone').innerHTML
                =  data[30];

                document.getElementById('idcard').value
                =  data[56];

                document.getElementById('cardtype').value
                =  data[57];

                document.getElementById('sendemail').value
                =  data[51];
             
            $('#qrcode').attr("src","/images/qrcode/"+data[59]);
            $('#photo').attr("src","/images/picture/"+data[5]);
            $('#formid').attr('action','/email/completeid/' + data[56]);
        })

       

    })

   

</script>

                                                                                             