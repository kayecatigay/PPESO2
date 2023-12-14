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
               <h6 class="m-0 font-weight-bold text-dark">Employer Application</h6>
            </div>
               <!-- Card Body -->
               <div class="card-body">    
                  <div class="container table-container">
                     <table class="table" style="text-align: center;">
                        <thead>
                           <tr>
                                 <th scope="col">File Name</th>
                                 <th scope="col">Original Name</th>
                                 <th scope="col">Created At</th>
                                 <th scope="col">Updated At</th>   
                                 <th scope="col">Download File</th>   
                           </tr>
                        </thead>
                        <tbody >
                           @forelse ($files as $file)
                              <tr >
                              <td>{{ substr($file->filename, 0, 20) }}{{ strlen($file->filename) > 20 ? '...' : '' }}</td>
                              <td>{{ substr($file->original_name, 0, 20) }}{{ strlen($file->original_name) > 20 ? '...' : '' }}</td>
                                 <td>{{ $file->created_at }}</td>
                                 <td>{{ $file->updated_at }}</td>
                                 <td>
                                    <a href="{{ asset('uploads/' . $file->filename) }}" download>
                                       <button style=" border-color: black; color: black; border-radius: 5px;">
                                       download</button>
                                    </a>
                                 </td>                                    
                              </tr>
                           @empty
                              <tr style="text-align:center;">
                                 <td>None</td>
                                 <td>None</td>
                                 <td>None</td>
                                 <td>None</td>
                                 <td>None</td>
                              </tr>
                           @endforelse
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

   function setselid(id)
   {
      document.getElementById("selid").value=id;
   }
</script>

@endsection
