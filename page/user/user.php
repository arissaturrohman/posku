<?php
// session_start();
// if(!isset($_SESSION["login"])){
//   header("Location: login.php");
//   exit;
// }

 ?>

<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Data Pengguna</h1>

  <!-- DataTales Example -->
  <div class="card shadow">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th class="text-center">No</th>
              <th class="text-center">Username</th>
              <th class="text-center">Nama</th>
              <th class="text-center">Level</th>
              <th class="text-center">Status</th>
              <th class="text-center">Aksi</th>
            </tr>
          </thead>
          <tbody>

            <?php
            $no = 1;

            $sql = $conn->query("SELECT * FROM tb_user");
            while ($data=$sql->fetch_assoc()){


             ?>
            <tr>
              <td class="text-center align-middle"><?php echo $no++; ?></td>
              <td class="align-middle"><?php echo ($data['username']); ?></td>
              <td class="align-middle"><?php echo ($data['nama_user']); ?></td>
              <td class="align-middle"><?php echo ($data['level']); ?></td>
              <td class="align-middle"><?php echo $data['status']; ?></td>
              <td class="text-center">
                <a href="?page=user&aksi=edit&id=<?php echo $data['id_user']; ?>" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-edit"></i></a>

                <a href="?page=user&aksi=ganti_pass&id=<?php echo $data['id_user']; ?>" class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="top" title="Ganti Password"><i class="fas fa-unlock"></i></a>

              </td>
            </tr>

          <?php
             } ?>

          </tbody>
        </table>
      </div>
      <a href="?page=user&aksi=add" class="btn btn-sm btn-outline-primary">Tambah</a>
    </div>
  </div>
</div>
