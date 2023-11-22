<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   
</head>
<body onload="window.print()">   

<header id="header" >
        <img src="assets/img/peap.png" alt="icon"> &nbsp; &nbsp;
    </header>
<style>
   /* Set the table container to overflow horizontally */

   #table {
      font-family: Arial, Helvetica, sans-serif;
      font-size:11px;
      border-collapse: collapse;
      width: 90%;
      margin-left: auto;
      margin-right: auto;
   }

   #table td, #table th {
      border: 1px solid #ddd;
      padding: 8px;
   }
</style>   
                       
      <div class="col-xl-19">
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
                              <th scope="col">Guardian</th>
                              <th scope="col">Relation</th>
                              <th scope="col">Year Graduated</th>
                              <th scope="col">School</th>
                              <th scope="col">Work</th>
                              <th scope="col">Company Name</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach ($dataold as $old)
                           @php $address = $old->region."," .$old->province."," .$old->mun."," .$old->barangay."," .$old->sitio; @endphp
                              <tr>
                                 <td>{{ $old->date }}</td>
                                 <td>{{ $old->name }}</td>
                                 <td>{{ $old->gender }}</td>
                                 <td>{{ $address }}</td>
                                 <td>{{ $old->emailadd }}</td>
                                 <td>{{ $old->contactnum }}</td>
                                 <td>{{ $old->birthday }}</td>
                                 <td>{{ $old->pobirth }}</td>
                                 <td>{{ $old->age }}</td>
                                 <td>{{ $old->height }}</td>
                                 <td>{{ $old->weight }}</td>
                                 <td>{{ $old->bloodtype }}</td>
                                 <td>{{ $old->guardian }}</td>
                                 <td>{{ $old->relation }}</td>
                                 <td>{{ $old->yGraduated }}</td>
                                 <td>{{ $old->school }}</td> 
                                 <td>{{ $old->work }}</td>
                                 <td>{{ $old->cname }}</td>                          
                              </tr>
                           @endforeach
                        </tbody>
                     </table>
                  </div>
               </div>
         </div>
      </div>   
        
   <script>
      // Add event listener to scroll the table
      var tableContainer = document.querySelector('.table-container');
      tableContainer.addEventListener('wheel', function(event) {
         event.preventDefault();
         tableContainer.scrollLeft += event.deltaY;
      });
   </script>
</body>
</html>

<!-- End of Page Wrapper -->
