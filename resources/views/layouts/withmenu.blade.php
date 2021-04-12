<?php 
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CartController;
$total=0;
if (Auth::check()) {
  $total= CartController::cartItem();
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
    <link rel="stylesheet" href="frontend/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="frontend/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="frontend/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="frontend/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="frontend/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="frontend/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="frontend/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="frontend/css/style.css" type="text/css">
</head>

<body>


    <!-- Humberger Begin -->

    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                <h4>
                    <a href="http://">Digital Food</a>
                </h4>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="./index.html">Home</a></li>
                            <li><a href="./shop-grid.html">Shop</a></li>
                            <li><a href="#">Pages</a>
                                <ul class="header__menu__dropdown">
                                    <li><a href="./shop-details.html">Shop Details</a></li>
                                    <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                                    <li><a href="./checkout.html">Check Out</a></li>
                                    <li><a href="./blog-details.html">Blog Details</a></li>
                                </ul>
                            </li>
                            <li><a href="./blog.html">Blog</a></li>
                            <li><a href="./contact.html">Contact</a></li>
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
                            <li class="header__menu__dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="header__menu__dropdown" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>


								
								<a class="header__menu__dropdown" href="{{ route('user.profile',Auth::user()->id) }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('user-profile').submit();">
                                        {{ __('Profile') }}
                                    </a>


									

                                    <form id="user-profile" action="{{ route('user.profile',Auth::user()->id) }}" method="get" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul> 
                        <div class="col-lg-3">
                            <div class="header__cart">
                                <ul>
                                    <li><a href="{{route('cartlist')}}"><i class="fa fa-shopping-bag"></i> <span>{{$total}}</span></a></li>
                                </ul>
                            </div>
                        </div>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All departments</span>
                        </div>
                        @if(isset($categories))
                        @foreach($categories as $category)
                        <ul>
                            <li><a href="#">{{$category->title}}</a></li>
                        </ul>
                        @endforeach
                        @endif
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">
                                <div class="hero__search__categories">
                                    All Categories
                                    <span class="arrow_carrot-down"></span>
                                </div>
                                <input type="text" placeholder="What do yo u need?">
                                <button type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>9866951623</h5>
                                <span>support 24/7 time</span>
                            </div>
                        </div>
                    </div>
                <main class="py-4">
                    @yield('withmenu')
                </main>
                </div>
            </div>
        </div>

    </section>
    <!-- Hero Section End -->

   




    <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <h4>
                            <a href="http://">Digital Food</a>
                        </h4>
                        <ul>
                            <li>Address: Devkota sadak ,Baneshwor</li>
                            <li>Phone: 9866951623</li>
                            <li> <spam>Email: applet@apexcollege.edu.np</spam></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <h6>Useful Links</h6>
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">About Our Shop</a></li>
                            <li><a href="#">Secure Shopping</a></li>
                            <li><a href="#">Delivery infomation</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Our Sitemap</a></li>
                        </ul>
                        <ul>
                            <li><a href="#">Who We Are</a></li>
                            <li><a href="#">Our Services</a></li>
                            <li><a href="#">Projects</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Innovation</a></li>
                            <li><a href="#">Testimonials</a></li>
                        </ul>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <div class="footer__copyright__text"><p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="apexcollege.edu.np" target="_blank">Major project</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p></div>
                        <!-- <div class="footer__copyright__payment"><img src="img/payment-item.png" alt=""></div> -->
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="frontend/js/jquery-3.3.1.min.js"></script>
    <script src="frontend/js/bootstrap.min.js"></script>
    <script src="frontend/js/jquery.nice-select.min.js"></script>
    <script src="frontend/js/jquery-ui.min.js"></script>
    <script src="frontend/js/jquery.slicknav.js"></script>
    <script src="frontend/js/mixitup.min.js"></script>
    <script src="frontend/js/owl.carousel.min.js"></script>
    <script src="frontend/js/main.js"></script>



</body>

</html>