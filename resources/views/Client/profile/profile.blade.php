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
                            // console.error('Fetch Error:', error);
                            // alert(error);
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
    <!-- header ends -->

    <!-- BreadCrumb Starts -->
    <section class="breadcrumb-main" style="background-image:url(client/images/pexels-wendy-wei-1190297.jpg);">
        <div class="breadcrumb-outer">
            <div class="container">
                <div class="breadcrumb-content text-center pt-14 pb-2">
                    <h5 class="theme mb-0">Eventiz</h5>
                    <h1 class="mb-0 white">My Account</h1>
                </div>
            </div>
        </div>
        <div class="bread-overlay"></div>
    </section>
    <!-- BreadCrumb Ends -->

    <!-- error section starts -->
    <section class="event-account pt-12 pb-8">
        <div class="container">
            @if (session('profileupdate'))
            <div class="alert alert-success">
                <center>{{session('profileupdate')}}</center>

            </div>
            @endif
            @if (session('success'))
            <div class="alert alert-success">
                <center>{{session('success')}}</center>

            </div>
            @endif

            @if (session('error'))
            <div class="alert alert-danger">
                <center>{{session('error')}}</center>

            </div>
            @endif
            <div class="event-account-in">

                <div class="d-lg-flex align-items-start row">
                    <div class="nav flex-column nav-pills col-lg-3 pe-lg-4 mb-4" id="v-pills-tab" role="tablist" aria-orientation="vertical">

                        <button class="nav-link active" id="v-pills-account-tab" data-bs-toggle="pill" data-bs-target="#v-pills-account" type="button" role="tab" aria-controls="v-pills-account" aria-selected="false">Account Details</button>
                        <button class="nav-link" id="v-pills-motdepasse-tab" data-bs-toggle="pill" data-bs-target="#v-pills-motdepasse" type="button" role="tab" aria-controls="v-pills-motdepasse" aria-selected="false">changer mot de passe</button>

                        <button class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form1').submit();" type="button">Log out</button>
                        <form id="logout-form1" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>


                    <div class="tab-content  col-lg-9 ps-lg-4 mn-4" id="v-pills-tabContent">
                        <div class="tab-pane fade  " id="v-pills-motdepasse" role="tabpanel" aria-labelledby="v-pills-motdepasse-tab">
                            <div class="col-lg-12 mb-2">
                                <div class="product-table-main p-4 border-all mb-4">
                                    <form id="password-form" method="post" action="{{ route('update_password') }}">
                                        @csrf
                                        <h6>Password Change</h6>
                                        <div class="input-password mb-2 position-relative">
                                            <label class="">Current password (leave blank to leave unchanged)</label>
                                            <input type="password" class="input-text bg-grey border-0" name="old_password" placeholder="">
                                            <span class="show-password-input position-absolute end-0 top-50 me-2 mt-1 opacity-75 cursor-pointer"><i class="fa fa-eye"></i></span>
                                            @if($errors->any('old_password'))
                                            <span class="text-danger">{{$errors->first('old_password')}}</span>
                                            @endif
                                        </div>
                               
                                <div class="input-password mb-2 position-relative">
                                    <label class="">New password (leave blank to leave unchanged)</label>
                                    <input type="password" name="new_password" class="input-text bg-grey border-0" placeholder="">
                                    <span class="show-password-input position-absolute end-0 top-50 me-2 mt-1 opacity-75 cursor-pointer"><i class="fa fa-eye"></i></span>
                                    @if($errors->any('new_password'))
                                    <span class="text-danger">{{$errors->first('new_password')}}</span>
                                    @endif
                                </div>
                                <div class="input-password position-relative">
                                    <label class="">Confirm new password</label>
                                    <input type="password" name="confirm_password" class="input-text bg-grey border-0" placeholder="">
                                    <span class="show-password-input position-absolute end-0 top-50 me-2 mt-1 opacity-75 cursor-pointer"><i class="fa fa-eye"></i></span>
                                    @if($errors->any('confirm_password'))
                                    <span class="text-danger">{{$errors->first('confirm_password')}}</span>
                                    @endif
                                </div>
                                <br>
                                <br>
                                <div class="col-lg-12">
                                    <button href="{{ route('update_password') }}" onclick="event.preventDefault();
                                                     document.getElementById('password-form').submit();" class="nir-btn">Save Changes</button>
                                </div>

                                </form>

                            </div>
                            </div>
                        </div>
                        <div class="tab-pane fade show active" id="v-pills-account" role="tabpanel" aria-labelledby="v-pills-account-tab">

                            <div class="product-table-main p-4 border-all mb-4">




                                <div class="row">
                                    <form id="profile-form" method="post" action="{{ route('EditProfile') }}" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" id="name" name="name" class="form-control" value="{{ Auth::user()->name }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" id="email" class="form-control" value="{{ Auth::user()->email }}" readonly>
                                            <div>@if ($errors->has('email'))
                                                <strong style="color: red;">{{ $errors->first('email') }}</strong>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Image</label>
                                            <input type="file" id="image" class="form-control" name="image">
                                            <div>@if ($errors->has('image'))
                                                <strong style="color: red;">{{ $errors->first('image') }}</strong>
                                                @endif
                                            </div>
                                        </div>
                                        <br>
                                        <br>
                                        
                                        <div class="form-group">
                                            <label for="email">Image</label>
                                            <td><img src="{{asset('storage/'.Auth::user()->image)}}" alt=" " class="img-fluid" width="500px" height="500px"></td>
                                           
                                        </div>

                                        <br>
                                        <br>
                                        <button class="nir-btn" href="{{ route('EditProfile') }}" onclick="event.preventDefault();
                                                     document.getElementById('profile-form').submit();" type="button">Save Changes</button>
                                    </form>
                                </div>






                            </div>

                        </div>
                        </div>
                        </div>


    </section>
    <!-- error section Ends -->

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
        <form action="{{ url('search')}}" id="search">
            <input type="search" name="q" value="{{ request()->q ??''}}" placeholder="type keyword(s) here" required />
            <button type="submit" class="btn btn-primary" onclick="event.preventDefault();
                                                     document.getElementById('search').submit();">Search</button>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Check if there's a session message for password change success and active tab
            var passwordChangeSuccess = '{{ session('
            passwordChangeSuccess ') }}';
            var activeTab = '{{ session('
            activeTab ') }}';

            if (passwordChangeSuccess && activeTab) {
                // Display the success message
                var successAlert = document.createElement('div');
                successAlert.className = 'alert alert-success';
                successAlert.innerHTML = '<center>' + passwordChangeSuccess + '</center>';

                var alertContainer = document.querySelector('.event-account-in'); // Replace with the appropriate container
                if (alertContainer) {
                    alertContainer.insertBefore(successAlert, alertContainer.firstChild);
                }

                // Activate the "changer mot de passe" tab
                var tabToActivate = document.getElementById(activeTab);
                if (tabToActivate) {
                    tabToActivate.click(); // Trigger the click event to activate the tab
                }
            }
        });
    </script>


    <!-- *Scripts* -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="client/js/jquery-3.5.1.min.js"></script>
    <script src="client/js/bootstrap.min.js"></script>
    <script src="client/js/plugin.js"></script>
    <script src="client/js/main.js"></script>
    <script src="client/js/custom-nav.js"></script>
</body>

</html>