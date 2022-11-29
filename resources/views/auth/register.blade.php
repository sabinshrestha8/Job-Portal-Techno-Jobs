@extends('layouts.app')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center py-5">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ $title ?? '' }} {{ __('Register') }}</div>

                <div class="card-body">
                    @isset($route)
                        <form method="POST" action="{{ $route }}">
                    @else
                        <form method="POST" action="{{ route('register') }}">
                    @endisset
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}

<div class="container w-75 my-5 d-flex justify-content-center">
    <div class="card w-50 p-4 pb-2">
        <fieldset class="pb-2">
            <h2 class="fw-bold pb-2 text-primary">{{ isset($title) ? strtoupper($title) : '' }} {{ __(strtoupper('Create an account')) }}</h2>
        </fieldset>

        @isset($route)
            <form method="POST" action="{{ $route }}">
        @else
            <form method="POST" action="{{ route('register') }}">
        @endisset
            @csrf
            <div class="form-outline mb-4">
                <label class="form-label" for="name">Name</label>
                <input type="email" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"/>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-outline mb-4">
                <label class="form-label" for="email">Email address</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"/>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-outline mb-4">
                <label class="form-label" for="password">Password</label>
                <input type="password" name="password" value="{{ old('password') }}" class="form-control @error('email') is-invalid @enderror"/>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-outline mb-4">
                <label class="form-label" for="password-confirm">Confirm Password</label>
                <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" class="form-control"/>
            </div>

            <button type="submit" class="btn btn-primary btn-block mb-4" style="width:100%">{{ __('Register now') }}</button>
        </form>
    </div>
</div>
@endsection
