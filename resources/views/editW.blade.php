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
            <input type="hidden" class="form-control" id="id" name="id" value="{{$wrk[0]->id}}">
          </div>
          <div class="form-group">
         <p><h4>&nbsp; Work Details</h4></p>
         <div class="container">      
            <div class="row">
               <div class="col-2">
                  <label for="date">Date</label>
                  <input type="date" class="form-control" id="date" name="date" value="{{$wrk[0]->date}}">
               </div>
               <div class="col-4">
                  <label for="company">Company</label>
                  <input type="text" class="form-control" id="company" name="company" value="{{$wrk[0]->company}}">
               </div>
            
               <div class="col">
                     <label for="contact">Contact Number</label>
                     <input type="text" class="form-control" id="contact" name="contact" value="{{$wrk[0]->contact}}">
                  </div>
               <div class="col">
                  <label for="jobdesc">Job Description</label>
                  <input type="text" class="form-control" id="jobdesc" name="jobdesc" value="{{$wrk[0]->jobdesc}}">
               </div>
            </div> <br>
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