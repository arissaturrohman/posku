<?php 
$delete = $conn->query("DELETE FROM tb_level WHERE id_level = '$_GET[id]'");
if ($delete) {
  ?>
    <script>
      alert("Data berhasil dihapus");
      window.location.href = "?page=level";
    </script>
<?php
}
?>