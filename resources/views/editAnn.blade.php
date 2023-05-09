@extends('layouts.addefault')

@section('maincontent')       
        
        <form action ="/updateSched" method="get" enctype="multipart/form-data">
            @csrf
          <div class="form-group">
            <label for="empID"></label>
            <input type="hidden" class="form-control" id="empID" name="empID"  placeholder="Enter Name">
          </div>
          <div class="form-group">
            <label for="id"></label>
            <input type="hidden" class="form-control" id="id" name="id" >
          </div>
          <p><h4>Schedule Data</h4></p>
          <div class="container">
            <div class="row">
              <div class="col-9 form-group">
                <label for="scholar">Name</label>
                <input type="text" class="form-control" id="scholar" name="scholar"  >
              </div>
              <div class="col">
                  <label for="type">Type</label>
                  <select class="form-control" name="type" id="type" >
                    <option value="exam">Exam</option>
                    <option value="interview">Interview</option>
                  </select>
              </div>
              
            </div>
            <div class="row">
              <div class="col form-group">
                <label for="date">Date</label>
                <input type="date" class="form-control" id="date" name="date"  
                placeholder="Date" >
              </div>
              <div class="col form-group">
                <label for="time">Time</label>
                <input type="time" class="form-control" id="time" name="time" >
              </div>
              <div class="col-7 form-group">
                <label for="location">Location</label>
                <input type="text" class="form-control" id="location" name="location"  >
              </div>
            </div>
            <div class="row">  
              <div class="col form-group">
                <label for="proctor">Proctor</label>
                <input type="text" class="form-control" id="proctor" name="proctor"  >
              </div>
              <div class="col form-group">
                <label for="req">Requirements</label>
                <div class="col ">
                    <input type="checkbox" id="pencil" name="pencil">
                    <label for="pencil">Pencil</label> &nbsp;
                    <input type="checkbox" id="ballpen" name="ballpen">
                    <label for="ballpen">Ballpen</label> &nbsp;
                    <input type="checkbox" id="validid" name="validid">
                    <label for="validid">Valid Id</label> &nbsp;
                    <input type="checkbox" id="snacks" name="snacks">
                    <label for="snacks">Snacks</label> &nbsp;
                    <input type="checkbox" id="water" name="water">
                    <label for="water">Water</label> &nbsp;
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-5">&nbsp;</div>
              <div class="col">
                <input type="submit" class="btn btn-primary" value="Apply" name="submit">
              </div>
              <div class="col">&nbsp;</div>
            </div>
          </div>  
        </form>

@endsection