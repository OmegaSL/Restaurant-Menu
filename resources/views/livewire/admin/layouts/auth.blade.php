<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-100">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="@yield('title') - {{ $setting->site_name }}" />
	<meta property="og:title" content="@yield('title') - {{ $setting->site_name }}" />
	<meta property="og:description" content="@yield('title') - {{ $setting->site_name }}" />
	<meta property="og:image"
		content="{{ $setting->site_favicon != null ? asset('storage/' . $setting->site_favicon) : asset('assets/auth/images/favicon.png') }}" />
	<meta name="format-detection" content="telephone=no">

	<title>@yield('title') - {{ $setting->site_name }} </title>

	<!-- Favicon icon -->
	<link rel="icon" type="image/png" sizes="16x16"
		href="{{ $setting->site_favicon != null ? asset('storage/' . $setting->site_favicon) : asset('assets/auth/images/favicon.png') }}">
	<link href="{{ asset('assets/auth/css/style.css') }}" rel="stylesheet">

	@livewireStyles

</head>

<body class="h-100">

	<div class="authincation h-100">
		@yield('content')
	</div>

	<!--********************************** Scripts ***********************************-->
	<!-- Required vendors -->
	<script src="{{ asset('assets/auth/vendor/global/global.min.js') }}"></script>
	<script src="{{ asset('assets/auth/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
	<script src="{{ asset('assets/auth/js/custom.min.js') }}"></script>
	<script src="{{ asset('assets/auth/js/deznav-init.js') }}"></script>

	@livewireScripts
</body>
