<h1 class="h3 mb-4 text-gray-800">Edit Data Pelanggan</h1>
<div class="row">
  <div class="col-sm-6">
    <div class="card mb-4 py-3 border-left-info">
      <div class="card-body">

        <?php 
        $id = $_GET['id'];
        $query = $conn->query("SELECT * FROM tb_pelanggan WHERE id_pelanggan = $id");
        $result = $query->fetch_assoc();
        ?>
        <form action="" method="post">
          <div class="mb-3 row">
            <label for="nama" class="col-sm-4 col-form-label">Nama Pelanggan</label>
            <div class="col-sm-8">
              <input type="text" value="<?= $result['nama_pelanggan']; ?>"  class="form-control" name="nama_pelanggan" id="nama" placeholder="Nama Pelanggan">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="telp" class="col-sm-4 col-form-label">No Telp</label>
            <div class="col-sm-8">
              <input type="number" value="<?= $result['telp']; ?>"  class="form-control" name="telp" id="telp" placeholder="No Telp">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
            <div class="col-sm-8">
              <textarea name="alamat" id="alamat" class="form-control" rows="5" placeholder="Alamat Pelanggan"> <?= $result['alamat']; ?></textarea>
            </div>
          </div>
          <div class="mb-3 row">
            <label for="logo" class="col-sm-4 col-form-label">Level</label>
            <div class="col-sm-8">
              <select class="form-control" name="level" aria-label="Default select example">
                <option selected>Pilih Level</option>
                <?php
                // $id_level = $result['id_level'];
                $level = $conn->query("SELECT * FROM tb_level");
                while ($data = $level->fetch_assoc()) {

                  if ($result['id_level'] == $data['id_level']) {  
                    $cek = "selected";
                  } else {
                    $cek = "";
                  }    
                  echo "<option value='$data[id_level]' $cek>".$data[p_level]."</option>";
                   
                ?>
                  <!-- <option value="<?= $data['id_level']; ?>"><?= $data['p_level']; ?></option> -->
                <?php } ?>
              </select>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>
<button type="submit" name="edit" class="btn btn-info">Submit</button>
<a href="?page=pelanggan" class="btn btn-secondary">Cancel</a>
</form>


<?php

if (isset($_POST['edit'])) {
  $nama = mysqli_real_escape_string($conn, $_POST['nama_pelanggan']);
  $telp = mysqli_real_escape_string($conn, $_POST['telp']);
  $alamat = mysqli_real_escape_string($conn, $_POST['alamat']);
  $level = mysqli_real_escape_string($conn, $_POST['level']);

  $sql = $conn->query("UPDATE tb_pelanggan SET id_level = '$level', nama_pelanggan = '$nama', alamat = '$alamat', telp = '$telp' WHERE id_pelanggan = '$id'");

  if ($sql) {
?>
    <script>
      alert("Data berhasil diubah");
      window.location.href = "?page=pelanggan";
    </script>
<?php
  }
}

?>