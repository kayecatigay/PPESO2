@extends('layouts.addefault')

@section('maincontent')
<style>
   /* Set the table container to overflow horizontally */
   .table-container {
      overflow-x: auto;
      white-space: nowrap;
   }
</style>      
      <div class="col-xl-16">
         <form action="/send-sms" method="POST" >
            <label class="form-label" for="mobile">Number:</label>
            @csrf

            <input type="text" class="form-control" id="mobile" name="mobile" placeholder="ex. 09123456789">

            <label for="message" class="form-label">Message:</label>
            <textarea class="form-control" name="message" id="message" style="font-family: Verdana;" rows="5">
               
            </textarea>

            <!-- <label class="form-label" for="apicode">API Code:</label> -->
            <input type="hidden" class="form-control" id="apicode" name="apicode" value="ElenMary0920A">
            <br>
            <input type="submit" value="Submit">
         </form>
      </div>


   <script>
      // Add event listener to scroll the table
      var tableContainer = document.querySelector('.table-container');
      tableContainer.addEventListener('wheel', function(event) {
         event.preventDefault();
         tableContainer.scrollLeft += event.deltaY;
      });
   </script>

@endsection

<!-- End of Page Wrapper -->
