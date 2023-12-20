<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir='rtl'>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} @yield('title', '')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/app.css'])

    <style>
        .btn-delete {
            background: url("/images/trash.svg");
            background-repeat: no-repeat;
            background-size: 1.1rem 1.1rem;
            padding-bottom: 0px;
            padding-top: 0px;
            padding-left: 8px;
            border: 0px;
            outline: none;
        }
        .center-1{
            /* border: 5px solid; */
            width:100%;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 10px;
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-primary shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/projects') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                {{-- <img class='user-image' src="{{ 'http://myprojects.test/storage/users/' . array_reverse(explode("/" , asset('/storage/app/'. auth()->user()->image)))[0] }}"> --}}
                {{-- {{asset('storage')}} --}}
                <img class='user-image' src=" 
                @if((array_reverse(explode("/" , asset('/storage/app/'. auth()->user()->image)))[0])!= 'default.png')
                {{-- {{ 'http://myprojects.test/storage/users/' . array_reverse(explode("/" , asset('/storage/app/'. auth()->user()->image)))[0] }} --}}
                {{ asset('storage/users/' . array_reverse(explode("/" , asset('/storage/app/'. auth()->user()->image)))[0]) }}
                 @else 
                 {{-- {{'http://myprojects.test/images/users/default.png'  }}  --}}
                 {{asset('images/users/default.png')  }} 
                 @endif ">
                {{-- <?php echo array_reverse(explode("/" , asset('/storage/app/'. auth()->user()->image)))[0]; ?> --}}
                {{-- <?php echo($arr)?> --}}
                                            </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item text-right" href="/profile">الملف الشخصي</a>
                                    <a class="dropdown-item text-right" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                        {{ __('تسجيل الخروج') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>
