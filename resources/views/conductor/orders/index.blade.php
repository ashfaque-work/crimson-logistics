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
                        <a href="{{ route('conductor.orders.create') }}" class="btn btn-primary">
                            {{ __('Add Order') }} <i class="fas fa-plus-circle"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="p-0 table-responsive table-custom my-3">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>{{ __('Order No.') }}</th>
                            <th>{{ __('Order Date') }}</th>
                            <th>{{ __('Status From Refiner') }}</th>
                            <th>{{ __('Update') }}</th>
                            <th class="text-right">{{ __('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($orders) > 0)
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->order_number }}</td>
                                    <td>{{ $order->created_at }}</td>
                                    <td>{{ $order->shippingStatus->con_ref_cnf_ord }}</td>
                                    <td>
                                        @if ( $order->shippingStatus->ref_con_cnf_ord == null )
                                            <button class="btn btn-dark" disabled>Awaiting</button>
                                        @elseif ( $order->shippingStatus->ref_con_cnf_ord == "pending" )
                                            <form action="{{ route('conductor.orders.readyToReceive') }}" method="POST">
                                                @csrf
                                                <input type="hidden" value="{{ $order->id }}" name="orderId">
                                                <button type="submit" class="btn btn-dark">Confirm Ready to Receive</button>
                                            </form> 
                                        @elseif ( $order->shippingStatus->ref_con_cnf_ord == "ready_to_receive" )  
                                            <button class="btn btn-dark" disabled>Confirmed Ready to Receive</button>                              
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
                                                <li><a href="{{ route('conductor.orders.edit', $order->id) }}"
                                                        class="dropdown-item"><i
                                                            class="fas fa-edit me-2"></i>{{ __('Edit') }}</a></li>
                                                <li>
                                                    <a href="#" class="dropdown-item delete-btn"
                                                        data-order-id="{{ $order->id }}" data-bs-toggle="modal"
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
