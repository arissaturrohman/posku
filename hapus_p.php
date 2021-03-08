
<?php
  
  $id_penjualan = $_POST['id'];

  $hapus = $conn->query("DELETE FROM tb_penjualan WHERE id_penjualan = '$id_penjualan'");

  ?>



