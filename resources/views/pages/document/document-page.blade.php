@extends('../layout/' . $layout)

@section('subhead')
    <title></title>
@endsection

@section('subcontent')
<h2 class="intro-y text-lg font-medium mt-10">
    Data List Layout
</h2>
<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
        <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
            <div class="w-56 relative text-slate-500">
                <input type="text" class="form-control w-56 box pr-10" placeholder="Search...">
                <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-lucide="search"></i> 
            </div>
        </div>
       
       
        <div class="hidden md:block mx-auto text-slate-500"></div>
       
    </div>
    <!-- BEGIN: Data List -->
    <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
        <table id="datatable" class="table table-report -mt-2">
            <thead>
                <tr>
                    <th class="whitespace-nowrap">No.</th>
                    <th class="whitespace-nowrap">NAME</th>
                    <th class="whitespace-nowrap">DATE</th>
              
                    <th id="filename" class="whitespace-nowrap">PROJECT NAME</th>
                    <th id="filename" class="whitespace-nowrap">SUPPLIER</th>
                    <th id="filename" class="whitespace-nowrap">IMPLEMENTING OFFICE</th>
                    <th id="filename" class="whitespace-nowrap">PURCHASE ORDER NO.</th>
                    <th id="filename" class="whitespace-nowrap">PURCHASE ORDER NO.</th>
                 
                    <th id="filename" class="whitespace-nowrap">COMPLETED ON</th>
                    <th id="filename" class="whitespace-nowrap">PERSONNEL</th>
                    <th id="filename" class="whitespace-nowrap">POSITION</th>

                    <th id="filename" class="whitespace-nowrap">id</th>
                  
                  
                  
                    <th class="text-center whitespace-nowrap">ACTIONS</th>
                </tr>
            </thead>
            <tbody>
            <form action="/print/template" method="POST" method="POST" enctype="multipart/form-data" id="editform" name="editform" >
                @csrf
                @foreach($document_type as $index => $document_type) 
                @foreach($document_type->document_type_details as $document_type_details)    
                <tr class="intro-x">
               
                  
                    <td id="foid">{{$index + 1}}</td>
                    <td>{{ $document_type->name}}</td>
                    <td >{{$document_type_details->created_at}}</td>
                 
                    
                   
                     <td id="filename"> @foreach($document_type_details->details as  $details)
                     @if($details->name == "Project Name")
                     {{$details->description}}
                     @endif
                     @endforeach</td>
                     <td id="filename"> @foreach($document_type_details->details as  $details)
                     @if($details->name == "Supplier")
                     
                     {{$details->description}}
                     @endif
                     @endforeach</td>
                     <td id="filename"> @foreach($document_type_details->details as  $details)
                     @if($details->name == "Implementing Office")
                     
                     {{$details->description}}
                     @endif
                     @endforeach</td>
                     <td id="filename"> @foreach($document_type_details->details as  $details)
                     @if($details->name == "Purchase Order No. 1")
                     
                     {{$details->description}}
                     @endif
                     @endforeach</td>

                     <td id="filename"> @foreach($document_type_details->details as  $details)
                     @if($details->name == "Purchase Order No. 2")
                     
                     {{$details->description}}
                     @endif
                     @endforeach</td>

                     <td id="filename"> @foreach($document_type_details->details as  $details)
                     @if($details->name == "Completed On")
                     
                     {{$details->description}}
                     @endif
                     @endforeach</td>

                     <td id="filename"> @foreach($document_type_details->details as  $details)
                     @if($details->name == "Personnel")
                     
                     {{$details->description}}
                     @endif
                     @endforeach</td>

                     <td id="filename"> @foreach($document_type_details->details as  $details)
                     @if($details->name == "Position")
                     
                     {{$details->description}}
                     @endif
                     @endforeach</td>


                     
                    <td  id="filename">{{ $document_type_details->id}}</td>

                    <td class="table-report__action w-56">
                      
                        <div class="flex justify-center items-center" >
                            <button href="javascript:;" class="btn btn-outline-primary w-32 mr-1 edit" data-tw-toggle="modal" data-tw-target="#evaluateclient">View</button>
                                        
                                        </a>         
                         </div>
                      
                     </td>
                    
                </tr>
           
                   @endforeach
                @endforeach
            </form>
            </tbody>
        </table>
    </div>
    <!-- END: Data List -->
    <!-- BEGIN: Pagination -->
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
        <nav class="w-full sm:w-auto sm:mr-auto">
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" href="#"> <i class="w-4 h-4" data-lucide="chevrons-left"></i> </a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#"> <i class="w-4 h-4" data-lucide="chevron-left"></i> </a>
                </li>
                <li class="page-item"> <a class="page-link" href="#">...</a> </li>
                <li class="page-item"> <a class="page-link" href="#">1</a> </li>
                <li class="page-item active"> <a class="page-link" href="#">2</a> </li>
                <li class="page-item"> <a class="page-link" href="#">3</a> </li>
                <li class="page-item"> <a class="page-link" href="#">...</a> </li>
                <li class="page-item">
                    <a class="page-link" href="#"> <i class="w-4 h-4" data-lucide="chevron-right"></i> </a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#"> <i class="w-4 h-4" data-lucide="chevrons-right"></i> </a>
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
        <div class="modal-dialog modal-xxl">
            <div class="modal-content2">
                <div class="modal-header">
                    <h2 class="font-medium text-base mr-auto">Document Template</h2>
                </div>

                <img  class="rounded-full" id="userphoto">
                <form action="/evaluatecitizen" method="POST" method="POST" enctype="multipart/form-data" id="editform" name="editform" >
                    @csrf

                    <div class="intro-y box mt-5">
                        <div class="flex items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                            <h2 id="document_name_view" class="font-medium text-base mr-auto">                  
                            </h2>
                        </div>
                     
                    </div>
                   
                    <div class="intro-y box mt-5">
                        <div class="flex items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                            <h2 class="font-medium text-base mr-auto">
                        
                            </h2>
                        </div>
                        <div class="p-5">
                            <div class="grid grid-cols-12 gap-x-5">
                                <div class="col-span-12 xl:col-span-12">
                                    <div >
                                        <label for="update-profile-form-6" class="form-label">Project Name</label>
                                        <input style="font-weight: bold;" id="project_name" name="project_name" type="text" class="form-control"  value="">
                                    </div>
                                    <div class="mt-3">
                                        <label for="" class="form-label">Supplier</label>
                                        <select style="font-weight: bold;" data-placeholder="Select Supplier" class="tom-select w-full" name="position_id">
                                    
                                                @foreach ($supplier as $suppliers)
                                                <option value="{{$suppliers->id}}">{{$suppliers->name}}</option>
                                                @endforeach
                                        
                                        </select>

                                    </div>
                                    <div class="mt-3">
                                        <label for="" class="form-label">Implementing Office</label>
                                        <input  id="civilstatus" type="text" class="form-control" placeholder="Input text" value="Zamboanga City Medical Center" disabled>
                                    </div>
                                    <div class="mt-3">
                                        <label for="" class="form-label">Purchase Order No.</label>
                                        <input id="educational" type="text" class="form-control" placeholder="" value="">
                                        <label for="" class="form-label"></label>
                                        <input id="educational" type="text" class="form-control" placeholder="" value="">
                                    </div>
                                    <div class="mt-3">
                                    <label for="" class="form-label">Completed On</label>
                                          <input id="schedule" type="date" class="form-control" name="schedule" >
                                    </div>


                                   
                                    
                                </div>
                                
                            </div>
                           
                        </div>
                    </div>
                    

                

                    <div class="intro-y box mt-5">
                        <div class="flex items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                            <h2 class="font-medium text-base mr-auto">
                                Signatory
                            </h2>
                        </div>
                        <div class="p-5">
                            <div class="grid grid-cols-12 gap-x-5">
                                

                               
                                    <div class="col-span-12 xl:col-span-12">
                                            <select style="font-weight: bold;" data-placeholder="Select Personnel" class="tom-select w-full" name="position_id">
                                            
                                            @foreach ($personnel as $personnels)
                                            <option value="{{$personnels->id}}">{{$personnels->name}}</option>
                                          
                                    
                                            </select>
                                            <label for="" class="form-label"></label>
                                            <input id="schedule" type="text" class="form-control" name="schedule" value="{{$personnels->positions->name}}" disabled>
                                            @endforeach
                                    </div>
                                    <div class="col-span-12 xl:col-span-6">
                                      
                                        
                                    </div>
                               
                            </div>
                           
                        </div>
                        </div>
                        

                        
                      

                        
                        
                        <!-- END: Post Info -->
                        <div class="modal-footer text-right">
                            <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-32 mr-1">Cancel</button>

                            <button type="submit" id="addfo" name="additem" class="btn btn-primary w-32">Print</button>
                        </div>
                    
                   
                     </div>
                </form>
        </div>
    </div>

</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
 
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


<script type="text/javascript">
        $(document).ready(function()
        {
      
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

                    document.getElementById('document_name_view').innerHTML
                    = data[1];
                    document.getElementById('certificate_title').innerHTML
                    = data[1];
                    document.getElementById('document_desc').value= "Date Applied: "+data[2];

                    $('#editform').attr('action','/print/' + data[2]+'/'+data[1]);
                    $('#declineform').attr('action','/declinepwdevaluationbenefit/' + data[2]+'/'+data[2]);
               
              
            })
           
    
        })
    
       
    
    </script>
</div>



@endsection
