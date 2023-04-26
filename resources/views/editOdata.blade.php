@extends('layouts.addefault')

@section('maincontent') 
        <form action ="/updateofwD" method="get" enctype="multipart/form-data">
            @csrf
          <div class="form-group">
            <label for="userid"></label>
            <input type="hidden" class="form-control" id="userid" name="userid"  value={{$ofw[0]->userid}}>
          </div>
          <div class="form-group">
            <label for="ofwId"></label>
            <input type="hidden" class="form-control" id="ofwId" name="ofwId" value={{$ofw[0]->id}} >
          </div>
          <div class="row">
            <div class="col-3 form-group">
              <label for="lname">Lastname</label>
              <input type="text" class="form-control" id="lname" name="lname" value={{$ofw[0]->lastname}}>
            </div>
            <div class="col-3 form-group">
              <label for="fname">Firstname</label>
              <input type="text" class="form-control" id="fname" name="fname" value={{$ofw[0]->firstname}}>
            </div>
            <div class="col-3 form-group">
              <label for="mname">Middlename</label>
              <input type="text" class="form-control" id="mname" name="mname" value={{$ofw[0]->middlename}}>
            </div>
            <div class="col-1 form-group">
              <label for="suffix">Suffix</label>
              <select class="form-control" name="suffix" id="suffix" value={{$ofw[0]->suffix}}>
                <option value="n/a">N/A</option>
                <option value="sr">Jr.</option>
                <option value="jr">Sr.</option>
              </select>
            </div>
          </div>
          <div class ="row">
            <div class="col-3 form-group">
              <label for="birthday">Date of Birth</label>
              <input type="date" class="form-control" id="birthday" name="birthday"  
              placeholder="" onchange="setage()" value={{$ofw[0]->birthday}}>
            </div>
            <div class="col-2 form-group">
              <label for="age">Age</label>
              <input type="number" readonly class="form-control" id="age" name="age"  
              placeholder="Enter Age" value={{$ofw[0]->age}}>
            </div>
            <div class="col-2 form-group">
              <label for="sex">Sex</label>
              <select class="form-control" name="sex" id="sex" value={{$ofw[0]->sex}}>
                <option value="female">Female</option>
                <option value="male">Male</option>
              </select>
            </div>
            <div class="col-3 form-group">
              <label for="contactnum">Contact Number</label>
              <input type="number" class="form-control" id="contactnum" name="contactnum" 
              placeholder="ex. 09123456789" value={{$ofw[0]->contactnum}}>
            </div>
          </div>
          <div class="row">
            <div class="col-6 form-group">
            <label for="address">Address</label>
            <input type="text" class="form-control" id="address" name="address"  
            placeholder="Enter Address" value={{$ofw[0]->address}}>
            <small id="guardian" class="form-text text-muted">Sitio, Barangay, City/Municipality, Province</small>
          </div>
          <div class="col-3 from group">
              <label for ="passnum">Passport Number</label>
              <input type="text" class="form-control" id="passnum" name="passnum" 
              placeholder="13254543" value={{$ofw[0]->passnum}}>
            </div>
          <div class ="row">
            <div class=" col-5 form-group">
              <label for="emailadd">Email address</label>
              <input type="email" class="form-control" id="emailadd" name="emailadd"  
              placeholder="ex. abc@gmail.com" value={{$ofw[0]->emailadd}}>
            </div>
            <div class="col-5 form-group">
              <label for="fbacc">Facebook Account</label>
              <input type="facebook" class="form-control" id="fbacc" name="fbacc" value={{$ofw[0]->fbacc}}> <br>
          </div>
          <div class="row">
            <div class="col-5">&nbsp;</div>
            <div class="col"><button type="submit" class="btn btn-primary">Apply</button></div>
            <div class="col">&nbsp;</div>
          </div>
        </form>
    

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