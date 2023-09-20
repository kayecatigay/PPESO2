@extends('layouts.app')

@section('content')

<body class="img js-fullheight" style="background-image: url(assets/images/bg.jpg);">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8"> <br><br><br><br>
                    <div class="w3 card w3-white" style="opacity:0.5">
                        <div class="card-header" style="text-align:center;"><h2 class="display-rebrand mt-20 pb-2">
                        {{ __('Join as a User or an Employer') }} </h2></div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="container">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="card">
                                            <div class="card-body">
                                                <a href=""></a><h4 class="card-title">I am a user, looking for work and scholarships</h4>
                                                <a href="#" class="btn btn-primary">Go somewhere</a>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="card">
                                            <div class="card-body">
                                                <a href=""></a><h4 class="card-title">I am an employer, hiring for work</h4>
                                                <a href="#" class="btn btn-primary">Go somewhere</a>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-5">
                                        <button type="submit" style="margin:0;" class="btn btn-primary">
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
