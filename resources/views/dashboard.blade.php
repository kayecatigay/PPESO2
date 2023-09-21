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
                                <h6 class="m-0 font-weight-bold text-dark">ACCEPTED</h6>
                                
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                
                                <div class="mt-7 text-center small">
                                    
                                    <span class="mr-5">
                                        
                                        <i class="fa fa-graduation-cap text-primary"> {{ $apeap}} </i> PEAP
                                    </span>
                                    <span class="mr-5">
                                        
                                        <i class="fa fa-briefcase text-success"> {{ $aemp }}</i> EMP
                                    </span>
                                    <span class="mr-2">
                                        
                                        <i class="fa fa-plane text-info"> {{ $aofw }}</i> OFW
                                    </span>
                                </div>
                                
                            </div> 
                        </div>
                        <div class="card shadow mb-3">
                            <div
                                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-dark">COMPANY</h6><h6 class="m-0 font-weight-bold text-dark">APPLICANTS</h6>
                                
                            </div>
                            <!-- Card Body -->

                                    <div class="card-body">
                                    @foreach ($company as $com)
                                        <h4 
                                            class="small font-weight-bold">{{ $com->cname }}<span
                                            class="float-right">{{ $com->totalapp }}</span>
                                        </h4>
                                        <div class="progress mb-2">
                                        <?php $percentage = ($com->totalapp / 100); ?>
                                        <div class="progress-bar" role="progressbar" style="width: <?= $percentage ?>%;" 
                                        aria-valuenow="<?= $com->totalapp ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    @endforeach
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
</script>
@endsection

<!-- End of Page Wrapper -->
