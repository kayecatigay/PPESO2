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
                              <th scope="col">Fb Account</th>
                              <th scope="col">Job Description</th>
                              <th scope="col">Ofw Category</th>
                              <th scope="col">Company</th>
                              <th scope="col">Country</th>
                              <th scope="col">Period of Employment</th>
                              <th scope="col">Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach ($ofwdata as $data)
                              @php $name = $data->lastname.",".$data->firstname. " " .$data->middlename; @endphp
                              <tr>
                                 <td>{{ $name }}</td>
                                 <td>{{ $data->birthday }}</td>
                                 <td>{{ $data->age }}</td>
                                 <td>{{ $data->sex }}</td>
                                 <td>{{ $data->contactnum }}</td>
                                 <td>{{ $data->address }}</td>
                                 <td>{{ $data->passnum }}</td>
                                 <td>{{ $data->emailadd }}</td>
                                 <td>{{ $data->JobDesc }}</td>
                                 <td>{{ $data->OfwCat }}</td>
                                 <td>{{ $data->Company }}</td>
                                 <td>{{ $data->Country }}</td>
                                 <td>{{ $data->PeriodOfEmp }}</td>
                                 <td>{{ $data->fbacc }}</td>
                                 <td>
                                    <span class="input-group">

                                       <form action ="/editOFW" method="get">
                                          <input type="hidden" id="ofwID" name="ofwID" value="{{ $data->id }}">
                                          <input type="submit" class="btn btn-info" value="Edit" name="submit">
                                       </form>
                                       &emsp;
                                       <button type="button" class="btn btn-danger" style="border-radius: 4px;" data-toggle="modal" data-target="#delmod{{ $data->id }}">
                                          Delete
                                       </button>

                                          <!-- DELETE Modal -->
                                          <div class="modal fade" id="delmod{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                          <div class="modal-dialog modal-lg">
                                             <div class="modal-content">
                                             <div class="modal-header">
                                                   <h5 class="modal-title" id="exampleModalLabel"><i class="bi bi-x-octagon-fill text-danger"></i> DELETE RECORD ID: {{ $data->id }} </h5>
                                                   <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                             </div>
                                             <div class="modal-body">
                                                   Do you really want to delete this record: {{ $name}}?
                                             </div>
                                             <div class="modal-footer">
                                                   <form action ="deleteofwD" method="get" >
                                                      @csrf
                                                      <input type="hidden" id="delId" name="delId" value="{{ $data->id }}">
                                                      <button type="submit" class="btn btn-danger" onclick="javascript:$('#delmod{{ $data->id }}').modal('hide');" >Yes</button>
                                                   </form>
                                                   <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                             </div>
                                             </div>
                                          </div>
                                          <!-- DELETE Modal -->

                                       </div>
                                    </span>
                                    </td>
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