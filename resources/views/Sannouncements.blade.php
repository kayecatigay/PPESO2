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
               <h6 class="m-0 font-weight-bold text-dark">Announcements</h6>
               <form action="/addAnnouncements">
                  <input type="hidden" id="srv" name="srv" value="{{ $Sann[0]->service }}">   
                  <input class="font-weight-bold" style="background-color:#5F9EA0; border-radius: 4px;border:none;" 
                  type="submit" value="Add" />
               </form>
               
            </div>
               <!-- Card Body -->
               <div class="card-body">
                  <div class="container table-container">
                     <table class="table">
                        <thead style="text-align:center">
                           <tr>
                              <th scope="col">Date From</th>
                              <th scope="col">Date To</th>
                              <th scope="col">Title</th>
                              <th scope="col">Description</th>
                              <th scope="col">Image</th>
                              <th scope="col">Action</th>
                           </tr>
                        </thead>
                        <tbody style="text-align:center">
                           @foreach ($Sann as $ann)
                              <tr>
                                 <td>{{ $ann->dateFrom }}</td>
                                 <td>{{ $ann->dateTo }}</td>
                                 <td>{{ $ann->title }}</td>
                                 <td>{{ $ann->body }}</td>
                                 <td>{{ $ann->image }}</td>
                                 <td>
                                    <span class="input-group">

                                       <form action ="/editAnnouncements" method="get">
                                          <input type="hidden" id="annID" name="annID" value="{{ $ann->id }}">
                                          <input type="submit" class="btn btn-info" value="Edit" name="submit">
                                       </form>
                                       &emsp;

                                       <button type="button" class="btn btn-danger" style="border-radius: 4px;" data-toggle="modal" data-target="#delmod{{ $ann->id }}">
                                          Delete
                                       </button>

                                          <!-- DELETE Modal -->
                                       <div class="modal fade" id="delmod{{ $ann->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                          <div class="modal-dialog modal-lg">
                                             <div class="modal-content">
                                                <div class="modal-header">
                                                      <h5 class="modal-title" id="exampleModalLabel"><i class="bi bi-x-octagon-fill text-danger"></i> DELETE RECORD ID: {{ $ann->id }} </h5>
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                <div class="modal-body">
                                                      Do you really want to delete this schedule: {{ $ann->title}}?
                                                </div>
                                                <div class="modal-footer">
                                                      <form action ="deleteAnn" method="get" >
                                                         @csrf
                                                         <input type="hidden" id="delId" name="delId" value="{{ $ann->id }}">
                                                         <button type="submit" class="btn btn-danger" onclick="javascript:$('#delmod{{ $ann->id }}').modal('hide');" >Yes</button>
                                                      </form>
                                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>

                                                </div>
                                             </div>
                                          </div>
                                          <!-- DELETE Modal -->

                                       </div>
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
