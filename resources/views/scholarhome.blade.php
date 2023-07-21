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
            <br>
            
            <p style="text-indent: 30px;"> 
            The vision of a provincial education assistance program provided by<br>
            PESO may be to promote education and skills development among the  <br>
            youth and unemployed individuals in the province, and to provide them with  <br>
            the necessary assistance to pursue their education or training to secure <br>
            better employment opportunities. The program may aim to address the <br>
            skills gap in the province and help individuals gain the necessary knowledge<br>
             and skills to meet the demands of the local job market. <br></p>
            <p style="text-indent: 30px;"> 
            Additionally, the program may aim to reduce poverty and improve <br>
            the standard of living of the province's residents through education and employment.</p>
            
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col" data-aos="zoom-in" data-aos-delay="100">
                <div class="icon-box">
                
                        <div class="icon"><i class="bi bi-pencil-square" aria-hidden="true"></i></div>
                        <h4><a href="Sregistration">Registration</a></h4>
                        <p>Scholar</p>
                    
                </div>
            </div>

            <div class="col" data-aos="zoom-in" data-aos-delay="200">
                <div class="icon-box">
                    <div class="icon"><i class="bi bi-briefcase-fill"></i></div>
                    <h4><a href="GeneralA/peap">Announcements</a></h4>
                    <p>Schedules, Lists, etc.</p>
                </div>
            </div>
            <div class="col">&nbsp;</div>
            <div class="col">&nbsp;</div>
            
            
        </div>       
    </div>
</section>
@endsection