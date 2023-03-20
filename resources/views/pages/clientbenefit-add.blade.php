@extends('../layout/' . $layout)

@section('subhead')
    <title>Field Office | Social Welfare Registration and Benefits System</title>
@endsection

@section('subcontent')
<h2 class="intro-y text-lg font-medium mt-10">
    Manage Benefits
</h2>
<div class="grid grid-cols-12 gap-6 mt-5">
  
    <!-- BEGIN: Data List -->
    <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
     
        <div class="col-span-12">
            <div id="checkbox-switch" class="p-5">
                <div class="preview">
                    <div>
                        <form action="{{('/addclientbenefits/'. $id )}}" method="POST" enctype="multipart/form-data" id="select_requirements_to_benefits">
                            @csrf
                           
                     
                        @foreach($benefits as $benefit)
                            @php 
                             $check = \App\Models\BenefitRequirement::where(['benefit_id' => $benefit->id])->first();
                            $value = \App\Models\ClientBenefit::where(['client_type_id' => $id])->where(['benefit_id' => $benefit->id])->first();
                            @endphp

                    @if(!empty($check))
                           @if(!empty($value))
                                    
                                        <div class="form-check mt-2">
                                        <tr class="intro-x">                  
                                            <td id="foname">{{ $benefit->benefit_name }}</td>           
                                            <td id="foid">
                                                <input id="checkbox-switch-1" name="benefit[]" class="form-check-input" type="checkbox" value="{{$benefit->id}}"  checked>
                                                
                                            </td>                 
                                        </tr>     
                                    </div>
                                    
                             @else
                             <div class="form-check mt-2">
                                <tr class="intro-x">                  
                                    <td id="foname">{{ $benefit->benefit_name}}</td>           
                                    <td id="foid">
                                        <input id="checkbox-switch-1" name="benefit[]" class="form-check-input" type="checkbox" value="{{$benefit->id}}">
                                    </td>                 
                                </tr>     
                             </div>
                             @endif
                    @endif
                        @endforeach
                        <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-32 mr-1">Cancel</button>
                        <button type="submit" id="addfo" name="additem" class="btn btn-primary w-32">Save</button>
                        </form>
                    </div>
                 
                    
                </div>

              
                
            </div>
        </div>
          
   
    </div>
    <!-- END: Data List -->
  
</div>
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
         
                        </div>
                        <div class="modal-footer text-right">
                            <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-32 mr-1">Cancel</button>
                            <button type="submit" id="addfo" name="additem" class="btn btn-primary w-32">Save</button>
                        </div>
                    
                    </div>
                </form>
        </div>
    </div>
    <!-- END: Add Benefits Modal -->

   

      <!-- BEGIN: Edit Benefits Modal -->
      <div id="editmodal" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="font-medium text-center mr-auto">Edit Benefit Requirements</h2>
                </div>
                <form action="/barangay" method="POST" method="POST" enctype="multipart/form-data" id="editform" >
                    @csrf
                    <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
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
                    
                    </div>
                </form>
        </div>
    </div>
    <!-- END: View Benefits Modal -->

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

        // edit benefits
        table.on('click', '.edit', function()
        {
            $tr=$(this).closest('tr');
            if ($($tr).hasClass('child'))
            {
                $tr = $tr.prev('.parent');
            }

            var data = table.row($tr).data();

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
          
            var benefit = data[0];
            $('#benefit_id').val(data[0]);
            $('#benefit_name').val(data[1]);
            
            $('#select_requirements_to_benefits').attr('action','/benefits/select');
           
        })

    })

</script>









@endsection
           