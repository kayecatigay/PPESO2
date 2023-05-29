@extends('layouts.default')

@section('content')
  <!-- ======= Services Section ======= -->

  <section id="services" class="services">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Services</h2>
          <p>My OFW Application</p>
          <a class="btn btn-success" href="addofwT">APPLY NOW! </a>
        </div>
        <!-- <form action="ofwinsertD"> -->
          
          
          <div class="card-body">
            <div class="container table-container">
              <table class="table" style="text-align:center;">
                <thead>
                    <tr>
                      <th scope="col">Application ID</th>
                      <th scope="col">Date</th>
                      <th scope="col">Status</th>
                      <th scope="col">Job Description</th>
                      <th scope="col">Ofw Category</th>
                      <th scope="col">Company</th>
                      <th scope="col">Country</th>
                      <th scope="col">Period of Employment</th>          
                      <th scope="col">Action</th>            
                    </tr>
                </thead>
                <tbody>
                    @foreach($ofw as $odata)
                      <tr>

                          <td>{{$odata->appID}}</td>
                          <td>{{$odata->date}}</td>
                          <td>{{$odata->status}}</td>
                          <td>{{$odata->JobDesc}}</td>
                          <td>{{$odata->OfwCat}}</td>
                          <td>{{$odata->Company}}</td>
                          <td>{{$odata->Country}}</td>
                          <td>{{$odata->PeriodOfEmp}}</td>
                          <td >
                          <span class="input-group">
                            
                            <button type="button" class="btn btn-danger" style="border-radius: 4px; margin:auto;" data-toggle="modal" data-target="#delmodofw{{ $odata->id }}">
                                Cancel
                            </button>

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
                                            <form id="frmofw" action ="\cancelOfwT" method="get" >
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
      <!-- </form>    -->
    </div>
  </section><!-- End Services Section -->

  <script>
      function setage()
      {
        dob=new Date(document.getElementById("birthday").value);
        var month_diff = Date.now() - dob.getTime();  
        var age_dt = new Date(month_diff);   
        var year = age_dt.getUTCFullYear();  
        var age = Math.abs(year - 1970);  
        document.getElementById("age").value=age;
      }
  </script>
@endsection