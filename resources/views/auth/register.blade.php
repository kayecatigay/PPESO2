@extends('layouts.app')

@section('content')

<body class="img js-fullheight" style="background-image: url(assets/images/bg.jpg);">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="w3 card w3-white" style="opacity:0.5">
                        <div class="card-header">{{ __('Register') }}</div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="row mb-3">
                                    <label for="name" class="col-md-4 col-form-label text-md-end"></label>
                                    <div class="col-md-6">
                                        <input id="name" type="hidden" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="fname" class="col-md-4 col-form-label text-md-end">First name</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" id="fname" name="fname">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="mname" class="col-md-4 col-form-label text-md-end">Middle name</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" id="mname" name="mname">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="lname" class="col-md-4 col-form-label text-md-end">Last name</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" id="lname" name="lname">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

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
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
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
        </div>
</body>
@endsection
