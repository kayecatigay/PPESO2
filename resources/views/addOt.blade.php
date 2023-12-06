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
                  <input type="text" required class="form-control" id="JobDesc" name="JobDesc">
               </div>
               <div class="col">
                  <div class="col">
                  <label for="Company">Company</label>
                  <input type="text" required class="form-control" id="Company" name="Company" 
                  placeholder="Name of Company / NA">
               </div>
               </div>
            </div>
            <div class="row form-group">
               <div class="col">
                  <label for="OfwCat">Ofw Category</label>
                     <select class="form-control" required name="OfwCat" id="OfwCat" onclick="showCountryfunction()">
                        <option value="landbased">Land-based</option>
                        <option value="seabased">Sea-based</option>
                     </select>
               </div>
               <div class="col-5" id="showCountry" style="display: none;">
                  <label for="Country">Country</label>
                  <input type="text" class="form-control" id="Country" name="Country">
               </div>
               <div class="col-5">
                  <label for="PeriodOfEmp">Period of Employment (month-per-year)</label>
                  <input type="text" required class="form-control" id="PeriodOfEmp" name="PeriodOfEmp"
                  placeholder="ex: 8 months">
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
   <script>
      function showCountryfunction() {
         var status = document.getElementById("OfwCat").value;
         var x = document.getElementById("showCountry");
         // alert(status);
         if (status === "seabased") {
            x.style.display = "none";
            document.getElementById("Country").value="";
         } else {
            x.style.display = "block";
         }
      }
   </script>
@endsection

<!-- End of Page Wrapper -->
