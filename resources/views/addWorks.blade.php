@extends('layouts.addefault')

@section('maincontent')
   <form action ="/insertWork" method="get" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
         <label for="schedId"></label>
         <input type="hidden" class="form-control" id="schedId" name="schedId"  placeholder="Enter Name">
      </div>
      
      <div class="form-group">
         <p><h4>&nbsp; Work Details</h4></p>
         <div class="container">      
            <div class="row">
               <div class="col-2">
                  <label for="date">Date</label>
                  <input type="date" class="form-control" id="date" name="date" >
               </div>
               <div class="col-4">
                  <label for="company">Company</label>
                  <input type="text" class="form-control" id="company" name="company">
               </div>
            
               <div class="col">
                     <label for="contact">Contact Number</label>
                     <input type="text" class="form-control" id="contact" name="contact">
                  </div>
               <div class="col">
                  <label for="jobdesc">Job Description</label>
                  <input type="text" class="form-control" id="jobdesc" name="jobdesc">
               </div>
            </div> <br>
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
