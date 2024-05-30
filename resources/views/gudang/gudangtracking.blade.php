<!doctype html>
<html lang="en">
<head>
    <title>PT Kesuma Express</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href={{ asset('css/style.css') }}>
    <script src="https://use.fontawesome.com/0c7a3095b5.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body {
            background-color: #FEFBF6;
        }

        form {
            width: 80%;
            margin-left: 10%;
            margin-top: 2%;
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
        <div id="content" class="p-4 p-md-5 pt-5">
            @if (Session::has('success'))
                <div class="pt-3">
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                </div>
            @endif
            <h2 class="mb-4">Tracking</h2>
            <!-- FORM PENCARIAN -->
            <div class="pb-3">
                <form class="d-flex" action="{{ url('gudangtracking') }}" method="get">
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
                        <th scope="col">Tanggal Pengambilan</th>
                        <th scope="col">Alamat Pickup</th>
                        <th scope="col">Alamat Tujuan</th>
                        <th scope="col">Truk</th>
                        <th scope="col">Supir</th>
                        <th scope="col">Plat</th>
                        <th scope="col">Berat</th>
                        <th scope="col">No Telp</th>
                        <th scope="col">Total</th>
                        <th scope="col">Status</th>
                        <th scope="col">#</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->date }}</td>
                            <td>{{ $item->pickup_address }}</td>
                            <td>{{ $item->destination_address }}</td>
                            <td>{{ $item->truk }}</td>
                            <td>{{ $item->supir }}</td>
                            <td>{{ $item->plat }}</td>
                            <td>{{ $item->weight }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>Rp {{ number_format($item->total, 0, ',', '.') }}</td>
                            <td>{{ $item->tracking }}</td>
                            <td class="btn">
                                <div class="d-grid gap-2 gap-md-3 d-md-flex justify-content-start">
                                    <button class="btn btn-warning btn-sm me-2" type="button" style="margin-right: 3px;">
                                        <a href='{{ url('gudangtracking/'.$item->id.'/edit') }}' style="color: white;">Edit</a>
                                    </button>
                                    <form action="{{ url('tracking/'.$item->id.'/complete') }}" method="post" class="me-2">
                                        @csrf
                                        <button class="btn btn-success btn-sm" type="submit" {{ $item->is_completed ? 'disabled' : '' }}>Selesai</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $data->withQueryString()->links() }}
        </div>
    </div>

    <script src={{ asset('js/jquery.min.js') }}></script>
    <script src={{ asset('js/popper.js') }}></script>
    <script src={{ asset('js/bootstrap.min.js') }}></script>
    <script src={{ asset('js/main.js') }}></script>
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            document.querySelectorAll('.btn-success').forEach(button => {
                button.addEventListener('click', function() {
                    button.disabled = true;
                    button.form.submit();
                });
            });
        });
    </script>
</body>
</html>
