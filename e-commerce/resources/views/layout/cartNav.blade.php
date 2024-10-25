<!DOCTYPE html>
<html lang="en-US">
	<head>
        <title>Shopping cart</title>
        <base href="{{ url('/') }}/" target="_self">

        <!-- Fonts -->
        <link href='https://fonts.googleapis.com/css?family=Poppins:300,700' rel='stylesheet' type='text/css'>

        <!-- Style Sheets -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> --}}

        <link rel="stylesheet" type="text/css" href="{{ asset('font/font-awesome/css/font-awesome.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">
        <link rel="stylesheet" href="{{ asset('js/owl-carousel/owl.carousel.css') }}">
        <link rel="stylesheet" href="{{ asset('js/owl-carousel/owl.theme.css') }}">
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <!-- Favicon -->
        <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">
        <!-- META TAGS -->
        <meta name="viewport" content="width=device-width" />
    </head>
	<body id="bd" class="cms-index-index3 header-style3 header-prd sns-shopping-cart cms-simen-home-page-v2 default cmspage">
    @php
    // Fetch the cart for the authenticated user
    $cart = \App\Models\Cart::where('user_id', auth()->id())->first();

    // Initialize total amount and cart data collection
    $totalAmount = 0;
    $cartData = collect();

    // Check if the cart exists and fetch the products
    if ($cart) {
        $cartData = $cart->products()->wherePivotNull('deleted_at')->get();

        // Calculate the total amount
        $totalAmount = $cartData->sum(function ($product) {
            return $product->pivot->quantity * ($product->on_sale ? $product->price - ($product->price * $product->on_sale) : $product->price);
        });
    }
@endphp
        <div id="sns_wrapper">
<div id="sns_header" class="wrap">
    <div id="sns_header_full">
        <!-- Header Top -->
        <div class="sns_header_top">
            <div class="container">
                <div class="sns_module" style="clear: both">
                    <div class="header-setting">
                        <div class="module-setting">
                            {{-- <div class="mysetting language-switcher">
                                <div class="tongle">
                                    <img alt="" src="images/flag/english.png">
                                    <span>English</span>
                                </div>
                                <div class="content">
                                    <div class="language-switcher">
                                        <ul id="select-language">
                                            <li>
                                                <a  href="index.html">
                                                <img alt="" src="images/flag/english.png">
                                                <span>English</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="index2.html">
                                                <img alt="" src="images/flag/brazil.png">
                                                <span>Brazil</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="selected" href="index3.html">
                                                <img alt="" src="images/flag/france.png">
                                                <span>France</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="index4.html">
                                                <img alt="" src="images/flag/russian.png">
                                                <span>Russian</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="mysetting currency-switcher">
                                <div class="tongle">
                                    <span class="gfont"> USD </span>
                                </div>
                                <div class="content">
                                    <ul id="select-currency">
                                        <li>
                                            <a href="#"> EUR </a>
                                        </li>
                                        <li>
                                            <a class="selected" href="#"> USD </a>
                                        </li>
                                    </ul>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                    <div class="header-account">
                        <div class="myaccount">
                            <div class="tongle">
                                <i class="fa fa-user"></i>
                                <span>My account</span>
                                <i class="fa fa-angle-down"></i>
                            </div>
                            <div class="customer-ct content">
                                <ul class="links">
                                    @if (Auth::user())

                                    @if (Auth::user()->role_id == 2)

                                    <li class="first">
                                        <a class="top-link-dashboard" title="My Dashboard" href="{{ route('sellerDashboard') }}"> My Dashboard</a>
                                    </li>
                                    @endif
                                    @endif
                                    <li class="first">
                                        <a class="top-link-myaccount" title="My Account" href="{{ route('userProfile') }}">My Profile</a>
                                    </li>
                                    <li>
                                        {{-- <a class="top-link-wishlist" title="My Wishlist" href="#">My Wishlist</a> --}}
                                    </li>
                                    {{-- <li>
                                        <a class="top-link-checkout" title="Checkout" href="#">Checkout</a>
                                    </li> --}}
                                    <li class=" last">
                                        @if (Auth::user())
                                            <a class="top-link-login" title="Log In" href="{{ route('logout') }}">logout</a>
                                        @else
                                            <a class="top-link-login" title="Log In" href="{{ route('loginRegister') }}">Login</a>
                                        @endif
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Menu -->
        <div id="sns_menu">
            <div class="container">
                <div class="row">
                    <div id="sns_header_logo" class="col-md-2 col-sm-3 col-xs-12">
                        <h1 id="logo" class="responsv">
                            <a href="index3.html" title="Magento Commerce">
                             <img alt="" src="images/logo.png">
                            </a>
                        </h1>

                    </div>
                    <div class="sns_mainmenu col-md-9 col-sm-8 col-xs-12">
                        <div id="sns_mainnav">
                            <div id="sns_custommenu" class="visible-md visible-lg">
                                <ul class="mainnav">
                                    <li class="level0 custom-item {{ request()->routeIs('home') ? 'active' : '' }}">
                                        <a class="menu-title-lv0 pd-menu116" href="{{ route('home') }}" target="_self">
                                            <span class="title">Home</span>
                                        </a>
                                    </li>

                                    <li class="level0 custom-item {{ request()->routeIs('productList') ? 'active' : '' }}">
                                        <a class="menu-title-lv0" href="{{ route('productList') }}">
                                            <span class="title">Shop</span>
                                        </a>
                                    </li>

                                    <li class="level0 custom-item {{ request()->is('contact') ? 'active' : '' }}">
                                        <a class="menu-title-lv0" href="{{ route('contactus') }}"> <!-- Update this with the correct route -->
                                            <span class="title">Contact Us</span>
                                        </a>
                                    </li>
{{--
                                    <li class="level0 custom-item {{ request()->is('feedback') ? 'active' : '' }}">
                                        <a class="menu-title-lv0" href="index3-blog.html"> <!-- Update this with the correct route -->
                                            <span class="title">Feedback</span>
                                        </a>
                                    </li>

                                    <li class="level0 custom-item {{ request()->is('blog') ? 'active' : '' }}">
                                        <a class="menu-title-lv0" href="index3-blog.html"> <!-- Update this with the correct route -->
                                            <span class="title">Blog</span>
                                        </a>
                                    </li> --}}


                                    {{-- <li class="level0 nav-4 no-group drop-submenu last parent">
                                        <a class=" menu-title-lv0" href="#">
                                            <span class="title">Mobile</span>
                                        </a>
                                        <div class="wrap_submenu">
                                            <ul class="level0">
                                                <li class="level1 nav-3-1 first">
                                                    <a class=" menu-title-lv1" href="#">
                                                        <span class="title">Cfg products</span>
                                                    </a>
                                                </li>
                                                <li class="level1 nav-3-2">
                                                    <a class=" menu-title-lv1" href="#">
                                                        <span class="title">Product types</span>
                                                    </a>
                                                </li>
                                                <li class="level1 nav-3-3 parent">
                                                    <a class=" menu-title-lv1" href="#">
                                                        <span class="title">Bicycle</span>
                                                    </a>
                                                    <div class="wrap_submenu">
                                                        <ul class="level1">
                                                            <li class="level2 nav-3-2-1 first">
                                                                <a class=" menu-title-lv2" href="#">
                                                                    <span class="title">Lifestyle</span>
                                                                </a>
                                                            </li>
                                                            <li class="level2 nav-3-2-2">
                                                                <a class=" menu-title-lv2" href="#">
                                                                    <span class="title">Jackets</span>
                                                                </a>
                                                            </li>
                                                            <li class="level2 nav-3-2-3 last">
                                                                <a class=" menu-title-lv2" href="#">
                                                                    <span class="title">Scarves</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </li>
                                                <li class="level1 nav-3-4">
                                                    <a class=" menu-title-lv1" href="#">
                                                        <span class="title">Cosmetics</span>
                                                    </a>
                                                </li>
                                                <li class="level1 nav-3-5 last">
                                                    <a class=" menu-title-lv1" href="#">
                                                        <span class="title">Bras</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li> --}}



                                    </ul>
                            </div>
                            <div id="sns_mommenu" class="menu-offcanvas hidden-md hidden-lg">
                                <span class="btn2 btn-navbar leftsidebar" style="display: inline-block;">
                                    <i class="fa fa-align-left"></i>
                                    <span class="overlay"></span>
                                </span>
                                <span class="btn2 btn-navbar offcanvas">
                                    <i class="fa fa-align-justify"></i>
                                    <span class="overlay"></span>
                                </span>
                                <span class="btn2 btn-navbar rightsidebar">
                                    <i class="fa fa-align-right"></i>
                                    <span class="overlay"></span>
                                </span>
                                <div id="menu_offcanvas" class="offcanvas">
                                    <ul class="mainnav">
                                        <li class="level0 custom-item">
                                            <div class="accr_header">
                                                <a class="menu-title-lv0" href="{{ route('home') }}">
                                                    <span class="title">Home</span>
                                                </a>
                                            </div>
                                        </li>

                                        <li class="level0 nav-5 first active">
                                            <div class="accr_header">
                                                <a class=" menu-title-lv0" href="index3-listing-grid.html">
                                                    <span>Funiture</span>
                                                </a>
                                            </div>
                                        </li>

                                        <li class="level0 nav-6 parent">
                                            <div class="accr_header">
                                                <a class=" menu-title-lv0" href="#">
                                                    <span>All products</span>
                                                </a>
                                                <span class="btn_accor">

                                                </span>
                                            </div>
                                            <div class="accr_content" style="display: none;">
                                                <ul class="level0">
                                                    <li class="level1 nav-5-1 first parent">
                                                        <div class="accr_header">
                                                            <a class=" menu-title-lv1" href="#">
                                                                <span>Bags</span>
                                                            </a>
                                                            <span class="btn_accor">

                                                            </span>
                                                        </div>
                                                        <div class="accr_content" style="display: none;">
                                                            <ul class="level1">
                                                                <li class="level2 nav-5-1 first">
                                                                    <div class="accr_header">
                                                                        <a class=" menu-title-lv2" href="#">
                                                                            <span>Laptop</span>
                                                                        </a>
                                                                    </div>
                                                                </li>
                                                                <li class="level2 nav-5-2 parent">
                                                                    <div class="accr_header">
                                                                        <a class=" menu-title-lv2" href="#">
                                                                            <span>Dresses</span>
                                                                        </a>
                                                                        <span class="btn_accor">

                                                                        </span>
                                                                    </div>
                                                                    <div class="accr_content" style="display: none;">
                                                                        <ul class="level2">
                                                                            <li class="level3 nav-5-1-1 first">
                                                                                <div class="accr_header">
                                                                                    <a class=" menu-title-lv3" href="#">
                                                                                        <span>Briefs</span>
                                                                                    </a>
                                                                                </div>
                                                                            </li>
                                                                            <li class="level3 nav-5-1-2 last parent">
                                                                                <div class="accr_header">
                                                                                    <a class=" menu-title-lv3" href="#">
                                                                                        <span>Blog</span>
                                                                                    </a>
                                                                                    <span class="btn_accor">

                                                                                    </span>
                                                                                </div>
                                                                                <div class="accr_content" style="display: none;">
                                                                                    <ul class="level3">
                                                                                        <li class="level4 nav-5-1-1-1 first last">
                                                                                            <div class="accr_header">
                                                                                                <a class=" menu-title-lv4" href="#">
                                                                                                    <span>Bands</span>
                                                                                                </a>
                                                                                            </div>
                                                                                        </li>
                                                                                    </ul>
                                                                                </div>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </li>
                                                                <li class="level2 nav-5-3">
                                                                    <div class="accr_header">
                                                                        <a class=" menu-title-lv2" href="#">
                                                                            <span>Cosmetic</span>
                                                                        </a>
                                                                    </div>
                                                                </li>
                                                                <li class="level2 nav-5-4">
                                                                    <div class="accr_header">
                                                                        <a class=" menu-title-lv2" href="#">
                                                                            <span>Duffle</span>
                                                                        </a>
                                                                    </div>
                                                                </li>
                                                                <li class="level2 nav-5-5 last">
                                                                    <div class="accr_header">
                                                                        <a class=" menu-title-lv2" href="#">
                                                                            <span>Nightwear</span>
                                                                        </a>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                    <li class="level1 nav-5-2 parent">
                                                        <div class="accr_header">
                                                            <a class=" menu-title-lv1" href="#">
                                                                <span>Shirts</span>
                                                            </a>
                                                            <span class="btn_accor">

                                                            </span>
                                                        </div>
                                                        <div class="accr_content" style="display: none;">
                                                            <ul class="level1">
                                                                <li class="level2 nav-5-1-6 first">
                                                                    <div class="accr_header">
                                                                        <a class=" menu-title-lv2" href="#">
                                                                            <span>Tops</span>
                                                                        </a>
                                                                    </div>
                                                                </li>
                                                                <li class="level2 nav-5-1-7">
                                                                    <div class="accr_header">
                                                                        <a class=" menu-title-lv2" href="#">
                                                                            <span>Camis</span>
                                                                        </a>
                                                                    </div>
                                                                </li>
                                                                <li class="level2 nav-5-1-8">
                                                                    <div class="accr_header">
                                                                        <a class=" menu-title-lv2" href="#">
                                                                            <span>Helmet</span>
                                                                        </a>
                                                                    </div>
                                                                </li>
                                                                <li class="level2 nav-5-1-9">
                                                                    <div class="accr_header">
                                                                        <a class=" menu-title-lv2" href="#">
                                                                            <span>Lingerie</span>
                                                                        </a>
                                                                    </div>
                                                                </li>
                                                                <li class="level2 nav-5-1-10 last">
                                                                    <div class="accr_header">
                                                                        <a class=" menu-title-lv2" href="#">
                                                                            <span>Hair</span>
                                                                        </a>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                    <li class="level1 nav-5-3 parent">
                                                        <div class="accr_header">
                                                            <a class=" menu-title-lv1" href="#">
                                                                <span>Shoes</span>
                                                            </a>
                                                            <span class="btn_accor">

                                                            </span>
                                                        </div>
                                                        <div class="accr_content" style="display: none;">
                                                            <ul class="level1">
                                                                <li class="level2 nav-5-2-11 first">
                                                                    <div class="accr_header">
                                                                        <a class=" menu-title-lv2" href="#">
                                                                            <span>Leathers</span>
                                                                        </a>
                                                                    </div>
                                                                </li>
                                                                <li class="level2 nav-5-2-12">
                                                                    <div class="accr_header">
                                                                        <a class=" menu-title-lv2" href="#">
                                                                            <span>Rings</span>
                                                                        </a>
                                                                    </div>
                                                                </li>
                                                                <li class="level2 nav-5-2-13">
                                                                    <div class="accr_header">
                                                                        <a class=" menu-title-lv2" href="#">
                                                                            <span>Cocktail</span>
                                                                        </a>
                                                                    </div>
                                                                </li>
                                                                <li class="level2 nav-5-2-14">
                                                                    <div class="accr_header">
                                                                        <a class=" menu-title-lv2" href="#">
                                                                            <span>Gloves</span>
                                                                        </a>
                                                                    </div>
                                                                </li>
                                                                <li class="level2 nav-5-2-15 last">
                                                                    <div class="accr_header">
                                                                        <a class=" menu-title-lv2" href="#">
                                                                            <span>Clothing</span>
                                                                        </a>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                    <li class="level1 nav-5-4 last parent">
                                                        <div class="accr_header">
                                                            <a class=" menu-title-lv1" href="#">
                                                                <span>Shapewear</span>
                                                            </a>
                                                            <span class="btn_accor">

                                                            </span>
                                                        </div>
                                                        <div class="accr_content" style="display: none;">
                                                            <ul class="level1">
                                                                <li class="level2 nav-5-3-16 first">
                                                                    <div class="accr_header">
                                                                        <a class=" menu-title-lv2" href="#">
                                                                            <span>Hats</span>
                                                                        </a>
                                                                    </div>
                                                                </li>
                                                                <li class="level2 nav-5-3-17">
                                                                    <div class="accr_header">
                                                                        <a class=" menu-title-lv2" href="#">
                                                                            <span>Outerwear</span>
                                                                        </a>
                                                                    </div>
                                                                </li>
                                                                <li class="level2 nav-5-3-18">
                                                                    <div class="accr_header">
                                                                        <a class=" menu-title-lv2" href="#">
                                                                            <span>Novelty</span>
                                                                        </a>
                                                                    </div>
                                                                </li>
                                                                <li class="level2 nav-5-3-19">
                                                                    <div class="accr_header">
                                                                        <a class=" menu-title-lv2" href="#">
                                                                            <span>Footwear</span>
                                                                        </a>
                                                                    </div>
                                                                </li>
                                                                <li class="level2 nav-5-3-20 last">
                                                                    <div class="accr_header">
                                                                        <a class=" menu-title-lv2" href="#">
                                                                            <span>Sundresses</span>
                                                                        </a>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="level0 nav-7">
                                            <div class="accr_header">
                                                <a class=" menu-title-lv0" href="#">
                                                    <span>Shop</span>
                                                </a>
                                            </div>
                                        </li>


                                        <li class="level0 nav-8 last parent">
                                            <div class="accr_header">
                                                <a class=" menu-title-lv0" href="#">
                                                    <span>Mobile </span>
                                                </a>
                                                <span class="btn_accor">

                                                </span>
                                            </div>
                                            <div class="accr_content" style="display: none;">
                                                <ul class="level0">
                                                    <li class="level1 nav-7-1 first">
                                                        <div class="accr_header">
                                                            <a class=" menu-title-lv1" href="#">
                                                                <span>Cfg products</span>
                                                            </a>
                                                        </div>
                                                    </li>
                                                    <li class="level1 nav-7-2">
                                                        <div class="accr_header">
                                                            <a class=" menu-title-lv1" href="#">
                                                                <span>Product types</span>
                                                            </a>
                                                        </div>
                                                    </li>
                                                    <li class="level1 nav-7-3 parent">
                                                        <div class="accr_header">
                                                            <a class=" menu-title-lv1" href="#">
                                                                <span>Bicycle</span>
                                                            </a>
                                                            <span class="btn_accor">

                                                            </span>
                                                        </div>
                                                        <div class="accr_content" style="display: none;">
                                                            <ul class="level1">
                                                                <li class="level2 nav-7-2-1 first">
                                                                    <div class="accr_header">
                                                                        <a class=" menu-title-lv2" href="#">
                                                                            <span>Lifestyle</span>
                                                                        </a>
                                                                    </div>
                                                                </li>
                                                                <li class="level2 nav-7-2-2">
                                                                    <div class="accr_header">
                                                                        <a class=" menu-title-lv2" href="#">
                                                                            <span>Jackets</span>
                                                                        </a>
                                                                    </div>
                                                                </li>
                                                                <li class="level2 nav-7-2-3 last">
                                                                    <div class="accr_header">
                                                                        <a class=" menu-title-lv2" href="#">
                                                                            <span>Scarves</span>
                                                                        </a>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                    <li class="level1 nav-7-4">
                                                        <div class="accr_header">
                                                            <a class=" menu-title-lv1" href="#">
                                                                <span>Cosmetics</span>
                                                            </a>
                                                        </div>
                                                    </li>
                                                    <li class="level1 nav-7-5 last">
                                                        <div class="accr_header">
                                                            <a class=" menu-title-lv1" href="#">
                                                                <span>Bras</span>
                                                            </a>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>

                                        <li class="level0 custom-item">
                                            <div class="accr_header">
                                                <a class="menu-title-lv0" href="index3-404.html">
                                                    <span class="title">Offer</span>
                                                </a>
                                            </div>
                                        </li>
                                        <li class="level0 custom-item">
                                            <div class="accr_header">
                                                <a class="menu-title-lv0" href="#">
                                                    <span class="title">Deal</span>
                                                </a>
                                            </div>
                                        </li>
                                        <li class="level0 custom-item">
                                            <div class="accr_header">
                                                <a class="menu-title-lv0" href="index3-blog.html">
                                                    <span class="title">Blog</span>
                                                </a>
                                            </div>
                                        </li>
                                        <li class="level0 custom-item">
                                            <div class="accr_header">
                                                <a class="menu-title-lv0" href="index3-contact-us.html">
                                                    <span class="title">Contact Us</span>
                                                </a>
                                            </div>
                                        </li>
                                        <li class="level0 custom-item">
                                            <div class="accr_header">
                                                <a class="menu-title-lv0" href="#">
                                                    <span class="title">Custom menu</span>
                                                </a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="sns_menu_right">
                            <div class="block_topsearch">
                                 <div class="top-cart">
                                    <div class="mycart mini-cart">
                                        <div class="block-minicart">
                                            <div class="tongle">
                                                <i class="fa fa-shopping-cart"></i>
                                                <div class="summary">
                                                    <span class="amount">
                                                        @if (Auth::user())
                                                            <a href="{{ route('cart', Auth::user()->id) }}">
                                                                @else
                                                                <a href="{{ route('loginRegister') }}">

                                                        @endif
                                                            @php
                                                                use Illuminate\Support\Facades\DB;

                                                                // $cartItemCount = DB::table('carts')
                                                                //     ->wherePivotNull('cart_id', Auth::user()->id)
                                                                //     ->count();
                                                            @endphp
                                                            @if (Auth::user())

                                                            <span>{{ $cartData->count() }}</span>
                                                            @else
                                                            <span>0</span>

                                                            @endif
                                                        </a>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="block-content content">
                                                <div class="block-inner">
                                                    <ol id="cart-sidebar" class="mini-products-list">
                                                        @if ($cartData->count() > 0)


                                                        @foreach ($cartData as $product )
                                                    <li class="item odd">
                                                        <a class="product-image" title="Modular Modern" href="{{ route('productdetail', $product->id) }}">
                                                            <img alt="" src="{{ Storage::url($product->image_url) }}">
                                                        </a>
                                                        <div class="product-details">
                                                            <form method="POST" action="{{ route('deleteFromCart', $product->id) }}">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn-remove"
                                                                        onclick="return confirm('Are you sure you would like to remove this item from the shopping cart?');"
                                                                        title="Remove This Item">
                                                                    Remove This Item
                                                                </button>
                                                            </form>
                                                            {{-- <a class="btn-edit" title="Edit item" href="#">Edit item</a> --}}
                                                            <p class="product-name">
                                                                <a href="{{ route('productdetail', $product->id) }}">{{ $product->name }}</a>
                                                            </p>
                                                            <!-- <strong>1</strong>
                                                            x -->

                                                            @if ($product->on_sale)

                                                            <span class="price"> {{ $product->price -($product->price  *  $product->on_sale)}} JOD</span>
                                                            @php
                                                                $totalAmount += $product->price -($product->price  *  $product->on_sale)
                                                            @endphp
                                                            @else
                                                            <span class="price"> {{ $product->price }} JOD</span>
                                                            @php
                                                                $totalAmount += $product->price
                                                            @endphp

                                                            @endif
                                                        </div>
                                                    </li>
                                                    @endforeach
                                                    @else

                                                        <div class="row">
                                                            <div class="col-md-12 text-center" style="margin: auto;">
                                                                <img src="{{ asset('images/empty-cart.png') }}" alt="Empty Cart" class="img-responsive center-block" style="width: 100px; height: auto; margin-bottom: 20px;">
                                                                <p class="text-danger" style="font-size: 18px;">No items in the cart.</p>
                                                            </div>
                                                        </div>
                                                                                                       @endif
                                                    </ol>
                                                    <p class="cart-subtotal">
                                                        <span class="label">Total:</span>
                                                        <span class="price">{{ $totalAmount }} JOD</span>
                                                    </p>

                                                    <div class="actions">
                                                        {{-- <a class="button">
                                                            <span>
                                                                <span>Check out</span>
                                                            </span>
                                                        </a> --}}
                                                        @if (Auth::user())

                                                        <a class="button gfont go-to-cart" href="{{ route('cart' , Auth::user()->id) }}">Go to cart</a>
                                                        @else
                                                        <a class="button gfont go-to-cart" href="{{ route('loginRegister') }}">Go to cart</a>

                                                        @endif
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <span class="icon-search"></span>
                                <div class="top-search">
                                    <div id="sns_serachbox_pro11739847651442478087" class="sns-serachbox-pro">
                                        <div class="sns-searbox-content">
                                            <form id="search_mini_form3703138361442478087" method="get" action="{{ route('productList') }}">
                                                @csrf
                                                <div class="form-search">
                                                    <input id="search3703138361442478087" class="input-text" type="text" value="" name="q" placeholder="Search here...." size="30" autocomplete="off">
                                                    <button class="button form-button" title="Search" type="submit">Search</button>
                                                    <div id="search_autocomplete3703138361442478087" class="search-autocomplete" style="display: none;"></div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

</script>



