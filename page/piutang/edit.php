<h1 class="h3 mb-4 text-gray-800">Form Pelunasan Piutang</h1>
<div class="row">
  <div class="col-sm-6">
    <div class="card mb-4 py-3 border-bottom-info">
      <div class="card-body">

      <?php 
        $id = $_GET['id'];
        $sql = $conn->query("SELECT * FROM tb_piutang WHERE id_piutang = '$id'");
        $data = $sql->fetch_assoc();
        $no_invoice = $data['no_invoice'];
      ?>

        <form action="" method="post">
          <div class="mb-3 row">
            <label for="piutang" class="col-sm-4 col-form-label">Jumlah piutang</label>
            <div class="col-sm-8">
              <input type="number" class="form-control" value="<?= number_format($data['piutang']); ?>" name="piutang" id="piutang" readonly>
            </div>
          </div>
          <div class="mb-3 row">
            <label for="bayar" class="col-sm-4 col-form-label">Bayar</label>
            <div class="col-sm-8">
              <input type="number" class="form-control" name="bayar" id="bayar" placeholder="Bayar">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="tgl_lunas" class="col-sm-4 col-form-label">Tanggal Pelunasan</label>
            <div class="col-sm-8">
              <input type="date" class="form-control" name="tgl_lunas" id="tgl_lunas">
            </div>
          </div>
      </div>
    </div>
  </div>
</div>
<button type="submit" name="submit" class="btn btn-info">Submit</button>
<a href="?page=piutang" class="btn btn-secondary">Cancel</a>
</form>

<?php

if (isset($_POST['submit'])) {
  $bayar = mysqli_real_escape_string($conn, $_POST['bayar']);
  $tgl = mysqli_real_escape_string($conn, $_POST['tgl_lunas']);
  $ket = "lunas";

  $sql = $conn->query("UPDATE tb_piutang SET piutang = '$bayar', ket = '$ket', tgl_lunas = '$tgl' WHERE id_piutang = '$id'");

  $updatepiutang = $conn->query("UPDATE tb_penjualan_detail SET bayar = (bayar + $bayar), kembali = (kembali + $bayar) WHERE no_invoice = '$no_invoice'");
  
  $delete = $conn->query("DELETE FROM tb_piutang WHERE id_piutang = '$id'");

  // $barang = $conn->query("SELECT * FROM tb_penjualan WHERE no_invoice = '$no_invoice'");
  // $dataBarang = $barang->fetch_assoc();
  // $jumlah = $dataBarang['jumlah'];
  // $barcode = $dataBarang['barcode'];
  // echo $jumlah;

  // $updateBarang = $conn->query("UPDATE tb_barang SET stok = (stok + $jumlah) WHERE barcode = '$barcode'");
  

  if ($sql) {
?>
    <script>
      alert("Piutang berhasil dibayar");
      window.location.href = "?page=piutang";
    </script>
<?php
  }
}

?>