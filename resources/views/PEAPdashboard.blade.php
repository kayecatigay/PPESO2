@extends('layouts.addefault')

@section('maincontent')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

    <!-- Main Content -->
    <div id="content">

        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
            @section('dashboard')
                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Data Visualization</h1>
                    <a href="/printDashboard" target="_blank" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                        <i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                </div>

                <!-- Content Row -->
                <div class="row">

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-s font-weight-bold text-dark text-uppercase mb-1">
                                            Applicants</div>
                                        <div class="h3 mb-0 font-weight-bold text-gray-800">{{$applicants}}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fa fa-users fa-3x text-gray-300" aria-hidden="true"> </i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-warning shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-s font-weight-bold text-dark text-uppercase mb-1">
                                            Accepted</div>
                                        <div class="h3 mb-0 font-weight-bold text-gray-800">{{$accepted}}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fa fa-graduation-cap fa-3x text-gray-300" aria-hidden="true"> </i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Pending Requests Card Example -->
                   
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

                    <!-- Area Chart -->
                    <div class="col-xl-4">
                        <div class="card shadow mb-4" style="height: 180px">
                            <!-- Card Body -->
                            <div class="card-body">
                                <div class="chart-area">
                                    <canvas id="genderChart" style="width:80%; max-height:200px"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="card shadow mb-4" style="height: 160px">
                            <div class="card-body">
                                <div class="chart-area">
                                    <canvas id="ipChart" style="width:80%; max-height:200px"></canvas>
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
    
    
    <!-- End of Content Wrapper -->

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
                backgroundColor: 'rgba(75, 192, 192, 1)',
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
    // Convert PHP variable to JavaScript variable
    var ipCountByTribe = @json($ipCountByTribe);

    // Check the result in the console
    console.log(ipCountByTribe);

    // Get the canvas element
    var ctx = document.getElementById('ipChart').getContext('2d');

    // Create a bar chart
    var ipChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: Object.keys(ipCountByTribe),
            datasets: [{
                label: 'Number of IPs',
                data: Object.values(ipCountByTribe),
                backgroundColor: 'rgba(75, 100, 100, 1)',
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Number of IPs'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Tribe'
                    }
                }
            }
        }
    });
    var maleCount = {{ $male }};
    var femaleCount = {{ $female }};

    // Get the canvas element
    var ctx = document.getElementById('genderChart').getContext('2d');

    // Create a bar chart
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Male', 'Female'],
            datasets: [{
                label: 'Gender Counts',
                data: [maleCount, femaleCount],
                backgroundColor: ['blue', 'pink'], // Adjust colors as needed
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
@endsection

<!-- End of Page Wrapper -->
