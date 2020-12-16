<!-- Content Header (Page header) -->
<section class="content-header">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3>Data Toko</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Data Toko</li>
                </ol>
            </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <table id="example1" class="table table-bordered table-hover bg-white">
      <thead>
          <tr>
              <th class="align-middle text-center" width="5%">No</th>
              <th class="align-middle text-center">Nama Toko</th>
              <th class="align-middle text-center">No Telp</th>
              <th class="align-middle text-center">Alamat</th>
              <th class="align-middle text-center">Logo</th>
              <th class="align-middle" width="10%">Action</th>
          </tr>
      </thead>
      <tbody>
          <?php
          $no = 1;
          $sql = $conn->query("SELECT * FROM tb_toko");
          while ($data = $sql->fetch_assoc()) {
          ?>
              <tr>
                  <td class="align-middle text-center"><?= $no++; ?></td>
                  <td><?= $data['nama_toko']; ?></td>
                  <td><?= $data['no_telp']; ?></td>
                  <td><?= $data['alamat']; ?></td>
                  <td><?= $data['logo_toko']; ?></td>
                  <td>
                      <a href="?page=brand&aksi=edit&id=<?= $data['id_toko']; ?>" class="badge badge-success">edit</a>
                      <a href="?page=brand&aksi=delete&id=<?= $data['id_toko']; ?>" name="delete" onclick="return confirm('Apakah anda yakin menghapus data ini...?')" class="badge badge-danger">delete</a>

                  </td>
              </tr>
          <?php } ?>
      </tbody>
  </table>
  <a href="?page=brand&aksi=add" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Add Data</a>


</section>
<!-- /.content -->