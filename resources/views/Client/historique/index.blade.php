@extends('Client.Layouts.index')

@section('content')
<section class="breadcrumb-main" style="background-image:url(images/pexels-wendy-wei-1190297.jpg);">
    <div class="breadcrumb-outer">
        <div class="container">
            <div class="breadcrumb-content text-center pt-14 pb-2">
                <h5 class="theme mb-0">Eventiz Historique</h5>
            </div>
        </div>
    </div>
    <div class="bread-overlay"></div>
</section>
<!-- BreadCrumb Ends -->
<section class="event-schedule pb-8 about-after">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-4">
                <div class="section-title mb-5 text-center text-lg-start">
                    <div class="selector4" style="display: flex; justify-content: center;">
                        <h2 class="ah-headline mb-0">
                            <span class="ah-words-wrapper white theme">
                                <b class="is-visible textcap"> <i class="icon-calendar theme"></i> Historiques</b>
                                <b>Votre </b>
                            </span>
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- event-schedule starts -->
<center>
    @if (session('success'))
    <div class="alert alert-success" role="alert" style="font-size: 40px;">
        {{ session('success') }}
    </div>
    @endif

    @if ($reservations->isEmpty())
    <div class="alert alert-info" role="alert" style="font-size: 24px;">
        Vous n'avez pas encore d'historique de réservation.
    </div>
    @else
    @foreach ($reservations as $reservation)
    <section class="event-schedule pb-8 about-after">
        <div class="container">
            <div class="schedule-item">
                <div class="about-image-box bg-white mb-4">
                    <div class="row">
                        <div class="col-lg-3 d-flex">
                            <div class="about-content text-center text-lg-start p-4 py-8 bg-theme w-100">
                                <!-- Replacing Nom with the image -->
                                <img src="{{ asset('storage/'.$reservation->event->Image) }}" alt="Event Image" height="150px" width="250px">
                            </div>
                        </div>
                        <div class="col-lg-6 d-flex">
                            <div class="schedule-content text-lg-start text-center py-4">
                                <h4 class="mb-1">{{ $reservation->event->Nom }}</h4>
                                <ul class="schedule-items d-flex justify-content-lg-start justify-content-center">
                                    <li class="d-flex align-items-center me-4">
                                        <i class="icon-location-pin theme pe-1"></i>
                                        <span class="theme1">{{ $reservation->created_at }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 d-flex">
                            <div class="schedule-speaker d-lg-flex p-4 align-items-center text-center text-lg-start w-100 border-start">
                                <div class="speaker-content ms-3">
                                    <a href="{{ route('download-invoice', $reservation) }}" class="nir-btn nir-btn-sm nir-btn-rounded nir-btn-outline nir-btn-outline-theme1">Télécharger Facture</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endforeach

    <div class="d-flex justify-content-center">
        {!! $reservations->links() !!}
    </div>
    <br>
    @endif
    <!-- event-schedule ends -->
</center>
@endsection