@extends('layouts.addefault')

@section('maincontent')
   <form action ="/insertoSched" method="get" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
         <label for="schedId"></label>
         <input type="hidden" class="form-control" id="schedId" name="schedId"  
         placeholder="Enter Name" value="{{}}">
      </div>
      
      <div class="form-group">
         <p><h4>OFW Schedule</h4></p>
         <div class="container">      
            <div class="row">
               <div class="col-6">
                  <label for="ofwname">Name</label>
                  <input type="text" class="form-control" id="ofwname" name="ofwname" >
               </div>
               <div class="col-4">
                  <label for="proctor">Proctor</label>
                  <input type="text" class="form-control" id="proctor" name="proctor">
               </div>
               <div class="col">
                  <label for="type">Type</label>
                  <select class="form-control" name="type" id="type">
                    <option value="exam">Exam</option>
                    <option value="interview">Interview</option>
                  </select>
              </div>
            </div>
            <div class="row">
               <div class="col">
                  <label for="date">Date</label>
                  <input type="date" class="form-control" id="date" name="date">
               </div>
               <div class="col">
                  <label for="time">Time</label>
                  <input type="time" class="form-control" id="time" name="time">
               </div>
               <div class="col-7">
                  <label for="loc">Location</label>
                  <input type="text" class="form-control" id="loc" name="loc">
               </div>
            </div>
            <div class="row form-group">
               <div class="col">
                 <label for="work">Work</label>
                 <input type="text" class="form-control" id="work" name="work">
               </div>
               <div class="col form-group">
                  <label for="req">Requirements</label>
                  <input type="hidden" id="req" name="req">
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
                  <button type="submit" style="background-color:#5F9EA0; border:none; border-radius: 4px;" value="Submit">Submit</button>
               </div>
               <div class="col">&nbsp;</div>
            </div>
         </div>
      </div>
      
   </form>  
@endsection

<!-- End of Page Wrapper -->
