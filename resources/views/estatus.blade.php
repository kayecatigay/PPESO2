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
               <h6 class="m-0 font-weight-bold text-dark">Employment</h6>
            </div>
               
            <div class="card-body">
              <div class="container table-container">
                <table class="table"style="text-align:center;">
                  <thead>
                      <tr>
                        <th scope="col">Application Id</th>
                        <th scope="col">Date</th>
                        <th scope="col">Position Desired</th>
                        <th scope="col">Company</th>
                        <th scope="col">Record</th>
                        <th scope="col">Character Reference</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach ($status as $emp)
                      <tr>
                        <td>{{ $emp->appId }}</td>
                        <td>{{ $emp->date }}</td>
                        <td>{{ $emp->posidesired }}</td>
                        <td>{{ $emp->cname }}</td>
                        <td>{{ $emp->crname }}</td>
                        <td>{{ $emp->crcontact }}</td>
                        <td>{{ $emp->status }}</td>
                        <td>
                          <span class="input-group">
                          @if ($emp->status=="pending")
                            <button type="button" class="btn btn-success" style="border-radius: 4px; margin:auto;" data-toggle="modal" data-target="#delmod{{ $emp->id }}">
                                Approve
                            </button>
                            @endif
                                <!-- DELETE Modal -->
                              <div class="modal fade" id="delmod{{ $emp->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                  <div class="modal-content">   
                                      <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel"><i class="bi bi-x-octagon-fill text-danger"></i> CANCEL RECORD ID: {{ $emp->id }} </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                      </div>
                                      <div class="modal-body">
                                            Do you really want to cancel this record: {{ $emp->posidesired}}?
                                      </div>
                                      <div class="modal-footer">
                                          <form action ="/Eapprove" method="get" >
                                            @csrf
                                            <input type="hidden" id="delId" name="delId" value="{{ $emp->id }}">
                                            <button type="submit" class="btn btn-danger" onclick="javascript:$('#delmod{{ $emp->id }}').modal('hide');" >Yes</button>
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
