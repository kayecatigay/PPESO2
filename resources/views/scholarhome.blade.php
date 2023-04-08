@extends('layouts.default')

@section('content')
<section id="scholarabout" class="about">
    <div class="container" data-aos="fade-up">

    <div class="row">
        <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
            <img src="assets/img/about.jpg" class="img-fluid" alt="">
        </div>
        <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content" data-aos="fade-right" data-aos-delay="100">
            <h3>Provincial Educational <br> Assistance Program (PEAP)</h3>
            </p>
            <ul>
            <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
            <li><i class="ri-check-double-line"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
            <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.</li>
            </ul>
            <p>
            Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
            velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident
            </p>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col" data-aos="zoom-in" data-aos-delay="100">
                <div class="icon-box">
                    @if ($reg)
                        <div class="icon"><i class="bi bi-mortarboard-fill"></i></div>
                        <h4><a href="oldscholardetails">Registration Info</a></h4>
                        <p>Update Info</p>
                    @else
                        <div class="icon"><i class="bi bi-mortarboard-fill"></i></div>
                        <h4><a href="Sregistration">Registration</a></h4>
                        <p>New Scholar</p>
                    @endif
                    
                </div>
            </div>

            <div class="col" data-aos="zoom-in" data-aos-delay="200">
                <div class="icon-box">
                    <div class="icon"><i class="bi bi-briefcase-fill"></i></div>
                    <h4><a href="scholarA">Announcements</a></h4>
                    <p>Schedules, Lists, etc.</p>
                </div>
            </div>
            <div class="col">&nbsp;</div>
            <div class="col">&nbsp;</div>
            
            
        </div>       
    </div>
</section>
@endsection