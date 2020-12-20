<h1 class="h3 mb-4 text-gray-800">Add Data Stok</h1>
<div class="row">
  <div class="col-sm-6">
    <div class="card mb-4 py-3 border-left-info">
      <div class="card-body">

        <form action="" method="post">
          <input type="hidden" name="id_barang" id="id_barang">
          <div class="mb-3 row">
            <label for="barcode" class="col-sm-4 col-form-label">Barcode</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="barcode" id="barcode" placeholder="Barcode" required autofocus>
            </div>
            <div>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
          <div class="mb-3 row">
            <label for="nama" class="col-sm-4 col-form-label">Nama Barang</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="nama" id="nama_barang" readonly>
            </div>
          </div>
          <div class="mb-3 row">
            <label for="ukuran" class="col-sm-4 col-form-label">Ukuran</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="ukuran" id="ukuran" readonly>
            </div>
          </div>
          <div class="mb-3 row">
            <label for="satuan" class="col-sm-4 col-form-label">Satuan</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="satuan" id="satuan" readonly>
            </div>
          </div>
          <div class="mb-3 row">
            <label for="qty" class="col-sm-4 col-form-label">Qty</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="qty" id="qty" readonly>
            </div>
          </div>
          <div class="mb-3 row">
            <label for="stok" class="col-sm-4 col-form-label">Stok</label>
            <div class="col-sm-8">
              <input type="number" class="form-control" name="stok" required>
            </div>
          </div>
          <div class="mb-3 row">
            <label for="des" class="col-sm-4 col-form-label">Deskripsi</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="deskripsi" id="deskripsi" placeholder="Kulakan / tambahan / etc" required>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>
<button type="submit" name="submit" class="btn btn-info">Submit</button>
<button type="reset" class="btn btn-warning">Reset</button>

<a href="?page=beli" class="btn btn-secondary">Cancel</a>
</form>




<?php

if (isset($_POST['submit'])) {
  $stok = mysqli_real_escape_string($conn, $_POST['stok']);
  $id_barang = mysqli_real_escape_string($conn, $_POST['id_barang']);
  $deskripsi = mysqli_real_escape_string($conn, $_POST['deskripsi']);

  $sql = $conn->query("INSERT INTO tb_pembelian (id_barang, stok, deskripsi) VALUES('$id_barang', '$stok', '$deskripsi')");
  $stok = $conn->query("UPDATE tb_barang SET stok = stok + '$stok' WHERE id_barang = '$id_barang'");

  if ($sql) {
?>
    <script>
      alert("Data berhasil ditambah");
      window.location.href = "?page=beli";
    </script>
<?php
  }
}

?>