@extends('Admin.Layouts.index')


@section('content')





<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h6 class="page-title">Dashboard</h6>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item active">Bienvenue sur votre tableau de bord</li>
                        </ol>
                    </div>

                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card mini-stat bg-primary text-white">
                        <div class="card-body">
                            <div class="mb-4">
                                <div class="float-start mini-stat-img me-4">
                                    <i class="fas fa-users" style="font-size: 20px;"></i>
                                </div>
                                <h5 class="font-size-30 text-uppercase text-white-50">Utilisateurs</h5>
                                <h4 class="fw-large font-size-30">{{$users}} </h4>

                            </div>
                            <div class="pt-2">


                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card mini-stat bg-primary text-white">
                        <div class="card-body">
                            <div class="mb-4">
                                <div class="float-start mini-stat-img me-4">
                                <i class='fa fa-check'></i>
                              
                                </div>
                                <h5 class="font-size-30 text-uppercase text-white-50">Événements</h5>
                                <h4 class="fw-large font-size-30">{{$events}} </h4>

                            </div>
                            <div class="pt-2">


                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card mini-stat bg-primary text-white">
                        <div class="card-body">
                            <div class="mb-4">
                                <div class="float-start mini-stat-img me-4">
                                <i class="fas fa-dollar-sign" style="font-size: 20px;"></i>
                                </div>
                                <h5 class="font-size-30 text-uppercase text-white-50">Reservations</h5>
                                <h4 class="fw-large font-size-30">{{$reservations}} </h4>

                            </div>
                            <div class="pt-2">


                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card mini-stat bg-primary text-white">
                        <div class="card-body">
                            <div class="mb-4">
                                <div class="float-start mini-stat-img me-4">
                                <i class="fas fa-comments" style="font-size: 20px;"></i>
                                </div>
                                <h5 class="font-size-30 text-uppercase text-white-50">les commentaires</h5>
                                <h4 class="fw-large font-size-30">{{$feedbacks}} </h4>

                            </div>
                            <div class="pt-2">


                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card mini-stat bg-primary text-white">
                        <div class="card-body">
                            <div class="mb-4">
                                <div class="float-start mini-stat-img me-4">
                                    <img src="assets/images/services-icon/04.png" alt="">

                                </div>
                                <h5 class="font-size-30 text-uppercase text-white-50">categories</h5>
                                <h4 class="fw-large font-size-30">{{$categories}}</h4>

                            </div>
                            <div class="pt-2">


                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row">
                <div class="col-xl-9">
                    <div class="card">

                    </div>
                    <!-- end card -->
                </div>

            </div>
            <!-- end row -->


            <!-- end row -->


            <!-- end row -->



        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->























    @endsection