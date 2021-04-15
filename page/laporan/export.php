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
      </tr>
    </thead>
    <tbody>
      <?php

      $namaBulan = array("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"); 
      $no = 1;
      $bulan = date("m");
      $sql = $conn->query("SELECT * from tb_penjualan JOIN tb_pelanggan on tb_penjualan.id_pelanggan = tb_pelanggan.id_pelanggan JOIN tb_barang ON tb_penjualan.id_barang = tb_barang.id_barang WHERE day(created) = '$hari'");
      
      while ($data = $sql->fetch_assoc()) {     
      
         
        ?>
        <tr>
          <td class="align-middle text-center"><?= $no++; ?></td>
          <td><?= $data['no_invoice']; ?></td>
          <td><?= date('d-m-Y',strtotime($data['created'])); ?></td>
          <td><?= $data['nama_pelanggan']; ?></td>
          <td><?= $data['nama_barang']. " " .$data['ukuran'] . " " .$data['satuan']; ?></td>
        </tr>        
        <?php } ?>        
    </tbody>
   
   <?php 
   $total = $conn->query("SELECT SUM(total) AS omzet, SUM(harga_pokok) AS hrg_pokok, SUM(harga_pokok) AS hrg_pokok from tb_penjualan JOIN tb_pelanggan on tb_penjualan.id_pelanggan = tb_pelanggan.id_pelanggan JOIN tb_barang ON tb_penjualan.id_barang = tb_barang.id_barang WHERE day(created) = '$hari'");
    $data_total = $total->fetch_assoc();
   
   ?>

  </table> <br>
  <div class="card my-2">
    <table class="mx-2 my-2">
      <tr>
      <td></td>
        <th width="20%" style="text-align:left;">Omzet Kotor</th>
        <td><?= ": Rp. " .number_format($data_total['omzet']); ?></td>
      </tr>
        <?php 
        
        $omzet_bersih = $conn->query("SELECT SUM(s_total) AS omzet_bersih FROM tb_penjualan_detail WHERE DAY(created) = '$hari'");
        $data_bersih = $omzet_bersih->fetch_assoc();
        ?>
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

