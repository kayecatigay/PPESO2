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
                                        <h6 class="m-0 font-weight-bold text-dark">TOTAL USER</h6>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <b class="fs-2">&emsp;{{$totalusers}}</b>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-users fa-3x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6" >
                        <div class="card shadow mb-4" style="width:140%; max-height:200px">
                            <!-- Card Header - Dropdown -->
                            <div
                                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-dark">ACCEPTED APPLICANTS</h6>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body" >
                                <div class=" py-0 d-flex flex-row align-items-center justify-content-between background-none">
                                    <h6 class="m-0 font-weight-bold text-dark"><i class="fa fa-graduation-cap text-primary"><b class="fs-3">&nbsp;{{ $apeap}}</b></i>PEAP
                                    </h6>
                                    <h6 class="m-0 font-weight-bold text-dark"><i class="fa fa-briefcase text-success"><b class="fs-3">&nbsp;{{ $aemp }}</b></i>EMP
                                    </h6>
                                    <h6 class="m-0 font-weight-bold text-dark"><i class="fa fa-plane text-info"><b class="fs-3">&nbsp;{{ $aofw }}</b></i>OFW
                                    </h6>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>

                <!-- Content Row -->

                <div class="row">

                    <!-- Area Chart -->
                    <div class="col-xl-7 col-lg-6">
                        <div class="card shadow mb-4">
                            
                            <!-- Card Body -->
                            <div class="card-body">
                                <div class="chart-area">
                                    <canvas id="myChart" style="width:100%;max-width:600px"></canvas>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pie Chart -->
                    <div class="col-xl-4 ">
                        <div class="card shadow mb-4" style="height: 200px; width:400px;">
                            <div class="card-body">
                                <div class="chart-area">
                                    @foreach ($ipCountByTribe as $data)
                                    <canvas id="ipChart" style="width:80%; max-height:200px"></canvas>
                                    @endforeach
                                </div>
                            </div>  
                        </div>
                        <div class="card shadow mb-4" style="height: 190px; width:400px;">
                            <div
                                class="card-header py-1 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-dark">SERVICES</h6><h6 class="m-0 font-weight-bold text-dark">APPLICANTS</h6>
                                
                            </div>
                                <!-- Card Body -->

                                <div class="card-body">
                                    
                                    <h4 class="small font-weight-bold">PEAP<span class="float-right">{{ $totalpeap }}</span></h4>
                                    <div class="progress mb-1">
                                        <div class="progress-bar bg-dark" role="progressbar" style="width: {{ $totalpeap }}%;"  
                                        aria-valuenow="{{ $totalpeap }}" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">EMP
                                        <span class="float-right">{{ $totalemp }}</span>
                                    </h4>
                                    <div class="progress mb-1">
                                        <div class="progress-bar bg-dark" role="progressbar" style="width: {{ $totalemp }}%;"  
                                        aria-valuenow="{{ $totalemp }}" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 
                                        class="small font-weight-bold">OFW<span
                                        class="float-right">{{ $totalofw }}</span>
                                    </h4>
                                    <div class="progress mb-1">
                                        <div class="progress-bar bg-dark" role="progressbar" style="width: {{ $totalofw }}%;" 
                                        aria-valuenow="{{ $totalofw }}" aria-valuemin="0" aria-valuemax="100"></div>
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
var xValues = ["Male", "Female"];
var yValues = [{{$muser}}, {{$fuser}}];
var barColors = ["blue", "red"];

new Chart("myChart", {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    legend: {display: false},
    title: {
      display: true,
      text: "Male/Female Applicants"
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
</script>
@endsection

<!-- End of Page Wrapper -->
