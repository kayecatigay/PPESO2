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
                    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
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
                                        <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                            Users</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$totalusers}}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Earnings (Monthly) Card Example -->
                    <!-- <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            Earnings (Annual)</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->

                    <!-- Earnings (Monthly) Card Example -->

                    <!-- Pending Requests Card Example -->
                   
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
                    <div class="col-xl-4 col-lg-5">
                        <div class="card shadow mb-3">
                            <!-- Card Header - Dropdown -->
                            <div
                                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Resources</h6>
                                
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                
                                <div class="mt-4 text-center small">
                                    <span class="mr-2">
                                        <i class="fas fa-circle text-primary"></i> Direct
                                    </span>
                                    <span class="mr-2">
                                        <i class="fas fa-circle text-success"></i> Social
                                    </span>
                                    <span class="mr-2">
                                        <i class="fas fa-circle text-info"></i> Referral
                                    </span>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>

                <!-- Content Row -->
                <div class="row">

                    <!-- Content Column -->
                    <div class="col-lg-6 mb-4">

                        <!-- Project Card Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Applicants</h6>
                            </div>
                            <div class="card-body">
                                
                                <h4 class="small font-weight-bold">PEAP<span
                                        class="float-right">60%</span></h4>
                                <div class="progress mb-4">
                                    <div class="progress-bar" role="progressbar" style="width: 80%"
                                        aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                
                                <h4 class="small font-weight-bold">EMP<span
                                        class="float-right">50%</span></h4>
                                <div class="progress">
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 50%"
                                        aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                </div><br>

                                <h4 class="small font-weight-bold">OFW<span
                                        class="float-right">10%</span></h4>
                                <div class="progress">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 10%"
                                        aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>


                    </div>

                    <div class="col-lg-6 mb-4">

                        <!-- Illustrations -->
                        <!-- <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Illustrations</h6>
                            </div>
                            <div class="card-body">
                                <div class="text-center">
                                    <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                                        src="assets/img/features.jpg" alt="...">
                                </div>
                                <p>Add some quality, svg illustrations to your project courtesy of <a
                                        target="_blank" rel="nofollow" href="https://undraw.co/">unDraw</a>, a
                                    constantly updated collection of beautiful svg images that you can use
                                    completely free and without attribution!</p>
                                <a target="_blank" rel="nofollow" href="https://undraw.co/">Browse Illustrations on
                                    unDraw &rarr;</a>
                            </div>
                        </div> -->

                        <!-- Approach -->
                       

                    </div>
                </div>

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
</script>
@endsection

<!-- End of Page Wrapper -->
