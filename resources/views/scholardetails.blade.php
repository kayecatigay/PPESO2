@extends('layouts.default')

@section('content')
  <!-- ======= Services Section ======= -->
  <section id="services" class="services">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Services</h2>
          <p>Scholarship Form</p>
        </div>
        <form action="scholardata">
          
          <div class="form-group">
            <label for="name">Email address</label>
            <input type="email" class="form-control" id="name" name="name"  placeholder="Enter Name">
            <small id="emailHelp" class="form-text text-muted">Last name, First name, Middle name</small>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
          </div>
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        
        </form>
    </div>
  </section><!-- End Services Section -->
@endsection