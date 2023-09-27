<header id="header" >
        <img src="assets/images/header.jpg" style="width:1300px; height:150px;" alt="icon"> &nbsp; &nbsp;
    </header>
<style>
   /* Set the table container to overflow horizontally */
   #table {
      font-family: Arial, Helvetica, sans-serif;
      font-size:13px;
      border-collapse: collapse;
      width: 50%;
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
            <div
               class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
               <h1 class="m-0 font-weight-bold text-dark" style="text-align:center;">Scholar Status</h1>
               
            </div>
               <!-- Card Body -->
               <div class="card-body">
              <div class="container table-container">
                <table class="table" id="table" style="text-align:center;">
                  <thead>
                      <tr>
                        <th scope="col">Application Id</th>
                        <th scope="col">Date</th>
                        <th scope="col">Status</th>
                      </tr>
                  </thead>
                  <tbody>
                  @foreach ($status as $sc)
                    <tr>
                      <td>{{ $sc->appId }}</td>
                      <td>{{ $sc->date }}</td>
                      <td>{{ $sc->status }}</td>
                      
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
