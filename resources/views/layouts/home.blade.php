<?php
$username = DB::table('users')
            ->where('id','=',Auth::id())
            ->pluck('name')->first();
?>
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('Fyntune', 'Fyntune') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="icon" href="{{url('dist/img/icon.png')}}" type="image/x-icon">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a href="/" class="brand-link">
                    <div >
                        <img src="{{url('dist/img/icon.png')}}" alt="FyntuneLogo" class="brand-image" style="height: 27px;width:32px;">
                        <img  src="{{url('dist/img/fyntunelogo.png')}}" alt="FyntuneLogo" class="brand-image" style="height: 27px;width:135px;margin-left: -4px;">
                    </div>
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
                            <!-- @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif -->
                        @else
                           
                            <div>
                                <a href="{{ url('/home') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('telescope-form').submit();">
                                    {{ __('Home') }}
                                </a>&nbsp;
                                <form id="telescope-form" action="{{ url('/home') }}" class="d-none">
                                    @csrf
                                </form>
                                <a href="{{ route('login') }}">{{ __('Login') }}</a>
                                &nbsp;
                                <form id="telescope-form" action="{{ route('login') }}" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
