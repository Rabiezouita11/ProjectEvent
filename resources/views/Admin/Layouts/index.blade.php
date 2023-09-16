<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <title>Administartion</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description">
    <meta content="Themesbrand" name="author">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('logo mini.png') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css">
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css">
    <!-- App Css-->
    <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css">
    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

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

                        <a href="{{route('admin')}}" class="logo logo-light">
                            <span class="logo-sm">
                                <img src="{{ asset('logo mini.png') }}" alt="" height="40">
                            </span>
                            <span class="logo-lg">
                                <img src="{{ asset('client/images/logo-white.png') }}" alt="" height="50">
                            </span>
                        </a>
                    </div>

                    <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                        <i class="mdi mdi-menu"></i>
                    </button>

                </div>

                <div class="d-flex">
                    <!-- App Search-->
                    

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

                 

                    <div class="dropdown d-none d-lg-inline-block">
                        <button type="button" class="btn header-item noti-icon waves-effect" data-bs-toggle="fullscreen">
                            <i class="mdi mdi-fullscreen"></i>
                        </button>
                    </div>

                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item noti-icon waves-effect" id="notifications-button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                          
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-danger" href="{{route('logoutt')}}"><i class="bx bx-power-off font-size-17 align-middle me-1 text-danger"></i> Déconnexion</a>
                        </div>
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
                        </script>
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

    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const notificationsList = document.getElementById('notifications');
            const notificationCount = document.getElementById('notification-count');
            let countValue = parseInt(localStorage.getItem('adminNotificationCount')) || 0;

            // Retrieve notifications from local storage
            const storedNotifications = JSON.parse(localStorage.getItem('adminNotifications')) || [];

            // Display all stored notifications
            storedNotifications.forEach((content) => {
                addNotification(content); // Define the addNotification function (see below)
            });

            // Update the notification count in the button
            notificationCount.textContent = countValue;
            notificationCount.setAttribute('data-count', countValue);

            // Listen for new notifications from the WebSocket
            const echo = window.Echo.channel('AdminChannel');
            echo.listen('.App\\Events\\AdminChannel', (e) => {
                // Add the new notification to the notifications list
                const notification = e.message; // Use the message as the notification content

                // Create a new notification item
                addNotification(notification);

                // Increment the count and update the button count
                countValue++;
                notificationCount.textContent = countValue;
                notificationCount.setAttribute('data-count', countValue);

                // Save all notifications in local storage
                storedNotifications.push(notification);
                localStorage.setItem('adminNotifications', JSON.stringify(storedNotifications));
                localStorage.setItem('adminNotificationCount', countValue.toString());
            });

            // Add a click event listener to the notifications button
            const notificationsButton = document.getElementById('notifications-button');
            notificationsButton.addEventListener('click', function() {
                // Set the count to 0 and update the button count
                countValue = 0;
                notificationCount.textContent = countValue;
                notificationCount.setAttribute('data-count', countValue);

                // Save the new count value in local storage
                localStorage.setItem('adminNotificationCount', countValue.toString());
            });

            // Define a function to add a new notification to the list
            function addNotification(content) {
                // Create a new notification item
                const notificationItem = document.createElement('a');
                notificationItem.className = 'text-reset notification-item';
                notificationItem.href = ''; // Add your notification link here

                // Create the notification content element
                const notificationContent = document.createElement('div');
                notificationContent.className = 'd-flex';

                const avatarContainer = document.createElement('div');
                avatarContainer.className = 'flex-shrink-0 me-3';
                avatarContainer.innerHTML = `
                    <div class="avatar-xs">
                        <span class="avatar-title bg-info rounded-circle font-size-15">
                            <i class="mdi mdi-glass-cocktail"></i>
                        </span>
                    </div>
                `;

                const textContainer = document.createElement('div');
                textContainer.className = 'flex-grow-1';
                textContainer.innerHTML = `
                    <div class="font-size-15 text-muted">
                        <p class="mb-1">${content}</p>
                    </div>
                `;

                notificationContent.appendChild(avatarContainer);
                notificationContent.appendChild(textContainer);
                notificationItem.appendChild(notificationContent);
                notificationsList.appendChild(notificationItem);
            }
        });
    </script>
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