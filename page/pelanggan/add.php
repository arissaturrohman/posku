<h1 class="h3 mb-4 text-gray-800">Add Data Pelanggan</h1>
<div class="row">
  <div class="col-sm-6">
    <div class="card mb-4 py-3 border-left-info">
      <div class="card-body">

        <form action="" method="post">
          <div class="mb-3 row">
            <label for="nama" class="col-sm-4 col-form-label">Nama Pelanggan</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="nama_pelanggan" id="nama" placeholder="Nama Pelanggan">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="telp" class="col-sm-4 col-form-label">No Telp</label>
            <div class="col-sm-8">
              <input type="number" class="form-control" name="telp" id="telp" placeholder="No Telp">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
            <div class="col-sm-8">
              <textarea name="alamat" id="alamat" class="form-control" rows="5" placeholder="Alamat Pelanggan"></textarea>
            </div>
          </div>
          <div class="mb-3 row">
            <label for="logo" class="col-sm-4 col-form-label">Level</label>
            <div class="col-sm-8">
              <select class="form-control" name="level" aria-label="Default select example">
                <option selected>Pilih Level</option>
                <?php

                $level = $conn->query("SELECT * FROM tb_level");
                while ($data = $level->fetch_assoc()) {
                ?>
                  <option value="<?= $data['id_level']; ?>"><?= $data['p_level']; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>
<button type="submit" name="submit" class="btn btn-info">Submit</button>
<a href="?page=pelanggan" class="btn btn-secondary">Cancel</a>
</form>


<?php

if (isset($_POST['submit'])) {
  $nama = mysqli_real_escape_string($conn, $_POST['nama_pelanggan']);
  $telp = mysqli_real_escape_string($conn, $_POST['telp']);
  $alamat = mysqli_real_escape_string($conn, $_POST['alamat']);
  $level = mysqli_real_escape_string($conn, $_POST['level']);

  $sql = $conn->query("INSERT INTO tb_pelanggan (id_level, nama_pelanggan, alamat, telp) VALUES('$level', '$nama', '$alamat', '$telp')");

  if ($sql) {
?>
    <script>
      alert("Data berhasil ditambah");
      window.location.href = "?page=pelanggan";
    </script>
<?php
  }
}

?>