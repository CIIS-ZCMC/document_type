@extends('../layout/base')

@section('body')
@include('sweetalert::alert')
    <body class="py-5 md:py-0 bg-white dark:bg-transparent">
        
      
        
        @yield('content')
        <script src="{{ mix('dist/js/app.js') }}"></script>
        <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=["your-google-map-api"]&libraries=places"></script>
      
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
      
     
        @yield('script')
      
      
    </body>
@endsection
