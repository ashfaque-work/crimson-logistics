@extends('layouts.guest')
@section('content')
<style>
    .auth-header-box {
        background-image: linear-gradient(#009bb5, #012a4a);
    }

    .bg-color .bg-info {
        background-color: #009bb5 !important;
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
                                    <img src="{{ url('assets/images/crimson-logo.png') }}" height="60" alt="logo" class="auth-logo">
                                </a>
                                <h4 class="mt-3 mb-1 fw-semibold text-white font-18">Let's Get Started Elite Medical Staffing Group</h4>
                                <p class="text-muted  mb-0">Sign in to continue to Elite Medical Staffing Group.</p>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <ul class="nav-border nav nav-pills" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active fw-semibold" data-bs-toggle="tab" href="#LogIn_Tab" role="tab">Forgot Password</a>
                                </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane active p-3" id="LogIn_Tab" role="tabpanel">
                                    <div class="mb-4 text-sm text-gray-600">
                                        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                                    </div>
                                    <x-auth-session-status class="mb-4" :status="session('status')" />
                                    <form method="POST" action="{{ route('password.email') }}">
                                        @csrf
                                        
                                        <div class="form-group mb-2">
                                            <x-input-label for="email" :value="__('Email')" />
                                        </div>
                                        <div class="form-group">
                                            <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus />
                                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                        </div>


                                        <div class="flex items-center justify-end mt-4">
                                            <button class="btn btn-primary bg-info w-100 waves-effect waves-light" type="submit">{{ __('Email Password Reset Link') }} <i class="fas fa-sign-in-alt ms-1"></i></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div><!--end card-body-->
                        <div class="card-body bg-light-alt text-center">
                            <span class="text-muted d-none d-sm-inline-block">Elite Medical Staffing Group © <script>
                                    document.write(new Date().getFullYear())
                                </script></span>
                        </div>
                    </div><!--end card-->
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end col-->
    </div><!--end row-->
</div>
@endsection