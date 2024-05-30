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
                    <h1 class="admin"><a href="gudangdashboard" class="logo">Supir</a></h1>
                    @if (Auth::check())
                      <p>{{ Auth::user()->name }}</p>
                    @endif
                  <hr>
                <ul class="list-unstyled components mb-5">
                  <li>
                      <a href="{{ url('supirdashboard' )}}" data-toggle="collapse" aria-expanded="false">Dashboard</a>
                  </li>
                  <li>
                      <a href="{{ url('supirprofile') }}" data-toggle="collapse" aria-expanded="false">Profile</a>
                  </li>
                  <li>
                      <a href="{{ url('supirtransaksi') }}" data-toggle="collapse" aria-expanded="false">Transaksi</a>
                  </li>
                  <li>
                      <a href="/logout">Logout</a>
                  </li>
	              </ul>
    	</nav>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">
        <h2 class="mb-4">Welcome to Supir Dashboard</h2>
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <div class="card mb-3" style="max-width: 100%;">
                <div class="row g-0">
                  <div class="col-md-12">
                    <div class="card-body">
                      <h5 class="card-title">Welcome Back</h5>
                      @if (Auth::check())
                        <p class="card-text">Welcome back to dashboard <b>{{ Auth::user()->name }}</b></p>
                      @endif
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