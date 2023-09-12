@extends('layouts.default')


@section('homecontent')

    
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
              <a href="https://2yu.co"></a><br><style>.mapouter{position:relative;text-align:right;height:100%;width:100%;}</style>
              <a href="https://embedgooglemap.2yu.co/"></a>
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

          <form action="send-email" method="get" >
            @csrf <!-- Add CSRF token field -->
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
              <textarea class="form-control" id="message" name="message" rows="5" placeholder="Message" required></textarea>
            </div>
            
            <div class="text-center"><input type="submit"></div>
          </form>

        </div>
      </div>
    </section><!-- End Contact Section -->
  </main><!-- End #main -->

@endsection
