<header id="header" >
        <img src="assets/img/ofw.png" alt="icon"> &nbsp; &nbsp;
    </header>
<div class="col-xl-20">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <div class="row">
                <div class="col"><br> <br> <br>
                    <h1 class="m-0 font-weight-bold text-dark" style="text-align:center;
                        font-family:Verdana, Geneva, Tahoma, sans-serif">Application</h1>
                           <table class="table " style="text-align:center; font-family:Verdana, Geneva, Tahoma, sans-serif">
                              <thead class="align-items-center">
                                 <tr>
                                       <th scope="col">File Name</th>
                                       <th scope="col">Original Name</th>
                                       <th scope="col">Created At</th>
                                       <th scope="col">Updated At</th>   
                                       <th scope="col">Download File</th>   
                                 </tr>
                              </thead>
                              <tbody class="align-items-center">
                                 @forelse ($files as $file)
                                    <tr style="text-align:center;">
                                       <td>{{ $file->filename }}</td>
                                       <td>{{ $file->original_name }}</td>
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
</div>

