
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
      padding: px;
   }
</style>   
      <div class="col-xl-16">
         <div class="card shadow mb-4"><br> <br> <br>
            <div
               class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
               <h2 class="m-0 font-weight-bold text-dark" style="text-align:center;">Scholarship Tracking</h2>            
            </div>
               <!-- Card Body -->
               <div class="card-body">
                  <div class="container table-container">
                     <table class="table" id="table">
                        <thead style="text-align:center">
                           <tr>
                              <th scope="col">Name</th>
                              <th scope="col">Age</th>
                              <th scope="col">Sex</th>
                              <th scope="col">Address</th>
                              <th scope="col">Year Graduated</th>
                              <th scope="col">School</th>
                              <th scope="col">Work</th>
                              <th scope="col">Company Name</th>
                           </tr>
                        </thead>
                        
                        <tbody style="text-align:center">
                           @foreach ($track as $tr)
                              <tr>
                                 <td>{{ $tr->name }}</td>
                                 <td>{{ $tr->age }}</td>
                                 <td>{{ $tr->gender }}</td>
                                 <td>{{ $tr->address }}</td>
                                 <td>{{ $tr->yGraduated }}</td>
                                 <td>{{ $tr->school }}</td>
                                 <td>{{ $tr->work }}</td>
                                 <td>{{ $tr->cname }}</td>
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
