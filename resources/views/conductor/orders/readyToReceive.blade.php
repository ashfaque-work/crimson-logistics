@extends('layouts.app')
@section('page-title', 'Orders')
@section('breadcrumb-parent', 'Home')
@section('breadcrumb-child', 'Orders')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="col-md-12">
                {{-- @include('admin.includes.alert') --}}
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-5 col-6 mb-2">
                    <form action="{{ route('conductor.orders.index') }}" method="GET" role="search">
                        <div class="input-group">
                            <input type="text" name="term" placeholder="{{ __('Type name or email ...') }}"
                                class="form-control" autocomplete="off" value="{{ request('term') ? request('term') : '' }}"
                                required>
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
                        {{-- <a href="{{ route('conductor.orders.create') }}" class="btn btn-primary">
                            {{ __('Add Order') }} <i class="fas fa-plus-circle"></i>
                        </a> --}}
                    </div>
                </div>
            </div>
            <div class="p-0 table-responsive table-custom my-3">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>{{ __('Order No.') }}</th>
                            <th>{{ __('Refiner') }}</th>
                            <th>{{ __('Freight') }}</th>
                            <th>{{ __('Shipper') }}</th>
                            <th>{{ __('Client') }}</th>
                            <th>{{ __('Update') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($orders) > 0)
                            @foreach ($orders as $key => $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->order_number }}</td>
                                    <td>
                                        {{-- check notify status --}}
                                        @if ($order)
                                            <form action="" method="POST">
                                                <input type="hidden" name="role" value="refiner">
                                                <button type="submit" class="btn btn-dark">Notify</button>
                                            </form>
                                        @endif
                                    </td>
                                    <td>
                                        {{-- check notify status --}}
                                        @if ($order)
                                            <form action="" method="POST">
                                                <input type="hidden" name="role" value="freight">
                                                <button type="submit" class="btn btn-dark">Notify</button>
                                            </form>
                                        @endif</td>
                                    <td>
                                        {{-- check notify status --}}
                                        @if ($order)
                                            <form action="" method="POST">
                                                <input type="hidden" name="role" value="client">
                                                <button type="submit" class="btn btn-dark">Notify</button>
                                            </form>
                                        @endif
                                    </td>
                                    <td>
                                        {{-- check notify status --}}
                                        @if ($order)
                                            <form action="" method="POST">
                                                <input type="hidden" name="role" value="refiner">
                                                <button type="submit" class="btn btn-dark">Notify</button>
                                            </form>
                                        @endif
                                    </td>
                                    <td>{{ $order->status }}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="9">
                                    <div class="data_empty">
                                        <img src="{{ asset('img/result-not-found.svg') }}" alt="" title="">
                                        <p>{{ __('Sorry, no order found in the database. Create your very first order.') }}
                                        </p>
                                        <a href="{{ route('conductor.orders.create') }}" class="btn btn-primary">
                                            {{ __('Add Order') }} <i class="fas fa-plus-circle"></i>
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
    @include('layouts.modal.orderDeleteConfirmation')

    <script>
        $(document).ready(function() {
            $('.delete-btn').click(function() {
                var orderId = $(this).data('order-id');
                $('#delete-order-id').val(orderId);
            });
        });
    </script>
@endsection
