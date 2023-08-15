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
        <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#new-fo-modal" class="btn btn-primary shadow-md mr-2">Add Supplier</a>

       
    </div>
    <!-- BEGIN: Data List -->
    <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
        <table id="datatable" class="table table-report -mt-2">
            <thead>
                <tr>
                    <th class="whitespace-nowrap">No.</th>
                    <th class="whitespace-nowrap">NAME</th>
                    <th class="whitespace-nowrap">DESCRIPTION</th>
                    <th id="filename" class="whitespace-nowrap">id</th>
                  
                  
                  
                    <th class="text-center whitespace-nowrap">ACTIONS</th>
                </tr>
            </thead>
            <tbody>
               
                @foreach($supplier as $index => $suppliers)    
                <tr class="intro-x">
                    <td id="foid">{{$index + 1}}</td>
                    <td id="foname">{{ $suppliers->name}}</td>
                    <td>{{ $suppliers->address}}</td>
                   
                    <td  id="filename">{{ $suppliers->id}}</td>

                    <td class="table-report__action w-56">
                        <div class="flex justify-center items-center" >
                            <button href="javascript:;" class="btn btn-outline-primary w-32 mr-1 edit" data-tw-toggle="modal" data-tw-target="#evaluateclient">Edit</button>
                                        
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
     <div id="new-fo-modal" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="font-medium text-base mr-auto">Add Supplier</h2>
                </div>
                <form action="/supplier/store" method="POST" enctype="multipart/form-data" >
                    @csrf
                    <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                            <div class="col-span-12">
                                <label for="pos-form-1" class="form-label">Name</label>
                                <input id="name" name="name" type="text" class="form-control flex-1" placeholder="Name">
                            </div>
                            <div class="col-span-12">
                                <label for="pos-form-1" class="form-label">Address</label>
                                <textarea id="address" name="address" type="text" class="form-control flex-1" placeholder="Description"></textarea>
                            </div>
                           
                        </div>
                        <div class="modal-footer text-right">
                            <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-32 mr-1">Cancel</button>
                            <button type="submit" id="addfo" name="additem" class="btn btn-primary w-32">Save</button>
                        </div>
                    
                    </div>
                </form>
        </div>
    </div>
    <!-- END: New Order Modal -->

      <!-- BEGIN: New field office Modal -->
      <div id="editmodal" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="font-medium text-base mr-auto">Add user acoount</h2>
                </div>
                <form action="/barangay" method="POST" method="POST" enctype="multipart/form-data" id="editform" >
                    @csrf
                    <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                        <div class="col-span-12">
                            <label for="pos-form-1" class="form-label">Field Office Name</label>
                            <input id="fieldofficename" name="fieldofficename" type="text" class="form-control flex-1" readonly>
                        </div>
                          
                            <div class="col-span-12">
                                <label for="pos-form-1" class="form-label">Barangay Name</label>
                                <input id="barngayname" name="barangayname" type="text" class="form-control flex-1" placeholder="Customer name">
                            </div>
                          
                           
                        </div>
                        <div class="modal-footer text-right">
                            <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-32 mr-1">Cancel</button>
                            <button type="submit" id="addfo" name="additem" class="btn btn-primary w-32">Save</button>
                        </div>
                    
                    </div>
                </form>
        </div>
    </div>
    <!-- END: New Order Modal -->

    <!-- BEGIN: New field office Modal -->
    <div id="evaluateclient" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content2">
                <div class="modal-header">
                    <h2 class="font-medium text-base mr-auto">Document Template</h2>
                </div>
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
                               Other Personal Information
                            </h2>
                        </div>
                        <div class="p-5">
                            <div class="grid grid-cols-12 gap-x-5">
                                <div class="col-span-12 xl:col-span-6">
                                    <div >
                                        <label for="update-profile-form-6" class="form-label">Project Name</label>
                                        <input id="project_name" name="project_name" type="text" class="form-control"  value="">
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
                         
                                          
                                <div id="requirements" class="grid grid-cols-12 gap-5 mt-5 pt-5 border-t">
                                   
                                       
                                 
                                    <div class="block font-medium text-center truncate mt-3">1x1 Picture</div>
                                   
                                </div>
                               
                               
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
                    document.getElementById('document_desc').value
                    = "Date Applied: "+data[2];
               
                $('#editform').attr('action','/evaluatepwdbenefit/' + data[2]+'/'+data[1]);
                $('#declineform').attr('action','/declinepwdevaluationbenefit/' + data[2]+'/'+data[2]);
               
              
            })
           
    
        })
    
       
    
    </script>
</div>



@endsection
