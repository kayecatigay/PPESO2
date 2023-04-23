@extends('layouts.addefault')

@section('maincontent')
      
      <div class="col-xl-16">
         <div class="card shadow mb-4">
            <div
               class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
               <h6 class="m-0 font-weight-bold text-dark">New Application Forms</h6>
            </div>
               <!-- Card Body -->
               <div class="card-body">
                  <div class="container">
                     <table class="table">
                        <thead>
                           <tr>
                              <th scope="col">Name</th>
                              <th scope="col">Sex</th>
                              <th scope="col">Address</th>
                              <th scope="col">Email Address</th>
                              <th scope="col">Contact number</th>
                              <th scope="col">Birth date</th>
                              <th scope="col">Birth place</th>
                              <th scope="col">Age</th>
                              <th scope="col">Height</th>
                              <th scope="col">Weight</th>
                              <th scope="col">Bloodtype</th>
                              <th scope="col">Religion</th>
                              <th scope="col">Guardian</th>
                              <th scope="col">Relation</th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr>
                              @foreach ($data as $old)
                                 <td>{{ $old->name }}</td>
                                 <td>{{ $old->sex }}</td>
                                 <td>{{ $old->address }}</td>
                                 <td>{{ $old->emailadd }}</td>
                                 <td>{{ $old->contactnum }}</td>
                                 <td>{{ $old->birthday }}</td>
                                 <td>{{ $old->placeofbirth }}</td>
                                 <td>{{ $old->age }}</td>
                                 <td>{{ $old->height }}</td>
                                 <td>{{ $old->weight }}</td>
                                 <td>{{ $old->bloodtype }}</td>
                                 <td>{{ $old->religion }}</td>
                                 <td>{{ $old->guardian }}</td>
                                 <td>{{ $old->relation }}</td>
                              @endforeach
                           </tr>
                        </tbody>
                     </table>
                  </div>
               </div>
         </div>
      </div>
      <div class="col-xl-16">
         <div class="card shadow mb-4">
            <div
               class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
               <h6 class="m-0 font-weight-bold text-dark">New Application Forms</h6>
            </div>
               <!-- Card Body -->
               <div class="card-body">
                  <div class="container">   
                     <table class="table">
                        <thead>
                           <tr>
                              <th scope="col"> Id </th>
                              <th scope="col">Name</th>
                              <th scope="col">Email</th>
                              <th scope="col">Action</th>
                              <th scope="col"> Id </th>
                              <th scope="col">Name</th>
                              <th scope="col">Email</th>
                              <th scope="col">Action</th>
                              <th scope="col"> Id </th>
                              <th scope="col">Name</th>
                              <th scope="col">Email</th>
                              <th scope="col">Action</th>
                              <th scope="col"> Id </th>
                              <th scope="col">Name</th>
                              <th scope="col">Email</th>
                              <th scope="col">Action</th>
                           </tr>
                           <tbody>
                              <tr>
                                 <th scope="row">id</th>
                                 <td>name</td>
                                 <td>email</td>
                                 <td>name</td>
                                 <td>email</td>
                                 <td>name</td>
                                 <td>email</td>
                                 <td>name</td>
                                 <td>email</td>
                                 <td>name</td>
                                 <td>email</td>
                                 <td>name</td>
                                 <td>email</td>
                                 <td>name</td>
                                 <td>email</td>
                                 <td>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" 
                                    data-bs-target="#"> Delete </button>
                                 </td>
                                      
                              </tr>
                           </tbody>
                        </thead>
                     </table>
                  </div>
               </div>
         </div>
      </div>
     <!-- <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Dropdown button
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="#">Dropdown item 1</a>
    <a class="dropdown-item" href="#">Dropdown item 2</a>
    <a class="dropdown-item" href="#">Dropdown item 3</a>
  </div>
</div>
   <script>
      // Get the button and the dropdown menu
      var button = document.getElementById("dropdownMenuButton");
      var dropdownMenu = document.querySelector(".dropdown-menu");

      // Add an event listener to the button
      button.addEventListener("click", function() {
         // Toggle the 'show' class on the dropdown menu
         dropdownMenu.classList.toggle("show");
      });

      // Close the dropdown menu if the user clicks outside of it
      window.addEventListener("click", function(event) {
         if (!event.target.matches(".dropdown-toggle")) {
            dropdownMenu.classList.remove("show");
         }
      });
   </script> -->
@endsection

<!-- End of Page Wrapper -->
