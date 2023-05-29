@extends('layouts.default')

@section('content')
  <!-- ======= Services Section ======= -->
  
  <section id="services" class="services">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Services</h2>
          <p>My Scholarship Application</p>
        </div>
        <!-- <form action="scholardata"> -->
          
            <a href="insertSchT" class="btn btn-primary">Apply Now!</a>

            <div class="card-body">
              <div class="container table-container">
                <table class="table"style="text-align:center;">
                  <thead>
                      <tr>
                        <th scope="col">Application Id</th>
                        <th scope="col">Date</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                      </tr>
                  </thead>
                  <tbody>
                  @foreach ($reg as $sc)
                    <tr>
                      <td>{{ $sc->appId }}</td>
                      <td>{{ $sc->date }}</td>
                      <td>{{ $sc->status }}</td>
                      <td >
                          <span class="input-group">
                          @if ($sc->status=="pending")
                            <button type="button" class="btn btn-danger" style="border-radius: 4px; margin:auto;" data-toggle="modal" data-target="#delmod{{ $sc->id }}">
                                Cancel
                            </button>
                          @endif
                                <!-- DELETE Modal -->
                                <div class="modal fade"  id="delmod{{ $sc->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog modal-lg">
                                      <div class="modal-content">   
                                      <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel"><i class="bi bi-x-octagon-fill text-danger"></i> CANCEL RECORD ID: {{ $sc->id }} </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                      </div>
                                      <div class="modal-body">
                                            Do you really want to cancel this record: {{ $sc->appId}}?
                                      </div>
                                      <div class="modal-footer">
                                            <form action ="\cancelsTable" method="get" >
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
          <div class="form-group">
            <label for="userid"></label>
            <input type="hidden" class="form-control" id="userid" name="userid" value="{{ Auth::user()->id }}" >
          </div>
          
          </div> <br>

          
        <!-- </form> -->
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
      function myFunction() 
      {
        var status = document.getElementById("yGraduated").value;
        var x = document.getElementById("hideschool");
        // alert(status);
        if (status === "year") {
          x.style.display = "block";
        } else {
          x.style.display = "none";
          document.getElementById("spouse").value="";
        }
      }
      function workFunction() 
      {
        var status = document.getElementById("work").value;
        var x = document.getElementById("hidecompany");
        // alert(status);
        if (status === "yes") {
          x.style.display = "block";
        } else {
          x.style.display = "none";
          document.getElementById("cname").value="";
        }
      }
  </script>
@endsection