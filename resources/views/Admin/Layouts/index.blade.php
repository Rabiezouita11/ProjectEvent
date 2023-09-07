<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <title>Basic Tables | Veltrix - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description">
    <meta content="Themesbrand" name="author">
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css">
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css">
    <!-- App Css-->
    <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css">
    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <!-- <script>
        const notificationsButton = document.getElementById('notifications-button');

        // Add a click event listener to the button
        notificationsButton.addEventListener('click', function(event) {
            // Prevent the default behavior of the link
            event.preventDefault();

            // Call your function to mark notifications as read or perform other actions
            markAllNotificationsAsRead();
        });

        // Add a hover event listener to the button
        // notificationsButton.addEventListener('mouseenter', function() {
        //     // Call your function when the mouse enters the button (hover)
        //     markAllNotificationsAsRead();
        // });

        function markAllNotificationsAsRead() {
            // Make an AJAX request to mark all notifications as read
            fetch('{{ route("notifications.markAllAsReadAdmin") }}', {
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

                            // Create a link for viewing event details
                            const eventLink = document.createElement('a');
                            eventLink.className = 'view-event-link';
                            eventLink.textContent = 'View Event Details';
                            eventLink.href = '{{ route("ShowEventDetails", ["id" => "_event_id_"]) }}'.replace('_event_id_', notification.event_id);

                            // Append the link to the message element
                            messageElement.appendChild(eventLink);


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
        const homeRoute = "{{ route('admin') }}";
        const maxPollingInterval = 10000; // Maximum polling interval (5 minutes)

        function fetchNotifications() {

            fetch(homeRoute, {
                    method: 'GET',
                })
                .then(() => {
                    fetch('{{ route("AdminNotification") }}', {
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
                        // Create a link for viewing event details
                        const eventLink = document.createElement('a');
                        eventLink.className = 'view-event-link';
                        eventLink.textContent = 'View Event Details';
                        eventLink.href = '{{ route("eventsByDemandeur")}}';

                        // Append the link to the message element
                        messageElement.appendChild(eventLink);


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
        setTimeout(fetchNotifications, 30000);


        // Fetch notifications initially when the page loads
        fetchNotifications();
    </script> -->

</head>

<body data-sidebar="dark">

    <!-- Begin page -->
    <div id="layout-wrapper">


        <header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">
                    <!-- LOGO -->
                    <div class="navbar-brand-box">
                        <a href="index.html" class="logo logo-dark">
                            <span class="logo-sm">
                                <img src="assets/images/logo-sm.png" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="assets/images/logo-dark.png" alt="" height="17">
                            </span>
                        </a>

                        <a href="index.html" class="logo logo-light">
                            <span class="logo-sm">
                                <img src="assets/images/logo-sm.png" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="assets/images/logo-light.png" alt="" height="18">
                            </span>
                        </a>
                    </div>

                    <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                        <i class="mdi mdi-menu"></i>
                    </button>

                    <div class="d-none d-sm-block">
                        <div class="dropdown pt-3 d-inline-block">
                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Create <i class="mdi mdi-chevron-down"></i>
                            </a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Separated link</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex">
                    <!-- App Search-->
                    <form class="app-search d-none d-lg-block">
                        <div class="position-relative">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="fa fa-search"></span>
                        </div>
                    </form>

                    <div class="dropdown d-inline-block d-lg-none ms-2">
                        <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="mdi mdi-magnify"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-search-dropdown">

                            <form class="p-3">
                                <div class="form-group m-0">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="dropdown d-none d-md-block ms-2">
                        <button type="button" class="btn header-item waves-effect" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="me-2" src="assets/images/flags/us_flag.jpg" alt="Header Language" height="16"> English <span class="mdi mdi-chevron-down"></span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <img src="assets/images/flags/germany_flag.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle"> German </span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <img src="assets/images/flags/italy_flag.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle"> Italian </span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <img src="assets/images/flags/french_flag.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle"> French </span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <img src="assets/images/flags/spain_flag.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle"> Spanish </span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <img src="assets/images/flags/russia_flag.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle"> Russian </span>
                            </a>
                        </div>
                    </div>

                    <div class="dropdown d-none d-lg-inline-block">
                        <button type="button" class="btn header-item noti-icon waves-effect" data-bs-toggle="fullscreen">
                            <i class="mdi mdi-fullscreen"></i>
                        </button>
                    </div>

                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item noti-icon waves-effect" id="notifications-button" onclick="markAllNotificationsAsRead()" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="mdi mdi-bell-outline"></i>
                            <span class="badge bg-danger rounded-pill" id="notification-count">0</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-notifications-dropdown">
                            <div class="p-3">
                                <div class="row align-items-center">
                                    <div class="col">
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div data-simplebar style="max-height: 230px;">


                                <div id="notifications">
                                    @if (isset($notifications) && count($notifications) > 0)
                                    @foreach ($notifications as $notification)
                                    <a href="" class="text-reset notification-item">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0 me-3">
                                                <div class="avatar-xs">
                                                    <span class="avatar-title bg-info rounded-circle font-size-16">
                                                        <i class="mdi mdi-glass-cocktail"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="mb-1">
                                                </h6>
                                                <div class="font-size-12 text-muted">
                                                    <p class="mb-1">{{ $notification->message }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    @endforeach
                                    @else
                                    <a href="" class="text-reset notification-item">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0 me-3">
                                                <div class="avatar-xs">

                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="mb-1">
                                                </h6>
                                                <div class="font-size-12 text-muted">
                                                    <p class="mb-1">No notifications.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>

                                    @endif

                                </div>



                            </div>
                            <!-- <div class="p-2 border-top">
                                <div class="d-grid">
                                    <a class="btn btn-sm btn-link font-size-14 text-center" href="javascript:void(0)">
                                        View all
                                    </a>
                                </div>
                            </div> -->
                        </div>
                    </div>

                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="rounded-circle header-profile-user" src="assets/images/users/user-4.jpg" alt="Header Avatar">
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            <a class="dropdown-item" href="#"><i class="mdi mdi-account-circle font-size-17 align-middle me-1"></i> Profile</a>
                            <a class="dropdown-item" href="#"><i class="mdi mdi-wallet font-size-17 align-middle me-1"></i> My Wallet</a>
                            <a class="dropdown-item d-flex align-items-center" href="#"><i class="mdi mdi-cog font-size-17 align-middle me-1"></i> Settings<span class="badge bg-success ms-auto">11</span></a>
                            <a class="dropdown-item" href="#"><i class="mdi mdi-lock-open-outline font-size-17 align-middle me-1"></i> Lock screen</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-danger" href="#"><i class="bx bx-power-off font-size-17 align-middle me-1 text-danger"></i> Logout</a>
                        </div>
                    </div>

                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                            <i class="mdi mdi-cog-outline"></i>
                        </button>
                    </div>

                </div>
            </div>
        </header>

        <!-- ========== Left Sidebar Start ========== -->
        @extends('Admin.sidebar.sidebar')
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        @yield('content')

        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        © <script>
                            document.write(new Date().getFullYear())
                        </script> Veltrix<span class="d-none d-sm-inline-block"> - Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand.</span>
                    </div>
                </div>
            </div>
        </footer>


    </div>
    </div>
    <!-- END layout-wrapper -->

    <!-- Right Sidebar -->
    <div class="right-bar">
        <div data-simplebar class="h-100">
            <div class="rightbar-title px-3 py-4">
                <a href="javascript:void(0);" class="right-bar-toggle float-end">
                    <i class="mdi mdi-close noti-icon"></i>
                </a>
                <h5 class="m-0">Settings</h5>
            </div>

            <!-- Settings -->
            <hr class="mt-0" />
            <h6 class="text-center">Choose Layouts</h6>

            <div class="p-4">
                <div class="mb-2">
                    <img src="assets/images/layouts/layout-1.jpg" class="img-fluid img-thumbnail" alt="">
                </div>
                <div class="form-check form-switch mb-3">
                    <input type="checkbox" class="form-check-input theme-choice" id="light-mode-switch" checked />
                    <label class="form-check-label" for="light-mode-switch">Light Mode</label>
                </div>

                <div class="mb-2">
                    <img src="assets/images/layouts/layout-2.jpg" class="img-fluid img-thumbnail" alt="">
                </div>
                <div class="form-check form-switch mb-3">
                    <input type="checkbox" class="form-check-input theme-choice" id="dark-mode-switch" data-bsStyle="assets/css/bootstrap-dark.min.css" data-appStyle="assets/css/app-dark.min.css" />
                    <label class="form-check-label" for="dark-mode-switch">Dark Mode</label>
                </div>

                <div class="mb-2">
                    <img src="assets/images/layouts/layout-3.jpg" class="img-fluid img-thumbnail" alt="">
                </div>
                <div class="form-check form-switch mb-5">
                    <input type="checkbox" class="form-check-input theme-choice" id="rtl-mode-switch" data-appStyle="assets/css/app-rtl.min.css" />
                    <label class="form-check-label" for="rtl-mode-switch">RTL Mode</label>
                </div>
                <div class="d-grid">
                    <a href="https://1.envato.market/grNDB" class="btn btn-primary mt-3" target="_blank"><i class="mdi mdi-cart me-1"></i> Purchase Now</a>
                </div>
            </div>

        </div> <!-- end slimscroll-menu-->
    </div>
    <!-- /Right-bar -->


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


    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>



    <!-- JAVASCRIPT -->
    <script src="assets/libs/jquery/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>


    <script src="assets/js/app.js"></script>

</body>

</html>