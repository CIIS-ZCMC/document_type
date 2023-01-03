@extends('../layout/' . $layout)

<link rel="stylesheet" href=" https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
<!-- font awesome icon 
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css" integrity="sha384-QYIZto+st3yW+o8+5OHfT6S482Zsvz2WfOzpFSXMF9zqeLcFV0/wlZpMtyFcZALm" crossorigin="anonymous">
box icon 
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
 material icon 
<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined"
      rel="stylesheet">-->

@section('subhead')
    <title>Profile | Social Welfare Registration and Benefits System</title>
@endsection

@section('subcontent')
<form action="">
    <div>
        <img alt="Profile" src="{{ asset('dist/images2/cityhallzc.jpg') }}" style="width: 400%;height:300px;filter: blur(5px);
        -webkit-filter: blur(5px);">
    </div>
    <div class="mb-5">
        <img alt="Profile" src="{{ asset('dist/images/' . $fakers[9]['photos'][0]) }}" style="width: 200px; height: 200px; border-radius: 50%;z-index:2;position:absolute;top:250px;left:100px;border:solid white 5px;margin:20px;">        
    </div>   
    <div style="position:absolute;left:24%; border:blue;">
        <div class="mb-3">     
            <label for="exampleInputEmail1" class="form-label">Name</label>
            <input type="email"  class="form-control w-50" value="{{ $LoggedUserInfo['name'] }}" readonly>
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input type="email" class="form-control w-50" value="{{ $LoggedUserInfo['email'] }}" readonly>
        </div>
    </div>
   
</form>


@endsection