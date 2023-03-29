@extends('layouts.default')

@section('content')
  <!-- ======= Services Section ======= -->

  <section id="services" class="services">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Services</h2>
          <p>Scholarship Form</p>
        </div>
        <form action="oldscholarupdate">
          <div class="form-group">
            <label for="SchId"></label>
            <input type="hidden" class="form-control" id="SchId" name="SchId"  placeholder="Enter Name">
          </div>
          <div class="form-group">
            <label for="userid"></label>
            <input type="hidden" class="form-control" id="userid" name="userid" value="{{ Auth::user()->id }}" >
          </div>
          <div class="row">
            <div class="col-4 form-group">
              <label for="name">Lastname</label>
              <input type="text" class="form-control" id="name" name="name" value="{{ Auth::user()->name }}">
            </div>
            <div class="col-4 form-group">
              <label for="name">Firstname</label>
              <input type="text" class="form-control" id="name" name="name" value="{{ Auth::user()->name }}">
            </div>
            <div class="col-2 form-group">
              <label for="name">Middlename</label>
              <input type="text" class="form-control" id="name" name="name" value="{{ Auth::user()->name }}">
            </div>
            <div class="col form-group">
              <label for="gender">Sex</label>
              <select class="form-control" name="gender" id="gender" value="{{ $olddata[0]->sex }}">
                <option value="female">Female</option>
                <option value="male">Male</option>
              </select>
            </div>  
          </div>
          <div class="form-group">
            <label for="add">Address</label>
            <input type="text" class="form-control" id="add" name="add"  placeholder="Enter Address" value="{{ $olddata[0]->address }}">
          </div>
          <div class ="row">
            <div class=" col-8 form-group">
              <label for="emailadd">Email address</label>
              <input type="email" class="form-control" id="emailadd" name="emailadd"  placeholder="ex. abc@gmail.com" value="{{ $olddata[0]->emailadd }}">
            </div>
            <div class="col form-group">
              <label for="contactnum">Contact Number</label>
              <input type="number" class="form-control" id="contactnum" name="contactnum"  placeholder="ex. 09123456789" value="{{ $olddata[0]->contactnum }}">
            </div>
          </div>
          <div class="row">
            <div class="col-10 form-group">
              <label for="birthplace">Place of Birth</label>
              <input type="text" class="form-control" id="birthplace" name="birthplace"  placeholder="Enter place of birth" value="{{ $olddata[0]->placeofbirth }}">
            </div>
            <div class="col form-group">
              <label for="birthday">Date of Birth</label>
              <input type="date" class="form-control" id="birthday" name="birthday"  placeholder="" value="{{ $olddata[0]->birthday }}">
            </div>
          </div>
          <div class="row">
            <div class="col form-group">
              <label for="age">Age</label>
              <input type="number" class="form-control" id="age" name="age"  placeholder="Enter Age" value="{{ $olddata[0]->age }}">
            </div>
            <div class="col form-group">
              <label for="height">Height</label>
              <input type="number" class="form-control" id="height" name="height"  placeholder="Enter Height" value="{{ $olddata[0]->height }}">
            </div>
            <div class="col form-group">
              <label for="weight">Weight</label>
              <input type="number" class="form-control" id="weight" name="weight"  placeholder="Enter Weight" value="{{ $olddata[0]->weight }}">
            </div>
            <div class="col form-group">
              <label for="bloodtype">Bloodtype</label>
              <select class="form-control" name="bloodtype" id="bloodtype" value="{{ $olddata[0]->bloodtype }}">
                <option value="N/A">Not Applicable</option>
                <option value="O+">O positive</option>
                <option value="O-">O negative</option>
                <option value="A+">A positive</option>
                <option value="A-">A negative</option>
                <option value="B+">B positive</option>
                <option value="B-">B negative</option>
                <option value="AB+">AB positive</option>
                <option value="AB-">AB negative</option>
              </select>
            </div>
          </div>
          
          <div class="row">
            <div class="col-6 form-group">
              <label for="guardian">Name of Guardian</label>
              <input type="text" class="form-control" id="guardian" name="guardian"  placeholder="Enter name of Guardian" value="{{ $olddata[0]->guardian }}">
              <small id="guardian" class="form-text text-muted">Last name, First name, Middle name</small>
            </div>
            <div class="col-4 form-group">
              <label for="relationship">Relationship with the Applicant</label>
              <select class="form-control" name="relationship" id="relationship" value="{{ $olddata[0]->relation }}">
                <option value="daughter">Daughter</option>
                <option value="son">Son</option>
                <option value="niece">Niece</option>
                <option value="nephew">Nephew</option>
                <option value="sister">Sister</option>
                <option value="brother">Brother</option>
              </select>
            </div>          
            <div class="col form-group">
              <label for="religion">Religion</label>
              <input type="text" class="form-control" id="religion" name="religion"  placeholder="Enter Religion" value="{{ $olddata[0]->religion }}">
            </div>
          </div>
          <div class="row">
            <div class="col-5">&nbsp;</div>
            <div class="col"><button type="submit" class="btn btn-primary">Update</button></div>
            <div class="col">&nbsp;</div>
          </div>
        </form>
    </div>
  </section><!-- End Services Section -->
@endsection