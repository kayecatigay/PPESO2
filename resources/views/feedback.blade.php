@extends('layouts.addefault')

@section('maincontent')
<body>
    <div class="col-xl-16">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
               <h6 class="m-0 font-weight-bold text-dark">Feedbacks</h6>
            </div><br><br>
            <div class="row" style="margin:auto;" data-aos="fade-up">
                @foreach($fback as $fb)
                    <div class="col" style="text-align:center;" >
                        <div class="card" style="width: 18rem;">
                            <div class="card-header" id="cardColors{{$loop->iteration}}">
                                <h5 class="card-title"><b>{{$fb->subject}}</b></h5>
                            </div>
                            <div class="card-body" style="background-color: #FFFFF7;">
                            <p class="card-text">{{ substr($fb->message,0,20) ."..."}}</p>
                                <div class="row">
                                    <div class="col">&nbsp;</div>
                                    <div class="col"> 
                                        <button type="button" class="text-dark" style="border:none; background-color:transparent; font-size:small;" data-toggle="modal" data-target="#delmod{{ $fb->id }}">
                                            <b>Read more ...</b>
                                        </button>
                                    </div>
                                </div>    
                            </div>
                                

                                <div class="modal fade" id="delmod{{ $fb->id }}" tabindex="-1" aria-labelledby="exampleModalCenter" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered"  role="document">
                                       <div class="modal-content" style="opacity: 90%; " >
                                          <div class="modal-header" style="background-color:lightblue;">
                                                <h5 class="modal-title" id="exampleModalCenterTitle">{{ $fb->subject }}</h5>
                                                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                          </div>
                                            <div class="modal-body">
                                                {{ $fb->message}}
                                            </div>
                                          <div class="modal-footer">
                                                <div data-dismiss="modal">
                                                    from: {{ $fb->name}}
                                                </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                        </div><br>
                    </div>
                @endforeach
                
            </div><br>
        </div>
    </div> 

    <script>
        function ccards() {
        @foreach($fback as $fb)
            const cardHeader{{$loop->iteration}} = document.getElementById('cardColors{{$loop->iteration}}');
            cardHeader{{$loop->iteration}}.style.backgroundColor = getRandomColor();
        @endforeach
    }

    function getRandomColor() {
        const letters = '89ABCDEF'; // Use lighter color hex values
        let color = '#';
        for (let i = 0; i < 6; i++) {
            color += letters[Math.floor(Math.random() * letters.length)];
        }
        return color;
    }

        // Trigger the ccards function when the body is loaded
        window.onload = ccards;
    </script>
</body>

@endsection
