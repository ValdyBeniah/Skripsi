<!doctype html>
<html lang="en">
  <head>
    <title>PT Kesuma Express</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href={{ asset('css/style.css') }}>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
        </div>
      </nav>

      <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">
        <h2 class="mb-4">Welcome</h2>
        <div class="container">
          <div class="row justify-content-center"> <!-- Added class for centering -->
            <div class="col-md-6">
              <div class="card mb-3" style="max-width: 100%;">
                <div class="row g-0">
                  <div class="col-md-12">
                    <div class="card-body">
                      <h5 class="card-title">Welcome Back</h5>
                      @if (Auth::check())
                        <p class="card-text">Welcome back to dashboard <b>{{ Auth::user()->name }}</b></p>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card mb-3" style="max-width: 100%;">
                <div class="row g-0">
                  <div class="col-md-12">
                    <div class="card-body">
                      <h5 class="card-title">Total Pendapatan</h5>
                      <p class="card-text"><b>RP. {{ number_format($jumlahTransaksi, 0, ',', '.') }}</b></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row justify-content-center"> <!-- Added class for centering -->
            <div class="col-md-4">
              <div class="card mb-3" style="max-width: 100%;">
                <div class="row g-0">
                  <div class="col-md-12">
                    <div class="card-body">
                      <h5 class="card-title">Pendapatan Perbulan</h5>
                      <hr><br>
                      <div class="dashboard1">
                        <h3 class="card-text">RP. {{ number_format($pendapatanBulanan, 0, ',', '.') }}</h3>
                      </div>
                      <hr>
                      <div style="text-align: center">
                        <form action="{{ url('admindashboard') }}" method="get">
                          <div class="row">
                            <div class="col-sm-6">
                              <select name="bulan" id="bulan" class="form-control">
                                <option value="">Pilih Bulan</option>
                                <option value="1" {{ $selectedMonth == 1 ? 'selected' : '' }}>Januari</option>
                                <option value="2" {{ $selectedMonth == 2 ? 'selected' : '' }}>Februari</option>
                                <option value="3" {{ $selectedMonth == 3 ? 'selected' : '' }}>Maret</option>
                                <option value="4" {{ $selectedMonth == 4 ? 'selected' : '' }}>April</option>
                                <option value="5" {{ $selectedMonth == 5 ? 'selected' : '' }}>Mei</option>
                                <option value="6" {{ $selectedMonth == 6 ? 'selected' : '' }}>Juni</option>
                                <option value="7" {{ $selectedMonth == 7 ? 'selected' : '' }}>Juli</option>
                                <option value="8" {{ $selectedMonth == 8 ? 'selected' : '' }}>Agustus</option>
                                <option value="9" {{ $selectedMonth == 9 ? 'selected' : '' }}>September</option>
                                <option value="10" {{ $selectedMonth == 10 ? 'selected' : '' }}>Oktober</option>
                                <option value="11" {{ $selectedMonth == 11 ? 'selected' : '' }}>November</option>
                                <option value="12" {{ $selectedMonth == 12 ? 'selected' : '' }}>Desember</option>
                              </select>
                            </div>
                            <div class="col-sm-6">
                              <select name="tahun" id="tahun" class="form-control">
                                <option value="">Pilih Tahun</option>
                                @for($year = 2020; $year <= date('Y'); $year++)
                                  <option value="{{ $year }}" {{ $selectedYear == $year ? 'selected' : '' }}>{{ $year }}</option>
                                @endfor
                              </select>
                            </div>
                          </div>
                          <button type="submit" class="btn btn-primary mt-3">Tampilkan</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="card mb-3" style="max-width: 100%;">
                <div class="row g-0">
                  <div class="col-md-12">
                    <div class="card-body">
                      <h5 class="card-title">Pendapatan Pertahun</h5>
                      <hr><br>
                      <div class="dashboard1">
                        <h3 class="card-text">RP. {{ number_format($pendapatanTahunan, 0, ',', '.') }}</h3>
                      </div>
                      <hr>
                      <div style="text-align: center">
                        <form action="{{ url('admindashboard') }}" method="get">
                          <div class="row">
                            <div class="col-sm-12">
                              <select name="tahun" id="tahun" class="form-control">
                                <option value="">Pilih Tahun</option>
                                @for($year = 2020; $year <= date('Y'); $year++)
                                  <option value="{{ $year }}" {{ $selectedYear == $year ? 'selected' : '' }}>{{ $year }}</option>
                                @endfor
                              </select>
                            </div>
                          </div>
                          <button type="submit" class="btn btn-primary mt-3">Tampilkan</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Grafik -->
          <div class="row">
            <div class="col-md-6">
              <div class="card mb-3" style="max-width: 100%;">
                <div class="row g-0">
                  <div class="col-md-12">
                    <div class="card-body">
                      <h5 class="card-title">Perkembangan Transaksi Tahunan</h5>
                      <canvas id="transactionChart"></canvas>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card mb-3" style="max-width: 100%;">
                <div class="row g-0">
                  <div class="col-md-12">
                    <div class="card-body">
                      <h5 class="card-title">Pendapatan Tahunan</h5>
                      <canvas id="revenueChart"></canvas>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Informasi lainnya -->
          <div class="row">
            <div class="col-md-4">
              <div class="card mb-3" style="max-width: 100%;">
                <div class="row g-0">
                  <div class="col-md-12">
                    <div class="card-body">
                      <h5 class="card-title">Total Transaksi</h5>
                      <hr><br>
                      <div class="dashboard1">
                        <h3 class="card-text">{{ $jumlahData }}</h3>
                        <i class="fa fa-money fa-3x" aria-hidden="true"></i><br><br><br>
                      </div>
                      <hr>
                      <div style="text-align: center">
                        <i class="fa fa-info" aria-hidden="true" style="margin-right: 3px;"></i>
                        <a href="{{ url('admintransaksi') }}" style="color:black">More info</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-3" style="max-width: 100%;">
                <div class="row g-0">
                  <div class="col-md-12">
                    <div class="card-body">
                      <h5 class="card-title">Total Customer</h5>
                      <hr><br>
                      <div class="dashboard1">
                        <h3 class="card-text">{{ $jumlahCustomer }}</h3>
                        <i class="fa fa-users fa-3x" aria-hidden="true"></i><br><br><br>
                      </div>
                      <hr>
                      <div style="text-align: center">
                        <i class="fa fa-info" aria-hidden="true" style="margin-right: 3px;"></i>
                        <a href="{{ url('admincustomer') }}" style="color:black">More info</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-3" style="max-width: 100%;">
                <div class="row g-0">
                  <div class="col-md-12">
                    <div class="card-body">
                      <h5 class="card-title">Total Truk</h5>
                      <hr><br>
                      <div class="dashboard1">
                        <h3 class="card-text">{{ $jumlahTruk }}</h3>
                        <i class="fa fa-truck fa-3x" aria-hidden="true"></i><br><br><br>
                      </div>
                      <hr>
                      <div style="text-align: center">
                        <i class="fa fa-info" aria-hidden="true" style="margin-right: 3px;"></i>
                        <a href="" style="color:black">More info</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Tabel User -->
          <div class="row">
            <div class="col-md-8">
              <div class="card border-0">
                <div class="card-header">
                  <h5 class="card-title">Tabel User</h5>
                </div>
                <div class="card-body">
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($jumlahUser as $index => $item)
                        <tr>
                          <th scope="row">{{ $index + 1 }}</th>
                          <td>{{ $item->name }}</td>
                          <td>{{ $item->email }}</td>
                          <td>{{ $item->role }}</td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!-- End of Tabel User -->
        </div>
      </div>
    </div>
    <script src={{ asset('js/jquery.min.js') }}></script>
    <script src={{ asset('js/popper.js') }}></script>
    <script src={{ asset('js/bootstrap.min.js') }}"></script>
    <script src={{ asset('js/main.js') }}></script>
    <script>
      const transactionCtx = document.getElementById('transactionChart').getContext('2d');
      const transactionChart = new Chart(transactionCtx, {
          type: 'bar',
          data: {
              labels: @json($years),
              datasets: [{
                  label: 'Jumlah Transaksi',
                  data: @json($transactionCounts),
                  backgroundColor: 'rgba(54, 162, 235, 0.2)',
                  borderColor: 'rgba(54, 162, 235, 1)',
                  borderWidth: 1
              }]
          },
          options: {
              responsive: true,
              scales: {
                  x: {
                      beginAtZero: true,
                      title: {
                          display: true,
                          text: 'Tahun'
                      }
                  },
                  y: {
                      beginAtZero: true,
                      title: {
                          display: true,
                          text: 'Jumlah'
                      }
                  }
              }
          }
      });

      const revenueCtx = document.getElementById('revenueChart').getContext('2d');
      const revenueChart = new Chart(revenueCtx, {
          type: 'bar',
          data: {
              labels: @json($years),
              datasets: [{
                  label: 'Total Pendapatan',
                  data: @json($transactionTotals),
                  backgroundColor: 'rgba(255, 99, 132, 0.2)',
                  borderColor: 'rgba(255, 99, 132, 1)',
                  borderWidth: 1
              }]
          },
          options: {
              responsive: true,
              scales: {
                  x: {
                      beginAtZero: true,
                      title: {
                          display: true,
                          text: 'Tahun'
                      }
                  },
                  y: {
                      beginAtZero: true,
                      title: {
                          display: true,
                          text: 'Pendapatan'
                      }
                  }
              }
          }
      });
    </script>
  </body>
</html>
