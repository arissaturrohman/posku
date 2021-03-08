<h1 class="h3 mb-4 text-gray-800">Edit Data Stok</h1>
<div class="row">
  <div class="col-sm-6">
    <div class="card mb-4 py-3 border-left-info">
      <div class="card-body">

        <?php 
        
        $id_beli = $_GET['id'];
        $sql_beli = $conn->query("SELECT * FROM tb_pembelian, tb_barang WHERE tb_pembelian.id_barang = tb_barang.id_barang AND id_beli = '$id_beli'");
        $data = $sql_beli->fetch_assoc();
        ?>
        <form action="" method="post">
          <input type="hidden" name="id_barang" value="<?= $data['id_barang']; ?>" id="id_barang">
          <input type="hidden" name="id_beli" value="<?= $data['id_beli']; ?>" id="id_beli">
          <div class="mb-3 row">
            <label for="barcode" class="col-sm-4 col-form-label">Barcode</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="barcode" value="<?= $data['barcode']; ?>" id="barcode" placeholder="Barcode" required autofocus>
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
              <input type="text" class="form-control" name="nama" value="<?= $data['nama_barang']; ?>" id="nama_barang" readonly>
            </div>
          </div>
          <div class="mb-3 row">
            <label for="ukuran" class="col-sm-4 col-form-label">Ukuran</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="ukuran" value="<?= $data['ukuran']; ?>" id="ukuran" readonly>
            </div>
          </div>
          <div class="mb-3 row">
            <label for="satuan" class="col-sm-4 col-form-label">Satuan</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="satuan" value="<?= $data['satuan']; ?>" id="satuan" readonly>
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
              <input type="number" class="form-control" name="stok" value="<?= $data['stok']; ?>" required>
            </div>
          </div>
          <div class="mb-3 row">
            <label for="des" class="col-sm-4 col-form-label">Deskripsi</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="deskripsi" value="<?= $data['deskripsi']; ?>" id="deskripsi" placeholder="Kulakan / tambahan / etc" required>
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

  $sql = $conn->query("UPDATE tb_pembelian SET id_barang = '$id_barang', stok = '$stok' WHERE id_beli = '$id_beli'");
  $stok = $conn->query("UPDATE tb_barang SET stok = stok - '$stok' WHERE id_barang = '$id_barang'");

  if ($sql) {
?>
    <script>
      alert("Data berhasil diubah");
      window.location.href = "?page=beli";
    </script>
<?php
  }
}

?>