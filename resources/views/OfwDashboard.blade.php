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
                    <a href="/printODashboard" target="_blank" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                        <i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                </div>

                <!-- Content Row -->
                <div class="row">
                    <!-- Bar Chart -->
                    <div class="col-xl-7 col-lg-6">
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
                <div class="row">

                    <!-- Content Column -->
                    <div class="col-xl-7 col-lg-6">
                        <div class="card shadow mb-4">
                            <!-- Card Body -->
                            <div class="card-body">
                                <div class="chart-area">
                                    @if(empty($landbasedCount) && empty($seabasedCount))
                                        <br><br>No data is currently available.
                                    @else
                                        <canvas id="ofwCat" style="width:80%; max-height:200px"></canvas>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Content Row -->

                
            <!-- /.container-fluid -->
            @show

        </div>
        <!-- End of Main Content -->
    </div>
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
        var landbasedCount = {{ $landbasedCount }};
        var seabasedCount = {{ $seabasedCount }};

        // Get the canvas element
        var ctx = document.getElementById('ofwCat').getContext('2d');

        // Create a bar chart
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Landbased', 'Seabased'],
                datasets: [{
                    label: 'Categories',
                    data: [landbasedCount, seabasedCount],
                    backgroundColor: ['lightblue', 'lightgreen'], // Adjust colors as needed
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1
                        }
                    }
                }
            }
        });
    </script>
    <!-- End of Content Wrapper -->
@endsection

<!-- End of Page Wrapper -->
