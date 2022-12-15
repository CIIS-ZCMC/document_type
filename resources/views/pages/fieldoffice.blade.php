@extends('../layout/' . $layout)

@section('subhead')
    <title>Field Office | Social Welfare Registration and Benefits System</title>
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
        <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#new-fo-modal" class="btn btn-primary shadow-md mr-2">Add New Field Office</a>
       
    </div>
    <!-- BEGIN: Data List -->
    <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
        <table id="datatable" class="table table-report -mt-2">
            <thead>
                <tr>
                    <th class="whitespace-nowrap">No.</th>
                    <th class="whitespace-nowrap">ITEM NAME</th>
                    <th class="whitespace-nowrap">ADDRESS</th>
                    <th id="filename" class="whitespace-nowrap">id</th>
                  
                  
                    <th class="text-center whitespace-nowrap">ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                @foreach($fo as $index => $fo1)    
                <tr class="intro-x">
                    <td id="foid">{{$index + 1}}</td>
                    <td id="foname">{{ $fo1->name}}</td>
                    <td>{{ $fo1->address}}</td>
                    <td id="filename">{{$fo1->id}}</td>
                  
                 
                    <td class="table-report__action w-56">
                        <div class="flex justify-center items-center" >
                          <button href="javascript:;" class="btn btn-outline-primary w-32 mr-1 edit" data-tw-toggle="modal" data-tw-target="#editmodal">Add Barangay</button>
                          
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
                    <h2 class="font-medium text-base mr-auto">Add Barangay</h2>
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

</div>
<!-- END: Content -->
</div>


<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
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

            $('#fieldofficename').val(data[1]);

            $('#editform').attr('action','/barangay/' + data[3]);
          
        })

    })

</script>
@endsection
