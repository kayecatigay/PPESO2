@extends('layouts.default')

@section('content')
   <form action ="/insertWorke" method="get" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
         <label for="userid"></label>
         <input type="hidden" class="form-control" id="userid" name="userid"  value="{{ Auth::user()->id }}">
      </div>
      
      <div class="form-group">
         <p><h4>Work Experience</h4></p>
         <div class="container">      
          
            <div class="row form-group">
               <div class="col">
                  <label for="cname">Company Name</label>
                  <input type="text" class="form-control" id="cname" name="cname">
               </div>
               <div class="col">
                  <label for="posi">Position</label>
                  <input type="text" class="form-control" id="posi" name="posi">
               </div>
            </div>
            <div class="row form-group">
               <div class="col">
                  <label for="crname">Character Reference</label>
                  <input type="text" class="form-control" id="crname" name="crname">
               </div>
               <div class="col-5">
                  <label for="crcontact">Contact</label>
                  <input type="text" class="form-control" id="crcontact" name="crcontact">
               </div>
            </div>
            <div class="row form-group">
               <div class="col">
                  <label for="crcname">Character Reference Company Name</label>
                  <input type="text" class="form-control" id="crcname" name="ccrname">
               </div>
               <div class="col">
                  <label for="crposi">Character Reference Position</label>
                  <input type="text" class="form-control" id="crposi" name="crposi">
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
