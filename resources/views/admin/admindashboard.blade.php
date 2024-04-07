<!doctype html>
<html lang="en">
  <head>
  	<title>PT Kesuma Express</title>
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
		  		<h1 class="admin"><a href="admindashboard" class="logo">Admin</a></h1>
                  @if (Auth::check())
                    <p>{{ Auth::user()->name }}</p>
                  @endif
                <hr>
	        <ul class="list-unstyled components mb-5">
              <li>
                <a href="{{ url('admindashboard') }}" data-toggle="collapse" aria-expanded="false">Dashboard</a>
              </li>
              <li>
                  <a href="{{ url('adminprofile') }}" data-toggle="collapse" aria-expanded="false">Profile</a>
              </li>
              <li>
                  <a href="{{ url('admintransaksi') }}" data-toggle="collapse" aria-expanded="false">Transaksi</a>
              </li>
              <li>
                  <a href="{{ url('adminreport') }}" data-toggle="collapse" aria-expanded="false">Report</a>
              </li>
              <li>
                  <a href="{{ url('admincustomer') }}" data-toggle="collapse" aria-expanded="false">Customers</a>
              </li>
	          <li>
	              <a href="/logout">Logout</a>
	          </li>
	        </ul>
    	</nav>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">

        <h2 class="mb-4">Welcome</h2>
        <div class="container">
          <div class="row">
            <div class="col-md-4">
              <div class="card text-dark bg-success mb-3" style="max-width: 100%;">
                <h5 class="card-header">Transaksi</h5>
                <div class="card-body">
                  <div class="dashboard1">
                    <h3 class="card-title">{{ $jumlahData }}</h3>
                    <i class="fa fa-money fa-3x" aria-hidden="true"></i>
                  </div>
                </div>
                <div class="card-footer border-success" style="text-align: center">
                  <i class="fa fa-info" aria-hidden="true" style="margin-right: 3px;"></i>
                  <a href="{{ url('admintransaksi') }}" style="color:black">
                    More info
                  </a>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card text-dark bg-info mb-3" style="max-width: 100%;">
                <h5 class="card-header">Customer</h5>
                <div class="card-body">
                  <div class="dashboard2">
                    <h3 class="card-title">{{ $jumlahCustomer }}</h3>
                    <i class="fa fa-users fa-3x" aria-hidden="true"></i>
                  </div>
                </div>
                <div class="card-footer border-info" style="text-align: center">
                  <i class="fa fa-info" aria-hidden="true" style="margin-right: 3px;"></i>
                  <a href="{{ url('admincustomer') }}" style="color:black">
                    More info
                  </a>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card text-dark bg-light mb-3" style="max-width: 100%;">
                <h5 class="card-header">Truk</h5>
                <div class="card-body">
                  <div class="dashboard1">
                    <h3 class="card-title">{{ $jumlahTruk }}</h3>
                    <i class="fa fa-money fa-3x" aria-hidden="true"></i>
                  </div>
                </div>
                <div class="card-footer border-light" style="text-align: center">
                  <i class="fa fa-info" aria-hidden="true" style="margin-right: 3px;"></i>
                  <a href="{{ url('adminreport') }}" style="color:black">
                    More info
                  </a>
                </div>
              </div>
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
