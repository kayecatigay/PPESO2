@extends('layouts.default')

@section('content')
  <!-- ======= Services Section ======= -->
  
  <section id="services" class="services">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Services</h2>
          <p>Scholarship Form</p>
        </div>
        <form action="scholardata">
          <div class="form-group">
            <label for="SchId"></label>
            <input type="hidden" class="form-control" id="SchId" name="SchId"  placeholder="Enter Name">
          </div>
          <div class="form-group">
            <label for="userid"></label>
            <input type="hidden" class="form-control" id="userid" name="userid" value="{{ Auth::user()->id }}" >
          </div>
          <div class="row">
            <div class="col">
              <label for="typeS">Scholar</label>
              <select class="form-control" name="typeS" id="typeS">
                <option value="new">New</option>
                <option value="old">Old</option>
              </select>
            </div>
            <div class="col-9">&nbsp;</div>
          </div> <br>

          <div class="row">
            <div class="col-5"><button type="submit" class="btn btn-primary">Apply</button></div>
            <div class="col">&nbsp;</div>
            <div class="col">&nbsp;</div>
          </div>
          
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