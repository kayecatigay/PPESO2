<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
</head>
<body onload="window.print()">   

<header id="header" >
        <img src="assets/img/ofw.png" alt="icon"> &nbsp; &nbsp;
    </header>
<style>
   /* Set the table container to overflow horizontally */

   #table {
      font-family: Arial, Helvetica, sans-serif;
      font-size:11px;
      border-collapse: collapse;
      width: 90%;
      margin-left: auto;
      margin-right: auto;
   }

   #table td, #table th {
      border: 1px solid #ddd;
      padding: 8px;
   }
   
</style>

        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
            @section('dashboard')
                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 style="font-size:20px;">The subsequent information pertains to various statistics attained by the system,
                    which are further elaborated in the tables and bar graphs.</h1>
                </div>


                <!-- Content Row -->

                <!-- Content Row -->
                <div class="row">
                    <!-- Bar Chart -->
                        <div class="card shadow mb-4">
                            
                            <!-- Card Body -->
                            <div class="card-body">
                                <div class="chart-area">
                                    @if(empty($monthlyCounts))
                                            <br><br>No data is currently available.
                                        @else
                                        @foreach ($monthlyCounts as $data)
                                            <canvas id="myappChart" style="width:100%; max-width:600px"></canvas>
                                        @endforeach                                    
                                    @endif
                                </div>
                            </div>
                        </div>
                        &emsp; &emsp;<p><br><br><br>The illustration on the left depicts <br> the monthly counts of applicants.</p>
                </div>
                <!-- Content Row -->
                <div class="row">

                    <!-- Content Column -->

                        <!-- Project Card Example -->
                        <div class="card shadow mb-4 " style="height: 200px; width:400px;">
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-dark">Company</h6><h6 class="m-0 font-weight-bold text-dark">Applicants</h6>
                            </div>
                            <div class="card-body">
                                @if(empty($companies))
                                    No data is currently available.
                                        @else
                                    @foreach ($companies as $company)
                                        <h4 class="small font-weight-bold">{{ $company->cname }} 
                                            <span class="float-right">{{ $company->count }}</span>
                                        </h4>
                                        <div class="progress mb-4">
                                            <div class="progress-bar bg-dark" role="progressbar" style="width: {{ $company->count }}%" aria-valuenow="{{ $company->count }}" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>      
                        &emsp; &emsp;<p><br><br><br>The illustration on the left depicts <br> the counts of applicants per company.</p>              
                </div>
                <div class="row">
                    <!-- Earnings (Monthly) Card Example -->
                        <div class="card shadow mb-4 border-left-primary" style="height: 160px; width:280px;">
                            <div class="card-body" style="width:100%; max-height:200px">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-3">
                                        <div class="text-s font-weight-bold text-dark text-uppercase mb-1">
                                           <br>Total Applicants
                                        </div>
                                        <div class="h1 font-weight-bold text-gray-800">
                                            &emsp;&emsp;{{$applicants}}
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                    <i class="fa fa-users fa-3x text-gray-300" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        &nbsp;
                        <div class="card shadow mb-4 border-left-success" style="height: 160px; width:280px;">
                            <div class="card-body" style="width:100%; max-height:200px">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-3">
                                        <div class="text-s font-weight-bold text-dark text-uppercase mb-1">
                                          <br>  Hired Applicants
                                        </div>
                                        <div class="h1 font-weight-bold text-gray-800">
                                        &emsp;&emsp;{{$accepted}}
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fa fa-briefcase fa-3x text-gray-300" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        &nbsp;
                        <div class="card shadow mb-4 border-left-success" style="height: 160px; width:280px;">
                            <div class="card-body" style="width:100%; max-height:200px">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-3">
                                        <div class="text-s font-weight-bold text-dark text-uppercase mb-1">
                                            <br>  Hired Employer
                                        </div>
                                        <div class="h1 font-weight-bold text-gray-800">
                                        &emsp;&emsp;{{$hiredEmp}}
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fa fa-briefcase fa-3x text-gray-300" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div> &nbsp;
                        <div class="card shadow mb-4 border-left-success" style="height: 160px; width:280px;">
                            <div class="card-body" style="width:100%; max-height:200px">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-3">
                                        <div class="text-s font-weight-bold text-dark text-uppercase mb-1">
                                            <br>  Total Employer
                                        </div>
                                        <div class="h1 font-weight-bold text-gray-800">
                                        &emsp;&emsp;{{$totalEmp}}
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fa fa-briefcase fa-3x text-gray-300" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>

                <!-- Content Row -->

                

                

            </div>
            <!-- /.container-fluid -->
            @show

        </div>
        <!-- End of Main Content -->
    
    <script>
        var data = {!! json_encode($monthlyCounts) !!};
    
        var labels = data.map(function(item) {
            // Assuming the 'month' property is in the format 'YYYY-MM'
            var yearMonth = item.month.split('-');
            var monthName = new Date(Date.UTC(yearMonth[0], yearMonth[1] - 1, 1)).toLocaleString('en-US', { month: 'long' });

            return monthName;
        });

        var counts = data.map(function(item) {
            return item.count;
        });
        var ctx = document.getElementById('myappChart').getContext('2d');
    
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Applicants per Month',
                    data: counts,
                    backgroundColor: 'rgba(75, 100, 100, 1)',
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            },
            plugins: {
                annotation: {
                    annotations: [{
                        type: 'line',
                        mode: 'horizontal',
                        scaleID: 'y',
                        value: 1,
                        borderColor: 'red',
                        borderWidth: 2,
                        label: {
                            enabled: true,
                            content: 'Value 1',
                            position: 'right',
                        }
                    }]
                }
            }
        });
    </script>