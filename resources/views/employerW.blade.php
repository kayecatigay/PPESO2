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
               <h6 class="m-0 font-weight-bold text-dark">Employer</h6>
               <a href="/EstatPrint" target="_blank" style="padding:1px 10px;" class="btn btn-outline-dark">Print</a>
            </div>
               
            <div class="card-body">
              <div class="container table-container">
                <table class="table"style="text-align:center;">
                  <thead>
                      <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Email Address</th>
                        <th scope="col">Company Name</th>
                        <th scope="col">Representative</th>
                        <th scope="col">Action</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach ($employer as $emp)
                      <tr>
                        <td>{{ $emp->name }}</td>
                        <td>{{ $emp->email }}</td>
                        <td>{{ $emp->cname }}</td>
                        <td>
                          <span class="input-group">
                            <button type="button" class="btn btn-danger" style="border-radius: 4px;" data-toggle="modal" data-target="#delmod{{ $emp->id }}">
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
                                            Do you really want to delete {{ $emp->name}}?
                                      </div>
                                      <div class="modal-footer">
                                            <form action ="deleteEmployer" method="GET" >
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
