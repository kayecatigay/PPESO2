@extends('layouts.default')

@section('content')
  <!-- ======= Services Section ======= -->
  <section id="services" class="services">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Services</h2>
          
          <p>My Employment Application</p>
          <a class="btn btn-primary" style="padding:5px; font-size:14px;" href="addEmpTable">APPLY NOW! </a>
        </div>
        <form action="empdata">
          <div class="form-group">
            <label for="userid"></label>
            <input type="hidden" class="form-control" id="userid" name="userid" value="{{ Auth::user()->id }}" >
          </div>
            <div class="card-body">
              <div class="container table-container">
                <table class="table"style="text-align:center;">
                  <thead>
                      <tr>
                        <th scope="col">Application Id</th>
                        <th scope="col">Date</th>
                        <th scope="col">Status</th>
                        <th scope="col">Position Desired</th>
                        <th scope="col">Company</th>
                        <th scope="col">Record</th>
                        <th scope="col">Character Reference</th>
                        <th scope="col">Action</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach ($reg as $emp)
                      <tr>
                        <td>{{ $emp->appId }}</td>
                        <td>{{ $emp->date }}</td>
                        <td>{{ $emp->status }}</td>
                        <td>{{ $emp->posidesired }}</td>
                        <td>{{ $emp->cname }}</td>
                        <td>{{ $emp->crname }}</td>
                        <td>{{ $emp->crcontact }}</td>
                        <td>
                          <span class="input-group">
                            
                            <button type="button" class="btn btn-danger" style="border-radius: 4px; margin:auto;" data-toggle="modal" data-target="#delmod{{ $emp->id }}">
                                Cancel
                            </button>

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
                                            <form action ="/cancelTable" method="get" >
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
        </form>
    </div>
  </section><!-- End Services Section -->
  <script>
    function myspouseFunction() {
    var status = document.getElementById("cstatus").value;
    var x = document.getElementById("hidespouse");
    // alert(status);
    if (status === "married") {
      x.style.display = "block";
    } else {
      x.style.display = "none";
      document.getElementById("spouse").value="";
    }
  }
  </script>
@endsection