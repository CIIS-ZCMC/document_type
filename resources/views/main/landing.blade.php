<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>City Government of Zamboanga</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
        <!-- Bootstrap css -->
        <link rel="stylesheet" href="{{ asset('dist/css2/bootstrap.min.css') }}" type="text/css" id="bootstrap-style" />
        <!-- Icons -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
        <!-- Material Icon Css -->
        <link rel="stylesheet" href="{{ asset('dist/css2/materialdesignicons.min.css') }}" type="text/css" />

        <!-- Unicon Css -->
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />

        <!-- Swiper Css -->
        <link rel="stylesheet" href="{{ asset('dist/css2/tiny-slider.css') }}" type="text/css" />
        <link rel="stylesheet" href="{{ asset('dist/css2/swiper.min.css') }}" type="text/css" />

        <!-- Custom Css -->
        <link rel="stylesheet" href="{{ asset('dist/css2/style.css') }}" type="text/css" />
        

        <!-- colors -->
        <link href="{{ asset('dist/css2/colors/default.css') }}" rel="stylesheet" type="text/css" id="color-opt" />

        <!-- zc seal -->
        <link rel="icon" href="{{asset('dist/images/Seal.png')}}" size="10x10" />

    
    </head>

    <body data-bs-spy="scroll" data-bs-target="#navbar" data-bs-offset="-1">
        <style>
            @media screen and (max-width: 768px) {
                #tag-logo {
                    display: none;
                }
            }
        </style>
        <!-- START  NAVBAR -->
        <nav class="navbar navbar-expand-lg fixed-top navbar-custom" id="navbar">
            <div class="container-fluid">
                <!-- LOGO -->
                <a class="navbar-brand logo text-uppercase d-flex align-items-center" href="/main">
                    <img src="{{ asset('dist/images2/seal.png') }}"  alt="" style="width: 50px; height: 50px; margin-left: 20px">
                    <b style="font-weight:500; letter-spacing: 1px; font-size:16px; color: white; margin-left: 10px;" id="tag-logo">Zamboanga City</b>
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="material-symbols-outlined">
                        menu
                    </span>
                </button>

                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav ms-auto" id="navbar-navlist">
                        <li class="nav-item">
                            <a class="nav-link" href="#_home">Home</a>
                        </li>
                        {{--<li class="nav-item">
                            <a class="nav-link" href="#service">Senior</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#features">PWD</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#pricing">Solo Parent</a>
                        </li>--}}
                        <li class="nav-item">
                            <a class="nav-link" href="#_services">Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#_beneficiaries">Beneficiaries</a>
                        </li>
                      
                        {{--<li class="nav-item">
                            <a class="nav-link" href="#app">Infographics</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#team">Team</a>
                        </li>--}}
                        <li class="nav-item">
                            <a class="nav-link" href="#_contact">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" type="button" data-bs-target="#form_application"  data-bs-toggle="modal">
                                <span id="btn-span">Login</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- END NAVBAR -->

         <!-- home section -->
         <section class="home-4 bg-soft-primary" id="_home" style="background: url('https://www.vhv.rs/file/max/19/191341_white-waves-png.png'); background-size: cover; width: 100%; height: 100vh">
            <!-- start container -->
                <div class="container">
                    <div class="home-content">
                        <div class="row align-items-center">
                            <div class="col-lg-6" style="position: relative; display: flex; justify-content:center; align-items:center;">
                                <img src="{{ asset('dist/images2/mayor.png') }}" alt="" style="z-index: 1" class="img-fluid">
                            </div>
                            <div class="col-lg-6">
                                <div style="width: 94%; margin: auto;" class="mt-3">
                                    
                                    <h3 class="display-5 fw-bold">CITY GOVERNMENT OF ZAMBOANGA</h3>
                                    <h5>Zamboanga Card Registration System</h5>
                                </div>
                                <div class="d-flex mt-3">
                                <style>
                                    @media screen and (max-width: 768px) {
                                        .material-symbols-outlined {
                                            margin-right: none;
                                        }
                                    }
                                </style>
                                    <button type="button" data-bs-target="#form" style="display:flex; align-items:center; justify-content: center;" class="btn ms-3" data-bs-toggle="modal">
                                        <span class="material-symbols-outlined">app_registration</span> Register
                                    </button>
                                            {{-- <a href="#watchvideomodal" class="btn ms-3" data-bs-toggle="modal"> --}}
                                    <!-- <button type="button" data-bs-target="#formbenefit" style="display:flex; align-items:center; justify-content: center;" class="btn ms-3" data-bs-toggle="modal">
                                        <span class="material-symbols-outlined">loyalty</span>Benefit
                                    </button>
                                    <button type="button" data-bs-target="#formtrack" style="display:flex; align-items:center; justify-content: center;" class="btn ms-3" data-bs-toggle="modal">
                                        <span class="material-symbols-outlined">query_stats</span>Track
                                    </button> -->
                                

                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
     
            <!-- Modal form for Register -->
            <div class="modal fade" id="form" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content py-md-5 px-md-3 p-sm-3 p-4">
                        <div class="modal-header d-flex justify-content-center" >
                                <h5>  Please Select Category To <span class="text-info">REGISTER</span>  
                                </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                               {{--<p class="r3 px-md-5 px-sm-1">Please select</p> --}}
                            <form action="/registration">
                                @csrf
                                <div class="text-center mb-3"> <button type="submit" class="btn btn-dark w-50 rounded-pill b1">Citizen</button> </div>
                            </form>
                            <div class="text-center mb-3"><a href="#senior" class="btn btn-dark w-50 rounded-pill b1" data-bs-toggle="modal">Senior</a></div>
                            <div class="text-center mb-3"><a href="#soloparent" class="btn btn-dark w-50 rounded-pill b1" data-bs-toggle="modal">Solo Parent</a></div>
                            <div class="text-center mb-3"><a href="#pwd" class="btn btn-dark w-50 rounded-pill b1" data-bs-toggle="modal">PWD</a></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal From for Benefit -->
            <div class="modal fade" id="formbenefit"data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">           
                    <div class="modal-content py-md-5 px-md-4 p-sm-3 p-4">
                        <!-- <div class="modal-header mb-4 d-flex justify-content-center">
                            <h5> Please Select Category For <span class="text-info"> BENEFITS </span> </h5>
                        </div> -->
                        <button type="button" class="btn-close" style="color: black;" data-bs-dismiss="modal" aria-label="Close"></button>
                        <form action="/searchseniorcashincentivesform">
                            @csrf
                            <div class="text-center mb-3"> <button type="submit" class="btn btn-dark w-50 rounded-pill b1">Apply</button> </div>
                        </form>
                        <form action="/dummybenefit">
                            @csrf
                            <div class="text-center mb-3"> <button type="submit" class="btn btn-dark w-50 rounded-pill b1">Dummy</button> </div>
                        </form>
                        {{--<p class="r3 px-md-5 px-sm-1">Please Select</p>--}}
{{-- 
                        @foreach($clienttype as $clienttype)
                        <div class="text-center mb-3"><a href="#seniorbenefit" class="btn btn-dark w-50 rounded-pill b1" data-bs-toggle="modal">{{$clienttype->name}}</a></div>
                        {{-- <div class="text-center mb-3"><a href="#soloparentbenefit" class="btn btn-dark w-50 rounded-pill b1" data-bs-toggle="modal">Solo Parent</a></div>
                        <div class="text-center mb-3"><a href="#pwdbenefit" class="btn btn-dark w-50 rounded-pill b1" data-bs-toggle="modal">PWD</a></div> --}}
                        {{-- @endforeach --}} -->
                    </div>
                </div>
            </div>

            <!-- Modal Form For Track -->
            <!-- <div class="modal fade" id="formtrack" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content py-md-5 px-md-4 p-sm-3 p-4">

                        <div class="modal-header mb-4 d-flex justify-content-center">
                            <h5> Please Select Category To <span class="text-info"> TRACK </span>  </h5>
                        </div>
                        <button type="button" class="btn-close" style="color: black;" data-bs-dismiss="modal" aria-label="Close"></button>
                        <form action="/trackcardform">
                            @csrf
                            <div class="text-center mb-3"> <button type="submit" class="btn btn-dark w-50 rounded-pill b1">Card</button> </div>
                        </form>
                        <form action="/trackbenefitform">
                            @csrf
                            <div class="text-center mb-3"> <button type="submit" class="btn btn-dark w-50 rounded-pill b1">Benefit</button> </div>
                        </form>
                    </div>  
                </div>
            </div> -->

            <!-- Modal Form For Application Login User -->
            <div class="modal fade" id="form_application"data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">           
                    <div class="modal-content py-md-5 px-md-4 p-sm-3 p-4">
                        <div class="modal-header mb-4 d-flex justify-content-center">
                            <h5> Please Click to Proceed</h5>
                        </div>
                        <button type="button" class="btn-close" style="color: black;" data-bs-dismiss="modal" aria-label="Close"></button>
                        <form action="/userloginpage">
                            @csrf
                            <div class="text-center mb-3"> <button type="submit" class="btn btn-dark w-50 rounded-pill b1">Login User</button> </div>
                        </form>
                        <form action="/pharmacyloginpage">
                            @csrf
                            <div class="text-center mb-3"> <button type="submit" class="btn btn-dark w-50 rounded-pill b1">Login Pharmacy</button> </div>
                        </form>
                        <form>
                            @csrf
                            <div class="text-center mb-3"> <a href="/" type="button" class="btn btn-dark w-50 rounded-pill b1">Login Admin</a> </div>
                        </form>
                    </div>
                </div>
            </div>



      
            <div class="modal fade text-center" id="senior" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered text-center" role="document">.
                    <div class="modal-content py-md-5 px-md-4 p-sm-3 p-4">

                        <div class="modal-header mb-4 d-flex justify-content-center">
                            <h5 class="text-center"> Please Select Category </h5>
                        </div>

                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          
                        <form action="/registeredsenior">
                            @csrf
                            <div class="text-center mb-3"> <button type="submit" class="btn btn-dark w-50 rounded-pill b1">Registered</button> </div>
                        </form>
                        <form action="/seniorregistration">
                            @csrf
                            <div class="text-center mb-3"> <button type="submit" class="btn btn-dark w-50 rounded-pill b1">New</button> </div>
                        </form>
                        <form action="/ongoingsenior">
                            @csrf
                            <div class="text-center mb-3"> <button type="submit" class="btn btn-dark w-50 rounded-pill b1">Ongoing</button> </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="soloparent" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content py-md-5 px-md-4 p-sm-3 p-4">
                   
                        <div class="modal-header mb-3 d-flex justify-content-center">
                            <h5 class="text-center"> Receive push notifications to be updated to latest news. </h5>
                        </div>

                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        
                        {{--<p class="r3 px-.md-5 px-sm-1">Recieve push notifications to be updated to latest news.</p>--}}
                        <form action="/registeredsoloparent">
                            @csrf
                            <div class="text-center mb-3"> <button type="submit" class="btn btn-dark w-50 rounded-pill b1">Registered</button> </div>
                        </form>
                        <form action="/soloparentregistration">
                            @csrf
                            <div class="text-center mb-3"> <button type="submit" class="btn btn-dark w-50 rounded-pill b1">New</button> </div>
                        </form>
                        <form action="/ongoingsoloparent">
                            @csrf
                            <div class="text-center mb-3"> <button type="submit" class="btn btn-dark w-50 rounded-pill b1">Ongoing</button> </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="pwd" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content py-md-5 px-md-4 p-sm-3 p-4">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        
                        <div class="modal-header mb-3 d-flex justify-content-center">
                            <h5 class="text-center"> Receive push notifications to be updated to latest news. </h5>
                        </div>
                        {{--<p class="r3 px-md-5 px-sm-1">Recieve push notifications to be updated to latest news.</p>--}}
                        <form action="/registeredpwd">
                            @csrf
                            <div class="text-center mb-3"> <button type="submit" class="btn btn-dark w-50 rounded-pill b1">Registered</button> </div>
                        </form>
                        <form action="/pwdregistration">
                            @csrf
                            <div class="text-center mb-3"> <button type="submit" class="btn btn-dark w-50 rounded-pill b1">New</button> </div>
                        </form>
                        <form action="/ongoingpwd">
                            @csrf
                        <div class="text-center mb-3"> <button type="submit" class="btn btn-dark w-50 rounded-pill b1">Ongoing</button> </div>
                        </form>
                    </div>
                </div>
            </div>


            <div class="modal fade" id="seniorbenefit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content py-md-5 px-md-4 p-sm-3 p-4">

                        <div class="modal-header mb-4 d-flex justify-content-center">
                            <h5 class="text-center"> Please Select Category </h5>
                        </div>

                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        
                 
                        <form action="/searchseniorcashincentivesform">
                            @csrf
                            <div class="text-center mb-3"> <button type="submit" class="btn btn-dark w-50 rounded-pill b1">Cash Incentives</button> </div>
                        </form>
                            <form action="/searchsenioroctogenarianform">
                                @csrf
                                <div class="text-center mb-3"> <button type="submit" class="btn btn-dark w-50 rounded-pill b1">Octogenarian</button> </div>
                            </form>
                            <form action="/searchseniornonagenarianform">
                                @csrf
                                <div class="text-center mb-3"> <button type="submit" class="btn btn-dark w-50 rounded-pill b1">Nonagenarian</button> </div>
                            </form>
                            <form action="/searchseniorcentenarianform">
                                @csrf
                                <div class="text-center mb-3"> <button type="submit" class="btn btn-dark w-50 rounded-pill b1">Centenarian</button> </div>
                            </form>
                    
                    
                    </div>
                </div>
            </div>

            <div class="modal fade" id="soloparentbenefit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content py-md-5 px-md-4 p-sm-3 p-4">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                        <div class="modal-header mb-4 d-flex justify-content-center">
                            <h5 class="text-center"> Please Select Category </h5>
                        </div>
                 
                        <form action="/registeredsoloparent">
                            @csrf
                            <div class="text-center mb-3"> <button type="submit" class="btn btn-dark w-50 rounded-pill b1">Registered</button> </div>
                        </form>
                        <form action="/soloparentregistration">
                            @csrf
                            <div class="text-center mb-3"> <button type="submit" class="btn btn-dark w-50 rounded-pill b1">New</button> </div>
                        </form>
                        <form action="/ongoingsoloparent">
                            @csrf
                            <div class="text-center mb-3"> <button type="submit" class="btn btn-dark w-50 rounded-pill b1">On Going</button> </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="pwdbenefit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content py-md-5 px-md-4 p-sm-3 p-4">
                        {{--<p class="r3 px-md-5 px-sm-1">Recieve push notifications to be updated to latest news.</p>--}}
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        
                        <div class="modal-header mb-4 d-flex justify-content-center">
                            <h5 class="text-center"> Receive push notifications to be updated to latest news. </h5>
                        </div>
                        <form action="/searchpwdcashincentivesform">
                            @csrf
                            <div class="text-center mb-3"> <button type="submit" class="btn btn-dark w-50 rounded-pill b1">Cash Incentives</button> </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- end home section -->

        <!-- service section -->
        <section class="section service bg-light" id="_services">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="title text-center mb-3">
                            <h6 class="mb-0 fw-bold text-primary">What We Do?</h6>
                            <h2 class="f-40">How can we help you!</h2>
                            <div class="border-phone">
                                <p class="text-muted">The system has the following services:
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-between">
                    <div class="col-lg-4">
                        <div class="service-box text-center shadow">
                            <div class="service-icon p-4">
                               <div>
                                    <img src="{{ asset('dist/images2/service/service3.svg') }}" style="width: 120px; height:120px;" alt="">
                               </div>
                                {{--<i class="mdi mdi-security text-gradiant f-30"></i>--}}
                            </div>

                            <div class="service-content mt-3">
                                <a href="">
                                    <h5 class="fw-bold">Applicant Registration</h5>
                                </a>
                                <p class="text-muted">Create an applicant identity by registering, filling out the required information in the forms provided, and uploading the files required for the application process.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 pt-4 pt-lg-0">
                        <div class="service-box text-center shadow">
                            <div class="service-icon p-4">
                                <div>
                                    <img src="{{ asset('dist/images2/service/service2.svg') }}" style="width: 120px; height:120px;" alt="">
                               </div>
                                {{--<i class="mdi mdi-lightbulb-on text-gradiant f-30"></i>--}}
                            </div>

                            <div class="service-content mt-3">
                                <a href="">
                                    <h5 class="fw-bold">Benefits Registration</h5>
                                </a>
                                <p class="text-muted">Anyone who already has a form of identification or is registered in the system is eligible to apply for and receive some benefits.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 pt-4 pt-lg-0">
                        <div class="service-box text-center shadow">
                            <div class="service-icon p-4">
                                <div>
                                    <img src="{{ asset('dist/images2/service/service1.svg') }}" style="width: 120px; height:120px;" alt="">
                               </div>
                                {{--<i class="mdi mdi-google-nearby text-gradiant f-30"></i>--}}
                            </div>

                            <div class="service-content mt-3">
                                <a href="">
                                    <h5 class="fw-bold">Application Tracking</h5>
                                </a>
                                <p class="text-muted">For registered citizens who has already finished their application, the system will allow them to access and view their application records and details by tracking.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end section -->

           <!-- benficiaries section -->
           <section class="section service bg-light" id="_beneficiaries">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="title text-center mb-3">
                            <h2 class="f-40">Who are Qualified as Beneficiaries?</h2>
                            <div class="border-phone">
                                <p class="text-muted">The system has the following people:
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-between">
                    <div class="col-lg-3">
                        <div class="service-box text-center shadow">
                            <div class="service-icon p-1 ">
                               <div>
                                    <img src="{{ asset('dist/images2/service/citizen.svg') }}" style="width: 100px; height:100px;" alt="">
                               </div>
                                {{--<i class="mdi mdi-security text-gradiant f-30"></i>--}}
                            </div>

                            <div class="service-content mt-3">
                                <a href="">
                                    <h5 class="fw-bold">Citizens</h5>
                                </a>
                                <p class="text-muted">People who has been registered as citizen in Zamboanga City.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 pt-4 mt-4">
                        <div class="service-box text-center shadow">
                            <div class="service-icon p-3">
                                <div>
                                    <img src="{{ asset('dist/images2/service/senior.svg') }}" style="width: 100px; height:100px;" alt="">
                               </div>
                                {{--<i class="mdi mdi-lightbulb-on text-gradiant f-30"></i>--}}
                            </div>

                            <div class="service-content mt-2">
                                <a href="">
                                    <h5 class="fw-bold">Seniors</h5>
                                </a>
                                <p class="text-muted">Citizens at least sixty (60) years old.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 pt-4 pt-lg-0">
                        <div class="service-box text-center shadow">
                            <div class="service-icon p-3">
                                <div>
                                    <img src="{{ asset('dist/images2/service/pwd.png') }}" style="width: 110px; height:80px;" alt="">
                               </div>
                                {{--<i class="mdi mdi-google-nearby text-gradiant f-30"></i>--}}
                            </div>

                            <div class="service-content mt-3">
                                <a href="">
                                    <h5 class="fw-bold">PWD</h5>
                                </a>
                                <p class="text-muted">People with permanent disability.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 pt-4 mt-4">
                        <a href="https://lawphil.net/statutes/repacts/ra2000/ra_8972_2000.html">
                        <div class="service-box text-center shadow">
                            <div class="service-icon p-2">
                                <div>
                                    <img src="{{ asset('dist/images2/service/solo.png') }}" style="width: 100px; height:100px;" alt="">
                               </div>
                                {{--<i class="mdi mdi-google-nearby text-gradiant f-30"></i>--}}
                            </div>

                            <div class="service-content mt-3">
                                <a href="">
                                    <h5 class="fw-bold">Solo Parents</h5>
                                </a>
                                <p class="text-muted">Citizens who are solo parenting their child or children.</p>
                            </div>
                        </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end section -->

        <!-- contact section -->
        <section class="section contact overflow-hidden" id="_contact">
            <!-- start container -->
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="title text-center mb-5">
                            <h6 class="mb-0 fw-bold text-primary">Contact Us</h6>
                            <h2 class="f-40">Get In Touch!</h2>
                            <p class="text-muted">For concerns and issues regarding the process  you may contact us via email, sms or call. </p>

                        </div>
                    </div>
                </div>

                <div class="row align-items-center">
                    <div class="col-lg-5">
                        <div class="contact-box">
                            <div class="mb-4">
                                <h4 class=" fw-semibold mb-1">Need Support !</h4>
                                <p class="text-muted">Contact us for a quote ,for the better improvement.</p>
                            </div>

                            <div class="custom-form mt-4 ">
                                <form method="post" name="myForm" onsubmit="return validateForm()">
                                    <p id="error-msg" style="opacity: 1;">
                                        <!-- <div class="alert alert-warning">*Please enter a Name*</div> -->
                                    </p>

                                    <div id="simple-msg"></div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <input name="name" id="name" type="text" class="form-control contact-form"
                                                    placeholder="Your name">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <input name="email" id="email" type="email"
                                                    class="form-control contact-form" placeholder="Your email">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group mt-2">
                                                <input type="text" class="form-control contact-form" id="subject"
                                                    placeholder="Your Subject..">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group mt-2">
                                                <textarea name="comments" id="comments" rows="4"
                                                    class="form-control contact-form h-auto"
                                                    placeholder="Your message..."></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row my-2">
                                        <div class="col-lg-12 d-grid">
                                            <input type="submit" id="submit" name="send"
                                                class="submitBnt btn btn-rounded btn-primary" value="Send Message">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>


                    </div>
                    <div class="col-lg-7">
                        <div class="m-5">
                            <div class="position-relative">
                                <div class="contact-map">
                                    <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4710.313102282012!2d122.07342756191622!3d6.904305259180897!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x32506a076cb5b119%3A0x2a95c5fd6a1a19c1!2sZamboanga%20City%20Hall!5e0!3m2!1sfil!2sph!4v1671505989306!5m2!1sfil!2sph" 
                                        width="550" height="450" style="border:0;" allowfullscreen=""
                                        loading="lazy"></iframe>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>


                <div class="row mt-4">
                    <div class="col-md-4">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <span class="material-symbols-outlined">
                                    location_on
                                    </span>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h5 class="mb-1">Location</h5>
                                <p class="f-14 mb-0 text-muted">Computer Services Division Office </p>
                                <h6>City Hall Zamboanga City</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="d-flex align-items-center mt-4 mt-lg-0">
                            <div class="flex-shrink-0">
                                <span class="material-symbols-outlined">
                                    mail
                                </span>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h5 class="mb-1">Email</h5>
                                <p class="f-14 mb-0 text-muted">Email:ZamboangaCity@gmail.com</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="d-flex align-items-center mt-4 mt-lg-0">
                            <div class="flex-shrink-0">                             
                                <span class="material-symbols-outlined">
                                    call
                                </span>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h5 class="mb-1">Phone</h5>
                                <p class="f-14 mb-0 text-muted">098765432112</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end container -->
        </section>
        <!-- end section -->


        <!-- footer section -->
        <section class="">
            <!-- Footer -->
            <footer class="text-center text-white" style="background-color: #242F9B; height:60px;">
            <!-- Grid container -->
            <div class="container p-4 pb-0">
                <!-- Section: CTA -->
                    <section class="">
                    <p class="d-flex justify-content-center align-items-center">
                        <span class="me-3"></span>
                    </p>
                    </section>
                </div>
            </footer>
        </section>

    
        <!-- end footer -->

        <!--Bootstrap Js-->
        <script src="{{ asset('dist/js2/bootstrap.bundle.min.js') }}"></script> 

        <!-- Slider Js -->
        <script src="{{ asset('dist/js2/tiny-slider.js') }}"></script>
        <script src="{{ asset('dist/js2/swiper.min.js') }}"></script>

        <!-- <script src="js/smooth-scroll.polyfills.min.js"></script> -->

        <!-- counter -->
        <!-- <script src="js/counter.init.js"></script> -->

        <!-- App Js -->
        <script src="{{ asset('dist/js2/app.js') }}"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
        <script src="http://parsleyjs.org/dist/parsley.js"defer></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        <script>
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            })
        </script>

        <script>
            var slider = tns({
                container: '.client-slider',
                loop: true,
                autoplay: true,
                mouseDrag: true,
                controls: false,
                navPosition: "bottom",
                nav: false,
                autoplayTimeout: 5000,
                speed: 900,
                center: false,
                animateIn: "fadeIn",
                animateOut: "fadeOut",
                controlsText: ['&#8592;', '&#8594;'],
                autoplayButtonOutput: false,
                gutter: 30,
                responsive: {

                    992: {
                        gutter: 30,
                        items: 4
                    },

                }
            });

        </script>

    <?php

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

        if (isset($_SESSION['Error']) == 'Error') 
            {
                ?>
                <script>
                    swal({
                        
                            title: "Registered",
                            text: "You are already a registered citizen!",
                            icon: "error",
                            button: "ok",
                        })
                    
                    
                    </script>
                <?php
                unset($_SESSION['Error']);
            }
    
    
    ?>


    </body>

</html>