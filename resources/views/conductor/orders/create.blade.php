@extends('layouts.app')
@section('page-title', 'Create Order')
@section('breadcrumb-parent', 'Home')
@section('breadcrumb-child', 'Create Order')

@section('content')
    <div class="content">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h3 class="card-title">{{ __('Add a new order') }}</h3>
                <div class="card-tools">
                    <a href="{{ route('conductor.orders.index') }}" class="btn btn-danger">
                        <i class="fas fa-long-arrow-alt-left"></i> {{ __('Go Back') }}
                    </a>
                </div>
            </div>
            <div class="card-body p-0">
                <form class="form-horizontal" action="{{ route('conductor.orders.store') }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="product-fields">
                            <div class="row d-flex align-items-end">
                                <div class="col-md-3 form-group mb-0">
                                    <label for="products" class="col-form-label">Product Name<span
                                            class="required-field">*</span></label>
                                    <select class="form-control @error('products') is-invalid @enderror" id="products"
                                        name="products[]">
                                        <option value="" selected disabled>{{ __('Select a Product') }}</option>
                                        @foreach ($products as $product)
                                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3 form-group mb-0">
                                    <label for="quantities" class="col-form-label">Quantity<span
                                            class="required-field">*</span></label>
                                    <input type="number" step="any" min="0" name="quantities[]"
                                        placeholder="Quantity" required="required" class="form-control calculator" />
                                </div>
                                <div class="col-md-3 mb-0">
                                    <a href="javascript:void(0);" title="Add More"
                                        class="add_button btn btn-primary dynamic-btn"><i class="fas fa-plus"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="order_total" class="col-form-label">{{ __('Order Total') }}<span
                                        class="required-field">*</span></label>
                                <input type="text" class="form-control @error('order_total') is-invalid @enderror"
                                    id="order_total" name="order_total" placeholder="{{ __('Order Total') }}"
                                    value="{{ old('order_total') }}" autocomplete="order_total">
                                @error('order_total')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>


                        

                        <div class="row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-danger"><i class="fas fa-save"></i>
                                    {{ __('Save Order') }}</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            // Pass product data to JavaScript
            var productsData = @json($products);
            var maxFields = 10; // Maximum input fields allowed
            var wrapper = $(".product-fields"); // Fields wrapper
            var addButton = $(".add_button"); // Add button ID

            var x = 1; // Initial field counter is 1

            // When user clicks on add button
            $(addButton).click(function(e) {
                e.preventDefault();

                // Check maximum number of input fields
                if (x < maxFields) {
                    x++; // Increment field counter
                    var fieldHTML =
                        '<div class="row d-flex align-items-end"><div class="col-md-3 form-group mb-0"><label for="products" class="col-form-label">Product Name<span class="required-field">*</span></label><select id="products" name="products[]" required="required" class="form-control"><option value="" selected disabled>Select a Product</option>';

                    // Dynamically create options
                    @foreach ($products as $product)
                        fieldHTML += '<option value="{{ $product->id }}">{{ $product->name }}</option>';
                    @endforeach

                    fieldHTML +=
                        '</select></div><div class="col-md-3 form-group mb-0"><label for="quantities" class="col-form-label">Quantity<span class="required-field">*</span></label><input type="number" step="any" min="0" name="quantities[]" placeholder="Quantity" required="required" class="form-control calculator" /></div>';

                    if (x > 1) {
                        fieldHTML +=
                            '<div class="col-md-3 mb-0"><a href="javascript:void(0);" title="Remove" class="remove_button btn btn-danger dynamic-btn updateTotalBtn" data-number="' +
                            x + '"><i class="fas fa-backspace"></i></a></div>';
                    }

                    fieldHTML += '</div>';
                    $(wrapper).append(fieldHTML); // Add field html
                }
            });

            // Remove product and quantity fields
            $(wrapper).on("click", ".remove_button", function(e) {
                e.preventDefault();
                $(this).closest('.row').remove(); // Remove field html
                x--; // Decrement field counter
            });
        });
    </script>








@endsection
