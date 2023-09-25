@extends('layouts.addefault')

@section('maincontent')       
        
        <form action ="/updateWorks" method="GET" enctype="multipart/form-data">
            @csrf
          <div class="form-group">
            <label for="workID"></label>
            <input type="hidden" class="form-control" id="workID" name="workID"  placeholder="Enter Name">
          </div>
          <div class="form-group">
            <label for="id"></label>
            <input type="hidden" class="form-control" id="id" name="id" >
          </div>
          <div class="form-group">
         <p><h4>&nbsp; Work Details</h4></p>
         <div class="container">      
            <div class="row">
               <div class="col-2">
                  <label for="date">Date</label>
                  <input type="date" class="form-control" id="date" name="date" >
               </div>
               <div class="col-4">
                  <label for="company">Company</label>
                  <input type="text" class="form-control" id="company" name="company" >
               </div>
            
               <div class="col">
                     <label for="contact">Contact Number</label>
                     <input type="text" class="form-control" id="contact" name="contact">
                  </div>
               <div class="col">
                  <label for="jobdesc">Job Description</label>
                  <input type="text" class="form-control" id="jobdesc" name="jobdesc" >
               </div>
            </div> <br>
            <div class="row">
               <div class="col-4 form-group">
                  <label for="skills">Skills</label>
                  <input type="hidden" size="30" id="skills" name="skills">
                  <div class="col">
                     <input type="checkbox" id="hardworking" name="hardworking">
                     <label for="hardworking">Hardworking</label> <br>
                     <input type="checkbox" id="risk" name="risk">
                     <label for="risk">Risk taker</label> <br>
                     <input type="checkbox" id="probsol" name="probsol">
                     <label for="probsol">Problem Solving</label> <br>
                     <input type="checkbox" id="creative" name="creative">
                     <label for="creative">Creative</label> <br>
                     <input type="checkbox" id="multitask" name="multitask">
                     <label for="multitask">Multitasking</label> <br>
                     <input type="checkbox" id="technical" name="technical">
                     <label for="technical">Technicality</label> <br>
                     <input type="checkbox" id="leadership" name="leadership">
                     <label for="leadership">Leadership Skills</label> <br>
                     <input type="checkbox" id="analytics" name="analytics">
                     <label for="analytics">Analytical Skills</label> <br>
                  </div>
               </div>
               <div class="col form-group">
                  <label for="req">Requirements</label>
                  <input type="hidden" size="30" id="req" name="req" >
                  <div class="col">
                     <input type="checkbox" id="resume" name="resume">
                     <label for="resume">Resume</label> <br>
                     <input type="checkbox" id="visa" name="visa">
                     <label for="visa">Visa</label> <br>
                     <input type="checkbox" id="indigency" name="indigency">
                     <label for="indigency">Certificate of Indigency</label><br>
                     <input type="checkbox" id="psa" name="psa">
                     <label for="psa">PSA</label> <br>
                     
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-5">&nbsp;</div>
               <div class="col">
                  <button type="submit" style="background-color:#5F9EA0; border:none; border-radius: 4px;" value="Submit">Submit</button>
               </div>
               <div class="col">&nbsp;</div>
            </div>
         </div>
      </div>
    
    <script>
        function myFunction() {
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
       varskills=document.getElementById("skills").value;
       askills=varskills.split(",");
       for (let i = 0; i < askills.length; i++) {
         if(askills[i]!="")
         {
            document.getElementById(askills[i]).checked=true;
         }
       }
      varReq=document.getElementById("req").value;
      aReqs=varReq.split(",");
      for (let x = 0; x < aReqs.length; x++) {
         if(aReqs[x]!="")
         {
            document.getElementById(aReqs[x]).checked=true;
         }
       }
    </script>
@endsection