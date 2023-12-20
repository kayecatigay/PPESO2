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
               <h6 class="m-0 font-weight-bold text-dark">Applicants</h6>
               <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                  <i class="fa fa-bars"></i>
               </button>    
               <form action="Etracking"
                  class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                  <div class="input-group">
                        <input type="text" id="filter" name="filter" class="form-control border-0 small" 
                        placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" value="{{ $txts ?? '' }}">
                        <div class="input-group-append">
                           <button class="btn btn-primary" type="submit">
                              <i class="fas fa-search fa-sm"></i>
                           </button>
                        </div>
                  </div>
               </form>
               <form action="ePrint" target="_blank">
                  <input type="hidden" id="id" name="id" value="">
                  <button type="submit" onclick="copysearch()" class="btn btn-outline-dark" style="padding:1px 10px;">Print</button>
                  <!-- <a href="/ePrint" target="_blank" style="padding:1px 10px;" class="btn btn-outline-dark">Print</a> -->
               </form>
            </div>
               <!-- Card Body -->
               <div class="card-body">
                  <div class="container table-container">
                     <table class="table" style="text-align:center">
                        <thead>
                           <tr>
                              <th scope="col">Hired</th>
                              <th scope="col">Name</th>
                              <th scope="col">Position Desired</th>
                              <th scope="col">Gender</th>
                              <th scope="col">Address</th>
                              <th scope="col">Telephone </th>
                              <th scope="col">Cellphone</th>
                              <th scope="col">Email Address</th>
                              <th scope="col">Birthday</th>
                              <th scope="col">Civil Status</th>
                              <th scope="col">Spouse</th>
                              <th scope="col">Height</th>
                              <th scope="col">Weight</th>
                              <th scope="col">Language</th>
                              <th scope="col">Elementary</th>
                              <th scope="col">High School</th>
                              <th scope="col">College</th>
                              <th scope="col">Degree</th>
                              <th scope="col">Company Name</th>
                              <th scope="col">Resume</th>
                              <th scope="col">Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach ($data as $emp)
                           @php $address = $emp->region."," .$emp->province."," .$emp->mun."," .$emp->barangay."," .$emp->sitio; @endphp
                              <tr>
                                 <td>{{ $emp->hire }}</td>
                                 <td>{{ $emp->name }}</td>
                                 <td>{{ $emp->posidesired }}</td>
                                 <td>{{ $emp->gender }}</td>
                                 <td>{{ $address }}</td>
                                 <td>{{ $emp->telenum }}</td>
                                 <td>{{ $emp->contactnum }}</td>
                                 <td>{{ $emp->emailadd }}</td>
                                 <td>{{ $emp->birthday }}</td>
                                 <td>{{ $emp->cstatus }}</td>
                                 <td>{{ $emp->spouse }}</td>
                                 <td>{{ $emp->height }}</td>
                                 <td>{{ $emp->weight }}</td>
                                 <td>{{ $emp->language }}</td>
                                 <td>{{ $emp->elem }}</td>
                                 <td>{{ $emp->hs }}</td>
                                 <td>{{ $emp->college }}</td>
                                 <td>{{ $emp->degree }}</td>
                                 <td>{{ $emp->cname }}</td>
                                 <td>
                                    <input type="text" style="border:none;" size="10" value="{{ $emp->original_name}}">
                                    <a href="{{ asset('uploads/' . $emp->filename) }}" download>
                                       <i class="fa fa-download" style="color:black;" aria-hidden="true"></i>
                                    </a>
                                 </td>
                                 <!-- <td>
                                    <a href="/printApp">
                                       <button type="submit" class="btn btn-info" id="userid" name="userid" value="{{ $emp->userid }}" style="border:none;">Details</button>
                                       <input type="text" id="userid" name="userid" value="{{ $emp->userid }}">
                                    </a> &nbsp;
                                 </td> -->
                                 <td> 
                                    <form action="/printApp" method="get">
                                       <input type="hidden" id="showId" name="showId" value="{{ $emp->userid }}">
                                       <button type="submit" class="btn btn-outline-dark" style="padding:1px 10px;;">PRINT</button>
                                    </form> 
                                 </td>
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
      function copysearch()
      {
         document.getElementById("id").value=document.getElementById("filter").value;
      }
   </script>
@endsection

<!-- End of Page Wrapper -->
