@extends('layouts.addefault')

@section('maincontent')       
        
        <form action ="/updateEann" method="get" enctype="multipart/form-data">
            @csrf
          <div class="form-group">
            <label for="annID"></label>
            <input type="hidden" class="form-control" id="annID" name="annID"  placeholder="Enter Name">
          </div>
          <div class="form-group">
            <label for="id"></label>
            <input type="hidden" class="form-control" id="id" name="id" value="{{$eann[0]->id}}">
          </div>
          <p><h4>Announcements</h4></p>
          <div class="container">
            <div class="row">
              <div class="col-4 form-group">
                <label for="date">Date</label>
                <input type="date" class="form-control" id="date" name="date"  
                placeholder="Date" value="{{$eann[0]->date}}">
              </div>
              <div class="col">
                  <label for="sched">Schedule</label>
                  <select class="form-control" name="sched" id="sched" value="{{$eann[0]->schedule}}">
                    <option value="exam">Exam</option>
                    <option value="interview">Interview</option>
                    <option value="passers">Passers</option>
                    <option value="graduates">Graduates</option>
                  </select>
              </div>
            </div>
            <div class="row">
              <div class="col-7 form-group">
                <label for="details">Details</label>
                <input type="text" class="form-control" id="details" name="details" value="{{$eann[0]->details}}">
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