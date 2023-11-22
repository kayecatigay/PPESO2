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
               <h1 class="m-0 font-weight-bold text-dark"style="text-align:center;">Employment Status</h1>
               
            </div>
               
            <div class="card-body">
              <div class="container table-container">
                <table class="table" id="table" style="text-align:center;">
                  <thead>
                      <tr>
                        <th scope="col">Application Id</th>
                        <th scope="col">Date</th>
                        <th scope="col">Position Desired</th>
                        <th scope="col">Company</th>
                        <th scope="col">Record</th>
                        <th scope="col">Character Reference</th>
                        <th scope="col">Status</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach ($status as $emp)
                      <tr>
                        <td>{{ $emp->appId }}</td>
                        <td>{{ $emp->date }}</td>
                        <td>{{ $emp->posidesired }}</td>
                        <td>{{ $emp->cname }}</td>
                        <td>{{ $emp->crname }}</td>
                        <td>{{ $emp->crcontact }}</td>
                        <td>{{ $emp->status }}</td>
                        
                      </tr>
                    @endforeach
                  </tbody>
                </table> 
              </div>
            </div>
            
          </div>
      </div>
      
      <!-- Button trigger modal -->
      <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
      Launch demo modal
      </button> -->


   <script>
      // Add event listener to scroll the table
      var tableContainer = document.querySelector('.table-container');
      tableContainer.addEventListener('wheel', function(event) {
         event.preventDefault();
         tableContainer.scrollLeft += event.deltaY;
      });
   </script>
<!-- End of Page Wrapper -->
