<?php 
$no_invoice = $_GET['id'];

$query = $conn->query("SELECT * FROM tb_penjualan, tb_barang WHERE tb_penjualan.id_barang = tb_barang.id_barang AND no_invoice = '$no_invoice'");
while($data = $query->fetch_assoc()){
  $stok = $data['jumlah'];
  $id_barang = $data['id_barang'];
  // echo $stok."<br>";
  $update_stok = $conn->query("UPDATE tb_barang SET stok = stok + '$stok' WHERE id_barang = '$id_barang'");
}


$delete_penjualan = $conn->query("DELETE FROM tb_penjualan WHERE no_invoice = '$no_invoice'");
$delete_penjualan_detail = $conn->query("DELETE FROM tb_penjualan_detail WHERE no_invoice = '$no_invoice'");
$delete_piutang = $conn->query("DELETE FROM tb_piutang WHERE no_invoice = '$no_invoice'");

if ($delete_penjualan) {
  ?>
  <script>
    alert("Transaksi berhasil dihapus...!");
    window.location.href = "?page=lap_penjualan";
  </script>
<?php
}
?>