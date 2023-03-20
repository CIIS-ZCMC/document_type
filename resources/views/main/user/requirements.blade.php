@extends('../layout/user-side-menu')

<link rel="stylesheet" href=" https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
@section('subhead')
    <title>User | Benefits
    </title>
@endsection


@section('subcontent')
 {{-- <label class="required"  for="phone"> {{$requirements->name}}</label> --}}
                            {{-- <input type="file" id="benefitrequirement[]" class="select" name="benefitrequirement[]" value="{{ old('c') }}" required>
                            <input id="reqname[]" name="reqname[]" type="hidden" class="form-control flex-1" value="{{$requirements->name}}" > --}}
                            <div class="intro-y flex items-center mt-8">
                                <h2 class="text-lg font-medium mr-auto">Upload Requirements</h2>
                            </div>
    
    
            <form action="{{('/user/storeuserbenefitapplication/'. $userid .'/'. $clienttype .'/'. $id .'/'. $cardid )}}" method="POST" enctype="multipart/form-data" >
           @csrf
                        @foreach($userbenefit1 as $requirements)
                        
                        
                           
                       
                        <div class="grid grid-cols-12 gap-6 mt-5">
                            <div class="intro-y col-span-12 lg:col-span-6">
                                <!-- BEGIN: Single File Upload -->
                                <div class="intro-y box">
                                    <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                                        <h2 class="font-medium text-base mr-auto">{{$requirements->name}}</h2>
                                        <div class="form-check form-switch w-full sm:w-auto sm:ml-auto mt-3 sm:mt-0">
                                           
                                        </div>
                                    </div>
                                    <div id="single-file-upload" class="p-5">
                                        <div class="preview">
                                          
                                                <div class="fallback">
                                                     <input type="file" id="benefitrequirement[]" class="select" name="benefitrequirement[]" value="{{ old('c') }}" required>
                                                        <input id="reqname[]" name="reqname[]" type="hidden" class="form-control flex-1" value="{{$requirements->name}}" >
                                                </div>
                                             
                                        </div>
                                      
                                    </div>
                                </div>
                                <!-- END: Single File Upload -->
                               
                            </div>
                         
                        </div>
                       
                        
                       
                        
                        @endforeach

                        <div class="flex justify-center items-center" >
                            <button type="submit" id="addfo" name="additem" class="btn btn-primary w-32">Save</button>
                            
                        </div>
                     
                        
            </form>
                    
                   
                 
                   
          
         
    
  
   
@endsection

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>


<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script>



