@extends('admin.layout.app')
@section('content')
    <div class="container bg-white pb-4">
        <nav class="pt-3 pl-3">
            Admin / All
            <span class="badge bg-info ml-2">{{ $users->total() }}</span>
            <div class="float-right">
                <a class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#new">
                    <i class="bi bi-plus-square pr-2"></i> Add Account
                </a>
            </div>
        </nav>
        @include('admin.validation-error-alert')
        <div class="bg-light px-md-3 mt-2 pt-3 mt-4 " style="min-height: 50vh">
            <div class="table-responsive">
                <table class="table">
                    <thead class="bg-info">
                        <tr>
                            <th class="p-1" style="min-width: 140px">Name</th>
                            <th class="p-1" style="min-width: 200px">Email</th>
                            <th class="p-1">Role</th>
                            <th class="p-1">Status</th>
                            <th class="p-1" style="min-width: 140px">Session</th>
                            <th class="p-1">Logs</th>
                            <th class="p-1" style="min-width: 140px">Created</th>
                            <th class="p-1" style="min-width: 140px">Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $key => $item)
                            <tr style="font-size: 15px">
                                <td class="p-0 pl-1">
                                    {{ $item->name }}
                                </td>
                                <td class="p-0 pl-1">
                                    {{ $item->email }}
                                </td>
                                <td class="p-0 pl-1">
                                    {{ ucfirst($item->role) }}
                                </td>
                                <td class="p-0 pl-1">
                                    @if ($item->status == 1)
                                        <span class="badge bg-info">Active</span>
                                    @else
                                        <span class="badge bg-warning">Disabled</span>
                                    @endif
                                </td>
                                <td class="p-0 pl-1">
                                    <form action="{{ route('admin.account.disabled.toggle', $item->id) }}" method="post">
                                        @csrf
                                        <button type="submit"
                                            class="btn btn-sm py-0 px-1 btn-outline-info text-dark border">
                                            @if ($item->status == 1)
                                                Make Disabled
                                            @else
                                                Make Active
                                            @endif
                                        </button>
                                    </form>
                                </td>
                                <td class="p-0 pl-1">
                                    <a href="logs/admin?user_id={{ $item->id }}" class="btn btn-sm text-info"><i
                                            class="bi bi-arrow-right-square-fill"></i></a>
                                </td>
                                <td class="p-0 pl-1">
                                    {{ $item->created_at }}
                                </td>
                                <td class="py-0 pl-1">
                                    <a href="{{ route('admin.account.edit', $item->id) }}" class="ml-3">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="float-right pb-3">
            <p class="">
                {!! $users->links('pagination::bootstrap-4') !!}
            </p>
        </div>
    </div>
    <div class="modal fade" id="new" tabindex="-1" role="dialog" aria-labelledby="newShopType" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="post" action="{{ route('admin.account.store') }}">
                    @csrf
                    <div class="card-header">{{ __('Register') }}</div>
                    <div class="card-body">

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text"
                                    class="form-control form-control-sm @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email ') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="email"
                                    class="form-control form-control-sm @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">Role</label>

                            <div class="col-md-6">
                                <select class="form-select form-control form-control-sm" name="role" required>
                                    @foreach ($roles as $role)
                                        <option>{{$role->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control form-control-sm @error('password') is-invalid @enderror"
                                    name="password" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm"
                                class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control form-control-sm"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-sm btn-info">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
