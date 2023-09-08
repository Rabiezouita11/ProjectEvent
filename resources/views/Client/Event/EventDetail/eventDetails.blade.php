 @extends ('Client.Layouts.index')

 @section('content')

 <section class="breadcrumb-main" style="background-image:url(images/pexels-wendy-wei-1190297.jpg);">
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
                                     <input type="radio" name="rating" id="rating-5" value="5">
                                     <label for="rating-5">5</label>
                                     <input type="radio" name="rating" id="rating-4" value="4">
                                     <label for="rating-4">4</label>
                                     <input type="radio" name="rating" id="rating-3" value="3">
                                     <label for="rating-3">3</label>
                                     <input type="radio" name="rating" id="rating-2" value="2">
                                     <label for="rating-2">2</label>
                                     <input type="radio" name="rating" id="rating-1" value="1">
                                     <label for="rating-1">1</label>
                                 </div>

                                 <p class="rating-value">Your Rating: <span id="rating-display">0</span> / 5</p>

                                 <!-- Add a validation message element -->
                                 <div id="validation-message" style="color: red;"></div>

                                 <button type="submit" class="nir-btn" onclick="validateAndSubmit(event)">Submit Rating</button>
                             </form>
                             @endif

                             @endguest



                         </center>



                 </div>
             </div>
             <script>
                 function validateAndSubmit(event) {
                     // Get all radio buttons by name
                     const ratingButtons = document.querySelectorAll('input[name="rating"]');

                     // Check if at least one radio button is selected
                     let isRatingSelected = false;
                     ratingButtons.forEach(button => {
                         if (button.checked) {
                             isRatingSelected = true;
                         }
                     });

                     // If no radio button is selected, prevent form submission and display an error message
                     if (!isRatingSelected) {
                         event.preventDefault(); // Prevent form submission
                         document.getElementById('validation-message').textContent = 'Please select a rating.';
                     } else {
                         // If a radio button is selected, submit the form
                         document.getElementById('rating-form').submit();
                     }
                 }
             </script>

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
                         <br>
                         <div class="sidebar-item p-5 text-center position-relative" style="background-image: url(images/pexels-wendy-wei-1190297.jpg); background-size: cover;">
                             <div class="sidebar-item-content position-relative z-index2">
                                 <h3 class="mb-3 theme">feedbacks?</h3>
                                 <button type="button" class="nir-btn" data-bs-toggle="modal" data-bs-target="#myModal">
                                 feedbacks
                                </button>
                             </div>
                             <div class="theme-overlay"></div>
                         </div>

                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section>
 <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">votre feedbacks</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @include('kustomer::kustomer')
            </div>
       
        </div>
    </div>
</div>

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


 @endsection