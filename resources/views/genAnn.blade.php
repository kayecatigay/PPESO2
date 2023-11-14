@extends('layouts.default')


@section('homecontent')

    <section id="an1" style="background: url(<?= url('assets/img/hero-bg.jpg') ?>) top center; background-size: cover;" class="d-flex align-items-center justify-content-center">
        <div class="container" data-aos="fade-up">
            <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
                <div class="col-xl-6 col-lg-8" style="color:#FFFFFF; text-align:center;">
                    <h1><b>Announcements</b><h1>
                </div>
            </div>

            <div class="row" style="margin:auto;" data-aos="fade-up">
                @foreach($ann as $gen)
                    <div class="col" style="text-align:center;">
                        <div class="card" style="width: 18rem;">
                            <div class="card-header" style="background-color:burlywood;">
                                <h5 class="card-title"><b>{{$gen->title}}</b></h5>
                                <li class="list-group-item" style="font-size:10px;">{{$gen->created_at}}</li>
                                
                            </div>
                            <p class="card-text">{{ substr($gen->body,0,20) ."..."}}</p>
                            <div class="card-body">
                                <div class="row">
                                
                                    <div class="col">&nbsp;</div>
                                    <div class="col"> 
                                        <a href="/info/{{$gen->id}}" style="font-size:13px;" class="card-link text-dark"><b>Read more ...</b></a>
                                    </div>
                                </div>    
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div> 
</section>

@endsection