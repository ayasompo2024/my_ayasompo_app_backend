@extends('layouts.app')

@section('content')
<div class="container">
    <br><br><br>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border-0 shadow-sm">
                <div class="card-header p-2 border-0">
                    <img src="{{ asset('logo.svg') }}" alt="AdminLTE Logo"
                        style="height: 40px;border: 2px solid green;border-radius: 20px">
                    Gego
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf


                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name')
                                }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control " name="name" required
                                    autocomplete="name">
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address')
                                }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus>


                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password')
                                }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control " name="password" required
                                    autocomplete="current-password">


                            </div>
                        </div>


                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-info">
                                    {{ __('Login') }}
                                </button>
                            </div>

                        </div>

                        <div class="row mb-0 mt-3">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-outline-secondary">
                                    <img height=30px
                                        src="https://cdn1.iconfinder.com/data/icons/google-s-logo/150/Google_Icons-09-512.png" />
                                    {{ __('Login with Google') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection