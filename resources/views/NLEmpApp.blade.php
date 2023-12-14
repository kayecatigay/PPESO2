
<div class="col-xl-20">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <div class="row">
                  <div class="col"><br> <br> <br>
                    
                           <table border="1" cellpadding="5" cellspacing="0" align="center" style="text-align:center; font-family:Verdana, Geneva, Tahoma, sans-serif">
                              <caption>
                              <img src="assets/img/ofw.png" alt="icon"> &nbsp; &nbsp;
                                 <h1 class="m-0 font-weight-bold text-dark" style="text-align:center;
                                 font-family:Verdana, Geneva, Tahoma, sans-serif">Application</h1>
                        </caption>
                              <thead class="align-items-center">
                                 <tr>
                                       <th scope="col">File Name</th>
                                       <th scope="col">Original Name</th>
                                       <th scope="col">Created At</th>
                                       <th scope="col">Updated At</th>   
                                 </tr>
                              </thead>
                              <tbody class="align-items-center">
                                 @forelse ($files as $file)
                                    <tr style="text-align:center;">
                                       <td>{{ substr($file->filename, 0, 20) }}{{ strlen($file->filename) > 20 ? '...' : '' }}</td>
                                       <td>{{ substr($file->original_name, 0, 20) }}{{ strlen($file->original_name) > 20 ? '...' : '' }}</td>
                                       <td>{{ $file->created_at }}</td>
                                       <td>{{ $file->updated_at }}</td>
                                                                         
                                    </tr>
                                 @empty
                                    <tr style="text-align:center;">
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

