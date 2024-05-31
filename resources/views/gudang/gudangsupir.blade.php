<!doctype html>
<html lang="en">

<head>
    <title>Sidebar 02</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

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
        <div class="content-wrapper">
            <div id="content" class="p-4 p-md-5 pt-5">
                <h2 class="mb-4">Truk</h2>
                <!-- FORM PENCARIAN -->
                <div class="pb-3">
                    <form class="d-flex" action="{{ url('gudangsupir') }}" method="get">
                        <input class="form-control me-1" type="search" name="katakunci"
                            value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci"
                            aria-label="Search">
                        <button class="btn btn-secondary" type="submit">Cari</button>
                    </form>
                </div>
                <div class="table-container">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#modalAdminTransaksi">
                        <a href="{{ url('tambahsupir') }}" style="color: white;">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                            Tambah
                        </a>
                    </button><br><br>
                    <table class="table caption-top">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Supir</th>
                                <th scope="col">Nomor Supir</th>
                                <th scope="col">Plat Mobil</th>
                                <th scope="col">Jenis Truk</th>
                                <th scope="col">Tahun</th>
                                <th scope="col">#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = $data->firstItem(); ?>
                            @foreach ($data as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->nomor }}</td>
                                    <td>{{ $item->plat }}</td>
                                    <td>{{ $item->jenis }}</td>
                                    <td>{{ $item->tahun }}</td>
                                    <td class="btn">
                                        <div class="d-grid gap-2 gap-md-3 d-md-flex justify-content-start">
                                            <button class="btn btn-primary btn-sm me-2" type="button">
                                                <a href='{{ url('gudangsupir/' . $item->id . '/edit') }}'
                                                    style="color: white;">
                                                    Edit
                                                </a>
                                            </button>
                                            <form
                                                onsubmit="return confirm('Apakah anda yakin ingin menghapus data ini?')"
                                                action="{{ url('gudangsupir/' . $item->id) }}" method="post">
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
