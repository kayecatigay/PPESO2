@extends('layouts.default')
@section('content')
    
    <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Profile</h2>
          <p>Personal Data</p>
        <div>
        <form action="UpdatepProfile">
        <div class="row">
            <input type="hidden" id="userid" name="userid" value="{{ $ePr[0]->id}}">

            <div class="col-6 form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" id="name" name="name" value="{{ $ePr[0]->name}}">
              <small id="name" class="form-text text-muted">First name, Middle name, Last name</small>
            </div>
            <div class="col form-group">
              <label for="gender">Sex</label>
              <select class="form-control" name="gender" id="gender">
                <option value="female">Female</option>
                <option value="male">Male</option>
              </select>
            </div>
            <div class="col form-group">
              <label for="birthday">Date of Birth</label>
              <input type="date" class="form-control" id="birthday" name="birthday"  placeholder="" onchange="setage()">
            </div>
            </div>
            <div class="row">
                <div class="col form-group">
                    <label for="add">Address</label>
                    <input type="text" class="form-control" id="add" name="add"  placeholder="Enter Address" >
                </div>
                <div class="col-3 form-group">
                    <label for="age">Age</label>
                    <input type="number" readonly class="form-control" id="age" name="age"  placeholder="Enter Age">
                </div>
            </div> <br>
            <div class="row">
                <div class="col-5">&nbsp;</div>
                <div class="col"><button type="submit" class="btn btn-outline-dark">Submit</button></div>
                <div class="col">&nbsp;</div>
            </div>
        </form>
        
        <h2>Services</h2>
        <p>Forms</p> <br>
        
            <div class="row" style="text-align: center;">
                <div class="col">
                    <a href="PrPEAP">
                        <button type="submit" class="btn btn-outline-dark">PEAP</button>
                    </a>
                </div>
                <div class="col">
                    <a href="PrEmp">
                        <button type="submit" class="btn btn-outline-dark">EMPLOYMENT</button>
                        </a>
                </div>
                <div class="col">
                    <a href="PrOfw">
                        <button type="submit" class="btn btn-outline-dark">OFW</button>
                    </a>
                </div>
            </div>
    </div>
@endsection