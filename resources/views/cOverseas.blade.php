@extends('layouts.noheaderfooter')

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
                                <h6>Overseas Employer</h6>
                                <input type="hidden" id="type" name="type" value="overseas">
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-14 form-group">
                                        <label for="rep">Representative:</label> <br>
                                        <label for="rep">First name:</label>
                                        <input type="text" placeholder="Fist name" id="fname" name="fname" >
                                        <label for="rep">Middle name:</label>
                                        <input type="text" placeholder="Middle name" id="mname" name="mname">
                                        <label for="rep">Last name:</label>
                                        <input type="text" placeholder="Last name" id="lname" name="lname" >
                                    </div>
                                </div><br>
                                
                                <div class="row">
                                    <div class="col form-group">
                                        <label for="cname">Company Name:</label>
                                        <input type="text" size="20;" id="cname" name="cname">
                                    </div>
                                    <div class="col form-group">
                                       <label for="email"> Email Address:</label>
                                        <input type="email" size="30;" id="email" name="email" ><br>
                                    </div>
                                    <div class="col form-group">
                                        <label for="contact">Contact Number:</label>
                                        <input type="text" size="30;" placeholder="ex. 09123456789" onkeypress="checkContact()" id="contact" name="contact" ><br>
                                    </div>
                                    <div class="col form-group">
                                       <label for="pass"> Password:</label>
                                        <input type="password" size="20;" id="pass" name="pass">
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
<script>
    function checkContact()
    {
        let text = document.getElementById("contact").value;
        let length = text.length;
        if (length>10){
            document.getElementById("contact").value=text.substr(0,10);
            alert("11 only")
        }
    }
</script>
@endsection
