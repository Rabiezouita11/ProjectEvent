<!doctype html>
<html lang="en">


<head>

    <meta charset="utf-8">
    <title>Form Validation | Veltrix - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description">
    <meta content="Themesbrand" name="author">
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css">
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css">
    <!-- App Css-->
    <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css">

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
                        <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="mdi mdi-bell-outline"></i>
                            <span class="badge bg-danger rounded-pill">3</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-notifications-dropdown">
                            <div class="p-3">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h5 class="m-0 font-size-16"> Notifications (258) </h5>
                                    </div>
                                </div>
                            </div>
                            <div data-simplebar style="max-height: 230px;">
                                <a href="" class="text-reset notification-item">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 me-3">
                                            <div class="avatar-xs">
                                                <span class="avatar-title bg-success rounded-circle font-size-16">
                                                    <i class="mdi mdi-cart-outline"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-1">Your order is placed</h6>
                                            <div class="font-size-12 text-muted">
                                                <p class="mb-1">Dummy text of the printing and typesetting industry.</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                                <a href="" class="text-reset notification-item">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 me-3">
                                            <div class="avatar-xs">
                                                <span class="avatar-title bg-warning rounded-circle font-size-16">
                                                    <i class="mdi mdi-message-text-outline"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-1">New Message received</h6>
                                            <div class="font-size-12 text-muted">
                                                <p class="mb-1">You have 87 unread messages</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>

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
                                            <h6 class="mb-1">Your item is shipped</h6>
                                            <div class="font-size-12 text-muted">
                                                <p class="mb-1">It is a long established fact that a reader will</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                                <a href="" class="text-reset notification-item">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 me-3">
                                            <div class="avatar-xs">
                                                <span class="avatar-title bg-primary rounded-circle font-size-16">
                                                    <i class="mdi mdi-cart-outline"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-1">Your order is placed</h6>
                                            <div class="font-size-12 text-muted">
                                                <p class="mb-1">Dummy text of the printing and typesetting industry.</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                                <a href="" class="text-reset notification-item">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 me-3">
                                            <div class="avatar-xs">
                                                <span class="avatar-title bg-danger rounded-circle font-size-16">
                                                    <i class="mdi mdi-message-text-outline"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-1">New Message received</h6>
                                            <div class="font-size-12 text-muted">
                                                <p class="mb-1">You have 87 unread messages</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="p-2 border-top">
                                <div class="d-grid">
                                    <a class="btn btn-sm btn-link font-size-14 text-center" href="javascript:void(0)">
                                        View all
                                    </a>
                                </div>
                            </div>
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
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="page-title-box">
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <h6 class="page-title">Page ajouter Events </h6>

                            </div>

                        </div>
                    </div>
                    <!-- end page title -->



                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card" style="text-align: center;">
                                <div class="card-body">
                                    <h4 class="card-title">Add New Event</h4>
                                    <form method="post" action="{{ route('addEvent') }}" name="eventForm" id="eventForm" class="row g-3" enctype="multipart/form-data">
                                        @csrf
                                        <div class="col-md-12">
                                            <label class="form-label">Nom</label>
                                            <input type="text" name="Nom" class="form-control" placeholder="Enter Nom" value="{{ old('Nom') }}" required>
                                            @if ($errors->has('Nom'))
                                            <strong style="color: red;">{{ $errors->first('Nom') }}</strong>
                                            @endif
                                        </div>
                                        <div class="col-md-12">
                                            <label class="form-label">Location</label>
                                            <select name="Location" class="form-control" required>
                                                <option value="" disabled selected>Select a Location</option>
                                                <option value="Ariana" @if(old('Location')==='Ariana' ) selected @endif>Ariana</option>
                                                <option value="Béja" @if(old('Location')==='Béja' ) selected @endif>Béja</option>
                                                <option value="Ben Arous" @if(old('Location')==='Ben Arous' ) selected @endif>Ben Arous</option>
                                                <option value="Bizerte" @if(old('Location')==='Bizerte' ) selected @endif>Bizerte</option>
                                                <option value="Gabès" @if(old('Location')==='Gabès' ) selected @endif>Gabès</option>
                                                <option value="Gafsa" @if(old('Location')==='Gafsa' ) selected @endif>Gafsa</option>
                                                <option value="Jendouba" @if(old('Location')==='Jendouba' ) selected @endif>Jendouba</option>
                                                <option value="Kairouan" @if(old('Location')==='Kairouan' ) selected @endif>Kairouan</option>
                                                <option value="Kasserine" @if(old('Location')==='Kasserine' ) selected @endif>Kasserine</option>
                                                <option value="Kebili" @if(old('Location')==='Kebili' ) selected @endif>Kebili</option>
                                                <option value="Kef" @if(old('Location')==='Kef' ) selected @endif>Kef</option>
                                                <option value="Mahdia" @if(old('Location')==='Mahdia' ) selected @endif>Mahdia</option>
                                                <option value="Manouba" @if(old('Location')==='Manouba' ) selected @endif>Manouba</option>
                                                <option value="Medenine" @if(old('Location')==='Medenine' ) selected @endif>Medenine</option>
                                                <option value="Monastir" @if(old('Location')==='Monastir' ) selected @endif>Monastir</option>
                                                <option value="Nabeul" @if(old('Location')==='Nabeul' ) selected @endif>Nabeul</option>
                                                <option value="Sfax" @if(old('Location')==='Sfax' ) selected @endif>Sfax</option>
                                                <option value="Sidi Bouzid" @if(old('Location')==='Sidi Bouzid' ) selected @endif>Sidi Bouzid</option>
                                                <option value="Siliana" @if(old('Location')==='Siliana' ) selected @endif>Siliana</option>
                                                <option value="Sousse" @if(old('Location')==='Sousse' ) selected @endif>Sousse</option>
                                                <option value="Tataouine" @if(old('Location')==='Tataouine' ) selected @endif>Tataouine</option>
                                                <option value="Tozeur" @if(old('Location')==='Tozeur' ) selected @endif>Tozeur</option>
                                                <option value="Tunis" @if(old('Location')==='Tunis' ) selected @endif>Tunis</option>
                                                <option value="Zaghouan" @if(old('Location')==='Zaghouan' ) selected @endif>Zaghouan</option>
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
                                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                                    {{ $category->Nom }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-12">
                                            <button class="btn btn-primary" type="submit">Add Event</button>
                                        </div>
                                    </form>
                                </div><!-- end cardbody -->
                            </div><!-- end card -->
                        </div>
                    </div>


                    <!-- end col -->

                    <!-- end col -->
                </div>
                <!-- end row -->



            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->


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
    <!-- end main content-->

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

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- JAVASCRIPT -->
    <script src="assets/libs/jquery/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>

    <script src="assets/libs/parsleyjs/parsley.min.js"></script>

    <script src="assets/js/pages/form-validation.init.js"></script>

    <script src="assets/js/app.js"></script>

</body>

</html>