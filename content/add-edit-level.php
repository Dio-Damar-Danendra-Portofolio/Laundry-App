<?php 
    $levelQuery = mysqli_query($koneksi, "SELECT * FROM levels");
    $rowlevels = mysqli_fetch_all($levelQuery, MYSQLI_ASSOC);

    if (isset($_POST['simpan'])) {
        $level_name = $_POST['level_name'];
        $level_address = $_POST['level_address'];
        $level_phone = $_POST['level_phone'];

        $insert = mysqli_query($koneksi, "INSERT INTO levels (level_name) 
        VALUES ('$level_name'");

        if ($insert) {
            header("Location:?page=level&add=success");
        }
    }
    
    if (isset($_GET['edit'])) {
        $id = $_GET['edit'];
        $queryEdit = mysqli_query($koneksi, "SELECT * FROM levels WHERE id = '$id'");
        $rowEdit = mysqli_fetch_assoc($queryEdit);
    }

    if (isset($_POST['edit'])){
        $id = $_GET['edit'];
        $level_name = $_POST['level_name'];

        $update = mysqli_query($koneksi, "UPDATE levels SET level_name = '$level_name' WHERE id = '$id'");
        header("Location:?page=level&update=success");
    }
?>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3><?php echo isset($_GET['edit']) ? 'Sunting Data' : 'Tambah' ?> Tingkat</h3>
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="mb-3">
                        <label class="form-label" for="level_name">Nama Tingkat: <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="level_name" id="level_name" required value="<?php echo isset($_GET['edit']) ? $rowEdit['level_name'] : '' ?>">
                    </div>
                    <div class="mb-3">
                        <button type="submit" name="<?php echo isset($_GET['edit']) ? 'edit' : 'simpan' ?>" class="btn btn-success btn-md"><?php echo isset($_GET['edit']) ? 'Sunting' : 'Tambah' ?> Tingkat</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>