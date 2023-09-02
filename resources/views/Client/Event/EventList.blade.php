@extends ('Client.Layouts.index')

@section ('content')
<section class="breadcrumb-main" style="background-image:url(images/pexels-wendy-wei-1190297.jpg);">
    <div class="breadcrumb-outer">
        <div class="container">
            <div class="breadcrumb-content text-center pt-14 pb-2">
                <h5 class="theme mb-0">Eventiz</h5>
                <h1 class="mb-0 white">{{$cat->Nom}}</h1>
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
                    <h3 class="h-title">Schedule</h3>


                    <h4 class="theme">Event Conference Organisation</h4>
                    <div class="selector4" style="display: flex; justify-content: center;">
                        <h2 class="ah-headline mb-0">
                            <span> Liste des événements planifiés</span>
                            <span class="ah-words-wrapper white theme">
                                <b class="is-visible textcap"> qui sont </b>
                                <b>ATTENDUATTENDU </b>
                            </span>
                        </h2>
                    </div>
                </div>
            </div>
        </div>









    </div>
    </div>
</section>
<!-- event-schedule starts -->
@if ($cat->event->isEmpty())
<!-- Show a message if there are no events in the category -->
<div class="container text-center my-5">
    <div class="alert alert-info">
        <h4 class="alert-heading">No Events Found</h4>
        <p>There are no events in this category at the moment.</p>
    </div>
</div>

@else
@foreach ( $cat->event as $events )
<section class="event-schedule pb-8 about-after">
    <div class="container">


        <div class="schedule-item">


            <div class="about-image-box bg-white mb-4">

                <div class="row">
                    <div class="col-lg-3 d-flex">
                        <div class="about-content text-center text-lg-start p-4 py-8 bg-theme w-100">

                            <!-- Replacing Nom with the image -->
                            <img src="{{asset('storage/'.$events->Image)}}" alt="Event Image" height="150px " width="250px">
                        </div>
                    </div>
                    <div class="col-lg-6 d-flex">
                        <div class="schedule-content text-lg-start text-center py-4">
                            <h4 class="mb-1">{{$events->Nom}}</h4>

                            <ul class="schedule-items d-flex justify-content-lg-start justify-content-center">
                                <li class="d-flex align-items-center me-4">
                                    <i class="icon-location-pin theme pe-1"></i>
                                    <span class="theme1">{{$events->Location}}</span>
                                </li>
                                <li class="d-flex align-items-center">
                                    <i class="icon-location-pin theme pe-1"></i>
                                    <span class="theme1">
                                        @if ($events->Nombre_total_abonnés == 0)
                                        <span class="badge bg-danger"> Pas de place disponible</span>
                                        @else
                                        <span class="badge bg-success">Disponible {{$events->Nombre_total_abonnés}} places</span>
                                        @endif


                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 d-flex">
                        <div class="schedule-speaker d-lg-flex p-4 align-items-center text-center text-lg-start w-100 border-start">

                            <div class="speaker-content ms-3">
                                <a href="{{route('ShowEventDetails',$events->id)}}" class="nir-btn nir-btn-sm nir-btn-rounded nir-btn-outline nir-btn-outline-theme1">Voir plus</a>
                                <!-- <h6 class="mb-1">John Doe</h6> -->
                                <!-- <p class="mb-0">CEO, Eventiz</p> -->
                                <!-- </div> -->
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>







    </div>
    </div>
</section>
@endforeach
@endif
<!-- event-schedule ends -->

@endsection