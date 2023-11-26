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
      <form action="/insertEdit" method="get">
            
         <input type="hidden" id="userid" name="userid" value="{{ Auth::user()->id }}">

         <div class="row">
            <div class="col-13 form-group">
               <label for="title">Title</label>
               <input type="text" class="form-control" id="title" name="title" value="{{$show[0]->title}}">
            </div>
         </div>
            <div class="col-13">
               <label for="loc">Location:</label>
               <input type="text" class="form-control" id="loc" name="loc" value="{{$show[0]->loc}}">
            </div>
         <div class="row">
            <div class="col-10 from-group">
               <label for="about">About:</label> <br>
               <textarea id="about" name="about" rows="7" cols="130" >
               {{$show[0]->about}} </textarea>
            </div>
            
         </div><br>
         <h3>Services:</h3><br>
         <div class="row">
            <div class="col-4">
               <label for="stext">Scholarship:</label>
               <input type="text" class="form-control" id="stext" name="stext" value="{{$show[0]->stext}}">
               
            </div>
            <div class="col-4">
               <label for="etext">Employment:</label>
               <input type="text" class="form-control" id="etext" name="etext" value="{{$show[0]->etext}}">
               
            </div>
            <div class="col-4">
               <label for="aOfw">OFW:</label>
               <input type="text" class="form-control" id="aOfw" name="aOfw" value="{{$show[0]->aOfw}}">
               
            </div>
         </div>
         <div class="row">
            <div class="col-4">
               <label for="Sstext">Scholarship:</label>
               <input type="text" class="form-control" id="Sstext" name="Sstext" value="{{$show[0]->Sstext}}">
            </div>
            <div class="col-4">
               <label for="Eetext">Employment:</label>
               <input type="text" class="form-control" id="Eetext" name="Eetext" value="{{$show[0]->Eetext}}">
            </div>
            <div class="col-4">
               <label for="AaOfw">OFW:</label>
               <input type="text" class="form-control" id="AaOfw" name="AaOfw" value="{{$show[0]->AaOfw}}">
            </div>
         </div><br>
         <h3>Contact Us:</h3><br>
         <div class="row">
            <div class="col-4">
               <label for="conLoc">Contact Location:</label>
               <input type="text" class="form-control" id="conLoc" name="conLoc" value="{{$show[0]->conLoc}}">
               
            </div>
            <div class="col-4">
               <label for="email">Email:</label>
               <input type="email" class="form-control" id="email" name="email" value="{{$show[0]->email}}">
               
            </div>
            <div class="col-4">
               <label for="cell">Cell no.:</label>
               <input type="text" class="form-control" id="cell" name="cell" value="{{$show[0]->cell}}">
               
            </div>
         </div><br>
         <h3>For more info:</h3><br>
         <div class="col-13">
               <label for="infoLoc">Info Location:</label>
               <input type="text" class="form-control" id="infoLoc" name="infoLoc" value="{{$show[0]->infoLoc}}">
            </div>
         <div class="row">
            
             <div class="col-4">
               <label for="phone">Phone:</label>
               <input type="text" class="form-control" id="phone" name="phone" value="{{$show[0]->phone}}" >
            </div>
            <div class="col-4">
               <label for="iemail">Email:</label>
               <input type="email" class="form-control" id="iemail" name="iemail" value="{{$show[0]->iemail}}">
            </div>
            <div class="col-4">
               <label for="fb">Facebook:</label>
               <input type="text" class="form-control" id="fb" name="fb" value="{{$show[0]->fb}}">
            </div>
         </div> <br>
         <input type="submit" class="btn btn-outline-dark" 
         style="display:block; margin-left:auto; margin-right:auto; width:10%" value="Submit">
      </form>   
      <label for="file">About-Photo:</label>
      <form method="POST" action="/uploadPic" enctype="multipart/form-data">
         @csrf
         <input type="file" name="file" required>
         <input type="hidden" id="userid" name="userid" value="{{ Auth::user()->id }}"> 
         &emsp; &emsp;&emsp;
         <button type="submit">Upload</button>
      </form> <br>
   </div>
@endsection