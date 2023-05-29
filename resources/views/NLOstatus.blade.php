
<style>
   /* Set the table container to overflow horizontally */
 
   #table {
      font-family: Arial, Helvetica, sans-serif;
      font-size:11px;
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
      <div class="col-xl-16">
         <div class="card shadow mb-4"><br><br><br>
            <div
               class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
               <h1 class="m-0 font-weight-bold text-dark" style="text-align:center;">Ofw</h1>
            </div>
            <div class="card-body">
            <div class="container table-container">
              <table class="table" id="table" style="text-align:center;">
                <thead>
                    <tr>
                      <th scope="col">Application ID</th>
                      <th scope="col">Date</th>
                      <th scope="col">Job Description</th>
                      <th scope="col">Ofw Category</th>
                      <th scope="col">Company</th>
                      <th scope="col">Country</th>
                      <th scope="col">Period of Employment</th> 
                      <th scope="col">Status</th>              
                    </tr>
                </thead>
                <tbody>
                    @foreach($status as $odata)
                      <tr>

                        <td>{{$odata->appID}}</td>
                        <td>{{$odata->date}}</td>
                        <td>{{$odata->JobDesc}}</td>
                        <td>{{$odata->OfwCat}}</td>
                        <td>{{$odata->Company}}</td>
                        <td>{{$odata->Country}}</td>
                        <td>{{$odata->PeriodOfEmp}}</td>
                        <td>{{$odata->status}}</td>
                        
                      </tr>
                    @endforeach
                </tbody>
              </table>
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
