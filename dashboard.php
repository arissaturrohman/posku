<!-- Content Row -->
<div class="row">

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-primary shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Barang hampir habis</div>
          <?php 
          $barang = $conn->query("SELECT count(*) AS jumlah_total FROM tb_barang WHERE stok <= 5");
          $data_barang = $barang->fetch_assoc();
          ?>
          <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $data_barang['jumlah_total']." Produk"; ?></div>
        </div>
        <div class="col-auto">
          <i class="fas fa-calendar fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-success shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Omzet Bulan Ini</div>
          <?php 
          $bulan = date("m");
          $omzet = $conn->query("SELECT SUM(total) AS omzet FROM tb_penjualan WHERE MONTH (created) = '$bulan'");
          $data_omzet = $omzet->fetch_assoc();
          ?>
          <div class="h5 mb-0 font-weight-bold text-gray-800"><?= "Rp. ". number_format($data_omzet['omzet']); ?></div>
        </div>
        <div class="col-auto">
          <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-info shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Top Omzet Bulan Ini</div>
          <div class="row no-gutters align-items-center">
            <div class="col-auto">
            <?php 
            $date = date("m");
            $top = $conn->query("SELECT nama_pelanggan, SUM(total) AS total_omzet FROM tb_penjualan, tb_pelanggan WHERE tb_penjualan.id_pelanggan = tb_pelanggan.id_pelanggan 
            AND MONTH(created) = '$date' GROUP BY nama_pelanggan order by total_omzet desc");
            $data_top = $top->fetch_assoc();

            ?>
              <div class="h5 mb-0 mr-3 text-gray-800"><?= $data_top['nama_pelanggan']; ?></div>
            </div>
            <div class="col">
            <small><?= "Rp. ".number_format($data_top['total_omzet']); ?></small>
            </div>
          </div>
        </div>
        <div class="col-auto">
          <i class="fas fa-comments fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-info shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Barang Terlaris</div>
          <div class="row no-gutters align-items-center">
            <div class="col-auto">
            <?php 
            $bulan = date("m");
            $top_barang = $conn->query("SELECT nama_barang, SUM(jumlah) AS qty FROM tb_penjualan, tb_barang WHERE tb_penjualan.id_barang = tb_barang.id_barang GROUP BY tb_penjualan.id_barang ORDER BY qty DESC");
            $data_top_barang = $top_barang->fetch_assoc();
            ?>
              <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $data_top_barang['nama_barang']; ?></div>
            </div>
            <div class="col">
            <?= number_format($data_top_barang['qty']); ?>
            </div>
          </div>
        </div>
        <div class="col-auto">
          <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>
</div>