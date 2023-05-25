@extends('layouts.default')

@section('content')
  <!-- ======= Services Section ======= -->

  <section id="services" class="services">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Services</h2>
          <p>OFW Fill up form</p>
        </div>
        <form action="ofwinsertD">
          
          <div class="form-group">
            <label for="userid"></label>
            <input type="hidden" class="form-control" id="userid" name="userid" value="{{ Auth::user()->id }}" >
          </div>
                
            <div class="card-body">
                <div class="container table-container">
                    <table class="table">
                      
                        <thead>
                           <tr>
                              <th scope="col">Job Description</th>
                              <th scope="col">Ofw Category</th>
                              <th scope="col">Company</th>
                              <th scope="col">Country</th>
                              <th scope="col">Period of Employment</th>          
                              <th scope="col">Action</th>            
                           </tr>
                        </thead>
                        <tbody>
                            
                              <tr>
                                  <td>baba</td>
                                  <td>bebe</td>
                                  <td>bibi</td>
                                  <td>country</td>
                                  <td>Employment</td>
                                  <td>
                                      <span class="input-group">
                                        
                                        &emsp;
                                        <button type="button" class="btn btn-danger" style="border-radius: 4px;" data-toggle="modal" data-target="#delmod">
                                        Delete
                                        </button>

                                        <!-- DELETE Modal -->
                                        <div class="modal fade" id="delmod" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">   
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel"><i class="bi bi-x-octagon-fill text-danger"></i> DELETE RECORD ID: </h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Do you really want to delete this record: ?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form action ="/deleteWorke" method="get" >
                                                            @csrf
                                                            <input type="hidden" id="delId" name="delId" >
                                                            <button type="submit" class="btn btn-danger" onclick="javascript:$('#delmod').modal('hide');" >Yes</button>
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
                              <a class="btn btn-success" href="addofwT">ADD TABLE </a>
                            
                        </tbody>
                    </table>
                </div>
            </div>
    </div>
          <div class="row">
            <div class="col-5">&nbsp;</div>
            <div class="col"><button type="submit" class="btn btn-primary">Apply</button></div>
            <div class="col">&nbsp;</div>
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