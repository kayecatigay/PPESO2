<header id="header">
    <img src="assets/images/header.jpg" style="width:1300px; height:150px;" alt="icon"> &nbsp; &nbsp;
</header>

<div class="col-xl-20">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <div class="row">
                <div class="col"><br> <br> <br>
                    <h1 class="m-0 font-weight-bold text-dark" style="text-align:center;
                        font-family:Verdana, Geneva, Tahoma, sans-serif">Application</h1>
                           <table class="table" style="text-align:center; font-family:Verdana, Geneva, Tahoma, sans-serif">
                              <thead>
                                 <tr>
                                       <th scope="col">File Name</th>
                                       <th scope="col">Original Name</th>
                                       <th scope="col">Created At</th>
                                       <th scope="col">Updated At</th>            
                                 </tr>
                              </thead>
                              <tbody >
                                 @forelse ($files as $file)
                                    <tr style="text-align:center;">
                                       <td>{{ $file->filename }}</td>
                                       <td>{{ $file->original_name }}</td>
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

