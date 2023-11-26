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
               <h6 class="m-0 font-weight-bold text-dark">OFW Applicants</h6>
               <a href="/OPrint" target="_blank" style="padding:1px 10px;" class="btn btn-outline-dark">Print</a>
            </div>
               <!-- Card Body -->
               <div class="card-body">
                  <div class="container table-container">
                     <table class="table" style="text-align:center">
                        <thead>
                           <tr>
                              <th scope="col">Name</th>
                              <th scope="col">Birthday</th>
                              <th scope="col">Age</th>
                              <th scope="col">Sex</th>
                              <th scope="col">Contact Number </th>
                              <th scope="col">Address</th>
                              <th scope="col">Passport Number</th>
                              <th scope="col">Email Address</th>
                              <th scope="col">Job Description</th>
                              <th scope="col">Ofw Category</th>
                              <th scope="col">Company</th>
                              <th scope="col">Country</th>
                              <th scope="col">Period of Employment</th>
                              <th scope="col">Displacement due to Covid-19</th>
                              <th scope="col">Since</th>
                              <th scope="col">Date of Arrival</th>
                              <th scope="col">Others</th>
                              <th scope="col">Type of Displacement</th>
                              <th scope="col">Financial Assistance?</th>
                              <th scope="col">Eligibility</th>
                              <th scope="col">Type of Assistance Received</th>
                              <th scope="col">Date Received</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach ($ofwdata as $data)
                              @php $name = $data->lastname.",".$data->firstname. " " .$data->middlename; @endphp
                              @php $address = $data->region."," .$data->province."," .$data->mun."," .$data->barangay."," .$data->sitio; @endphp
                              <tr>
                                 <td>{{ $name }}</td>
                                 <td>{{ $data->birthday }}</td>
                                 <td>{{ $data->age }}</td>
                                 <td>{{ $data->gender }}</td>
                                 <td>{{ $data->contactnum }}</td>
                                 <td>{{ $address }}</td>
                                 <td>{{ $data->passnum }}</td>
                                 <td>{{ $data->emailadd }}</td>
                                 <td>{{ $data->JobDesc }}</td>
                                 <td>{{ $data->OfwCat }}</td>
                                 <td>{{ $data->Company }}</td>
                                 <td>{{ $data->Country }}</td>
                                 <td>{{ $data->PeriodOfEmp }}</td>
                                 <td>{{ $data->DuetoCovid }}</td>
                                 <td>{{ $data->since }}</td>
                                 <td>{{ $data->DOArrival }}</td>
                                 <td>{{ $data->TypeofD }}</td>
                                 <td>{{ $data->otherType }}</td>
                                 <td>{{ $data->fAssistance }}</td>
                                 <td>{{ $data->typeofA }}</td>
                                 <td>{{ $data->eligibility }}</td>
                                 <td>{{ $data->dateReceived }}</td>                                 
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
