@extends('layouts.default')


@section('homecontent')

    <section id="an1" style="background: url(<?= url('assets/img/hero-bg.jpg') ?>) top center; background-size: cover;" class="d-flex align-items-center justify-content-center">
      <div class="container" data-aos="fade-up">
            <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
                <div class="col-xl-a6 col-lg-8" style="color:#FFFFFF; text-align:center;">
                    <h1><b>{{$gen[0]->title}}.</b><h1>
                </div>
            
                        <div class="col" style="text-align:center; justify-content: center;" >
                            <div class="card my-0 p-3" style="width: 75rem;">
                                <img class="card-img-top" src="<?= url('assets/images/bg.jpg') ?>" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title"><b>{{$gen[0]->title}}</b></h5>
                                    <li class="list-group-item" style="font-size:10px;">{{$gen[0]->created_at}}</li>
                                    
                                </div>
                                <p class="card-text">{{$gen[0]->body}}</p>
                               
                            </div>
                        </div>
            </div>
        </div>
    </div> 
</section>

@endsection