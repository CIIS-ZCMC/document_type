@extends('../layout/' . $layout)

@section('subhead')
<<<<<<< HEAD
    <title>Benefits | Social Welfare Registration and Benefits System</title>
=======
    <title>Field Office | Social Welfare Registration and Benefits System</title>
>>>>>>> e0ca9b07f2586483b6a5624bdc458726b4264e15
@endsection

@section('subcontent')
<h2 class="intro-y text-lg font-medium mt-10">
<<<<<<< HEAD
    Data List Layout
=======
    Manage Benefits
>>>>>>> e0ca9b07f2586483b6a5624bdc458726b4264e15
</h2>
<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
        <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
            <div class="w-56 relative text-slate-500">
                <input type="text" class="form-control w-56 box pr-10" placeholder="Search...">
                <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-lucide="search"></i> 
            </div>
        </div>
<<<<<<< HEAD
       
       
        <div class="hidden md:block mx-auto text-slate-500"></div>
        <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#new-fo-modal" class="btn btn-primary shadow-md mr-2">Add New Field Office</a>
=======

       
        <div class="hidden md:block mx-auto text-slate-500"></div>
        <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#add-benefits-modal" class="btn btn-primary shadow-md mr-2">Add Benefit</a>
>>>>>>> e0ca9b07f2586483b6a5624bdc458726b4264e15
       
    </div>
    <!-- BEGIN: Data List -->
    <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
        <table id="datatable" class="table table-report -mt-2">
            <thead>
                <tr>
                    <th class="whitespace-nowrap">No.</th>
<<<<<<< HEAD
                    <th class="whitespace-nowrap">ITEM NAME</th>
                    <th class="whitespace-nowrap">ADDRESS</th>
                    <th id="filename" class="whitespace-nowrap">id</th>
                  
=======
                    <th class="whitespace-nowrap">NAME</th>
                    <th class="whitespace-nowrap">FORM TYPE</th>
                    <th id="filename" class="whitespace-nowrap">id</th>       
>>>>>>> e0ca9b07f2586483b6a5624bdc458726b4264e15
                  
                    <th class="text-center whitespace-nowrap">ACTIONS</th>
                </tr>
            </thead>
            <tbody>
<<<<<<< HEAD
                @foreach($fo as $index => $fo1)    
                <tr class="intro-x">
                    <td id="foid">{{$index + 1}}</td>
                    <td id="foname">{{ $fo1->name}}</td>
                    <td>{{ $fo1->address}}</td>
=======
                @foreach($benefits as $index => $fo1)    
                <tr class="intro-x">
                    <td id="foid">{{$index + 1}}</td>
                    <td id="foname">{{ $fo1->name}}</td>
                    <td id="foname">{{ $fo1->name}}</td>
>>>>>>> e0ca9b07f2586483b6a5624bdc458726b4264e15
                    <td id="filename">{{$fo1->id}}</td>
                  
                 
                    <td class="table-report__action w-56">
                        <div class="flex justify-center items-center" >
<<<<<<< HEAD
                          <button href="javascript:;" class="btn btn-outline-primary w-32 mr-1 edit" data-tw-toggle="modal" data-tw-target="#editmodal">Add Benefits</button>
                          
                        </a>
                            
=======
                          <!-- <button href="javascript:;" class="btn btn-outline-primary mr-1 select_benreq" style="width: 150px;" data-tw-toggle="modal" data-tw-target="#select-req-modal">Requirements</button> -->
                          <button data-tw-toggle="modal" data-tw-target="#select-req-modal" class="btn btn-outline-primary mr-1 select_benreq" style="width: 150px;">Requirements</button>                        
                          <button href="javascript:;" class="btn btn-outline-primary mr-1 edit" style="width: 100px;" data-tw-toggle="modal" data-tw-target="#editmodal">Edit</button>
                     
>>>>>>> e0ca9b07f2586483b6a5624bdc458726b4264e15
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
<<<<<<< HEAD
     <!-- BEGIN: New field office Modal -->
     <div id="new-fo-modal" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="font-medium text-base mr-auto">New Field Office</h2>
                </div>
                <form action="/fo/add" method="POST" enctype="multipart/form-data" >
                    @csrf
                    <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                        
                        
                            <div class="col-span-12">
                                <label for="pos-form-1" class="form-label">Name</label>
                                <input id="name" name="name" type="text" class="form-control flex-1" placeholder="name">
                            </div>
                            <div class="col-span-12">
                                <label for="pos-form-2" class="form-label">Address</label>
                                <input id="address" name="address" type="text" class="form-control flex-1" placeholder="address">
                            </div>
                           
=======
     <!-- BEGIN: Add Benefits Modal -->
     <div id="add-benefits-modal" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="font-medium text-base mr-auto">New Benefit</h2>
                </div>
                <form action="/benefits/add" method="POST" enctype="multipart/form-data" >
                    @csrf
                    <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                         
                        <div class="col-span-12">
                            <label for="pos-form-1" class="form-label">Name</label>
                            <input id="name" name="name" type="text" class="form-control flex-1" placeholder="name">
                        </div>

                        <div class="col-span-12">
                            <label for="pos-form-1" class="form-label">Form Type</label>
                            <select id="form_type" name="form_type" type="text" class="form-select flex-1">
                                <option value="0">Static</option>
                                <option value="1">Dynamic</option>
                            </select>
                        </div>
         
>>>>>>> e0ca9b07f2586483b6a5624bdc458726b4264e15
                        </div>
                        <div class="modal-footer text-right">
                            <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-32 mr-1">Cancel</button>
                            <button type="submit" id="addfo" name="additem" class="btn btn-primary w-32">Save</button>
                        </div>
                    
                    </div>
                </form>
        </div>
    </div>
<<<<<<< HEAD
    <!-- END: New Order Modal -->

      <!-- BEGIN: New field office Modal -->
=======
    <!-- END: Add Benefits Modal -->

      <!-- BEGIN: Select requirements to Benefits Modal -->
      <div id="select-req-modal" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content text-center">
                <form action="" method="POST" enctype="multipart/form-data" id="select_requirements_to_benefits">
                    @csrf

                    <div class="modal-header">
                        <h2 class="font-medium text-center mr-auto">Select Requirement/s to Benefit</h2>
                    </div>

                    <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                
                        <div class="col-span-12">
                            <input id="benefit_id" name="benefit_id" type="hidden" class="form-control flex-1 border-none text-center" >
                            <input id="benefit_name" name="benefit_name" type="text" class="form-control flex-1 border-none text-center" readonly>
                        </div>   
                        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
                            <table id="datatable" class="table table-report">
                                <thead>
                                    <tr>
                                        <th class="whitespace-nowrap">REQUIREMENTS</th>
                                        <th class="whitespace-nowrap">SELECT</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($requirements as $index => $fo1)
                                        @foreach($benefit_requirements as $index => $br)              
                                            <tr class="intro-x">                  
                                                    <td id="foname">{{ $fo1->name}}</td> 
                                                    <td>
                                                    @php
                                                        $benefit = $fo1->name;
                                                    @endphp
                                                    {{ $benefit }}
                                                    </td>                    
                                                    <td id="foid">
                                                        @if($br->benefit_id == $fo1->id && $br->requirement_id == $fo1->id)
                                                            <input type="checkbox" name="requirement_idbene[]" value="{{$fo1->id}}" checked>
                                                        @else
                                                            <input type="checkbox" name="requirement_id[]" value="{{$fo1->id}}">
                                                        @endif 
                                                    </td>                 
                                            </tr>                  
                                        @endforeach
                                    @endforeach 
                                </tbody>
                            </table>
                        </div>
                    </div>   
                       

                    <div class="modal-footer text-right bg-white">
                        <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-32 mr-1">Cancel</button>
                        <button type="submit" id="save_btn" name="save_btn" class="btn btn-primary w-32">Save</button>
                    </div>        
 
                </form>
            </div>
        </div>
    </div>
    <!-- END: Select requirements to Benefits Modal -->

      <!-- BEGIN: Edit Benefits Modal -->
>>>>>>> e0ca9b07f2586483b6a5624bdc458726b4264e15
      <div id="editmodal" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
<<<<<<< HEAD
                    <h2 class="font-medium text-base mr-auto">Add Barangay</h2>
=======
                    <h2 class="font-medium text-center mr-auto">Edit Benefit Requirements</h2>
>>>>>>> e0ca9b07f2586483b6a5624bdc458726b4264e15
                </div>
                <form action="/barangay" method="POST" method="POST" enctype="multipart/form-data" id="editform" >
                    @csrf
                    <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
<<<<<<< HEAD
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
=======
                        <div class="col-span-12 ">
                            <label for="pos-form-1" class="form-label">Old Benefit Name</label>
                            <input id="old_benefit_name" name="old_benefit_name" type="text" class="form-control flex-1" readonly>
                        </div>      
                        
                        <div class="col-span-12">
                            <label for="pos-form-1" class="form-label">New Benefit Name</label>
                            <input id="new_benefit_name" name="new_benefit_name" type="text" class="form-control flex-1" >
                        </div>   

                        <div class="col-span-12">
                            <label for="pos-form-1" class="form-label">Form Type</label>
                            <select id="form_type" name="form_type" type="text" class="form-select flex-1">
                                <option value="0">Static</option>
                                <option value="1">Dynamic</option>
                            </select>
                        </div>

                    </div>


                    <div class="modal-footer text-right">
                        <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-32 mr-1">Cancel</button>
                        <button type="submit" id="addfo" name="additem" class="btn btn-primary w-32">Update</button>
                    </div>
>>>>>>> e0ca9b07f2586483b6a5624bdc458726b4264e15
                    
                    </div>
                </form>
        </div>
    </div>
<<<<<<< HEAD
    <!-- END: New Order Modal -->
=======
    <!-- END: View Benefits Modal -->
>>>>>>> e0ca9b07f2586483b6a5624bdc458726b4264e15

</div>
<!-- END: Content -->
</div>


<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>


<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>



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
<<<<<<< HEAD
				
				
=======
					
>>>>>>> e0ca9b07f2586483b6a5624bdc458726b4264e15
				</script>
			<?php
			unset($_SESSION['fail']);
		}
   
?>

<script type="text/javascript">
    $(document).ready(function()
    {
        var table = $('#datatable').DataTable(
            {
                "bPaginate": false,
<<<<<<< HEAD
        "bFilter": false,
       
            }
        );
=======
            "bFilter": false,
       
            }
        );

        // edit benefits
>>>>>>> e0ca9b07f2586483b6a5624bdc458726b4264e15
        table.on('click', '.edit', function()
        {
            $tr=$(this).closest('tr');
            if ($($tr).hasClass('child'))
            {
                $tr = $tr.prev('.parent');
            }

            var data = table.row($tr).data();
<<<<<<< HEAD
            console.log(data);

            $('#fieldofficename').val(data[1]);

            $('#editform').attr('action','/barangay/' + data[3]);
=======

            $('#old_benefit_name').val(data[1]);

            $('#editform').attr('action','/benefits/update/' + data[2]);
          
        })

        
        // select requirements to benefits
        table.on('click', '.select_benreq', function()
        {
            $tr=$(this).closest('tr');
            if ($($tr).hasClass('child'))
            {
                $tr = $tr.prev('.parent');
            }

            var data = table.row($tr).data();
            console.log(data);

            $('#benefit_id').val(data[0]);
            $('#benefit_name').val(data[1]);

            $('#select_requirements_to_benefits').attr('action','/benefits/select');
>>>>>>> e0ca9b07f2586483b6a5624bdc458726b4264e15
          
        })

    })

</script>
<<<<<<< HEAD
=======









>>>>>>> e0ca9b07f2586483b6a5624bdc458726b4264e15
@endsection
