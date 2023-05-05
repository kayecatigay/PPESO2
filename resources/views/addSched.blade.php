@extends('layouts.Saddefault')

@section('maincontent')
   <form action ="/insertSched" method="post" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
      <label for="empID"></label>
      <input type="hidden" class="form-control" id="empID" name="empID"  placeholder="Enter Name">
      </div>
      <div class="form-group">
      <label for="userid"></label>
      <input type="hidden" class="form-control" id="userid" name="userid" >
      </div>
      <p><h4>Schedule</h4></p>
      <div class="form-group">
      <label for="name">Name</label>
      <input type="text" class="form-control" id="name" name="name"  >
      </div>
      <div class="row">
      <div class="col-8 form-group">
         <label for="posidesi">Position Desired</label>
         <input type="text" class="form-control" id="posidesi" name="posidesi"  
         placeholder="Enter Position Desired" >
      </div>
      <div class="col">
            <label for="gender">Sex</label>
            <select class="form-control" name="gender" id="gender" >
            <option value="female">Female</option>
            <option value="male">Male</option>
            </select>
      </div>
      </div>
      <button type="submit" value="Submit">Submit</button>
   </form>  
@endsection

<!-- End of Page Wrapper -->
