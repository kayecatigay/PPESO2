
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
                     <h1 class="m-0 font-weight-bold text-dark" style="text-align:center;">Resume</h1>
                  </div>
               </div>
            </div>
               <!-- Card Body -->
               @if($show == 'image')
                  <img src="{{ $imageUrl }}" alt="Image">
               @elseif($show == 'pdf')
                  <iframe src="{{ $pdfUrl }}" frameborder="0" style="width:100%;min-height:640px;"></iframe>
               @elseif($show == 'document')
                  <iframe src="https://view.officeapps.live.com/op/view.aspx?src={{ urlencode($docUrl) }}" frameborder="0" style="width:100%;min-height:640px;"></iframe>
               @else
                  {{-- manage things here --}}
               @endif

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
