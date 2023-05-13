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
                        <tbody>
                           @foreach ($data as $emp)
                              <tr>
                                 <td>{{ $emp->name }}</td>
                                 <td>{{ $emp->posidesired }}</td>
                                 <td>{{ $emp->gender }}</td>
                                 <td>{{ $emp->address }}</td>
                                 <td>{{ $emp->telephone }}</td>
                                 <td>{{ $emp->cellphone }}</td>
                                 <td>{{ $emp->emailadd }}</td>
                                 <td>{{ $emp->birthday }}</td>
                                 <td>{{ $emp->Cstatus }}</td>
                                 <td>{{ $emp->spouse }}</td>
                                 <td>{{ $emp->height }}</td>
                                 <td>{{ $emp->weight }}</td>
                                 <td>{{ $emp->religion }}</td>
                                 <td>{{ $emp->language }}</td>
                                 <td>{{ $emp->elem }}</td>
                                 <td>{{ $emp->hschool }}</td>
                                 <td>{{ $emp->college }}</td>
                                 <td>{{ $emp->degree }}</td>
                                 <td>{{ $emp->cname }}</td>
                                 <td>{{ $emp->position }}</td>
                                 <td>{{ $emp->crname }}</td>
                                 <td>{{ $emp->crcompany }}</td>
                                 <td>{{ $emp->crposition }}</td>
                                 <td>{{ $emp->crcontact }}</td>
                                 <td>
                                    <span class="input-group">

                                       <form action ="editEMP" method="get">
                                          <input type="hidden" id="empID" name="empID" value="{{ $emp->id }}">
                                          <input type="submit" class="btn btn-info" value="Edit" name="submit">
                                       </form>
                                       &emsp;
                                       <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delmod{{ $emp->id }}">
                                          Delete
                                       </button>

                                       <!-- DELETE Modal -->
                                       <div class="modal fade" id="delmod{{ $emp->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                          <div class="modal-dialog modal-lg">
                                             <div class="modal-content">
                                                <div class="modal-header">
                                                      <h5 class="modal-title" id="exampleModalLabel"><i class="bi bi-x-octagon-fill text-danger"></i> DELETE RECORD ID: {{ $emp->id }} </h5>
                                                      <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                      Do you really want to delete this record: {{ $emp->name}}?
                                                </div>
                                                <div class="modal-footer">
                                                      <form action ="deleteEMPD" method="POST" >
                                                         @csrf
                                                         <input type="hidden" id="delId" name="delId" value="{{ $emp->id }}">
                                                         <button type="submit" class="btn btn-danger" onclick="javascript:$('#delmod{{ $emp->id }}').modal('hide');" >Yes</button>
                                                      </form>
                                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <!-- DELETE Modal -->
                                    </span>
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
   </script>
@endsection

<!-- End of Page Wrapper -->
