@extends('admin.layout.app')
@section('content')
    <div class="container mx-md-5 pb-4">
        @include('admin.validation-error-alert')
        <br>
        <div class="mt-2">
            <form method="post" action="{{ route('admin.account.update', $account->id) }}">
                @method('put')
                @csrf
                <div class="card-body bg-light">
                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                        <div class="col-md-6">
                            <input id="name" type="text"
                                class="form-control form-control-sm @error('name') is-invalid @enderror" name="name"
                                value="{{ $account->name }}" required autocomplete="name" autofocus>
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
                                value="{{ $account->email }}" required autocomplete="email">

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
                                    <option @if ($role->name == $account->role) selected @endif >{{ $role->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('New Password') }}</label>
                        <div class="col-md-6">
                            <input id="password" type="password"
                                class="form-control form-control-sm @error('password') is-invalid @enderror" name="password"
                                autocomplete="new-password">
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
                                name="password_confirmation" autocomplete="new-password">
                        </div>
                    </div>
                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-sm border btn-white">
                                {{ __('Update') }}
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
