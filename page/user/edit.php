<?php 

$id = $_GET['id'];
$edit = $conn->query("SELECT * FROM tb_user WHERE id_user = '$id'");
$data = $edit->fetch_assoc();

?>

<div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">
      <div class="col-md-5">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Form Edit User</h1>
                  </div>
                  <form class="user" method="post">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" name="nama" value="<?= $data['nama_user']; ?>">
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" name="user" value="<?= $data['username']; ?>">
                    </div>
                    <div class="form-group">
                      <select name="level" id="level" class="form-control">
                        <option value="admin" <?php if($data['level']=="admin"){echo "selected";} ?>  >Admin</option>
                        <option value="kasir" <?php if($data['level']=="kasir"){echo "selected";} ?>  >Kasir</option>
                      </select>                     
                    </div>
                    <input value="Submit" type="submit" name="register" class="btn btn-primary btn-user btn-block">
                    </div>

              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <?php 
  
  if (isset($_POST["register"])) {

    $name = $_POST['nama'];
    $user = $_POST['user'];
    $level = $_POST['level'];


    $sql = $conn->query("UPDATE tb_user SET username = '$user', nama_user = '$name', level = '$level' WHERE id_user = '$id'");

    if ($sql) {
      ?>
      <script type="text/javascript">
        alert("User berhasil diubah..!");
        window.location.href="?page=user";
      </script>
      <?php
    }
  }
  
  ?>
