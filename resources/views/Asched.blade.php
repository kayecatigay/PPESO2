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
               <h6 class="m-0 font-weight-bold text-dark">All sched</h6>
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
                              <th scope="col">Scholar</th>
                              <th scope="col">Date</th>
                              <th scope="col">Time</th>
                              <th scope="col">Location</th>
                              <th scope="col">Requirements</th>
                              <th scope="col">Proctor</th>
                              <th scope="col">Type</th>            
                              <th scope="col">Action</th>            
                           </tr>
                        </thead>
                        <tbody>
                           @foreach ($sched as $sc)
                              <tr>
                                 <td>{{ $sc->ScName }}</td>
                                 <td>{{ $sc->Date }}</td>
                                 <td>{{ $sc->Time }}</td>
                                 <td>{{ $sc->Loc }}</td>
                                 <td>{{ $sc->Req }}</td>
                                 <td>{{ $sc->Proctor }}</td>
                                 <td>{{ $sc->type }}</td>
                                 <td>
                                 <span class="input-group">
                                    <form action ="editSched" method="get">
                                       <input type="hidden" id="schedID" name="schedID" value="{{ $sc->id }}">
                                       <input type="submit" class="btn btn-info" value="Edit" name="submit">
                                    </form>
                                    &emsp;
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delmod{{ $sc->id }}">
                                       Delete
                                    </button>

                                       <!-- DELETE Modal -->
                                       <div class="modal fade" id="delmod{{ $sc->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                          <div class="modal-dialog modal-lg">
                                             <div class="modal-content">   
                                             <div class="modal-header">
                                                   <h5 class="modal-title" id="exampleModalLabel"><i class="bi bi-x-octagon-fill text-danger"></i> DELETE RECORD ID: {{ $sc->id }} </h5>
                                                   <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                             </div>
                                             <div class="modal-body">
                                                   Do you really want to delete this record: {{ $sc->ScName}}?
                                             </div>
                                             <div class="modal-footer">
                                                   <form action ="/deleteSched" method="get" >
                                                      @csrf
                                                      <input type="hidden" id="delId" name="delId" value="{{ $sc->id }}">
                                                      <button type="submit" class="btn btn-danger" onclick="javascript:$('#delmod{{ $sc->id }}').modal('hide');" >Yes</button>
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
