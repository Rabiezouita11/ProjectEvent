@extends ('Admin.Layouts.index')




@section('content')

<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h6 class="page-title">liste des utilisateurs</h6>

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
                                                <th>Role</th>
                                                <th>email</th>
                                                <th>date de création</th>

                                                <th>Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($users as $user)


                                            <tr>
                                                <th scope="row">{{ $user->id }}</th>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->role }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->created_at }}</td>

                                              
                                                <td>

                                                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $user->id }}">Supprimer</button>


                                                   

                                                </td>
                                            </tr>
                                            <!-- Delete Confirmation Modal -->
                                            <div class="modal" id="deleteModal{{ $user->id }}" tabindex="-1">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Supprimer la catégorie</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Êtes-vous sûr de vouloir supprimer  {{ $user->name }} ? 
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                                            <form action="{{ route('deleteUser') }}" method="POST">
                                                                @csrf
                                                                <input type="hidden" name="id" value="{{ $user->id }}">
                                                                <button type="submit" class="btn btn-danger">Supprimer</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Modal -->
                                          
                                            @empty
                                            <tr>
                                                <td colspan="6" class="text-center">Aucune donnée disponible</td>
                                            </tr>
                                            @endforelse

                                        </tbody>
                                    </table>
                                    <div class="text-centre">

                                        {{$users->links()}}

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