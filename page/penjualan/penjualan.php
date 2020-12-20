<!-- Content Header (Page header) -->
<!-- <section class="content-header">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h3>Transaski Penjualan</h3>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item active">Penjualan</li>
      </ol>
    </div>
  </div>
  <hr>
</section> -->
<?php 
$kode = $_GET['invoice'];
?>

<div class="row">
  <div class="col-md-4">
  <?php 
  
  // $query = $conn->query("SELECT MAX(no_invoice) AS invoice FROM tb_penjualan");
  // $data = $query->fetch_assoc();
  // $kodeBarang = $data['invoice'];
  // $urutan = (int) substr($kodeBarang, 9, 4) + 1;
  // $kodeBarang = sprintf("%', 04d",$urutan);
  // $invoice = "LV" . date('ymd') . '000'.$urutan;
  // echo $invoice;

  ?>
    <form action="" method="post">
        <input type="hidden" name="invoice" value="<?= $kode; ?>">
      <div class="form-group row">
        <div class="col-7">
          <input type="text" class="form-control form-control-sm" name="barcode" placeholder="barcode" autofocus required>            
          <input type="text" class="form-control form-control-sm mt-2" name="jumlah" placeholder="jumlah" required>            
        </div>
        <div class="col-3">            
          <input type="submit" name="submit" class="btn btn-sm btn-info">
        </div>
      </div>
    </form>
  </div>

  <div class="col-md-4">
  <form action="" method="POST">
      <div class="form-group row">
        <div class="col-7">
          <!-- <input type="text" name="id_pelanggan" id="id_pelanggan"> -->
          <input type="text" class="form-control form-control-sm" name="pelanggan" id="nama" placeholder="pelanggan">          
          <input type="text" class="form-control form-control-sm mt-1" name="alamat" id="alamat" placeholder="alamat">          
          <input type="text" class="form-control form-control-sm mt-1" name="telp" id="telp" placeholder="telp">          
          <input type="text" class="form-control form-control-sm mt-1" name="level" id="level" placeholder="level">          
          <!-- <input type="submit" class="btn btn-sm btn-info mt-2"> -->
          <!-- <a class="btn btn-sm btn-info mt-2" type="submit" href="?page=penjualan&invoice=<?= $invoice; ?>&aksi=add">Kirim</a> -->
          <!-- <button type="button"></button> -->
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

  $total_harga = $jumlah * $harga_jual;
  $profit = $harga_jual - $harga_beli;

  $sql = $conn->query("INSERT INTO tb_penjualan (no_invoice, barcode, jumlah, total, profit, id_pelanggan) VALUES ('$kode', '$barcode', '$jumlah', '$total_harga', '$profit', '$id_pelanggan')");

  // $barang = $conn->query("UPDATE tb_barang SET stok = (stok - $jumlah) WHERE barcode = '$barcode'");

  // $pelanggan = $conn->query("UPDATE tb_penjualan SET id_pelanggan = '$id_pelanggan' WHERE no_invoice = '$id_invoice'");

}

?>

<?php 

// if (isset($_POST['pelanggan'])) {
//   $id_invoice = $_GET['invoice'];
//   $id_pelanggan = $_POST['id_pelanggan'];

//   $pelanggan = $conn->query("UPDATE tb_penjualan SET id_pelanggan = '$id_pelanggan' WHERE no_invoice = '$id_invoice'");
// }

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
        $jumlah = $data['jumlah'];
        $total = $jual * $jumlah;
        
      
      ?>
      <tr>
        <th><?= $no++; ?></th>
        <td><?= $data['barcode']; ?></td>
        <td><?= $data['nama_barang']; ?></td>
        <td><?= number_format($data['harga_jual']); ?></td>
        <td><?= $data['jumlah']; ?></td>
        <td><?= number_format($total); ?></td>
        <td class="text-center">
          <a onclick="return confirm('Yakin hapus')" href="?page=penjualan&aksi=hapus&invoice=<?= $invoice;?>&id=<?= $data['id_penjualan']; ?>&jumlah=<?= $data['jumlah']; ?>&harga=<?= $data['harga_jual']; ?>&barcode=<?= $data['barcode']; ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
        </td>
      </tr>
      
        <?php 
        
        $total_bayar = $total_bayar + $total;
      }
        ?>
      
    </tbody>
  </table>
  <form action="" method="post">
  <input type="hidden" name="invoice" value="<?= $kode; ?>">
  <input type="hidden" name="id_pelanggan" id="id_pelanggan">
  <div class="form-group row">
    <label for="total" class="col-sm-2 text-right col-form-label offset-6 align-right">Total</label>
    <div class="col-sm-2">
      <input type="number" name="total" readonly class="form-control bg-secondary text-white" id="total" value="<?= $total_bayar; ?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="diskon" class="col-sm-2 text-right col-form-label offset-6 align-right">Diskon</label>
    <div class="col-sm-2">
      <input type="number" name="diskon" id="diskon" class="form-control bg-secondary text-white" readonly>
    </div><i class="fas fa-exclamation-circle text-danger" title="klik form diskon"></i>
    <!-- <div class="col-sm-1">
    <span >*klik untuk diskon</span>
    </div> -->
  </div>
  <div class="form-group row">
    <label for="potongan" class="col-sm-2 text-right col-form-label offset-6 align-right">Pot Diskon</label>
    <div class="col-sm-2">
      <input type="number" name="potongan"  id="potongan" readonly class="form-control bg-secondary text-white">
    </div>
  </div>
  <div class="form-group row">
    <label for="s_total" class="col-sm-2 text-right col-form-label offset-6 align-right">Sub Total</label>
    <div class="col-sm-2">
      <input type="number" name="s_total" id="s_total" readonly class="form-control bg-secondary text-white">
    </div>
  </div>
  <div class="form-group row">
    <label for="bayar" class="col-sm-2 text-right col-form-label offset-6 align-right">Bayar</label>
    <div class="col-sm-2">
      <input type="number" name="bayar"  id="bayar" class="form-control" id="bayar" required>
    </div>
  </div>
  <div class="form-group row">
    <label for="kembali" class="col-sm-2 text-right col-form-label offset-6 align-right">Kembalian</label>
    <div class="col-sm-2">
      <input type="number" name="kembali" id="kembali" class="form-control bg-secondary text-white" id="kembali" >
    </div>
  </div>
  <div class="form-group row">
    <label for="ket" class="col-sm-2 text-right col-form-label offset-6 align-right">Keterangan</label>
    <div class="col-sm-2">
      <input type="text" name="ket" id="ket" class="form-control" required>
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
  $no_invoice = $_POST['invoice'];
  $total = $_POST['total'];
  $bayar = $_POST['bayar'];
  $diskon = $_POST['diskon'];
  $s_total = $_POST['s_total'];
  $kembali = $_POST['kembali'];
  $ket = $_POST['ket'];

  $jual_detail = $conn->query("INSERT INTO tb_penjualan_detail (no_invoice, total, bayar, diskon, s_total, kembali, ket) VALUES ('$no_invoice', '$total', '$bayar', '$diskon', '$s_total', '$kembali', '$ket')");

  $update_jual = $conn->query("UPDATE tb_penjualan SET id_pelanggan = '$pelanggan' WHERE no_invoice = '$no_invoice'");
}

if ($jual_detail) {
  ?>
  <script>
    alert("Transaksi sukses");
    window.location.href = "?page=penjualan&invoice=<?= $invoice; ?>";
  </script>
  <?php
}

?>


<!-- <script>
  function hitung(){
    var total = document.getElementById('total').value;
    var diskon = document.getElementById('diskon').value;
    var pot_harga = parseInt(total) * parseInt(diskon) / parseInt(100);
    if (!isNaN(pot_harga)) {
      var potongan = document.getElementById('potongan').value = pot_harga;
    }
    var sub_total = parseInt(total) - parseInt(potongan);
    if (!isNaN(sub_total)) {
      var s_total = document.getElementById('s_total').value = sub_total;
    }
    
  }
</script> -->

<!-- <script>
  $(document).ready(function(){
    $("#total, #diskon").keyup(function(){
      var total = $("#total").val();
      var diskon = $("#diskon").val();
      // var s_total = $("#s_total").val();
      // var potongan = $("#potongan").val();
      // var bayar = $("#bayar").val();

      var s_total = parseInt(total) * parseInt(diskon) / parseInt(100);
      $("#s_total").val(s_total);
    })
  })
</script> -->
