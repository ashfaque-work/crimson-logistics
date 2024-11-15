@extends('layouts.app')
@section('page-title', 'Products')
@section('breadcrumb-parent', 'Home')
@section('breadcrumb-child', 'Products')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="col-md-12">
                {{-- @include('admin.includes.alert') --}}
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-5 col-6 mb-2">
                    <form action="{{ route('conductor.products.index') }}" method="GET" role="search">
                        <div class="input-group">
                            <input type="text" name="name" placeholder="{{ __('Type name ...') }}" class="form-control"
                                autocomplete="off" value="{{ request('name') ? request('name') : '' }}" required>
                            <span class="input-group-append">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                </div>
                <div class="col-lg-9 col-md-7 col-6">
                    <div class="card-tools text-md-right">
                        {{-- <a class="btn btn-secondary" href="{{ route('users.pdf') }}">
                            <i class="fas fa-download"></i> @lang('Export')
                        </a> --}}
                        <a href="{{ route('conductor.products.create') }}" class="btn btn-primary">
                            {{ __('Add Product') }} <i class="fas fa-plus-circle"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="p-0 table-responsive table-custom my-3">
                <table class="table">
                    <thead>
                        <tr>
                            <th>{{ __('Name') }}</th>
                            <th>{{ __('Price') }}</th>
                            <th>{{ __('Description') }}</th>
                            <th>{{ __('Image') }}</th>
                            <th class="text-right">{{ __('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($products) > 0)
                            @foreach ($products as $key => $product)
                                <tr>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->description }}</td>
                                    <td>
                                        @if ($product->image)
                                            <img src="{{ asset('images/' . $product->image) }}" alt="Product Image"
                                                width="50">
                                        @endif
                                    </td>
                                    <td class="text-right">
                                        <div class="dropdown">
                                            <button class="btn btn-secondary dropdown-toggle action-dropdown-toggle"
                                                type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                <li><a href="{{ route('conductor.products.edit', $product->id) }}"
                                                        class="dropdown-item"><i
                                                            class="fas fa-edit me-2"></i>{{ __('Edit') }}</a></li>
                                                <li>
                                                    <a href="#" class="dropdown-item delete-btn"
                                                        data-product-id="{{ $product->id }}" data-bs-toggle="modal"
                                                        data-bs-target="#confirmDeleteModal">
                                                        <i class="fas fa-trash me-2"></i> {{ __('Delete') }}
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="9">
                                    <div class="data_empty">
                                        <img src="{{ asset('img/result-not-found.svg') }}" alt="" title="">
                                        <p>{{ __('Sorry, no product found in the database. Create your very first product.') }}
                                        </p>
                                        <a href="{{ route('conductor.products.create') }}" class="btn btn-primary">
                                            {{ __('Add Product') }} <i class="fas fa-plus-circle"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>

            <!-- pagination start -->
            {{-- {{ $users->links() }} --}}
            <!-- pagination end -->
        </div>
    </div>

    <!-- Delete Confiramtion Modal -->
    @include('layouts.modal.productDeleteConfirmation')

    <script>
        $(document).ready(function() {
            $('.delete-btn').click(function() {
                var productId = $(this).data('product-id');
                $('#delete-product-id').val(productId);
            });
        });
    </script>
@endsection
