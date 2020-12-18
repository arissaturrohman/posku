<h1 class="h3 mb-4 text-gray-800">Add Data Level</h1>
<div class="row">
    <div class="col-sm-6">
        <div class="card mb-4 py-3 border-left-info">
            <div class="card-body">

                <form action="" method="post">
                    <div class="mb-3 row">
                        <label for="level" class="col-sm-4 col-form-label">Level</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="level" id="level" placeholder="Level Pelanggan">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="diskon" class="col-sm-4 col-form-label">No Telp</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="diskon" id="diskon" placeholder="Diskon">
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
<button type="submit" name="submit" class="btn btn-info">Submit</button>
<a href="?page=level" class="btn btn-secondary">Cancel</a>
</form>


<?php

if (isset($_POST['submit'])) {
    $level = mysqli_real_escape_string($conn, $_POST['level']);
    $diskon = mysqli_real_escape_string($conn, $_POST['diskon']);

    $sql = $conn->query("INSERT INTO tb_level (p_level, diskon) VALUES('$level', '$diskon')");

    if ($sql) {
?>
        <script>
            alert("Data berhasil ditambah");
            window.location.href = "?page=level";
        </script>
<?php
    }
}

?>