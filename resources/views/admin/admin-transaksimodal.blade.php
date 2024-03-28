<div class="modal fade" id="modalAdminTransaksi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!-- START FORM -->
 <form action=' {{ url('admin') }} ' method='post'>
  <div class="my-3 p-3 bg-body rounded shadow-sm">
      <div class="mb-3 row">
          <label for="nama" class="col-sm-2 col-form-label">Nama</label>
          <div class="col-sm-10">
              <input type="text" class="form-control" name='nama' id="nama">
          </div>
      </div>
      <div class="mb-3 row">
          <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
          <div class="col-sm-10">
              <input type="date" class="form-control" name='tanggal' id="tanggal">
          </div>
      </div>
      <div class="mb-3 row">
          <label for="pickup" class="col-sm-2 col-form-label">Alamat pickup</label>
          <div class="col-sm-10">
              <input type="text" class="form-control" name='pickup' id="pickup">
          </div>
      </div>
      <div class="mb-3 row">
        <label for="tujuan" class="col-sm-2 col-form-label">Alamat tujuan</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='tujuan' id="tujuan">
        </div>
      </div>
      <div class="mb-3 row">
        <label for="berat" class="col-sm-2 col-form-label">Berat</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='berat' id="berat">
        </div>
    </div>
    <div class="mb-3 row">
      <label for="telp" class="col-sm-2 col-form-label">No telp</label>
      <div class="col-sm-10">
          <input type="text" class="form-control" name='telp' id="telp">
      </div>
    </div>
    <div class="mb-3 row">
      <label for="total" class="col-sm-2 col-form-label">Total</label>
      <div class="col-sm-10">
          <input type="text" class="form-control" name='total' id="total">
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      <button type="submit" class="btn btn-primary" name="submit">Save changes</button>
    </div>
    </form>
  </div>
  <!-- AKHIR FORM -->
        </div>
        {{-- <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" name="submit">Save changes</button>
        </div> --}}
      </div>
    </div>
  </div>