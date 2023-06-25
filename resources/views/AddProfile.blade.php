@extends('layouts.default')
@section('content')
    
    <div class="container" data-aos="fade-up">
        <div class="section-title"><br>
          <h2>Profile</h2>
          <p>Personal Data</p>
        
        <form action="insertProfile" method="get">
        
            <input type="hidden" id="userid" name="userid" value="{{ Auth::user()->id }}">

            <div class="row">
                <div class="col-7 form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" readonly id="name" name="name" value="{{ Auth::user()->name }}">
                
                </div>
                <div class="col-1 form-group">
                    <label for="suffix">Suffix</label>
                    <select class="form-control" name="suffix" id="suffix" value="{{ $pdata[0]->suffix}}">
                        <option value="n/a">N/A</option>
                        <option value="sr">Jr.</option>
                        <option value="jr">Sr.</option>
                    </select>
                </div>
                <div class="col form-group">
                    <label for="gender">Gender</label>
                    <select class="form-control" name="gender" id="gender" value="{{ $pdata[0]->gender}}">
                        <option value="female">Female</option>
                        <option value="male">Male</option>
                    </select>
                </div>
                <div class="col form-group">
                    <label for="contactnum">Contact Number</label>
                    <input type="number" required class="form-control" id="contactnum" name="contactnum"  
                    placeholder="ex. 09123456789" onkeypress="checkContact()" value="{{ $pdata[0]->contactnum}}">
                </div>
            </div>
            <div class="row">
                <div class="col-2 form-group">
                    <label for="region">Region</label>
                    <select class="form-control" name="region" id="region" 
                        placeholder="Enter Address"  >>
                        <option value="mimaropa">IV-B MIMAROPA</option>
                    </select>
                </div>
                <div class="col-2 form-group">
                    <label for="province">Province</label>
                    <select class="form-control" name="province" id="province" 
                        placeholder="Enter Address" >>
                        <option value="ormin">Oriental Mindoro</option>
                        <option value="ormin">Occidental Mindoro</option>
                    </select>
                </div>
                <div class="col-2 form-group">
                    <label for="mun">Municipality</label>
                    <select class="form-control" name="mun" id="mun" 
                        placeholder="Enter Address" value="#" >
                        <option value="puerto">Puerto Galera</option>
                        <option value="san teordoro">San Teodoro</option>
                        <option value="baco">Baco</option>
                        <option value="calapan">Calapan</option>
                        <option value="naujan">Naujan</option>
                        <option value="victoria">Victoria</option>
                        <option value="pola">Pola</option>
                        <option value="socorro">Socorro</option>
                        <option value="pinamalayan">Pinamalayan</option>
                        <option value="gloria">Gloria</option>
                        <option value="bansud">Bansud</option>
                        <option value="bongabong">Bongabong</option>
                        <option value="roxas">Roxas</option>
                        <option value="mansalay">Mansalay</option>
                        <option value="bulalacao">Bulalacao</option>
                        
                    </select>
                </div>
                <div class="col form-group">
                    <label for="barangay">Barangay</label>
                    <select class="form-control" name="barangay" id="barangay" 
                        placeholder="Enter Address"  >>
                        <option value="mimaropa">IV-B MIMAROPA</option>
                    </select>
                </div>
                <div class="col form-group">
                    <label for="sitio">Sitio</label>
                    <input type="text" class="form-control" id="sitio" name="sitio"
                    placeholder="Enter Sitio" value="{{ $pdata[0]->sitio}}">
                </div>
               
            </div>
            <div class="row">
                <div class="col-4 orm-group">
                    <label for="emailadd">Email address</label>
                    <input type="email" class="form-control" id="emailadd" name="emailadd"  
                    placeholder="ex. abc@gmail.com" value="{{ $pdata[0]->emailadd}}">
                </div> 
                <div class="col-4 form-group">
                    <label for="birthplace">Place of Birth</label>
                    <input type="text" class="form-control" id="birthplace" name="birthplace"  
                    placeholder="Enter place of birth" value="{{ $pdata[0]->pobirth}}">
                </div>
                <div class="col form-group">
                    <label for="telnum">Telephone Number</label>
                    <input type="text" class="form-control" id="telnum" name="telnum"  
                    placeholder="ex. 288-1111" value="{{ $pdata[0]->telenum}}">
                </div>
                <div class="col from group">
                    <label for ="passnum">Passport Number</label>
                    <input type="text" class="form-control" id="passnum" name="passnum" 
                    placeholder="13254543" value="{{ $pdata[0]->passnum}}">
                </div>
            </div> 
            <div class="row">
                <div class="col form-group">
                    <label for="birthday">Date of Birth</label>
                    <input type="date" class="form-control" id="birthday" name="birthday"  
                    placeholder="" onchange="setage()" value="{{ $pdata[0]->birthday}}">
                </div>
                <div class="col form-group">
                    <label for="age">Age</label>
                    <input type="number" readonly class="form-control" id="age" name="age"  
                    placeholder="Enter Age" value="{{ $pdata[0]->age}}">
                </div>
                <div class="col form-group">
                    <label for="height">Height (cm)</label>
                    <input type="number" class="form-control" id="height" name="height"  
                    placeholder="Enter Height" value="{{ $pdata[0]->height}}">
                </div>
                <div class="col form-group">
                    <label for="weight">Weight (kg)</label>
                    <input type="number" class="form-control" id="weight" name="weight"  
                    placeholder="Enter Weight" value="{{ $pdata[0]->weight}}">
                </div>
            </div>
            <div class="row">  
                <div class="col-2 form-group">
                    <label for="bloodtype">Bloodtype</label>
                    <select class="form-control" name="bloodtype" id="bloodtype" value="{{ $pdata[0]->bloodtype}}">
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
                    <select class="form-control" name="yGraduated" id="yGraduated" onclick="myFunction()" 
                    value="{{ $pdata[0]->yGraduated}}">

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
                        <option value="year">2012</option>
                        <option value="year">2011</option>
                        <option value="year">2010</option>
                        <option value="year">2009</option>
                        <option value="year">2008</option>
                        <option value="year">2007</option>
                        <option value="year">2006</option>
                        <option value="year">2005</option>
                        <option value="year">2004</option>
                        <option value="year">2003</option>
                        <option value="year">2002</option>
                        <option value="year">2001</option>
                        <option value="year">2000</option>
                        <option value="year">1999</option>
                    </select>
                </div>
                <div class="col" id="hideschool" style="display: none;">
                    <label for="school">School</label>
                    <input type="text" class="form-control" id="school" name="school" value="{{ $pdata[0]->school}}">
                </div>
                <div class="col form-group">
                    <label for="work">Work</label>
                    <select class="form-control" name="work" id="work" onclick="workFunction()" value="{{ $pdata[0]->work}}">
                        <option value="n/a">N/A</option>
                        <option value="yes">Yes</option>
                        <option value="nyet">Not Yet</option>
                    </select>
                </div>
                <div class="col" id="hidecompany" style="display: none;">
                    <label for="cname">Company Name</label>
                    <input type="text" class="form-control" id="cname" name="cname" value="{{ $pdata[0]->cname}}">
                </div>
            </div>
            <div class="row"> 
                <div class="col-4 form-group">
                    <label for="guardian">Name of Guardian</label>
                    <input type="text" class="form-control" id="guardian" name="guardian"  
                    placeholder="Enter name of Guardian" value="{{ $pdata[0]->guardian}}">
                    <small id="guardian" class="form-text text-muted">Last name, First name, Middle name</small>
                </div>
                <div class="col-2 form-group">
                    <label for="relationship">Relation to Applicant</label>
                    <select class="form-control" name="relationship" id="relationship" value="{{ $pdata[0]->relation}}">
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
                        <select class="form-control" name="cstatus" id="cstatus" onclick="myspouseFunction()"
                        value="{{ $pdata[0]->cstatus}}">

                        <option value="single">Single</option>
                        <option value="married">Married</option>
                        <option value="widowed">Widowed</option>
                        <option value="separated">Separated</option>
                        </select>
                </div>
                <div class="col" id="hidespouse" style="display: none;">
                    <label for="spouse">Spouse</label>
                    <input type="text" class="form-control" id="spouse" name="spouse" value="{{ $pdata[0]->spouse}}">
                </div>
            </div> 
            <div class="row">    
                <div class="col form-group">
                    <label for="language">Language:</label>
                    <input type="hidden" id="language" name="language" value="{{ $pdata[0]->language}}">
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
                        <label for="korea">Hangul</label>
                    </div>
                </div>
            </div> <br>

          <p>Educational Background</p>
            <div class="row">
                <div class="col form-group">
                <label for="elem">Elementary</label>
                <input type="text" class="form-control" id="elem" name="elem"  
                placeholder="Enter School" value="{{ $pdata[0]->elem}}">
                </div>
                <div class="col form-group">
                <label for="hs">High School</label>
                <input type="text" class="form-control" id="hs" name="hs"  
                placeholder="Enter School" value="{{ $pdata[0]->hs}}">
                </div>
                <div class="col form-group">
                <label for="college">College</label>
                <input type="text" class="form-control" id="college" name="college"  
                placeholder="Enter School" value="{{ $pdata[0]->college}}">
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <label for="degree">All Degree Received</label>
                    <input type="text" class="form-control" id="degree" name="degree"  
                    placeholder="Enter degree, achievements, etc." value="{{ $pdata[0]->degree}}">
                </div>
            </div> <br>

            <p>Work Experience</p> 
                <a class="btn btn-success" href="addWorkE">ADD </a>
                <div class="card-body">
                    <div class="container table-container">
                        <table class="table" style="text-align:center;">
                            <thead>
                            <tr>
                                <th scope="col">Company Name</th>
                                <th scope="col">Position</th>
                                <th scope="col">Character Reference</th>
                                <th scope="col">Contact</th>
                                <th scope="col">Cr Company</th>
                                <th scope="col">Cr Position</th>            
                                <th scope="col">Action</th>            
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($uwork as $wrk)
                                <tr>
                                    <td>{{ $wrk->cname }}</td>
                                    <td>{{ $wrk->position}}</td>
                                    <td>{{ $wrk->crname }}</td>
                                    <td>{{ $wrk->crcontact }}</td>
                                    <td>{{ $wrk->crcname }}</td>
                                    <td>{{ $wrk->crposi }}</td>
                                    <td>
                                        <span class="input-group">
                                            
                                        
                                            <button type="button" class="btn btn-danger" style="border-radius: 4px;" data-toggle="modal" data-target="#delmod1{{ $wrk->id }}">
                                            Delete
                                            </button>

                                            <!-- DELETE Modal -->
                                            <div class="modal fade" id="delmod1{{ $wrk->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">   
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel"><i class="bi bi-x-octagon-fill text-danger"></i> DELETE RECORD ID: {{ $wrk->id }} </h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Do you really want to delete this record: {{ $wrk->cname}}?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form action ="/deleteWorke" method="get" >
                                                                @csrf
                                                                <input type="hidden" id="delIdWRK" name="delIdWRK" value="{{ $wrk->id }}">
                                                                <button type="submit" class="btn btn-danger" onclick="javascript:$('#delmod1{{ $wrk->id }}').modal('hide');" >Yes</button>
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
                            @endforeach
                            </tbody>
                        </table> <br><br>
                        
                    </div>
                    
                </div>
                    
                    <?php
                        // echo Form::open(array('url' => '/uploadfile','files'=>'true'));
                        // echo 'Select the file to upload.';
                        // echo Form::file('image');
                        // echo Form::submit('Upload File');
                        // echo Form::close();
                    ?>

            <div class="row">
                <div class="col-5">&nbsp;</div>
                <div class="col"><button type="submit" class="btn btn-outline-dark">Submit</button></div>
                <div class="col">&nbsp;</div>
            </div>
            <!-- <div> -->
        </form>
        <p>Resume</p>
        <form action = '/uploadfile' method="get" files='true'>
            <h6>Select file to upload</h6>
        <input type="file" id="txtfile" name="txtfile">
        <button type="submit" name="submit" style="padding:3px;" class="btn btn-outline-dark">Upload File</button>
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
    function checkContact()
    {
        let text = document.getElementById("contactnum").value;
        let length = text.length;
        if (length>10){
            document.getElementById("contactnum").value=text.substr(0,10);
            alert("11 only")
        }
    }
</script>
@endsection