<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="icon" href="{{ asset('img/techno-jobs-logo.png') }}" type="image/png">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <link href="/css/main.css" rel="stylesheet">

    <!-- Font Awesome cdn -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center gap-1" href="@isset($route) {{ url('/admin') }} @else  {{ url('/') }}  @endisset">
                    <img src="{{ asset('img/techno-jobs-logo.png') }}" alt="logo" width="25px">
                    <span class="fw-bold">{{ config('app.name', 'Laravel') }}</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @isset($route)
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link fw-bold" href="{{ route('admin.login-view') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif
                            @else
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link fw-bold" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif
                            @endisset

                            @isset($route)
                                {{-- @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link fw-bold" href="{{ route('admin.register-view') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif --}}
                            @else
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link fw-bold" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @endisset
                        @else
                            <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
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

        <main>
            @yield('content')
        </main>

        <footer>&#169 Copyright {{ date('Y') }} TechnoJobs</footer>
    </div>
</body>
</html>
