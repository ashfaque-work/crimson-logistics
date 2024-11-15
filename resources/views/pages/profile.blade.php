@extends('layouts.app')
@section('page-title', 'Profile')
@section('breadcrumb-parent', 'Home')
@section('breadcrumb-child', 'Profile')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card bg-color">
                        <div class="card-header bg-info">
                            <h4 class="card-title text-light fs-4">Profile Info</h4>
                        </div>
                        <div class="card-body">

                            <form action="{{ route('profile.update') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="name" value="{{ $user->name }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="name">Email</label>
                                    <input type="email" name="email" id="email" value="{{ $user->email }}" class="form-control">
                                </div>
                                <button type="submit" class="btn btn-primary">Update</button>
                                @if ($user->hasRole('nurse') || $user->hasRole('clinic'))
                                    <button type="button" id="deleteProfileBtn" class="btn btn-danger">Delete</button>
                                @endif
                            </form>
                            
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script>
         $(document).ready(function () {
            $('#deleteProfileBtn').on('click', function () {
                const password = prompt("Please enter your password to confirm deletion:");
                if (password) {
                    const csrfToken = $('meta[name="csrf-token"]').attr('content'); // Get the CSRF token

                    $.ajax({
                        url: '{{ route('profile.destroy') }}', // Adjust the route as needed
                        method: 'DELETE',
                        data: {
                            _token: csrfToken,
                            password: password
                        },
                        success: function (response) {
                            if (response.success) {
                                window.location.href = '{{ route('login') }}';
                            } else {
                                alert(response.message);
                            }
                        },
                        error: function (error) {
                            console.error(error);
                        }
                    });
                }
            });
        });
    </script>
@endsection
