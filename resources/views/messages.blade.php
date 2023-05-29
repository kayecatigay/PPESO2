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
         <form action="/send">
            <div class="container">
               <h6 class="m-0 font-weight-bold text-dark">Messages</h6> <br>
               <div class="form-group">
                  <div class="row">
                     <div class="col">
                        <label for="num">Number</label>
                        <input type="text" id="num" name="num">
                     </div>
                     <div class="col">&nbsp;</div>
                  </div>
                     <div class="row">
                        <div class="col-7">
                           <textarea name="body" readonly id="" cols="60" rows="5">
                              Hello!
                              Thank you for doing a message trial.
                              THis is a test message from Kate.

                              Have a great day ahead.
                           </textarea>
                        </div>
                        <div class="col">&nbsp;</div>
                     </div>
                     <button class="btn btn-primary" type="submit">Send</button></a>
               </div>
            </div>
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
