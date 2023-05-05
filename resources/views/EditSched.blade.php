@extends('layouts.addefault')

@section('maincontent')       
        
        <form action ="/updateSched" method="post" enctype="multipart/form-data">
            @csrf
          <div class="form-group">
            <label for="empID"></label>
            <input type="hidden" class="form-control" id="empID" name="empID"  placeholder="Enter Name">
          </div>
          <div class="form-group">
            <label for="id"></label>
            <input type="hidden" class="form-control" id="id" name="id" value="{{$sched[0]->id}}">
          </div>
          <p><h4>Schedule Data</h4></p>
          <div class="form-group">
            <label for="scholar">Name</label>
            <input type="text" class="form-control" id="scholar" name="scholar"  value={{$sched[0]->ScName}}>
          </div>
          <div class="row">
            <div class="col-8 form-group">
              <label for="posidesi">Position Desired</label>
              <input type="text" class="form-control" id="posidesi" name="posidesi"  
              placeholder="Enter Position Desired" value={{$eEMP[0]->posidesired}}>
            </div>
            <div class="col">
                <label for="type">Type</label>
                <select class="form-control" name="type" id="type" value={{$sched[0]->type}}>
                  <option value="exam">Exam</option>
                  <option value="int">Interview</option>
                </select>
            </div>
          </div>
          <div class="row">
            <div class="col-7 form-group">
              <label for="emailadd">Email address</label>
              <input type="email" class="form-control" id="emailadd" name="emailadd"  
              placeholder="ex. abc@gmail.com" value={{$eEMP[0]->emailadd}}>
            </div>
            <div class="col form-group">
              <label for="cellphone">Contact Number</label>
              <input type="text" class="form-control" id="cellphone" name="cellphone"  
              placeholder="ex. 09123456789" value={{$eEMP[0]->cellphone}}>
            </div>
            <div class="col form-group">
              <label for="telnum">Telephone Number</label>
              <input type="text" class="form-control" id="telnum" name="telnum"  
              placeholder="ex. 288-1111" value={{$eEMP[0]->telephone}}>
            </div>
          </div>
          <div class="row">
            <div class="col form-group">
              <label for="add"> Address</label>
              <input type="text" class="form-control" id="add" name="add"  
              placeholder="Sitio, Barangay, Bayan, Province" value={{$eEMP[0]->address}}>
            </div>
            <div class="col" >
              <label for="language">Language</label>
                <input type="text" class="form-control" id="language" name="language" value={{$eEMP[0]->language}}>
                <small id="language" class="form-text text-muted">Choose:
                  <input type="checkbox" id="tagalog" name="tagalog" >
                  <label for="tagalog">Tagalog</label>
                  <input type="checkbox" id="english" name="english">
                  <label for="english">English</label>
                  <input type="checkbox" id="chinese" name="chinese">
                  <label for="chinese">Chinese</label></small>
            </div>
          </div>
          <div class="row">
            <div class="col-5 form-group">
              <label for="birthday">Date of Birth</label>
              <input type="date" class="form-control" id="birthday" name="birthday"  
              placeholder="" value={{$eEMP[0]->birthday}}>
            </div>
            <div class="col form-group">
              <label for="height">Height</label>
              <input type="number" class="form-control" id="height" name="height"  
              placeholder="Enter Height" value={{$eEMP[0]->height}}>
            </div>
            <div class="col form-group">
              <label for="weight">Weight</label>
              <input type="number" class="form-control" id="weight" name="weight"  
              placeholder="Enter Weight" value={{$eEMP[0]->weight}}>
            </div>
          </div>
          <div class="row">
            <div class="col form-group">
              <label for="religion">Religion</label>
              <input type="text" class="form-control" id="religion" name="religion"  
              placeholder="Enter Religion" value={{$eEMP[0]->religion}}>
            </div>
            <div class="col form-group">
              <label for="cstatus">Civil Status</label>
                <select class="form-control" name="cstatus" id="cstatus" onclick="myFunction()" value={{$eEMP[0]->Cstatus}}>
                  <option value="single">Single</option>
                  <option value="married">Married</option>
                  <option value="widow">Widowed</option>
                  <option value="separated">Separated</option>
                </select>
            </div>
            <div class="col" id="hidespouse" style="display: none;">
              <label for="spouse">Spouse</label>
              <input type="text" class="form-control" id="spouse" name="spouse" value={{$eEMP[0]->spouse}}>
            </div>
          </div>
          <p><h4>Educational Background</h4></p>
            <div class="form-group">
              <label for="elem">Elementary</label>
              <input type="text" class="form-control" id="elem" name="elem"  
              placeholder="Enter School" value={{$eEMP[0]->elem}}>
            </div>
            <div class="form-group">
              <label for="hs">High School</label>
              <input type="text" class="form-control" id="hs" name="hs"  
              placeholder="Enter School" value={{$eEMP[0]->hschool}}>
            </div>
            <div class="form-group">
              <label for="college">College</label>
              <input type="text" class="form-control" id="college" name="college"  
              placeholder="Enter School" value={{$eEMP[0]->college}}>
            </div>
            <div class="form-group">
              <label for="degree">All Degree Received</label>
              <input type="text" class="form-control" id="degree" name="degree"  
              placeholder="Enter degree, achievements, etc." value={{$eEMP[0]->degree}}>
            </div>
          <p><h4>Employment Record</h4></p>
            <div class="form-group">
              <label for="cname">Company Name</label>
              <input type="text" class="form-control" id="cname" name="cname"  
              placeholder="Enter Company name" value={{$eEMP[0]->cname}}>
            </div>
            <div class="form-group">
              <label for="posi">Position</label>
              <input type="text" class="form-control" id="posi" name="posi"  
              placeholder="Enter Position" value={{$eEMP[0]->position}}>
            </div>
          <p><h4>Character Reference</h4></p>
            <div class="row"> 
              <div class="col form-group">
                <label for="crname">Name</label>
                <input type="text" class="form-control" id="crname" name="crname"  
                placeholder="Enter name" value={{$eEMP[0]->crname}}>
              </div>
              <div class="col form-group">
                <label for="crcontact">Contact Number</label>
                <input type="text" class="form-control" id="crcontact" name="crcontact"  
                placeholder="ex: 09876543212" value={{$eEMP[0]->crcontact}}>
              </div>
            </div>
            <div class="row">
              <div class="col form-group">
                <label for="crcname">Company Name</label>
                <input type="text" class="form-control" id="crcname" name="crcname"  
                placeholder="Enter name" value={{$eEMP[0]->crcompany}}>
              </div>
              <div class="col form-group">
                <label for="crposi">Position</label>
                <input type="text" class="form-control" id="crposi" name="crposi"  
                placeholder="Enter position" value={{$eEMP[0]->crposition}}>
              </div>
            </div> 
            <div class="row">
                <div class="col-5">&nbsp;</div>
                <div class="col">
                    <input type="submit" class="btn btn-primary" value="Submit" name="submit">
                </div>
                <div class="col">&nbsp;</div>
            </div>
        
        </form>
    
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
    </script>
@endsection