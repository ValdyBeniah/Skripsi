<!doctype html>
<html lang="en">
  <head>
  	<title>PT Kesuma Express</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://use.fontawesome.com/0c7a3095b5.js"></script>
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
                  <a href="{{ url('adminuser') }}" data-toggle="collapse" aria-expanded="false">Users</a>
                </li>
	          <li>
	              <a href="/logout">Logout</a>
	          </li>
	        </ul>
    	</nav>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">
        @if (Session::has('success'))
            <div class="pt-3">
              <div class="alert alert-success">
                {{ Session::get('success') }}
              </div>
            </div>
        @endif
        <h2 class="mb-4">Users</h2>
        <!-- FORM PENCARIAN -->
        <div class="pb-3">
          <form class="d-flex" action="{{ url('adminuser') }}" method="get">
              <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
              <button class="btn btn-secondary" type="submit">Cari</button>
          </form>
        </div>

        <br><br>
        <table class="table caption-top">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama</th>
              <th scope="col">Email</th>
              <th scope="col">Role</th>
              <th scope="col">#</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = $data->firstItem(); ?>
            @foreach ($data as $index => $item)
                <tr>
                  <td>{{ $index + 1 }}</td>
                  <td>{{ $item->name }}</td>
                  <td>{{ $item->email }}</td>
                  <td>{{ $item->role }}</td>
                  <td class="btn">
                    <div class="d-grid gap-2 gap-md-3 d-md-flex justify-content-start">
                      <button class="btn btn-primary btn-sm me-2" type="button">
                        <a href='{{ url('adminuser/'.$item->id.'/edit') }}' style="color: white;">
                          Edit
                        </a>
                      </button>
                      <form onsubmit="return confirm('Apakah anda yakin ingin menghapus data ini?')"
                        action="{{ url('adminuser/'.$item->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button name="submit" class="btn btn-danger btn-sm" type="submit">
                          Delete
                        </button>
                      </form>
                    </div>
                  </td>
                </tr>
                <?php $i++; ?>
            @endforeach
          </tbody>
        </table>
        {{ $data->withQueryString()->links() }}
        {{-- {{ $data->withQueryString()->links() }} --}}
      </div>
		</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src={{ asset('js/jquery.min.js') }}></script>
    <script src={{ asset('js/popper.js') }}></script>
    <script src={{ asset('js/bootstrap.min.js') }}"></script>
    <script src={{ asset('js/main.js') }}></script>
  </body>
</html>