@extends('layouts.default')
@section('content')
        @if(session('message'))
          <div class="alert alert-danger" style="width:400px;">
              {{ session('message') }}
          </div>
        @endif
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
                    </select>
                </div>
                
                <div class="col-2 form-group">
                    <label for="mun">Municipality</label>
                    <select class="form-control" name="mun" id="mun"  onchange="loadDoc()"
                        placeholder="Enter Address">
                        <option >{{ $pdata[0]->mun}}</option>
                        <option style="text-align:center">--select--</option>
                        <option value="puerto">Puerto Galera</option>
                        <option value="san teodoro">San Teodoro</option>
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
                <div class="col form-group" id="brgy" name="brgy">
                    <label for="barangay">Barangay</label>
                    <select class="form-control" name="barangay" id="barangay" 
                        placeholder="Enter Address"  >
                        <option value="{{ $pdata[0]->barangay}}">{{ $pdata[0]->barangay}}</option>
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
                    placeholder="A3254543" value="{{ $pdata[0]->passnum}}">
                </div>
            </div> 
            <div class="row">
                <div class="col-3 form-group">
                    <label for="birthday">Date of Birth</label>
                    <input type="date" class="form-control" id="birthday" name="birthday"  
                    placeholder="" onchange="setage()" value="{{ $pdata[0]->birthday}}">
                </div>
                <div class="col-1 form-group">
                    <label for="age">Age</label>
                    <input type="number" readonly class="form-control" id="age" name="age"  
                    placeholder="Enter Age" value="{{ $pdata[0]->age}}">
                </div>
                <div class="col-2 form-group">
                    <label for="height">Height (cm)</label>
                    <input type="number" class="form-control" id="height" name="height"  
                    placeholder="Enter Height" value="{{ $pdata[0]->height}}">
                </div>
                <div class="col-2 form-group">
                    <label for="weight">Weight (kg)</label>
                    <input type="number" class="form-control" id="weight" name="weight"  
                    placeholder="Enter Weight" value="{{ $pdata[0]->weight}}">
                </div>
                <div class="col-4 form-group">
                    <label for="fb">Facebook</label>
                    <input type="text" class="form-control" id="fb" name="fb" required
                    placeholder="Enter Facebook Account" value="{{ $pdata[0]->fb}}">
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
                    <select class="form-control" name="yGraduated" id="yGraduated"
                    value="{{ $pdata[0]->yGraduated}}">

                        <option value="{{ $pdata[0]->yGraduated}}">{{ $pdata[0]->yGraduated}}</option>
                        <option value="n/a">N/A</option>
                        <option value="2023">2023</option>
                        <option value="2022">2022</option>
                        <option value="2021">2021</option>
                        <option value="2020">2020</option>
                        <option value="2019">2019</option>
                        <option value="2018">2018</option>
                        <option value="2017">2017</option>
                        <option value="2016">2016</option>
                        <option value="2015">2015</option>
                        <option value="2014">2014</option>
                        <option value="2013">2013</option>
                        <option value="2012">2012</option>
                        <option value="2011">2011</option>
                        <option value="2010">2010</option>
                        <option value="2009">2009</option>
                        <option value="2008">2008</option>
                        <option value="2007">2007</option>
                        <option value="2006">2006</option>
                        <option value="2005">2005</option>
                        <option value="2004">2004</option>
                        <option value="2003">2003</option>
                        <option value="2002">2002</option>
                        <option value="2001">2001</option>
                        <option value="2000">2000</option>
                        <option value="1999">1999</option>
                        <option value="1998">1998</option>
                        <option value="1997">1997</option>
                        <option value="1996">1996</option>
                        <option value="1994">1995</option>
                        <option value="1994">1994</option>
                        <option value="1993">1993</option>
                        <option value="1992">1992</option>
                        <option value="1991">1991</option>
                        <option value="2023">1990</option>
                        <option value="2022">1989</option>
                        <option value="2021">1988</option>
                        <option value="2020">1987</option>
                        <option value="2019">1986</option>
                        <option value="2018">1985</option>
                        <option value="2017">1984</option>
                        <option value="2016">1983</option>
                        <option value="2015">1982</option>
                        <option value="2014">1981</option>
                        <option value="2013">1980</option>
                        <option value="2012">1979</option>
                        <option value="2011">1978</option>
                        <option value="2010">1977</option>
                        <option value="2009">1976</option>
                        <option value="2008">1975</option>
                        <option value="2007">1974</option>
                        <option value="2006">1973</option>
                        <option value="2005">1972</option>
                        <option value="2004">1971</option>
                        <option value="2003">1970</option>
                        <option value="2002">1969</option>
                        <option value="2001">1968</option>
                        <option value="2000">1967</option>
                        <option value="1999">1966</option>
                        <option value="1998">1965</option>
                        <option value="1997">1964</option>
                        <option value="1996">1963</option>
                    </select>
                </div>
                <div class="col">
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
                    placeholder="Lastname, Firstname, Middlename" value="{{ $pdata[0]->guardian}}">
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
            <!-- <h4><b>Characer Reference</b></h4> -->
            <div class="row">
                <div class="col-4 form-group">
                    <label for="crname">Character Reference</label>
                    <input type="text" class="form-control" id="crname" name="crname" placeholder="Enter name"
                     value="{{ $pdata[0]->crname}}">
                </div>
                <div class="col-3 form-group">
                    <label for="crcontact">Contact Number</label>
                    <input type="text" class="form-control" id="crcontact" name="crcontact" 
                    placeholder="ex. 09123456789" value="{{ $pdata[0]->crcontact}}">
                </div>
                <div class="col-2 form-group " >
                    <label for="ip">Indigenous People?</label>
                    <select class="form-control" name="ip" id="ip" 
                    onclick="ipFunction()" value="{{ $pdata[0]->ip}}">
                        <option value="no">No</option>
                        <option value="yes">Yes</option>
                    </select>
                </div>
                <div class="col-3 form-group" id="hideIP" style="display: none;">
                    <label for="tribe">Tribe</label>
                    <input type="text" class="form-control" id="tribe" name="tribe" value="{{ $pdata[0]->tribe}}">
                </div>
            </div>
            <!-- <div class="row">    
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
            </div> <br> -->
            <br> <br>
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
            </div> <br> <br>
            
            <p>Displace Details</p> 
            <div class="row">
                <div class="col-3 form-group">
                    <label for="DuetoCovid">Job Displacement Due to COVID-19:</label>
                    <select name="DuetoCovid" id="DuetoCovid" class="form-control" value="{{ $pdata[0]->DuetoCovid}}">
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-2 form-group">
                    <label for="since">Since</label>
                    <select name="since" id="since" class="form-control" value="{{ $pdata[0]->since}}">
                        <option value="n/a">N/A</option>
                        <option value="2020">2020</option>
                        <option value="2021">2021</option>
                        <option value="2022">2022</option>
                        <option value="2023">2023</option>
                    </select>
                </div>
                <div class="col-4 form-group">
                    <label for="DOArrival">Date of Arrival in the Philippines</label>
                    <input type="date" class="form-control" id="DOArrival" name="DOArrival" value="{{ $pdata[0]->DOArrival}}">
                </div>
                <div class="col form-group">
                    <label for="TypeofD">Type of Displacement</label>
                    <select name="TypeofD" id="TypeofD" class="form-control" onclick="othersFunction()" value="{{ $pdata[0]->TypeofD}}">
                        <option value="na">N/A</option>
                        <option value="terminated">Terminated</option>
                        <option value="repatriated">Repatriated</option>
                        <option value="comShutdown">Company Shutdown</option>
                        <option value="noworkpay">No work, No pay</option>
                        <option value="others">Others (please specify)</option>
                    </select>
                </div>
                <div class="col form-group " id="showOthers" style="display: none;">
                    <label for="otherType">Others</label>
                    <input type="text" class="form-control" id="otherType" name="otherType" value="{{ $pdata[0]->otherType}}">
                </div>
            </div>
            <div class="row">
                <div class="col form-group">
                    <label for="fAssistance">Are you still receiving your salary/financial assistance from your employer?</label>
                    <select name="fAssistance" id="fAssistance" class="form-control" value="{{ $pdata[0]->fAssistance}}">
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </div>
                <div class="col form-group">
                    <label for="typeofA">Type of Assistance Received</label>
                    <input type="text" id="typeofA" name="typeofA" class="form-control" value="{{ $pdata[0]->typeofA}}">
                </div>
            </div>
            <div class="row">
                <div class="col form-group">
                    <label for="eligibility">Are you still eligible to apply/receive financial support/assistance such as unemployment
                        benefit, special assistance/ayuda for domestic workers, temporary work suspension benefits, etc from the
                        government?
                    </label>
                    <select name="eligibility" id="eligibility" class="form-control" value="{{ $pdata[0]->eligibility}}">
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </div>
                <div class="col-2 form-group">
                    <label for="dateReceived"><br>Date Received</label>
                    <input type="date" id="dateReceived" name="dateReceived" class="form-control" value="{{ $pdata[0]->dateReceived}}">
                </div>
            </div>

            <br> <br>
            <div class="row form-inline">
                <div class="col-11">
                    <p>Work Experience</p>
                </div>
                <div class="col-1">
                    <label class="form-group" for="hire"><br>Hired</label>
                    <select class="form-control" name="hire" id="hire">
                        <option value="no">No</option>
                        <option value="yes">Yes</option>
                    </select>
                </div>
                    
               
            </div>
             
                
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
  
        <form method="POST" action="/uploadfile" enctype="multipart/form-data">
            @csrf
            <input type="file" name="file" required>
            <input type="hidden" id="userid" name="userid" value="{{ Auth::user()->id }}"> 
            &emsp; &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;
            <button type="submit">Upload</button>
        </form> <br>
            <div class="card-body">
                <div class="container table-container">
                
                    <table class="table" style="text-align:center;">
                        <thead>
                            <tr>
                                <th scope="col">File Name</th>
                                <th scope="col">Original Name</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Updated At</th>            
                                <th scope="col">Action</th>            
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($files as $file)
                            <tr>
                                <td>{{ $file->filename }}</td>
                                <td>{{ $file->original_name}}</td>
                                <td>{{ $file->created_at }}</td>
                                <td>{{ $file->updated_at}}</td>
                                <td>
                                        
                                    <span class="input-group">
                                        <button type="button" class="btn btn-danger" style="border-radius: 4px;" data-toggle="modal" data-target="#delmod1{{ $file->id }}">
                                        Delete
                                        </button>
                                        
                                        <!-- DELETE Modal -->
                                        <div class="modal fade" id="delmod1{{ $file->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">   
                                                
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel"><i class="bi bi-x-octagon-fill text-danger"></i> DELETE RECORD ID: {{ $file->id }} </h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    </div>
                                                    
                                                    <div class="modal-body">
                                                        Do you really want to delete this record: {{ $file->filename}}?
                                                    </div>
                                                    
                                                    <div class="modal-footer">
                                                        <form action ="/deleteR" method="get" >
                                                            @csrf
                                                            <input type="hidden" id="delRes" name="delRes" value="{{ $file->id }}">
                                                            <button type="submit" class="btn btn-danger" onclick="javascript:$('#delmod1{{ $file->id }}').modal('hide');" >Yes</button>
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
                    </table>
                </div>
            </div>
        </div>
<script>
    function loadDoc() {
        txtmun=document.getElementById("mun").value;
        // alert(txtmun);
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
            document.getElementById("brgy").innerHTML =
            this.responseText;
            }
        };
        xhttp.open("GET", "/getbarangay/" +txtmun, true);
        xhttp.send();
    }

    function setage() {
        dob = new Date(document.getElementById("birthday").value);
        var month_diff = Date.now() - dob.getTime();
        var age_dt = new Date(month_diff);
        var year = age_dt.getUTCFullYear();
        var age = Math.abs(year - 1970);
        var ageInput = document.getElementById("age");

        if (age >= 18 && age <= 59) {
            // If the age is within the allowed range, set the value in the input field
            ageInput.value = age;
        } else {
            // If the age is not within the allowed range, clear the input field
            ageInput.value = "";
            alert("Sorry. Age must be between 18 and 59 years.");
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
    function ipFunction() {
    var status = document.getElementById("ip").value;
    var x = document.getElementById("hideIP");
    // alert(status);
    if (status === "yes") {
      x.style.display = "block";
    } else {
      x.style.display = "none";
      document.getElementById("tribe").value="";
    }
    }

    function othersFunction() {
    var status = document.getElementById("TypeofD").value;
    var x = document.getElementById("showOthers");
    // alert(status);
    if (status === "others") {
      x.style.display = "block";
    } else {
      x.style.display = "none";
      document.getElementById("otherType").value="";
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