@extends('layouts.default')

@section('content')
  <!-- ======= Services Section ======= -->

  <section id="services" class="services">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Services</h2>
          <p>OFW Fill up form</p>
        </div>
        <form action="scholardata">
          <div class="form-group">
            <label for="SchId"></label>
            <input type="hidden" class="form-control" id="SchId" name="SchId"  placeholder="Enter Name">
          </div>
          <div class="form-group">
            <label for="userid"></label>
            <input type="hidden" class="form-control" id="userid" name="userid" value="{{ Auth::user()->id }}" >
          </div>
          <div class="row">
            <div class="col-3 form-group">
              <label for="lastname">LASTNAME</label>
              <input type="text" class="form-control" id="lastname" name="lastname" value="{{ Auth::user()->lastname }}">
            </div>
            <div class="col-3 form-group">
              <label for="firstname">FIRSTNAME</label>
              <input type="text" class="form-control" id="firstname" name="firstname" value="{{ Auth::user()->firstname }}">
            </div>
            <div class="col-3 form-group">
              <label for="middlename">MIDDLENAME</label>
              <input type="text" class="form-control" id="middlename" name="middlename" value="{{ Auth::user()->middlename }}">
            </div>
            <div class="col-1 form-group">
              <label for="suffixname">SUFFIX</label>
              <input type="text" class="form-control" id="suffixname" name="suffixname" value="{{ Auth::user()->suffixname }}">
            </div>
          </div>
          <div class ="row">
            <div class="col-3 form-group">
              <label for="birthday">Date of Birth</label>
              <input type="date" class="form-control" id="birthday" name="birthday"  placeholder="">
            </div>
            <div class="col-2 form-group">
              <label for="age">Age</label>
              <input type="number" class="form-control" id="age" name="age"  placeholder="Enter Age">
            </div>
            <div class="col-2 form-group">
              <label for="gender">Sex</label>
              <select class="form-control" name="gender" id="gender">
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
            <label for="add">Address</label>
            <input type="text" class="form-control" id="add" name="add"  placeholder="Enter Address" >
          </div>
          <div class="col-3 from group">
              <label for ="passportnum">Passport Number</label>
              <input type="text" class="form-control" id="passportnum" name="passportnum" value="{{ Auth::user()->name }}">
            </div>
          <div class ="row">
            <div class=" col-5 form-group">
              <label for="emailadd">Email address</label>
              <input type="email" class="form-control" id="emailadd" name="emailadd"  placeholder="ex. abc@gmail.com">
            </div>
            <div class="col-5 form-group">
              <label for="facebook">Facebook Account</label>
              <input type="facebook" class="form-control" id="facebook" name="facebook">
          </div>
          <div class="row">
            <div class="col-5">&nbsp;</div>
            <div class="col"><button type="submit" class="btn btn-primary">Apply</button></div>
            <div class="col">&nbsp;</div>
          </div>
        </form>
    </div>
  </section><!-- End Services Section -->
@endsection