@extends('layouts.default')
@section('content')
    
    <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Profile</h2>
          <p>Personal Data</p>
        
        <form action="insertProfile" method="get">
        
            <input type="hidden" id="userid" name="userid" >

            <div class="row">
                <div class="col-7 form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
                    <small id="name" class="form-text text-muted">Last name, First name, Middle name</small>
                </div>
                <div class="col-1 form-group">
                    <label for="suffix">Suffix</label>
                    <select class="form-control" name="suffix" id="suffix">
                        <option value="n/a">N/A</option>
                        <option value="sr">Jr.</option>
                        <option value="jr">Sr.</option>
                    </select>
                </div>
                <div class="col form-group">
                    <label for="gender">Gender</label>
                    <select class="form-control" name="gender" id="gender">
                        <option value="female">Female</option>
                        <option value="male">Male</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-6 form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" name="address"  placeholder="Enter Address" >
                </div>
                <div class="col form-group">
                    <label for="contactnum">Contact Number</label>
                    <input type="text" class="form-control" id="contactnum" name="contactnum"  placeholder="ex. 09123456789">
                </div>
                <div class="col form-group">
                    <label for="telnum">Telephone Number</label>
                    <input type="text" class="form-control" id="telnum" name="telnum"  placeholder="ex. 288-1111">
                </div>
            </div>
            <div class="row">
                <div class="col-4 orm-group">
                    <label for="emailadd">Email address</label>
                    <input type="email" class="form-control" id="emailadd" name="emailadd"  placeholder="ex. abc@gmail.com">
                </div> 
                <div class="col-5 form-group">
                    <label for="birthplace">Place of Birth</label>
                    <input type="text" class="form-control" id="birthplace" name="birthplace"  placeholder="Enter place of birth">
                </div>
                <div class="col-3 from group">
                    <label for ="passnum">Passport Number</label>
                    <input type="text" class="form-control" id="passnum" name="passnum" placeholder="13254543">
                </div>
            </div> 
            <div class="row">
                <div class="col form-group">
                    <label for="birthday">Date of Birth</label>
                    <input type="date" class="form-control" id="birthday" name="birthday"  placeholder="" onchange="setage()">
                </div>
                <div class="col form-group">
                    <label for="age">Age</label>
                    <input type="number" readonly class="form-control" id="age" name="age"  placeholder="Enter Age">
                </div>
                <div class="col form-group">
                    <label for="height">Height (cm)</label>
                    <input type="text" class="form-control" id="height" name="height"  placeholder="Enter Height">
                </div>
                <div class="col form-group">
                    <label for="weight">Weight (kg)</label>
                    <input type="text" class="form-control" id="weight" name="weight"  placeholder="Enter Weight">
                </div>
            </div>
            <div class="row">  
                <div class="col-2 form-group">
                    <label for="bloodtype">Bloodtype</label>
                    <select class="form-control" name="bloodtype" id="bloodtype">
                        <option value="N/A">Not Applicable</option>
                        <option value="O+">O positive</option>
                        <option value="O-">O negative</option>
                        <option value="A+">A positive</option>
                        <option value="A-">A negative</option>
                        <option value="B+">B positive</option>
                        <option value="B-">B negative</option>
                        <option value="AB+">AB positive</option>
                        <option value="AB-">AB negative</option>
                    </select>
                </div>
                <div class="col form-group">
                    <label for="yGraduated">Year Graduated</label>
                    <select class="form-control" name="yGraduated" id="yGraduated" onclick="myFunction()">
                        <option value="n/a">N/A</option>
                        <option value="year">2022</option>
                        <option value="year">2021</option>
                        <option value="year">2020</option>
                        <option value="year">2019</option>
                        <option value="year">2018</option>
                        <option value="year">2017</option>
                        <option value="year">2016</option>
                        <option value="year">2015</option>
                        <option value="year">2014</option>
                        <option value="year">2013</option>
                    </select>
                </div>
                <div class="col" id="hideschool" style="display: none;">
                    <label for="school">School</label>
                    <input type="text" class="form-control" id="school" name="school" >
                </div>
                <div class="col form-group">
                    <label for="work">Work</label>
                    <select class="form-control" name="work" id="work" onclick="workFunction()">
                        <option value="n/a">N/A</option>
                        <option value="yes">Yes</option>
                        <option value="nyet">Not Yet</option>
                    </select>
                </div>
                <div class="col" id="hidecompany" style="display: none;">
                    <label for="cname">Company Name</label>
                    <input type="text" class="form-control" id="cname" name="cname" >
                </div>
            </div>
            <div class="row"> 
                <div class="col-4 form-group">
                    <label for="guardian">Name of Guardian</label>
                    <input type="text" class="form-control" id="guardian" name="guardian"  placeholder="Enter name of Guardian">
                    <small id="guardian" class="form-text text-muted">Last name, First name, Middle name</small>
                </div>
                <div class="col-2 form-group">
                    <label for="relationship">Relation to Applicant</label>
                    <select class="form-control" name="relationship" id="relationship">
                        <option value="daughter">Daughter</option>
                        <option value="son">Son</option>
                        <option value="niece">Niece</option>
                        <option value="nephew">Nephew</option>
                        <option value="sister">Sister</option>
                        <option value="brother">Brother</option>
                    </select>
                </div>
                <div class="col form-group">
                    <label for="cstatus">Civil Status</label>
                        <select class="form-control" name="cstatus" id="cstatus" onclick="myspouseFunction()">
                        <option value="single">Single</option>
                        <option value="married">Married</option>
                        <option value="widowed">Widowed</option>
                        <option value="separated">Separated</option>
                        </select>
                </div>
                <div class="col" id="hidespouse" style="display: none;">
                    <label for="spouse">Spouse</label>
                    <input type="text" class="form-control" id="spouse" name="spouse" >
                </div>
            </div> 
            <div class="row">    
                <div class="col form-group">
                    <label for="language">Language:</label>
                    <div class="col">
                        <input type="checkbox" id="tagalog" name="tagalog">
                        <label for="tagalog">Tagalog</label>
                        <input type="checkbox" id="english" name="english">
                        <label for="english">English</label>
                        <input type="checkbox" id="chinese" name="chinese">
                        <label for="chinese">Mandarin</label>
                        <input type="checkbox" id="japanese" name="japanese">
                        <label for="japanese">Japanese</label>
                        <input type="checkbox" id="korea" name="korea">
                        <label for="chinese">Hangul</label>
                    </div>
                </div>
            </div> <br>

          <p>Educational Background</p>
            <div class="row">
                <div class="col form-group">
                <label for="elem">Elementary</label>
                <input type="text" class="form-control" id="elem" name="elem"  placeholder="Enter School">
                </div>
                <div class="col form-group">
                <label for="hs">High School</label>
                <input type="text" class="form-control" id="hs" name="hs"  placeholder="Enter School">
                </div>
                <div class="col form-group">
                <label for="college">College</label>
                <input type="text" class="form-control" id="college" name="college"  placeholder="Enter School">
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <label for="degree">All Degree Received</label>
                    <input type="text" class="form-control" id="degree" name="degree"  placeholder="Enter degree, achievements, etc.">
                </div>
            </div> <br>
                <!-- <p>Work Experience</p>
            
            <div class="container" id="myTable">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Company Name</th>
                                <th>Position</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Dunkin' Donuts</td>
                                <td>Cook</td>
                            </tr>
                            <tr>
                                <td>Dunkin' Donuts</td>
                                <td>Cook</td>
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
            </div> <br> -->
            <div class="row">
                <div class="col-5">&nbsp;</div>
                <div class="col"><button type="submit" class="btn btn-outline-dark">Submit</button></div>
                <div class="col">&nbsp;</div>
            </div>
        <!-- <div> -->
        </form>
    </div>
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
    function mytableFunction() 
    {
        var table = document.getElementById("myTable");
        var row = table.insertRow(0);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        cell1.innerHTML = "";
        cell2.innerHTML = "";
    }
</script>
@endsection