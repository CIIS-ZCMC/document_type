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
            
            <form action="{{('/user/storeuserbenefitapplication/'. $userid .'/'. $clienttype .'/'. $id )}}" method="POST" enctype="multipart/form-data" >
           
                        @foreach($userbenefit1 as $requirements)
                        

                            <label class="required"  for="phone"> {{$requirements->name}}</label>
                            <input type="file" id="benefitrequirement[]" class="select" name="benefitrequirement[]" value="{{ old('c') }}" required>
                            <input id="reqname[]" name="reqname[]" type="hidden" class="form-control flex-1" value="{{$requirements->name}}" >

                        </div>
                             
                              
                     
                        
                       
                        
                        @endforeach

                        
                        <div class="flex justify-center items-center" >
                            <button type="submit" id="addfo" name="additem" class="btn btn-primary w-32">Save</button>
                            
                        </div>
                    
                   
                 
                   
          
         
        </div>
        <!-- END: Data List -->
        <!-- BEGIN: Pagination -->
   
        <!-- END: Pagination -->
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
                                <input id="name" name="name" type="text" class="form-control flex-1" placeholder="name" >
                            </div>
                            <div class="col-span-12">
                                <label for="pos-form-2" class="form-label">Address</label>
                                <input id="address" name="address" type="text" class="form-control flex-1" placeholder="address" >
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



