@extends('layouts.app')

@section('content')
   
<body class="img js-fullheight" style="background-image: url(assets/images/bg.jpg);">
    <section class="container">
        <div class="container">
                <br><br><br><br>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card w3-white" style="opacity:0.7">
                        <!-- <div class="card-header">{{ __('Login') }}</div> -->
                        
                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}">
                            
                                @csrf
                                <br>  
                                <div class="row mb-3">
                                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

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
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div> <br><br>    

                                <div class="row">
                                @csrf
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Login') }}
                                        </button>
                                        <a class="btn btn-primary" href="/choose">
                                            {{ __('Register') }}
                                        </a>
                                    </div>
                                    <div class="col-8 offset-md-4"><br>
                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                {{ __('Forgot Password?') }}
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div><br><br><br><br><br><br><br>
                </div>
            </div>
        </div>
    </section>
</body>

@endsection

