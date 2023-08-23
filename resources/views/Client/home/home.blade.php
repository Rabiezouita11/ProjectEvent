<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="zxx">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Eventiz - Event Conference HTML Templates</title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="client/images/favicon.png">
    <!-- Bootstrap core CSS -->
    <link href="client/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <!--Custom CSS-->
    <link href="client/css/style.css" rel="stylesheet" type="text/css">
    <!--Plugin CSS-->
    <link href="client/css/plugin.css" rel="stylesheet" type="text/css">
    <!--Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.5.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="client/fonts/line-icons.css" type="text/css">
    <script src="{{ asset('vendor/kustomer/js/kustomer.js') }}" defer></script>
</head>

<body>

    <!-- Preloader -->
    <div id="preloader">
        <div id="status"></div>
    </div>
    <!-- Preloader Ends -->

    <!-- header starts -->
    <header class="main_header_area">
        <!-- Navigation Bar -->
        <div class="header_menu" id="header_menu">
            <nav class="navbar navbar-default">
                <div class="container">
                    <div class="navbar-flex d-flex align-items-center justify-content-between w-100 pb-2 pt-2">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <a class="navbar-brand" href="index.html">
                                <img src="client/images/logo-white.png" alt="image">
                                <img src="client/images/logo.png" alt="image">
                            </a>
                        </div>
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="navbar-collapse1 d-flex align-items-center" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav" id="responsive-menu">
                                <li class="dropdown submenu active">
                                    <a href="index.html" class="">Home</a>
                                </li>

                                <li><a href="about.html" class="">About Us</a></li>

                                <li class="submenu dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pages <i class="fas fa-caret-down ms-1" aria-hidden="true"></i></a> 
                                    <ul class="dropdown-menu">
                                        <li><a href="event-schedule.html">Event Schedule</a></li>
                                        <li><a href="event-detail.html">Event Detail</a></li>
                                        <li><a href="speakers.html">Speaker Lists</a></li>
                                        <li><a href="speaker-detail.html">Speaker Detail</a></li>
                                        <li><a href="sponsors.html">Sponsors</a></li>
                                        <li><a href="pricing.html">Pricing</a></li>
                                        <li><a href="gallery.html">Gallery</a></li>
                                        <li><a href="testimonials.html">Testimonials</a></li>
                                        <li><a href="faq.html">Faq</a></li>
                                        <li><a href="comingsoon.html">Coming Soon</a></li>
                                        <li><a href="search-result.html">Search Result</a></li>
                                        <li><a href="404.html">404 Error</a></li>
                                    </ul> 
                                </li>
                                <li class="submenu dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Shop <i class="fas fa-caret-down ms-1" aria-hidden="true"></i></a> 
                                    <ul class="dropdown-menu">
                                        <li><a href="products.html">Product Lists</a></li>
                                        <li><a href="product-detail.html">Product Detail</a></li>
                                        <li><a href="cart.html">Cart</a></li>
                                        <li><a href="checkout.html">Checkout</a></li>
                                        <li><a href="myaccount.html">My Account</a></li>
                                    </ul>
                                </li>
                                <li class="submenu dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">News <i class="fas fa-caret-down ms-1" aria-hidden="true"></i></a> 
                                    <ul class="dropdown-menu">
                                        <li><a href="post-grid-1.html">All Posts</a></li>
                                        <li><a href="detail-1.html">Single Post</a></li>
                                    </ul>
                                </li>
                                <li><a href="{{ url('contact') }}" class="">Contact Us</a></li>




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
                                <li class="submenu dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> {{ Auth::user()->name }} <i class="fas fa-caret-down ms-1" aria-hidden="true"></i></a> 
                                    <ul class="dropdown-menu">
                                    <li><a href="detail-1.html">Mon Compte</a></li>    
                                    <li><a  href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout</a></li>
                                     
                                    </ul>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                                @endguest


                                

                                <li class="search-main">
                                    <a href="#search1" class="mt_search"><i class="fa fa-search fs-5"></i></a>
                                </li>
                            </ul>
                        </div><!-- /.navbar-collapse -->  
                        @guest
                        <div class="register-login">
                            <a href="#" class="nir-btn white">Buy Ticket <i class="fa fa-angle-right "></i></a>
                        </div>
                        @else
                        <?php
                        $role = Auth::user()->role;	
                        ?>


<div class="register-login">
                            <a href="#" class="nir-btn white">Buy Ticket <i class="fa fa-angle-right "></i></a>
                        </div>
                        <!-- @if($role == 'participant')


                        <div class="register-login">
                            <a href="#" class="nir-btn white">{{$role}} <i class="fa fa-angle-right "></i></a>
                        </div>

                        @endif -->

                        @endguest


                        <div id="slicknav-mobile"></div>
                    </div>
                </div><!-- /.container-fluid -->
            </nav>
        </div>
        <!-- Navigation Bar Ends -->
    </header>
    <!-- header ends -->


    <!-- banner starts -->
    <section class="banner pt-10 pb-0 overflow-hidden" style="background-image:url(client/images/pexels-wendy-wei-1190297.jpg);">
 
        <div class="container">
            <div class="banner-in pt-6">
                <div class="row align-items-end">
                    <div class="col-lg-7 mb-10">
                        <div class="banner-content text-lg-start text-center">
                            <h4 class="theme mb-0">Big Event 2022</h4>
                            <div class="selector4" style="display: flex; justify-content: center;">
                                <h1 class="ah-headline white">
                                  <span>World Biggest 2023</span>
                                  <span class="ah-words-wrapper white">
                                    <b class="is-visible textcap">Conference</b>
                                    <b>Conference</b>
                                  </span>
                                </h1>
                            </div>
                            <p class="mb-0 white">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="banner-image" style="background-image:url(client/images/manbg.png);">
                            <img src="client/images/man4.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="color-overlay"></div>
    </section>
    <!-- banner ends -->

    <!-- coming counter starts -->
    <section class="coming-countermain p-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-lg-offset-5">
                    <div class="coming-counter d-md-flex align-items-center justify-content-between p-4 py-5 text-md-start text-center" data-date="2023-12-28 00:00:00">
                        <div class="counter-box"><span class="days"></span><br> Days</div>
                        <div class="counter-box"><span class="hours"></span><br> Hours</div>
                        <div class="counter-box"><span class="minutes"></span><br> Minutes</div>
                        <div class="counter-box"><span class="seconds"></span><br> Seconds</div>
                    </div>
                </div>
            </div>
                
        </div>
    </section>
    <!-- coming counter Ends -->

     <!-- about-us starts -->
     <section class="about-us about-features pt-12 pb-8" style="background-image:url(client/images/testimonial-1.png);">
        <div class="container">
            <div class="about-image-box">
                <div class="row d-flex align-items-center justify-content-between">
                    <div class="col-lg-7 pe-lg-4">
                        <div class="about-features" style="background-image:url(client/images/contentbg.png);">
                            <div class="row align-items-center">
                                <div class="col-lg-6">
                                    <div class="features-infobox border-all p-5 box-shadow bg-white text-center mb-4">
                                        <div class="infobox-icon mb-2">
                                            <i class="fa fa-users fs-1 theme"></i>
                                        </div>
                                        <div class="box-body">
                                            <h4 class="infobox-title">Event Conferences </h4>
                                            <p class="mb-2">Duis aute irure dolor in reprehenderit </p>
                                            <a href="#" class="theme">Learn More <i class="fa fa-angle-right "></i></a>
                                        </div>
                                    </div>
                                    <div class="features-infobox border-all p-5 box-shadow bg-white text-center mb-4">
                                        <div class="infobox-icon mb-2">
                                            <i class="fa fa-flag fs-1 theme"></i>
                                        </div>
                                        <div class="box-body">
                                            <h4 class="infobox-title">Culture Leadership</h4>
                                            <p class="mb-2">Duis aute irure dolor in reprehenderit </p>
                                            <a href="#" class="theme">Learn More <i class="fa fa-angle-right "></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="features-infobox border-all p-5 box-shadow bg-white text-center mb-4">
                                        <div class="infobox-icon mb-2">
                                            <i class="fa fa-gear fs-1 theme"></i>
                                        </div>
                                        <div class="box-body">
                                            <h4 class="infobox-title">Digital Marketing</h4>
                                            <p class="mb-2">Duis aute irure dolor in reprehenderit </p>
                                            <a href="#" class="theme">Learn More <i class="fa fa-angle-right "></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 ps-lg-4">
                        <div class="about-content text-center text-lg-start mb-4">
                            <h4 class="h-title">Events</h4>
                            <div class="selector4" style="display: flex; justify-content: center;">
                                <h2 class="ah-headline">
                                  <span>Why You Should Join The</span>
                                  <span class="ah-words-wrapper white theme">
                                    <b class="is-visible textcap">Events?</b>
                                    <b>Events?</b>
                                  </span>
                                </h2>
                            </div>
                            <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                 Quis ip suspendisse ultrices gravida. Risus commodo</p>
                            <a href="event-detail.html" class="nir-btn">Join Event <i class="fa fa-angle-right "></i></a>
                        </div>
                    </div>
    
                </div>
            </div>
        </div>
    </section>
    <!-- about-us ends -->

    <!-- about-us starts -->
    <section class="about-us about-before pt-12">
        <div class="container">
            <div class="about-image-box">
                <div class="row d-flex align-items-center justify-content-between">
                    <div class="col-lg-5 pe-4">
                        <div class="about-content section-title text-lg-start text-center mb-4">
                            <h3 class="h-title">About</h3>
                            <h4 class="theme"> Conference Organisation</h4>
                            <div class="selector4" style="display: flex; justify-content: center;">
                                <h2 class="ah-headline">
                                  <span>Conference, Seminars &</span>
                                  <span class="ah-words-wrapper white theme">
                                    <b class="is-visible textcap">Events</b>
                                    <b>Events</b>
                                  </span>
                                </h2>
                            </div>
                            <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                 Quis ip suspendisse ultrices gravida. Risus commodo</p>
                            <a href="about.html" class="nir-btn">Discover Now <i class="fa fa-angle-right "></i></a>
                        </div>
                    </div>
                    <div class="col-lg-7 ps-4">
                        <div class="about-features" style="background-image:url(client/images/contentbg.png);">
                            <div class="row align-items-center">
                                <div class="col-lg-6 mb-4">
                                    <img src="client/images/about/busi-3.jpg" alt="">
                                </div>
                                <div class="col-lg-6">
                                    <img src="client/images/about/busi-1.jpg" alt="" class="mb-4">
                                    <img src="client/images/about/busi-2.jpg" alt="">
                                </div>
                                
                            </div>
                        </div>
                    </div>
    
                </div>
            </div>
        </div>
    </section>
    <!-- about-us ends -->

    <!-- Counter Starts-->
    <section class="counter-section bg-white pb-6">
        <div class="container">
            
            <div class="counter">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
                        <div class="counter-item">
                            <div class="counter-content text-center">
                                <h2 class="value mb-0">520</h2>
                                <span class="m-0">Daily Visitors</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
                        <div class="counter-item">
                            <div class="counter-content text-center">
                                <h2 class="value mb-0">120</h2>
                                <span class="m-0">Delivery Monthly</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
                        <div class="counter-item">
                            <div class="counter-content text-center">
                                <h2 class="value mb-0 ">100</h2>
                                <span class="m-0">Positive Feedback</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
                        <div class="counter-item">
                            <div class="counter-content text-center">
                                <h2 class="value mb-0">250</h2>
                                <span class="m-0">Award Winning</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            
        </div>
    </section>
    <!-- Counter ends-->

    <!-- event-schedule starts -->
    <section class="event-schedule pb-8 about-after">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-4">
                    <div class="section-title mb-5 text-center text-lg-start">
                        <h3 class="h-title">Schedule</h3>
                        <h4 class="theme">Event Conference Organisation</h4>
                        <div class="selector4" style="display: flex; justify-content: center;">
                            <h2 class="ah-headline mb-0">
                                <span>List Of Planned Events Thay Are </span>
                                <span class="ah-words-wrapper white theme">
                                <b class="is-visible textcap">Expected</b>
                                <b>Expected</b>
                                </span>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="schedule-item">
                <div class="about-image-box bg-white mb-4">
                    <div class="row">
                        <div class="col-lg-3 d-flex">
                            <div class="about-content text-center text-lg-start p-4 py-8 bg-theme w-100">
                                <small class="white mb-2">8:00 Am - 9:00 AM</small>
                                <h4 class="white mb-0">Opening Ceremony</h4>
                            </div>
                        </div>
                        <div class="col-lg-6 d-flex">
                            <div class="schedule-content text-lg-start text-center py-4">
                                <h4 class="mb-1"> Introduce the Event</h4>
                                <p class="mb-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>
                                <ul class="schedule-items d-flex justify-content-lg-start justify-content-center">
                                    <li class="d-flex align-items-center me-4">
                                        <i  class="icon-location-pin theme pe-1"></i>
                                        <span class="theme1">Exploration Hall</span>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <i  class="icon-location-pin theme pe-1"></i>
                                        <span class="theme1">Hall 01</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 d-flex">
                            <div class="schedule-speaker d-lg-flex p-4 align-items-center text-center text-lg-start w-100 border-start">
                                <img src="client/images/reviewer/1.jpg" alt="" class="rounded-circle img-circle">
                                <div class="speaker-content ms-3">
                                    <h6 class="mb-0 theme">Jesus Holland</h6>
                                    <small>Host & Speaker</small>
                                </div>
                            </div>
                        </div>
        
                    </div>
                </div>
                <div class="about-image-box bg-white mb-4">
                    <div class="row">
                        <div class="col-lg-3 d-flex">
                            <div class="about-content text-center text-lg-start p-4 py-8 bg-theme3 w-100">
                                <small class="white mb-2">9:00 Am - 10:00 AM</small>
                                <h4 class="white mb-0">Greetings Event</h4>
                            </div>
                        </div>
                        <div class="col-lg-6 d-flex">
                            <div class="schedule-content text-lg-start text-center py-4">
                                <h4 class="mb-1"> Greetings and Opening Event</h4>
                                <p class="mb-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>
                                <ul class="schedule-items d-flex justify-content-lg-start justify-content-center">
                                    <li class="d-flex align-items-center me-4">
                                        <i  class="icon-location-pin theme pe-1"></i>
                                        <span class="theme1">Exploration Hall</span>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <i  class="icon-location-pin theme pe-1"></i>
                                        <span class="theme1">Hall 01</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 d-flex">
                            <div class="schedule-speaker d-lg-flex p-4 align-items-center text-center text-lg-start w-100 border-start">
                                <img src="client/images/reviewer/2.jpg" alt="" class="rounded-circle img-circle">
                                <div class="speaker-content ms-3">
                                    <h6 class="mb-0 theme">Ricky Malone</h6>
                                    <small>Host & Speaker</small>
                                </div>
                            </div>
                        </div>
        
                    </div>
                </div>
                <div class="about-image-box bg-white mb-4">
                    <div class="row">
                        <div class="col-lg-3 d-flex">
                            <div class="about-content text-center text-lg-start p-4 py-8 bg-theme w-100">
                                <small class="white mb-2">10:00 Am - 10:30 AM</small>
                                <h4 class="white mb-0">Break And Coffee</h4>
                            </div>
                        </div>
                        <div class="col-lg-6 d-flex">
                            <div class="schedule-content text-lg-start text-center py-4">
                                <h4 class="mb-1"> Tea and Coffee Break</h4>
                                <p class="mb-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>
                                <ul class="schedule-items d-flex justify-content-lg-start justify-content-center">
                                    <li class="d-flex align-items-center me-4">
                                        <i  class="icon-location-pin theme pe-1"></i>
                                        <span class="theme1">Exploration Hall</span>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <i  class="icon-location-pin theme pe-1"></i>
                                        <span class="theme1">Hall 01</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 d-flex">
                            <div class="schedule-speaker d-lg-flex p-4 align-items-center text-center text-lg-start w-100 border-start">
                                <img src="client/images/reviewer/1.jpg" alt="" class="rounded-circle img-circle">
                                <div class="speaker-content ms-3">
                                    <h6 class="mb-0 theme">Jesus Holland</h6>
                                    <small>Host & Speaker</small>
                                </div>
                            </div>
                        </div>
        
                    </div>
                </div>
                <div class="about-image-box bg-white mb-4">
                    <div class="row">
                        <div class="col-lg-3 d-flex">
                            <div class="about-content text-center text-lg-start p-4 py-8 bg-theme3 w-100">
                                <small class="white mb-2">10:00 Am - 10:30 AM</small>
                                <h4 class="white mb-0">Digital Workshop</h4>
                            </div>
                        </div>
                        <div class="col-lg-6 d-flex">
                            <div class="schedule-content text-lg-start text-center py-4">
                                <h4 class="mb-1"> Digital Marketing Workshop</h4>
                                <p class="mb-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>
                                <ul class="schedule-items d-flex justify-content-lg-start justify-content-center">
                                    <li class="d-flex align-items-center me-4">
                                        <i  class="icon-location-pin theme pe-1"></i>
                                        <span class="theme1">Exploration Hall</span>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <i  class="icon-location-pin theme pe-1"></i>
                                        <span class="theme1">Hall 01</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 d-flex">
                            <div class="schedule-speaker d-lg-flex p-4 align-items-center text-center text-lg-start w-100 border-start">
                                <img src="client/images/reviewer/3.jpg" alt="" class="rounded-circle img-circle">
                                <div class="speaker-content ms-3">
                                    <h6 class="mb-0 theme">Nelly Bell</h6>
                                    <small>Speaker</small>
                                </div>
                            </div>
                        </div>
        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- event-schedule ends -->

    <!-- our teams starts -->
    <section class="event-team" style="background-image: url(client/images/manbg.png);">
        <div class="container">

            <div class="section-title mb-5 w-75 mx-auto text-center">
                <h3 class="h-title">Speakers</h3>
                <h4 class="theme">Featured Speaker</h4>
                <div class="selector4" style="display: flex; justify-content: center;">
                    <h2 class="ah-headline mb-0">
                        <span>Experience Speaker With </span>
                        <span class="ah-words-wrapper white theme">
                        <b class="is-visible textcap">Knowledge</b>
                        <b>Knowledge</b>
                        </span>
                    </h2>
                </div>
            </div>

            <div class="team-main">
                <div class="row align-items-center">
                    <div class="col-lg-3 mb-4">
                        <div class="team-list position-relative">
                            <div class="team-image border-all p-2 bg-white">
                                <img src="client/images/team/img6.jpg" alt="team">
                            </div>
                            <div class="team-content text-center p-4">
                                <h4 class="mb-0 theme">Gerardo Ambrose </h4>
                                <p class="mb-3 white">Senior Agent</p>
                                <div class="social-links">
                                    <ul>
                                        <li><a href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="overlay"></div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                        <div class="team-list position-relative mb-4">
                            <div class="team-image border-all p-2 bg-white">
                                <img src="client/images/team/img2.jpg" alt="team">
                            </div>
                            <div class="team-content text-center p-4">
                                <h4 class="mb-0 theme">Horke Pels</h4>
                                <p class="mb-3 white">Head Officer</p>
                                <div class="social-links">
                                    <ul>
                                        <li><a href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="overlay"></div>
                        </div>
                        <div class="team-list position-relative">
                            <div class="team-image border-all p-2 bg-white">
                                <img src="client/images/team/img3.jpg" alt="team">
                            </div>
                            <div class="team-content text-center p-4">
                                <h4 class="mb-0 theme">Horke Pels</h4>
                                <p class="mb-3 white">Head Officer</p>
                                <div class="social-links">
                                    <ul>
                                        <li><a href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="overlay"></div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                        <div class="team-list position-relative mb-4">
                            <div class="team-image border-all p-2 bg-white">
                                <img src="client/images/team/img4.jpg" alt="team">
                            </div>
                            <div class="team-content text-center p-4">
                                <h4 class="mb-0 theme">Horke Pels</h4>
                                <p class="mb-3 white">Head Officer</p>
                                <div class="social-links">
                                    <ul>
                                        <li><a href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="overlay"></div>
                        </div>
                        <div class="team-list position-relative">
                            <div class="team-image border-all p-2 bg-white">
                                <img src="client/images/team/img1.jpg" alt="team">
                            </div>
                            <div class="team-content text-center p-4">
                                <h4 class="mb-0 theme">Horke Pels</h4>
                                <p class="mb-3 white">Head Officer</p>
                                <div class="social-links">
                                    <ul>
                                        <li><a href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="overlay"></div>
                        </div>
                    </div>

                    <div class="col-lg-3 mb-4">
                        <div class="team-list position-relative">
                            <div class="team-image border-all p-2 bg-white">
                                <img src="client/images/team/img5.jpg" alt="team">
                            </div>
                            <div class="team-content text-center p-4">
                                <h4 class="mb-0 theme">Horke Pels</h4>
                                <p class="mb-3 white">Head Officer</p>
                                <div class="social-links">
                                    <ul>
                                        <li><a href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="overlay"></div>
                        </div>
                    </div>

                </div>
                <div class="speaker-btn text-center">
                    <a href="speaker-detail.html" class="nir-btn">View All Speakers <i class="fa fa-angle-right "></i></a>
                </div>
                
            </div>
        </div>
        <div class="white-overlay"></div>
    </section>
    <!-- our teams Ends -->

    <!-- event-pricing starts -->
    <section class="event-pricing bg-grey pb-6">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-4">
                    <div class="section-title text-lg-start text-center mb-5">
                        <h3 class="h-title">Pricing</h3>
                        <h4 class="theme">Pricing Tablen</h4>
                        <div class="selector4" style="display: flex; justify-content: center;">
                            <h2 class="ah-headline mb-0">
                                <span>Explore Flexible Our Pricing</span>
                                <span class="ah-words-wrapper white theme">
                                <b class="is-visible textcap">Plans</b>
                                <b>Plans</b>
                                </span>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="pricing-main">
                <div class="row">
                    <div class="col-lg-4 mb-6">
                        <div class="pricing-item text-center p-5 bg-white position-relative">
                            <div class="pricing-top"></div>
                            <h3 class="mb-0">Basic Ticket</h3>
                            <p class="mb-0">Standard Package </p>
                            <div class="pricing-price py-4">
                                
                                <h2 class="mb-0 theme d-flex align-items-start justify-content-center lh-1">
                                    <span class="pricing-currency theme">$</span> 39. <span class="fs-5">99</span></h2>
                                <p class="mb-0">Person</p>
                            </div>
                            <ul class="pricing-features-list mb-4">
                                <li class="d-block border-b pb-2 mb-2">Second Balcony Seat </li>
                                <li class="d-block border-b pb-2 mb-2">Snack & Softdrink</li>
                                <li class="d-block border-b pb-2 mb-2">Certificates</li>
                                <li class="d-block">Private Access</li>
                            </ul>
                            <div class="pricing-btn mb-1">
                                <a href="#" class="nir-btn">Purchase</a>
                            </div>
                            <small>*Please read our term and condition before order ticket</small>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-6">
                        <div class="pricing-item text-center p-5 bg-theme1 position-relative">
                            <div class="pricing-top" style="background-image: url(client/images/pricebox-topblue.png);"></div>
                            <h3 class="mb-0 white">Silver Ticket</h3>
                            <p class="mb-0 white">Pro Package </p>
                            <div class="pricing-price py-4">
                                
                                <h2 class="mb-0 theme d-flex align-items-start justify-content-center lh-1">
                                    <span class="pricing-currency theme">$</span> 59. <span class="fs-5">99</span></h2>
                                <p class="mb-0 white">Person</p>
                            </div>
                            <ul class="pricing-features-list mb-4">
                                <li class="d-block border-b pb-2 mb-2 white">Second Balcony Seat </li>
                                <li class="d-block border-b pb-2 mb-2 white">Snack & Softdrink</li>
                                <li class="d-block border-b pb-2 mb-2 white">Certificates</li>
                                <li class="d-block border-b pb-2 mb-2 white">Printed Materials</li>
                                <li class="d-block white">Private Access</li>
                            </ul>
                            <div class="pricing-btn mb-1">
                                <a href="#" class="nir-btn">Purchase</a>
                            </div>
                            <small class=" white">*Please read our term and condition before order ticket</small>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-6">
                        <div class="pricing-item text-center p-5 bg-white position-relative">
                            <div class="pricing-top"></div>
                            <h3 class="mb-0">Gold Ticket</h3>
                            <p class="mb-0">Enterprise Package </p>
                            <div class="pricing-price py-4">
                                
                                <h2 class="mb-0 theme d-flex align-items-start justify-content-center lh-1">
                                    <span class="pricing-currency theme">$</span> 199. <span class="fs-5">99</span></h2>
                                <p class="mb-0">Person</p>
                            </div>
                            <ul class="pricing-features-list mb-4">
                                <li class="d-block border-b pb-2 mb-2">Second Balcony Seat </li>
                                <li class="d-block border-b pb-2 mb-2">Snack & Softdrink</li>
                                <li class="d-block border-b pb-2 mb-2">Certificates</li>
                                <li class="d-block">Private Access</li>
                            </ul>
                            <div class="pricing-btn mb-1">
                                <a href="#" class="nir-btn">Purchase</a>
                            </div>
                            <small>*Please read our term and condition before order ticket</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- event-pricing ends -->

    <!-- event-calltoaction starts -->
    <section class="event-calltoaction pb-0" style="background-image: url(client/images/pexels-sascha.jpg);">
        <div class="container">
            <div class="section-title mb-5 w-60 mx-auto text-center">
                <h3 class="h-title theme-stroke">Expo</h3>
                <h4 class="theme">Join Expo 2023</h4>
                <div class="selector4" style="display: flex; justify-content: center;">
                    <h2 class="ah-headline mb-0">
                        <span class="white">Join Us At 20th Hero Nada Expo </span>
                        <span class="ah-words-wrapper white theme">
                        <b class="is-visible textcap">2023</b>
                        <b>2023</b>
                        </span>
                    </h2>
                </div>
            </div>
            <div class="event-expo w-60 mx-auto mb-7">
                <div class="event-expo-item mb-4" style="background-color: #FFFFFF1F;">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-md-3">
                            <div class="expo-icon p-4 py-5 bg-theme text-center">
                                <i class="fa fa-calendar white fs-1"></i>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9">
                            <p class="mb-0 white">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis</p>
                        </div>
                    </div>
                </div>
                <div class="event-expo-item" style="background-color: #FFFFFF1F;">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-md-3">
                            <div class="expo-icon p-4 py-5 bg-white text-center">
                                <i class="fa fa-bar-chart theme fs-1"></i>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9">
                            <p class="mb-0 white">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="video-expo w-75 mx-auto position-relative mb-minus">
                <img src="client/images/blog/blog1.jpg" alt="" class="p-2 bg-white">
                <div class="video-button text-center position-absolute top-50 start-50 z-index2 translate-50">
                    <div class="call-button text-center">
                        <button type="button" class="play-btn js-video-button" data-video-id="152879427" data-channel="vimeo">
                            <i class="fa fa-play bg-blue"></i>
                        </button>
                    </div>
                    <div class="video-figure"></div>
                </div>

            </div>
        </div>
        <div class="theme-overlay"></div>
    </section>
    <!-- event-calltoaction ends -->

    <!-- event-gallery starts -->
    <section class="event-gallery pb-0 pt-18" style="background-image: url(client/images/speaker_bg.png);">
        <div class="container">
            <div class="section-title mb-5 w-75 mx-auto text-center">
                <h3 class="h-title">Gallery</h3>
                <h4 class="theme">Event Gallery</h4>
                <div class="selector4" style="display: flex; justify-content: center;">
                    <h2 class="ah-headline mb-0">
                        <span>Beautiful Snapshot Of Recent </span>
                        <span class="ah-words-wrapper white theme">
                        <b class="is-visible textcap">Events</b>
                        <b>Events</b>
                        </span>
                    </h2>
                </div>
            </div>
            
            <div class="event-gallerystart mb-minus">
                <div class="row gallery-main">
    
                    <div class="col-lg-4 col-md-6 mansonry-item p-2">
                        <div class="gallery-item">
                            <div class="gallery-image">
                                <a href="client/images/blog/blog1.jpg" data-lightbox="gallery" data-title="Title">
                                    <img src="client/images/blog/blog1.jpg" alt="image">
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mansonry-item p-2">
                        <div class="gallery-item">
                            <div class="gallery-image">
                                <a href="client/images/blog/blog2.jpg" data-lightbox="gallery" data-title="Title">
                                    <img src="client/images/blog/blog2.jpg" alt="image">
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mansonry-item p-2">
                        <div class="gallery-item">
                            <div class="gallery-image">
                                <a href="client/images/blog/blog3.jpg" data-lightbox="gallery" data-title="Title">
                                    <img src="client/images/blog/blog3.jpg" alt="image">
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mansonry-item p-2">
                        <div class="gallery-item">
                            <div class="gallery-image">
                                <a href="client/images/blog/blog4.jpg" data-lightbox="gallery" data-title="Title">
                                    <img src="client/images/blog/blog4.jpg" alt="image">
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mansonry-item p-2">
                        <div class="gallery-item">
                            <div class="gallery-image">
                                <a href="client/images/blog/blog3.jpg" data-lightbox="gallery" data-title="Title">
                                    <img src="client/images/blog/blog3.jpg" alt="image">
                                </a>
                                <div class="overlay"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mansonry-item p-2">
                        <div class="gallery-item">
                            <div class="gallery-image">
                                <a href="client/images/blog/blog4.jpg" data-lightbox="gallery" data-title="Title">
                                    <img src="client/images/blog/blog4.jpg" alt="image">
                                </a>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </section>
    <!-- event-pricing ends -->

    <!-- testomonial start -->
    <section class="event-testimonial pt-18 pb-7 bg-grey">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-4">
                    <div class="section-title text-center text-lg-start">
                        <h3 class="h-title">Testimonials</h3>
                        <h4 class="theme">Our Testimonials</h4>
                        <div class="selector4" style="display: flex; justify-content: center;">
                            <h2 class="ah-headline mb-0">
                                <span>What Peoples's Says About</span>
                                <span class="ah-words-wrapper white theme">
                                <b class="is-visible textcap">Eventiz</b>
                                <b>Eventiz</b>
                                </span>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row align-items-center">

                <div class="col-lg-7 pe-lg-5">
                    <div class="row review-slider">
                        <div class="col-sm-4 item">
                            <div class="testimonial-item bg-white p-5">
                                <div class="testi-details mb-4">
                                    <i class="fa fa-quote-left fs-1"></i>
                                    <p class="m-0">Lorem Ipsum is simply dummy
                                        text of the printing andypesetting industry. Lorem ipsum a simple Lorem Ipsum
                                        has been the industry's standard dummy hic et quidem. Dignissimos maxime velit
                                        unde inventore quasi vero dolorem.</p>
                                </div>
                                <div class="author-info d-flex align-items-center">
                                    <img src="client/images/reviewer/1.jpg" alt="">
                                    <div class="author-title ms-3">
                                        <h5 class="m-0 theme">Jared Erondu</h5>
                                        <span>Supervisor</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 item">
                            <div class="testimonial-item bg-white p-5">
                                <div class="testi-details mb-4">
                                    <i class="fa fa-quote-left me-2 fs-1"></i>
                                    <p class="m-0">Lorem Ipsum is simply dummy
                                        text of the printing andypesetting industry. Lorem ipsum a simple Lorem Ipsum
                                        has been the industry's standard dummy hic et quidem. Dignissimos maxime velit
                                        unde inventore quasi vero dolorem.</p>
                                </div>
                                <div class="author-info d-flex align-items-center">
                                    <img src="client/images/reviewer/2.jpg" alt="">
                                    <div class="author-title ms-3">
                                        <h5 class="m-0 theme">Jared Erondu</h5>
                                        <span>Supervisor</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 ps-lg-5">
                    <div class="testimonial-image">
                        <img src="client/images/testi-image.png" alt="" class="opacity-50">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- testimonial ends -->

    <!-- partner starts -->
    <section class="event-partners pb-8" style="background-image: url(client/images/contentbg.png);">
        <div class="container">
            <div class="section-title mb-5 w-75 mx-auto text-center">
                <h3 class="h-title">Partners</h3>
                <h4 class="theme">Our Partners</h4>
                <div class="selector4" style="display: flex; justify-content: center;">
                    <h2 class="ah-headline mb-0">
                        <span>Our Perfect Partners & </span>
                        <span class="ah-words-wrapper white theme">
                        <b class="is-visible textcap">Sponsors</b>
                        <b>Sponsors</b>
                        </span>
                    </h2>
                </div>
            </div>
            <div class="partners_inner">
                <div class="row">
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="partner-list border-all mb-4">
                            <img src="client/images/cl-5.png" alt="">
                        </div>
                        <div class="partner-list border-all">
                            <img src="client/images/cl-3.png" alt="">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="partner-list border-all mb-4">
                            <img src="client/images/cl-5.png" alt="">
                        </div>
                        <div class="partner-list border-all">
                            <img src="client/images/cl-4.png" alt="">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="partner-list border-all mb-4">
                            <img src="client/images/cl-1.png" alt="">
                        </div>
                        <div class="partner-list border-all">
                            <img src="client/images/cl-2.png" alt="">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="partner-list border-all mb-4">
                            <img src="client/images/cl-2.png" alt="">
                        </div>
                        <div class="partner-list border-all">
                            <img src="client/images/cl-1.png" alt="">
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="white-overlay opacity-75"></div>
    </section>
    <!-- partner ends -->

    <div class="event-seperator">
        <div class="container">
            <div class="event-seperator-divider d-flex border-b pt-2">
                <div class="event-seperator-icon position-absolute start-50 top-0 bg-white p-1">
                    <i class="fas fa-star theme fs-5"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- recent-articles starts -->
    <section class="event-articles pb-8">
        <div class="container">
            <div class="section-title mb-5 w-75 mx-auto text-center">
                <h3 class="h-title">News</h3>
                <h4 class="theme">Our News & Articles</h4>
                <div class="selector4" style="display: flex; justify-content: center;">
                    <h2 class="ah-headline mb-0">
                        <span>Our News & </span>
                        <span class="ah-words-wrapper white theme">
                        <b class="is-visible textcap">Articles</b>
                        <b>Articles</b>
                        </span>
                    </h2>
                </div>
            </div>

            <div class="recent-articles-inner">
                <div class="row">
                    <div class="col-lg-4 mb-4">
                        <div class="articles-item border-all bg-white overflow-hidden position-relative">
                            <div class="articles-image">
                                <img src="client/images/blog/blog1.jpg" alt="image">
                                <div class="articles-cats position-absolute top-0 end-0 bg-theme p-1 px-2 white mt-2 me-3">Ecommerce</div>
                            </div>
                            <div class="articles-content-main">
                                <div class="articles-content p-4 pb-2">
                                    <h4><a href="detail-1.html">How To Optimize Your Blog For High Ranking</a></h4>
                                    <a href="#" class="theme textupper small">Continue Reading</a>
                                </div>
                                <ul class="border-top d-block w-100 p-4 py-2">
                                    <li>August 25, 2022</li> |
                                    <li> No Comments</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="articles-item border-all bg-white overflow-hidden position-relative">
                            <div class="articles-image">
                                <img src="client/images/blog/blog2.jpg" alt="image">
                                <div class="articles-cats position-absolute top-0 end-0 bg-theme p-1 px-2 white mt-2 me-3">Inspiration</div>
                            </div>
                            <div class="articles-content-main">
                                <div class="articles-content p-4 pb-2">
                                    <h4><a href="detail-1.html">Runner with Autism Graces of Women</a></h4>
                                    <a href="#" class="theme textupper small">Continue Reading</a>
                                </div>
                                <ul class="border-top d-block w-100 p-4 py-2">
                                    <li>August 25, 2022</li> |
                                    <li> No Comments</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="articles-item border-all bg-white overflow-hidden position-relative">
                            <div class="articles-image">
                                <img src="client/images/blog/blog3.jpg" alt="image">
                                <div class="articles-cats position-absolute top-0 end-0 bg-theme p-1 px-2 white mt-2 me-3">Public</div>
                            </div>
                            <div class="articles-content-main">
                                <div class="articles-content p-4 pb-2">
                                    <h4><a href="detail-1.html">Services To Grow Your Business Sell Affiliate</a></h4>
                                    <a href="#" class="theme textupper small">Continue Reading</a>
                                </div>
                                <ul class="border-top d-block w-100 p-4 py-2">
                                    <li>August 25, 2022</li> |
                                    <li> No Comments</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- recent-articles ends -->

    <!-- event-contact ends -->
    <section class="event-contact bg-grey pb-8">
        <div class="container">
            <div class="event-contact-main">
                <div class="row align-items-end">
                    <div class="col-lg-6 pe-lg-4 mb-4">
                        <div class="section-title mb-5 text-center text-lg-start">
                            <h3 class="h-title">Venue</h3>
                            <h4 class="theme">Reach Us</h4>
                            <div class="selector4" style="display: flex; justify-content: center;">
                                <h2 class="ah-headline mb-0">
                                    <span>Get Direction To The Event </span>
                                    <span class="ah-words-wrapper white theme">
                                    <b class="is-visible textcap">Location</b>
                                    <b>Location</b>
                                    </span>
                                </h2>
                            </div>
                        </div>
                        <div class="event-expo-item mb-4">
                            <div class="row align-items-center border-all m-0">
                                <div class="col-lg-3 d-flex bg-theme p-4 py-5">
                                    <div class="expo-icon text-center w-100">
                                        <i class="fa fa-map-marker-alt white fs-1"></i>
                                    </div>
                                </div>
                                <div class="col-lg-9 p-4 text-center text-lg-start">
                                    <h5 class="mb-1">Galleria Mall Conference Center</h5>
                                    <p class="mb-0">19 By Pass NR, Bali, Indonesia, BC 22196</p>
                                </div>
                            </div>
                        </div>
                        <div class="event-expo-item">
                            <div class="row align-items-center border-all m-0">
                                <div class="col-lg-3 d-flex bg-theme p-4 py-5">
                                    <div class="expo-icon text-center w-100">
                                        <i class="fa fa-map-pin white fs-1"></i>
                                    </div>
                                </div>
                                <div class="col-lg-9 p-4 text-center text-lg-start">
                                    <h5 class="mb-1">Reception Info</h5>
                                    <p class="mb-0">Phone Number: (+62) 1919-2022, (+62) 1919-2023</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 ps-lg-4 mb-4">
                        <div class="map">
                            <div style="width: 100%">
                                <iframe height="500" style="filter: grayscale(1);" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=+(mangal%20bazar)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- event-contact ends -->

    <!-- footer starts -->
    <footer class="pt-12 pb-7" style="background-image: url(images/pexels-sascha.jpg);">

        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-5 pe-lg-4">
                    <div class="footer-about">
                        <img src="images/logo-white.png" alt="">
                        <p class="mt-3 mb-3 white">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Odio suspendisse leo neque
                            iaculis molestie sagittis maecenas aenean eget molestie sagittis.
                        </p>

                        <div class="social-links">
                            <ul>
                                <li><a href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 mb-5">
                    <div class="footer-links">
                        <h4 class="white mb-4">Quick link</h4>
                        <ul class="list">
                            <li class="pb-2"><a href="about-us.html">About Us</a></li>
                            <li class="pb-2"><a href="about-us.html">Services</a></li>
                            <li class="pb-2"><a href="about-us.html">Speakers</a></li>
                            <li class="pb-2"><a href="about-us.html">Schedule</a></li>
                            <li class="pb-2"><a href="about-us.html">Ticket Pricing</a></li>
                            <li><a href="#about-us.html">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-5">
                    <div class="footer-links">
                        <h4 class="white mb-4">get In Touch</h4>
                        <p class="mb-3">1616 Broadway NY, New York United States of America</p>
                        <div class="footer-contact d-flex align-items-center mb-3">
                            <i class="fa fa-phone white fs-4"></i>
                            <div class="footer-contact-content ps-3">
                                <h6 class="white mb-0">955 444 1245</h6>
                                <small class="white">For Information</small>
                            </div>
                        </div>
                        <div class="footer-contact d-flex align-items-center">
                            <i class="fa fa-envelope white fs-4"></i>
                            <div class="footer-contact-content ps-3">
                                <h6 class="white mb-0">info@eventiz.com</h6>
                                <small class="white">Email Address</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-5">
                    <div class="footer-links">
                        <h4 class="white mb-4">Subscribe To Our Newsletter</h4>
                        <div class="newsletter-form ">
                            <p class="mb-3">New subscribers get 10% off your next order</p>
                            <form action="#" method="get" accept-charset="utf-8" class="border-0">
                                <input type="text" placeholder="Email Address" class="w-100 mb-2">
                                <button class="nir-btn w-100">Subscribe</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="theme-overlay opacity-90"></div>
    </footer>
     
    <div class="footer-copyright bg-theme1">
        <div class="container">
            <p class="m-0 white text-center py-3">Copyright ©2023 Eventiz. All Rights Reserved Copyright</p>
        </div>
    </div>
    <!-- footer ends -->

    <!-- Back to top start -->
    <div id="back-to-top">
        <a href="#"></a>
    </div>
    <!-- Back to top ends -->

    <!-- search popup -->
    <div id="search1">
        <button type="button" class="close">×</button>
        <form>
            <input type="search" value="" placeholder="type keyword(s) here" />
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
    </div>


    <!-- *Scripts* -->

    <script src="client/js/jquery-3.5.1.min.js"></script>
    <script src="client/js/bootstrap.min.js"></script>
    <script src="client/js/plugin.js"></script>
    <script src="client/js/main.js"></script>
    <script src="client/js/custom-nav.js"></script>
</body>
@include('kustomer::kustomer')
</html>