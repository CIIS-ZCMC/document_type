@extends('../layout/' . $layout)

@section('subhead')
    <title>Field Office | Social Welfare Registration and Benefits System</title>
@endsection

@section('subcontent')
<h2 class="intro-y text-lg font-medium mt-10">
    Manage Client Benefits
</h2>
<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">

        <select name="">
            <option value="">Citizen</option>
            <option value="">Senior</option>
            <option value="">PWD</option>
            <option value="">Solo Parent</option>
        </select>
        <!-- <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
            <div class="w-56 relative text-slate-500">
                <input type="text" class="form-control w-56 box pr-10" placeholder="Search...">
                <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-lucide="search"></i> 
            </div>
        </div> -->
       
       
        <div class="hidden md:block mx-auto text-slate-500"></div>      
    </div>
    <!-- BEGIN: Data List -->
    <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
        <table id="datatable" class="table table-report -mt-2">
            <thead>
                <tr>
                    <th class="whitespace-nowrap">NO.</th>
                    <th class="whitespace-nowrap">CLIENT NAME</th> 
                    <th class="text-center whitespace-nowrap">ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                <!-- @foreach($fo as $index => $fo1)    
                <tr class="intro-x">
                    <td id="foid">{{$index + 1}}</td>
                    <td id="foname">{{ $fo1->name}}</td>
               
                    <td id="filename">{{$fo1->id}}</td>
                  
                 
                    <td class="table-report__action w-56">
                        <div class="flex justify-center items-center" >                 
                            <button href="javascript:;" class="btn btn-outline-primary mr-1 edit" style="width: 100px;" data-tw-toggle="modal" data-tw-target="#editmodal">View</button>
                        </div>
                    </td>
                    
                </tr>
                @endforeach -->

                <tr class="intro-x">
                    <td>1</td>
                    <td>Renz Tumz</td>
                    <td class="table-report__action w-56">
                        <div class="flex justify-center items-center" >   
                        <button href="javascript:;" class="btn btn-outline-primary mr-1 edit" style="width: 100px;" data-tw-toggle="modal" data-tw-target="#addmodal">Add</button>              
                            <button href="javascript:;" class="btn btn-outline-primary mr-1 edit" style="width: 100px;" data-tw-toggle="modal" data-tw-target="#addmodal">Edit</button>              
                            <button href="javascript:;" class="btn btn-outline-primary mr-1 edit" style="width: 100px;" data-tw-toggle="modal" data-tw-target="#viewmodal">View</button>
                        </div>
                    </td>
                </tr>
               
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

     <!-- BEGIN: Add New Client Benefits Modal -->
     <div id="addmodal" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="font-medium text-base mr-auto">Add Client Benefit</h2>
                </div>
                <form action="/benefits/add" method="POST" enctype="multipart/form-data" >
                    @csrf
                    <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                        
                        
                            <div class="col-span-12">
                                <label for="pos-form-1" class="form-label">Name</label>
                                <input id="name" name="name" type="text" class="form-control flex-1" placeholder="name">
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
    <!-- END: -->

      <!-- BEGIN: View Clint Benefits -->
      <div id="viewmodal" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="font-medium text-base mr-auto">View Client Benefits</h2>
                </div>
                <form action="/barangay" method="POST" method="POST" enctype="multipart/form-data" id="editform" >
                    @csrf
                    <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                        <div class="col-span-12">
                            <div id="checkbox-switch" class="p-5">
                                <div class="preview">
                                    <div>
                                        <label>Select </label>
                                        @foreach($benefits as $benefit)
                                        <div class="form-check mt-2">
                                            <input id="checkbox-switch-1" name="benefit[]" class="form-check-input" type="checkbox" value="{{$benefit->id}}">
                                            <label class="form-check-label" for="checkbox-switch-1">{{$benefit->name}}</label>
                                        </div>
                                        @endforeach
                                       
                                    </div>
                                   
                                </div>
                                
                            </div>
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
    <!-- END: -->

      <!-- BEGIN: Edit client Benefits Modal -->
      <div id="editmodal" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="font-medium text-base mr-auto">Edit Client Benefits</h2>
                </div>
                <form action="/barangay" method="POST" method="POST" enctype="multipart/form-data" id="editform" >
                    @csrf
                    <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                        <div class="col-span-12">
                            <div id="checkbox-switch" class="p-5">
                                <div class="preview">
                                    <div>
                                        <label>Select </label>
                                        @foreach($benefits as $benefit)
                                        <div class="form-check mt-2">
                                            <input id="checkbox-switch-1" name="benefit[]" class="form-check-input" type="checkbox" value="{{$benefit->id}}">
                                            <label class="form-check-label" for="checkbox-switch-1">{{$benefit->name}}</label>
                                        </div>
                                        @endforeach
                                       
                                    </div>
                                   
                                </div>
                                
                            </div>
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
    <!-- END: Edit client Benefits Modal -->


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
        "bFilter": false,
       
            }
        );
        table.on('click', '.edit', function()
        {
            $tr=$(this).closest('tr');
            if ($($tr).hasClass('child'))
            {
                $tr = $tr.prev('.parent');
            }

            var data = table.row($tr).data();
            console.log(data);

            // $('#fieldofficename').val(data[1]);

            $('#editform').attr('action','/addclientbenefits/' + data[2]);
          
        })

    })

</script>
@endsection
