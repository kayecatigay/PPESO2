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
                                        <a href="#" style="font-size:13px;" class="card-link text-dark"><b>Read more ...</b></a>
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
