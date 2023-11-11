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
               <h6 class="m-0 font-weight-bold text-dark">Employer Application</h6>
            </div>
               <!-- Card Body -->
               <div class="card-body">    
                  <div class="container table-container">
                     <table class="table" style="text-align: center;">
                        <thead>
                           <tr>
                              <th scope="col">Type</th>
                              <th scope="col">Company Name</th>
                              <th scope="col">Contact Number</th>
                              <th scope="col">Email Address</th>
                              <th scope="col">Representative</th>
                              <th scope="col">Requirements</th>
                              <th scope="col">Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach ($empApp as $eapp)
                              <tr>   
                                 <td>{{ $eapp->type }}</td>
                                 <td>{{ $eapp->cname }}</td>
                                 <td>{{ $eapp->contact }}</td>
                                 <td>{{ $eapp->email }}</td>
                                 <td>{{ $eapp->representative }}</td>
                                 <td><a href="#mga list ng files"><i class="fa fa-search-plus" aria-hidden="true"></i></a></td>
                                 <td>
                                    <span class="input-group">

                                       <!-- <form action ="/editUser" method="get">
                                          <input type="hidden" id="usrID" name="usrID" value="{{ $eapp->id }}">
                                          <input type="submit" class="btn btn-info" value="Edit" name="submit">
                                       </form>
                                       &emsp; -->

                                       <button type="button" class="btn btn-danger" style="border-radius: 4px;" data-toggle="modal" data-target="#delmod{{ $eapp->id }}">
                                       Delete
                                       </button>

                                          <!-- DELETE Modal -->
                                       <div class="modal fade" id="delmod{{ $eapp->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                          <div class="modal-dialog modal-lg">
                                             <div class="modal-content">
                                                <div class="modal-header">
                                                      <h5 class="modal-title" id="exampleModalLabel"><i class="bi bi-x-octagon-fill text-danger"></i> DELETE RECORD ID: {{ $eapp->id }} </h5>
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                <div class="modal-body">
                                                      Do you really want to delete this record: {{ $eapp->cname}}?
                                                </div>
                                                <div class="modal-footer">
                                                      <form action ="deleteuserD" method="get" >
                                                         @csrf
                                                         <input type="hidden" id="delId" name="delId" value="{{ $eapp->id }}">
                                                         <button type="submit" class="btn btn-danger" onclick="javascript:$('#delmod{{ $eapp->id }}').modal('hide');" >Yes</button>
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
