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
                    <h1 class="h4 text-gray-900 mb-4">Form Add User</h1>
                  </div>
                  <form class="user" method="post">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" name="nama" placeholder="Nama Lengkap">
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" name="user" placeholder="Masukkan Username">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" name="pass" placeholder="Masukkan Password">
                    </div>
                    <div class="form-group">
                      <select name="level" id="level" class="form-control">
                        <option value="admin">Admin</option>
                        <option value="kasir">Kasir</option>
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
    $status = "aktif";

    //enkripsi Password
    $pass = password_hash($_POST["pass"], PASSWORD_DEFAULT);

    $sql = $conn->query("INSERT INTO tb_user (username, password, nama_user, level, status) values('$user', '$pass', '$name', '$level', '$status')");

    if ($sql) {
      ?>
      <script type="text/javascript">
        alert("User berhasil ditambahkan..!");
        window.location.href="?page=user";
      </script>
      <?php
    }
  }
  
  ?>
