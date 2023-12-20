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
         <div class="card shadow mb-4">
            <div
               class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
               <h6 class="m-0 font-weight-bold text-dark">Scholarship Tracking</h6>
               <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>    
                    <form action="Stracking"
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" id="filter" name="filter" class="form-control border-0 small" 
                              placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" value="{{$txts}}">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                    <form action="StrackingPrint" target="_blank">
                        <input type="hidden" id="id" name="id" value="">
                        <button type="submit" onclick="copysearch()" class="btn btn-outline-dark" style="padding:1px 10px;">Print</button>
                        <!-- <a href="/StrackingPrint" target="_blank" style="padding:1px 10px;" class="btn btn-outline-dark">Print</a> -->
                    </form>

               
            </div>
               <!-- Card Body -->
               <div class="card-body">
                  <div class="container table-container">
                     <table class="table">
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
                           @php $address = $tr->region."," .$tr->province."," .$tr->mun."," .$tr->barangay."," .$tr->sitio; @endphp

                              <tr>
                                 <td>{{ $tr->name }}</td>
                                 <td>{{ $tr->age }}</td>
                                 <td>{{ $tr->gender }}</td>
                                 <td>{{ $address }}</td>
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
      function copysearch()
      {
         document.getElementById("id").value=document.getElementById("filter").value;
      }
   </script>
@endsection

<!-- End of Page Wrapper -->
