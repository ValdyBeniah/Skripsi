<!doctype html>
<html lang="en">
  <head>
  	<title>Sidebar 02</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
      .content-wrapper {
        display: flex;
      }
      #content {
        flex-grow: 1;
      }
      .table-container {
        margin-top: 20px;
      }
    </style>
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
                  <a href="{{ url('gudangdashboard' )}}" data-toggle="collapse" aria-expanded="false">Dashboard</a>
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
        <div class="content-wrapper">
          <div id="content" class="p-4 p-md-5 pt-5">
            <h2 class="mb-4">Truk</h2>
            <div class="card mb-3" style="max-width: 540px;">
              <div class="row g-0">
                <div class="col-md-4">
                  <img src="{{ asset('images/truk.jpg') }}" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title">Jumlah Truk</h5>
                    @foreach ($data as $item)
                    <p class="card-text">{{ $item->jumlah }}</p>
                    @endforeach
                    <a href='{{ url('gudangbarang/'.$item->id.'/edit') }}' class="btn btn-warning btn-sm me-2">
                      Edit
                    </a>
                  </div>
                </div>
              </div>
            </div>
            </div>
          </div>
        </div>
    </div>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
  </body>
</html>
