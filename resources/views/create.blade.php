<div class="p2">
    <div class="form-group mt-2">
        <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Karyawan" required>
    </div>
    <div class="form-group mt-2">
        <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" value="<?php echo date('Y-m-d'); ?>" required>
    </div>
    <div class="form-group mt-2">
        <input type="number" name="gaji" id="gaji" class="form-control" placeholder="Gaji Karyawan" required>
    </div>
    <div class="form-group mt-2">
        <div class="">
          <select class="form-control m-b" name="status_karyawan" id="status_karyawan">
              <option value="1">Aktif</option>
              <option value="0">Tidak Aktif</option>
          </select>
        </div>
    </div>
    <div class="form-group mt-4">
        <button class="btn btn-success" onClick="store()">Create</button>
    </div>
</div>