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
                                    <li><a href="{{ route('profileclient') }}">Mon Compte</a></li>    
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

    <!-- BreadCrumb Starts -->  
    <section class="breadcrumb-main" style="background-image:url(client/images/pexels-wendy-wei-1190297.jpg);">
        <div class="breadcrumb-outer">
            <div class="container">
                <div class="breadcrumb-content text-center pt-14 pb-2">
                    <h5 class="theme mb-0">Eventiz</h5>
                    <h1 class="mb-0 white">Contact us</h1>
                </div>
            </div>
        </div>
        <div class="bread-overlay"></div>
    </section>
    <!-- BreadCrumb Ends --> 

    <!-- contact starts -->
    <section class="contact-main pb-8" style="background-image: url(client/images/testimonial-1.png);">
        <div class="container">
            <div class="contact-info-main mt-0">
                <div class="section-title mb-5 w-75 mx-auto text-center">
                    <h3 class="h-title">Contact</h3>
                    <h4 class="theme">Touch WIth Us</h4>
                    <div class="selector4" style="display: flex; justify-content: center;">
                        <h2 class="ah-headline mb-0">
                            <span>How Can We </span>
                            <span class="ah-words-wrapper white theme">
                            <b class="is-visible textcap">help?</b>
                            <b>help?</b>
                            </span>
                        </h2>
                    </div>
                </div>
                <div class="contact-info">
                    <div class="contact-info-content row mb-1">
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="info-item bg-grey px-4 py-5 border-all text-center">
                                <div class="info-icon mb-2 bg-theme rounded-circle mx-auto">
                                    <i class="fa fa-map-marker-alt white"></i>
                                </div>
                                <div class="info-content">
                                    <h5>Galleria Conference Hall</h5>
                                    <p class="mb-0">19 By Pass Main Street, Bali, Indonesia, BC 22196</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="info-item bg-grey px-4 py-5 border-all text-center">
                                <div class="info-icon mb-2 bg-theme rounded-circle mx-auto">
                                    <i class="fa fa-phone white"></i>
                                </div>
                                <div class="info-content">
                                    <h5>Ticket Info</h5>
                                    <p class="m-0">Phone No. : (+977) 524-191-2022</p>
                                    <p class="m-0">Email Address: eventiz@mail.com</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 mb-4">
                            <div class="info-item bg-grey px-4 py-5 border-all text-center">
                                <div class="info-icon mb-2 bg-theme rounded-circle mx-auto">
                                    <i class="fa fa-envelope white"></i>
                                </div>
                                <div class="info-content ps-4">
                                    <h5>Event Schedule</h5>
                                    <p class="m-0">Sept 12 - 14 Sept 2023 Starts 09:00am to 06:00 pm</p>
                                </div>
                            </div>
                        </div>
                    </div>
                        <div id="contact-form1" class="contact-form" style="font-size: 20px;">
                   <center> @if (session('azer'))
                <div class="alert alert-success">
                {{session('azer')}}

                </div>
                @endif</center>    
                        <div class="row">
                            <div class="col-lg-8 pe-lg-4 mb-4">
                                
                                <div id="contactform-error-msg"></div>
                                
               
                                <form method="post" action="{{url('AjoutContact')}}" name="contactform2" id="contactform2">
                                @csrf  
                                <div class="form-group mb-2">
                                        <input type="text" name="nom" class="form-control" value="{{ Auth::user()->name }} " id="fullname" placeholder="First Name" readonly>
                                    </div>
                                    <div class="form-group mb-2">
                                        <input type="email" name="email"  class="form-control" value="{{ Auth::user()->email }}" id="email"  placeholder="Email" readonly>
                                    </div>
                                    <div class="form-group mb-2">
                                        <input type="text" name="numero" class="form-control" id="phnumber" placeholder="votre numero" required>
                                        <div>@if ($errors->has('numero'))
                                <strong style="color: red;">{{ $errors->first('numero') }}</strong>
                                @endif</div>
                                    </div>
                                   
                                    <div class="textarea mb-2">
                                        <textarea name="message" placeholder="Enter a message" value="{{ old('message') }}" id="message" required></textarea>
                                        <div>@if ($errors->has('message'))
                                <strong style="color: red;">{{ $errors->first('message') }}</strong>
                                @endif</div>
                                    </div>
                                    <div class="comment-btn text-center text-lg-start">
                                        <input  href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('contactform2').submit();"  type="submit" class="nir-btn" id="submit2" value="Send Message">
                                    </div>
                                </form>
                            </div>
                            <div class="col-lg-4 ps-lg-4 mb-4">
                                <div class="map">
                         
                                    <div style="width: 100%">
                                        <iframe height="500"  src="https://maps.google.com/maps?q=Le%20kef&t=&z=9&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" ></iframe>
                                    
                                    
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact Ends -->

    <!-- footer starts -->
   <footer class="pt-12 pb-7" style="background-image: url(client/images/pexels-sascha.jpg);">

    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-5 pe-lg-4">
                <div class="footer-about">
                    <img src="client/images/logo-white.png" alt="">
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

</html>

