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
         <form action="/send" target="_Blank">
            <div class="container">
               <h5 class="m-0 font-weight-bold text-dark">Messages</h5> <br>
               <div class="form-group">
                  <div class="row">
                     <div class="col-3">
                        <label class="form-label"  for="num">Number:</label>
                        <input type="text" class="form-control" id="num" name="num" placeholder="ex. 639123456789">
                     </div>
                     <div class="col">&nbsp;</div>
                  </div>
                  
                     <div class="row">
                        <div class="col-7">
                        <label for="message" class="form-label">Message</label>
                           <textarea class="form-control" name="body" readonly id="" 
                           style="font-family: Verdana;" rows="5" >
   Hello!
   Thank you for doing a message trial.
   This is a test message from Kate.

   Have a great day ahead.
                           </textarea>
                        </div>
                        <div class="col">&nbsp;</div>
                     </div> <br>
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
