<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="author" content="Zelus Technologies" />
	<meta name="description" content="@yield('title', 'Home') - {{ $setting->site_name }}" />
	<meta name="keywords"
		content="Food, Fast Food, Restaurant, Pizzeria, Restaurant Menu, Pizza, Burger, Sushi, Steak, Grill, Snack">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<!-- SITE TITLE -->
	<title>@yield('title', 'Home') - {{ $setting->site_name }}</title>

	<!-- Favicon icon -->
	<link rel="icon" type="image/png" sizes="16x16"
		href="{{ $setting->site_favicon != null ? asset('storage/' . $setting->site_favicon) : asset('assets/images/favicon.png') }}">

	<!-- FAVICON AND TOUCH ICONS -->
	<link rel="shortcut icon"
		href="{{ $setting->site_favicon != null ? asset('storage/' . $setting->site_favicon) : asset('assets/images/favicon.png') }}"
		type="image/x-icon">
	<link rel="icon"
		href="{{ $setting->site_favicon != null ? asset('storage/' . $setting->site_favicon) : asset('assets/images/favicon.png') }}"
		type="image/x-icon">
	<link rel="apple-touch-icon" sizes="152x152"
		href="{{ $setting->site_favicon != null ? asset('storage/' . $setting->site_favicon) : asset('assets/images/favicon.png') }}">
	<link rel="apple-touch-icon" sizes="120x120"
		href="{{ $setting->site_favicon != null ? asset('storage/' . $setting->site_favicon) : asset('assets/images/favicon.png') }}">
	<link rel="apple-touch-icon" sizes="76x76"
		href="{{ $setting->site_favicon != null ? asset('storage/' . $setting->site_favicon) : asset('assets/images/favicon.png') }}">
	<link rel="apple-touch-icon"
		href="{{ $setting->site_favicon != null ? asset('storage/' . $setting->site_favicon) : asset('assets/images/favicon.png') }}">
	<link rel="icon"
		href="{{ $setting->site_favicon != null ? asset('storage/' . $setting->site_favicon) : asset('assets/images/favicon.png') }}"
		type="image/x-icon">

	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&amp;display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&amp;display=swap"
		rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Lilita+One&amp;display=swap" rel="stylesheet">

	<!-- BOOTSTRAP CSS -->
	<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

	<!-- FONT ICONS -->
	<link href="https://use.fontawesome.com/releases/v5.11.0/css/all.css" rel="stylesheet" crossorigin="anonymous">
	<link href="{{ asset('css/flaticon.css') }}" rel="stylesheet">

	<!-- PLUGINS STYLESHEET -->
	<link href="{{ asset('css/menu.css') }}" rel="stylesheet">
	<link href="{{ asset('css/magnific-popup.css') }}" rel="stylesheet">
	<link href="{{ asset('css/flexslider.css') }}" rel="stylesheet">
	<link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet">
	<link href="{{ asset('css/owl.theme.default.min.css') }}" rel="stylesheet">
	<link href="{{ asset('css/jquery.datetimepicker.min.css') }}" rel="stylesheet">

	<!-- TEMPLATE CSS -->
	<link href="{{ asset('css/style.css') }}" rel="stylesheet">

	<!-- RESPONSIVE CSS -->
	<link href="{{ asset('css/responsive.css') }}" rel="stylesheet">

	<link rel="stylesheet" href="{{ mix('/css/app.css') }}">
	<script src="{{ mix('/js/app.js') }}" defer></script>
	@inertiaHead
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/nprogress/0.2.0/nprogress.min.css" />
</head>

<body>
	<!-- PRELOADER SPINNER
		============================================= -->
	<div id="loader-wrapper">
		<div id="loader">
			<div class="cssload-spinner">
				<div class="cssload-ball cssload-ball-1"></div>
				<div class="cssload-ball cssload-ball-2"></div>
				<div class="cssload-ball cssload-ball-3"></div>
				<div class="cssload-ball cssload-ball-4"></div>
			</div>
		</div>
	</div>

	@inertia

	<!-- EXTERNAL SCRIPTS
		============================================= -->
	<script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('js/modernizr.custom.js') }}"></script>
	<script src="{{ asset('js/jquery.easing.js') }}"></script>
	<script src="{{ asset('js/jquery.appear.js') }}"></script>
	<script src="{{ asset('js/jquery.scrollto.js') }}"></script>
	<script src="{{ asset('js/menu.js') }}"></script>
	<script src="{{ asset('js/materialize.js') }}"></script>
	<script src="{{ asset('js/jquery.flexslider.js') }}"></script>
	<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
	<script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
	<script src="{{ asset('js/contact-form.js') }}"></script>
	<script src="{{ asset('js/comment-form.js') }}"></script>
	<script src="{{ asset('js/booking-form.js') }}"></script>
	<script src="{{ asset('js/jquery.datetimepicker.full.js') }}"></script>
	<script src="{{ asset('js/jquery.validate.min.js') }}"></script>
	<script src="{{ asset('js/jquery.ajaxchimp.min.js') }}"></script>

	<!-- Custom Script -->
	<script src="{{ asset('js/custom.js') }}"></script>

	<script defer src="{{ asset('js/changer.js') }}"></script>
</body>

</html>
