<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin panel</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <style>
        html,body {
            height: 100%;
        }
        .bg-dark-blue {
            background-color: #051835;
        }
        .dark-blue2 {
            color: #102C58;
        }
        .bg-dark-blue2 {
            background-color: #102C58;
        }
        .bg-light-gray {
            background-color: #edf1ff;
        }
        .border-b {
            border-bottom: 1px solid black;
        }
        .link:hover {
            background-color: #102258;
        }
        .fa-power-off:hover {
            color: darkred;
        }
    </style>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <div class="container-fluid">
            <div class="row">
                <div class="col-2 py-3 d-flex text-center justify-content-center border-right-0 bg-dark-blue">
                    <div class="font-weight-bold text-white h5 my-auto">
                        Quotes Admin Panel
                    </div>
                </div>
                <div class="col-10 py-3 d-flex text-right justify-content-end border border-top-0 border-right-0">
                    <div class="font-weight-bold text-white h3 my-auto">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                            <i class="fas fa-power-off dark-blue2"></i>
                         </a>

                         <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                             @csrf
                         </form>
                        
                    </div>
                    
                </div>
            </div>
            <div class="row h-100">
                <div class="col-2 d-flex p-0 bg-dark-blue2 flex-column vh-100 sticky-top">
                    <a href="{{ route('home') }}" class="d-flex w-100 text-white btn link">
                        <div class="col-4 py-1 px-4 d-flex justify-content-center">
                            <div class="my-auto">
                                <i class="fas fa-tachometer-alt h4 pt-2"></i>
                            </div>
                        </div>
                        <div class="col-8 py-1 px-2 d-flex">
                            <div class="my-auto">
                                Dashboard
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('quotes') }}" class="d-flex w-100 text-white btn link">
                        <div class="col-4 py-1 px-4 d-flex justify-content-center">
                            <div class="my-auto">
                                <i class="fas fa-quote-right h4 pt-2"></i>
                            </div>
                        </div>
                        <div class="col-8 py-1 px-2 d-flex">
                            <div class="my-auto">
                                Quotes
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('customers') }}" class="d-flex w-100 text-white btn link">
                        <div class="col-4 py-1 px-4 d-flex justify-content-center">
                            <div class="my-auto">
                                <i class="fas fa-users h4 pt-2"></i>
                            </div>
                        </div>
                        <div class="col-8 py-1 px-2 d-flex">
                            <div class="my-auto">
                                Customers
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('settings') }}" class="d-flex w-100 text-white btn link">
                        <div class="col-4 py-1 px-4 d-flex justify-content-center">
                            <div class="my-auto">
                                <i class="fas fa-cogs h4 pt-2"></i>
                            </div>
                        </div>
                        <div class="col-8 py-1 px-2 d-flex">
                            <div class="my-auto">
                                Settings
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-10 bg-light-gray">
                    @yield('content')
                </div>
            </div>
        </div>
        {{-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Quotes
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav> --}}
    </div>
    <script src="https://kit.fontawesome.com/28657fbc4a.js" crossorigin="anonymous"></script>
</body>
</html>
