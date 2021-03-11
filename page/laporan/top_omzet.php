<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h3>Top Omzet Pelanggan Bulan Ini</h3>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item active">Top Omzet</li>
      </ol>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
<?php 
$namaBulan = array("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"); 

$bulan = date("m");
// $omzet = $conn->query("SELECT SUM(total) AS omzet FROM tb_penjualan WHERE MONTH (created) = '$bulan'");
// $data_omzet = $omzet->fetch_assoc();
$top = $conn->query("SELECT nama_pelanggan, SUM(total) AS total_omzet FROM tb_penjualan, tb_pelanggan WHERE tb_penjualan.id_pelanggan = tb_pelanggan.id_pelanggan AND MONTH(created) = '$bulan' GROUP BY nama_pelanggan order by total_omzet desc");

// $sql = $conn->query("SELECT sum(total) as omzet, month(created) as bulan from tb_penjualan GROUP BY month(created)");

?>
  <table id="dataTable" class="table table-bordered table-hover bg-white">
    <thead>
      <tr>
        <th class="align-middle text-center" width="5%">No</th>
        <th class="align-middle text-center">Nama Pelanggan</th>
        <th class="align-middle text-center">Top Omzet </th>
        <th class="align-middle text-center">Aksi</th>
        <!-- <th class="align-middle text-center" width="10%">Action</th> -->
      </tr>
    </thead>
    <tbody>
      <?php     
      $no = 1;
      while ($data = $top->fetch_assoc()) {
      // $bulan = $data['bulan'];
      $bulan = date("m");
      $omzet = $conn->query("SELECT SUM(total) AS omzet FROM tb_penjualan WHERE MONTH (created) = '$bulan'");
        $data_omzet = $omzet->fetch_assoc();
      
      
      ?>
        <tr>
          <td class="align-middle text-center"><?= $no++; ?></td>
          <td><?= $data['nama_pelanggan']; ?></td>
          <td><?= number_format($data['total_omzet']); ?></td>
         
          <td>
            <a href="?page=top_omzet&aksi=omzet_detail&nama=<?= $data['nama_pelanggan']; ?>" class="badge badge-success">Detail</a>
          </td>
        </tr> 
        <?php } ?>
        <tr>
          <td colspan="2" class="font-weight-bold text-center">Jumlah Profit</td>
          <td colspan="2" class="font-weight-bold"><?= number_format($data_omzet['omzet']); ?></td>
        </tr> 
              
    </tbody>
  </table>
</section>
<!-- /.content -->