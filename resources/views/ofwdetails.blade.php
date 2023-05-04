@extends('layouts.default')

@section('content')
  <!-- ======= Services Section ======= -->

  <section id="services" class="services">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Services</h2>
          <p>OFW Fill up form</p>
        </div>
        <form action="ofwinsertD">
          <div class="form-group">
            <label for="ofwId"></label>
            <input type="hidden" class="form-control" id="ofwId" name="ofwId"  placeholder="Enter Name">
          </div>
          <div class="form-group">
            <label for="userid"></label>
            <input type="hidden" class="form-control" id="userid" name="userid" value="{{ Auth::user()->id }}" >
          </div>
          <div class="row">
            <div class="col-3 form-group">
              <label for="lastname">Lastname</label>
              <input type="text" class="form-control" id="lastname" name="lastname" value="{{ Auth::user()->lastname }}">
            </div>
            <div class="col-3 form-group">
              <label for="firstname">Firstname</label>
              <input type="text" class="form-control" id="firstname" name="firstname" value="{{ Auth::user()->firstname }}">
            </div>
            <div class="col-3 form-group">
              <label for="middlename">Middlename</label>
              <input type="text" class="form-control" id="middlename" name="middlename" value="{{ Auth::user()->middlename }}">
            </div>
            <div class="col-1 form-group">
              <label for="suffix">Suffix</label>
              <select class="form-control" name="suffix" id="suffix">
                <option value="n/a">N/A</option>
                <option value="sr">Jr.</option>
                <option value="jr">Sr.</option>
              </select>
            </div>
          </div>
          <div class ="row">
            <div class="col-3 form-group">
              <label for="birthday">Date of Birth</label>
              <input type="date" class="form-control" id="birthday" name="birthday"  placeholder="" onchange="setage()">
            </div>
            <div class="col-2 form-group">
              <label for="age">Age</label>
              <input type="number" readonly class="form-control" id="age" name="age"  placeholder="Enter Age">
            </div>
            <div class="col-2 form-group">
              <label for="sex">Sex</label>
              <select class="form-control" name="sex" id="sex">
                <option value="female">Female</option>
                <option value="male">Male</option>
              </select>
            </div>
            <div class="col-3 form-group">
              <label for="contactnum">Contact Number</label>
              <input type="number" class="form-control" id="contactnum" name="contactnum"  placeholder="ex. 09123456789">
            </div>
          </div>
          <div class="row">
            <div class="col-6 form-group">
            <label for="address">Address</label>
            <input type="text" class="form-control" id="address" name="address"  placeholder="Enter Address" >
            <small id="guardian" class="form-text text-muted">Sitio, Barangay, City/Municipality, Province</small>
          </div>
          <div class="col-3 from group">
              <label for ="passnum">Passport Number</label>
              <input type="text" class="form-control" id="passnum" name="passnum" placeholder="13254543">
            </div>
          <div class ="row">
            <div class=" col-5 form-group">
              <label for="emailadd">Email address</label>
              <input type="email" class="form-control" id="emailadd" name="emailadd"  placeholder="ex. abc@gmail.com">
            </div>
            <div class="col-5 form-group">
              <label for="fbacc">Facebook Account</label>
              <input type="facebook" class="form-control" id="fbacc" name="fbacc"> <br>
            </div>
         
          <div class="container table-container" style="text-align:center">
            <table class="table table-stripped border">
              <thead>
                <tr>
                  <th scope="col">Job Description</th>
                  <th scope="col">Ofw Category</th>
                  <th scope="col">Company</th>
                  <th scope="col">Country</th>
                  <th scope="col">Period of Employment</th>
                </tr>
              </thead>
              <tbody class="table table-bordered">
                <tr>
                  <td>
                    <input type="text" id="jobdesi" name="jobdesi" >
                  </td>
                  <td>
                    <input type="text" id="ofwcat" name="ofwcat">
                  </td>
                  <td>
                   <input type="text" id="company" name="company">
                  </td>
                  <td>
                    <input type="text" id="country" name="country">
                  </td>
                  <td>
                    <input type="text" id="period" name="period">
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
    </div>
          <div class="row">
            <div class="col-5">&nbsp;</div>
            <div class="col"><button type="submit" class="btn btn-primary">Apply</button></div>
            <div class="col">&nbsp;</div>
          </div>
  </section><!-- End Services Section -->

  <script>
      function setage()
      {
        dob=new Date(document.getElementById("birthday").value);
        var month_diff = Date.now() - dob.getTime();  
        var age_dt = new Date(month_diff);   
        var year = age_dt.getUTCFullYear();  
        var age = Math.abs(year - 1970);  
        document.getElementById("age").value=age;
      }
  </script>
@endsection