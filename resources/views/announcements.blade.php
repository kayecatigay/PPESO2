@extends('layouts.default')


@section('homecontent')

<!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center justify-content-center">
      <div class="container" data-aos="fade-up">
          <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
            <div class="col-xl-6 col-lg-8">
              <h1>Announcements<span>.</span></h1>

            </div>
          </div>
          <div class="row gy-4 mt-5 justify-content-center" data-aos="zoom-in" data-aos-delay="250">
            <div class="col-xl-2 col-md-4">
              <a href="GeneralA/general">
                <div class="icon-box">
                  <i class="ri-store-line"></i>
                  <h3 style="color:white;">General</h3>
                </div>
              </a>
            </div>
          </div>
          <div class="row gy-4 mt-5 justify-content-center" data-aos="zoom-in" data-aos-delay="250">
            <div class="col-xl-2 col-md-4">
            <a href="GeneralA/emp">
                <div class="icon-box">
                  <i class="ri-calendar-todo-line"></i>
                  <h3 style="color:white;">Employment </h3>
                </div>
              </a>
            </div>
            <div class="col-xl-2 col-md-4">
              <a href="GeneralA/peap">
                <div class="icon-box">
                  <i class="ri-paint-brush-line"></i>
                  <h3 style="color:white;">PEAP</h3>
                </div>
              </a>
            </div>
            <div class="col-xl-2 col-md-4">
              <a href="GeneralA/ofw">  
                <div class="icon-box">
                  <i class="ri-database-2-line"></i>
                  <h3 style="color:white;">OFW</h3>
                </div>
              </a>
            </div>
          </div>
      </div>
    </section><!-- End Hero -->


@endsection
