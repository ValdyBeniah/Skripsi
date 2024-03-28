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
            <h2 class="mb-2">Detail Transaksi untuk Tanggal: {{ $date }}</h2>
            <a href="{{ url('adminreport') }}" class="btn btn-secondary"><< Back</a>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAdminTransaksi">
              {{-- <a href="{{ url('suratjalan/view/pdf', ['id' => $item->id]) }}" style="color: white;"> --}}
                <a href="{{ url('suratjalan/view/pdf') }}" style="color: white;" target="_blank">
                  <i class="fa fa-file-text" aria-hidden="true"></i>
                  Surat Jalan
              </a>
            </button>
            <br><br>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID Transaksi</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Tanggal Pengambilan</th>
                        <th scope="col">Alamat Pickup</th>
                        <th scope="col">Alamat Tujuan</th>
                        <th scope="col">Barang</th>
                        <th scope="col">Jenis</th>
                        <th scope="col">Truk</th>
                        <th scope="col">Berat</th>
                        <th scope="col">No Telp</th>
                        <th scope="col">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transaksiDetail as $transaksi)
                    <tr>
                        <td>{{ $transaksi->id }}</td>
                        <td>{{ $transaksi->name }}</td>
                        <td>{{ $transaksi->date }}</td>
                        <td>{{ $transaksi->pickup_address }}</td>
                        <td>{{ $transaksi->destination_address }}</td>
                        <td>{{ $transaksi->barang }}</td>
                        <td>{{ $transaksi->jenis }}</td>
                        <td>{{ $transaksi->truk }}</td>
                        <td>{{ $transaksi->weight }} Kg</td>
                        <td>{{ $transaksi->phone }}</td>
                        <td>Rp {{ number_format($transaksi->total, 0, ',', '.') }}</td>
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