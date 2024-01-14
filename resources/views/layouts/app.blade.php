<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> F1Registration</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
    @vite('resources/css/app.css')
</head>
<body>

<div id="app">
    <nav class="header">
        <div class="container">
            <a href="/">
            <img class="nav-logo" src="{{ asset('images/F1.png') }}" alt="F1 Logo" height="30">

            </a>
            <div class="nav-items">
                <ul>
                    <li class="item1">
                        <a class="nav-link"  href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="item2">
                        <a class="nav-link" href="{{ url('/leaderboards') }}">Leaderboards</a>
                    </li>
                    <li class="item3">
                        <a class="nav-link" href="{{ url('/contact') }}">Contact</a>
                    </li>
                </ul>
            </div>

        </div>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="nav">
                <li class="nav-item dropdown">
                    <button class="dropbtn">...</button>
                    <div class="drop-content">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            @endif
                            @if (Route::has('register'))
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            @endif
                        @else
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        @endguest
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</div>
<main class="py-4">
    @yield('content')
</main>
<footer>
    <div class="footer-logo">
        <img src="images/f1registration.png" alt="logo" class="footer-logo-img">
    </div>
    <div class="footer-menu">
        <h3>Meer zien?</h3>
        <ul>
            <li><a href="/leaderboards">Leaderboards</a></li>
            <li><a href="#">De regels</a></li>
            <li><a href="#">Github</a></li>
            <li><a href="/contact">Contact ons</a></li>

        </ul>
    </div>
</footer>

</body>
</html>
