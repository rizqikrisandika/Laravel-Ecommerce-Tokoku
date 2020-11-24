<!doctype html>
<html lang="en">

<head>
    <title>@yield('title')</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('assets/style/stylesheet.css') }}">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm mb-5">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home.index') }}"><h3 class="font-weight-bold">Tokoku.</h3></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="nav-right">
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-item nav-link {{ request()->is('/login') ? 'active' : '' }}" href="{{ route('daftar.index') }}">Daftar</a>
                        <a class="nav-item nav-link {{ request()->is('/register') ? 'active' : '' }}" href="{{ route('masuk.index') }}">Masuk</a>
                        <a class="nav-item nav-link {{ request()->is('/login') ? 'active' : '' }}" href="{{ route('daftar.index') }}">Profil</a>
                        <a class="nav-item nav-link {{ request()->is('/register') ? 'active' : '' }}" href="{{ route('masuk.index') }}">Keranjang</a>
                        <a class="nav-item nav-link {{ request()->is('/register') ? 'active' : '' }}" href="{{ route('keluar.akun') }}">Keluar</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    @yield('body')


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

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>
