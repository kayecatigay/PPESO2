@extends('layouts.default')


@section('homecontent')
<!-- ======= Hero Section ======= -->
   
    <section id="hero" class="d-flex align-items-center justify-content-center">
      <div class="container" data-aos="fade-up">
          <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
            <div class="col-xl-6 col-lg-8">
              <h1>Provincial Peso Service Management System</h1>
              <h2>Camilmil, Calapan City, Oriental Mindoro</h2>
            </div>
          </div>

          <div class="row gy-4 mt-5 justify-content-center" data-aos="zoom-in" data-aos-delay="250">
            <h2><b>ANNOUNCEMENTS</b></h2>
            <div class="col-xl-2 col-md-4">
              <div class="icon-box">
                <i class="ri-calendar-todo-line"></i>
                <h3><a href="Announcements">General</a></h3>
              </div>
            </div>
            <div class="col-xl-2 col-md-4">
              <div class="icon-box">
                <i class="ri-database-2-line"></i>
                <h3><a href="GeneralA">Services</a></h3>
              </div>
            </div>
          </div>
      </div>
    </section><!-- End Hero -->
  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="row">
            <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
              <img src="assets/img/about.jpg" class="img-fluid" alt="">
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content" data-aos="fade-right" data-aos-delay="100">
              <h3>About</h3>
              <p>
                Provincial Public and Employment Service Office
              </p>
            </div>
        </div>

      </div>
    </section><!-- End About Section -->
  
    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container" data-aos="fade-up">
          <div class="section-title">
            <h2>Services</h2>
            <p>Check our Services</p>
          </div>

            <div class="row">
              <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                <div class="icon-box">
                  <div class="icon"><i class="bi bi-mortarboard-fill"></i></div>
                  <h4><a href="scholarhomepage">Scholarship</a></h4>
                  <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>
                </div>
              </div>

              <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
                <div class="icon-box">
                  <div class="icon"><i class="bi bi-briefcase-fill"></i></div>
                  <h4><a href="employmenthomepage">Employment</a></h4>
                  <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</p>
                </div>
              </div>

              <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="300">
                <div class="icon-box">
                  <div class="icon"><i class="bi bi-airplane-engines-fill"></i></div>
                  <h4><a href="ofwhomepage">OFW</a></h4>
                  <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia</p>
                </div>
              </div>
            </div>
 
      </div>
    </section><!-- End Services Section -->
    <!-- ======= Cta Section ======= -->
    

    <!-- ======= Portfolio Section ======= -->
    <!-- End Portfolio Section -->

    <!-- ======= Counts Section ======= -->
    <!-- End Counts Section -->

    <!-- ======= Testimonials Section ======= -->
    <!-- End Testimonials Section -->

    
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Contact</h2>
          <p>Contact Us</p>
        </div>

        <div>
          <div class="mapouter">
            <div class="gmap_canvas"><iframe width="100%" height="100%" id="gmap_canvas" src="https://maps.google.com/maps?q=Oriental Mindoro Provincial Capitol, C54G+CVF, Oriental Mindoro Provincial Capitol, Calapan, 5200, Oriental Mindoro, Calapan, Oriental Mindoro&t=k&z=17&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
              <a href="https://2yu.co">2yu</a><br><style>.mapouter{position:relative;text-align:right;height:100%;width:100%;}</style>
              <a href="https://embedgooglemap.2yu.co/">html embed google map</a>
              <style>.gmap_canvas {overflow:hidden;background:none!important;height:100%;width:100%;}</style>
            </div>
          </div>
        </div>

        <div class="row mt-5">

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>Provincial Capitol Compound <br>
                Nucable Avenue Extension <br>
                Brgy. Camilmil, Calapan City <br>
                Oriental Mindoro
                Philippines, 5200 </p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>ppeso@ormindoro.gov.ph</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p>288-7253</p>
              </div>

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">

            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>

          </div>

        </div>
      </div>
    </section><!-- End Contact Section -->
  </main><!-- End #main -->

@endsection
