<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h3>Data Pembelian</h3>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item active">Data Pembelian</li>
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
        <th class="align-middle text-center">Barcode</th>
        <th class="align-middle text-center">Nama Barang</th>
        <th class="align-middle text-center">Stok</th>
        <th class="align-middle text-center">Deskripsi</th>
        <th class="align-middle text-center">Tanggal</th>
        <th class="align-middle text-center" width="10%">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $no = 1;
      $sql = $conn->query("SELECT * FROM tb_pembelian");
      while ($data = $sql->fetch_assoc()) {
      ?>
        <tr>
          <td class="align-middle text-center"><?= $no++; ?></td>
          <?php
          $id_barang = $data['id_barang'];
          $beli = $conn->query("SELECT * FROM tb_barang WHERE id_barang = '$id_barang'");
          $data_beli = $beli->fetch_assoc();
          ?>
          <td><?= $data_beli['barcode']; ?></td>
          <td><?= $data_beli['nama_barang']; ?></td>
          <td><?= $data['stok']; ?></td>
          <td><?= $data['deskripsi']; ?></td>
          <td><?= date('Y-m-d', strtotime($data['created'])); ?></td>
          <td>
            <a href="?page=beli&aksi=edit&id=<?= $data['id_beli']; ?>" class="badge badge-success">edit</a>
            <!-- <a href="?page=beli&aksi=delete&id=<?= $data['id_beli']; ?>&id_barang=<?= $data_beli['id_barang']; ?>" onclick="return confirm('Apakah anda yakin menghapus data ini...?')" class="badge badge-danger">delete</a> -->

          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
  <a href="?page=beli&aksi=add" class="btn btn-xs btn-primary"><i class="fas fa-plus-circle"></i> Add Data</a>


</section>
<!-- /.content -->