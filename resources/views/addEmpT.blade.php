@extends('layouts.default')

@section('content')
   <form action ="/insertEmpF" method="get" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
         <label for="userid"></label>
         <input type="hidden" class="form-control" id="userid" name="userid"  value="{{ Auth::user()->id }}">
      </div>
      
      <div class="form-group">
         <p><h4>Employment Form</h4></p>
         <div class="container">      
            
            <div class="row form-group">
               <div class="col">
                  <label for="cname">Company</label>
                  <select class="form-control" name="cname" id="cname">
                        @foreach ($emp as $row)
                           <option value="{{ $row->company }}" data-jobdesc="{{ $row->jobdesc }}">{{ $row->company }}</option>
                        @endforeach
                  </select>
               </div>
               <div class="col-7">
                  <label for="avaiPosi">Available Position</label>
                  <input type="text" class="form-control" id="avaiPosi" name="avaiPosi" readonly>
               </div>
            </div>

            <div class="row form-group">
               <div class="col">
                  <label for="crname">Character Reference</label>
                  <input type="text" class="form-control" id="crname" name="crname">
               </div>
               <div class="col-5">
                  <label for="crcontact">Character Reference's Contact Number</label>
                  <input type="text" class="form-control" id="crcontact" name="crcontact">
               </div>
            </div> <br>
            
            <div class="row">
               <div class="col-5">&nbsp;</div>
               <div class="col">
                  <button type="submit" style="background-color:#5F9EA0; border:none; font-size: 16px; border-radius: 4px;" 
                  value="Submit">Submit</button>
               </div>
               <div class="col">&nbsp;</div>
            </div>
         </div>
      </div>
   </form>  
   <script>
    // Get references to the select element and the input field
    const selectElement = document.getElementById('cname');
    const avaiPosiInput = document.getElementById('avaiPosi');

    // Create an empty object to store company details
    const companyToPosition = {};

    // Populate the companyToPosition object using data attributes
    selectElement.addEventListener('change', function () {
        const selectedOption = selectElement.options[selectElement.selectedIndex];
        const selectedCompany = selectedOption.value;
        const selectedJobDesc = selectedOption.getAttribute('data-jobdesc');

        // Set the value of the "Available Position" input based on the selected company
        avaiPosiInput.value = selectedJobDesc || '';
    });

    // Initialize the input field with the value of the selected company (if any)
    avaiPosiInput.value = selectElement.options[selectElement.selectedIndex].getAttribute('data-jobdesc') || '';
</script>

@endsection

<!-- End of Page Wrapper -->
