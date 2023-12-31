@extends('../layout/' . $layout)

@section('head')
    <title>Login | Social Welfare Registration and Benefits System</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
@endsection

@section('content')


<form class='card mt-5' action="{{ route('login.check') }}" method="post" id="loginForm">
    @csrf
    <div class="container sm:px-10">
        <div class="block xl:grid grid-cols-2 gap-4">
            <!-- BEGIN: Login Info -->
            <div class="hidden xl:flex flex-col min-h-screen d-flex justify-content-center text-white ">
                <a href="{{ url('/main') }}" class="-intro-x flex items-center pt-5">
                    {{--<img alt="image" class="w-8" src="{{ asset('dist/images/login-bg3.svg') }}">
                    <span class="text-white text-lg ml-3">--}}
                        <span class="material-symbols-outlined">
                            arrow_back
                        </span>
                        <h1> H O M E P A G E</h1>
                    </span>
                </a>
                <div class="my-auto">
                    <img alt="Zamboanga City Seal" class="-intro-x w-1/2 -mt-16" src="{{ asset('dist/images/login-bg.svg') }}">
                    <div class="-intro-x text-white font-medium text-4xl leading-tight mt-10">Social Welfare Registration<br> And Benefits System</div>
                    <div class="-intro-x mt-5 text-lg text-white text-opacity-70 dark:text-slate-400">Computer Services Division</div>
                </div>
            </div>
            <!-- END: Login Info -->
            <!-- BEGIN: Login Form -->
            <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
                <div class="my-auto mx-auto xl:ml-20 bg-white dark:bg-darkmode-600 xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                    <div style="display:flex; height:180px; justify-content:center;" class="mb-5">
                        <img src="{{ asset('dist/images/seal.png') }}" alt="">
                    </div>
                    <h3 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-center m-5">Sign In</h3>
                    <div class="intro-x mt-2 text-slate-400 xl:hidden text-center"></div>
                    <div class="intro-x mt-8">
                        <form id="login-form">
                            <input name="email" id="email" type="text" class="intro-x login__input form-control py-3 px-4 block" placeholder="Email" required>
                            <div id="error-email" class="login__input-error text-danger mt-2"></div>
                            <input name="password" id="password" type="password" class="intro-x login__input form-control py-3 px-4 block mt-4" placeholder="Password" required>
                            <div id="error-password" class="login__input-error text-danger mt-2"></div>
                        </form>
                    </div>
                    <div class="intro-x flex text-slate-600 dark:text-slate-500 text-xs sm:text-sm mt-4">
                        <div class="flex items-center mr-auto">
                        </div>
                    </div>
      
                    <div class="intro-x mt-5 xl:mt-8 text-center xl:text-center ">
                            <button id="btn-login" class="btn btn-primary py-3 px-4 w-full xl:w-32 xl:mr-3 align-top">Login</button>
                    </div>
                </div>
            </div>
            <!-- END: Login Form -->
        </div>
    </div>
</form>
@endsection


