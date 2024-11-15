@extends('layouts.app')
@section('page-title', 'Users')
@section('breadcrumb-parent', 'Home')
@section('breadcrumb-child', 'Users')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="col-md-12">
                {{-- @include('admin.includes.alert') --}}
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-5 col-6 mb-2">
                    <form action="{{ route('conductor.users.index') }}" method="GET" role="search">
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
                        <a href="{{ route('conductor.users.create') }}" class="btn btn-primary">
                            {{ __('Add User') }} <i class="fas fa-plus-circle"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="p-0 table-responsive table-custom my-3">
                <table class="table">
                    <thead>
                        <tr>
                            <th>@lang('#')</th>
                            <th>{{ __('Name') }}</th>
                            <th>{{ __('Email') }}</th>
                            <th>{{ __('Type') }}</th>
                            <th>{{ __('Status') }}</th>
                            <th>{{ __('Created') }}</th>
                            <th class="text-right">{{ __('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($users)
                            @foreach ($users as $key => $user)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>
                                        @if (!empty($user->name))
                                            <div>{{ $user->name }}</div>
                                        @else
                                            <div class="no-preview"></div>
                                        @endif
                                    </td>
                                    <td>{{ $user->email }} </td>
                                    <td>
                                        <span class=""><i class="fas fa-user-secret"></i>
                                            {{ __(ucfirst($user->getUserRole())) }}</span>
                                    </td>
                                    <td>
                                        @if ($user->isActive())
                                            <span class="">{{ __('Active') }}</span>
                                        @else
                                            <span class="">{{ __('Inactive') }}</span>
                                        @endif
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($user->created_at)->format('d-M-Y') }}</td>
                                    <td class="text-right">
                                        <div class="dropdown">
                                            <button class="btn btn-secondary dropdown-toggle action-dropdown-toggle"
                                                type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                <li>
                                                    @if ($user->isActive())
                                                        <a href="{{ route('conductor.users.status', ['id' => $user->id, 'status' => 0]) }}"
                                                            class="dropdown-item">
                                                            <i class="fas fa-window-close me-2"></i>
                                                            {{ __('Inactive') }}
                                                        </a>
                                                    @else
                                                        <a href="{{ route('conductor.users.status', ['id' => $user->id, 'status' => 1]) }}"
                                                            class="dropdown-item">
                                                            <i class="fas fa-check-square me-2"></i>
                                                            {{ __('Active') }}
                                                        </a>
                                                    @endif
                                                </li>
                                                <li><a href="{{ route('conductor.users.edit', $user->id) }}" class="dropdown-item"><i
                                                            class="fas fa-edit me-2"></i>{{ __('Edit') }}</a></li>
                                                <li>
                                                    @if ($user->id != auth()->user()->id)
                                                        <a href="#" class="dropdown-item delete-btn"
                                                            data-user-id="{{ $user->id }}" data-bs-toggle="modal"
                                                            data-bs-target="#confirmDeleteModal">
                                                            <i class="fas fa-trash me-2"></i> {{ __('Delete') }}
                                                        </a>
                                                    @endif
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="10">
                                    <div class="data_empty">
                                        <img src="{{ asset('img/result-not-found.svg') }}" alt="" title="">
                                        <p>{{ __('Sorry, no user found in the database. Create your very first user.') }}
                                        </p>
                                        <a href="{{ route('conductor.users.create') }}" class="btn btn-primary">
                                            {{ __('Add User') }} <i class="fas fa-plus-circle"></i>
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
    @include('layouts.modal.userDeleteConfirmation')

    <script>
        $(document).ready(function() {
            $('.delete-btn').click(function() {
                var userId = $(this).data('user-id');
                $('#delete-user-id').val(userId);
            });
        });
    </script>
@endsection
