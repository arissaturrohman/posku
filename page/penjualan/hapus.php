
      <?php
        

        $id_penjualan = $_GET['id'];
        $jumlah = $_GET['jumlah'];
        $harga = $_GET['harga_jual'];
        $barcode = $_GET['barcode'];
        $invoice = $_GET['invoice'];

        $hapus = $conn->query("DELETE FROM tb_penjualan WHERE id_penjualan = '$id_penjualan'");

        // $harga = $conn->query("UPDATE tb_penjualan SET total = (jumlah + $harga) WHERE id_penjualan = '$id_penjualan'");

        $barang = $conn->query("UPDATE tb_barang SET stok = (stok + $jumlah) WHERE barcode = '$barcode'");

        if ($hapus || $barang) {
          
        ?>

        <script>
          window.location.href = "?page=penjualan&invoice=<?= $invoice;?>";
        </script>
        <?php } ?>



