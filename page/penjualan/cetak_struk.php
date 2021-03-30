<?php
include("../../inc/config.php");
$invoice = $_GET['invoice'];
$sql = $conn->query(" SELECT * FROM tb_penjualan, tb_barang, tb_user, tb_pelanggan WHERE tb_penjualan.id_barang = tb_barang.id_barang AND tb_penjualan.id_user = tb_user.id_user AND tb_penjualan.id_pelanggan = tb_pelanggan.id_pelanggan AND no_invoice = '$invoice'");

$footer = $conn->query(" SELECT * FROM tb_penjualan, tb_user, tb_pelanggan WHERE tb_penjualan.id_user = tb_user.id_user AND tb_penjualan.id_pelanggan = tb_pelanggan.id_pelanggan AND no_invoice = '$invoice'");
$data_footer = $footer->fetch_assoc();

$header = $conn->query(" SELECT * FROM tb_penjualan WHERE no_invoice = '$invoice'");
$data_header = mysqli_fetch_assoc($header);

$logo = $conn->query("SELECT * FROM tb_toko");
$data_logo = $logo->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Invoice <?=$_GET['invoice']?></title>
	<!-- <link href="../../css/sb-admin-2.min.css" rel="stylesheet"> -->
	<style type="text/css">
		.printableArea {
		    width: 7cm;
		    height:100%;
		}

		body{
			font-family: Sans-Serif;
		}

		@page {
		    /* size: 6cm auto; //  */
		    /* width: 6cm; // */
		    height: 100%; //
		    margin: 0;
		    /* margin-left: 1px ; */
		    /* margin-right: 2px !important; */
		    margin-top: 0px !important;
		}
	</style>
</head>

<body class="printableArea">

<center><img src="../../img/<?= $data_logo['logo_toko']; ?>" style="width: 50px;"></center>
<h3 style="text-align: center">
TOKO <?=strtoupper($data_logo['nama_toko'])?><br>
<small style="font-weight: normal; font-size: 10pt"><?=$data_logo['alamat']?></small>
</h3><hr>

<small class="mb-0">
	Date : <?=date('d-m-Y H:i:s', strtotime($data_header['created']))?> <br>
	No Order : <?=$_GET['invoice']?><br>
	Kasir : <?= $data_footer['nama_user']; ?> <br>
	Member : <?= $data_footer['nama_pelanggan']; ?> <br>
	Payment : <?=ucfirst($data_header['ket'])?>
</small>
<br>
<!-- <div style="border-bottom:1px dashed;"></div> -->
<hr>
<small>
<table width="100%" style="text-align: center">
	<tr>
		<td style="text-align: left; font-weight: bold;" width="35%">Item</td>
		<td style="font-weight: bold;">Qty</td>
		<td style="text-align: right;  font-weight: bold;">Price</td>
		<td style="text-align: right; font-weight: bold;">Subtotal</td>
	</tr>
    <?php 
    while ($data = $sql->fetch_assoc()) { ?>
		<tr>
            <td style="text-align: left"><?=ucfirst($data['nama_barang'])?></td>
            <td><?=ucfirst($data['jumlah'])?></td>
            <td style="text-align: right"><?=number_format($data['harga_jual']); ?> </td>
            <td style="text-align: right" class="total"><?php echo number_format($data['total']);?></td>
		</tr>
        
        <?php  ?>
        <?php 
        }
        $bayar = $conn->query("SELECT *, SUM(total) AS total1 FROM tb_penjualan_detail WHERE no_invoice = '$invoice'");
        $data_bayar = $bayar->fetch_assoc();
        ?>
	<tr>
		<td style="text-align: right" colspan="3">Total : </td>
		<td style="text-align: right">Rp. <?php echo number_format($data_bayar['total1']);?></td>
	</tr>
	<tr>
		<td style="text-align: right" colspan="3">Discount (%) : </td>
		<td style="text-align: right"><?= number_format($data_bayar['diskon'])?></td>
	</tr>
	<tr>
		<td style="text-align: right" colspan="3">Discount (Rp) : </td>
		<td style="text-align: right">Rp. <?php echo number_format($data_bayar['diskonrp']);?></td>
	</tr>
	<tr>
		<td style="text-align: right" colspan="3"><strong>Grand Total : </strong></td>
		<td style="text-align: right"><strong>Rp. <?php echo number_format($data_bayar['s_total']);?></strong></td>
	</tr>
	<tr>
		<td style="text-align: right" colspan="3">Jumlah Bayar : </td>
		<td style="text-align: right">Rp. <?php echo number_format($data_bayar['bayar']);?></td>
	</tr>
	<tr>
		<td style="text-align: right" colspan="3">Kembali : </td>
		<td style="text-align: right">Rp. <?php echo number_format($data_bayar['kembali']);?></td>
	</tr>
	<!-- <tr><td colspan="4" style="text-align: left">Cashier : <?=ucfirst($data_footer['nama_user'])?></td></tr>
	<tr><td colspan="4" style="text-align: left">Pelanggan : <?=ucfirst($data_footer['nama_pelanggan'])?></td></tr> -->
	
	
		
	</tr>
</table>
<br><br>
		<div style="text-align: center">
		Terima kasih telah berbelanja<br>
		Salam Sehat Cantik Alamai <br>
		Order online hubungi nomor<b><br>
		0896-7701-7239</b>
		</div>
</small>
<script type="text/javascript">
    function PrintWindow() {                    
       window.print();             
       CheckWindowState();
    }
    PrintWindow();
</script>
</body>
</html>
