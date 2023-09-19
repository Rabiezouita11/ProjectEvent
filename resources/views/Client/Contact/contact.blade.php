@extends ('Client.Layouts.index')


@section ('content')





<section class="breadcrumb-main" style="background-image:url(client/images/pexels-wendy-wei-1190297.jpg);">
    <div class="breadcrumb-outer">
        <div class="container">
            <div class="breadcrumb-content text-center pt-14 pb-2">
                <h5 class="theme mb-0">Eventiz</h5>
                <h1 class="mb-0 white">Contactez-nous</h1>
            </div>
        </div>
    </div>
    <div class="bread-overlay"></div>
</section>
<!-- BreadCrumb Ends -->

<!-- contact starts -->
<section class="contact-main pb-8" style="background-image: url(client/images/testimonial-1.png);">

    <center> @if (session('azer'))
        <div class="alert alert-success" role="alert" style="font-size: 40px;">
            {{ session('azer') }}
        </div>
        @endif
    </center>
    <div class="container">
        <div class="contact-info-main mt-0">
            <div class="section-title mb-5 w-75 mx-auto text-center">
                <h3 class="h-title">Contact</h3>
                <h4 class="theme">Restez en contact avec nous</h4>
                <div class="selector4" style="display: flex; justify-content: center;">
                    <h2 class="ah-headline mb-0">
                        <span>Comment pouvons-nous vous </span>   
                        <span class="ah-words-wrapper white theme">
                            <b class="is-visible textcap">aider ?</b>
                            <b>aider ?</b>
                        </span>
                    </h2>
                </div>
            </div>
            <div class="contact-info">
                <div class="contact-info-content row mb-1">
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="info-item bg-grey px-4 py-5 border-all text-center">
                            <div class="info-icon mb-2 bg-theme rounded-circle mx-auto">
                                <i class="fa fa-map-marker-alt white"></i>
                            </div>
                            <div class="info-content">
                                <h5>Le kef</h5>
                                <p class="mb-0">8 Rue Abu elkacem chebbi</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="info-item bg-grey px-4 py-5 border-all text-center">
                            <div class="info-icon mb-2 bg-theme rounded-circle mx-auto">
                                <i class="fa fa-phone white"></i>
                            </div>
                            <div class="info-content">
                                <h5>Telephone</h5>
                                <p class="m-0"> (+216) 93966440</p>
                             
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 mb-4">
                        <div class="info-item bg-grey px-4 py-5 border-all text-center">
                            <div class="info-icon mb-2 bg-theme rounded-circle mx-auto">
                                <i class="fa fa-envelope white"></i>
                            </div>
                            <div class="info-content ps-4">
                                <h5>Email</h5>
                                <p class="m-0">benarfaakrem@gmail.com</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="contact-form1" class="contact-form" style="font-size: 20px;">


                    <div class="row">
                        <div class="col-lg-8 pe-lg-4 mb-4">

                            <div id="contactform-error-msg"></div>


                            <form method="post" action="{{url('AjoutContact')}}" name="contactform2" id="contactform2">
                                @csrf
                                <div class="form-group mb-2">
                                    <input type="text" name="nom" class="form-control" value="{{ Auth::user()->name }} " id="fullname" placeholder="First Name" readonly>
                                </div>
                                <div class="form-group mb-2">
                                    <input type="email" name="email" class="form-control" value="{{ Auth::user()->email }}" id="email" placeholder="Email" readonly>
                                </div>
                                <div class="form-group mb-2">
                                    <input type="text" name="numero" class="form-control" id="phnumber" placeholder="votre numero de telephone" value="{{ old('numero') }}" required>
                                    <div>@if ($errors->has('numero'))
                                        <strong style="color: red;">{{ $errors->first('numero') }}</strong>
                                        @endif
                                    </div>
                                </div>

                                <div class="textarea mb-2">
                                    <textarea name="message" placeholder="Enter a message" value="{{ old('message') }}" id="message" required></textarea>
                                    <div>@if ($errors->has('message'))
                                        <strong style="color: red;">{{ $errors->first('message') }}</strong>
                                        @endif
                                    </div>
                                </div>
                                <div class="comment-btn text-center text-lg-start">
                                    <input href="{{ route('AjoutContact') }}" onclick="event.preventDefault();
                                                     document.getElementById('contactform2').submit();" type="submit" class="nir-btn" id="submit2" value="Envoyer le message">
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-4 ps-lg-4 mb-4">
                            <div class="map">

                                <div style="width: 100%">
                                    <iframe height="500" src="https://maps.google.com/maps?q=Le%20kef&t=&z=9&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- contact Ends -->















@endsection