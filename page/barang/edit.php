<h1 class="h3 mb-4 text-gray-800">Edit Data Barang</h1>
<div class="row">
  <div class="col-sm-6">
    <div class="card mb-4 py-3 border-left-info">
      <div class="card-body">


        <!-- Query tampil data -->
        <?php 
        
        $id_barang = $_GET['id'];
        $sql = $conn->query("SELECT * FROM tb_barang WHERE id_barang = '$id_barang'");
        $data = $sql->fetch_assoc();
        
        ?>
        <form action="" method="post">
        <input type="hidden" name="id_barang" value="<?= $data['id_barang']; ?>">
          <div class="mb-3 row">
            <label for="barcode" class="col-sm-4 col-form-label">Barcode</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="barcode" value="<?= $data['barcode']; ?>" id="barcode" placeholder="Barcode">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="nama" class="col-sm-4 col-form-label">Nama Barang</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="nama" value="<?= $data['nama_barang']; ?>" id="nama" placeholder="Nama Barang">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="ukuran" class="col-sm-4 col-form-label">Ukuran</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="ukuran" value="<?= $data['ukuran']; ?>" id="ukuran" placeholder="Ukuran">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="satuan" class="col-sm-4 col-form-label">Satuan</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="satuan" value="<?= $data['satuan']; ?>" id="satuan" placeholder="Satuan">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="beli" class="col-sm-4 col-form-label">Harga Beli</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="beli" value="<?= $data['harga_beli']; ?>" id="beli" placeholder="Harga Beli">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="jual" class="col-sm-4 col-form-label">Harga Jual</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="jual" value="<?= $data['harga_jual']; ?>" id="jual" placeholder="Harga Jual">
            </div>
          </div>
      </div>
    </div>
  </div>
</div>
<button type="submit" name="edit" class="btn btn-info">Submit</button>
<a href="?page=barang" class="btn btn-secondary">Cancel</a>
</form>


<?php

if (isset($_POST['edit'])) {
  $barcode = mysqli_real_escape_string($conn, $_POST['barcode']);
  $nama = mysqli_real_escape_string($conn, $_POST['nama']);
  $satuan = mysqli_real_escape_string($conn, $_POST['satuan']);
  $ukuran = mysqli_real_escape_string($conn, $_POST['ukuran']);
  $beli = mysqli_real_escape_string($conn, $_POST['beli']);
  $jual = mysqli_real_escape_string($conn, $_POST['jual']);
  $updated = date('Y-m-d');
  // $updated = 0;
  // $stok = 0;

  $sql = $conn->query("UPDATE tb_barang SET barcode = '$barcode', nama_barang = '$nama', ukuran = '$ukuran', satuan = '$satuan', harga_beli = '$beli', harga_jual = '$jual', updated = '$updated' WHERE id_barang = '$id_barang'");

  if ($sql) {
?>
    <script>
      alert("Data berhasil diubah");
      window.location.href = "?page=barang";
    </script>
<?php
  }
}

?>