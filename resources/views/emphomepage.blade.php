@extends('layouts.default')

@section('content')
<section id="scholarabout" class="about">
    <div class="container" data-aos="fade-up">

    <div class="row">
        <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
            <img src="assets/img/about.jpg" class="img-fluid" alt="">
        </div>
        <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content" data-aos="fade-right" data-aos-delay="100">
            <h3>Employment</h3> <br>
            <p style="text-indent: 30px;">
            The vision of an employment assistance program provided by a PESO <br>
            may be to reduce unemployment, underemployment, and poverty in the 
            local community by providing job seekers with access to employment opportunities, 
            career guidance, and other support services. The program may aim to match 
            job seekers with suitable employers, promote the development of local businesses 
            and industries, and improve the overall economic well-being of the community. 
            The program may also strive to enhance the employability of job seekers through 
            skills training, job readiness programs, and other forms of education and training. </p>
            <p style="text-indent: 30px;">
            Ultimately, the vision of an employment assistance program provided by a 
            PESO is to help job seekers achieve their career goals and contribute to the 
            growth and development of the local economy.</p>
            
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col" data-aos="zoom-in" data-aos-delay="100">
                <div class="icon-box">
                    <div class="icon"><i class="bi bi-mortarboard-fill"></i></div>
                    <h4><a href="Eregistration">Registration</a></h4>
                    <p>Bio-Data </p>   
                </div>
            </div>

            <div class="col" data-aos="zoom-in" data-aos-delay="200">
                <div class="icon-box">
                    <div class="icon"><i class="bi bi-briefcase-fill"></i></div>
                    <h4><a href="empA">Announcements</a></h4>
                    <p>Schedules, Lists, etc.</p>
                </div>
            </div>
            <div class="col">&nbsp;</div>
            <div class="col">&nbsp;</div>
            
            
        </div>       
    </div>
</section>
@endsection