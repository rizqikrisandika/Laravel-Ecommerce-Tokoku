<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
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
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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

        <main class="py-4">
            @yield('content')
        </main>

        <footer class="bg-white p-3 mt-5">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-3 col-lg-3 mt-5">
                        <div class="footer-wrapper">
                            <a class="navbar-brand" href="{{ route('home.index') }}"><h3 class="font-weight-bold">Tokoku.</h3></a>
                            <p>©2020 Rizqi Krisandika</p>
                        </div>
                    </div>

                    <div class="col-12 col-md-3 col-lg-3 mt-5">
                        <div class="footer-wrapper">
                            <h4>Menu</h4>
                            <a class="nav-item nav-link {{ request()->is('/register') ? 'active' : '' }}" href="#">Beranda</a>
                            <a class="nav-item nav-link {{ request()->is('/register') ? 'active' : '' }}" href="#">Produk</a>
                            <a class="nav-item nav-link {{ request()->is('/register') ? 'active' : '' }}" href="#">Tentang Kami</a>
                            <a class="nav-item nav-link {{ request()->is('/register') ? 'active' : '' }}" href="#">Contact</a>
                        </div>
                    </div>

                    <div class="col-12 col-md-3 col-lg-3 mt-5">
                        <div class="footer-wrapper">
                            <h4>Ikuti Kami</h4>
                            <a class="nav-item nav-link {{ request()->is('/register') ? 'active' : '' }}" href="#">Facebook</a>
                            <a class="nav-item nav-link {{ request()->is('/register') ? 'active' : '' }}" href="#">Twitter</a>
                            <a class="nav-item nav-link {{ request()->is('/register') ? 'active' : '' }}" href="#">Instagram</a>
                        </div>
                    </div>

                    <div class="col-12 col-md-3 col-lg-3 mt-5">
                        <div class="footer-wrapper">
                            <h4>Info Terbaru</h4>
                        </div>
                    </div>

                </div>
            </div>
        </footer>
    </div>
</body>
</html>