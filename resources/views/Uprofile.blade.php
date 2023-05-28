@extends('layouts.default')
@section('content')
    <section style="background-color: #0000; ">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-9 col-xl-9">
                <div class="card">
                    <div class="rounded-top text-white d-flex flex-row" style="background-image: url('/assets/images/bg.jpg'); height:200px;">
                        <div class="ms-2 mt-6" style="width: 150px; margin-top: 120px;">
                           <div class="mt-auto mb-auto">
                                <input type="text" readonly style="background-color: transparent; border:0; color:white; font-size: 30px;"
                                    name="uname" id="uname" value="{{ Auth::user()->name }}" > <br>
                                <input type="text"  readonly style="background-color: transparent; border:0; margin-left:0; width:160%; color:white; font-size: 15px;"
                                    name="email" id="email" value="{{ Auth::user()->email }}" >
                            </div>
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
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <p class="lead fw-normal mb-0">Recent Announcements</p>
                        <p class="mb-0"><a href="#!" class="text-muted">Show all</a></p>
                    </div>
                    
                    <div class="row">
                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                            <div class="icon-box">
                                <div class="icon">
                                    <i class="bi bi-mortarboard-fill"></i>
                                </div>
                                <h4><a href="scholarhomepage">Scholarship</a></h4>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
                            <div class="icon-box">
                                <div class="icon">
                                    <i class="bi bi-briefcase-fill" ></i>
                                </div>
                                <h4><a href="employmenthomepage">Employment</a></h4>
                            
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="300">
                            <div class="icon-box">
                                <div class="icon">
                                    <i class="bi bi-airplane-engines-fill"></i>
                                </div>
                                <h4><a href="ofwhomepage">OFW</a></h4>
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection