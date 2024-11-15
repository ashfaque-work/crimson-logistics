@extends('layouts.master')
@section('page-title', 'Orders')
@section('breadcrumb-parent', 'Home')
@section('breadcrumb-child', 'Orders')
@section('content')
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all" type="button"
                role="tab" aria-controls="all" aria-selected="true">ALL</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="order-received-tab" data-bs-toggle="tab" data-bs-target="#order-received"
                type="button" role="tab" aria-controls="order-received" aria-selected="false">ORDER RECEIVED</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="processing-tab" data-bs-toggle="tab" data-bs-target="#processing" type="button"
                role="tab" aria-controls="processing" aria-selected="false">PROCESSING</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="ready-to-load-tab" data-bs-toggle="tab" data-bs-target="#ready-to-load"
                type="button" role="tab" aria-controls="ready-to-load" aria-selected="false">READY TO LOAD</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="bill-submitted-tab" data-bs-toggle="tab" data-bs-target="#bill-submitted"
                type="button" role="tab" aria-controls="bill-submitted" aria-selected="false">BILL SUBMITTED</button>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
            <div class="p-0 table-responsive table-custom my-3">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>{{ __('Order No.') }}</th>
                            <th>{{ __('Order Date') }}</th>
                            <th>{{ __('Order Status') }}</th>
                            <th>{{ __('Send Truck No') }}</th>
                        </tr>
                    </thead>
                    <tbody>

                        @if (count($orders) > 0)
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->order_number }}</td>
                                    <td>{{ $order->created_at }}</td>
                                    <td>{{ $order->shippingStatus->ref_con_cnf_ord }}</td>
                                    <td>
                                        @if ($order->shippingStatus->ref_con_cnf_ord == 'ready_to_receive')
                                            <a href="#" class="btn btn-dark" data-order-id="{{ $order->id }}"
                                                data-bs-toggle="modal" data-bs-target="#sendTruckDetails{{ $order->id }}">
                                                <i class="fas fa-check me-2"></i> {{ __('Confirm Order') }}
                                            </a>
                                            {{--  sendTruckDetails Modal --}}
                                            <div class="modal fade" id="sendTruckDetails{{ $order->id }}" tabindex="-1"
                                                aria-labelledby="sendTruckDetailsLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title text-dark" id="sendTruckDetailsLabel">
                                                                {{ __('Send Truck Details') }}</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <form id="truckDetails-form" action="" method="post">
                                                            <div class="modal-body">
                                                                <p id="truckDetails-message">Please give truck numbers</p>
                                                                <label for="truckNo">Truck Number</label>
                                                                <input type="text" name="truckNo" class="form-control"
                                                                    placeholder="TX-121212">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                                                                @csrf
                                                                <input type="hidden" name="orderId"
                                                                    value="{{ $order->id }}">
                                                                <button type="submit"
                                                                    class="btn btn-danger">{{ __('Save') }}</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
            </div>
        @elseif ($order->shippingStatus->ref_con_cnf_ord == 'confirmed')
            <button class="btn btn-dark" disabled>Truck Details Sent</button>
            @endif
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
    <div class="tab-pane fade" id="order-received" role="tabpanel" aria-labelledby="order-received-tab">...</div>
    <div class="tab-pane fade" id="processing" role="tabpanel" aria-labelledby="processing-tab">...</div>
    <div class="tab-pane fade" id="ready-to-load" role="tabpanel" aria-labelledby="ready-to-load-tab">...</div>
    <div class="tab-pane fade" id="bill-submitted" role="tabpanel" aria-labelledby="bill-submitted-tab">...</div>
    </div>
@endsection
