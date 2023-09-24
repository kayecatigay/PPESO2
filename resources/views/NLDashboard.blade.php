
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Main Content -->
    <div id="content">

        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid" style="font-family: arial, serif; 
                    display: block; margin-left: auto; margin-right: auto; width: 80%;">
            @section('dashboard')
                <!-- Page Heading -->
                <div style="display: block; margin-left: auto; margin-right: auto; width: 80%;">
                    <BR>
                        <h1 style="text-align:center;" class="h3 mb-0 text-gray-800">PROVINCIAL PESO SERVICES MANAGEMENT SYSTEM</h1> <BR></BR>
                        <h3 style="text-align:center;" class="h3 mb-0 text-gray-800">DASHBOARD</h3>
                    
                </div>

                <!-- Content Row -->

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col mr-5">
                        <div class="text-dark mb-1"><br>
                            <h3 style="text-align:center;"> Total Users = {{$totalusers}} </h3></div>
                        </div>
                    </div>
                <div class="row col-lg-5 center" style=" margin-left: auto; margin-right: auto; width: 90%;">
                    <div class="card shadow mb-3">
                        <!-- Card Header - Dropdown -->
                        <div
                            class="card-header py-7 d-flex flex-row">
                            <h6 class="m-0 font-weight-bold text-dark" 
                            style="text-align:center;">ACCEPTED</h6>
                            
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            
                            
                                
                                <span class="mr-2">
                                    
                                    <i class="text-primary font-weight-bold">{{ $apeap}} </i> PEAP
                                </span>
                                <span class="mr-2">
                                    
                                    <i class="text-success font-weight-bold">{{ $aemp }}</i> EMP
                                </span>
                                <span class="mr-2">
                                    
                                    <i class="text-info font-weight-bold">{{ $aofw }}</i> OFW
                                </span>
                            
                        </div> 
                    </div> &emsp;
                    <div class="card shadow mb-3" >
                        <div class="card-header py-7 d-flex ">
                            <h6 class="m-0 font-weight-bold text-dark">COMPANY</h6><h6 class="m-0 font-weight-bold text-dark">&emsp; USER</h6>
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

                <div class="container center">
                    
                    <!-- Area Chart -->
                    <div class="col-xl-8 col-lg-7">
                        <div class="card shadow mb-4">
                            
                            <!-- Card Body -->
                            <div class="card-body">
                                <div class="chart-area">
                                    <div class="">
                                        <canvas id="myChart" style="width:100%;max-width:600px; 
                                         margin-left: auto; margin-right: auto;" ></canvas>
                                    </div>
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
    
    </div>
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

<!-- End of Page Wrapper -->
