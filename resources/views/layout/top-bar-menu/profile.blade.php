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
    <div style="display: flex; justify-content: center; background: orange; padding: 20px 10px">
        <img alt="Midone - HTML Admin Template" src="{{ asset('dist/images/' . $fakers[9]['photos'][0]) }}" style="width: 200px; height: 200px; border-radius: 50%">
    </div>

@endsection