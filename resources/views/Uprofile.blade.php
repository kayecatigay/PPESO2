@extends('layouts.default')
@section('content')
    <section style="background-color: #0000; ">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-9 col-xl-9">
                <div class="card">
                    <div class="rounded-top text-white d-flex flex-row" style="background-image: url('/assets/images/bg.jpg'); height:200px;">
                        <div class="col" style="width: 200px; margin-top: 120px;">
                           <div class="mt-auto mb-auto" style="width: 150px;">
                                <input type="text" readonly style="background-color: transparent; border:0; color:white; font-size: 30px;"
                                    name="uname" id="uname" value= " &nbsp;{{ Auth::user()->name }}" > <br>
                                <input type="text"  readonly style="background-color: transparent; border:0; margin-left:0; width:160%; color:white; font-size: 15px;"
                                    name="email" id="email" value=" &emsp;{{ Auth::user()->email }}" >
                            </div>
                        </div>
                        <div class="col" style="width: 120px; margin-left: 550px; margin-top: 80px;">
                            <img width="80%" height="80%" style="border-radius: 50%;" src="{{ asset('assets/img/orminlogo.png') }}" >
                        </div>
                    </div>
                </div>
                <div class="p-0 text-black" style="background-color: #C1E1C1;">
                    <div class="d-flex">
                       <form action ="AddProfile" method="get">
                            <input type="hidden" id="userid" name="userid" value="{{ Auth::user()->id }}">
                            <input type="submit" class="btn btn-outline-dark" value="Edit Profile" name="submit" 
                            data-mdb-ripple-color="dark" style="padding: 0px 20px; margin-left:10px; margin-bottom:10px; margin-top: 10px;">
                        </form>
                    </div>
                </div>
                <div class="card-body p-4 text-black">
                    <div class="mb-5">
                        <p class="lead fw-normal mb-1">Available Services</p>
                        <div class="p-1" style="background-color: #f8f9fa;">
                            <div class="row">
                                <div class="col">
                                    <a href="#"><p class="font-italic mb-1 text-black">PEAP</p></a>
                                </div>
                                <div class="col">
                                    <a href="#"><p class="font-italic mb-1 text-black">Employment</p></a>
                                </div>
                                <div class="col">
                                    <a href="#"><p class="font-italic mb-1 text-black">Ofw Assistance Program</p></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Modal</title>
    <link rel="stylesheet" href="{{ asset('css/modal.css') }}">
</head>
<body>

<div class="col" style="width: 120px; margin-left: 550px; margin-top: 80px;">
    <img width="80%" height="80%" style="border-radius: 50%;" src="{{ asset('assets/img/orminlogo.png') }}" onclick="openModal()">
</div>

<!-- The Modal -->
<div id="myModal" class="modal">
  <span class="close" onclick="closeModal()">&times;</span>
  <div class="modal-content">
    <form method="POST" action="/uploadPic" enctype="multipart/form-data">
      @csrf
      <input type="file" name="file" required>
      <input type="hidden" id="userid" name="userid" value="{{ Auth::user()->id }}"> 
      &emsp; &emsp;&emsp;
      <button type="submit">Upload</button>
    </form>
  </div>
</div>

<script src="{{ asset('js/modal.js') }}"></script>
</body>
</html>
