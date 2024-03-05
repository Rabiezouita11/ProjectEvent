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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
                        <div class="navbar-collapse1  align-items-center" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav" id="responsive-menu">
                                <li class="dropdown submenu active">
                                    <a href="{{route('home')}}" class="">Home</a>
                                </li>

                                <li><a href="{{ url('about' )}}" class="">À PROPOS </a></li>

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



                                <li><a href="{{ url('contact') }}" class="">Contactez</a></li>




                                @guest
                                @if (Route::has('login'))
                                <li>
                                    <a href="{{ route('login') }}">{{ __(' Se connecter') }}</a>
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
                                                     document.getElementById('logout-form').submit();">Se déconnecter</a></li>

                                    </ul>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>

                                @if (Auth::user()->role == 'demandeur')

                                <li class="submenu dropdown">

                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" id="notifications-button" aria-haspopup="true" aria-expanded="false"> notifications <span id="notification-count" data-count="0">0</span>




                                        <i class="fas fa-caret-down ms-1" aria-hidden="true"></i></a>
                                    <ul class="dropdown-menu" id="notifications-list">
                                        <div id="notifications">
                                            <!-- Notifications will be added here dynamically -->
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




                        <li class="search-main">
                        <a href="#search1" class="mt_search"><i class="fa fa-search fs-5"></i></a>
                    </li>
                    </ul>
                    </div><!-- /.navbar-collapse -->
                    <div id="slicknav-mobile"></div> <!-- This div is required for slicknav to work -->

                    </div><!-- /.navbar-collapse -->
                  


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
                        @if ($errors->has('Nom') || $errors->has('Location') || $errors->has('Nombre_total_abonnés') || $errors->has('Prix') || $errors->has('start_date') || $errors->has('end_date') || $errors->has('start_time') || $errors->has('end_time') || $errors->has('Description') || $errors->has('Image') || $errors->has('category_id'))
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
                        <h4 class="white mb-4">Lien rapide</h4>
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
                        <h4 class="white mb-4">Entrer en contact</h4>
                        <p class="mb-3">8 Rue Abu elkacem chebbi</p>
                        <div class="footer-contact d-flex align-items-center mb-3">
                            <i class="fa fa-phone white fs-4"></i>
                            <div class="footer-contact-content ps-3">
                                <h6 class="white mb-0">(+216) 93966440</h6>
                                <small class="white">For Information</small>
                            </div>
                        </div>
                        <div class="footer-contact d-flex align-items-center">
                            <i class="fa fa-envelope white fs-4"></i>
                            <div class="footer-contact-content ps-3">
                                <h6 class="white mb-0">benarfaakrem@gmail.com</h6>
                                <small class="white">Email Address</small>
                            </div>
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
            <input type="search" name="q" value="{{ request()->q ??''}}" placeholder="Tapez le(s) mot(s)-clé(s) ici" required />
            <button type="submit" class="btn btn-primary" onclick="event.preventDefault();
                                                     document.getElementById('search').submit();">Search</button>
        </form>
    </div>


    <!-- *Scripts* -->


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
    @guest



    @else
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Get the user ID (You need to set this based on your authentication logic)
            const userId = '{{ Auth::id() }}';

            // Function to add a notification to the list and local storage
            function addNotification(message) {
                // Create a new list item for the notification
                const notificationItem = document.createElement('li');
                notificationItem.className = 'notification-item';

                // Create the notification content element
                const notificationContent = document.createElement('div');
                notificationContent.innerHTML = message;

                // Add the notification content to the list item
                notificationItem.appendChild(notificationContent);

                // Add the new notification to the notifications list
                notificationsList.appendChild(notificationItem);
            }

            // Get notifications list and count elements
            const notificationsList = document.getElementById('notifications-list');
            const notificationCount = document.getElementById('notification-count');
            const noNotificationsMessage = document.createElement('li');
            noNotificationsMessage.textContent = 'No notifications';

            // Initialize the notification count from local storage
            let countValue = parseInt(localStorage.getItem(`notificationCount_${userId}`)) || 0;
            notificationCount.textContent = countValue;
            notificationCount.setAttribute('data-count', countValue);

            // Initialize the notifications list from local storage
            const storedNotifications = JSON.parse(localStorage.getItem(`notifications_${userId}`)) || [];

            // Load existing notifications from local storage
            if (storedNotifications.length === 0) {
                // If local storage is empty, hide the message

                noNotificationsMessage.style.display = 'none';


            } else {


                // determine if the "No notifications" message is in the list




                if (storedNotifications.length > 0) {
                    // remove the "No notifications" message



                    // If there are notifications, display them
                    storedNotifications.forEach((notification) => {
                        addNotification(notification);
                    });
                }

                // If there are notifications, display them

            }

            // Initialize Echo for the private channel
            const echo = window.Echo.private(`myPrivateChannel.user.${userId}`);

            // Listen for notifications
            echo.listen('.App\\Events\\PrivateChannelUser', (e) => {
                // Check if the notification already exists in local storage
                if (!storedNotifications.includes(e.message)) {
                    addNotification(e.message);

                    // Update the notification count
                    countValue++;
                    notificationCount.textContent = countValue;
                    notificationCount.setAttribute('data-count', countValue);

                    // Add the new notification to the local storage
                    storedNotifications.push(e.message);
                    localStorage.setItem(`notifications_${userId}`, JSON.stringify(storedNotifications));
                    localStorage.setItem(`notificationCount_${userId}`, countValue);

                    // Hide the "No notifications" message
                    noNotificationsMessage.style.display = 'none';
                }
            });

            // Add a click event listener to the notifications button
            const notificationsButton = document.getElementById('notifications-button');
            notificationsButton.addEventListener('click', () => {
                // Reset the notification count to 0
                countValue = 0;
                notificationCount.textContent = countValue;
                notificationCount.setAttribute('data-count', countValue);

                // Update the local storage count
                localStorage.setItem(`notificationCount_${userId}`, countValue);
            });
        });
    </script>

    <style>
        /* Style for the container of notification items */
        .notification-list {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        /* Style for each notification item */
        .notification-item {
            display: flex;
            align-items: center;
            background-color: #f5f5f5;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 10px;
            padding: 10px;
        }

        /* Style for notification links */
        .notification-link {
            color: #007bff;
            text-decoration: none;
            margin-left: 10px;
        }

        /* Add a hover effect for better user experience */
        .notification-item:hover {
            background-color: #e0e0e0;
            transition: background-color 0.3s ease-in-out;
        }
    </style>
    @endguest

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Include Bootstrap JavaScript -->

    <script src="{{asset('client/js/jquery-3.5.1.min.js')}}"></script>
    <script src="{{asset('client/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('client/js/plugin.js')}}"></script>
    <script src="{{asset('client/js/main.js')}}"></script>
    <script src="{{asset('client/js/custom-nav.js')}}"></script>
</body>


</html>