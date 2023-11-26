@extends('layouts.addefault')

@section('maincontent')
    <!-- Main Content -->
    <div id="content">

        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
            @section('dashboard')
                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Data Visualization</h1>
                    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                </div>

                <!-- Content Row -->
                <div class="row">
                    <!-- Bar Chart -->
                    <div class="col-xl-7 col-lg-6">
                        <div class="card shadow mb-4">
                            
                            <!-- Card Body -->
                            <div class="card-body">
                                <div class="chart-area">
                                    @foreach ($monthlyCounts as $data)
                                    <canvas id="myappChart" style="width:100%; max-width:600px"></canvas>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-4">
                        <div class="card shadow mb-4 border-left-primary" style="height: 160px; width:400px;">
                            <div class="card-body" style="width:80%; max-height:200px">
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
                    
                        <div class="card shadow mb-4 border-left-success" style="height: 160px; width:400px;">
                            <div class="card-body" style="width:80%; max-height:200px">
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
                    </div>
                </div>

                <!-- Content Row -->

                

                <!-- Content Row -->
                <div class="row">

                    <!-- Content Column -->
                    <div class="col-lg-6 mb-4">

                        <!-- Project Card Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header text-info" style="text-align:center; border:none; height:10px;">
                            <b>NUMBER OF APPLICANTS PER COMPANY</b>
                            </div>
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-dark">Company</h6><h6 class="m-0 font-weight-bold text-dark">Applicants</h6>
                            </div>
                            <div class="card-body">
                                @foreach ($companies as $company)
                                    <h4 class="small font-weight-bold">{{ $company->cname }} 
                                        <span class="float-right">{{ $company->count }}</span>
                                    </h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-dark" role="progressbar" style="width: {{ $company->count }}%" aria-valuenow="{{ $company->count }}" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                @endforeach
                                
                            </div>
                        </div>

                    </div>
                    <div class="card shadow mb-4 border-left-success" style="height: 160px; width:500px;">
                        <div class="card-body" style="width:80%; max-height:200px">
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
                    </div>

                </div>

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
    <!-- End of Content Wrapper -->
@endsection

<!-- End of Page Wrapper -->
