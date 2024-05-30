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
<!-- START FORM -->
@if ($errors->any())
    <div class="pt-3">
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $item)
                    <li>{{$item}}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif
<form action=' {{ url('admintransaksi') }} ' method='post'>
    @csrf
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <a href="{{ url('admintransaksi') }}" class="btn btn-secondary"><< Back</a>
        <div class="mb-3 row">
            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
                <select name="nama" id="nama" class="form-control" onchange="updatePickupAddress()">
                    <option value="">---</option>
                    @foreach($datas as $item)
                        <option value="{{ $item->id }}" data-pickup="{{ $item->pickup_address }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" name="tanggal" value="{{ Session::get('tanggal') }}" id="tanggal">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="pickup" class="col-sm-2 col-form-label">Alamat Pickup</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="pickup" id="pickup" readonly>
            </div>
        </div>
        <div class="mb-3 row">
          <label for="tujuan" class="col-sm-2 col-form-label">Alamat tujuan</label>
          <div class="col-sm-10">
              <input type="text" class="form-control" name='tujuan' value="{{ Session::get('tujuan') }}" id="tujuan">
          </div>
        </div>
        <div class="mb-3 row">
            <label for="barang" class="col-sm-2 col-form-label">Barang</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='barang' value="{{ Session::get('barang') }}" id="barang">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="jenis" class="col-sm-2 col-form-label">Jenis</label>
            <div class="col-sm-10">
                <select name="jenis" id="jenis" class="form-control">
                    <option value="">---</option>
                    @foreach($jenisData as $item)
                        <option value="{{ $item->jenis }}" data-harga="{{ $item->harga }}">{{ $item->jenis }}</option>
                    @endforeach
                </select>
            </div>
          </div>
          <div class="mb-3 row">
            <label for="truk" class="col-sm-2 col-form-label">Truk</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='truk' value="{{ Session::get('truk') }}" id="truk">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="supir" class="col-sm-2 col-form-label">Supir</label>
            <div class="col-sm-10">
                <select name="supir" id="supir" class="form-control" onchange="updatePlat()">
                    <option value="">---</option>
                    @foreach($supir as $item)
                        @if (!in_array($item->name, $usedSupirNames))
                            <option value="{{ $item->name }}" data-supir="{{ $item->plat }}">{{ $item->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
          <div class="mb-3 row">
            <label for="plat" class="col-sm-2 col-form-label">Plat</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='plat' id="plat">
            </div>
          </div>
        <div class="mb-3 row">
          <label for="berat" class="col-sm-2 col-form-label">Berat (KG)</label>
          <div class="col-sm-10">
              <input type="text" class="form-control" name='berat' value="{{ Session::get('berat') }}" id="berat">
          </div>
        </div>
        <div class="mb-3 row">
            <label for="telp" class="col-sm-2 col-form-label">No telp</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='telp' value="{{ Session::get('telp') }}" id="telp">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="total" class="col-sm-2 col-form-label">Total</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='total' value="{{ Session::get('total') }}" id="total">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="track" class="col-sm-2 col-form-label">Track</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='track' value="New Transaction" id="track" readonly>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary" name="submit">Save changes</button>
        </div>
      </form>
    </div>
    <!-- AKHIR FORM -->
    <script src={{ asset('js/jquery.min.js') }}></script>
    <script src={{ asset('js/popper.js') }}></script>
    <script src={{ asset('js/bootstrap.min.js') }}"></script>
    <script src={{ asset('js/main.js') }}></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            function calculateTotal() {
                let berat = parseFloat($('#berat').val()) || 0;
                let jenisHarga = $('#jenis').find(':selected').data('harga') || 0;

                let totalJenis = berat * jenisHarga;

                var total = totalJenis;
                $('#total').val(total.toString());
            }
            $('#jenis, #berat, #truk').change(calculateTotal).keyup(calculateTotal);

            calculateTotal();

            // Validasi input angka
            function validateNumberInput(event) {
                event.target.value = event.target.value.replace(/[^0-9]/g, '');
            }

            $('#truk, #berat, #telp').on('input', validateNumberInput);
        });

        function updatePickupAddress() {
            var nameSelect = document.getElementById('nama');
            var customerId = nameSelect.value;
            var pickupInput = document.getElementById('pickup');
            var selectedOption = nameSelect.options[nameSelect.selectedIndex];
            var pickupAddress = selectedOption.getAttribute('data-pickup');
            pickupInput.value = pickupAddress;

            if (customerId) {
                fetch(`/customer/${customerId}/pickup`)
                    .then(response => response.json())
                    .then(pickupAddress => {
                        pickupInput.value = pickupAddress;
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            } else {
                pickupInput.value = '';
            }
        }

        function updatePlat() {
            var supirSelect = document.getElementById('supir');
            var supirId = supirSelect.value;
            var platInput = document.getElementById('plat');
            var selectedOption = supirSelect.options[supirSelect.selectedIndex];
            var supirname = selectedOption.getAttribute('data-supir');
            platInput.value = supirname;

            if (supirId) {
                fetch(`/supir/${supirId}/plat`)
                    .then(response => response.json())
                    .then(supirname => {
                        platInput.value = supirname;
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            } else {
                platInput.value = '';
            }
        }
    </script>
