<!doctype html>
<html lang="en">

<head>
    <title>PT Kesuma Express</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://use.fontawesome.com/0c7a3095b5.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
            @if (Session::has('success'))
                <div class="pt-3">
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                </div>
            @elseif (Session::has('warning'))
                <div class="pt-3">
                    <div class="alert alert-warning">
                        {{ Session::get('warning') }}
                    </div>
                </div>
            @endif
            <h2 class="mb-4">Transaksi</h2>
            <!-- FORM PENCARIAN -->
            <div class="pb-3">
                <form class="d-flex" action="{{ url('transaksi') }}" method="get">
                    <input class="form-control me-1" type="search" name="katakunci"
                        value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
                    <button class="btn btn-secondary" type="submit">Cari</button>
                </form>
            </div>
            {{-- <button class="btn btn-primary btn-sm me-2" type="button"><i class="fa fa-plus" aria-hidden="true"></i>Invoice</button><br><br> --}}
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAdminTransaksi">
                <a href="{{ url('form-transaksi') }}" style="color: white;">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                    Catat Transaksi
                </a>
            </button>
            {{-- <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#modalAdminTransaksi">
        <a href="#" style="color: white;">
            <i class="fa fa-file-text" aria-hidden="true"></i>
            Surat Jalan
        </a>
      </button> --}}
            <br><br>
            <table class="table caption-top">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Tanggal Pengambilan</th>
                        <th scope="col">Alamat Pickup</th>
                        <th scope="col">Alamat Tujuan</th>
                        <th scope="col">Barang</th>
                        <th scope="col">Jenis</th>
                        <th scope="col">Truk</th>
                        <th scope="col">Berat</th>
                        <th scope="col">Tracking</th>
                        {{-- <th scope="col">No Telp</th> --}}
                        <th scope="col">Total</th>
                        <th scope="col">#</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = $data->firstItem(); ?>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->date }}</td>
                            <td>{{ $item->pickup_address }}</td>
                            <td>{{ $item->destination_address }}</td>
                            <td>{{ $item->barang }}</td>
                            <td>{{ $item->jenis }}</td>
                            <td>{{ $item->truk }}</td>
                            <td>{{ $item->weight }} Kg</td>
                            <td>{{ $item->tracking }}</td>
                            {{-- <td>{{ $item->phone }}</td> --}}
                            {{-- <td>{{ $item->total }}</td> --}}
                            <td>Rp {{ number_format($item->total, 0, ',', '.') }}</td>
                            <td>
                                <div class="d-flex flex-column justify-content-start">
                                    <div class="d-flex justify-content-start mb-2">
                                        <a href='{{ url('transaksi/' . $item->id . '/edit') }}'
                                            class="btn btn-warning btn-sm me-2">
                                            Edit
                                        </a>
                                        {{-- <form action="{{ url('transaksi/'.$item->id.'/complete') }}" method="post" class="me-2">
                              @csrf
                              <button class="btn btn-success btn-sm" type="submit" {{ $item->is_completed ? 'disabled' : '' }}>Selesai</button>
                          </form> --}}
                                        <form onsubmit="return confirm('Apakah anda yakin ingin menghapus data ini?')"
                                            action="{{ url('transaksi/' . $item->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button name="submit" class="btn btn-danger btn-sm" type="submit">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                    <button type="button" id="tombolSuratJalan" class="btn btn-primary"
                                        data-bs-toggle="modal" data-bs-target="#modalAdminTransaksi">
                                        {{-- <a href="{{ url('suratjalan/view/pdf', ['id' => $item->id]) }}" style="color: white;"> --}}
                                        <a href="{{ url('suratjalan/view/pdf', ['id' => $item->id]) }}"
                                            style="color: white;" target="_blank">
                                            <i class="fa fa-file-text" aria-hidden="true"></i>
                                            Surat Jalan
                                        </a>
                                    </button><br>
                                    <button id="btnSimpan-{{ $item->id }}" class="btn btn-success btnSimpan"
                                        data-id="{{ $item->id }}">
                                        Lihat
                                    </button>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src={{ asset('js/jquery.min.js') }}></script>
    <script src={{ asset('js/popper.js') }}></script>
    <script src={{ asset('js/bootstrap.min.js') }}"></script>
    <script src={{ asset('js/main.js') }}></script>
    {{-- <script>
      $(document).ready(function() {
          $('#btnSimpan').click(function() {
              var data = {
                  kode: "{{ $uniqueCode }}",
                  nama: "{{ $transaction->name }}",
                  tanggal: "{{ $transaction->date }}",
                  alamatPengambilan: "{{ $transaction->pickup_address }}",
                  alamatTujuan: "{{ $transaction->destination_address }}",
                  barang: "{{ $transaction->barang }}",
                  jenis: "{{ $transaction->jenis }}",
                  truk: "{{ $transaction->truk }}",
                  berat: "{{ $transaction->weight }}",
                  phone: "{{ $transaction->phone }}",
                  total: "{{ $transaction->total }}"
              };

              $.ajax({
                  url: '{{ route("simpan-suratjalan") }}', // Ganti dengan route yang sesuai
                  type: 'POST',
                  data: data,
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                  success: function(response) {
                      // Buka PDF di tab baru
                      window.open(response.urlPdf, '_blank');
                  },
                  error: function(xhr, status, error) {
                      alert('Terjadi kesalahan saat menyimpan data.');
                  }
              });
          });
      });
  </script> --}}
    <script>
        $(document).ready(function() {
            $('.btnSimpan').click(function() {
                var transaksiId = $(this).data('id'); // Mendapatkan ID dari data-id attribute

                // Buka window baru untuk Surat Jalan dengan ID yang spesifik
                window.open('{{ url('viewsuratjalan') }}/' + transaksiId, '_blank');
            });
        });
    </script>

</body>

</html>
