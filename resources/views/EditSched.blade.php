@extends('layouts.addefault')

@section('maincontent')       
        
        <form action ="/updateSched" method="post" enctype="multipart/form-data">
            @csrf
          <div class="form-group">
            <label for="empID"></label>
            <input type="hidden" class="form-control" id="empID" name="empID"  placeholder="Enter Name">
          </div>
          <div class="form-group">
            <label for="id"></label>
            <input type="hidden" class="form-control" id="id" name="id" value="{{$sched[0]->id}}">
          </div>
          <p><h4>Schedule Data</h4></p>
          <div class="form-group">
            <label for="scholar">Name</label>
            <input type="text" class="form-control" id="scholar" name="scholar"  value={{$sched[0]->ScName}}>
          </div>
          <div class="row">
            <div class="col-8 form-group">
              <label for="date">Date</label>
              <input type="date" class="form-control" id="date" name="date"  
              placeholder="Date" value={{$sched[0]->Date}}>
            </div>
            <div class="col-7 form-group">
              <label for="time">Time</label>
              <input type="time" class="form-control" id="time" name="scholar"  value={{$sched[0]->Time}}>
            </div>
            <div class="col-7 form-group">
              <label for="location">Location</label>
              <input type="text" class="form-control" id="time" name="location"  value={{$sched[0]->Loc}}>
            </div>
            <div class="col-7 form-group">
              <label for="proctor">Proctor</label>
              <input type="text" class="form-control" id="proctor" name="proctor"  value={{$sched[0]->Proctor}}>
            </div>
            <div class="col-7 form-group">
              <label for="requirements">Requirements</label>
              <input type="text" class="form-control" id="requirements" name="requirements"  value={{$sched[0]->Req}}>
              <div class="col form-control">
              <input type="checkbox" id="exam" name="exam">
              <label for="exam">Exam</label>
              <input type="checkbox" id="interview" name="interview">
              <label for="interview">Interview</label>
            </div>
            <div class="col">
                <label for="type">Type</label>
                <select class="form-control" name="type" id="type" value={{$sched[0]->type}}>
                  <option value="exam">Exam</option>
                  <option value="int">Interview</option>
                </select>
            </div>
          </div>
        </form>

@endsection