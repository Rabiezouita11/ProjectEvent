<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="zxx">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Eventiz - Event Conference HTML Templates</title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('client/images/favicon.png')}}">
    <!-- Bootstrap core CSS -->
    <link href="{{asset('client/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <!--Custom CSS-->
    <link href="{{asset('client/css/style.css')}}" rel="stylesheet" type="text/css">
    <!--Plugin CSS-->
    <link href="{{asset('client/css/plugin.css')}}" rel="stylesheet" type="text/css">

    <!--Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.5.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="{{asset('client/fonts/line-icons.css')}}" type="text/css">
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
                                <img src="{{asset('client/images/logo-white.png')}}" alt="image">
                                <img src="{{asset('client/images/logo.png')}}" alt="image">
                            </a>
                        </div>
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="navbar-collapse1 d-flex align-items-center" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav" id="responsive-menu">
                                <li class="dropdown submenu">
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
                                <li class="submenu dropdown active">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">News <i class="fas fa-caret-down ms-1" aria-hidden="true"></i></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="post-grid-1.html">All Posts</a></li>
                                        <li><a href="detail-1.html">Single Post</a></li>
                                    </ul>
                                </li>
                                <li><a href="contact.html" class="">Contact Us</a></li>
                                <li class="search-main">
                                    <a href="#search1" class="mt_search"><i class="fa fa-search fs-5"></i></a>
                                </li>
                            </ul>
                        </div><!-- /.navbar-collapse -->
                        <div class="register-login">
                            <a href="#" class="nir-btn white">Buy Ticket <i class="fa fa-angle-right "></i></a>
                        </div>

                        <div id="slicknav-mobile"></div>
                    </div>
                </div><!-- /.container-fluid -->
            </nav>
        </div>
        <!-- Navigation Bar Ends -->
    </header>
    <!-- header ends -->
    <!-- BreadCrumb Starts -->
    <section class="breadcrumb-main" style="background-image:assets('client/images/pexels-sascha.jpg');">
        <div class="breadcrumb-outer">
            <div class="container">
                <div class="breadcrumb-content text-center pt-14 pb-2">
                    <h5 class="theme mb-0">Eventiz</h5>
                    <h1 class="mb-0 white">Event Detail</h1>
                </div>
            </div>
        </div>
        <div class="bread-overlay"></div>
    </section>
    <!-- BreadCrumb Ends -->

    <!-- coming counter starts -->

    <!-- coming counter Ends -->

    <!-- blog starts -->
    <section class="event-detail pt-12">
        <center> @if (session('success'))
            <div class="alert alert-success" role="alert" style="font-size: 40px;">
                {{ session('success') }}
            </div>
            @endif
        </center>
        <center> @if (session('error'))
            <div class="alert alert-danger" role="alert" style="font-size: 40px;">
                {{ session('error') }}
            </div>
            @endif
        </center>
        <br>

        <div class="container">
            <div class="row">
                <div class="col-lg-8 pe-lg-4">
                    <div class="event-detail-inner text-center text-md-start">
                        <img src="{{asset('storage/'.$event->Image)}}" alt="" class="mb-3">


                        <h4>Description Event </h4>
                        <div class="event-quote p-4 bg-grey d-md-flex align-items-center justify-content-between mb-4 text-center text-md-start">
                            <i class="fa fa-quote-left p-4 bg-theme white fs-1 mb-md-0 mb-2"></i>
                            <p class="mb-0 ps-md-4">{{ $event->Description }}</p>
                        </div>
                        <h4>Rate This Event</h4>
                        <style>
                            .rating-form {
                                display: flex;
                                flex-direction: column;
                                align-items: center;
                                gap: 10px;
                                background-color: #fff;
                                /* Set your background color here */
                                padding: 15px;
                                border-radius: 5px;
                                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                            }

                            .rating {
                                display: inline-block;
                                font-size: 0;
                            }

                            .rating input {
                                display: none;
                            }

                            .rating label {
                                display: inline-block;
                                position: relative;
                                width: 1em;
                                font-size: 24px;
                                color: #ccc;
                                cursor: pointer;
                                transition: color 0.3s;
                            }

                            .rating label:before {
                                content: '\2605';
                                /* Unicode character for a star */
                                position: absolute;
                                top: 0;
                                left: 0;
                                width: 100%;
                                height: 100%;
                                color: #f39c12;
                                /* Filled star color */
                                opacity: 0;
                                transition: opacity 0.3s;
                            }

                            .rating input[type="radio"]:checked+label:before {
                                opacity: 1;
                            }

                            .rating-value {
                                font-size: 16px;
                                color: #333;
                                /* Adjust color as needed */
                            }
                        </style>







                        <center>
                            <center>
                                <style>
                                    .login-message {
                                        background-color: #f8f8f8;
                                        border: 1px solid #ddd;
                                        padding: 20px;
                                        text-align: center;
                                        border-radius: 5px;
                                        margin-bottom: 20px;
                                    }

                                    .login-text {
                                        font-size: 18px;
                                        margin-bottom: 10px;
                                    }

                                    .login-button {
                                        display: inline-block;
                                        background-color: #007bff;
                                        color: #fff;
                                        padding: 10px 20px;
                                        border-radius: 5px;
                                        text-decoration: none;
                                        font-weight: bold;
                                        transition: background-color 0.3s;
                                    }

                                    .login-button:hover {
                                        background-color: #0056b3;
                                    }
                                </style>
                                @guest
                                <div class="login-message">
                                    <p class="login-text">Please log in to rate this event.</p>
                                    <a href="{{ route('login') }}" class="login-button">Log In</a>
                                </div>

                                @else
                                @php
                                $userHasRated = false;
                                foreach ($rates as $rate) {
                                foreach ($users as $user) {
                                if ($rate->user_id == Auth::user()->id && $rate->event_id == $event->id) {
                                $userHasRated = true;
                                $userRating = $rate->rating;
                                break;
                                }
                                }
                                }
                                @endphp

                                @if ($userHasRated)
                                <div class="rating">
                                    <p class="rating-value">Your Rating: <span id="rating-display">{{ $userRating }} /5</span></p>
                                    <button class="nir-btn">Already Rated</button>
                                </div>
                                @else
                                <form method="post" action="{{ route('submitRating') }}" id="rating-form" name="rating-form">
                                    @csrf
                                    <input type="hidden" name="event_id" value="{{ $event->id }}">
                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                                    <div class="rating">
                                        <!-- Your rating input fields here -->
                                    </div>

                                    <p class="rating-value">Your Rating: <span id="rating-display">0</span> / 5</p>
                                    <button type="submit" class="nir-btn">Submit</button>
                                </form>
                                @endif

                                @endguest



                            </center>



                    </div>
                </div>

                <!-- sidebar starts -->
                <div class="col-lg-4 ps-lg-4">
                    <div class="sidebar-sticky">
                        <div class="list-sidebar">




                            <div class="sidebar-item bg-grey p-4 pb-3 mb-4">
                                <h5 class="bg-white p-3 text-lg-start text-center">Event Info</h5>
                                <div class="footer-contact d-flex align-items-center py-3 border-b">


                                    <i class="fa fa-user theme fs-4"></i>
                                    <div class="footer-contact-content ps-3">
                                        <h6 class="mb-1">titre Event</h6>
                                        <span class=""> {{ $event->Nom }}</span>
                                    </div>
                                </div>
                                <div class="footer-contact d-flex align-items-center py-3 border-b">


                                    <i class="fa fa-calendar theme fs-4"></i>
                                    <div class="footer-contact-content ps-3">
                                        <h6 class="mb-1">Date</h6>
                                        <span class=""> {{ $event->start_date }} - {{ $event->end_date }}</span>
                                    </div>
                                </div>
                                <div class="footer-contact d-flex align-items-center py-3 border-b">
                                    <i class="fa fa-clock theme fs-4"></i>
                                    <div class="footer-contact-content ps-3">
                                        <h6 class="mb-1">Time</h6>
                                        <span class="">{{ $event->start_time }} - {{ $event->end_time }}</span>
                                    </div>
                                </div>
                                <div class="footer-contact d-flex align-items-center py-3 border-b">
                                    <i class="fa fa-clock theme fs-4"></i>
                                    <div class="footer-contact-content ps-3">
                                        <h6 class="mb-1">Prix Ticket</h6>
                                        <span class=""> {{ $event->Prix }} DT</span>
                                    </div>
                                </div>
                                <div class="footer-contact d-flex align-items-center pt-3 pb-0">
                                    <i class="fa fa-map-marker-alt theme fs-4"></i>
                                    <div class="footer-contact-content ps-3">
                                        <h6 class="mb-1">Location</h6>
                                        <span class=""> {{ $event->Location }}</span>
                                    </div>
                                </div>
                                <div class="footer-contact d-flex align-items-center py-3 border-b">


                                    <i class="fa fa-user theme fs-4"></i>
                                    <div class="footer-contact-content ps-3">
                                        <h6 class="mb-1">Places Disponibles</h6>
                                        <span class=""> {{ $event-> Nombre_total_abonnés }}</span>
                                    </div>
                                </div>
                                <div class="footer-contact d-flex align-items-center pt-3 pb-0">
                                    <i class="fa fa-star theme fs-4"></i> <!-- Change the icon class to 'fa-star' for the rating -->
                                    <div class="footer-contact-content ps-3">
                                        <h6 class="mb-1">Average Rating:</h6>
                                        <span class="">{{ number_format($averageRating, 1) }} / 5</span>
                                    </div>
                                </div>



                            </div>
                            <div class="sidebar-item p-5 text-center position-relative" style="background-image: url(images/pexels-wendy-wei-1190297.jpg); background-size: cover;">
                                <div class="sidebar-item-content position-relative z-index2">
                                    @guest

                                    @else
                                    <?php
                                    $user_id = Auth::user()->id;

                                    ?>

                                    @endguest

                                    @if ($event->isAvailable())



                                    <form method="post" action="{{ route('buyTicket')}}" id="addTicket" name="addTicket">
                                        @csrf
                                        <input type="hidden" name="event_id" value="{{ $event->id }}">
                                        <input type="hidden" name="user_id" value="{{$user_id }}">


                                        <button type="submit" class="btn btn-primary nir-btn" onclick="event.preventDefault(); document.getElementById('addTicket').submit();">Acheter un billet <i class="fa fa-angle-right"></i></button>
                                    </form>
                                    @else
                                    <p style="color: black;font-weight:  bold; ">Les billets ne sont pas disponibles pour cet événement.</p>
                                    @endif
                                </div>
                                <div class="theme-overlay"></div>
                            </div>
                            <br>
                            <div class="sidebar-item p-5 text-center position-relative" style="background-image: url(images/pexels-wendy-wei-1190297.jpg); background-size: cover;">
                                <div class="sidebar-item-content position-relative z-index2">
                                    <h3 class="mb-3 theme">Need Help?</h3>
                                    <p class="mb-3 white">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                    <a href="{{route('contact')}}" class="nir-btn">Contact Us <i class="fa fa-angle-right"></i></a>
                                </div>
                                <div class="theme-overlay"></div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- blog Ends -->
    <!-- event-contact ends -->
    <section class="event-contact bg-grey pb-8">
        <div class="container">
            <div class="event-contact-main">
                <div class="row align-items-end">
                    <div class="col-lg-6 pe-lg-4 mb-4">
                        <div class="section-title mb-5 text-center text-lg-start">
                            <h3 class="h-title">Location</h3>
                            <h4 class="theme">Lieu de l'événement</h4>
                            <div class="selector4" style="display: flex; justify-content: center;">
                                <h2 class="ah-headline mb-0">
                                    <span>Obtenez la direction vers l'événement </span>
                                    <span class="ah-words-wrapper white theme">
                                        <b class="is-visible textcap">{{$event->Nom}}</b>
                                        <b>{{$event->Nom}}</b>
                                    </span>
                                </h2>
                            </div>
                        </div>
                        <div class="event-expo-item mb-4">
                            <div class="row align-items-center border-all m-0">
                                <div class="col-lg-3 d-flex bg-theme p-4 py-5">
                                    <div class="expo-icon text-center w-100">
                                        <i class="fa fa-map-marker white fs-1"></i>
                                    </div>
                                </div>
                                <div class="col-lg-9 p-4 text-center text-lg-start">
                                    <h5 class="mb-1">{{$event->Location}}</h5>

                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-6 ps-lg-4 mb-4">
                        <div class="map">
                            <div style="width: 100%">
                                <iframe height="500" style="filter: grayscale(1);" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q={{urlencode($event->Location)}}&amp;output=embed"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
            <p class="m-0 white text-center py-3">Copyright ©2022 Eventiz. All Rights Reserved Copyright</p>
        </div>
    </div>
    <!-- footer ends -->
    @include('kustomer::kustomer')
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
    <script src="{{asset('client/js/jquery-3.5.1.min.js')}}"></script>
    <script src="{{asset('client/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('client/js/plugin.js')}}"></script>
    <script src="{{asset('client/js/main.js')}}"></script>
    <script src="{{asset('client/js/custom-nav.js')}}"></script>
</body>

</html>