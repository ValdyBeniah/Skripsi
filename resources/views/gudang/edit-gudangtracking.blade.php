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
<form action=' {{ url('gudangtracking/'.$data->id) }} ' method='post'>
    @csrf
    @method('PUT')
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <a href="{{ url('gudangtracking') }}" class="btn btn-secondary"><< Back</a>
        <div class="mb-3 row">
            <label for="nama" class="col-sm-2 col-form-label">Id</label>
            <div class="col-sm-10">
                {{ $data->id }}
            </div>
        </div>
        <div class="mb-3 row">
            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='nama' value="{{ $data->name }}" id="nama">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" name='tanggal' value="{{ $data->date }}" id="tanggal">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="pickup" class="col-sm-2 col-form-label">Alamat pickup</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='pickup' value="{{ $data->pickup_address }}" id="pickup">
            </div>
        </div>
        <div class="mb-3 row">
          <label for="tujuan" class="col-sm-2 col-form-label">Alamat tujuan</label>
          <div class="col-sm-10">
              <input type="text" class="form-control" name='tujuan' value="{{ $data->destination_address }}" id="tujuan">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="berat" class="col-sm-2 col-form-label">Berat</label>
          <div class="col-sm-10">
              <input type="text" class="form-control" name='berat' value="{{ $data->weight }}" id="berat">
          </div>
      </div>
      <div class="mb-3 row">
        <label for="telp" class="col-sm-2 col-form-label">No telp</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='telp' value="{{ $data->phone }}" id="telp">
        </div>
      </div>
      <div class="mb-3 row">
        <label for="total" class="col-sm-2 col-form-label">Total</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='total' value="{{ $data->total }}" id="total">
        </div>
      </div>
      {{-- <div class="mb-3 row">
        <label for="track" class="col-sm-2 col-form-label">Track</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='track' value="{{ $data->tracking }}" id="track">
        </div>
      </div> --}}
      <div class="mb-3 row">
        <label for="track" class="col-sm-2 col-form-label">Track</label>
        <div class="col-sm-10">
            <select class="form-control" name="track" id="track">
                <option value="on progress" {{ $data->tracking == 'On progress' ? 'selected' : '' }}>On Progress</option>
                <option value="delivery" {{ $data->tracking == 'Delivery' ? 'selected' : '' }}>Delivery</option>
                <option value="finish" {{ $data->tracking == 'Finish' ? 'selected' : '' }}>Finish</option>
            </select>
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