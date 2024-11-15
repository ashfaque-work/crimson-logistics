@extends('layouts.app')
@section('page-title', 'Create User')
@section('breadcrumb-parent', 'Home')
@section('breadcrumb-child', 'Create User')

@section('content')
    <div class="content">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h3 class="card-title">{{ __('Add a new user') }}</h3>
                <div class="card-tools">
                    <a href="{{ route('conductor.users.index') }}" class="btn btn-danger">
                        <i class="fas fa-long-arrow-alt-left"></i> {{ __('Go Back') }}
                    </a>
                </div>
            </div>
            <div class="card-body p-0">
                <form class="form-horizontal" action="{{ route('conductor.users.store') }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="name" class="col-form-label">{{ __('Name') }}<span
                                        class="required-field">*</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" placeholder="{{ __('Name') }}"
                                    value="{{ old('name') }}" autocomplete="name">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="email" class="col-form-label">{{ __('Email Address') }}<span
                                        class="required-field">*</span></label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    id="email" name="email" placeholder="{{ __('Email Address') }}"
                                    value="{{ old('email') }}" autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="phone" class="col-form-label">{{ __('Phone') }}</label>
                                <input type="text" class="form-control" id="phone" name="phone"
                                    placeholder="{{ __('Phone') }}" value="{{ old('phone') }}">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="address" class="col-form-label">{{ __('Address') }}</label>
                                <input type="text" class="form-control" id="address" name="address"
                                    placeholder="{{ __('Address') }}" value="{{ old('address') }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="city" class="col-form-label">{{ __('City') }}</label>
                                <input type="text" class="form-control" id="city" name="city"
                                    placeholder="{{ __('City') }}" value="{{ old('city') }}">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="state" class="col-form-label">{{ __('State') }}</label>
                                <input type="text" class="form-control" id="state" name="state"
                                    placeholder="{{ __('State') }}" value="{{ old('state') }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="country" class="col-form-label">{{ __('Country') }}</label>
                                <input type="text" class="form-control" id="country" name="country"
                                    placeholder="{{ __('Country') }}" value="{{ old('country') }}">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="zip" class="col-form-label">{{ __('Zip') }}</label>
                                <input type="number" class="form-control" id="zip" name="zip"
                                    placeholder="{{ __('Zip') }}" value="{{ old('zip') }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="password" class="col-form-label">{{ __('Password') }}<span
                                        class="required-field">*</span></label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    id="password" name="password" placeholder="{{ __('Password') }}"
                                    autocomplete="password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="password-confirm" class="col-form-label">{{ __('Password Confirm') }}<span
                                        class="required-field">*</span></label>
                                <input type="password" class="form-control" id="password_confirmation"
                                    name="password_confirmation" placeholder="{{ __('Password Confirm') }}"
                                    autocomplete="password_confirmation">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="role" class="col-form-label">{{ __('Role') }}<span
                                        class="required-field">*</span></label>
                                <select class="form-control @error('role') is-invalid @enderror" id="role"
                                    name="role">
                                    <option value="">{{ __('Select Role') }}</option>
                                    @foreach ($roles as $roleId => $roleName)
                                        <option value="{{ $roleName }}">{{ ucfirst($roleName) }}</option>
                                    @endforeach
                                </select>
                                @error('role')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="status" class="col-form-label">{{ __('Status') }}</label>
                                <select class="form-control" id="status" name="status">
                                    <option value="1">{{ __('Active') }}</option>
                                    <option value="0">{{ __('Inactive') }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-danger"><i class="fas fa-save"></i>
                                    {{ __('Save User') }}</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
