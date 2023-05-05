@extends('layouts.default')

@section('content')
  <!-- ======= Services Section ======= -->
  <section id="services" class="services">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Services</h2>
          <p>Employment Form</p>
        </div>
        <form action="empdata">
          <div class="form-group">
            <label for="empID"></label>
            <input type="hidden" class="form-control" id="empID" name="empID"  placeholder="Enter Name">
          </div>
          <div class="form-group">
            <label for="userid"></label>
            <input type="hidden" class="form-control" id="userid" name="userid" value="{{ Auth::user()->id }}" >
          </div>
          <p><h4>Personal Data</h4></p>
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name"  value="{{ Auth::user()->name }}">
          </div>
          <div class="row">
            <div class="col-8 form-group">
              <label for="posidesi">Position Desired</label>
              <input type="text" class="form-control" id="posidesi" name="posidesi"  placeholder="Enter Position Desired">
            </div>
            <div class="col">
                <label for="gender">Sex</label>
                <select class="form-control" name="gender" id="gender">
                  <option value="female">Female</option>
                  <option value="male">Male</option>
                </select>
            </div>
          </div>
          <div class="row">
            <div class="col-7 form-group">
              <label for="emailadd">Email address</label>
              <input type="email" class="form-control" id="emailadd" name="emailadd"  placeholder="ex. abc@gmail.com">
            </div>
            <div class="col form-group">
              <label for="contactnum">Contact Number</label>
              <input type="text" class="form-control" id="contactnum" name="contactnum"  placeholder="ex. 09123456789">
            </div>
            <div class="col form-group">
              <label for="telnum">Telephone Number</label>
              <input type="text" class="form-control" id="telnum" name="telnum"  placeholder="ex. 288-1111">
            </div>
          </div>
          <div class="row">
            <div class="col-5 form-group">
              <label for="add"> Address</label>
              <input type="text" class="form-control" id="add" name="add"  placeholder="Sitio, Barangay, Bayan, Province">
            </div>
            <div class="col form-group">
              <label for="language">Language</label>
            <div class="col form-control">
              <input type="checkbox" id="tagalog" name="tagalog">
              <label for="tagalog">Tagalog</label>
              <input type="checkbox" id="english" name="english">
              <label for="english">English</label>
              <input type="checkbox" id="chinese" name="chinese">
              <label for="chinese">Mandarin</label>
              <input type="checkbox" id="japanese" name="japanese">
              <label for="japanese">Japanese</label>
              <input type="checkbox" id="korea" name="korea">
              <label for="chinese">Hangul</label>
            </div>
          </div>
          <div class="row">
            <div class="col-5 form-group">
              <label for="birthday">Date of Birth</label>
              <input type="date" class="form-control" id="birthday" name="birthday"  placeholder="">
            </div>
            <div class="col form-group">
              <label for="height">Height (cm)</label>
              <input type="text" class="form-control" id="height" name="height"  placeholder="Enter Height">
            </div>
            <div class="col form-group">
              <label for="weight">Weight (kg)</label>
              <input type="text" class="form-control" id="weight" name="weight"  placeholder="Enter Weight">
            </div>
          </div>
          <div class="row">
            <div class="col form-group">
              <label for="religion">Religion</label>
              <input type="text" class="form-control" id="religion" name="religion"  placeholder="Enter Religion">
            </div>
            <div class="col form-group">
              <label for="cstatus">Civil Status</label>
                <select class="form-control" name="cstatus" id="cstatus" onclick="myFunction()">
                  <option value="single">Single</option>
                  <option value="married">Married</option>
                  <option value="widow">Widowed</option>
                  <option value="separated">Separated</option>
                </select>
            </div>
            <div class="col" id="hidespouse" style="display: none;">
              <label for="spouse">Spouse</label>
              <input type="text" class="form-control" id="spouse" name="spouse" >
            </div>
          </div>
          <p><h4>Educational Background</h4></p>
            <div class="form-group">
              <label for="elem">Elementary</label>
              <input type="text" class="form-control" id="elem" name="elem"  placeholder="Enter School">
            </div>
            <div class="form-group">
              <label for="hs">High School</label>
              <input type="text" class="form-control" id="hs" name="hs"  placeholder="Enter School">
            </div>
            <div class="form-group">
              <label for="college">College</label>
              <input type="text" class="form-control" id="college" name="college"  placeholder="Enter School">
            </div>
            <div class="form-group">
              <label for="degree">All Degree Received</label>
              <input type="text" class="form-control" id="degree" name="degree"  placeholder="Enter degree, achievements, etc.">
            </div>
          <p><h4>Employment Record</h4></p>
            <div class="form-group">
              <label for="cname">Company Name</label>
              <input type="text" class="form-control" id="cname" name="cname"  placeholder="Enter Company name">
            </div>
            <div class="form-group">
              <label for="posi">Position</label>
              <input type="text" class="form-control" id="posi" name="posi"  placeholder="Enter Position">
            </div>
          <p><h4>Character Reference</h4></p>
            <div class="row"> 
              <div class="col form-group">
                <label for="crname">Name</label>
                <input type="text" class="form-control" id="crname" name="crname"  placeholder="Enter name">
              </div>
              <div class="col form-group">
                <label for="crcontact">Contact Number</label>
                <input type="text" class="form-control" id="crcontact" name="crcontact"  placeholder="ex: 09876543212">
              </div>
            </div>
            <div class="row">
              <div class="col form-group">
                <label for="crcname">Company Name</label>
                <input type="text" class="form-control" id="crcname" name="crcname"  placeholder="Enter name">
              </div>
              <div class="col form-group">
                <label for="crposi">Position</label>
                <input type="text" class="form-control" id="crposi" name="crposi"  placeholder="Enter position">
              </div>
            </div>   <br>
          <button type="submit" class="btn btn-primary">Apply</button>
        
        </form>
    </div>
  </section><!-- End Services Section -->
  <script>
    function myFunction() {
    var status = document.getElementById("cstatus").value;
    var x = document.getElementById("hidespouse");
    // alert(status);
    if (status === "married") {
      x.style.display = "block";
    } else {
      x.style.display = "none";
      document.getElementById("spouse").value="";
    }
  }
  </script>
@endsection