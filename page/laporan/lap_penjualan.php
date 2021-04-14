<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h3>Laporan Penjualan</h3>
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
<?php 
$namaBulan = array("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"); 

$sql = $conn->query("SELECT sum(total) as omzet, month(created) as bulan from tb_penjualan GROUP BY month(created)");

?>
  <table id="dataTable" class="table table-bordered table-hover bg-white">
    <thead>
      <tr>
        <th class="align-middle text-center" width="5%">No</th>
        <th class="align-middle text-center">Nama Bulan</th>
        <th class="align-middle text-center">Omzet Kotor</th>
        <th class="align-middle text-center">Omzet Bersih</th>
        <th class="align-middle text-center">Harga Pokok</th>
        <th class="align-middle text-center">Laba</th>
        <th class="align-middle text-center">Aksi</th>
        <!-- <th class="align-middle text-center" width="10%">Action</th> -->
      </tr>
    </thead>
    <tbody>
      <?php     
      $no = 1;
      while ($data = $sql->fetch_assoc()) {
      $bulan = $data['bulan'];
      $omzet_kotor = $conn->query("SELECT SUM(total) AS omzet_kotor FROM tb_penjualan WHERE MONTH(created) = '$bulan' GROUP BY MONTH(created)");
      
      $data_omzet_kotor = $omzet_kotor->fetch_assoc();
      
      $omzet_bersih = $conn->query("SELECT SUM(s_total) AS omzet_bersih FROM tb_penjualan_detail WHERE MONTH(created) = '$bulan' GROUP BY MONTH(created)");

      $data_omzet_bersih = $omzet_bersih->fetch_assoc();

      $harga_pokok = $conn->query("SELECT SUM(harga_pokok) AS hrg_pokok FROM tb_penjualan WHERE MONTH(created) = '$bulan' GROUP BY MONTH(created)");

      $data_harga_pokok = $harga_pokok->fetch_assoc();

      ?>
        <tr>
          <td class="align-middle text-center"><?= $no++; ?></td>
          <td><?= $namaBulan[$data['bulan']]; ?></td>
          <td><?= number_format($data_omzet_kotor['omzet_kotor']); ?></td>
          <td><?= number_format($data_omzet_bersih['omzet_bersih']); ?></td>
          <td><?= number_format($data_harga_pokok['hrg_pokok']); ?></td>
          <td><?= number_format($data_omzet_bersih['omzet_bersih'] - $data_harga_pokok['hrg_pokok']); ?></td>
          <td>
            <a href="?page=lap_penjualan&aksi=detail&bulan=<?= $data['bulan']; ?>" class="badge badge-success">Detail</a>

            <a href="?page=lap_penjualan&aksi=hari_ini&hari=<?= $hari = date('d'); ?>" data-toggle="tooltip" data-placement="top" title="Hari Ini" class="btn btn-sm btn-warning"><i class="fas fa-search"></i></a>
          </td>
        </tr>        
        <?php } ?>
    </tbody>
  </table>
</section>
<!-- /.content -->