@extends('layouts.nofooter')

@section('content')

<body class="img js-fullheight" style="background-image: url(assets/images/bg.jpg);">
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <br><br><br><br><br><br><h1 class="font-weight-bold" style="color:white; text-align:center; ">
                    NEED APPROVAL FROM PPESO</h1> <br><br>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-5">
                                <a class="btn btn-dark" href="{{ route('login') }}">
                                    {{ __('Back') }}
                                </a>
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
