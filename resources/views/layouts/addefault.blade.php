<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">


    <!-- Bootstrap core JavaScript-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <!-- Core plugin JavaScript-->
    <!-- <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        .centered-and-cropped { object-fit: cover }
    </style>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>


  

</head>

    <body id="page-top">
    @section('allcontent')
        <!-- Page Wrapper -->
        <div id="wrapper">
        @section('sidebar')
            <!-- Sidebar -->
            <ul class="navbar-nav bg-success sidebar sidebar-dark accordion" id="accordionSidebar" >
                @section('sidebar content')
                
                <div class="text-center d-none d-md-inline">
                    <button class="btn" onclick="history.back()"><i class="fa fa-undo" aria-hidden="true"></i></button>
                </div> 
                    <!-- Sidebar - Brand -->
                    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="admindashboard">
                        <div class="sidebar-brand-icon rotate-n-15">
                            <i class="bi bi-person-workspace"></i>
                        </div>
                        
                        <div class="sidebar-brand-text mx-3">Ppeso Admin </div>
                    </a>

                    <!-- Divider -->
                    <hr class="sidebar-divider my-0">

                    <!-- Nav Item - Dashboard -->
                    <li class="nav-item active">
                        <a class="nav-link" href="admindashboard">
                            <i class="fas fa-fw fa-table"></i>
                            <span>Visualization</span>
                        </a>
                    </li>

                    <!-- Divider -->
                    <hr class="sidebar-divider">

                    <!-- Heading -->
                    <div class="sidebar-heading">
                        SERVICES
                    </div>
        
                    <!-- Nav Item - Pages Collapse Menu -->
                                    
                    @foreach ($smenu as $mkey => $menus)
                        <li class="nav-item">
                            @if(count($smenu)>0)
                                <a class="nav-link collapsed" href="peapD" data-toggle="collapse" data-target="#collapse{{$mkey}}"
                                    aria-expanded="true" aria-controls="collapse{{$mkey}}">
                                    <i class="fa fa-folder" aria-hidden="true"></i>
                                    <span>{{ $menus[0] }}</span>
                                </a>
                                <div id="collapse{{$mkey}}" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                                    <div class="bg-white py-2 collapse-inner rounded">
                                        <h6 class="collapse-header">SERVICES</h6>
                                        @foreach ($menus[2] as $submenu)
                                            <a class="collapse-item" href="{{ $submenu[1] }}">{{ $submenu[0] }}</a>
                                        @endforeach
                                    </div>
                                </div>
                            @else
                                <a class="nav-link" href="usersD" aria-expanded="true" aria-controls="collapsePages">
                                    <i class="fa fa-users" aria-hidden="true"></i>
                                    <span>NONE</span>
                                </a>
                            @endif
                        </li>
                    @endforeach
                    
                    

                    <!-- Divider -->
                    <hr class="sidebar-divider">

                    <!-- Heading -->
                    <div class="sidebar-heading">
                        GENERAL
                    </div>

                    <!-- Nav Item - Pages Collapse Menu -->
                    @if(Auth::user()->roles == 5)
                        <li class="nav-item">
                            <a class="nav-link" href="usersD" aria-expanded="true" aria-controls="collapsePages">
                                <i class="fa fa-users" aria-hidden="true"></i>
                                <span>Users</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="empApp" aria-expanded="true" aria-controls="collapsePages">
                                <i class="fa fa-users" aria-hidden="true"></i>
                                <span>Employer</span>
                            </a>
                        </li>

                    @endif


                    <li class="nav-item">
                        <a class="nav-link" href="SendSms" aria-expanded="true" aria-controls="collapsePages">
                        <i class="fa fa-envelope" aria-hidden="true"></i>     
                        <span>Send SMS</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="adminhomepage">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            <span>Homepage</span></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="edithomepage">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            <span>Edit</span></a>
                    </li>

                    <!-- Divider -->
                    <hr class="sidebar-divider d-none d-md-block">

                    <!-- Sidebar Toggler (Sidebar) -->
                    <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle">
                    </div>    
                @show
            </ul>
            <!-- End of Sidebar -->
        @show
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
        @section('topbardefault')   
            @section('search')
                <!-- Topbar Search -->
            @show
                <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>    
                
            
                <!-- Topbar Navbar -->   
                <ul class="navbar-nav ml-auto">

                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                    <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                            aria-labelledby="searchDropdown">
                            <form class="form-inline mr-auto w-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small"
                                        placeholder="Search for..." aria-label="Search"
                                        aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>

                    @section('alerts')
                        
                    @show
                    @section('messages')
                        
                    @show
                    @section('userinfo')
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" 
                            data-bs-toggle="dropdown" style="color:black;" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="userprofile">Profile</a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }} <br>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @show

                </ul>
            </nav>
        @show
            @section('maincontent')
                    <!-- main content -->
            @show
            <!-- End of Content Wrapper -->
        </div>
        <!-- End of Page Wrapper -->
    @show
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                   
                    <a class="btn btn-primary" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                        {{ __('Yes') }} <br>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Custom scripts for all pages-->

    <script src="assets/js/sb-admin-2.min.js"></script>

</body>

</html>