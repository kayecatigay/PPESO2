@extends('layouts.default')


@section('homecontent')

<!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center justify-content-center">
      <div class="container" data-aos="fade-up">
          <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
            <div class="col-xl-6 col-lg-8">
              <h1>Available Works<span>.</span></h1>
              <h2>Employment</h2>
            </div>
          </div>  
          <div class="row gy-4 mt-5 justify-content-center" data-aos="zoom-in" data-aos-delay="250">

            @foreach ( $availableW as $work)
              <div class="col-xl-2 col-md-4">
              <a href="addEmpTable" id="chosenC" name="chosenC">
                  <div class="icon-box">
                    <i class="ri-calendar-todo-line"></i>
                    <h3 style="color:white;">{{ $work->company}} </h3>
                  </div>
                </a>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </section><!-- End Hero -->


@endsection
