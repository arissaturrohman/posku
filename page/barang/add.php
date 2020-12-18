<h1 class="h3 mb-4 text-gray-800">Add Data Barang</h1>
<div class="row">
  <div class="col-sm-6">
    <div class="card mb-4 py-3 border-left-info">
      <div class="card-body">

        <form action="" method="post">
          <div class="mb-3 row">
            <label for="barcode" class="col-sm-4 col-form-label">Barcode</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="barcode" id="barcode" placeholder="Barcode">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="nama" class="col-sm-4 col-form-label">Nama Barang</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Barang">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="ukuran" class="col-sm-4 col-form-label">Ukuran</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="ukuran" id="ukuran" placeholder="Ukuran">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="satuan" class="col-sm-4 col-form-label">Satuan</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="satuan" id="satuan" placeholder="Satuan">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="beli" class="col-sm-4 col-form-label">Harga Beli</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="beli" id="beli" placeholder="Harga Beli">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="jual" class="col-sm-4 col-form-label">Harga Jual</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="jual" id="jual" placeholder="Harga Jual">
            </div>
          </div>
      </div>
    </div>
  </div>
</div>
<button type="submit" name="submit" class="btn btn-info">Submit</button>
<a href="?page=barang" class="btn btn-secondary">Cancel</a>
</form>


<?php

if (isset($_POST['submit'])) {
  $barcode = mysqli_real_escape_string($conn, $_POST['barcode']);
  $nama = mysqli_real_escape_string($conn, $_POST['nama']);
  $satuan = mysqli_real_escape_string($conn, $_POST['satuan']);
  $ukuran = mysqli_real_escape_string($conn, $_POST['ukuran']);
  $beli = mysqli_real_escape_string($conn, $_POST['beli']);
  $jual = mysqli_real_escape_string($conn, $_POST['jual']);
  $created = date('Y-m-d');
  $updated = 0;
  // $stok = 0;

  $sql = $conn->query("INSERT INTO tb_barang (barcode, nama_barang, ukuran, satuan, harga_beli, harga_jual, created, updated) VALUES('$barcode', '$nama', '$ukuran', '$satuan', '$beli', '$jual', '$created', '$updated')");

  if ($sql) {
?>
    <script>
      alert("Data berhasil ditambah");
      window.location.href = "?page=barang";
    </script>
<?php
  }
}

?>