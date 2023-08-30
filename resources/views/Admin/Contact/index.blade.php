@extends ('Admin.Layouts.index')

@section ('content')




<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h6 class="page-title">Liste des  avis</h6>

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
                                                <th>#</th>
                                                <th>Nom</th>
                                                <th>email</th>
                                                <th>n° de telephone</th>
                                                <th>message</th>
                                                <th>date de creation</th>

                                                <th>Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($contacts as $contact)


                                            <tr>
                                                <th scope="row">{{ $contact->id }}</th>
                                                <td>{{ $contact->nom }}</td>
                                                <td>{{ $contact->email }}</td>
                                                <td>{{ $contact->numero }}</td>
                                                <td>{{ $contact->message }}</td>
                                                <td>{{ $contact->created_at }}</td>

                                                <td>
                                                    <a href="mailto:{{ $contact->email }}" class="btn btn-primary btn-sm"><i class="fas fa-reply"></i></a>
                                                 





                                                </td>
                                            </tr>
                                            <!-- Delete Confirmation Modal -->

                                            <!-- Modal -->

                                            @empty
                                            <tr>
                                                <td colspan="3" class="text-center">Aucune donnée disponible</td>
                                            </tr>
                                            @endforelse

                                        </tbody>
                                    </table>
                                    <div class="text-centre">

                                        {{$contacts->links()}}

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