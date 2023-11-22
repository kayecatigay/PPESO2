<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Provincial PESO Service Management System</title>
  <style>
    /* Adjust the styles as needed */
    .fixed-card {
      position: fixed;
      top: 500px;
      left: 10px;
      width: 300px; /* Adjust the width as needed */
      z-index: 1000; /* Set a high z-index value */
      opacity: 70%;
    }
  </style>

  <!-- Favicons -->
  <link href="<?= url('assets/img/favicon.png') ?>" rel="icon">
  <link href="<?= url('assets/img/apple-touch-icon.png') ?>" rel="apple-touch-icon">
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">


  <!-- Google Fonts -->  
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

  <!-- <link href="<?= url('assets/vendor/aos/aos.css') ?>" rel="stylesheet"> -->

  <link href="<?= url('assets/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
  <link href="<?= url('assets/vendor/bootstrap-icons/bootstrap-icons.css') ?>" rel="stylesheet">
  <link href="<?= url('assets/vendor/boxicons/css/boxicons.min.css') ?>" rel="stylesheet">
  <link href="<?= url('assets/vendor/glightbox/css/glightbox.min.css') ?>" rel="stylesheet">
  <link href="<?= url('assets/vendor/remixicon/remixicon.css') ?>"rel="stylesheet">
  <link href="<?= url('assets/vendor/swiper/swiper-bundle.min.css') ?>" rel="stylesheet">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-metro.css">
 
  <script src="<?= url('assets/vendor/jquery/jquery.min.js') ?>"></script>
  <script src="<?= url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <!-- Template Main CSS File -->
  <link href="<?= url('assets/css/style.css') ?>" rel="stylesheet">
  <link href="<?= url('assets/css/profile.css') ?>" rel="stylesheet">

  
   
  <!-- =======================================================
  * Template Name: Gp - v4.10.0
  * Template URL: https://bootstrapmade.com/gp-free-multipurpose-html-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <!-- ======= Header ======= -->
  @section('header')
    <header id="header" class="w3-container w3-metro-dark-green"  >
      <div class="container d-flex align-items ">
        <img src="assets/img/favicon.png" style="width:40px; height:40px;" alt="icon"> &nbsp; &nbsp;
        <h1 class="logo "><a href="home">Provincial  <span>PESO</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

        <nav id="navbar" class="navbar order-last order-lg-0">
          <ul>
            <li><a class="nav-link scrollto" href="\home">Home </a></li>
            <li><a class="nav-link scrollto" href="\services">Services</a></li>
            <li><a class="nav-link scrollto" href="\contactus">Contact Us</a></li>
            <li><a class="nav-link scrollto" href="\announcements">Announcements</a></li>
            @guest
            @else        
              @if  (Auth::user()->roles>0)
                <li><a class="nav-link scrollto" href="\admindashboard">Dashboard</a></li>
              @endif
            @endguest
            
            <!-- <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
              <ul>
                <li><a href="#">Drop Down 1</a></li>
                <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                  <ul>
                    <li><a href="#">Deep Drop Down 1</a></li>
                    <li><a href="#">Deep Drop Down 2</a></li>
                    <li><a href="#">Deep Drop Down 3</a></li>
                    <li><a href="#">Deep Drop Down 4</a></li>
                    <li><a href="#">Deep Drop Down 5</a></li>
                  </ul>
                </li>
                <li><a href="#">Drop Down 2</a></li>
                <li><a href="#">Drop Down 3</a></li>
                <li><a href="#">Drop Down 4</a></li>
              </ul>
            </li> -->
          </ul>
          <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

        

        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ms-auto">
            <!-- Authentication Links -->
            @guest
                @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" style="color:white" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @endif

                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" style="color:white" href="/choose">{{ __('Register') }}</a>
                        <!-- href="{{ route('register') }}" -->
                    </li>
                @endif
            @else
              
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-15">
                            <div class="card w3-container w3-metro-dark-green" style="border:0">
                                <div class="card-header-text-bg-success" style="border:0"><!--{{ __('You are logged in!') }}--></div>

                                <div class="card text-bg-success" style="border:0">
                                    @if (session('status'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('status') }}
                                        </div>
                                    @endif
                                </div>

                                <div>
                                  
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" 
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }}
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="userprofile">Profile</a>
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                  document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }} <br>
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            @endguest
        </ul>
             
      </div>
</header><!-- End Header -->
  @show

  
  <!-- ======= Homepage Section ======= --> 
  @section('homecontent')

    <div class="container">
      <div class="row">   
          <!-- ======= Content Section ======= --> 
          @section('content')  @show
          <!-- ======= END content Section ======= -->
      </div>
    </div>

  @show
<!-- ======= Homepage Section ======= -->
  
  <!-- ======= Footer ======= -->
  @section('footer')
    <footer id="footer">
      <div class="footer-top">
        <div class="container">
          <div class="row">
          @section('footercontent')
            <div class="col-lg-3 col-md-6">
              <div class="footer-info">
                <h3>For more info <span>:</span></h3>
                <p>
                Provincial Capitol Compound <br>
                Nucable Avenue Extension <br>
                Brgy. Camilmil, Calapan City <br>
                Oriental Mindoro
                Philippines, 5200 <br> <br>
                  <strong>Phone:</strong> 288-7253<br>
                  <strong>Email:</strong> ppeso@ormindoro.gov.ph<br>
                  <strong>Fb Page:</strong> OrientalMindoro Peso<br>
                </p>
              </div>
            </div>

            <div class="col-lg-2 col-md-6 footer-links">
              <br> <br> 
              <h4>Useful Links</h4>
              <ul>
                <li><i class="bx bx-chevron-right"></i> <a href="home">Home</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="aboutus">About us</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="services">Services</a></li>
              </ul>
            </div>

            <div class="col-lg-3 col-md-6 footer-links">
              <br> <br>
              <h4>Our Services</h4>
              <ul>
                <li><i class="bx bx-chevron-right"></i> <a href="scholarhomepage">PEAP</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="employmenthomepage">Employment</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="ofwhomepage">OFW Assistance Program</a></li>
              </ul>
            </div>

            <div class="col-lg-4 col-md-6 footer-links">
              <a target="_blank" href="https://ormindoro.gov.ph/"><img src="<?= url('assets/img/orminlogo.png') ?>" alt="Oriental Mindoro Official Logo" style="width:160px;height:160px;"></a>
              <a target="_blank" href="https://ph.polomap.com/calapan-city/9285"><img src="<?= url('assets/img/pesologooo.png') ?>" alt="Public Employment Services Office Official Logo" style="width:160px;height:160px;"></a>
            </div>
          @show
          </div>
        </div>
      </div>
    
    </footer><!-- End Footer -->
  @show
  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?= url('assets/vendor/purecounter/purecounter_vanilla.js') ?>"></script>
  <script src="<?= url('assets/vendor/aos/aos.js') ?>"></script>
  <script src="<?= url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
  <script src="<?= url('assets/vendor/glightbox/js/glightbox.min.js') ?>"></script>
  <script src="<?= url('assets/vendor/isotope-layout/isotope.pkgd.min.js') ?>"></script>
  <script src="<?= url('assets/vendor/swiper/swiper-bundle.min.js') ?>"></script>
  <script src="<?= url('assets/vendor/php-email-form/validate.js') ?>"></script>
  <script src="<?= url('assets/vendor/bootstrap/js/bootstrap.bundle.min(2).js') ?>"></script>
  

  <!-- Template Main JS File -->
  <script src="<?= url('assets/js/main.js') ?>"></script>

</body>

</html>