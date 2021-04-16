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
        <th class="align-middle text-center">Nama Barang</th>
        <th class="align-middle text-center">Jumlah</th>
        <th class="align-middle text-center">Omzet Kotor</th>
        <th class="align-middle text-center">Omzet Bersih</th>
        <th class="align-middle text-center">Harga Pokok</th>
        <th class="align-middle text-center">Laba</th>
      </tr>
    </thead>
    <tbody>
      <?php

      $namaBulan = array("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"); 
      $no = 1;
      $bulan = date("m");
      $sql = $conn->query("SELECT * from tb_penjualan JOIN tb_pelanggan on tb_penjualan.id_pelanggan = tb_pelanggan.id_pelanggan JOIN tb_barang ON tb_penjualan.id_barang = tb_barang.id_barang WHERE day(created) = '$_GET[hari]'");
      
      while ($data = $sql->fetch_assoc()) {
        $hitung_diskon = $data['diskon'] * $data['jumlah'];
        $omzet_bersih = $data['total'] - $hitung_diskon;
        $laba = $omzet_bersih - $data['harga_pokok'];
        
         
        ?>
        <tr>
          <td class="align-middle text-center"><?= $no++; ?></td>
          <td><?= $data['no_invoice']; ?></td>
          <td><?= date('d-m-y',strtotime($data['created'])); ?></td>
          <td><?= $data['nama_pelanggan']; ?></td>
          <td><?= $data['nama_barang']. " " .$data['ukuran'] . " " .$data['satuan']; ?></td>
          <td><?= $data['jumlah']; ?></td>
          <td><?= number_format($data['total']); ?></td>
          <td><?= number_format($omzet_bersih); ?></td>
          <td><?= number_format($data['harga_pokok']); ?></td>
          <td><?= number_format($laba); ?></td>
        </tr>        
        <?php } ?>

        <?php 
        $total = $conn->query("SELECT SUM(total) AS omzet, SUM(harga_pokok) AS hrg_pokok from tb_penjualan JOIN tb_pelanggan on tb_penjualan.id_pelanggan = tb_pelanggan.id_pelanggan JOIN tb_barang ON tb_penjualan.id_barang = tb_barang.id_barang WHERE day(created) = '$_GET[hari]'");

        $data_total = $total->fetch_assoc();

        $omzet_bersih = $conn->query("SELECT SUM(s_total) AS omzet_bersih FROM tb_penjualan_detail WHERE DAY(created) = '$_GET[hari]'");

        $data_bersih = $omzet_bersih->fetch_assoc();
        
        ?>
        <tr>
          <td colspan="6" class="text-right font-weight-bold">Total</td>
          <td style="display:none;"></td>
          <td style="display:none;"></td>
          <td style="display:none;"></td>
          <td style="display:none;"></td>
          <td style="display:none;"></td>
          <td style="display:none;"></td>
          <td class="font-weight-bold"><?= number_format($data_total['omzet']); ?></td>
          <td class="font-weight-bold"><?= number_format($data_bersih['omzet_bersih']); ?></td>
          <td class="font-weight-bold"><?= number_format($data_total['hrg_pokok']); ?></td>
          <td class="font-weight-bold"><?= number_format($data_bersih['omzet_bersih'] - $data_total['hrg_pokok']); ?></td>
        </tr>     
    </tbody>
    
  

  </table>
  <div class="card  my-2">
    <table class="mx-2 my-2">    
      <tr>
        <th width="20%">Omzet Kotor</th>
        <td><?= ": Rp. " .number_format($data_total['omzet']); ?></td>
      </tr>
      <tr>
        <th width="20%">Omzet Bersih</th>
        <td><?= ": Rp. " .number_format($data_bersih['omzet_bersih']); ?></td>
      </tr>
      <tr>
        <th width="20%">Harga Pokok</th>
        <td><?= ": Rp. " .number_format($data_total['hrg_pokok']); ?></td>
      </tr>
      <tr>
        <th width="20%">Laba</th>
        <td><?= ": Rp. " .number_format($data_bersih['omzet_bersih'] - $data_total['hrg_pokok']); ?></td>
      </tr>
    </table>
  </div>
  <a href="?page=lap_penjualan" class="btn btn-sm btn-secondary">Kembali</a>
  <a href="page/laporan/export.php?tanggal=<?= $_GET['hari']; ?>" target="_blank" class="btn btn-sm btn-success">Export</a>

</section>
<!-- /.content -->