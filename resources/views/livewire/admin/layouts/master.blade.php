<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1">

	<title>@yield('title') - {{ $setting->site_name }}</title>

	<!-- Favicon icon -->
	<link rel="icon" type="image/png" sizes="16x16"
		href="{{ $setting->site_favicon != null ? asset('storage/' . $setting->site_favicon) : asset('assets/images/favicon.png') }}">

	<!-- Styles -->
	<link href="{{ asset('assets/vendor/jqvmap/css/jqvmap.min.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('assets/vendor/chartist/css/chartist.min.css') }}">
	<link href="{{ asset('assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
	<link href="https://cdn.lineicons.com/2.0/LineIcons.css" rel="stylesheet">

	@livewireStyles
</head>

<body>
	<!--*******************
								Preloader start
				********************-->
	<div id="preloader">
		<div class="sk-three-bounce">
			<div class="sk-child sk-bounce1"></div>
			<div class="sk-child sk-bounce2"></div>
			<div class="sk-child sk-bounce3"></div>
		</div>
	</div>
	<!--******************* Preloader end ********************-->

	<!--********************************** Main wrapper start ***********************************-->
	<div id="main-wrapper">
		@include('livewire.admin.shared.header')
		@include('livewire.admin.shared.sidebar')
		@yield('content')

		<!--********************************** Footer start ***********************************-->
		<div class="footer">
			<div class="copyright">
				<p>
					Copyright © Developed &amp; Powered by
					<a href="https://www.zelustechnologies.com" target="_blank">
						Zelus Technologies
					</a> 2023
				</p>
			</div>
		</div>
		<!--********************************** Footer end ***********************************-->
	</div>
	<!--********************************** Main wrapper end ***********************************-->

	<!--********************************** Scripts ***********************************-->
	<!-- Required vendors -->
	<script src="{{ asset('assets/vendor/global/global.min.js') }}"></script>
	<script src="{{ asset('assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
	<script src="{{ asset('assets/vendor/chart.js/Chart.bundle.min.js') }}"></script>
	<script src="{{ asset('assets/js/custom.min.js') }}"></script>
	<script src="{{ asset('assets/js/deznav-init.js') }}"></script>

	<!-- Counter Up -->
	<script src="{{ asset('assets/vendor/waypoints/jquery.waypoints.min.js') }}"></script>
	<script src="{{ asset('assets/vendor/jquery.counterup/jquery.counterup.min.js') }}"></script>

	<!-- Apex Chart -->
	<script src="{{ asset('assets/vendor/apexchart/apexchart.js') }}"></script>

	<!-- Chart piety plugin files -->
	<script src="{{ asset('assets/vendor/peity/jquery.peity.min.js') }}"></script>

	<!-- Dashboard 1 -->
	<script src="{{ asset('assets/js/dashboard/dashboard-1.js') }}"></script>

	@livewireScripts

	@yield('scripts')
</body>

</html>
