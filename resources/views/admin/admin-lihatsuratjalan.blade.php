<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://use.fontawesome.com/0c7a3095b5.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href={{ asset('css/style.css') }}>
    <title>Document</title>
    <style>
        .container {
            width: 100%;
            padding-right: var(--bs-gutter-x, 0.75rem);
            padding-left: var(--bs-gutter-x, 0.75rem);
            margin-right: auto;
            margin-left: auto;
        }

        /* .container2 {
            display: flex;
            justify-content: space-between;
        }

        .left, .right {
            width: 48%; /* Adjust width as needed
        }

        table {
        table-layout: fixed; /* Fixed table layout ensures consistent column widths */
        /* width: 100%;
        margin-bottom: 1rem;
        } */

        th,
        td {
            padding: 0.5rem;
            word-wrap: break-word;
            /* Ensure content wraps within the cell */
            overflow-wrap: break-word;
            /* Use for better support on some PDF renderers */
        }

        /* You can set explicit widths for your columns as needed, for example: */
        .table th:nth-child(1),
        .table td:nth-child(1) {
            width: 40%;
        }

        .table th:nth-child(2),
        .table td:nth-child(2) {
            width: 60%;
        }

        .table {
            --bs-table-bg: transparent;
            --bs-table-accent-bg: transparent;
            --bs-table-striped-color: #212529;
            --bs-table-striped-bg: rgba(0, 0, 0, 0.05);
            --bs-table-active-color: #212529;
            --bs-table-active-bg: rgba(0, 0, 0, 0.1);
            --bs-table-hover-color: #212529;
            width: 100%;
            /* Anda bisa menyesuaikan ini sesuai kebutuhan */
            margin-bottom: 1rem;
            background-color: var(--bs-table-bg);
            border-spacing: 2px;
            border-collapse: separate;
            table-layout: fixed;
        }

        .table td {
            vertical-align: top;
            border-top: 1px solid #dee2e6;
        }

        .mb-4 {
            margin-bottom: 1.5rem;
            /* Anda bisa menyesuaikan ini sesuai kebutuhan */
        }

        h1 {
            font-size: 36px;
            /* Adjust the size as needed */
            margin-bottom: 0.5rem;
            text-align: center;
            /* If you want to center it */
        }
    </style>
</head>

<body>
    <div class="d-flex justify-content-center">
        <div class="my-3 p-3 bg-body rounded shadow-sm text-left" style="width: 80%; margin: auto;">
            <h1 class="mb-4">Surat Jalan</h1>
            <div class="container mt-5">
                <form action="{{ url('savesuratjalan/') }}" method="POST">
                    @csrf
                    <div class="my-3 p-3 bg-body rounded shadow-sm">
                        <div class="mb-3 row">
                            <label for="nama" class="col-sm-2 col-form-label">Kode</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="kode" name="kode" value="{{ $uniqueCode }}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="name" value="{{ $transaction->name }}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="nama" class="col-sm-2 col-form-label">Tanggal</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="date" name="date" value="{{ $transaction->date }}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="nama" class="col-sm-2 col-form-label">Alamat Penjemputan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="pickup_address" name="pickup_address" value="{{ $transaction->pickup_address }}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="nama" class="col-sm-2 col-form-label">Alamat Tujuan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="destination_address" name="destination_address" value="{{ $transaction->destination_address }}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="nama" class="col-sm-2 col-form-label">Barang</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="barang" name="barang" value="{{ $transaction->barang }}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="nama" class="col-sm-2 col-form-label">Jenis Barang</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="jenis" name="jenis" value="{{ $transaction->jenis }}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="nama" class="col-sm-2 col-form-label">Truk</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="truk" name="truk" value="{{ $transaction->truk }}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="nama" class="col-sm-2 col-form-label">Berat</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="weight" name="weight" value="{{ $transaction->weight }}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="nama" class="col-sm-2 col-form-label">No Telepon</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="phone" name="phone" value="{{ $transaction->phone }}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="nama" class="col-sm-2 col-form-label">Total</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="total" name="total" value="{{ $transaction->total }}">
                            </div>
                        </div>
                        @if (!$disableBtn)
                            <button type="submit" class="btn btn-primary">Simpan ke Database</button>
                        @elseif($disableBtn)
                            <button type="submit" disabled class="btn btn-primary">Simpan ke Database</button>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src={{ asset('js/jquery.min.js') }}></script>
    <script src={{ asset('js/popper.js') }}></script>
    <script src={{ asset('js/bootstrap.min.js') }}"></script>
    <script src={{ asset('js/main.js') }}></script>
</body>

</html>
