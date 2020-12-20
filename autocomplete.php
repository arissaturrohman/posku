<?php 

include("inc/config.php");

$nama = $_GET['term'];

$sql = $conn->query("SELECT * FROM tb_pelanggan WHERE nama_pelanggan LIKE '%$nama%'");
$data = $sql->fetch_all(MYSQLI_ASSOC);

foreach ($data as $key => $value) {
  $output['suggestions'][] = [
    'value' => $value['nama_pelanggan'],
    'nama_pelanggan' => $value['nama_pelanggan']
  ];
}
if (! empty($output)) {
  echo json_encode($output);
}

?>