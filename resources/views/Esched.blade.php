@extends('layouts.Saddefault')

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
               <h6 class="m-0 font-weight-bold text-dark">Esched</h6>
               <button type="submit" href="/addSched"><h6 class="m-0 font-weight-bold text-dark">Add</h6></button>
            </div>
               <!-- Card Body -->
               <div class="card-body">
                  <div class="container table-container">
                     <table class="table">
                        <thead>
                           <tr>
                              <th scope="col">Name</th>
                              <th scope="col">Sex</th>
                              <th scope="col">Address</th>
                              <th scope="col">Email Address</th>
                              <th scope="col">Contact number</th>
                              <th scope="col">Birth date</th>
                              <th scope="col">Birth place</th>
                              <th scope="col">Age</th>
                              <th scope="col">Height</th>
                              <th scope="col">Weight</th>
                              <th scope="col">Bloodtype</th>
                              <th scope="col">Religion</th>
                              <th scope="col">Guardian</th>
                              <th scope="col">Relation</th>
                              <th scope="col">Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           
                        </tbody>
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
