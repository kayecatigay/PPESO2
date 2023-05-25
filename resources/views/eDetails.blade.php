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
          
          <div class="row">
              <label for="posidesi">Position Desired:</label>
              <input type="text" id="posidesi" name="posidesi" placeholder="Enter Position">
          </div>
        
          <div class="container" id="myTable">
                <div class="table-responsive">
                    <table class="table" style="text-align:center">
                        <thead>
                            <tr>
                                <th>Company Name</th>
                                <th>Position</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                  <input type="text" style="border:0px" id="cname" name="cname">
                                </td>
                                <td>
                                  <input type="text" style="border:0px" id="posi" name="posi">
                                </td>
                            </tr>
                            <tr>
                              <td>
                                <input type="text" style="border:0px" id="cname" name="cname">
                              </td>
                              <td>
                                <input type="text" style="border:0px" id="posi" name="posi">
                              </td>
                            </tr>
                        </tbody>
                    </table>
                    <button type="button" onclick="mytableFunction()">Add</button>
                </div>
            </div>
            <div class="row">
                <div class="col form-group">
                    <label for="cname">Company Name</label>
                    <input type="text" class="form-control" id="cname" name="cname"  placeholder="Enter Company name">
                </div>
                <div class="col-5 form-group">
                    <label for="posi">Position</label>
                    <input type="text" class="form-control" id="posi" name="posi"  placeholder="Enter Position">
                </div>
            </div><br>  

                <p>Character Reference</p>
            <div class="row"> 
              <div class="col form-group">
                <label for="crname">Name</label>
                <input type="text" class="form-control" id="crname" name="crname"  placeholder="Enter name">
              </div>
              <div class="col form-group">
                <label for="crcontact">Contact Number</label>
                <input type="text" class="form-control" id="crcontact" name="crcontact"  placeholder="ex: 09876543212">
              </div>
            </div>
            
            <div class="row">
              <div class="col form-group">
                <label for="crcname">Company Name</label>
                <input type="text" class="form-control" id="crcname" name="crcname"  placeholder="Enter name">
              </div>
              <div class="col form-group">
                <label for="crposi">Position</label>
                <input type="text" class="form-control" id="crposi" name="crposi"  placeholder="Enter position">
              </div>
            </div> <br>
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