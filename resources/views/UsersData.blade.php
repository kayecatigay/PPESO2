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
               <h6 class="m-0 font-weight-bold text-dark">Users</h6>
            </div>
               <!-- Card Body -->
               <div class="card-body">    
                  <div class="container table-container">
                     <table class="table">
                        <thead>
                           <tr>
                              <th scope="col">Name</th>
                              <th scope="col">Email Address</th>
                              <th scope="col">Roles</th>
                              <th scope="col">Action</th>
                              </tr>
                        </thead>
                        <tbody>
                           @foreach ($user as $usr)
                              @switch($usr->roles)
                                 @case(0)
                                    @php $urole = "User"; @endphp
                                    @break
                              
                                 @case(1)
                                    @php $urole = "Scholarship Admin"; @endphp
                                    @break
                              
                                 @case(2)
                                    @php $urole = "Employment Admin"; @endphp
                                    @break
                           
                                 @case(3)
                                    @php $urole = "Ofw Admin"; @endphp
                                    @break
                               
                                 @case(4)
                                    @php $urole = "Employer"; @endphp
                                    @break
                                 @case(5)
                                    @php $urole = "Super Admin"; @endphp
                                    @break
                              
                              
                              @endswitch
                              <tr>   
                                 <td>{{ $usr->name }}</td>
                                 <td>{{ $usr->email }}</td>
                                 <td>{{ $urole }}</td>
                                 <td>
                                    <span class="input-group">

                                       <form action ="/editUser" method="get">
                                          <input type="hidden" id="usrID" name="usrID" value="{{ $usr->id }}">
                                          <input type="submit" class="btn btn-info" value="Edit" name="submit">
                                       </form>
                                       &emsp;

                                       <button type="button" class="btn btn-danger" style="border-radius: 4px;" data-toggle="modal" data-target="#delmod{{ $usr->id }}">
                                       Delete
                                       </button>

                                          <!-- DELETE Modal -->
                                       <div class="modal fade" id="delmod{{ $usr->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                          <div class="modal-dialog modal-lg">
                                             <div class="modal-content">
                                                <div class="modal-header">
                                                      <h5 class="modal-title" id="exampleModalLabel"><i class="bi bi-x-octagon-fill text-danger"></i> DELETE RECORD ID: {{ $usr->id }} </h5>
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                <div class="modal-body">
                                                      Do you really want to delete this record: {{ $usr->name}}?
                                                </div>
                                                <div class="modal-footer">
                                                      <form action ="deleteuserD" method="get" >
                                                         @csrf
                                                         <input type="hidden" id="delId" name="delId" value="{{ $usr->id }}">
                                                         <button type="submit" class="btn btn-danger" onclick="javascript:$('#delmod{{ $usr->id }}').modal('hide');" >Yes</button>
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
      <!-- Button trigger modal -->
      <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
      Launch demo modal
      </button> -->


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
