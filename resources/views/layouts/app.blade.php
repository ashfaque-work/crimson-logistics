<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Crimson</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- App favicon -->
    <link rel="shortcut icon" href="/assets/images/crimson-favicon.png">

    <!-- jvectormap -->
    <link href="../plugins/jvectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('../plugins/jquery-steps/jquery.steps.css') }}">

    <!-- App css -->
    <link href="{{ url('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('/assets/css/metisMenu.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('/plugins/daterangepicker/daterangepicker.css') }}" rel="stylesheet" type="text/css" />
    {{-- <link href="{{ url('/assets/css/nurse.app.min.css') }}" rel="stylesheet" type="text/css" /> --}}
    <link href="{{ url('/assets/css/admin.app.min.css') }}" rel="stylesheet" type="text/css" />
    <script src="https://kit.fontawesome.com/965bd2f436.js" crossorigin="anonymous"></script>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link href="{{ url('assets/css/app.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets/css/custom.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets/css/app-latest.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets/css/simplebar.css') }}" rel="stylesheet" type="text/css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // For sidebar active
        $(document).ready(function() {
            // Get the current URL
            var currentURL = window.location.href;

            // Iterate through each menu item
            $(".metismenu.left-sidenav-menu li").each(function() {
                // Get the link within the menu item
                var link = $(this).find("a:first");

                // Get the href attribute of the link
                var href = link.attr("href");

                // Check if the current URL contains the href attribute
                if (currentURL.includes(href)) {

                    // Add the 'mm-show' class to the parent ul elements
                    $(this).parents("ul").addClass("mm-show");
                    $(this).parents("li").addClass("mm-active");

                    // Expand the parent ul elements
                    $(this).parents("ul").show();
                    $(this).addClass("active");
                    // Add the 'active' class to the link
                    link.addClass("active");
                }
            });
        });
    </script>
</head>

<body class="">
    @include('layouts.sidebar')
    <div class="page-wrapper">
        @include('layouts.nav')
        <div class="page-content">
            <div class="container-fluid">
                <!-- Title and Breadcrumb - start -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="row">
                                <div class="col">
                                    <h1 class="lh-1">@yield('page-title', 'Title')</h1>
                                    <ul class="ps-0">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item">@yield('breadcrumb-parent', 'Home')</li>
                                            <li class="breadcrumb-item">@yield('breadcrumb-child', 'Title')</li>
                                        </ol>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Title and Breadcrumb - end -->
                @yield('content')
                @include('layouts.footer')
            </div>
        </div>
    </div>
    <script src="{{ url('assets/js/jquery.min.js') }}"></script>
    <script src="{{ url('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('assets/js/metismenu.min.js') }}"></script>
    <script src="{{ url('assets/js/waves.js') }}"></script>
    <script src="{{ url('assets/js/feather.min.js') }}"></script>
    <script src="{{ url('assets/pages/jquery.form-wizard.init.js') }}"></script>

    <!-- App js -->
    <script src="{{ url('assets/js/app.js') }}"></script>

    <script src="{{ url('../plugins/jquery-steps/jquery.steps.min.js') }}"></script>
    <script src="{{ url('assets/js/simplebar.min.js') }}"></script>
</body>

</html>
