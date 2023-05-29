@extends('layouts.addefault')

@section('maincontent')
   <form action ="/insertAnn" method="get" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
         <label for="schedId"></label>
         <input type="hidden" class="form-control" id="schedId" name="schedId"  placeholder="Enter Name">
      </div>
      
      <div class="form-group">
         <p><h4>Annoucements</h4></p>
         <div class="container">      
          
            <div class="row">
               <div class="col">
                  <label for="dateFrom">Date From</label>
                  <input type="date" class="form-control" id="dateFrom" name="dateFrom">
               </div>
               <div class="col">
                  <label for="dateTo">Date To</label>
                  <input type="date" class="form-control" id="dateTo" name="dateTo">
               </div>
               <div class="col">
                  <input type="hidden" value="{{$srv}}" id="service" name="service">
               </div>
            </div>
            <div class="row form-group">
               <div class="col">
                  <label for="title">Title</label>
                  <input type="text" class="form-control" id="title" name="title">
               </div>
           
               <div class="col">
                  <label for="body">Description</label>
                  <input type="text" class="form-control" id="body" name="body">
               </div>
               <div class="col-5 form-group">
                  <label for="req">Requirements</label>
                  <div class="col form-control">
                     <input type="checkbox" id="pencil" name="pencil">
                     <label for="pencil">Pencil</label> &nbsp;
                     <input type="checkbox" id="ballpen" name="ballpen">
                     <label for="ballpen">Ballpen</label> &nbsp;
                     <input type="checkbox" id="validid" name="validid">
                     <label for="validid">Valid Id</label> &nbsp;
                     <input type="checkbox" id="snacks" name="snacks">
                     <label for="snacks">Snacks</label> &nbsp;
                     <input type="checkbox" id="water" name="water">
                     <label for="water">Water</label> &nbsp;
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
      
   </form>  
@endsection

<!-- End of Page Wrapper -->
