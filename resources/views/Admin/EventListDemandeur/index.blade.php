@extends('Admin.Layouts.index')

@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- ... other content ... -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <center> @if (session('accepted'))
                            <div class="alert alert-success" role="alert">
                                {{ session('accepted') }}
                            </div>
                            @endif
                        </center>
                        <center> @if (session('refused'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('refused') }}
                            </div>
                            @endif
                        </center>
                        <div class="card-body">
                            <h4 class="card-title">Event List Demandeur</h4>
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nom de l'événement</th>
                                            <th>Nom de demandeur</th>
                                            <th>Statut</th>
                                            <th>Email</th>
                                            <th>date de création de l'événement</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($events as $event)
                                        <tr>
                                            <th scope="row">{{ $event->id }}</th>
                                            <td class="event-name" data-toggle="modal" data-target="#eventModal{{ $event->id }}">{{ $event->Nom }}</td>
                                            <td data-toggle="modal" data-target="#eventModal{{ $event->id }}">
                                                @if ($event->user)
                                                {{ $event->user->name }} <!-- Assuming "name" is the user's name attribute -->
                                                @else
                                                User Not Found
                                                @endif
                                            </td>
                                            <td>
                                                @if ($event->status === 'En attente')
                                                <span class="badge badge-warning">{{ $event->status }}</span>
                                                @elseif ($event->status === 'refused')
                                                <span class="badge badge-danger">{{ $event->status }}</span>

                                                @else
                                                <span class="badge badge-success">{{ $event->status }}</span>
                                                @endif
                                            </td>

                                            <td data-toggle="modal" data-target="#eventModal{{ $event->id }}">{{ $event->user->email }}</td>
                                            <td>{{ $event->created_at }}</td>
                                            <td>
                                                @if (strtolower($event->status) === 'en attente')

                                                <button class="btn btn-success" data-toggle="modal" data-target="#acceptModal{{ $event->id }}">Accepter</button>
                                                <button class="btn btn-danger" data-toggle="modal" data-target="#refuseModal{{ $event->id }}">Refuser</button>

                                                @elseif (strtolower($event->status) === 'refused')
                                                <span class="badge badge-danger">{{ $event->status }}</span>
                                                @else
                                                <span class="badge badge-success">{{ $event->status }}</span>
                                                @endif
                                            </td>

                                        </tr>
                                        <!-- Event Modal -->
                                        <div class="modal fade" id="eventModal{{ $event->id }}" tabindex="-1" role="dialog" aria-labelledby="eventModalLabel{{ $event->id }}" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="eventModalLabel{{ $event->id }}">{{ $event->Nom }} Details</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <img src="{{ asset('storage/' . $event->Image) }}" alt="{{ $event->Nom }} Image" class="img-fluid">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <p><i class="fas fa-map-marker-alt"></i> <strong>Location:</strong> {{ $event->Location }}</p>
                                                                <p><i class="fas fa-users"></i> <strong>Nombre Total Abonnés:</strong> {{ $event->Nombre_total_abonnés }}</p>
                                                                <p><i class="fas fa-dollar-sign"></i> <strong>Prix:</strong> {{ $event->Prix }}</p>
                                                                <p><i class="fas fa-tag"></i> <strong>Catégorie:</strong> {{ $event->categorie->Nom }}</p>
                                                                <p><i class="far fa-calendar"></i> <strong>Date de début:</strong> {{ $event->start_date }}</p>
                                                                <p><i class="far fa-calendar"></i> <strong>Date de fin:</strong> {{ $event->end_date }}</p>
                                                                <p><i class="far fa-clock"></i> <strong>Heure de début:</strong> {{ $event->start_time }}</p>
                                                                <p><i class="far fa-clock"></i> <strong>Heure de fin:</strong> {{ $event->end_time }}</p>
                                                            </div>
                                                        </div>
                                                        <p><i class="fas fa-info-circle"></i> <strong>Description:</strong> {{ $event->Description }}</p>
                                                        <!-- You can add more event details with icons -->
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Accept Modal -->
                                        <div class="modal fade" id="acceptModal{{ $event->id }}" tabindex="-1" role="dialog" aria-labelledby="acceptModalLabel{{ $event->id }}" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="acceptModalLabel{{ $event->id }}">Accept Event</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are you sure you want to accept this event?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                        <form action="{{ route('accepterEventByDemandeur' )}}" method="POST">
                                                            @csrf

                                                            <input type="hidden" name="id" value="{{ $event->id }}">
                                                            <input type="hidden" name="user_id" value="{{ $event->user->id }}">

                                                            <button type="submit" class="btn btn-success">Accept</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Refuse Modal -->
                                        <div class="modal fade" id="refuseModal{{ $event->id }}" tabindex="-1" role="dialog" aria-labelledby="refuseModalLabel{{ $event->id }}" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="refuseModalLabel{{ $event->id }}">Refuse Event</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are you sure you want to refuse this event?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                        <form action="{{ route('deleteEventByDemandeur')}}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{ $event->id }}">
                                                            <input type="hidden" name="user_id" value="{{ $event->user->id }}">

                                                            <button type="submit" class="btn btn-danger">Refuse</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        @empty
                                        <tr>
                                            <td colspan="7" class="text-center">Aucune donnée disponible</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                <div class="text-centre">
                                    {{ $events->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
</div>
<!-- end main content -->
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Include Bootstrap JavaScript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>