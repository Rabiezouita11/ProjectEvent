<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="zxx">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Eventiz - Event Conference HTML Templates</title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="client/images/favicon.png">
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('client/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <!--Custom CSS-->
    <link href="{{ asset('client/css/style.css') }}" rel="stylesheet" type="text/css">
    <!--Plugin CSS-->
    <link href="{{ asset('client/css/plugin.css') }}" rel="stylesheet" type="text/css">
    <!--Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.5.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('client/fonts/line-icons.css') }}" type="text/css">
    <script src="{{ asset('vendor/kustomer/js/kustomer.js') }}" defer></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
   
    <script>
        const notificationsButton = document.getElementById('notifications-button');

        // Add a click event listener to the button
        notificationsButton.addEventListener('click', function(event) {
            // Prevent the default behavior of the link
            event.preventDefault();

            // Call your function to mark notifications as read or perform other actions
            markAllNotificationsAsRead();
        });

      

        function markAllNotificationsAsRead() {
            // Make an AJAX request to mark all notifications as read
            fetch('{{ route("notifications.markAllAsRead") }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                })
                .then(response => response.json())
                .then(data => {
                    // Hide the count
                    const countElement = document.getElementById('notification-count');


                    // Update the UI to display all notifications
                    const notificationsContainer = document.getElementById('notifications');
                    notificationsContainer.innerHTML = '';

                    if (notifications.length > 0) {
                        notifications.forEach(notification => {
                            // Create a notification item
                            const notificationItem = document.createElement('div');
                            notificationItem.className = 'notification-item';

                            // Create a message element
                            const messageElement = document.createElement('div');
                            messageElement.className = 'notification-message';
                            messageElement.textContent = notification.message;

                            // Check if the notification message contains "refused"
                            if (!notification.message.includes('refused') && notification.event_id) {
                                // Create a link for viewing event details
                                const eventLink = document.createElement('a');
                                eventLink.className = 'view-event-link';
                                eventLink.textContent = 'View Event Details';
                                eventLink.href = '{{ route("ShowEventDetails", ["id" => "_event_id_"]) }}'.replace('_event_id_', notification.event_id);

                                // Append the link to the message element
                                messageElement.appendChild(eventLink);
                            }

                            // Append the message element to the notification item
                            notificationItem.appendChild(messageElement);

                            // Append the notification item to the container
                            notificationsContainer.appendChild(notificationItem);
                        });
                    } else {
                        // If there are no notifications
                        const noNotificationsDiv = document.createElement('div');
                        noNotificationsDiv.className = 'no-notifications';
                        noNotificationsDiv.textContent = 'No notifications.';
                        notificationsContainer.appendChild(noNotificationsDiv);
                    }
                })
                .catch(error => {
                    console.error('Mark All as Read Error:', error);
                });
        }
    </script>
    <script>
        let audioPlayed = false; // Track whether the audio has been played
        const homeRoute = "{{ route('home') }}";
        const maxPollingInterval = 10000; // Maximum polling interval (5 minutes)

        function fetchNotifications() {

            fetch(homeRoute, {
                    method: 'GET',
                })
                .then(() => {
                    fetch('{{ route("notifications.index") }}', {
                            method: 'GET',
                        })
                        .then(response => response.json())
                        .then(data => {
                            updateNotificationUI(data.notifications); // Update notifications
                            updateUnreadCount(data.unread_count); // Update unread count

                          
                        })
                        .catch(error => {
                            console.error('Fetch Error:', error);
                        });
                })


            function updateNotificationUI(notifications) {
                // Update the notification UI with new notifications
                const notificationsContainer = document.getElementById('notifications');
                notificationsContainer.innerHTML = '';

                if (notifications.length > 0) {
                    notifications.forEach(notification => {
                        // Create a notification item
                        const notificationItem = document.createElement('div');
                        notificationItem.className = 'notification-item';

                        // Create a message element
                        const messageElement = document.createElement('div');
                        messageElement.className = 'notification-message';
                        messageElement.textContent = notification.message;

                        // Check if the notification message contains "refused"
                        if (!notification.message.includes('refused') && notification.event_id) {
                            // Create a link for viewing event details
                            const eventLink = document.createElement('a');
                            eventLink.className = 'view-event-link';
                            eventLink.textContent = 'View Event Details';
                            eventLink.href = '{{ route("ShowEventDetails", ["id" => "_event_id_"]) }}'.replace('_event_id_', notification.event_id);

                            // Append the link to the message element
                            messageElement.appendChild(eventLink);
                        }

                        // Append the message element to the notification item
                        notificationItem.appendChild(messageElement);

                        // Append the notification item to the container
                        notificationsContainer.appendChild(notificationItem);
                    });
                } else {
                    // If there are no notifications
                    const noNotificationsDiv = document.createElement('div');
                    noNotificationsDiv.className = 'no-notifications';
                    noNotificationsDiv.textContent = 'No notifications.';
                    notificationsContainer.appendChild(noNotificationsDiv);
                }
            }


            function updateUnreadCount(count) {
                // Update the notification count in the UI
                const countElement = document.getElementById('notification-count');
                countElement.textContent = count;
            }

            function playNotificationSound() {
                const audioElement = document.getElementById('notification-sound');
                audioElement.muted = false; // Unmute the audio
                audioElement.play() // Play the audio
                    .then(() => {
                        audioPlayed = true; // Mark audio as played
                    })
                    .catch(error => {
                        console.error('Audio Play Error:', error);
                    });
            }
        }

        // Poll for new notifications every 30 seconds (adjust as needed)


        // Continue polling with the adjusted interval
        setTimeout(fetchNotifications, 30000);

        // Fetch notifications initially when the page loads
        fetchNotifications();
    </script>

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
                            <a class="navbar-brand" href="{{route('home')}}">
                                <img src="{{ asset('client/images/logo-white.png') }}" alt="image">
                                <img src="{{ asset('client/images/logo.png') }}" alt="image">
                            </a>
                        </div>
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="navbar-collapse1 d-flex align-items-center" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav" id="responsive-menu">
                                <li class="dropdown submenu active">
                                    <a href="{{route('home')}}" class="">Home</a>
                                </li>

                                <li><a href="{{ url('about' )}}" class="">About Us</a></li>

                                <li class="submenu dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Categories <i class="fas fa-caret-down ms-1" aria-hidden="true"></i></a>
                                    <ul class="dropdown-menu">
                                        @foreach($categories as $category)
                                        <li><a href="{{route('ShowEventByCategory', $category->id)}}">{{$category->Nom}}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                                @guest
                                @else
                                <li><a href="{{ url('historique' )}}" class="">Historique</a></li>
                                @endguest
                                <!-- resources/views/notifications.blade.php -->



                                <li><a href="{{ url('contact') }}" class="">Contact Us</a></li>




                                @guest
                                @if (Route::has('login'))
                                <li>
                                    <a href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                @endif

                                @if (Route::has('register'))
                                <li>
                                    <a href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                                @endif
                                @else


                                <li class="submenu dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> {{ Auth::user()->name }} <i class="fas fa-caret-down ms-1" aria-hidden="true"></i></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{route('profileclient')}}">Mon Compte</a></li>
                                        <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout</a></li>

                                    </ul>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>

                                @if (Auth::user()->role == 'demandeur')

                                <li class="submenu dropdown">

                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" id="notifications-button" aria-haspopup="true" aria-expanded="false" onclick="markAllNotificationsAsRead()"> notifications <span id="notification-count">0</span>
                                        <i class="fas fa-caret-down ms-1" aria-hidden="true"></i></a>
                                    <ul class="dropdown-menu">
                                        <div id="notifications">
                                            @if (isset($notifications) && count($notifications) > 0)

                                            @foreach ($notifications as $notification)
                                            <li>{{ $notification->message }}</li>

                                            @endforeach
                                            @else
                                            <li>No notifications.</li>
                                            @endif
                                        </div>
                                    </ul>

                        </div>


                        </li>
                        @endguest

                        @if (Auth::user()->role == 'demandeur')
                        <li>
                            <a href="#" style="color: #f2f2f2;" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" data-bs-toggle="modal" data-bs-target="#exampleModal">Ajouter un evenement</a>

                        </li> @endif


                        @endguest





                        </ul>
                    </div><!-- /.navbar-collapse -->
                    <li class="search-main">
                        <a href="#search1" class="mt_search"><i class="fa fa-search fs-5"></i></a>
                    </li>

                    <div id="slicknav-mobile"></div>
                </div>
        </div><!-- /.container-fluid -->
        </nav>
        </div>
        <!-- Navigation Bar Ends -->
    </header>

    <style>
        /* Style the modal background */
        .modal-content {
            background-color: #ffffff;
            border-radius: 10px;
        }

        /* Style the modal title */
        .modal-title {
            color: #333;
        }

        /* Style the modal body */
        .modal-body {
            font-size: 18px;
            color: #555;
        }

        /* Style the modal footer */
        .modal-footer {
            background-color: #f2f2f2;
            border-top: none;
        }

        /* Style the close button */
        .modal-content .close {
            font-size: 24px;
            color: #555;
        }

        /* Style the close button on hover */
        .modal-content .close:hover {
            color: #333;
        }
    </style>

    </style>
    <center> @if (session('Demandeur'))
        <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">

                    <div class="modal-body">
                        <div class="text-center">
                            <i class="fas fa-check-circle fa-4x text-success mb-3"></i>
                            <p>Votre demande d'événement a été envoyée avec succès à l'administrateur. Veuillez patienter pour leur réponse.</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    </div>
                </div>
            </div>
        </div>


        @endif
    </center>


    <!-- header ends -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ajouter un événement</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Place your form here -->
                    <form method="post" action="{{ route('addEventByDemandeur') }}" name="eventForm" id="eventForm" class="row g-3" enctype="multipart/form-data" onsubmit="showSuccessModal(event)">
                        @csrf
                        <div class="col-md-12">
                            <label class="form-label">Nom</label>
                            <input type="text" name="Nom" class="form-control" placeholder="Enter Nom" value="{{ old('Nom') }}" required>
                            @if ($errors->has('Nom'))
                            <strong style="color: red;">{{ $errors->first('Nom') }}</strong>
                            @endif
                        </div>
                        <div id="validation-errors" style="display: none">
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </div>
                        <input type="hidden" name="status" value="En attente" class="form-control">
                        <div class="col-md-12">
                            <label class="form-label">Location</label>
                            <select name="Location" class="form-control" required>

                                <option style="color:black" value="" disabled selected>Select a Location</option>
                                <option style="color:black" value="Ariana" @if(old('Location')==='Ariana' ) selected @endif>Ariana</option>
                                <option style="color:black" value="Béja" @if(old('Location')==='Béja' ) selected @endif>Béja</option>
                                <option style="color:black" value="Ben Arous" @if(old('Location')==='Ben Arous' ) selected @endif>Ben Arous</option>
                                <option style="color:black" value="Bizerte" @if(old('Location')==='Bizerte' ) selected @endif>Bizerte</option>
                                <option style="color:black" value="Gabès" @if(old('Location')==='Gabès' ) selected @endif>Gabès</option>
                                <option style="color:black" value="Gafsa" @if(old('Location')==='Gafsa' ) selected @endif>Gafsa</option>
                                <option style="color:black" value="Jendouba" @if(old('Location')==='Jendouba' ) selected @endif>Jendouba</option>
                                <option style="color:black" value="Kairouan" @if(old('Location')==='Kairouan' ) selected @endif>Kairouan</option>
                                <option style="color:black" value="Kasserine" @if(old('Location')==='Kasserine' ) selected @endif>Kasserine</option>
                                <option style="color:black" value="Kebili" @if(old('Location')==='Kebili' ) selected @endif>Kebili</option>
                                <option style="color:black" value="Kef" @if(old('Location')==='Kef' ) selected @endif>Kef</option>
                                <option style="color:black" value="Mahdia" @if(old('Location')==='Mahdia' ) selected @endif>Mahdia</option>
                                <option style="color:black" value="Manouba" @if(old('Location')==='Manouba' ) selected @endif>Manouba</option>
                                <option style="color:black" value="Medenine" @if(old('Location')==='Medenine' ) selected @endif>Medenine</option>
                                <option style="color:black" value="Monastir" @if(old('Location')==='Monastir' ) selected @endif>Monastir</option>
                                <option style="color:black" value="Nabeul" @if(old('Location')==='Nabeul' ) selected @endif>Nabeul</option>
                                <option style="color:black" value="Sfax" @if(old('Location')==='Sfax' ) selected @endif>Sfax</option>
                                <option style="color:black" value="Sidi Bouzid" @if(old('Location')==='Sidi Bouzid' ) selected @endif>Sidi Bouzid</option>
                                <option style="color:black" value="Siliana" @if(old('Location')==='Siliana' ) selected @endif>Siliana</option>
                                <option style="color:black" value="Sousse" @if(old('Location')==='Sousse' ) selected @endif>Sousse</option>
                                <option style="color:black" value="Tataouine" @if(old('Location')==='Tataouine' ) selected @endif>Tataouine</option>
                                <option style="color:black" value="Tozeur" @if(old('Location')==='Tozeur' ) selected @endif>Tozeur</option>
                                <option style="color:black" value="Tunis" @if(old('Location')==='Tunis' ) selected @endif>Tunis</option>
                                <option style="color:black" value="Zaghouan" @if(old('Location')==='Zaghouan' ) selected @endif>Zaghouan</option>
                            </select>
                            @if ($errors->has('Location'))
                            <strong style="color: red;">{{ $errors->first('Location') }}</strong>
                            @endif
                        </div>

                        <div class="col-md-12">
                            <label class="form-label">Nombre_total_abonnés</label>
                            <input type="number" name="Nombre_total_abonnés" class="form-control" placeholder="Enter Nombre_total_abonnés" value="{{ old('Nombre_total_abonnés') }}" required>
                            @if ($errors->has('Nombre_total_abonnés'))
                            <strong style="color: red;">{{ $errors->first('Nombre_total_abonnés') }}</strong>
                            @endif
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Prix</label>
                            <input type="number" name="Prix" class="form-control" placeholder="Enter Prix" value="{{ old('Prix') }}" required>
                            @if ($errors->has('Prix'))
                            <strong style="color: red;">{{ $errors->first('Prix') }}</strong>
                            @endif
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Start Date</label>
                            <input type="date" name="start_date" class="form-control" value="{{ old('start_date') }}" required>
                            @if ($errors->has('start_date'))
                            <strong style="color: red;">{{ $errors->first('start_date') }}</strong>
                            @endif
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">End Date</label>
                            <input type="date" name="end_date" class="form-control" value="{{ old('end_date') }}" required>
                            @if ($errors->has('end_date'))
                            <strong style="color: red;">{{ $errors->first('end_date') }}</strong>
                            @endif
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Start Time</label>
                            <input type="time" name="start_time" class="form-control" value="{{ old('start_time') }}" required>
                            @if ($errors->has('start_time'))
                            <strong style="color: red;">{{ $errors->first('start_time') }}</strong>
                            @endif
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">End Time</label>
                            <input type="time" name="end_time" class="form-control" value="{{ old('end_time') }}" required>
                            @if ($errors->has('end_time'))
                            <strong style="color: red;">{{ $errors->first('end_time') }}</strong>
                            @endif
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Description</label>
                            <textarea name="Description" class="form-control" placeholder="Enter Description" required>{{ old('Description') }}</textarea>
                            @if ($errors->has('Description'))
                            <strong style="color: red;">{{ $errors->first('Description') }}</strong>
                            @endif
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Image</label>
                            <input type="file" name="Image" class="form-control" accept="image/*" required>
                            @if ($errors->has('Image'))
                            <strong style="color: red;">{{ $errors->first('Image') }}</strong>
                            @endif
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Category</label>
                            <select name="category_id" class="form-control" required>
                                <option value="">Select Category</option>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}" style="color:black;" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->Nom }}
                                </option>
                                @endforeach
                            </select>
                            @if ($errors->has('category_id'))
                            <strong style="color: red;">{{ $errors->first('category_id') }}</strong>
                            @endif
                        </div>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    <button type="submit" href="{{ route('addEventByDemandeur') }}" form="eventForm" class="btn btn-primary" onclick="event.preventDefault();  document.getElementById('eventForm').submit();">Ajouter l'événement</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    @yield('content')

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
        <form action="{{ url('search')}}" id="search">
            <input type="search" name="q" value="{{ request()->q ??''}}" placeholder="type keyword(s) here" required />
            <button type="submit" class="btn btn-primary" onclick="event.preventDefault();
                                                     document.getElementById('search').submit();">Search</button>
        </form>
    </div>


    <!-- *Scripts* -->
    <script>
        $(document).ready(function() {
            var validationErrors = $('#validation-errors').html();

            if (validationErrors.trim() !== '') {
                $('#exampleModal').modal('show');
            }
        });
    </script>
    <script>
        $(document).ready(function() {
            // Check if the session variable 'azer' is set
            @if(session('Demandeur'))
            // Show the success modal
            $('#successModal').modal('show');
            @endif
        });
    </script>

    <style>
        /* CSS styles for notification items */
        .notification-item {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
            background-color: #f5f5f5;
        }

        /* CSS styles for notification messages */
        .notification-message {
            font-size: 16px;
            color: #333;
            margin-bottom: 5px;
        }

        /* CSS styles for the "View Event Details" link */
        .view-event-link {
            color: #007bff;
            text-decoration: none;
            margin-top: 5px;
            display: block;
        }

        /* CSS styles for the "No notifications" message */
        .no-notifications {
            font-size: 18px;
            font-weight: bold;
            color: #888;
            text-align: center;
            margin: 20px 0;
        }
    </style>

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Include Bootstrap JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="{{asset('client/js/jquery-3.5.1.min.js')}}"></script>
    <script src="{{asset('client/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('client/js/plugin.js')}}"></script>
    <script src="{{asset('client/js/main.js')}}"></script>
    <script src="{{asset('client/js/custom-nav.js')}}"></script>
</body>


</html>