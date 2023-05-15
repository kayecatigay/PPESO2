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
                              <th scope="col">Date</th>
                              <th scope="col">Job Description</th>
                              <th scope="col">Company</th>
                              <th scope="col">Skills</th>
                              <th scope="col">Requirements </th>
                              <th scope="col">Contact Number</th>
                              <th scope="col">Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach ($work as $wrk)
                              <tr>
                                 <td>{{ $wrk->date }}</td>
                                 <td>{{ $wrk->jobdesc }}</td>
                                 <td>{{ $wrk->company }}</td>
                                 <td>{{ $wrk->skills }}</td>
                                 <td>{{ $wrk->req }}</td>
                                 <td>{{ $wrk->contact }}</td>
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
