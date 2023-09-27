@extends('layouts.app')

@section('content')

<body class="img js-fullheight" style="background-image: url(assets/images/bg.jpg);">
    <section class="ftco-section">
        <form action="/iCompany" method="get">
            @csrf
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-sm-6 col-md-11">
                        <div class="w3 card w3-white" style="opacity:0.7">
                            <div class="card-header" style="text-align:center; ">
                                <h2>Registration</h2>
                                <h6>Local Employer</h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    
                                    <div class="col form-group">
                                        <label for="rep">Representative:</label> <br>
                                        <input type="text" placeholder="Fist name" id="fname" name="fname">
                                        <input type="text" placeholder="Middle name" id="mname" name="mname">
                                        <input type="text" placeholder="Last name" id="lname" name="lname">
                                    </div>
                                    <div class="col form-group">
                                       <label for="pass"> Password:</label>
                                        <input type="password" id="pass" name="pass" >
                                        
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col form-group">
                                        <label for="cname">Company Name:</label>
                                        <input type="text" id="cname" name="cname">
                                    </div>
                                    <div class="col form-group">
                                       <label for="email"> Email Address:</label>
                                        <input type="email" id="email" name="email" ><br>
                                    </div>
                                    <div class="col form-group">
                                        <label for="contact">Contact Number:</label>
                                        <input type="text" id="contact" name="contact" ><br>
                                    </div>
                                    
                                    
                                </div>
                            </div>
                            <div class="card-body">
                                    
                                    <div class="row mb-0">
                                        <div class="col-md-6 offset-md-5">
                                            <input class="btn btn-primary" type="submit" value="Submit">
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
</body>

@endsection
