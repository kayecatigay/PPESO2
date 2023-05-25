@extends('layouts.default')

@section('content')
  <!-- ======= Services Section ======= -->
  <section id="services" class="services">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Services</h2>
          <p>Employment Form</p>
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
                        <th scope="col">Position Desired</th>
                        <th scope="col">Company</th>
                        <th scope="col">Record</th>
                        <th scope="col">Character Reference</th>
                        <th scope="col">Action</th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr>
                        <td>{{ $reg->posidesired }}</td>
                        <td>{{ $reg->cname }}</td>
                        <td>{{ $reg->crname }}</td>
                        <td>{{ $reg->crcontact }}</td>
                        <td>
                          <span class="input-group">
                            <form action ="editSched" method="get">
                                <input type="hidden" id="schedID" name="schedID" value="">
                                <input type="submit" class="btn btn-info" value="Edit" name="submit">
                            </form>
                            &emsp;
                            <button type="button" class="btn btn-danger" style="border-radius: 4px;" data-toggle="modal" data-target="#delmod">
                                Delete
                            </button>

                                <!-- DELETE Modal -->
                                <div class="modal fade" id="delmod" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog modal-lg">
                                      <div class="modal-content">   
                                      <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel"><i class="bi bi-x-octagon-fill text-danger"></i> DELETE RECORD ID:  </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                      </div>
                                      <div class="modal-body">
                                            Do you really want to delete this record: ?
                                      </div>
                                      <div class="modal-footer">
                                            <form action ="/deleteSched" method="get" >
                                              @csrf
                                              <input type="hidden" id="delId" name="delId" value="">
                                              <button type="submit" class="btn btn-danger" onclick="javascript:$('#delmod ').modal('hide');" >Yes</button>
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
                  </tbody>
                </table> <a class="btn btn-success" style="padding:5px; font-size:12px;" href="addEmpTable">ADD TABLE </a>
              </div>
            </div>
            <div class="row">
            <div class="col-5">&nbsp;</div>
            <div class="col"><button type="submit"  class="btn btn-primary">Apply</button></div>
            <div class="col">&nbsp;</div>
            
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