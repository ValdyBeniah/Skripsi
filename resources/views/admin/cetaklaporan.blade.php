<!doctype html>
<html lang="en">
  <head>
  	<title>PT Landak Indah Sejahtera</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

    </style>
    {{-- <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet"> --}}
		
        <script src="https://kit.fontawesome.com/7b6c3c0ded.js" crossorigin="anonymous"></script>
		<link rel="stylesheet" href={{asset("css/style.css")}}>
  </head>
  <body>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">
        <h2 class="mb-4">Detail Laporan Transaksi - {{ $date }}</h2>
            <!-- Tabel Utama -->
                <table class="table table-striped">
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
          <!-- AKHIR DATA -->
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>