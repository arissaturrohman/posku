<h1 class="h3 mb-4 text-gray-800">Edit Data Level</h1>
<div class="row">
    <div class="col-sm-6">
        <div class="card mb-4 py-3 border-left-info">
            <div class="card-body">
                <?php 
                $query = $conn->query("SELECT * FROM tb_level WHERE id_level = '$_GET[id]'");
                $result = $query->fetch_assoc();
                ?>
                <form action="" method="post">
                    <div class="mb-3 row">
                        <label for="level" class="col-sm-4 col-form-label">Level</label>
                        <div class="col-sm-8">
                            <input type="text" value="<?= $result['p_level']; ?>" class="form-control" name="level" id="level" placeholder="Level Pelanggan">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="diskon" class="col-sm-4 col-form-label">Diskon</label>
                        <div class="col-sm-8">
                            <input type="text" value="<?= $result['diskon']; ?>" class="form-control" name="diskon" id="diskon" placeholder="Diskon">
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
<button type="submit" name="edit" class="btn btn-info">Submit</button>
<a href="?page=level" class="btn btn-secondary">Cancel</a>
</form>


<?php

if (isset($_POST['edit'])) {
    $level = mysqli_real_escape_string($conn, $_POST['level']);
    $diskon = mysqli_real_escape_string($conn, $_POST['diskon']);

    $sql = $conn->query("UPDATE tb_level SET p_level = '$level', diskon = '$diskon' WHERE id_level = '$_GET[id]'");

    if ($sql) {
?>
        <script>
            alert("Data berhasil diubah");
            window.location.href = "?page=level";
        </script>
<?php
    }
}

?>