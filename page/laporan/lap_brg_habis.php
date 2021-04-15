<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h3>Barang Hampir Habis</h3>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item active">Barang Hampir Habis</li>
      </ol>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
<table id="dataTable" class="table table-bordered table-hover bg-white">
    <thead>
      <tr>
        <th class="align-middle text-center" width="5%">No</th>
        <th class="align-middle text-center">Barcode Barang</th>
        <th class="align-middle text-center">Nama Barang</th>
        <th class="align-middle text-center">Stok</th>
        <!-- <th class="align-middle text-center" width="10%">Action</th> -->
      </tr>
    </thead>
    <tbody>
      <?php     
      $no = 1;
      $barang = $conn->query("SELECT * FROM tb_barang WHERE stok <= 5 group by stok");
      while ($data = $barang->fetch_assoc()) {
      
      ?>
        <tr>
          <td class="align-middle text-center"><?= $no++; ?></td>
          <td><?= $data['barcode']; ?></td>
          <td><?= $data['nama_barang']; ?></td>
          <td><?= number_format($data['stok']); ?></td>
        </tr>        
        <?php } ?>
    </tbody>
  </table>
</section>
<!-- /.content -->