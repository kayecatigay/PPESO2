@extends('layouts.addefault')

@section('maincontent')
<style>
   /* Set the table container to overflow horizontally */
   .table-container {
      overflow-x: auto;
      white-space: nowrap;
   }
</style>   
                       
<!-- <button onclick="openPrintView()">Print</button>

<script>
    function openPrintView() 
    {
     var printWindow = window.open('/print');
      //   printWindow.onload = function() {
      //       printWindow.print();
      //       printWindow.onafterprint = function() {
      //           printWindow.close();
      //       };
      //   };
    }
</script> -->
      <div class="col-xl-16">
         <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
               <div class="row">
                  <div class="col">
                     <h6 class="m-0 font-weight-bold text-dark">Application Forms</h6>
                  
                     <a href="/ScholarPrint" target="_blank" style="padding:1px 10px;" class="btn btn-outline-dark">Print</a>
                  </div>
               </div>
            </div>
               <!-- Card Body -->
               <div class="card-body">
                  <div class="container table-container">
                     <table class="table">
                        <thead>
                           <tr>
                              <th scope="col">Created At</th>
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
                              <th scope="col">Guardian</th>
                              <th scope="col">Relation</th>
                              <th scope="col">Year Graduated</th>
                              <th scope="col">School</th>
                              <th scope="col">Work</th>
                              <th scope="col">Company Name</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach ($dataold as $old)
                           @php $address = $old->region."," .$old->province."," .$old->mun."," .$old->barangay."," .$old->sitio; @endphp
                              <tr>
                                 <td>{{ $old->date }}</td>
                                 <td>{{ $old->name }}</td>
                                 <td>{{ $old->gender }}</td>
                                 <td>{{ $address }}</td>
                                 <td>{{ $old->emailadd }}</td>
                                 <td>{{ $old->contactnum }}</td>
                                 <td>{{ $old->birthday }}</td>
                                 <td>{{ $old->pobirth }}</td>
                                 <td>{{ $old->age }}</td>
                                 <td>{{ $old->height }}</td>
                                 <td>{{ $old->weight }}</td>
                                 <td>{{ $old->bloodtype }}</td>
                                 <td>{{ $old->guardian }}</td>
                                 <td>{{ $old->relation }}</td>
                                 <td>{{ $old->yGraduated }}</td>
                                 <td>{{ $old->school }}</td> 
                                 <td>{{ $old->work }}</td>
                                 <td>{{ $old->cname }}</td>                          
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
