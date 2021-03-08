<?php

$id_beli =  $_GET['id'];
$id_barang =  $_GET['id_barang'];


$sql = $conn->query("DELETE FROM tb_pembelian WHERE id_beli = '$id_beli'");

$query = $conn->query("SELECT * FROM tb_pembelian");
$data = $query->fetch_assoc();
$stok = $data['stok'];
// $id_barang = $data['id_barang'];

$update = $conn->query("UPDATE tb_barang SET stok = '$stok' WHERE id_barang = '$id_barang'");

?>
<script>
  alert("Data berhasil dihapus...!");
  window.location.href = "?page=beli";
</script>