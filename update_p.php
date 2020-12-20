<?php 

include("inc/config.php");

$id_invoice = $_POST['invoice'];
  $id_pelanggan = $_POST['id_pelanggan'];

  $pelanggan = $conn->query("UPDATE tb_penjualan SET id_pelanggan = '$id_pelanggan' WHERE no_invoice = '$id_invoice'");

?>