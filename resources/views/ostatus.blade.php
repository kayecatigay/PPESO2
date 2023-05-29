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
               <h6 class="m-0 font-weight-bold text-dark">Ofw</h6>
            </div>
            <div class="card-body">
            <div class="container table-container">
              <table class="table" style="text-align:center;">
                <thead>
                    <tr>
                      <th scope="col">Application ID</th>
                      <th scope="col">Date</th>
                      <th scope="col">Job Description</th>
                      <th scope="col">Ofw Category</th>
                      <th scope="col">Company</th>
                      <th scope="col">Country</th>
                      <th scope="col">Period of Employment</th> 
                      <th scope="col">Status</th>         
                      <th scope="col">Action</th>            
                    </tr>
                </thead>
                <tbody>
                    @foreach($status as $odata)
                      <tr>

                          <td>{{$odata->appID}}</td>
                          <td>{{$odata->date}}</td>
                          <td>{{$odata->JobDesc}}</td>
                          <td>{{$odata->OfwCat}}</td>
                          <td>{{$odata->Company}}</td>
                          <td>{{$odata->Country}}</td>
                          <td>{{$odata->PeriodOfEmp}}</td>
                          <td>{{$odata->status}}</td>
                          <td >
                          <span class="input-group">
                          @if ($odata->status=="pending")
                            <button type="button" class="btn btn-success" style="border-radius: 4px; margin:auto;" data-toggle="modal" data-target="#delmodofw{{ $odata->id }}">
                                Approve
                            </button>
                          @endif
                                <!-- DELETE Modal -->
                                <div class="modal fade"  id="delmodofw{{ $odata->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog modal-lg">
                                      <div class="modal-content">   
                                      <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel"><i class="bi bi-x-octagon-fill text-danger"></i> CANCEL RECORD ID: {{ $odata->id }} </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                      </div>
                                      <div class="modal-body">
                                            Do you really want to cancel this record: {{ $odata->JobDesc}}?
                                      </div>
                                      <div class="modal-footer">
                                            <form id="frmofw" action ="\Oapprove" method="get" >
                                              @csrf
                                              <input type="hidden" id="delIdofw" name="delIdofw" value="{{ $odata->id }}">
                                              <button type="submit" class="btn btn-danger" onclick="javascript:$('#delmodofw{{ $odata->id }}').modal('hide');" >Yes</button>
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
