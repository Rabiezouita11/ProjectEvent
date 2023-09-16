
<!doctype html>
<html class="no-js" lang="">

<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Login </title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="LoginDashboard/img/favicon.png">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="LoginDashboard/css/bootstrap.min.css">
	<!-- Fontawesome CSS -->
	<link rel="stylesheet" href="LoginDashboard/css/fontawesome-all.min.css">
	<!-- Flaticon CSS -->
	<link rel="stylesheet" href="LoginDashboard/font/flaticon.css">
	<!-- Google Web Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">
	<!-- Custom CSS -->
	<link rel="stylesheet" href="LoginDashboard/style.css">
</head>

<body>
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
	<section class="fxt-template-animation fxt-template-layout8" data-bg-image="LoginDashboard/img/figure/bg8-l.jpg">
		<div class="fxt-content">
			<div class="fxt-header">
			<a href="{{route('home')}}" class="fxt-logo"><img src="client/images/logo-white.png" alt="Logo"></a>
			</div>
			<div class="fxt-form">
				<p>Connectez-vous à votre compte</p>
				<form method="POST" action="{{ route('login') }}">
                        @csrf

					<div class="form-group">
						<div class="fxt-transformY-50 fxt-transition-delay-1">
							<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="@lang('E-Mail Address')">
							@error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
						</div>
					</div>
					<div class="form-group">
						<div class="fxt-transformY-50 fxt-transition-delay-2">
							
							<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="********" name="password" required autocomplete="current-password"  placeholder="@lang('Password')">
							@error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							<i toggle="#password" class="fa fa-fw fa-eye toggle-password field-icon"></i>
						</div>
					</div>
					<div class="form-group">
						<div class="fxt-transformY-50 fxt-transition-delay-3">
							<div class="fxt-checkbox-area">
								<div class="checkbox">
								</div>
								<a href="{{ route('password.request') }}" class="switcher-text">Mot de passe oublié</a>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="fxt-transformY-50 fxt-transition-delay-4">
							<button type="submit" class="fxt-btn-fill">Connexion</button>
						</div>
					</div>
				</form>
			</div>
			<div class="fxt-style-line">
			
			</div>
		
			<div class="fxt-footer">
				<div class="fxt-transformY-50 fxt-transition-delay-9">
					<p> Vous n'avez pas de compte ? <a href="{{ route('register') }}" class="switcher-text2 inline-text">Inscrivez-vous ici</a></p>
				</div>
			</div>
		</div>
	</section>
	<!-- jquery-->
	
	<script src="LoginDashboard/js/jquery-3.5.0.min.js"></script>
	<!-- Bootstrap js -->
	<script src="LoginDashboard/js/bootstrap.min.js"></script>
	<!-- Imagesloaded js -->
	<script src="LoginDashboard/js/imagesloaded.pkgd.min.js"></script>
	<!-- Validator js -->
	<script src="LoginDashboard/js/validator.min.js"></script>
	<!-- Custom Js -->
	<script src="LoginDashboard/js/main.js"></script>

</body>

</html>

