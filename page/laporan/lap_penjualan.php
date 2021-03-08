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
  <table id="example1" class="table table-bordered table-hover bg-white">
    <thead>
      <tr>
        <th class="align-middle text-center" width="5%">No</th>
        <th class="align-middle text-center">Nama Bulan</th>
        <th class="align-middle text-center">Total Pendapatan</th>
        <th class="align-middle text-center">Total Keuntungan</th>
        <th class="align-middle text-center">Aksi</th>
        <!-- <th class="align-middle text-center" width="10%">Action</th> -->
      </tr>
    </thead>
    <tbody>
      <?php     
      $no = 1;
      while ($data = $sql->fetch_assoc()) {
      $bulan = $data['bulan'];
      $profit = $conn->query("SELECT SUM(profit) AS total_profit FROM tb_penjualan WHERE MONTH(created) = '$bulan' GROUP BY MONTH(created)");
      
      $data_profit = $profit->fetch_assoc();
      
      ?>
        <tr>
          <td class="align-middle text-center"><?= $no++; ?></td>
          <td><?= $namaBulan[$data['bulan']]; ?></td>
          <td><?= number_format($data['omzet']); ?></td>
          <td><?= number_format($data_profit['total_profit']); ?></td>
          <td>
            <a href="?page=lap_penjualan&aksi=detail&bulan=<?= $data['bulan']; ?>" class="badge badge-success">Detail</a>
          </td>
        </tr>        
        <?php } ?>
    </tbody>
  </table>
</section>
<!-- /.content -->