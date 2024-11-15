<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Crimson</title>

        <!-- App favicon -->
        <link rel="shortcut icon" href="/assets/images/crimson-favicon.png">

        <!-- App css -->
        <link href="{{ url('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ url('/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ url('/assets/css/metisMenu.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ url('/plugins/daterangepicker/daterangepicker.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ url('/assets/css/nurse.app.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ url('/assets/css/admin.app.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- <link href="{{ url('/assets/css/custom.css') }}" rel="stylesheet" type="text/css" /> -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
        <link href="{{ url('assets/css/rating.css') }}" rel="stylesheet" type="text/css" />

        <!-- Scripts -->
        {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    </head>
    <body class="font-sans text-gray-900 antialiased">
        {{-- <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100"> --}}
            @yield('content')
        {{-- </div> --}}

        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/feather.min.js"></script>
        <script src="assets/js/simplebar.min.js"></script>
    </body>
</html>
