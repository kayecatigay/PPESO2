<header id="header" >
        <img src="assets/images/header.jpg" style="width:1300px; height:150px;" alt="icon"> &nbsp; &nbsp;
    </header>
<style>
   /* Set the table container to overflow horizontally */
   #table {
      font-family: Arial, Helvetica, sans-serif;
      font-size:10px;
      border-collapse: collapse;
      width: 70%;
      margin-left: auto;
      margin-right: auto;
   }

   #table td, #table th {
      border: 1px solid #ddd;
      padding: px;
   }
</style>   
      <div class="col-xl-16">
         <div class="card shadow mb-4"><br><br><br>
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
               <div class="col">
                  <h1 class="m-0 font-weight-bold text-dark" style="text-align:center;"> {{ $Sann[0]->service }} Announcements</h1>
               </div>   
               
            </div>
               <!-- Card Body -->
               <div class="card-body">
                  <div class="container table-container">
                     <table class="table" id="table">
                        <thead style="text-align:center">
                           <tr>
                              <th scope="col">Date From</th>
                              <th scope="col">Date To</th>
                              <th scope="col">Title</th>
                              <th scope="col">Description</th>
                           </tr>
                        </thead>
                        <tbody style="text-align:center">
                           @foreach ($Sann as $ann)
                              <tr>
                                 <td>{{ $ann->dateFrom }}</td>
                                 <td>{{ $ann->dateTo }}</td>
                                 <td>{{ $ann->title }}</td>
                                 <td>{{ $ann->body }}</td>
                                 
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
