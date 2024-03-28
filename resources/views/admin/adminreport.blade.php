<!doctype html>
<html lang="en">
  <head>
  	<title>PT Kesuma Express</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
        <h2 class="mb-4">Report</h2>
        <table class="table caption-top">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Tanggal Transaksi</th>
              <th scope="col">Jumlah Transaksi</th>
              <th scope="col">Total Transaksi</th>
              <th scope="col">#</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($reports as $index => $report)
            <tr>
              <th scope="row">{{ $index + 1 }}</th>
              <td>{{ $report->date }}</td>
              <td>{{ $report->jumlah_transaksi }}</td>
              <td>Rp {{ number_format($report->total_transaksi, 0, ',', '.') }}</td>
              <td class="btn">
                <div class="d-grid gap-2 gap-md-0 d-md-flex justify-content-start">
                  <button class="btn btn-warning btn-sm me-2" type="button">
                    <a href="{{ route('admindetailreport.detail', $report->date) }}" style="color: white;">
                      Detail
                    </a>
                  </button>
                </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
		</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src={{ asset('js/jquery.min.js') }}></script>
    <script src={{ asset('js/popper.js') }}></script>
    <script src={{ asset('js/bootstrap.min.js') }}"></script>
    <script src={{ asset('js/main.js') }}></script>
  </body>
</html>