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
                    <a href="/printSDashboard" target="_blank" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
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
                                            <br><br><br><br>No data is currently available.
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
                                          <br>  Accepted Scholar
                                        </div>
                                        <div class="h1 font-weight-bold text-gray-800">
                                        &emsp;&emsp;{{$accepted}}
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fa fa-graduation-cap fa-3x text-gray-300" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- Bar Chart -->
                    <div class="col-xl-7 col-lg-6">
                        <div class="card shadow mb-4">
                            <!-- Card Body -->
                            <div class="card-body">
                                <h5 style="text-align: center;">Graduated per School</h5>
                                <div class="chart-area">
                                    @if(empty($graduates))
                                        <br><br><br>No data is currently available.
                                    @else
                                        <canvas id="mygradChart" style="width:100%; max-width:600px"></canvas>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Area Chart -->
                    <div class="col-xl-4">
                        
                        <div class="card shadow mb-4" style="height: 200px; width:400px;">
                            <div class="card-body">
                                <div class="chart-area">
                                    @if(empty($ipCountByTribe))
                                        <br><br>No data is currently available.
                                        @else
                                        @foreach ($ipCountByTribe as $data)
                                            <canvas id="ipChart" style="width:80%; max-height:200px"></canvas>
                                        @endforeach
                                    @endif
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

    // ====================================

    
    var data = {!! json_encode($graduates) !!};

    // Extract unique school names
    var uniqueSchools = [...new Set(data.map(item => item.school))];

    // Initialize datasets
    var datasets = uniqueSchools.map(school => {
        return {
            label: school,
            data: [],
            backgroundColor: getRandomColor(),
            borderWidth: 1
        };
    });

    // Populate datasets with counts for each graduation year
    data.forEach(item => {
        var datasetIndex = uniqueSchools.indexOf(item.school);
        datasets[datasetIndex].data.push(item.GraduatesCount);
    });

    // Create a bar chart using Chart.js
    var ctx = document.getElementById('mygradChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: uniqueSchools,
            datasets: datasets
        },
        options: {
            scales: {
                x: {
                    stacked: true
                },
                y: {
                    stacked: true
                }
            }
        }
    });

    // Function to generate random colors
    function getRandomColor() {
        var letters = '0123456789ABCDEF';
        var color = '#';
        for (var i = 0; i < 6; i++) {
            color += letters[Math.floor(Math.random() * 16)];
        }
        return color;
    }
</script>

<script>
const xValues = ["Male", "Female"];
const yValues = [{{ $male }}, {{$female}}];
const barColors = [
  "#2b5797",
  "#e8c3b9"

];

new Chart("myChart", {
  type: "pie",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  }
});
</script>
@endsection

<!-- End of Page Wrapper -->
