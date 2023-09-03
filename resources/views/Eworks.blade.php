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
         <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
               <div class="col-2">
                  <h6 class="m-0 font-weight-bold text-dark">Available Works</h6>
               </div> 
               <div class="col-9">
                  <a href="/WorkPrint" target="_blank" style="padding:1px 10px;" class="btn btn-outline-dark">Print</a>
               </div>
               <div class="col">
                  <form action="/AddWorks">
                     <input class="font-weight-bold" style="background-color:#5F9EA0; border:none;" 
                     type="submit" value="Add" />
                  </form>
               </div>
         </div>
            <!-- Card Body -->
         <div class="card-body">
            <div class="container table-container">
               <table class="table" style="text-align:center">
                  <thead>
                     <tr>
                        <th scope="col">Date</th>
                        <th scope="col">Job Description</th>
                        <th scope="col">Company</th>
                        <th scope="col">Required skills</th>
                        <th scope="col">Requirements </th>
                        <th scope="col">Contact Number</th>
                        <th scope="col">Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach ($work as $wrk)
                        <tr>
                           <td>{{ $wrk->date }}</td>
                           <td>{{ $wrk->jobdesc }}</td>
                           <td>{{ $wrk->company }}</td>
                           <td>{{ $wrk->skills }}</td>
                           <td>{{ $wrk->req }}</td>
                           <td>{{ $wrk->contact }}</td>
                           <td>
                              <span class="input-group">

                                 <form action ="editWorks" method="GET">
                                    <input type="hidden" id="workID" name="workID" value="{{ $wrk->id }}">
                                    <input type="submit" class="btn btn-info" value="Edit" name="submit">
                                 </form>
                                 &emsp;
                                 <button type="button" class="btn btn-danger" style="border-radius: 4px;" data-toggle="modal" data-target="#delmod{{ $wrk->id }}">
                                    Delete
                                 </button>

                                 <!-- DELETE Modal -->
                                 <div class="modal fade" id="delmod{{ $wrk->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                       <div class="modal-content">
                                          <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel"><i class="bi bi-x-octagon-fill text-danger"></i> DELETE RECORD ID: {{ $wrk->id }} </h5>
                                                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                          </div>
                                          <div class="modal-body">
                                                Do you really want to delete {{ $wrk->jobdesc}}?
                                          </div>
                                          <div class="modal-footer">
                                                <form action ="deleteWork" method="GET" >
                                                   @csrf
                                                   <input type="hidden" id="delId" name="delId" value="{{ $wrk->id }}">
                                                   <button type="submit" class="btn btn-danger" onclick="javascript:$('#delmod{{ $wrk->id }}').modal('hide');" >Yes</button>
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
