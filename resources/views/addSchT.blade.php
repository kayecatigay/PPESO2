@extends('layouts.default')

@section('content')
   <form action ="/insertSchT" method="get" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
         <label for="userid"></label>
         <input type="hidden" class="form-control" id="userid" name="userid"  value="{{ Auth::user()->id }}">
      </div>
      
      <div class="form-group">
         <p><h4>My Scholarship Form</h4></p>
         <div class="container">      
          
            <div class="row form-group">
               <div class="col">
                  <label for="appId">Application ID</label>
                  <input type="text" class="form-control" id="appId" name="appId" >
               </div>
               <div class="col">
                  <label for="date">Date Today</label>
                  <input type="date" class="form-control" id="date" name="date" >
               </div>
               <div class="col">
                  <label for="status">Status</label>
                  <select class="form-control" name="status" id="status" >
                     <option value="pending">Pending</option>
                     <option value="approved">Approved</option>
                     <option value="denied">Denied</option>
                  </select>
               </div>
            </div> <br>
            
            <div class="row">
               <div class="col-5">&nbsp;</div>
               <div class="col">
                  <button type="submit" style="background-color:#5F9EA0; border:none; font-size: 16px; border-radius: 4px;" 
                  value="Submit">Submit</button>
               </div>
               <div class="col">&nbsp;</div>
            </div>
         </div>
      </div>
      
   </form>  
@endsection

<!-- End of Page Wrapper -->
