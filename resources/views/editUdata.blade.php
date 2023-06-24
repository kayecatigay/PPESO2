@extends('layouts.addefault')

@section('maincontent')
    <form action ="/updateEuser" method="get" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
                <label for="SchId"></label>
                <input type="hidden" class="form-control" id="SchId" name="SchId"  placeholder="Enter Name">
            </div>
            <div class="form-group">
                <label for="id"></label>
                <input type="hidden" class="form-control" id="id" name="id" value="{{$usr[0]->id}}" >
            </div>
            <div class="row">
                <div class="col-6 form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" readonly id="name" name="name" value= "{{$usr[0]->name}}" >
                </div>
                <div class="col form-group">
                    <label for="roles">Role</label>
                    <select class="col form-control" name="roles" id="roles" value="{{$usr[0]->roles}}">
                        <option value="user">User</option>
                        <option value="sadmin">Scholar Admin</option>
                        <option value="eadmin">Employee Admin</option>
                        <option value="oadmin">OFW Admin</option>
                        <option value="employer">Employer</option>
                        <option value="supadmin">Super Admin</option>
                    </select>
                </div>
                 <div class="col form-group"> <br>
                    <input type="submit" class="btn btn-primary" value="Submit" name="submit">
                </div>
            </div>
@endsection