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
                        <a href="{{ url('supirdashboard') }}" data-toggle="collapse" aria-expanded="false">Dashboard</a>
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
                    <input class="form-control me-1" type="search" name="katakunci"
                        value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
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
                        <th scope="col">Keterangan</th>
                        <th scope="col">Foto</th>
                        <th scope="col">#</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
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
                            <td>{{ $item->bukti->keterangan ?? '' }}</td>
                            <td>
                                @if ($item->bukti)
                                    <img src="{{ asset('storage/' . $item->bukti->gambar) }}"
                                        alt="gambar bukti transaksi" width="200">
                                @else
                                    <form action="{{ url('supirtransaksi/upload') }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input type="file" name="file" required>
                                        <input type="text" name="keterangan" placeholder="Keterangan" required>
                                        <input type="hidden" name="transaksi_id" value="{{ $item->id }}">
                                        <button type="submit" class="btn btn-primary btn-sm">Upload</button>
                                    </form>
                                @endif
                            </td>
                            {{-- <td>
                                @if ($item->bukti)
                                    <img src="{{ asset('storage/' . $item->bukti->gambar) }}" alt="Image" width="50">
                                @else
                                    <form action="{{ url('supirtransaksi/upload') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <input type="file" name="file" required>
                                        <input type="text" name="keterangan" placeholder="Keterangan" required>
                                        <input type="hidden" name="transaksi_id" value="{{ $item->id }}">
                                        <button type="submit" class="btn btn-primary btn-sm">Upload</button>
                                    </form>
                                @endif
                            </td>
                            <td>{{ $item->bukti->keterangan ?? '' }}</td>
                            <td></td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $data->withQueryString()->links() }}
        </div>
    </div>
    </div>

    <script src={{ asset('js/jquery.min.js') }}></script>
    <script src={{ asset('js/popper.js') }}></script>
    <script src={{ asset('js/bootstrap.min.js') }}"></script>
    <script src={{ asset('js/main.js') }}></script>
</body>

</html>
