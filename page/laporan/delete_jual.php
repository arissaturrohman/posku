<?php 
$no_invoice = $_GET['id'];
$delete_penjualan = $conn->query("DELETE FROM tb_penjualan WHERE no_invoice = '$no_invoice'");
$delete_penjualan_detail = $conn->query("DELETE FROM tb_penjualan_detail WHERE no_invoice = '$no_invoice'");
$delete_piutang = $conn->query("DELETE FROM tb_piutang WHERE no_invoice = '$no_invoice'");

$query = $conn->query("SELECT * FROM tb_penjualan JOIN tb_barang ON tb_penjualan.id_barang = tb_barang.id_barang WHERE no_invoice = '$no_invoice'");
while($data = $query->fetch_assoc()){
$stok = $data['jumlah'];
$id_barang = $data['id_barang'];
}
// echo $stok;

$update_stok = $conn->query("UPDATE tb_barang SET stok = stok + '$stok' WHERE id_barang = '$id_barang'");
?>