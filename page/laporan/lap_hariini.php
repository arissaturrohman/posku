<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h3>Detail Penjualan Hari ini</h3>
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
<table id="dataTable" class="table table-bordered table-hover bg-white">
    <thead>
      <tr>
        <th class="align-middle text-center" width="5%">No</th>
        <th class="align-middle text-center">Barcode</th>
        <th class="align-middle text-center">Nama Pelanggan</th>
        <th class="align-middle text-center">Waktu</th>
        <th class="align-middle text-center">Total Belanja</th>
        <th class="align-middle text-center" width="10%">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php

      $namaBulan = array("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"); 
      $no = 1;
      $bulan = date("d");
      $sql = $conn->query("SELECT * from tb_penjualan 
      JOIN tb_pelanggan on tb_penjualan.id_pelanggan = tb_pelanggan.id_pelanggan
      where day(created) = '$_GET[hari]'");
      
      while ($data = $sql->fetch_assoc()) {
      ?>
        <tr>
          <td class="align-middle text-center"><?= $no++; ?></td>
          <td><?= $data['no_invoice']; ?></td>
          <td><?= $data['nama_pelanggan']; ?></td>
          <td><?= $data['created']; ?></td>
          <td><?= number_format($data['total']); ?></td>
          <td>
            <a href="">detail</a>
          </td>
        </tr>
        
        <?php }
        $omzet = $conn->query("SELECT SUM(total) AS omzet FROM tb_penjualan WHERE DAY (created) = '$_GET[hari]'");
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