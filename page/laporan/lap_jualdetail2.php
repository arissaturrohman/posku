<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h3>Detail Penjualan</h3>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item active">Laporan Penjualan</li>
      </ol>
    </div>
  </div><!-- /.container-fluid -->
</section>


<!-- Main content -->
<section class="content">
<table id="dataTable" class="table table-bordered bg-white">
    <thead>
      <tr>
        <th class="align-middle text-center" width="5%">No</th>
        <th class="align-middle text-center">No Invoice</th>
        <th class="align-middle text-center">Nama Barang</th>
        <th class="align-middle text-center">Jumlah</th>
        <th class="align-middle text-center">Total Belanja</th>
      </tr>
    </thead>
    <tbody>
      <?php

      $no = 1;
      $sql = $conn->query("SELECT * from tb_penjualan 
      JOIN tb_barang on tb_penjualan.id_barang = tb_barang.id_barang WHERE no_invoice = '$_GET[id]'");
      
      while ($data = $sql->fetch_assoc()) {
      ?>
        <tr>
          <td class="align-middle text-center"><?= $no++; ?></td>
          <td><?= $data['no_invoice']; ?></td>
          <td><?= $data['nama_barang']; ?></td>
          <td><?= $data['jumlah']; ?></td>
          <td><?= number_format($data['total']); ?></td>
        </tr>        
        <?php } ?>        
    </tbody>
  </table>
  <a href="?page=lap_penjualan" class="btn btn-sm btn-secondary">Kembali</a>
  <a href="page/penjualan/cetak_struk.php?invoice=<?=$_GET['id'];?>" target="_blank" class="btn btn-sm btn-success"><i class="fas fa-print"></i> Cetak Nota</a>
</section>
<!-- /.content -->