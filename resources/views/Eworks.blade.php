@extends('layouts.addefault')

@section('maincontent')
<style>
   /* Set the table container to overflow horizontally */
   .table-container {
      overflow-x: auto;
      white-space: nowrap;
   }
</style>   
      <div class="col-xl-16">
         <div class="card shadow mb-4">
            <div
               class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
               <h6 class="m-0 font-weight-bold text-dark">Works</h6>
            </div>
               <!-- Card Body -->
               <div class="card-body">
                  <div class="container table-container">
                     <table class="table" style="text-align:center">
                        <thead>
                           <tr>
                              <th scope="col">Name</th>
                              <th scope="col">Position Desired</th>
                              <th scope="col">Gender</th>
                              <th scope="col">Address</th>
                              <th scope="col">Telephone </th>
                              <th scope="col">Cellphone</th>
                              <th scope="col">Email Address</th>
                              <th scope="col">Birtday</th>
                              <th scope="col">Civil Status</th>
                              <th scope="col">Spouse</th>
                              <th scope="col">Height</th>
                              <th scope="col">Weight</th>
                              <th scope="col">Religion</th>
                              <th scope="col">Language</th>
                              <th scope="col">Elementary</th>
                              <th scope="col">High School</th>
                              <th scope="col">College</th>
                              <th scope="col">Degree</th>
                              <th scope="col">Company Name</th>
                              <th scope="col">Position</th>
                              <th scope="col">Character Reference Name</th>
                              <th scope="col">Character Reference Company</th>
                              <th scope="col">Character Reference Position</th>
                              <th scope="col">Character Reference Contact Number</th>
                              <th scope="col">Action</th>
                           </tr>
                        </thead>
                        
                     </table>
                  </div>
               </div>
         </div>
      </div>   
        
   <script>
      // Add event listener to scroll the table
      var tableContainer = document.querySelector('.table-container');
      tableContainer.addEventListener('wheel', function(event) {
         event.preventDefault();
         tableContainer.scrollLeft += event.deltaY;
      });
   </script>
@endsection

<!-- End of Page Wrapper -->
