<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h3>Data Level</h3>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Data Level</li>
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
                <th class="align-middle text-center">Level Pelanggan</th>
                <th class="align-middle text-center">Diskon</th>
                <th class="align-middle text-center" width="10%">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $sql = $conn->query("SELECT * FROM tb_level ORDER BY diskon ASC");
            while ($data = $sql->fetch_assoc()) {
            ?>
                <tr>
                    <td class="align-middle text-center"><?= $no++; ?></td>
                    <td><?= $data['p_level']; ?></td>
                    <td><?= $data['diskon'] . "%"; ?></td>
                    <td>
                        <a href="?page=level&aksi=edit&id=<?= $data['id_level']; ?>" class="badge badge-success">edit</a>
                        <a href="?page=level&aksi=delete&id=<?= $data['id_level']; ?>" name="delete" onclick="return confirm('Apakah anda yakin menghapus data ini...?')" class="badge badge-danger">delete</a>

                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <a href="?page=level&aksi=add" class="btn btn-sm btn-primary"><i class="fas fa-plus-circle"></i> Add Data</a>


</section>
<!-- /.content -->