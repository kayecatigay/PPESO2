@extends('layouts.app')

@section('content')

<body class="img js-fullheight" style="background-image: url(assets/images/bg.jpg);">
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="w3 card w3-white" style="opacity:0.7">
                        <div class="card-header " style="text-align:center; ">
                            <h2 class="display-rebrand mt-20 pb-2" style="font-weight:bold;">
                            {{ __('Join as a USER or an EMPLOYER') }} 
                            </h2>
                        </div>

                        <div class="card-body">
                                @csrf
                                <div class="container">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <a href=""></a><h4 class="card-title">I am a user, looking for work and scholarships</h4>
                                                        <a class="btn btn-primary" href="{{ route('register') }}">
                                                            {{ __('Register') }}
                                                        </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <a href=""></a><h4 class="card-title">I am an employer, hiring for work</h4>
                                                        <div class="w3-dropdown-click">
                                                            <button onclick="myFunction()" class="btn btn-primary">Register</button>
                                                            <div id="Demo" class="w3-dropdown-content w3-bar-block w3-border">
                                                            <a href="#" class="w3-bar-item w3-button">Local</a>
                                                            <a href="#" class="w3-bar-item w3-button">Overseas</a>
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><br>
                                
                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-5">
                                        <a class="btn btn-primary" href="{{ route('login') }}">
                                            {{ __('Login') }}
                                        </a>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

<script>
function myFunction() {
  var x = document.getElementById("Demo");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}
</script>
@endsection
