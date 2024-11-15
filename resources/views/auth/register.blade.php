@extends('layouts.guest')
@section('content')
    <style>
        .auth-header-box {
            background: rgb(240, 240, 240);
        }

        .bg-color .bg-info {
            background-color: #e32403 !important;
        }
    </style>
    <div class="container">
        <div class="row vh-100 d-flex justify-content-center">
            <div class="col-12 align-self-center">
                <div class="row">
                    <div class="col-lg-5 mx-auto">
                        <div class="card bg-color">
                            <div class="card-body p-0 auth-header-box">
                                <div class="text-center p-3">
                                    <a href="index.html" class="logo logo-admin">
                                        <img src="{{ url('assets/images/crimson-logo.png') }}" height="50" alt="logo"
                                            class="auth-logo">
                                    </a>
                                    <h4 class="mt-3 mb-1 fw-semibold text-muted font-18">Let's Get Started Crimson Logistics
                                    </h4>
                                    <p class="text-muted  mb-0">Register now to continue to Crimson Logistics.</p>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <ul class="nav-border nav nav-pills" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active fw-semibold" data-bs-toggle="tab" href="#LogIn_Tab"
                                            role="tab">Log In</a>
                                    </li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane active p-3" id="LogIn_Tab" role="tabpanel">
                                        <form method="POST" action="{{ route('login') }}">
                                            @csrf
                                            <div class="form-group mb-2">
                                                <label class="form-label" for="email">User Name</label>
                                                <div class="input-group">
                                                    <input type="name" class="form-control" name="name" id="username"
                                                        placeholder="Enter Username" required>
                                                </div>
                                            </div>

                                            <div class="form-group mb-2">
                                                <label class="form-label" for="email">Email</label>
                                                <div class="input-group">
                                                    <input type="email" class="form-control" name="email" id="username"
                                                        placeholder="Enter Email" required>
                                                </div>
                                            </div><!--end form-group-->

                                            <div class="form-group mb-2">
                                                <label class="form-label" for="userpassword">Password</label>
                                                <div class="input-group">
                                                    <input type="password" class="form-control" name="password"
                                                        id="userpassword" placeholder="Enter password" required
                                                        autocomplete="current-password">
                                                </div>
                                            </div><!--end form-group-->

                                            <div class="form-group mb-2">
                                                <label class="form-label" for="confirmPassword">Confirm Password</label>
                                                <div class="input-group">
                                                    <input type="password" class="form-control" name="password_confirmation"
                                                        id="confirmPassword" placeholder="Confirm password" required
                                                        autocomplete="current-password">
                                                </div>
                                            </div>


                                            <div class="form-group row my-3">
                                                <div class="col-sm-6">
                                                    <div class="custom-control custom-switch switch-success">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="customSwitchSuccess" name="remember">
                                                        <label class="form-label text-muted"
                                                            for="customSwitchSuccess">Remember me</label>
                                                    </div>
                                                </div><!--end col-->
                                                <div class="col-sm-6 text-end">
                                                    <a href="{{ route('password.request') }}" class="text-muted font-13"><i
                                                            class="dripicons-lock"></i> Forgot password?</a>
                                                </div><!--end col-->
                                            </div><!--end form-group-->

                                            <div class="form-group mb-0 row">
                                                <div class="col-12">
                                                    <button class="btn btn-primary bg-info w-100 waves-effect waves-light"
                                                        type="submit">Register Now <i
                                                            class="fas fa-sign-in-alt ms-1"></i></button>
                                                </div><!--end col-->
                                            </div> <!--end form-group-->
                                        </form><!--end form-->
                                        {{-- <div class="m-3 text-center text-muted">
                                                <p class="mb-0">Don't have an account ?  <a href="#" class="text-primary ms-2">Resister here</a></p>
                                            </div> --}}
                                    </div>
                                </div>
                            </div><!--end card-body-->
                            <div class="card-body bg-light-alt text-center">
                                <span class="text-muted d-none d-sm-inline-block">Crimson Logistics ©
                                    <script>
                                        document.write(new Date().getFullYear())
                                    </script>
                                </span>
                            </div>
                        </div><!--end card-->
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end col-->
        </div><!--end row-->
    </div>
@endsection
