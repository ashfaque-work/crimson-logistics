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


    {{-- <link href="{{ url('/assets/css/custom.css') }}" rel="stylesheet" type="text/css" /> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    {{-- <link href="{{ url('assets/css/rating.css') }}" rel="stylesheet" type="text/css" /> --}}
    <link href="{{ url('assets/css/app.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets/css/custom.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets/css/app-latest.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets/css/simplebar.css') }}" rel="stylesheet" type="text/css" />

    <!-- firebase dependency -->
    {{-- <script src="https://www.gstatic.com/firebasejs/8.3.2/firebase.js"></script>
    <!-- Firebase App is always required and must be first -->
    <script src="https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.3.2/firebase-messaging.js"></script>

    <!-- Add additional services that you want to use -->
    <script src="https://www.gstatic.com/firebasejs/8.3.2/firebase-auth.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.3.2/firebase-functions.js"></script> --}}
    
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
    @include('layouts.master_sidebar')
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
    {{-- <script src="{{ url('assets/js/simplebar.min.js') }}"></script> --}}
    {{-- <script src="{{ url('assets/js/moment.js') }}"></script> --}}
    {{-- <script src="{{ url('../plugins/daterangepicker/daterangepicker.js') }}"></script> --}}

    {{-- <script src="{{ url('../plugins/jvectormap/jquery-jvectormap-2.0.2.min.js') }}"></script> --}}
    {{-- <script src="{{ url('../plugins/jvectormap/jquery-jvectormap-us-aea-en.js') }}"></script> --}}
    <script src="{{ url('assets/pages/jquery.form-wizard.init.js') }}"></script>

    <!-- App js -->
    <script src="{{ url('assets/js/app.js') }}"></script>

    <script src="{{ url('../plugins/jquery-steps/jquery.steps.min.js') }}"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script> --}}
    <!-- Bootstrap rating js -->
    {{-- <script src="{{ url('assets/js/jquery.barrating.min.js') }}"></script> --}}
    {{-- <script src="{{ url('assets/js/jquery.rating.init.js') }}"></script> --}}
    <!-- Script for scroll bar -->
    <script src="{{ url('assets/js/simplebar.min.js') }}"></script>

    {{-- Firebase script
    <script>
        var firebaseConfig = {
            apiKey: "AIzaSyDgblX1tDnPJNGNSWSbdYXuW2QWQmUIr3U",
            authDomain: "elite-medical-staffing-group.firebaseapp.com",
            projectId: "elite-medical-staffing-group",
            storageBucket: "elite-medical-staffing-group.appspot.com",
            messagingSenderId: "223545565085",
            appId: "1:223545565085:web:cabed0064d42f267bd9974"
        };
        // Initialize Firebase
        firebase.initializeApp(firebaseConfig);
        //firebase.analytics();
        const messaging = firebase.messaging();
        messaging
            .requestPermission()
            .then(function() {
                //MsgElem.innerHTML = "Notification permission granted." 
                console.log("Notification permission granted.");

                // get the token in the form of promise
                return messaging.getToken()
            })
            .then(function(token) {
                // print the token on the HTML page     
                console.log(token);
                //document.cookie = "fcmToken=" + token + "; path=/";
                localStorage.setItem('fcmToken', token);
                fetch('{{ route("createToken") }}', {
                    method: 'POST',
                    body: JSON.stringify({
                        token
                    }),
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                            'content')
                    },
                });
            })
            .catch(function(err) {
                console.log("Unable to get permission to notify.", err);
            });

        messaging.onMessage(function(payload) {
            console.log(payload);
            var notify;
            notify = new Notification(payload.notification.title, {
                body: payload.notification.body,
                icon: payload.notification.icon,
                tag: "EMSG"
            });
            console.log(payload.notification);
        });

        self.addEventListener('notificationclick', function(event) {
            event.notification.close();
        });
    </script> --}}

</body>

</html>
