@extends('layouts.app')

@section('content')

<body class="img js-fullheight" style="background-image: url(assets/images/bg.jpg);">
    <section class="ftco-section">
        <form action="">
            @csrf
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-sm-6 col-md-11">
                        <div class="w3 card w3-white" style="opacity:0.7">
                            <div class="card-header" style="text-align:center; ">
                                <h2>Requirements</h2>
                                <h6>Local Employer</h6>
                            </div>
                            <div class="card-body">
                                <input type="file" name="file" required>
                                <input type="hidden" id="userid" name="userid" > 
                                <button type="submit">Upload</button>
                                <div class="card-body">
                                    <div class="container table-container">
                                    
                                        <table class="table" style="text-align:center;">
                                            <thead>
                                                <tr>
                                                    <th scope="col">File Name</th>
                                                    <th scope="col">Original Name</th>
                                                    <th scope="col">Created At</th>
                                                    <th scope="col">Updated At</th>            
                                                    <th scope="col">Action</th>            
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>filename</td>
                                                    <td>original_name</td>
                                                    <td>created_at</td>
                                                    <td>updated_at</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                    @csrf
                                    
                                    <div class="row mb-0">
                                        <div class="col-md-6 offset-md-5">
                                            <input class="btn btn-primary" type="submit" value="Submit">
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
</body>

@endsection
