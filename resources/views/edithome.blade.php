@extends('layouts.nofooter')
@section('content')
        @if(session('message'))
          <div class="alert alert-danger" style="width:400px;">
              {{ session('message') }}
          </div>
        @endif
    <div class="container" data-aos="fade-up">
    <div class="section-title"><br>
    <p>Homepage</p> <br>
      <form action="insertEdit" method="get">
            
         <input type="hidden" id="userid" name="userid" value="{{ Auth::user()->id }}">

         <div class="row">
            <div class="col-13 form-group">
               <label for="title">Title</label>
               <input type="text" class="form-control" id="title" name="title" >
            </div>
         </div>
            <div class="col-13">
               <label for="loc">Location:</label>
               <input type="text" class="form-control" id="loc" name="loc" >
            </div>
         <div class="row">
            <div class="col-10 from-group">
               <label for="about">About:</label> <br>
               <textarea id="about" name="about" rows="7" cols="110">
               </textarea>
            </div>
            <div class="col-2">
               <label for="aphoto">About-Photo:</label>
               <input type="file" class="form-control" id="aphoto" name="aphoto" >
            </div>
         </div><br>
         <h3>Services:</h3><br>
         <div class="row">
            <div class="col-4">
               <label for="stext">Scholarship:</label>
               <input type="text" class="form-control" id="stext" name="stext" >
               
            </div>
            <div class="col-4">
               <label for="etext">Employment:</label>
               <input type="text" class="form-control" id="etext" name="etext" >
               
            </div>
            <div class="col-4">
               <label for="a0fw">OFW:</label>
               <input type="text" class="form-control" id="a0fw" name="a0fw" >
               
            </div>
         </div>
         <div class="row">
            <div class="col-4">
               <label for="Sstext">Scholarship:</label>
               <input type="text" class="form-control" id="Sstext" name="Sstext" >
            </div>
            <div class="col-4">
               <label for="Eetext">Employment:</label>
               <input type="text" class="form-control" id="Eetext" name="Eetext" >
            </div>
            <div class="col-4">
               <label for="Aa0fw">OFW:</label>
               <input type="text" class="form-control" id="Aa0fw" name="Aa0fw" >
            </div>
         </div><br>
         <h3>Contact Us:</h3><br>
         <div class="row">
            <div class="col-4">
               <label for="conLoc">Contact Location:</label>
               <input type="text" class="form-control" id="conLoc" name="conLoc" >
               
            </div>
            <div class="col-4">
               <label for="email">Email:</label>
               <input type="email" class="form-control" id="email" name="email" >
               
            </div>
            <div class="col-4">
               <label for="cell">Cell no.:</label>
               <input type="text" class="form-control" id="cell" name="cell" >
               
            </div>
         </div><br>
         <h3>For more info:</h3><br>
         <div class="col-13">
               <label for="infoLoc">Info Location:</label>
               <input type="text" class="form-control" id="infoLoc" name="infoLoc" >
            </div>
         <div class="row">
            
             <div class="col-4">
               <label for="phone">Phone:</label>
               <input type="text" class="form-control" id="phone" name="phone" >
            </div>
            <div class="col-4">
               <label for="iemail">Email:</label>
               <input type="email" class="form-control" id="iemail" name="iemail" >
            </div>
            <div class="col-4">
               <label for="fb">Facebook:</label>
               <input type="text" class="form-control" id="fb" name="fb" >
            </div>
         </div> <br>
         <input type="submit" class="btn btn-outline-dark" 
         style="display:block; margin-left:auto; margin-right:auto; width:10%" value="Submit">
      </form>   
   </div>
@endsection