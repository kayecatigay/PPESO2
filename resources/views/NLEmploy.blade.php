
<header id="header" >
        <img src="assets/images/header.jpg" style="width:1300px; height:150px;" alt="icon"> &nbsp; &nbsp;
    </header>
<style>
   /* Set the table container to overflow horizontally */

   #table {
      font-family: Arial, Helvetica, sans-serif;
      font-size:10px;
      border-collapse: collapse;
      width: 100%;
      margin-left: auto;
      margin-right: auto;
   }

   #table td, #table th {
      border: 1px solid #ddd;
      padding: 8px;
   }
</style>   
                       
      <div class="col-xl-20">
         <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
               <div class="row">
                  <div class="col"><br> <br> <br>
                     <h1 class="m-0 font-weight-bold text-dark" style="text-align:center;">Application Forms</h1>
                  </div>
               </div>
            </div>
               <!-- Card Body -->
               <div class="card-body">
                  <div class="container table-container">
                     <table class="table" id="table">
                        <thead>
                           <tr>
                              <th scope="col">Created At</th>
                              <th scope="col">Hired</th>
                              <th scope="col">Name</th>
                              <th scope="col">Position Desired</th>
                              <th scope="col">Gender</th>
                              <th scope="col">Address</th>
                              <th scope="col">Telephone</th>
                              <th scope="col">Contact Number</th>
                              <th scope="col">Email Address</th>
                              <th scope="col">Birthday</th>
                              <th scope="col">Civil Status</th>
                              <th scope="col">Spouse</th>
                              <th scope="col">Height</th>
                              <th scope="col">Weight</th>
                              <th scope="col">Language</th>
                              <th scope="col">Elementary</th>
                              <th scope="col">High School</th>
                              <th scope="col">College</th>
                              <th scope="col">Degree</th>
                              <th scope="col">Company Name</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach ($showdata as $data)
                              @php $address = $data->region."," .$data->province."," .$data->mun."," .$data->barangay."," .$data->sitio; @endphp
                              <tr>
                                 <td>{{ $data->date }}</td>
                                 <td>{{ $data->hire }}</td>
                                 <td>{{ $data->name }}</td>
                                 <td>{{ $data->posidesired }}</td>
                                 <td>{{ $data->gender }}</td>
                                 <td>{{ $address }}</td>
                                 <td>{{ $data->telenum }}</td>
                                 <td>{{ $data->contactnum }}</td>
                                 <td>{{ $data->emailadd }}</td>
                                 <td>{{ $data->birthday }}</td>
                                 <td>{{ $data->cstatus }}</td>
                                 <td>{{ $data->spouse }}</td>
                                 <td>{{ $data->height }}</td>
                                 <td>{{ $data->weight }}</td>
                                 <td>{{ $data->language }}</td>
                                 <td>{{ $data->elem }}</td>
                                 <td>{{ $data->hs }}</td>
                                 <td>{{ $data->college }}</td> 
                                 <td>{{ $data->degree }}</td>
                                 <td>{{ $data->uprofile_column }}</td>                          
                              </tr>
                           @endforeach
                        </tbody>
                     </table>
                  </div>
               </div>
         </div>
      </div>   <br>
      <div style="text-align:center;" class="btn btn-primary">
         <button onclick="printPage()">Print</button>
      </div>
   <script>
      function printPage() {
            window.print();
        }
      // Add event listener to scroll the table
      var tableContainer = document.querySelector('.table-container');
      tableContainer.addEventListener('wheel', function(event) {
         event.preventDefault();
         tableContainer.scrollLeft += event.deltaY;
      });
   </script>


<!-- End of Page Wrapper -->
