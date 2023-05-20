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
               <form action="/addSched">
                  <input class="font-weight-bold" style="background-color:#5F9EA0; border:none;" 
                  type="submit" value="Add" />
               </form>
               
            </div>
               <!-- Card Body -->
               <div class="card-body">
                  <div class="container table-container">
                     <table class="table">
                        <thead>
                           <tr>
                              <th scope="col">Employee Name</th>
                              <th scope="col">Date</th>
                              <th scope="col">Time</th>
                              <th scope="col">Location</th>
                              <th scope="col">Work</th>
                              <th scope="col">Proctor</th>
                              <th scope="col">Requirements</th>                           
                           </tr>
                        </thead>
                        <tbody>
                           @foreach ($sched as $sc)
                              <tr>
                                 <td>{{ $sc->EmName }}</td>
                                 <td>{{ $sc->Date }}</td>
                                 <td>{{ $sc->Time }}</td>
                                 <td>{{ $sc->Loc }}</td>
                                 <td>{{ $sc->Work }}</td>
                                 <td>{{ $sc->Proctor }}</td>
                                 <td>{{ $sc->Req }}</td>
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
