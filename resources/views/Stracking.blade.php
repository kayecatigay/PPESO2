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
               <h6 class="m-0 font-weight-bold text-dark">Scholarship Tracking</h6>
               <form action="/addAnnouncements">
                  <input class="font-weight-bold" style="background-color:#5F9EA0; border:none;" 
                  type="submit" value="Add" />
               </form>
               
            </div>
               <!-- Card Body -->
               <div class="card-body">
                  <div class="container table-container">
                     <table class="table">
                        <thead style="text-align:center">
                           <tr>
                              <th scope="col">Name</th>
                              <th scope="col">Age</th>
                              <th scope="col">Sex</th>
                              <th scope="col">Address</th>
                              <th scope="col">Year Graduated</th>
                              <th scope="col">School</th>
                              <th scope="col">Work</th>
                              <th scope="col">Company Name</th>
                              <th scope="col">Date Entry</th>
                           </tr>
                        </thead>
                        
                        <tbody style="text-align:center">
                           @foreach ($track as $tr)
                              <tr>
                                 <td>{{ $tr->name }}</td>
                                 <td>{{ $tr->age }}</td>
                                 <td>{{ $tr->sex }}</td>
                                 <td>{{ $tr->address }}</td>
                                 <td>{{ $tr->yearGraduated }}</td>
                                 <td>{{ $tr->school }}</td>
                                 <td>{{ $tr->work }}</td>
                                 <td>{{ $tr->companyName }}</td>
                                 <td>{{ $tr->dateEntry }}</td>
                              </tr>
                           @endforeach
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
