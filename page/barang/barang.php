<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h3>Data Barang</h3>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item active">Data Barang</li>
      </ol>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
<div class="table-responsive">
  <table id="dataTable" class="table table-bordered table-hover bg-white" width="100%" cellspacing="0">
    <thead>
      <tr>
        <th class="align-middle text-center" width="5%">No</th>
        <th class="align-middle text-center">Barcode</th>
        <th class="align-middle text-center">Nama Barang</th>
        <th class="align-middle text-center">Ukuran</th>
        <!-- <th class="align-middle text-center">Satuan</th> -->
        <th class="align-middle text-center">Stok</th>
        <th class="align-middle text-center">Harga Beli</th>
        <th class="align-middle text-center">Harga Jual</th>
        <th class="align-middle text-center" width="10%">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $no = 1;
      $sql = $conn->query("SELECT * FROM tb_barang ORDER BY stok ASC");
      while ($data = $sql->fetch_assoc()) {
      ?>
        <tr>
          <td class="align-middle text-center"><?= $no++; ?></td>
          <td><?= $data['barcode']; ?></td>
          <td><?= $data['nama_barang']; ?></td>
          <td><?= $data['ukuran'] . ' ' . $data['satuan']; ?></td>
          <td><?= $data['stok']; ?></td>
          <td><?= number_format($data['harga_beli']); ?></td>
          <td><?= number_format($data['harga_jual']); ?></td>
          <td>
            <a href="?page=barang&aksi=edit&id=<?= $data['id_barang']; ?>" class="badge badge-success">edit</a>
            <a href="?page=barang&aksi=delete&id=<?= $data['id_barang']; ?>" name="delete" onclick="return confirm('Apakah anda yakin menghapus data ini...?')" class="badge badge-danger">delete</a>

          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
  <a href="?page=barang&aksi=add" class="btn btn-sm btn-primary"><i class="fas fa-plus-circle"></i> Add Data</a>
 </div>
  
</section>
<!-- /.content -->