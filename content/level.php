<?php 
    $levelQuery = mysqli_query($koneksi, "SELECT * FROM levels");
    $rowlevel = mysqli_fetch_all($levelQuery, MYSQLI_ASSOC);

    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];
        $delete = mysqli_query($koneksi, "DELETE FROM levels WHERE id = '$id'");
        header("Location:?page=level&notif=success");
    }
?>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3>Data Tingkat</h3>
            </div>
            <div class="card-body">
                <div class="mb-3 mt-3" align="right">
                    <a href="?page=add-edit-level" class="btn btn-primary">Tambah Tingkat Baru</a>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Tingkat</th>
                            <th>Tindakan</th>
                        </tr>
                    </thead>
                    <?php $no = 1; foreach ($rowlevel as $row) { ?>
                        <tbody>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $row['level_name'] ?></td>
                            <td>
                                <a href="?page=add-edit-level&edit=<?php echo $row['id'] ?>" class="btn btn-primary btn-sm">Sunting</a>
                                <a href="?page=level&delete=<?php echo $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah kamu yakin untuk menghapus data ini?');">Hapus</a>
                            </td>
                        </tr>
                    </tbody>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>