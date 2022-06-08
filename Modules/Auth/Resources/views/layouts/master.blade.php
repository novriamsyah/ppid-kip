<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<meta name="robots" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Workload : Workload Project Management Admin  Bootstrap 5 Template" />
	<meta property="og:title" content="Workload : Workload Project Management Admin  Bootstrap 5 Template" />
	<meta property="og:description" content="Workload : Workload Project Management Admin  Bootstrap 5 Template" />
	{{-- <meta property="og:image" content="https:/workload.dexignlab.com/xhtml/social-image.png" /> --}}
	<meta name="format-detection" content="telephone=no">
	
	<!-- PAGE TITLE HERE -->
	<title>Komisi Informai</title>
	
	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/iconfav.png') }}" />
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

    @yield('css')

</head>
<body class="vh-100">
    @yield('content')


    <script src="{{ asset('assets/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom.min.js') }}"></script>
    <script src="{{ asset('assets/js/dlabnav-init.js') }}"></script>
	<script src="{{ asset('assets/js/styleSwitcher.js') }}"></script>

    @yield('script')
</body>
</html>