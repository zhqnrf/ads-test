<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Author: HiBootstrap, Category: Tourism, Multipurpose, HTML, SASS, Bootstrap" />

    <title>Alfa Travel</title>

    <link rel="stylesheet" href="{{ asset('travel/assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('travel/assets/css/fontawesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('travel/assets/css/boxicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('travel/assets/css/animate.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('travel/assets/css/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('travel/assets/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('travel/assets/css/magnific-popup.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('travel/assets/css/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('travel/assets/css/meanmenu.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('travel/assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('travel/assets/css/responsive.css') }}" />
    <link rel="stylesheet" href="{{ asset('travel/assets/css/theme-dark.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">


    <link rel="icon" href="travel/assets/img/logo.png" type="image/png" />
</head>

<body>

    <div id="loading">
        <div class="loader"></div>
    </div>

    <header class="header-area">

        <div class="top-header-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-12 col-lg-12">
                        <div class="side-option">
                            <div class="item">
                                @auth
                                    @if (Auth::user()->role == 'admin')
                                        <a href="{{ route('dashboard') }}" class="btn btn-secondary m-2">
                                            Dashboard <i class="bx bx-log-in-circle"></i>
                                        </a>
                                    @else
                                        <div class="dropdown m-2">
                                            <button class="btn btn-secondary dropdown-toggle" type="button"
                                                id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                                {{ Auth::user()->name ?? '' }} <i class="bx bx-log-in-circle"></i>
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="userDropdown">
                                                <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Edit
                                                        Profile</a></li>
                                                <li>
                                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                        Logout
                                                    </a>
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                        style="display: none;">
                                                        @csrf
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    @endif
                                @else
                                    <a href="{{ route('login') }}" class="btn btn-secondary m-2">
                                        Login <i class="bx bx-log-in-circle"></i>
                                    </a>
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="main-navbar-area">
            <div class="main-responsive-nav">
                <div class="container">
                    <div class="main-responsive-menu">
                        <div class="logo">
                            <a href="{{ route('home') }}">
                                <img src="travel/assets/img/logo.png" class="logo1" alt="Logo"
                                    style="height: 80px">
                                <img src="travel/assets/img/logo.png" class="logo2" alt="Logo"
                                    style="height: 80px">
                            </a>
                        </div>
                        <div class="cart responsive">
                            <a href="{{ route('cart') }}" class="cart-btn"><i class="bx bx-cart"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main-nav">
                <div class="container">
                    <nav class="navbar navbar-expand-md navbar-light">
                        <a class="navbar-brand" href="{{ route('home') }}">
                            <img src="travel/assets/img/logo.png" class="logo1" alt="Logo" style="height: 80px">
                            <img src="travel/assets/img/logo.png" class="logo2" alt="Logo" style="height: 80px">
                        </a>
                        <div class="collapse navbar-collapse mean-menu">
                            <ul class="navbar-nav ms-auto">
                                <li class="nav-item">
                                    <a href="{{ url('') }}"
                                        class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('destinasi') }}"
                                        class="nav-link {{ request()->routeIs('destinasi') ? 'active' : '' }}}">Destination</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('order') }}"
                                        class="nav-link {{ request()->routeIs('order') ? 'active' : '' }}}">Booking</a>
                                </li>
                            </ul>
                            <div class="cart">
                                <a href="{{ route('cart') }}" class="cart-btn"><i class="bx bx-cart"></i>
                                </a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>

    </header>
