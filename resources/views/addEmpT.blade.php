@extends('layouts.default')

@section('content')
   <form action ="/insertEmpF" method="get" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
         <label for="userid"></label>
         <input type="hidden" class="form-control" id="userid" name="userid"  value="{{ Auth::user()->id }}">
      </div>
      
      <div class="form-group">
         <p><h4>Employment Form</h4></p>
         <div class="container">      
          
            <div class="row form-group">
               <div class="col">
                  <label for="posidesired">Position Desired</label>
                  <input type="text" class="form-control" id="posidesired" name="posidesired">
               </div>
               <div class="col">
                  <label for="cname">Company</label>
                  <input type="text" class="form-control" id="cname" name="cname">
               </div>
            </div>
            <div class="row form-group">
               <div class="col">
                  <label for="crname">Character Reference</label>
                  <input type="text" class="form-control" id="crname" name="crname">
               </div>
               <div class="col-5">
                  <label for="crcontact">Character Reference's Contact Number</label>
                  <input type="text" class="form-control" id="crcontact" name="crcontact">
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
