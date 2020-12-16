<h1 class="h3 mb-4 text-gray-800">Add Data Toko</h1>
<div class="card mb-4 py-3 border-left-info">
  <div class="card-body">
    
    <form action="" method="post">
      <div class="mb-3 row">
      <label for="toko" class="col-sm-2 col-form-label">Nama Toko</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="toko" id="toko" placeholder="Nama Toko">
      </div>
      </div>
      <div class="mb-3 row">
      <label for="telp" class="col-sm-2 col-form-label">No Telp</label>
      <div class="col-sm-10">
        <input type="number" class="form-control" name="telp" id="telp" placeholder="No Telp">
      </div>
      </div>
      <div class="mb-3 row">
      <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat">
      </div>
      </div>
      <div class="mb-3 row">
      <label for="logo" class="col-sm-2 col-form-label">logo</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="logo" id="logo" placeholder="Logo">
      </div>
      </div>

  </div>
</div>
      <button type="submit" name="submit" class="btn btn-info">Submit</button>
    </form>


<?php 

if (isset($_POST['submit'])) {
$toko = mysqli_real_escape_string($conn, $_POST['toko']);
$telp = mysqli_real_escape_string($conn, $_POST['telp']);
$alamat = mysqli_real_escape_string($conn, $_POST['alamat']);
$logo = mysqli_real_escape_string($conn, $_POST['logo']);

  $sql = $conn->query("INSERT INTO tb_toko (nama_toko, no_telp, alamat, logo_toko) VALUES('$toko', '$telp', '$alamat', '$logo')");

  if ($sql) {
    ?>
    <script>
      alert("Data berhasil ditambah");
      window.location.href="?page=brand";
    </script>
    <?php
  }
}

?>