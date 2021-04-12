<?php
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CartController;
$total = 0;
if (Auth::check()) {
$total = CartController::cartItem();
}
?>


<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Digital Food</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/css/jquery-ui.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="row">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="{{ route('home') }}">Digital Food</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                    aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('home') }}">Home <span
                                    class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('menus') }}">Shop</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('myorder') }}">My Order</a>
                        </li>
                    </ul>
                </div>
                <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
                    <ul class="navbar-nav ml-auto">
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
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                    <a class="dropdown-menu" href="{{ route('user.profile', Auth::user()->id) }}"
                                        onclick="event.preventDefault();
                                            document.getElementById('user-profile').submit();">
                                        {{ __('Profile') }}
                                    </a>
                                    <form id="user-profile" action="{{ route('user.profile', Auth::user()->id) }}"
                                        method="get" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            @endguest
                            <a href="{{ route('cartlist') }}" class="btn btn-info btn-lg"> Shopping Cart
                                <span class="glyphicon glyphicon-shopping-cart">({{ $total }})</span>
                            </a>
                        </ul>
                </div>


                
        </div>
        </nav>
    </div>
    </div>
    <!-- Header Section End -->
    <main class="py-4">
        @yield('frontend')
    </main>

    <!-- Footer Section Begin -->
    <footer>
        <div class="container">
            <div class="row">
                <div class=" col-md-4">
                    <div class="footer__about">
                        <h4>
                            <a href="{{ route('home') }}">Digital Food</a>
                        </h4>
                        <ul>
                            <li>Address: Devkota sadak ,Baneshwor</li>
                            <li>Phone: 9866951623</li>
                            <li>
                                <spam>Email: applet@apexcollege.edu.np</spam>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 ">
                    <h6>Useful Links</h6>
                    <ul>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">About Our Shop</a></li>
                        <li><a href="#">Secure Shopping</a></li>
                        <li><a href="#">Delivery infomation</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Our Sitemap</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <div class="footer__copyright">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3532.5935373620614!2d85.33578537404533!3d27.698954904849987!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xaf36b9b58903050f!2sAPEX%20COLLEGE!5e0!3m2!1sen!2snp!4v1617705558788!5m2!1sen!2snp"
                            width="600" height="250" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Js Plugins -->
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('frontend/js/mixitup.min.js') }}"></script>
    <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/js/main.js') }}"></script>





</body>

</html>
