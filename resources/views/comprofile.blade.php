@extends('layouts.nofooter')

@section('content')

    <body class="img js-fullheight" style="background-image: url(assets/images/bg.jpg);">
        <section class="ftco-section">
            <form action="/updateAll" method="get">
                @csrf
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-sm-6 col-md-11">
                            <div class="w3 card w3-white" style="opacity:90">
                                <div class="card-header" style="text-align:center; ">
                                    <h2>Registration</h2>
                                    <h6>Local Employer</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12 form-group">
                                            <label for="rep">Representative:</label> <br>
                                            <label for="rep">First name:</label>
                                            <input type="text" placeholder="Fist name" id="fname" name="fname" value="{{$name[0]->firstname}}">
                                            <label for="rep">Middle name:</label> &emsp;
                                            <input type="text" placeholder="Middle name" id="mname" name="mname" value="{{$name[0]->middlename}}">
                                            <label for="rep">Last name:</label>&emsp;
                                            <input type="text" placeholder="Last name" id="lname" name="lname" value="{{$name[0]->lastname}}">
                                        </div>
                                    </div><br>
                                    
                                    <div class="row">
                                        <div class="col form-group">
                                            <label for="cname">Company Name:</label>
                                            <input type="text" size="20;" id="cname" name="cname" value="{{$show[0]->cname}}">
                                        </div>
                                        <div class="col form-group">
                                        <label for="email"> Email Address:</label>
                                            <input type="email" size="30;" id="email" name="email" value="{{$show[0]->email}}"><br>
                                        </div>
                                        <div class="col form-group">
                                            <label for="contact">Contact Number:</label>
                                            <input type="text" size="30;" id="contact" name="contact" value="{{$show[0]->contact}}"><br>
                                        </div>
                                        <div class="col form-group">
                                        <label for="pass"> Password:</label>
                                            <input type="password" size="20;" id="pass" name="pass" value="1111">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                        @csrf
                                        <div class="row mb-0">
                                            <div class="col-md-6 offset-md-5">
                                                <input class="btn btn-primary" type="submit" value="Update">
                                            </div>
                                        </div>
                                </div>
            </form>
                                <div style="text-align:center;">
                                    <div class="btn-group dropdown">
                                        <h4 style="text-align:center">List of Requirements: &emsp;</h4>
                                        <button class="dropdown-toggle" type="button" style="border:none; color:none;" 
                                                id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                            Show
                                        </button>
                                        <input type="hidden" id="type" name="type" value="{{$show[0]->type}}">
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" id="requirementsDropdown">
                                            <li class="dropdown-item">Company Profile</li>
                                            <li class="dropdown-item">Business Permit</li>
                                            <li class="dropdown-item">Mayor's Permit</li>
                                            <li class="dropdown-item">Barangay Clearance</li>
                                            <li class="dropdown-item">NBI Clearance</li>
                                            <li class="dropdown-item">Philjob.net accreditation</li>
                                            <li class="dropdown-item">(for OS)Certificate of no objection-file</li>
                                            <li class="dropdown-item">(for OS)DMW SRA Permit File</li>
                                        </ul>
                                    </div>
                                </div>
                                <h8 style="text-align:center;">(Upload in order)</h8>
                                <form method="POST" action="/uploadReqs" enctype="multipart/form-data">
                                        @csrf
                                    <div class="container" style="text-align: center;"><br>
                                        <input type="file" name="file" required>
                                        <input type="hidden" id="userid" name="userid" value="{{ Auth::user()->id }}"> 
                                        <button type="submit">Upload</button>
                                    </div>
                                        
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
                                                        <td>{{$file->filename}}</td>
                                                        <td>{{$file->original_name}}</td>
                                                        <td>{{$file->created_at}}</td>
                                                        <td>{{$file->updated_at}}</td>
                                                        <td>
                                                            <span class="input-group" >
                                                                <button type="button" class="btn btn-danger" style="border-radius: 4px;" data-toggle="modal" data-target="#delmod1{{ $file->id }}">
                                                                    Delete
                                                                </button>

                                                                <!-- DELETE Modal -->
                                                                <div class="modal fade" id="delmod1{{ $file->id }}"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog modal-lg">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="exampleModalLabel"><i class="bi bi-x-octagon-fill text-danger"></i> DELETE RECORD ID: {{ $file->id }}</h5>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                            </div>

                                                                            <div class="modal-body">
                                                                                Do you really want to delete this record: {{ $file->filename}}?
                                                                            </div>

                                                                            <div class="modal-footer">
                                                                                <form action="/deleteReq" method="get">
                                                                                    @csrf
                                                                                    <input type="hidden" id="delId" name="delId" value="{{ $file->id }}">
                                                                                    <button type="submit" class="btn btn-danger">Yes</button>
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
                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-5">
                                    <a  class="btn btn-primary"  href="homeEmp" value="Back">Back</a>
                                    </div> 
                                </div><br>
                            </div>
                        </div>
                    </div>
                </div>
        
        </section>
    </body>
    <script>
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
