<!doctype html>
<html class="no-js" lang="">

<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Xmee | Login and Register Form Html Templates</title>
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
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <style>
        select option {
  margin: 40px;
  background: rgba(0, 0, 0, 0.3);
  color: #fff;
  text-shadow: 0 1px 0 rgba(0, 0, 0, 0.4);
}
    </style>
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
	<section class="fxt-template-animation fxt-template-layout8" data-bg-image="login.jpg">
		<div class="fxt-content">
			<div class="fxt-header">
				<a href="login-8.html" class="fxt-logo"><img src="client/images/logo-white.png" alt="Logo"></a>
			</div>
			<div class="fxt-form">
				<p>Register for create account</p>
				<form method="POST" action="{{ route('register') }}">
    @csrf

    <div class="form-group">
        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
            placeholder="Name" value="{{ old('name') }}" required autofocus>
        @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-group">
        <select name="role" class="form-control" id="" required>
            <option value="">Select Role</option>
            <option value="demandeur">Demandeur</option>
            <option value="participant">Participant</option>
        </select>
    </div>

    <div class="form-group">
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
            placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email">
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-group">
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
            placeholder="Password" name="password" required autocomplete="new-password">
        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <i toggle="#password" class="fa fa-fw fa-eye toggle-password field-icon"></i>
    </div>

    <div class="form-group">
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
            placeholder="Confirm Password" required autocomplete="new-password">
    </div>

    <div class="form-group">
        <div class="g-recaptcha" data-sitekey="6Ld8HIYjAAAAALw437G-L_PF1PNrNZH4Qq76MvSU"></div>
        @error('g-recaptcha-response')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <button type="submit" class="fxt-btn-fill">Register</button>
    </div>
</form>
</div>
			
			
			<div class="fxt-footer">
				<div class="fxt-transformY-50 fxt-transition-delay-9">
					<p>Have an account?<a href="{{route('login')}}" class="switcher-text2 inline-text">Log in</a></p>
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