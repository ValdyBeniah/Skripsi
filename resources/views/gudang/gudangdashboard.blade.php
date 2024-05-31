<!doctype html>
<html lang="en">

<head>
    <title>Sidebar 02</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href={{ asset('css/style.css') }}>
</head>

<body>
    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar">
            <div class="custom-menu">
                <button type="button" id="sidebarCollapse" class="btn btn-primary">
                    <i class="fa fa-bars"></i>
                    <span class="sr-only">Toggle Menu</span>
                </button>
            </div>
            <div class="p-4 pt-5">
                <h1 class="admin"><a href="gudangdashboard" class="logo">Gudang</a></h1>
                @if (Auth::check())
                    <p>{{ Auth::user()->name }}</p>
                @endif
                <hr>
                <ul class="list-unstyled components mb-5">
                    <li>
                        <a href="{{ url('gudangdashboard') }}" data-toggle="collapse"
                            aria-expanded="false">Dashboard</a>
                    </li>
                    <li>
                        <a href="{{ url('gudangprofile') }}" data-toggle="collapse" aria-expanded="false">Profile</a>
                    </li>
                    <li>
                        <a href="{{ url('gudangbarang') }}" data-toggle="collapse" aria-expanded="false">Truk</a>
                    </li>
                    <li>
                        <a href="{{ url('gudangsupir') }}" data-toggle="collapse" aria-expanded="false">Supir</a>
                    </li>
                    <li>
                        <a href="{{ url('gudangtracking') }}" data-toggle="collapse" aria-expanded="false">Tracking</a>
                    </li>
                    <li>
                        <a href="/logout">Logout</a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Page Content  -->
        <div id="content" class="p-4 p-md-5 pt-5">
            <h2 class="mb-4">Welcome to Gudang Dashboard</h2>
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card mb-3" style="max-width: 100%;">
                            <div class="row g-0">
                                <div class="col-md-12">
                                    <div class="card-body">
                                        <h5 class="card-title">Welcome Back</h5>
                                        @if (Auth::check())
                                            <p class="card-text">Welcome back to dashboard
                                                <b>{{ Auth::user()->name }}</b>
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card mb-3" style="max-width: 100%;">
                            <div class="row g-0">
                                <div class="col-md-12">
                                    <div class="card-body">
                                        <h5 class="card-title">Total Truk</h5>
                                        <p class="card-text"><b>{{ $jumlahTruk }}</b></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-3" style="max-width: 100%;">
                            <div class="row g-0">
                                <div class="col-md-12">
                                    <div class="card-body">
                                        <h5 class="card-title">On Progress</h5>
                                        <hr><br>
                                        <div class="dashboard1">
                                            <h3 class="card-text">{{ $onProgressCount }}</h3>
                                            <i class="fa fa-spinner fa-3x" aria-hidden="true"></i><br><br><br>
                                        </div>
                                        <hr>
                                        <div style="text-align: center">
                                            <i class="fa fa-info" aria-hidden="true" style="margin-right: 3px;"></i>
                                            <a href="{{ url('gudangtracking') }}" style="color:black">
                                                More info
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-3" style="max-width: 100%;">
                            <div class="row g-0">
                                <div class="col-md-12">
                                    <div class="card-body">
                                        <h5 class="card-title">Delivery by Driver</h5>
                                        <hr><br>
                                        <div class="dashboard1">
                                            <h3 class="card-text">{{ $deliveryByDriverCount }}</h3>
                                            <i class="fa fa-truck fa-3x" aria-hidden="true"></i><br><br><br>
                                        </div>
                                        <hr>
                                        <div style="text-align: center">
                                            <i class="fa fa-info" aria-hidden="true" style="margin-right: 3px;"></i>
                                            <a href="{{ url('gudangtracking') }}" style="color:black">
                                                More info
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-3" style="max-width: 100%;">
                            <div class="row g-0">
                                <div class="col-md-12">
                                    <div class="card-body">
                                        <h5 class="card-title">Complete</h5>
                                        <hr><br>
                                        <div class="dashboard1">
                                            <h3 class="card-text">{{ $completeCount }}</h3>
                                            <i class="fa fa-check-circle fa-3x" aria-hidden="true"></i><br><br><br>
                                        </div>
                                        <hr>
                                        <div style="text-align: center">
                                            <i class="fa fa-info" aria-hidden="true" style="margin-right: 3px;"></i>
                                            <a href="{{ url('gudangtracking') }}" style="color:black">
                                                More info
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!---->
                </div>
            </div>
        </div>
    </div>
    </div>

    <script src={{ asset('js/jquery.min.js') }}></script>
    <script src={{ asset('js/popper.js') }}></script>
    <script src={{ asset('js/bootstrap.min.js') }}"></script>
    <script src={{ asset('js/main.js') }}></script>
</body>

</html>
