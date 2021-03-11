<?php 

$id = $_GET['id'];
$edit = $conn->query("SELECT * FROM tb_toko WHERE id_toko = '$id'");
$data = $edit->fetch_assoc();

?>
<h1 class="h3 mb-4 text-gray-800">Edit Data Toko</h1>
<div class="card mb-4 py-3 border-left-info">
  <div class="card-body">
    
    <form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id_toko" value="<?= $data['id_toko']; ?>">
      <div class="mb-3 row">
      <label for="toko" class="col-sm-2 col-form-label">Nama Toko</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="toko" value="<?= $data['nama_toko']; ?>" id="toko" placeholder="Nama Toko">
      </div>
      </div>
      <div class="mb-3 row">
      <label for="telp" class="col-sm-2 col-form-label">No Telp</label>
      <div class="col-sm-10">
        <input type="number" class="form-control" name="telp" value="<?= $data['no_telp']; ?>" id="telp" placeholder="No Telp">
      </div>
      </div>
      <div class="mb-3 row">
      <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="alamat" value="<?= $data['alamat']; ?>" id="alamat" placeholder="Alamat">
      </div>
      </div>
      <div class="mb-3 row">
      <label for="logo" class="col-sm-2 col-form-label">logo</label>
      <div class="col-sm-10">
      <div class="custom-file">
        <input type="file" class="custom-file-input" id="customFile" name="foto">
        <label class="custom-file-label" for="customFile">Choose file</label>
      </div>
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

$gambar1  = $_FILES['foto']['name'];
$source1  = $_FILES['foto']['tmp_name'];
$size   = $_FILES['foto']['size'];
$eks      = array('jpg', 'jpeg', 'png');
$y        = explode('.', $gambar1);
$ekstensi = strtolower(end($y));
$folder   = 'img/';
$baru1    = date('dmYHis').$gambar1;

if (in_array($ekstensi, $eks) === true) {
  if ($size > 2048) {
    move_uploaded_file($source1, $folder.$baru1);
    $sql = $conn->query("UPDATE tb_toko SET nama_toko = '$toko', no_telp = '$telp', alamat = '$alamat', logo_toko = '$baru1' WHERE id_toko = '$id'");
    if ($sql) {
      ?>
              <script>
                  alert("Data berhasil ditambah...!");
                  window.location.href = "?page=brand";
              </script>
      <?php
      
          }
        } else {
          ?>
              <script>
                  alert("Ukuran terlalu besar...!");
              </script>
      <?php
        }
      }  else {
        ?>
        <script>
            alert("Ekstensi tidak diperbolehkan...!");
        </script>
<?php
    }
  } 

?>