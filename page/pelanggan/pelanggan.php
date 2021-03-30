<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h3>Data Pelanggan</h3>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Data Pelanggan</li>
            </ol>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <table id="dataTable" class="table table-bordered table-hover bg-white">
        <thead>
            <tr>
                <th class="align-middle text-center" width="5%">No</th>
                <th class="align-middle text-center">Nama Pelanggan</th>
                <th class="align-middle text-center">No Telp</th>
                <th class="align-middle text-center">Alamat</th>
                <th class="align-middle text-center">Level</th>
                <th class="align-middle text-center" width="10%">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $sql = $conn->query("SELECT * FROM tb_pelanggan");
            while ($data = $sql->fetch_assoc()) {
            ?>
                <tr>
                    <td class="align-middle text-center"><?= $no++; ?></td>
                    <td><?= $data['nama_pelanggan']; ?></td>
                    <td><?= $data['telp']; ?></td>
                    <td><?= $data['alamat']; ?></td>
                    <?php
                    $id_level = $data['id_level'];
                    $level = $conn->query("SELECT * FROM tb_level WHERE id_level='$id_level'");
                    $data_level = $level->fetch_assoc();
                    ?>
                    <td><?= $data_level['p_level']; ?></td>
                    <td>
                        <a href="?page=pelanggan&aksi=edit&id=<?= $data['id_pelanggan']; ?>" class="badge badge-success">edit</a>
                        <a href="?page=pelanggan&aksi=delete&id=<?= $data['id_pelanggan']; ?>" onclick="return confirm('Apakah anda yakin menghapus data ini...?')" class="badge badge-danger">delete</a>

                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <a href="?page=pelanggan&aksi=add" class="btn btn-sm btn-primary"><i class="fas fa-plus-circle"></i> Add Data</a>


</section>
<!-- /.content -->