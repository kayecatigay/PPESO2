
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

<!-- Begin Page Content -->
    <div class="container-fluid">
    @section('dashboard')
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 style="font-size:20px;">The subsequent information pertains to various statistics attained by the system,
            which are further elaborated in the tables and bar graphs.</h1>
        </div>

        <!-- Content Row -->
        <div class="row">
            <!-- Earnings (Monthly) Card Example -->
            <div class="card shadow mb-4 border-left-primary">
                <div class="card-body" style="width:100%; max-height:200px">
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

        <!-- Content Row -->

        <div class="row">
        <!-- Area Chart -->
            <div class="card shadow mb-4" style="height: 230px; width:400px;">
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="myChart" style="width:100%;max-width:600px"></canvas>

                    </div>
                </div>
            </div>
            &emsp; &emsp;<p><br><br><br>The illustration on the left depicts <br> the count of genders = Male & Female.</p>              

        </div>

            <!-- Pie Chart -->
        <div class="row">

            <div class="card shadow mb-4" style="height: 230px; width:400px;">
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
            &emsp;&emsp;<p><br><br><br>The illustration on the left <br>depicts the gender count of <br> applicants, while on the right <br> is the number of  IP <br> (Indigenous Person) in their respective tribe.</p>
        </div>

        <div class="row">
            
        <div class="card shadow mb-4" style="height: 200px; width:400px;">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-dark">ACCEPTED APPLICANTS</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body" >
                    <div class=" py-0 d-flex flex-row align-items-center justify-content-between background-none">
                        <h6 class="m-0 font-weight-bold text-dark"><i class="fa fa-graduation-cap text-primary"><b style="font-size:50px;">&nbsp;{{ $apeap}}</b></i>PEAP
                        </h6>
                        <h6 class="m-0 font-weight-bold text-dark"><i class="fa fa-briefcase text-success"><b style="font-size:50px;">&nbsp;{{ $aemp }}</b></i>EMP
                        </h6>
                        <h6 class="m-0 font-weight-bold text-dark"><i class="fa fa-plane text-info"><b style="font-size:50px;">&nbsp;{{ $aofw }}</b></i>OFW
                        </h6>
                    </div>
                </div> 
            </div>
            &emsp;
            <div class="card shadow mb-4" style="height: 200px; width:400px;">
                <div
                    class="card-header py-1 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-dark">SERVICES</h6><h6 class="m-0 font-weight-bold text-dark">APPLICANTS</h6>
                    
                </div>
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
    <!-- /.container-fluid -->
    @show

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
<!-- End of Page Wrapper -->
