<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" type="image/x-icon" href="./img/skotga-logo.png">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>UPTD SPF SDN Kotalulon 3 Bondowoso</title>

		<!-- ========================= CSS here ========================= -->
		<link rel="stylesheet" href="front/assets/css/bootstrap-5.0.0-beta1.min.css">
        <link rel="stylesheet" href="front/assets/css/LineIcons.2.0.css">
		<link rel="stylesheet" href="front/assets/css/animate.css">
		<link rel="stylesheet" href="front/assets/css/tiny-slider.css">
		<link rel="stylesheet" href="front/assets/css/glightbox.min.css">
		<link rel="stylesheet" href="front/assets/css/main.css">

        @stack('styles')

    </head>
    <body>

        @include('sweetalert::alert')
        <x-header />
            @yield('content')
        <x-footer />

        <!-- ========================= JS here ========================= -->
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
		<script src="front/assets/js/bootstrap.bundle-5.0.0-beta1.min.js"></script>
		<script src="front/assets/js/contact-form.js"></script>
        <script src="front/assets/js/count-up.min.js"></script>
        <script src="front/assets/js/tiny-slider.js"></script>
        <script src="front/assets/js/isotope.min.js"></script>
        <script src="front/assets/js/glightbox.min.js"></script>
        <script src="front/assets/js/wow.min.js"></script>
        <script src="front/assets/js/imagesloaded.min.js"></script>
		<script src="front/assets/js/main.js"></script>

        @stack('scripts')
    </body>
</html>