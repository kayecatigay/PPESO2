<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   
</head>
<body onload="window.print()">   

<header id="header" >
   <img src="assets/img/ofw.png" alt="icon"> &nbsp; &nbsp;
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
      <div class="col-xl-16">
         <div class="card shadow mb-4"><br><br><br>
            <div
               class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
               <h1 class="m-0 font-weight-bold text-dark" style="text-align:center;">OFW Applicants</h1>
              
            </div>
               <!-- Card Body -->
               <div class="card-body">
                  <div class="container table-container">
                     <table class="table" id="table" style="text-align:center">
                        <thead>
                           <tr>
                              <th scope="col">Name</th>
                              <th scope="col">Birthday</th>
                              <th scope="col">Age</th>
                              <th scope="col">Sex</th>
                              <th scope="col">Contact Number </th>
                              <th scope="col">Address</th>
                              <th scope="col">Passport Number</th>
                              <th scope="col">Email Address</th>
                              <th scope="col">Job Description</th>
                              <th scope="col">Ofw Category</th>
                              <th scope="col">Company</th>
                              <th scope="col">Country</th>
                              <th scope="col">Period of Employment</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach ($ofwdata as $data)
                              @php $name = $data->lastname.",".$data->firstname. " " .$data->middlename; @endphp
                              @php $address = $data->region."," .$data->province."," .$data->mun."," .$data->barangay."," .$data->sitio; @endphp
                              <tr>
                                 <td>{{ $name }}</td>
                                 <td>{{ $data->birthday }}</td>
                                 <td>{{ $data->age }}</td>
                                 <td>{{ $data->gender }}</td>
                                 <td>{{ $data->contactnum }}</td>
                                 <td>{{ $address }}</td>
                                 <td>{{ $data->passnum }}</td>
                                 <td>{{ $data->emailadd }}</td>
                                 <td>{{ $data->JobDesc }}</td>
                                 <td>{{ $data->OfwCat }}</td>
                                 <td>{{ $data->Company }}</td>
                                 <td>{{ $data->Country }}</td>
                                 <td>{{ $data->PeriodOfEmp }}</td>
                                 
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

<!-- End of Page Wrapper -->
