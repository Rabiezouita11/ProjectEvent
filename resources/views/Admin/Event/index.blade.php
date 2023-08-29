@extends ('Admin.Layouts.index')



@section('content')





<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h6 class="page-title">Evenements list</h6>

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



            <a href="{{ route('showPageAddEvents') }}" class="btn btn-primary">ajouter un evenement</a>
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
                                                <th>Location</th>
                                                <th>Nombre_total_abonnés</th>
                                                <th>Prix</th>
                                                <th>start_date</th>
                                                <th>end_date</th>
                                                <th>start_time</th>
                                                <th>end_time</th>
                                                <th>Description</th>
                                                <th>Image</th>
                                                <th>categorie</th>


                                                <th>Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($events as $event)


                                            <tr>
                                                <th scope="row">{{ $event->id }}</th>
                                                <td>{{ $event->Nom }}</td>
                                                <td>{{ $event->Location }}</td>
                                                <td>{{ $event->Nombre_total_abonnés }}</td>
                                                <td>{{ $event->Prix }}</td>
                                                <td>{{ $event->start_date }}</td>
                                                <td>{{ $event->end_date }}</td>
                                                <td>{{ $event->start_time }}</td>
                                                <td>{{ $event->end_time }}</td>
                                                <td>{{ $event->Description }}</td>
                                                <td><img src="{{asset('storage/'.$event->Image)}}" alt=" " class="img-fluid" width="500px" height="500px"></td>


                                                <td>{{ $event->categorie->Nom }}</td>

                                                <td>
                                                    <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal{{ $event->id }}">Modifier</a>

                                                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $event->id }}">Supprimer</button>

                                                    <form id="delete-form" action="{{ route('deleteCategory') }}" method="POST" class="d-none">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $event->id }}">
                                                    </form>

                                                </td>
                                            </tr>

                                            <div class="modal" id="deleteModal{{ $event->id }}" tabindex="-1">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Supprimer la catégorie</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Êtes-vous sûr de vouloir supprimer la "{{ $event->Nom }}" ?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                                            <form action="{{ route('deleteEvent') }}" method="POST">
                                                                @csrf
                                                                <input type="hidden" name="id" value="{{ $event->id }}">
                                                                <button type="submit" class="btn btn-danger">Supprimer</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Modal -->
                                            <div class="modal" id="editModal{{ $event->id }}" tabindex="-1">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Edit Event</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form id="editForm{{ $event->id }}" action="{{ route('updateEvent') }}" method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                <input type="hidden" name="id" value="{{ $event->id }}">

                                                                <label for="Nom">Nom</label>
                                                                <input type="text" class="form-control" name="Nom" value="{{ $event->Nom }}">

                                                                <label for="Location">Location</label>
                                                                <input type="text" class="form-control" name="Location" value="{{ $event->Location }}">

                                                                <label for="Nombre_total_abonnés">Nombre_total_abonnés</label>
                                                                <input type="number" class="form-control" name="Nombre_total_abonnés" value="{{ $event->Nombre_total_abonnés }}">

                                                                <label for="Prix">Prix</label>
                                                                <input type="number" class="form-control" name="Prix" value="{{ $event->Prix }}">

                                                                <label for="start_date">Start Date</label>
                                                                <input type="date" class="form-control" name="start_date" value="{{ $event->start_date }}">

                                                                <label for="end_date">End Date</label>
                                                                <input type="date" class="form-control" name="end_date" value="{{ $event->end_date }}">

                                                                <label for="start_time">Start Time</label>
                                                                <input type="time" class="form-control" name="start_time" value="{{ $event->start_time }}">

                                                                <label for="end_time">End Time</label>
                                                                <input type="time" class="form-control" name="end_time" value="{{ $event->end_time }}">

                                                                <label for="Description">Description</label>
                                                                <textarea class="form-control" name="Description">{{ $event->Description }}</textarea>

                                                                <label for="Image">Image</label>
                                                                <input type="file" class="form-control" name="Image">

                                                                <label for="category_id">Category</label>
                                                                <select name="category_id" class="form-control">
                                                                    <option value="">Select Category</option>
                                                                    @foreach($categories as $category)
                                                                    <option value="{{ $category->id }}" {{ $category->id == $event->categorie_id ? 'selected' : '' }}>
                                                                        {{ $category->Nom }}
                                                                    </option>
                                                                    @endforeach
                                                                </select>
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="button" class="btn btn-primary" onclick="document.querySelector('#editForm{{ $event->id }}').submit()">Save</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @empty
                                            <tr>
                                                <td colspan="13" class="text-center">Aucune donnée disponible</td>
                                            </tr>
                                            @endforelse

                                        </tbody>
                                    </table>
                                    <div class="text-centre">

                                        {{$events->links()}}

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











    @endsection