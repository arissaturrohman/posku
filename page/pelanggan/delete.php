<?php 

$id = $_GET['id'];

$delete = $conn->query("DELETE FROM tb_pelanggan WHERE id_pelanggan = '$id'");

if ($delete) {
  ?>
    <script>
      alert("Data berhasil dihapus");
      window.location.href = "?page=pelanggan";
    </script>
<?php
}

?>