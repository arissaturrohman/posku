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
        <th class="align-middle text-center">Tanggal</th>
        <th class="align-middle text-center">Nama Pelanggan</th>
        <th class="align-middle text-center">Total</th>
        <!-- <th class="align-middle text-center">Total</th> -->
        <th class="align-middle text-center" width="10%">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php

      $namaBulan = array("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"); 
      $no = 1;
      $bulan = date("m");
      $sql = $conn->query("SELECT nama_pelanggan, no_invoice, created, SUM(total) AS total from tb_penjualan 
      JOIN tb_pelanggan on tb_penjualan.id_pelanggan = tb_pelanggan.id_pelanggan
      where month(created) = '$_GET[bulan]' GROUP BY no_invoice");

      // $total = $conn->query("SELECT SUM(total) AS total from tb_penjualan where month(created) = '$_GET[bulan]' GROUP BY no_invoice");
      
      while ($data = $sql->fetch_assoc()) {
          // while($data_total = $total->fetch_assoc()){
        ?>
        <tr>
          <td class="align-middle text-center"><?= $no++; ?></td>
          <td><?= $data['no_invoice']; ?></td>
          <td><?= date('d-m-Y',strtotime($data['created'])); ?></td>
          <td><?= $data['nama_pelanggan']; ?></td>
          <!-- <td><?= $data['total']; ?></td> -->
          <td><?= number_format($data['total']); ?></td>
          <td>
            <a href="?page=lap_penjualan&aksi=lihat&id=<?= $data['no_invoice']; ?>" class="badge badge-success">detail</a>
            <a href="?page=lap_penjualan&aksi=delete&id=<?= $data['no_invoice']; ?>" onclick="return confirm('Apakah anda yakin menghapus transaksi ini...?')" class="badge badge-danger">delete</a>

          </td>
        </tr>
        
        <?php } ?>
        <?php
        $omzet = $conn->query("SELECT SUM(total) AS omzet FROM tb_penjualan WHERE MONTH (created) = '$_GET[bulan]'");
        $data_omzet = $omzet->fetch_assoc();
        ?>
        <tr>
          <td colspan = "4" class="text-right font-weight-bold">Jumlah Total</td>
          <td style="display:none;"></td>
          <td style="display:none;"></td>
          <td style="display:none;"></td>
          <td class="font-weight-bold"><?= number_format($data_omzet['omzet']); ?></td>
          <td></td>
        </tr>
    </tbody>
  </table>
  <a href="?page=lap_penjualan" class="btn btn-sm btn-secondary">Kembali</a>
</section>
<!-- /.content -->