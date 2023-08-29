@extends ('Admin.Layouts.index')







@section ('content')




<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h6 class="page-title">Liste des avis</h6>

                    </div>

                </div>
            </div>
            <!-- end page title -->




            <!-- end row -->



            <!-- end col -->

            <!-- end row -->


            <!-- end row -->


            <!-- end row -->


            <!-- end row -->

            <center> @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
                @endif
            </center>
            <center> @if (session('supprimer'))
                <div class="alert alert-danger" role="alert">
                    {{ session('supprimer') }}
                </div>
                @endif
            </center>
            <center> @if (session('modifier'))
                <div class="alert alert-info" role="alert">
                    {{ session('modifier') }}
                </div>
                @endif
            </center>




            <div class="row">

                <div class="col-lg-12">
                    <div class="card">

                        <div class="card-body">
                            <h4 class="card-title">


                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Réaction</th>
                                                <th scope="col">Message</th>
                                                <th scope="col">Nom de l'utilisateur</th>
                                                <th scope="col">Date de création</th>
                                                <th scope="col">Mail</th>

                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr>
                                                @foreach ($feedbacks as $feed )
                                                @foreach ($users as $user )

                                                <?php

                                                $id = $user->id;
                                               

                                                ?>
                                                @if ($feed->user_info == "[$id]")
                                              
                                                <td> {{$feed->id}}</td>
                                                <td> {{$feed->type}}</td>
                                                <td> {{$feed->message}}</td>
                                                <td> {{$user->name}}</td>
                                                <td> {{$feed->created_at}}</td>
                                                <td> {{$user->email}}</td>
    


                                            </tr>
                                            @endif
                                            @endforeach
                                            @endforeach
                                            <!-- Delete Confirmation Modal -->

                                            <!-- Modal -->



                                        </tbody>
                                    </table>
                                    <div class="text-centre">

                                        {{$feedbacks->links()}}

                                    </div>
                                </div>

                        </div>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->



    <!-- end main content-->




















    @endsection