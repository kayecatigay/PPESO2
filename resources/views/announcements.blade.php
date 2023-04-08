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
              <div class="icon-box">
                <i class="ri-store-line"></i>
                <h3><a href="GeneralA">General </a></h3>
              </div>
            </div>
          </div>
          <div class="row gy-4 mt-5 justify-content-center" data-aos="zoom-in" data-aos-delay="250">
            <div class="col-xl-2 col-md-4">
              <div class="icon-box">
                <i class="ri-calendar-todo-line"></i>
                <h3><a href="empA">Employment </a></h3>
              </div>
            </div>
            <div class="col-xl-2 col-md-4">
              <div class="icon-box">
                <i class="ri-paint-brush-line"></i>
                <h3><a href="scholarA">PEAP </a></h3>
              </div>
            </div>
            <div class="col-xl-2 col-md-4">
              <div class="icon-box">
                <i class="ri-database-2-line"></i>
                <h3><a href="ofwA">OFW </a></h3>
              </div>
            </div>
          </div>
      </div>
    </section><!-- End Hero -->
  <main id="main">

@endsection
