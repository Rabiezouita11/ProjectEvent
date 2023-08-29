@extends('Admin.Layouts.index')


@section('content')
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h6 class="page-title">Categories List</h6>

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



            <a href="{{ route('pageCategoryAjouter') }}" class="btn btn-primary">ajouter Categorie</a>
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
                                                <th>Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($categories as $category)


                                            <tr>
                                                <th scope="row">{{ $category->id }}</th>
                                                <td>{{ $category->Nom }}</td>
                                                <td>
                                                    <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal{{ $category->id }}">Modifier</a>

                                                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $category->id }}">Supprimer</button>


                                                    <form id="delete-form" action="{{ route('deleteCategory') }}" method="POST" class="d-none">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $category->id }}">
                                                    </form>

                                                </td>
                                            </tr>
                                            <!-- Delete Confirmation Modal -->
                                            <div class="modal" id="deleteModal{{ $category->id }}" tabindex="-1">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Supprimer la catégorie</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Êtes-vous sûr de vouloir supprimer la "{{ $category->Nom }}" ?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                                            <form action="{{ route('deleteCategory') }}" method="POST">
                                                                @csrf
                                                                <input type="hidden" name="id" value="{{ $category->id }}">
                                                                <button type="submit" class="btn btn-danger">Supprimer</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Modal -->
                                            <div class="modal" id="editModal{{ $category->id }}" tabindex="-1">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Modifier la catégorie</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <!-- Your form elements for editing here -->
                                                            <form id="editForm{{ $category->id }}" action="{{ route('updateCategory') }}" method="POST">
                                                                @csrf
                                                                <input type="hidden" name="id" value="{{ $category->id }}">
                                                                <!-- Other input fields for category update -->
                                                                <!-- For example: -->
                                                                <input type="text" class="form-control" name="Nom" value="{{ $category->Nom }}">
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                                            <button type="button" class="btn btn-primary" onclick="document.querySelector('#editForm{{ $category->id }}').submit()">Enregistrer</button>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @empty
                                            <tr>
                                                <td colspan="3" class="text-center">Aucune donnée disponible</td>
                                            </tr>
                                            @endforelse

                                        </tbody>
                                    </table>
                                    <div class="text-centre">

                                        {{$categories->links()}}

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