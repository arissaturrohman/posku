
<?php 
$kode = $_GET['invoice'];
?>

<div class="row">
  <div class="col-md-4">
    <form action="" method="post">
        <input type="hidden" name="invoice" value="<?= $kode; ?>">
      <div class="form-group row">
        <div class="col-7">
          <input type="text" class="form-control form-control-sm" name="barcode"  id="barcode" placeholder="barcode" autofocus data-toggle="modal" data-target="#barcodeModal" autocomplete="off" required readonly>            
          <input type="text" class="form-control form-control-sm mt-2" name="jumlah" placeholder="jumlah" autocomplete="off" required>            
        </div>
        <div class="col-3">          
          <input type="submit" name="submit" class="btn btn-sm btn-info mt-2">
        </div>
      </div>
    </form>
  </div>

  <div class="col-md-4">
  <form action="" method="POST">
      <div class="form-group row">
        <div class="col-7">
          <!-- <input type="text" name="id_pelanggan" id="id_pelanggan"> -->
          <input type="text" class="form-control form-control-sm" name="pelanggan" id="nama" placeholder="pelanggan" required>          
          <input type="text" class="form-control form-control-sm mt-1" name="alamat" id="alamat" placeholder="alamat" required>          
          <input type="text" class="form-control form-control-sm mt-1" name="telp" id="telp" placeholder="telp" required>          
          <input type="text" class="form-control form-control-sm mt-1" name="level" id="level" placeholder="level" required>
        </div>
        <div class="col-3">            
          <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#pelangganModal">
                <i class="fas fa-search"></i>
              </button>
        </div>
      </div>
    </form>
  </div>  
  
</div>

<?php 

if (isset($_POST['submit'])) {
  $id_pelanggan = $_GET['id_pelanggan'];
  // $no_invoice = $_POST['invoice'];
  $barcode = $_POST['barcode'];
  $jumlah = $_POST['jumlah'];

  $harga = $conn->query("SELECT * FROM tb_barang WHERE barcode = '$barcode'");
  $data_harga = $harga->fetch_assoc();
  $harga_jual = $data_harga['harga_jual'];
  $harga_beli = $data_harga['harga_beli'];
  $stok = $data_harga['stok'];
  $id_barang = $data_harga['id_barang'];
  $id_user = $_SESSION['id_user'];
  
  $total_harga = $jumlah * $harga_jual;
  $profit = $jumlah * ($harga_jual - $harga_beli);

  if ($stok <= $jumlah) {
    echo "
    <script>
      alert('Sisa stok ".$stok." silahkan lakukan pembelian terlebih dahulu')
      windown.location.href = '?page=penjualan&invoice=<?= $invoice?>'
    </script>";
    
  }
   else {
    
    $sql = $conn->query("INSERT INTO tb_penjualan (no_invoice, barcode, jumlah, total, profit, id_pelanggan, id_barang, id_user) VALUES ('$kode', '$barcode', '$jumlah', '$total_harga', '$profit', '$id_pelanggan', '$id_barang', '$id_user')");
  }

}

?>

<div class="mt-5">
  <!-- Tabel Transaksi -->
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Barcode</th>
        <th scope="col">Nama Barang</th>
        <th scope="col">Harga Jual</th>
        <th scope="col">Jumlah</th>
        <th scope="col">Total</th>
        <th scope="col" class="text-center">Aksi</th>
      </tr>
    </thead>
    <tbody>

      <?php 
      $no = 1;
      $barang = $conn->query("SELECT * FROM tb_penjualan, tb_barang WHERE tb_penjualan.barcode = tb_barang.barcode AND no_invoice = '$kode'");
      while($data = $barang->fetch_assoc()){
        $jual = $data['harga_jual'];
        $jumlah = $_POST['jumlah'];
        $total = $jual * $jumlah;
        
      
      ?>
      <tr>
        <th><?= $no++; ?></th>
        <td><?= $data['barcode']; ?></td>
        <td><?= $data['nama_barang']; ?></td>
        <td><?= number_format($data['harga_jual']); ?></td>
        <td>
          <?= $data['jumlah']; ?>
          <!-- <input type="number" name="jumlah" value="<?= $data['jumlah']; ?>"> -->
        </td>
        <td><?= number_format($data['total']); ?></td>
        <td class="text-center">
          <form action="" method="post">
            <input type="hidden" name="id_penjualan" value="<?= $data['id_penjualan']; ?>">
            <input type="submit" name="hapusBarang" class="btn btn-sm btn-danger" value="hapus">
          </form>
        </td>
      </tr>
          <?php 
          
          if (isset($_POST['hapusBarang'])) {
            $id_jual = $_POST['id_penjualan'];

            $hapusBarang = $conn->query("DELETE FROM tb_penjualan WHERE id_penjualan = '$id_jual'");
            // echo json_encode($id_jual);
            
          }
          // if ($hapusBarang) {
            ?>
            <script>
              windown.location.href = "?page=penjualan&invoice=<?= $invoice?>";
              // <meta http-equiv="refresh" content="2">
            </script>
            <?php 
          // }
                  
        // $total_bayar = $total_bayar + $total;
      }
        ?>
      
    </tbody>
  </table>

  
  <form action="" method="post">
  <input type="hidden" name="invoice" value="<?= $kode; ?>">
  <input type="hidden" name="id_pelanggan" id="id_pelanggan" required>
  <div class="form-group row">
    <label for="total" class="col-sm-2 text-right col-form-label offset-6 align-right">Total</label>
    <div class="col-sm-2">
    <?php 
    $t_bayar = $conn->query("SELECT SUM(total) AS total_bayar FROM tb_penjualan WHERE no_invoice = '$kode'");
    $data_bayar = $t_bayar->fetch_assoc();
    $bayar = $data_bayar['total_bayar'];
    ?>
      <input type="number" name="total" readonly class="form-control bg-secondary text-white text-right mr-1" id="total" value="<?= $bayar; ?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="diskon" class="col-sm-2 text-right col-form-label offset-6 align-right">Diskon %</label>
    <div class="col-sm-2">
      <input type="number" name="diskon" id="diskon" class="form-control bg-secondary text-white text-right mr-1" readonly required>
    </div><i class="fas fa-exclamation-circle text-danger" title="klik form diskon"></i>
    <!-- <div class="col-sm-1">
    <span >*klik untuk diskon</span>
    </div> -->
  </div>
  <div class="form-group row">
    <label for="diskonrp" class="col-sm-2 text-right col-form-label offset-6 align-right">Diskon Rp</label>
    <div class="col-sm-2">
      <input type="number" name="diskonrp" id="diskonrp" class="form-control text-right mr-1" value="0">
    </div>
  </div>
  <div class="form-group row">
    <label for="potongan" class="col-sm-2 text-right col-form-label offset-6 align-right">Pot Diskon</label>
    <div class="col-sm-2">
      <input type="number" name="potongan"  id="potongan" readonly class="form-control bg-secondary text-white text-right mr-1">
    </div>
  </div>
  <div class="form-group row">
    <label for="s_total" class="col-sm-2 text-right col-form-label offset-6 align-right">Sub Total</label>
    <div class="col-sm-2">
      <input type="number" name="s_total" id="s_total" readonly class="form-control bg-secondary text-white text-right mr-1">
    </div>
  </div>
  <div class="form-group row">
    <label for="bayar" class="col-sm-2 text-right col-form-label offset-6 align-right">Bayar</label>
    <div class="col-sm-2">
      <input type="number" name="bayar"  id="bayar" class="form-control text-right mr-1" id="bayar" required>
    </div>
  </div>
  <div class="form-group row">
    <label for="kembali" class="col-sm-2 text-right col-form-label offset-6 align-right">Kembalian</label>
    <div class="col-sm-2">
      <input type="number" name="kembali" id="kembali" class="form-control bg-secondary text-white text-right mr-1" id="kembali" >
    </div>
  </div>
  <div class="form-group row">
    <label for="ket" class="col-sm-2 text-right col-form-label offset-6 align-right">Keterangan</label>
    <div class="col-sm-2">
    <select name="ket" id="ket" class="form-control form-control-sm">
          <option value="lunas">Lunas</option>
          <option value="termin">Termin</option>
        </select>
    </div>
  </div>
  <div class="form-group row" style="display:none;" id="tgl_tf">
    <label for="tgl_tf" class="col-sm-2 text-right col-form-label offset-6 align-right"></label>
    <div class="col-sm-2">
      <input type="date" name="tgl_tf" class="form-control">
    </div>
  </div>
  <div class="form-group row">    
    <div class="col-sm-2 offset-10">
      <input type="submit" name="simpan" value="Simpan" class="btn btn-sm btn-success">
    </div>
  </div>
  </form>
</div>


<?php 

if (isset($_POST['simpan'])) {
  $pelanggan = $_POST['id_pelanggan'];
  if ($pelanggan == "") {
    ?>
  <script>
    alert("Pilih dulu pelanggannya bro.. :p");
    window.location.href = "?page=penjualan&invoice=<?= $kode?>";    
  </script>
  <?php
  die;
  }

  // $sql_piutang = $conn->query("SELECT * FROM tb_piutang WHERE id_pelanggan");
  // $data_piutang = $sql_piutang->fetch_assoc();
  // $pelanggan_piutang = $data_piutang['ket'];
  // $piutang = $data_piutang['piutang'];

  // if ($pelanggan_piutang == "termin") {
  //   ?>
  // <script>
  //   alert("Masih punya hutang, lunasi dulu");
  //   window.location.href = "?page=penjualan&invoice=<?= $kode?>";    
  // </script>
  // <?php
  // die;
  // }


  $no_invoice = $_POST['invoice'];
  $total = $_POST['total'];
  $bayar = $_POST['bayar'];
  $diskon_p = $_POST['diskon'];
  $diskon_rp = $_POST['diskonrp'];
  $s_total = $_POST['s_total'];
  $kembali = $_POST['kembali'];
  $ket = $_POST['ket'];
  $jumlah = $_POST['jumlah'];
  $total_harga = $_POST['total_harga'];
  $tgl_tf = $_POST['tgl_tf'];
  $diskon = ($total * $diskon_p) / 100;  

  $jual_detail = $conn->query("INSERT INTO tb_penjualan_detail (no_invoice, total, bayar, diskon, diskonrp, s_total, kembali) VALUES ('$no_invoice', '$total', '$bayar', '$diskon', '$diskon_rp', '$s_total', '$kembali')");

  $update_jual = $conn->query("UPDATE tb_penjualan SET id_pelanggan = '$pelanggan', ket = '$ket' WHERE no_invoice = '$no_invoice'");

  $sql_piutang = $conn->query("INSERT INTO tb_piutang (id_pelanggan, no_invoice, piutang, ket, tgl_termin) VALUES('$pelanggan', '$no_invoice', '$kembali', '$ket', '$tgl_tf')");
  
  // $jualUpdate1 = $conn->query("SELECT * FROM tb_penjualan WHERE no_invoice = '$no_invoice'");
  //   $data_jual_update1 = $jualUpdate1->fetch_assoc();
  //   $jumlah1 = $data_jual_update1['stok'];
  //   $barcode1 = $data_jual_update1['barcode'];
  //   $Update_Barang = $conn->query("UPDATE tb_barang SET stok = (stok - $jumlah1) WHERE barcode = '$barcode1'");
  
  
}


if ($jual_detail) {
  ?>
  <script>
    alert("Transaksi sukses");
    window.open('page/penjualan/cetak_struk.php?invoice=<?=$no_invoice;?>', '_blank')
    window.location.href = "?page=penjualan&invoice=<?= $invoice; ?>";
    // window.open('cetak_struk.php?id='+$invoice, '_blank');
  </script>  
  <?php
}

?>





