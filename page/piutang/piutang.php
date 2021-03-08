<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h3>Data Piutang</h3>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Data Piutang</li>
            </ol>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <table id="example1" class="table table-bordered table-hover bg-white">
        <thead>
            <tr>
                <th class="align-middle text-center" width="5%">No</th>
                <th class="align-middle text-center">No Invoice</th>
                <th class="align-middle text-center">Nama Piutang</th>
                <th class="align-middle text-center">Jumlah piutang</th>
                <th class="align-middle text-center">Ket</th>
                <th class="align-middle text-center">Tanggal Lunas</th>
                <th class="align-middle" width="10%">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $sql = $conn->query("SELECT * FROM tb_piutang, tb_pelanggan WHERE tb_piutang.id_pelanggan = tb_pelanggan.id_pelanggan AND ket='termin'");
            while ($data = $sql->fetch_assoc()) {
            ?>
                <tr>
                    <td class="align-middle text-center"><?= $no++; ?></td>
                    <td><?= $data['no_invoice']; ?></td>
                    <td><?= $data['nama_pelanggan']; ?></td>
                    <td><?= number_format($data['piutang']); ?></td>
                    <?php 
                    if ($data['ket'] == "termin") {
                      $warna= "bg-danger text-white";
                    } else {
                      $warna = "";
                    }
                    ?>
                    <td class="<?= $warna; ?>"><?= $data['ket']; ?></td>
                    <td><?= $data['tgl_lunas']; ?></td>
                    <td>
                        <a href="?page=piutang&aksi=edit&id=<?= $data['id_piutang']; ?>" class="badge badge-success">edit</a>

                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>


</section>
<!-- /.content -->