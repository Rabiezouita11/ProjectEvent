@extends('Client.Layouts.index')


@section('content')

<!-- BreadCrumb Starts -->
<section class="breadcrumb-main" style="background-image:url(client/images/pexels-wendy-wei-1190297.jpg);">
    <div class="breadcrumb-outer">
        <div class="container">
            <div class="breadcrumb-content text-center pt-14 pb-2">
                <h5 class="theme mb-0">Eventiz</h5>
                <h1 class="mb-0 white">Mon compte</h1>
            </div>
        </div>
    </div>
    <div class="bread-overlay"></div>
</section>
<!-- BreadCrumb Ends -->

<!-- error section starts -->
<section class="event-account pt-12 pb-8">
    <div class="container">
        @if (session('profileupdate'))
        <div class="alert alert-success">
            <center>{{session('profileupdate')}}</center>

        </div>
        @endif
        @if (session('passwordChangeSuccess'))
        <div class="alert alert-success">
            <center>{{session('passwordChangeSuccess')}}</center>

        </div>
        @endif


        @if (session('error'))
        <div class="alert alert-danger">
            <center>{{session('error')}}</center>

        </div>
        @endif
        <div class="event-account-in">

            <div class="d-lg-flex align-items-start row">
                <div class="nav flex-column nav-pills col-lg-3 pe-lg-4 mb-4" id="v-pills-tab" role="tablist" aria-orientation="vertical">

                    <button class="nav-link active" id="v-pills-account-tab" data-bs-toggle="pill" data-bs-target="#v-pills-account" type="button" role="tab" aria-controls="v-pills-account" aria-selected="false">Détails du compte</button>
                    <button class="nav-link" id="v-pills-motdepasse-tab" data-bs-toggle="pill" data-bs-target="#v-pills-motdepasse" type="button" role="tab" aria-controls="v-pills-motdepasse" aria-selected="false">Changer le mot de passe</button>

                    <button class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form1').submit();" type="button">Déconnexion</button>
                    <form id="logout-form1" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>


                <div class="tab-content  col-lg-9 ps-lg-4 mn-4" id="v-pills-tabContent">
                    <div class="tab-pane fade  " id="v-pills-motdepasse" role="tabpanel" aria-labelledby="v-pills-motdepasse-tab">
                        <div class="col-lg-12 mb-2">
                            <div class="product-table-main p-4 border-all mb-4">
                                <form id="password-form" method="post" action="{{ route('update_password') }}">
                                    @csrf
                                    <h6>Changer le mot de passe</h6>
                                    <div class="input-password mb-2 position-relative">
                                        <label class="">Mot de passe actuel </label>
                                        <input type="password" class="input-text bg-grey border-0" name="old_password" placeholder="">
                                        <span class="show-password-input position-absolute end-0 top-50 me-2 mt-1 opacity-75 cursor-pointer"><i class="fa fa-eye"></i></span>
                                        @if($errors->any('old_password'))
                                        <span class="text-danger">{{$errors->first('old_password')}}</span>
                                        @endif
                                    </div>

                                    <div class="input-password mb-2 position-relative">
                                        <label class="">Nouveau mot de passe </label>
                                        <input type="password" name="new_password" class="input-text bg-grey border-0" placeholder="">
                                        <span class="show-password-input position-absolute end-0 top-50 me-2 mt-1 opacity-75 cursor-pointer"><i class="fa fa-eye"></i></span>
                                        @if($errors->any('new_password'))
                                        <span class="text-danger">{{$errors->first('new_password')}}</span>
                                        @endif
                                    </div>
                                    <div class="input-password position-relative">
                                        <label class="">Confirmez le nouveau mot de passe</label>
                                        <input type="password" name="confirm_password" class="input-text bg-grey border-0" placeholder="">
                                        <span class="show-password-input position-absolute end-0 top-50 me-2 mt-1 opacity-75 cursor-pointer"><i class="fa fa-eye"></i></span>
                                        @if($errors->any('confirm_password'))
                                        <span class="text-danger">{{$errors->first('confirm_password')}}</span>
                                        @endif
                                    </div>
                                    <br>
                                    <br>
                                    <div class="col-lg-12">
                                        <button href="{{ route('update_password') }}" onclick="event.preventDefault();
                                                     document.getElementById('password-form').submit();" class="nir-btn"> Enregistrer les modifications</button>
                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade show active" id="v-pills-account" role="tabpanel" aria-labelledby="v-pills-account-tab">

                        <div class="product-table-main p-4 border-all mb-4">




                            <div class="row">
                                <form id="profile-form" method="post" action="{{ route('EditProfile') }}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                                    <div class="form-group">
                                        <label for="name">Nom complet</label>
                                        <input type="text" id="name" name="name" class="form-control" value="{{ Auth::user()->name }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email"> Email</label>
                                        <input type="email" id="email" class="form-control" value="{{ Auth::user()->email }}" readonly>
                                        <div>@if ($errors->has('email'))
                                            <strong style="color: red;">{{ $errors->first('email') }}</strong>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Image</label>
                                        <input type="file" id="image" class="form-control" name="image">
                                        <div>@if ($errors->has('image'))
                                            <strong style="color: red;">{{ $errors->first('image') }}</strong>
                                            @endif
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <?php 
                                    use Illuminate\Support\Facades\Auth;
                                    $image = Auth::user()->image;
                                    ?>

                                    @if ($image == null)
                                    <div class="form-group">
                                        <label for="email">Image par défaut </label>
                                        <td><img src="{{asset('image par default.png')}}" alt=" " class="img-fluid" width="500px" height="500px"></td>

                                    </div>
                                    @else
                                    <div class="form-group">
                                        <label for="email">Image</label>
                                        <td><img src="{{asset('storage/'.Auth::user()->image)}}" alt=" " class="img-fluid" width="500px" height="500px"></td>

                                    </div>
                                    @endif


                                    <br>
                                    <br>
                                    <button class="nir-btn" href="{{ route('EditProfile') }}" onclick="event.preventDefault();
                                                     document.getElementById('profile-form').submit();" type="button">Save Changes</button>
                                </form>
                            </div>






                        </div>

                    </div>
                </div>
            </div>


</section>
<!-- error section Ends -->



<!-- footer ends -->


<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Check if there's a session message for password change success and active tab
        var passwordChangeSuccess = '{{ session('
        passwordChangeSuccess ') }}';
        var activeTab = '{{ session('
        activeTab ') }}';

        if (passwordChangeSuccess && activeTab) {
            // Display the success message
            var successAlert = document.createElement('div');
            successAlert.className = 'alert alert-success';
            successAlert.innerHTML = '<center>' + passwordChangeSuccess + '</center>';

            var alertContainer = document.querySelector('.event-account-in'); // Replace with the appropriate container
            if (alertContainer) {
                alertContainer.insertBefore(successAlert, alertContainer.firstChild);
            }

            // Activate the "changer mot de passe" tab
            var tabToActivate = document.getElementById(activeTab);
            if (tabToActivate) {
                tabToActivate.click(); // Trigger the click event to activate the tab
            }
        }
    });
</script>

@endsection