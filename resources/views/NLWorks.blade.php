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
         <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
               <div class="row"><br><br><br>
                  <div class="col">
                     <h1 class="m-0 font-weight-bold text-dark" style="text-align:center;">Available Works</h1>
                  </div> 
                  
               </div>
            </div>
               <!-- Card Body -->
            <div class="card-body">
               <div class="container table-container">
                  <table class="table" id="table"style="text-align:center">
                     <thead>
                        <tr>
                           <th scope="col">Date</th>
                           <th scope="col">Job Description</th>
                           <th scope="col">Company</th>
                           <th scope="col">Contact Number</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach ($work as $wrk)
                           <tr>
                              <td>{{ $wrk->date }}</td>
                              <td>{{ $wrk->jobdesc }}</td>
                              <td>{{ $wrk->company }}</td>
                              <td>{{ $wrk->contact }}</td>
                              
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
