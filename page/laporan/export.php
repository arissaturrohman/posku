<?php
include("../../inc/config.php");
$hari = $_GET['tanggal'];

header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Penjualan Tanggal ". date('d-m-y') .".xls");
?>

<p style="text-align:center;font-weight: bold; font-size: 15px;">Rekap Penjualan Tanggal <?= date('d-m-Y'); ?></p>

<table border="1">
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
      $sql = $conn->query("SELECT * from tb_penjualan JOIN tb_pelanggan on tb_penjualan.id_pelanggan = tb_pelanggan.id_pelanggan JOIN tb_barang ON tb_penjualan.id_barang = tb_barang.id_barang WHERE day(created) = '$hari'");
      
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
          <td><?= $data['total']; ?></td>
          <td><?= $omzet_bersih; ?></td>
          <td><?= $data['harga_pokok']; ?></td>
          <td><?= $laba; ?></td>
        </tr>        
        <?php } ?>

        <?php 
        $total = $conn->query("SELECT SUM(total) AS omzet, SUM(harga_pokok) AS hrg_pokok from tb_penjualan JOIN tb_pelanggan on tb_penjualan.id_pelanggan = tb_pelanggan.id_pelanggan JOIN tb_barang ON tb_penjualan.id_barang = tb_barang.id_barang WHERE day(created) = '$hari'");

        $data_total = $total->fetch_assoc();

        $omzet_bersih = $conn->query("SELECT SUM(s_total) AS omzet_bersih FROM tb_penjualan_detail WHERE DAY(created) = '$hari'");

        $data_bersih = $omzet_bersih->fetch_assoc();
        
        ?>
        <tr>
          <td colspan="6" class="text-right font-weight-bold">Total</td>
          <td class="font-weight-bold"><?= $data_total['omzet']; ?></td>
          <td class="font-weight-bold"><?= $data_bersih['omzet_bersih']; ?></td>
          <td class="font-weight-bold"><?= $data_total['hrg_pokok']; ?></td>
          <td class="font-weight-bold"><?= $data_bersih['omzet_bersih'] - $data_total['hrg_pokok']; ?></td>
        </tr>     
    </tbody>
  </table> <br>
  <div class="card  my-2">
    <table class="mx-2 my-2">    
      <tr>
      <td></td>
        <th width="20%" style="text-align:left;">Omzet Kotor</th>
        <td><?= ": Rp. " .number_format($data_total['omzet']); ?></td>
      </tr>
      <tr>
      <td></td>
        <th width="20%" style="text-align:left;">Omzet Bersih</th>
        <td><?= ": Rp. " .number_format($data_bersih['omzet_bersih']); ?></td>
      </tr>
      <tr>
      <td></td>
        <th width="20%" style="text-align:left;">Harga Pokok</th>
        <td><?= ": Rp. " .number_format($data_total['hrg_pokok']); ?></td>
      </tr>
      <tr>
      <td></td>
        <th width="20%" style="text-align:left;">Laba</th>
        <td><?= ": Rp. " .number_format($data_bersih['omzet_bersih'] - $data_total['hrg_pokok']); ?></td>
      </tr>
    </table>
  </div>

