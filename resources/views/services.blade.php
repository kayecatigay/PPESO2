@extends('layouts.default')

@section('content')
<!-- ======= Services Section ======= -->
<section id="services" class="services">
      <div class="container" data-aos="fade-up">
          <div class="section-title">
            <h2>Services</h2>
            <p>Check our Services</p>
          </div>

          <div class="d-flex justify-content-around" >
              
                 <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="100" >
                    <a href="scholarhomepage">
                      <div class="icon-box" style="color:black;">
                        <div class="icon"><i class="bi bi-mortarboard-fill"></i></div>
                        <h4>Scholarship</h4>
                        <p>{{$show[0]->stext}}</p>
                        <p>{{$show[0]->Sstext}}</p>
                      </div>
                    </a>
                  </div>
              

                  <div class="col-lg-4 col-md-6 mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
                    <a href="employmenthomepage">
                      <div class="icon-box" style="color:black;">
                        <div class="icon"><i class="bi bi-briefcase-fill"></i></div>
                        <h4>Employment</h4>
                        <p>{{$show[0]->etext}}</p>
                        <p>{{$show[0]->Eetext}}</p>
                      </div>
                    </a>
                  </div>

                  <div class="col-lg-4 col-md-6 mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="300">
                    <a href="ofwhomepage">
                      <div class="icon-box" style="color:black;">
                        <div class="icon"><i class="bi bi-airplane-engines-fill"></i></div>
                        <h4>OFW</h4>
                        <p>{{$show[0]->aOfw}}</p>
                        <p>{{$show[0]->AaOfw}}</p>
                      </div>
                    </a>
                  </div>
                </div>
            </div>
 
      </div>
    </section><!-- End Services Section -->
@endsection