@extends('layouts.default')

@section('content')
  <!-- ======= Services Section ======= -->
  <section id="services" class="services">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Services</h2>
          <p>Employment Form</p>
        </div>
        <form action="scholardata">
        <div class="form-group">
            <label for="SchId">Id</label>
            <input type="text" class="form-control" id="SchId" name="SchId"  placeholder="Enter Name">
          </div>
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name"  placeholder="Enter Name">
            <small id="emailHelp" class="form-text text-muted">Last name, First name, Middle name</small>
          </div>
          <div class="form-group">
            <label for="gender">Sex</label>
            <select name="gender" id="gender">
              <option value="female">Female</option>
              <option value="male">Male</option>
            </select>
          </div>
          <div class="form-group">
            <label for="emailadd">Email address</label>
            <input type="email" class="form-control" id="emailadd" name="emailadd"  placeholder="ex. abc@gmail.com">
          </div>
          <div class="form-group">
            <label for="contactnum">Contact Number</label>
            <input type="number" class="form-control" id="contactnum" name="contactnum"  placeholder="ex. 09123456789">
          </div>
          <div class="form-group">
            <label for="birthday">Date of Birth</label>
            <input type="date" class="form-control" id="birthday" name="birthday"  placeholder="">
          </div>
          <div class="form-group">
            <label for="birthplace">Place of Birth</label>
            <input type="text" class="form-control" id="birthplace" name="birthplace"  placeholder="Enter place of birth">
          </div>
          <div class="form-group">
            <label for="age">Age</label>
            <input type="number" class="form-control" id="age" name="age"  placeholder="Enter Age">
          </div>
          <div class="form-group">
            <label for="height">Height</label>
            <input type="number" class="form-control" id="height" name="height"  placeholder="Enter Height">
          </div>
          <div class="form-group">
            <label for="weight">Weight</label>
            <input type="number" class="form-control" id="weight" name="weight"  placeholder="Enter Weight">
          </div>
          <div class="form-group">
            <label for="bloodtype">Bloodtype</label>
            <select name="bloodtype" id="bloodtype">
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
          <div class="form-group">
            <label for="religion">Religion</label>
            <input type="text" class="form-control" id="religion" name="religion"  placeholder="Enter Religion">
          </div>
          <div class="form-group">
            <label for="guardian">Name of Guardian</label>
            <input type="text" class="form-control" id="guardian" name="guardian"  placeholder="Enter name of Guardian">
            <small id="guardian" class="form-text text-muted">Last name, First name, Middle name</small>
          </div>
          <div class="form-group">
            <label for="relationship">Relationship with the Applicant</label>
            <select name="relationship" id="relationship">
              <option value="daughter">Daughter</option>
              <option value="son">Son</option>
              <option value="niece">Niece</option>
              <option value="nephew">Nephew</option>
              <option value="sister">Sister</option>
              <option value="brother">Brother</option>
            </select>
            
          </div>          
          
          <button type="submit" class="btn btn-primary">Apply</button>
        
        </form>
    </div>
  </section><!-- End Services Section -->
@endsection