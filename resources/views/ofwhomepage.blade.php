@extends('layouts.default')

@section('content')
<section id="scholarabout" class="about">
    <div class="container" data-aos="fade-up">

    <div class="row">
        <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
            <img src="assets/img/about.jpg" class="img-fluid" alt="">
        </div>
        <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content" data-aos="fade-right" data-aos-delay="100">
            <h3>Overseas Filipino Worker <br> Assistance Program </h3>
            
            <p> &emsp; &emsp;The goal of the Overseas Filipino Worker's Assistance Program (OFWAP) 
            is to provide comprehensive support and assistance to overseas Filipino workers (OFWs) 
            and their families, addressing their welfare and protection concerns during their 
            employment abroad. The program aims to achieve several key objectives, which may include:</p>

            <p>&emsp; &emsp; Welfare and Protection: OFWAP seeks to ensure the welfare and <br>
            protection of OFWs by offering assistance in various aspects of their <br> 
            overseas employment...</p>

            <p>&emsp; &emsp; Financial and Livelihood Assistance: OFWAP aims to assist OFWs <br>
                who encounter financial difficulties or loss of employment abroad...</p> 
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col" data-aos="zoom-in" data-aos-delay="100">
                <div class="icon-box">
                  
                        <div class="icon"><i class="bi bi-mortarboard-fill"></i></div>
                        <h4><a href="ofwregistration">Registration Info</a></h4>
                        <p>Update Info</p>
                   
                    
                </div>
            </div>

            <div class="col" data-aos="zoom-in" data-aos-delay="200">
                <div class="icon-box">
                    <div class="icon"><i class="bi bi-briefcase-fill"></i></div>
                    <h4><a href="GeneralA/ofw">Announcements</a></h4>
                    <p>Schedules, Lists, etc.</p>
                </div>
            </div>
            <div class="col">&nbsp;</div>
            <div class="col">&nbsp;</div>
            
            
        </div>       
    </div>
</section>
@endsection