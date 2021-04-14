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
        $kategori = $data['kategori'];
        
        ?>
        <form action="" method="post">
        <input type="hidden" name="id_barang" value="<?= $data['id_barang']; ?>">
          <div class="mb-3 row">
            <label for="barcode" class="col-sm-4 col-form-label">Barcode</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="barcode" value="<?= $data['barcode']; ?>"placeholder="Barcode" readonly>
            </div>
          </div>
          <div class="mb-3 row">
            <label for="nama" class="col-sm-4 col-form-label">Nama Barang</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="nama" value="<?= $data['nama_barang']; ?>"placeholder="Nama Barang" autocomplete="off">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="ukuran" class="col-sm-4 col-form-label">Ukuran</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="ukuran" value="<?= $data['ukuran']; ?>" placeholder="Ukuran" autocomplete="off">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="satuan" class="col-sm-4 col-form-label">Satuan</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="satuan" value="<?= $data['satuan']; ?>"placeholder="Satuan" autocomplete="off">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="kategori" class="col-sm-4 col-form-label">Kategori</label>
            <div class="col-sm-8">
              <select name="kategori" id="kategori" class="form-control">
              <option value="" <?php if($kategori==""){echo "selected";} ?>  ></option>
              <option value="batrisiya" <?php if($kategori=="batrisiya"){echo "selected";} ?>  >Batrisiya</option>
              <option value="msglow" <?php if($kategori=="msglow"){echo "selected";} ?>  >MS Glow</option>
              <option value="facial" <?php if($kategori=="facial"){echo "selected";} ?>  >Facial</option>
              <option value="lain-lain" <?php if($kategori=="lain-lain"){echo "selected";} ?>  >Lain-lain</option>
              </select>
            </div>
          </div>
          <div class="mb-3 row">
            <label for="stok" class="col-sm-4 col-form-label">Stok</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="stok" value="<?= $data['stok']; ?>" placeholder="Stok" autocomplete="off">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="beli" class="col-sm-4 col-form-label">Harga Beli</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="beli" value="<?= $data['harga_beli']; ?>" placeholder="Harga Beli" autocomplete="off">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="jual" class="col-sm-4 col-form-label">Harga Jual</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="jual" value="<?= $data['harga_jual']; ?>" placeholder="Harga Jual" autocomplete="off">
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
  $kategori = mysqli_real_escape_string($conn, $_POST['kategori']);
  $beli = mysqli_real_escape_string($conn, $_POST['beli']);
  $jual = mysqli_real_escape_string($conn, $_POST['jual']);
  $stok = mysqli_real_escape_string($conn, $_POST['stok']);

  $sql = $conn->query("UPDATE tb_barang SET barcode = '$barcode', nama_barang = '$nama', ukuran = '$ukuran', satuan = '$satuan', kategori = '$kategori', stok = '$stok', harga_beli = '$beli', harga_jual = '$jual' WHERE id_barang = '$id_barang'");

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