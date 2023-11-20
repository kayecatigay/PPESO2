@extends('layouts.addefault')

@section('maincontent')       
        
        <form action ="/updateAnn" method="get" enctype="multipart/form-data">
            @csrf
          <div class="form-group">
            <label for="annID"></label>
            <input type="hidden" class="form-control" id="annID" name="annID"  placeholder="Enter Name">
          </div>
          <div class="form-group">
            <label for="id"></label>
            <input type="hidden" class="form-control" id="id" name="id" value="{{$ann[0]->id}}">
          </div>
          <p><h4>Announcements</h4></p>
          <div class="container">
            <div class="row">
              <div class="col form-group">
                <label for="dateFrom">Date From</label>
                <input type="date" class="form-control" id="dateFrom" name="dateFrom"  
                placeholder="Date" value="{{$ann[0]->dateFrom}}">
              </div>
              <div class="col form-group">
                <label for="dateTo">Date To</label>
                <input type="date" class="form-control" id="dateTo" name="dateTo"  
                placeholder="Date" value="{{$ann[0]->dateTo}}">
              </div>
              
            </div>
            <div class="row">
              <div class="col-3 form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{$ann[0]->title}}">
              </div>
              <div class="col form-group">
                <label for="body">Description</label>
                <textarea class="form-control" id="body" name="body">{{$ann[0]->body}}</textarea>
              </div>
            </div>
            <div class="row">
              <div class="col-5">&nbsp;</div>
              <div class="col">
                <input type="submit" class="btn btn-primary" value="Update" name="submit">
              </div>
              <div class="col">&nbsp;</div>
            </div>
          </div>  
        </form>

@endsection