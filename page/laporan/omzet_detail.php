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
<table id="dataTable" class="table table-bordered table-hover bg-white">
    <thead>
      <tr>
        <th class="align-middle text-center" width="5%">No</th>
        <th class="align-middle text-center">Barcode</th>
        <th class="align-middle text-center">Nama Pelanggan</th>
        <th class="align-middle text-center">Waktu</th>
        <th class="align-middle text-center">Total Belanja</th>
        <!-- <th class="align-middle text-center" width="10%">Action</th> -->
      </tr>
    </thead>
    <tbody>
      <?php
      $nama = $_GET['nama'];
      $namaBulan = array("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"); 
      $no = 1;
      $bulan = date("m");
      $sql = $conn->query("SELECT * from tb_penjualan 
      JOIN tb_pelanggan on tb_penjualan.id_pelanggan = tb_pelanggan.id_pelanggan
      where month(created) = '$bulan' AND nama_pelanggan = '$nama'");
      
      while ($data = $sql->fetch_assoc()) {
      ?>
        <tr>
          <td class="align-middle text-center"><?= $no++; ?></td>
          <td><?= $data['barcode']; ?></td>
          <td><?= $data['nama_pelanggan']; ?></td>
          <td><?= $data['created']; ?></td>
          <td><?= number_format($data['total']); ?></td>
          <!-- <td>
            <a href="?page=barang&aksi=edit&id=<?= $data['id_barang']; ?>" class="badge badge-success">edit</a>
            <a href="?page=barang&aksi=delete&id=<?= $data['id_barang']; ?>" name="delete" onclick="return confirm('Apakah anda yakin menghapus data ini...?')" class="badge badge-danger">delete</a>

          </td> -->
        </tr>
        
        <?php }
        $omzet = $conn->query("SELECT SUM(total) AS omzet FROM tb_penjualan JOIN tb_pelanggan on tb_penjualan.id_pelanggan = tb_pelanggan.id_pelanggan
        where month(created) = '$bulan' AND nama_pelanggan = '$nama'");
        $data_omzet = $omzet->fetch_assoc();
        ?>
        <tr>
          <td colspan = "4" class="text-right font-weight-bold">Jumlah Total</td>
          <td class="font-weight-bold"><?= number_format($data_omzet['omzet']); ?></td>
        </tr>
    </tbody>
  </table>
  <a href="?page=top_omzet" class="btn btn-sm btn-secondary">Kembali</a>
</section>
<!-- /.content -->