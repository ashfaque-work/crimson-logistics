@extends('layouts.app')
@section('page-title', 'Edit Product')
@section('breadcrumb-parent', 'Home')
@section('breadcrumb-child', 'Edit Product')

@section('content')
    <div class="content">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h3 class="card-title">{{ __('Add a new Product') }}</h3>
                <div class="card-tools">
                    <a href="{{ route('conductor.products.index') }}" class="btn btn-danger">
                        <i class="fas fa-long-arrow-alt-left"></i> {{ __('Go Back') }}
                    </a>
                </div>
            </div>
            <div class="card-body p-0">
                <form class="form-horizontal" action="{{ route('conductor.products.update') }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="name" class="col-form-label">{{ __('Name') }}<span
                                        class="required-field">*</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" placeholder="{{ __('Name') }}"
                                    value="{{ old('name', $product->name) }}" autocomplete="name">
                                <input type="hidden" id="id" name="id" value="{{ old('name', $product->id) }}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="price" class="col-form-label">{{ __('Price') }}<span
                                        class="required-field">*</span></label>
                                <input type="text" class="form-control @error('price') is-invalid @enderror"
                                    id="price" name="price" placeholder="{{ __('Price') }}"
                                    value="{{ old('price', $product->price) }}" autocomplete="price">
                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="delivery_datetime" class="col-form-label">{{ __('Image') }}</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror"
                                    id="image" name="image" value="{{ old('image') }}">
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                @if ($product->image)
                                    <div class="mt-2">
                                        <img src="{{ asset('images/' . $product->image) }}" alt="Product Image"
                                            width="200">
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="status" class="col-form-label">{{ __('Status') }}</label>
                                <select class="form-control" id="status" name="status">
                                    <option value="1" {{ old('status', $product->status) == 1 ? 'selected' : '' }}>
                                        {{ __('Active') }}
                                    </option>
                                    <option value="0" {{ old('status', $product->status) == 0 ? 'selected' : '' }}>
                                        {{ __('Inactive') }}
                                    </option>
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="description" class="col-form-label">{{ __('Description') }}</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ old('description', $product->description) }}</textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-danger"><i class="fas fa-save"></i>
                                    {{ __('Save Product') }}</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
