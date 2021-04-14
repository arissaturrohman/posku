<h1 class="h3 mb-4 text-gray-800">Add Data Barang</h1>
<div class="row">
  <div class="col-sm-6">
    <div class="card mb-4 py-3 border-left-info">
      <div class="card-body">

      <?php 
      
      $query = $conn->query("SELECT MAX(barcode) AS kd FROM tb_barang");
      $data = $query->fetch_assoc();
      $kodeBarang = $data['kd'];
      $urutan = (int) substr($kodeBarang, 4, 3);
      $urutan++;
      $huruf = "BRG";
      $kodeBarang = $huruf . sprintf("%04s",$urutan);
      // echo $kodeBarang;
      
      ?>

        <form action="" method="post">
          <div class="mb-3 row">
            <label for="barcode" class="col-sm-4 col-form-label">Barcode</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" value="<?= $kodeBarang; ?>" name="barcode" readonly>
            </div>
          </div>
          <div class="mb-3 row">
            <label for="nama" class="col-sm-4 col-form-label">Nama Barang</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="nama" placeholder="Nama Barang" autocomplete="off">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="ukuran" class="col-sm-4 col-form-label">Ukuran</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="ukuran" placeholder="Ukuran" autocomplete="off">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="satuan" class="col-sm-4 col-form-label">Satuan</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="satuan" placeholder="Satuan" autocomplete="off">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="kategori" class="col-sm-4 col-form-label">Kategori</label>
            <div class="col-sm-8">
              <select name="kategori" id="kategori" class="form-control">
                <option value=""></option>
                <option value="batrisiya">Batrisiya</option>
                <option value="msglow">MS Glow</option>
                <option value="facial">Facial</option>
                <option value="lain-lain">Lain-lain</option>
              </select>
            </div>
          </div>
          <div class="mb-3 row">
            <label for="beli" class="col-sm-4 col-form-label">Harga Beli</label>
            <div class="col-sm-8">
              <input type="number" class="form-control" name="beli" placeholder="Harga Beli" autocomplete="off">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="stok" class="col-sm-4 col-form-label">Stok</label>
            <div class="col-sm-8">
              <input type="number" class="form-control" name="stok" placeholder="Stok" autocomplete="off">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="jual" class="col-sm-4 col-form-label">Harga Jual</label>
            <div class="col-sm-8">
              <input type="number" class="form-control" name="jual" placeholder="Harga Jual" autocomplete="off">
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
  $kategori = mysqli_real_escape_string($conn, $_POST['kategori']);
  $beli = mysqli_real_escape_string($conn, $_POST['beli']);
  $jual = mysqli_real_escape_string($conn, $_POST['jual']);
  $stok = mysqli_real_escape_string($conn, $_POST['stok']);

  $sql = $conn->query("INSERT INTO tb_barang (barcode, nama_barang, ukuran, satuan, kategori, stok, harga_beli, harga_jual) VALUES('$barcode', '$nama', '$ukuran', '$satuan', '$kategori', '$stok', '$beli', '$jual')");

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