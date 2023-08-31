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

                                <li class="submenu dropdown active">
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
    <section class="breadcrumb-main" style="background-image:url(images/pexels-wendy-wei-1190297.jpg);">
        <div class="breadcrumb-outer">
            <div class="container">
                <div class="breadcrumb-content text-center pt-14 pb-2">
                    <h5 class="theme mb-0">Eventiz</h5>
                    <h1 class="mb-0 white">{{$cat->Nom}}</h1>
                </div>
            </div>
        </div>
        <div class="bread-overlay"></div>
    </section>
    <!-- BreadCrumb Ends -->
    <section class="event-schedule pb-8 about-after">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-4">
                    <div class="section-title mb-5 text-center text-lg-start">
                        <h3 class="h-title">Schedule</h3>


                        <h4 class="theme">Event Conference Organisation</h4>
                        <div class="selector4" style="display: flex; justify-content: center;">
                            <h2 class="ah-headline mb-0">
                                <span> Liste des événements planifiés</span>
                                <span class="ah-words-wrapper white theme">
                                    <b class="is-visible textcap"> qui sont </b>
                                    <b>ATTENDUATTENDU </b>
                                </span>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>

          

            





        </div>
        </div>
    </section>
    <!-- event-schedule starts -->
    @foreach ( $cat->event as $events )
    <section class="event-schedule pb-8 about-after">
        <div class="container">
        

            <div class="schedule-item">

              
                <div class="about-image-box bg-white mb-4">
              
                    <div class="row">
                        <div class="col-lg-3 d-flex">
                            <div class="about-content text-center text-lg-start p-4 py-8 bg-theme w-100">

                                <!-- Replacing Nom with the image -->
                                <img src="{{asset('storage/'.$events->Image)}}" alt="Event Image" height="150px " width="250px">
                            </div>
                        </div>
                        <div class="col-lg-6 d-flex">
                            <div class="schedule-content text-lg-start text-center py-4">
                                <h4 class="mb-1">{{$events->Nom}}</h4>

                                <ul class="schedule-items d-flex justify-content-lg-start justify-content-center">
                                    <li class="d-flex align-items-center me-4">
                                        <i class="icon-location-pin theme pe-1"></i>
                                        <span class="theme1">{{$events->Location}}</span>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <i class="icon-location-pin theme pe-1"></i>
                                        <span class="theme1"> il reste {{$events->Nombre_total_abonnés}} places</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 d-flex">
                            <div class="schedule-speaker d-lg-flex p-4 align-items-center text-center text-lg-start w-100 border-start">

                                <div class="speaker-content ms-3">
                                    <a href="{{route('ShowEventDetails',$events->id)}}" class="nir-btn nir-btn-sm nir-btn-rounded nir-btn-outline nir-btn-outline-theme1">Voir plus</a>
                                    <!-- <h6 class="mb-1">John Doe</h6> -->
                                    <!-- <p class="mb-0">CEO, Eventiz</p> -->
                                    <!-- </div> -->
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
           
            </div>

            





        </div>
        </div>
    </section>
    @endforeach
    <!-- event-schedule ends -->


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
    <script src="{{asset('client/js/jquery-3.5.1.min.js')}}"></script>
    <script src="{{asset('client/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('client/js/plugin.js')}}"></script>
    <script src="{{asset('client/js/main.js')}}"></script>
    <script src="{{asset('client/js/custom-nav.js')}}"></script>
</body>

</html>