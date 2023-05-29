@extends('layouts.default')

@section('content')
   <form action ="/insertOf" method="get" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
         <label for="userid"></label>
         <input type="hidden" class="form-control" id="userid" name="userid"  value="{{ Auth::user()->id }}">
      </div>
      
      <div class="form-group">
         <p><h4>My Ofw Application Form</h4></p>
         <div class="container">      
          
            <div class="row form-group">
               <div class="col">
                  <label for="JobDesc">Job Description</label>
                  <input type="text" class="form-control" id="JobDesc" name="JobDesc">
               </div>
               <div class="col">
                  <div class="col">
                  <label for="Company">Company</label>
                  <input type="text" class="form-control" id="Company" name="Company">
               </div>
               </div>
            </div>
            <div class="row form-group">
               <div class="col">
                  <label for="OfwCat">Ofw Category</label>
                     <select class="form-control" name="OfwCat" id="OfwCat">Ofw Category
                        <option value="seabased">Sea-based</option>
                        <option value="landbased">Land-based</option>
                     </select>
               </div>
               <div class="col-5">
                  <label for="Country">Country</label>
                  <input type="text" class="form-control" id="Country" name="Country">
               </div>
               <div class="col-5">
                  <label for="PeriodOfEmp">Period of Employment</label>
                  <input type="text" class="form-control" id="PeriodOfEmp" name="PeriodOfEmp">
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
