@extends('../layout/' . $layout)

@section('subhead')
    <title></title>
@endsection

@section('subcontent')
<h2 class="intro-y text-lg font-medium mt-10">
  LIST OF DOCUMENTS
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
        <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#new-fo-modal" class="btn btn-primary shadow-md mr-2">Add Document Type</a>

       
    </div>
    <!-- BEGIN: Data List -->
    <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
        <table id="datatable" class="table table-report -mt-2">
            <thead>
                <tr>
                    <th class="whitespace-nowrap">No.</th>
                    <th class="whitespace-nowrap">NAME</th>
                    <th class="whitespace-nowrap">DESCRIPTION</th>
                    <th class="whitespace-nowrap">TOTAL</th>
                    <th id="filename" class="whitespace-nowrap">id</th>
                  
                  
                  
                    <th class="text-center whitespace-nowrap">ACTIONS</th>
                </tr>
            </thead>
            <tbody>
               
                @foreach($document_type as $index => $document_types)    
                <tr class="intro-x">
                    <td id="foid">{{$index + 1}}</td>
                    <td id="foname">{{ $document_types->name}}</td>
                    <td>{{ $document_types->description}}</td>
              
                    <td  id="filename">{{ $document_types->id}}</td>
                  
                    <td id="foname">{{ $document_types->document_type_details_count}}</td>
               
                    <td class="table-report__action w-56">
                        <div class="flex justify-center items-center" >
                            <button href="javascript:;" class="btn btn-outline-primary w-32 mr-1 edit" data-tw-toggle="modal" data-tw-target="#evaluateclient">Template</button>
                                        
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
                    <h2 class="font-medium text-base mr-auto">Add Document Type</h2>
                </div>
                <form action="/document-type/store" method="POST" enctype="multipart/form-data" >
                    @csrf
                    <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                            <div class="col-span-12">
                                <label for="pos-form-1" class="form-label">Name</label>
                                <input id="document_name" name="document_name" type="text" class="form-control flex-1" placeholder="Name">
                            </div>
                            <div class="col-span-12">
                                <label for="pos-form-1" class="form-label">Description</label>
                                <textarea id="document_description" name="document_description" type="text" class="form-control flex-1" placeholder="Description"></textarea>
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
                <form action="" method="POST" method="POST" enctype="multipart/form-data" id="editform" name="editform" >
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
                                        <input style="font-weight: bold;" id="name[]" name="name[]" type="text" class="form-control"  value="Project Name" hidden>
                                        <input style="font-weight: bold;" id="detail[]" name="detail[]" type="text" class="form-control" value="">
                                    </div>
                                    <div class="mt-3">
                                        <label for="" class="form-label">Supplier</label>
                                        <input style="font-weight: bold;" id="name[]" name="name[]" type="text" class="form-control"  value="Supplier" hidden>
                                        <select style="font-weight: bold;" data-placeholder="Select Supplier" class="tom-select w-full" id="detail[]" name="detail[]">
                                    
                                                @foreach ($supplier as $suppliers)
                                                <option value="{{$suppliers->name}}">{{$suppliers->name}}</option>
                                                @endforeach
                                        
                                        </select>
                                    </div>
                                    <div class="mt-3">
                                        <label for="" class="form-label">Implementing Office</label>
                                        <input style="font-weight: bold;" id="name[]" name="name[]" type="text" class="form-control"  value="Implementing Office" hidden>
                                        <input id="detail[]" name="detail[]" type="text" class="form-control" placeholder="Input text" value="Zamboanga City Medical Center">
                                    </div>
                                    <div class="mt-3">
                                        <label for="" class="form-label">Purchase Order No.</label>

                                        <input style="font-weight: bold;" id="name[]" name="name[]" type="text" class="form-control"  value="Purchase Order No. 1" hidden>
                                        <input id="detail[]" name="detail[]" type="text" class="form-control" placeholder="" value="">

                                        <label for="" class="form-label"></label>
                                        <input style="font-weight: bold;" id="name[]" name="name[]" type="text" class="form-control"  value="Purchase Order No. 2" hidden>
                                        <input id="detail[]" name="detail[]" type="text" class="form-control" placeholder="" value="">
                                    </div>
                                    <div class="mt-3">
                                        <label for="" class="form-label">Completed On</label>
                                        <input style="font-weight: bold;" id="name[]" name="name[]" type="text" class="form-control"  value="Completed On" hidden>
                                        <input id="detail[]" name="detail[]" type="date" class="form-control" value="">
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
                                          <input style="font-weight: bold;" id="name[]" name="name[]" type="text" class="form-control"  value="Personnel" hidden>
                                            <select style="font-weight: bold;" data-placeholder="Select Personnel" class="tom-select w-full" id="detail[]" name="detail[]">
                                            
                                            @foreach ($personnel as $personnels)
                                            <option value="{{$personnels->name}}">{{$personnels->name}}</option>
                                            </select>
                                            <label for="" class="form-label"></label>
                                            <input style="font-weight: bold;" id="name[]" name="name[]" type="text" class="form-control"  value="Position" hidden>
                                            <input id="detail[]" name="detail[]" type="text" class="form-control" name="schedule" value="{{$personnels->positions->name}}" >
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
                  
                  
                $('#editform').attr('action','/store/documentdetail/'+ data[3]);
               
               
              
            })
           
    
        })
    
       
    
    </script>
</div>



@endsection
