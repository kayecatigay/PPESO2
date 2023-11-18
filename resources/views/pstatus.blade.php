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
               <h6 class="m-0 font-weight-bold text-dark">Scholar Status</h6>
               <a href="/statPrint" target="_blank" style="padding:1px 10px;" class="btn btn-outline-dark">Print</a>
            </div>
               <!-- Card Body -->
               <div class="card-body">
              <div class="container table-container">
                <table class="table" style="text-align:center;">
                  <thead>
                      <tr>
                        <th scope="col">Applicant Name</th>
                        <th scope="col">Date</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                      </tr>
                  </thead>
                  <tbody>
                  @foreach ($pstatus as $key => $sc)
                     <tr>
                        <td>
                           @if(isset($pName[$key]))
                              {{ $pName[$key]->name }}
                           @else
                              (None)
                           @endif
                     </td>
                        <td>{{ $sc->date }}</td>
                        <td>{{ $sc->status }}</td>
                        <td>
                           <span class="input-group">

                              @if ($sc->status=="pending")
                                 <button type="button" class="btn btn-success" style="border-radius: 2px; " data-toggle="modal" data-target="#delmod{{ $sc->id }}">
                                    Approve
                                 </button> &nbsp;
                                 <form action="\Pnotif">
                                    <input type="hidden" id="PNid" name="PNid" value="{{ $sc->id}}">
                                    <button type="submit" class="btn btn-info" style="border-radius: 2px; ">
                                       Notify
                                    </button>
                                 </form>
                              @endif
                              <!-- DELETE Modal -->
                                 <div class="modal fade"  id="delmod{{ $sc->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                       <div class="modal-content">   
                                          <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel"><i class="bi bi-x-octagon-fill text-danger"></i> APPROVE RECORD ID: {{ $sc->id }}? </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                          </div>
                                          <div class="modal-body">
                                                Do you want to approve this record: {{ $sc->appId}}?
                                          </div>
                                          <div class="modal-footer">
                                                <form action ="\Papprove" method="get" >
                                                   @csrf
                                                   <input type="hidden" id="delId" name="delId" value="{{ $sc->id }}">
                                                   <button type="submit" class="btn btn-success" onclick="javascript:$('#delmod{{ $sc->id }}').modal('hide');" >Yes</button>
                                                </form>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                          </div>
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
