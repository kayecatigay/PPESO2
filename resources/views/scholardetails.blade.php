@extends('layouts.default')

@section('content')
  <!-- ======= Services Section ======= -->
  
  <section id="services" class="services">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Services</h2>
          <p>My Scholarship Application</p>
        </div>
        <form action="scholardata">
          
            <button type="submit" class="btn btn-primary">Apply Now!</button>

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
                  @foreach ($reg as $emp)
                    <tr>
                      <td>{{ $emp->appId }}</td>
                      <td>{{ $emp->date }}</td>
                      <td>{{ $emp->status }}</td>
                      <td>{{ $emp->posidesired }}</td>
                      <td>{{ $emp->cname }}</td>
                      <td>{{ $emp->crname }}</td>
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

          
        </form>
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