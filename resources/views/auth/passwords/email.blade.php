
<!doctype html>
<html class="no-js" lang="">

<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Xmee | Login and Register Form Html Templates</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Favicon -->
	<link rel="shortcut icon" type="{{asset('LoginDashboard/image/x-icon')}}" href="img/favicon.png">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="{{asset('LoginDashboard/css/bootstrap.min.css')}}">
	<!-- Fontawesome CSS -->
	<link rel="stylesheet" href="{{asset('LoginDashboard/css/fontawesome-all.min.css')}}">
	<!-- Flaticon CSS -->
	<link rel="stylesheet" href="{{asset('LoginDashboard/font/flaticon.css')}}">
	<!-- Google Web Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">
	<!-- Custom CSS -->
	<link rel="stylesheet" href="{{asset('LoginDashboard/style.css')}}">
</head>

<!-- <body> -->
	<!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    <div id="preloader" class="preloader">
        <div class='inner'>
            <div class='line1'></div>
            <div class='line2'></div>
            <div class='line3'></div>
        </div>
    </div>
	<section class="fxt-template-animation fxt-template-layout8" data-bg-image="{{asset('LoginDashboard/img/figure/bg8-l.jpg')}}">
		<div class="fxt-content">
			<div class="fxt-header">
				<a href="login-8.html" class="fxt-logo"><img src="{{asset('LoginDashboard/img/logo-8.png')}}" alt="Logo"></a>
			</div>
            @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

			<div class="fxt-form">
				<p>Récupérez votre mot de passe</p>
                <form method="POST" action="{{ route('password.email') }}">
                        @csrf

					<div class="form-group">
						<div class="fxt-transformY-50 fxt-transition-delay-1">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
                        </div>
					</div>
					<div class="form-group">
						<div class="fxt-transformY-50 fxt-transition-delay-4">
							<button type="submit" class="fxt-btn-fill">Envoyer le lien de réinitialisation</button>
						</div>
					</div>
				</form>
			</div>
			<div class="fxt-footer">
				<div class="fxt-transformY-50 fxt-transition-delay-9">
					
                <p>Vous avez déjà un compte?<a href="{{ route('login') }}" class="switcher-text2 inline-text">Connectez-vous ici</a></p>
				</div>
			</div>
		</div>
	</section>
	<!-- jquery-->
	<script src="{{asset('LoginDashboard/js/jquery-3.5.0.min.js')}}"></script>
	<!-- Bootstrap js -->
	<script src="{{asset('/js/bootstrap.min.js')}}"></script>
	<!-- Imagesloaded js -->
	<script src="{{asset('LoginDashboard/js/imagesloaded.pkgd.min.js')}}"></script>
	<!-- Validator js -->
	<script src="{{asset('LoginDashboard/js/validator.min.js')}}"></script>
	<!-- Custom Js -->
	<script src="{{asset('LoginDashboard/js/main.js')}}"></script>

</body>

</html>