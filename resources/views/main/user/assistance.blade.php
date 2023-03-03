@extends('../layout/user-side-menu')

<link rel="stylesheet" href=" https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
@section('subhead')
    <title>User | Benefits
    </title>
@endsection


@section('subcontent')


    <h2 class="intro-y text-lg font-medium mt-10">
        Benefits List
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            {{-- <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                <div class="w-56 relative text-slate-500">
                    <input type="text" class="form-control w-56 box pr-10" placeholder="Search...">
                    <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-lucide="search"></i> 
                </div>
            </div> --}}
        
        
            <div class="hidden md:block mx-auto text-slate-500"></div>
            <!-- <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#new-fo-modal" class="btn btn-primary shadow-md mr-2">Add Benefit</a> -->
        
        </div>
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table id="datatable" class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th class="whitespace-nowrap">No.</th>
                        <th class="whitespace-nowrap">NAME</th>
                       
                    
                        <th class="text-center whitespace-nowrap">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
               
                  
                   
                        
                            <tr class="intro-x">
                                <td id="foid">1</td>
                                <td id="foid">Burial Assistance</td>
                                <td class="table-report__action w-56">
                                    <div class="flex justify-center items-center" >
                                        <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#new-fo-modal" class="btn btn-outline-success"  id='isActiveToggle'>Apply</a>
                                    </div>
                                </td>
                            </tr>
                             
                            <tr class="intro-x">
                                <td id="foid">2</td>
                                <td id="foid">Financial Assistance</td>
                                <td class="table-report__action w-56">
                                    <div class="flex justify-center items-center" >
                                        <a  href="" class="btn btn-outline-success"  id='isActiveToggle'>Apply</a>
                                    </div>
                                </td>
                            </tr>
                       
                            <tr class="intro-x">
                                <td id="foid">3</td>
                                <td id="foid"> Medical Assistance</td>
                                <td class="table-report__action w-56">
                                    <div class="flex justify-center items-center" >
                                        <a  href="" class="btn btn-outline-success"  id='isActiveToggle'>Apply</a>
                                    </div>
                                </td>
                            </tr>
                            <tr class="intro-x">
                                <td id="foid">4</td>
                                <td id="foid">Food Assistance</td>
                                <td class="table-report__action w-56">
                                    <div class="flex justify-center items-center" >
                                        <a  href="" class="btn btn-outline-success"  id='isActiveToggle'>Apply</a>
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

    <div id="new-fo-modal" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="font-medium text-base mr-auto">Upload Requirements</h2>
                </div>
                <form action="{{('/medical/apply/'.$userid)}}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                        
                        
                            <div class="col-span-12">
                                <label for="pos-form-1" class="form-label">Prescription/s</label>
                                <input id="presciption" name="presciption" type="file" class="form-control flex-1" placeholder="name">
                            </div>

                            <div class="col-span-12">
                                <label for="pos-form-1" class="form-label">Medical Abstract/ Medical Certiicate</label>
                                <input id="medical_abstract" name="medical_abstract" type="file" class="form-control flex-1" placeholder="name">
                            </div>

                            <div class="col-span-12">
                                <label for="pos-form-1" class="form-label">Certificate of Indigency</label>
                                <input id="indigency" name="indigency" type="file" class="form-control flex-1" placeholder="name">
                            </div>
                   
                            <div class="col-span-12">
                                <label for="pos-form-1" class="form-label">Valid ID</label>
                                <input id="valid_id" name="valid_id" type="file" class="form-control flex-1" placeholder="name">
                            </div>

                            <div class="col-span-12">
                                <label for="pos-form-1" class="form-label">Authorization Letter</label>
                                <input id="authorization_letter" name="authorization_letter" type="file" class="form-control flex-1" placeholder="name">
                            </div>
                        </div>
                        <div class="modal-footer text-right">
                            <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-32 mr-1">Cancel</button>
                            <button type="submit" id="addfo" name="additem" class="btn btn-primary w-32">Submit</button>
                        </div>
                    
                    </div>
                </form>
        </div>
    </div>

    <!-- BEGIN: New field office Modal -->
    <div id="applymodal" class="modal" tabindex="-1" aria-hidden="true">
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
                                <input id="name" name="name" type="text" class="form-control flex-1" placeholder="name" required>
                            </div>
                            <div class="col-span-12">
                                <label for="pos-form-2" class="form-label">Address</label>
                                <input id="address" name="address" type="text" class="form-control flex-1" placeholder="address" required>
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
   
@endsection

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>


<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script>


