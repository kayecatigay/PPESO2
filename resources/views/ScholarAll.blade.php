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
               <h6 class="m-0 font-weight-bold text-dark">New Application Forms</h6>
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
                           @foreach ($data as $old)
                              <tr>
                                 <td>{{ $old->name }}</td>
                                 <td>{{ $old->sex }}</td>
                                 <td>{{ $old->address }}</td>
                                 <td>{{ $old->emailadd }}</td>
                                 <td>{{ $old->contactnum }}</td>
                                 <td>{{ $old->birthday }}</td>
                                 <td>{{ $old->placeofbirth }}</td>
                                 <td>{{ $old->age }}</td>
                                 <td>{{ $old->height }}</td>
                                 <td>{{ $old->weight }}</td>
                                 <td>{{ $old->bloodtype }}</td>
                                 <td>{{ $old->religion }}</td>
                                 <td>{{ $old->guardian }}</td>
                                 <td>{{ $old->relation }}</td> 
                                 <td>
                                    <span class="input-group">

                                       <form action ="/editPEAP" method="get">
                                          <input type="hidden" id="peadID" name="peadID" value="{{ $old->id }}">
                                          <input type="submit" class="btn btn-info" value="Edit" name="submit">
                                       </form>
                                       &emsp;
                                       <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delmod{{ $old->id }}">
                                          Delete
                                       </button>

                                       <!-- DELETE Modal -->
                                       <div class="modal fade" id="delmod{{ $old->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                          <div class="modal-dialog modal-lg">
                                             <div class="modal-content">
                                                <div class="modal-header">
                                                      <h5 class="modal-title" id="exampleModalLabel"><i class="bi bi-x-octagon-fill text-danger"></i> DELETE RECORD ID: {{ $old->id }} </h5>
                                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                      Do you really want to delete this record: {{ $old->name}}?
                                                </div>
                                                <div class="modal-footer">
                                                      <form action ="deletepeadD" method="POST" >
                                                         @csrf
                                                         <input type="hidden" id="delId" name="delId" value="{{ $old->id }}">
                                                         <button type="submit" class="btn btn-danger" onclick="javascript:$('#delmod{{ $old->id }}').modal('hide');" >Yes</button>
                                                      </form>
                                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
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
                              <!-- old scholar -->
      <div class="col-xl-16">
         <div class="card shadow mb-4">
            <div
               class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
               <h6 class="m-0 font-weight-bold text-dark">Old Application Forms</h6>
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
                           @foreach ($data as $old)
                              <tr>
                                 <td>{{ $old->name }}</td>
                                 <td>{{ $old->sex }}</td>
                                 <td>{{ $old->address }}</td>
                                 <td>{{ $old->emailadd }}</td>
                                 <td>{{ $old->contactnum }}</td>
                                 <td>{{ $old->birthday }}</td>
                                 <td>{{ $old->placeofbirth }}</td>
                                 <td>{{ $old->age }}</td>
                                 <td>{{ $old->height }}</td>
                                 <td>{{ $old->weight }}</td>
                                 <td>{{ $old->bloodtype }}</td>
                                 <td>{{ $old->religion }}</td>
                                 <td>{{ $old->guardian }}</td>
                                 <td>{{ $old->relation }}</td> 
                                 <td>
                                    <span class="input-group">

                                       <form action ="/editPEAP" method="get">
                                          <input type="hidden" id="peadID" name="peadID" value="{{ $old->id }}">
                                          <input type="submit" class="btn btn-info" value="Edit" name="submit">
                                       </form>
                                       &emsp;
                                       <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delmod{{ $old->id }}">
                                          Delete
                                       </button>

                                       <!-- DELETE Modal -->
                                       <div class="modal fade" id="delmod{{ $old->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                          <div class="modal-dialog modal-lg">
                                             <div class="modal-content">
                                                <div class="modal-header">
                                                      <h5 class="modal-title" id="exampleModalLabel"><i class="bi bi-x-octagon-fill text-danger"></i> DELETE RECORD ID: {{ $old->id }} </h5>
                                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                      Do you really want to delete this record: {{ $old->name}}?
                                                </div>
                                                <div class="modal-footer">
                                                      <form action ="deletepeadD" method="POST" >
                                                         @csrf
                                                         <input type="hidden" id="delId" name="delId" value="{{ $old->id }}">
                                                         <button type="submit" class="btn btn-danger" onclick="javascript:$('#delmod{{ $old->id }}').modal('hide');" >Yes</button>
                                                      </form>
                                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
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
