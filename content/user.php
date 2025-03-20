<?php 
    require_once "koneksi.php";

    $userQuery = mysqli_query($koneksi, "SELECT levels.level_name, users.* FROM users LEFT JOIN levels ON users.id_level = levels.id");
    $rowuser = mysqli_fetch_all($userQuery, MYSQLI_ASSOC);

    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];
        $delete = mysqli_query($koneksi, "DELETE FROM users WHERE id = '$id'");
        header("Location:?page=user&notif=success");
    }
?>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3>Data Pengguna</h3>
            </div>
            <div class="card-body">
                <div class="mb-3 mt-3" align="right">
                    <a href="?page=add-edit-user" class="btn btn-primary">Tambah Pengguna Baru</a>
                </div>
                <table class="table table-striped table-bordered text-center" id="myTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Lengkap Pengguna</th>
                            <th>E-mail (Surel) Pengguna</th>
                            <th>Tingkat Pengguna</th>
                            <th>Tindakan</th>
                        </tr>
                    </thead>
                    <?php $no = 1; foreach ($rowuser as $row) { ?>
                        <tbody>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $row['name'] ?></td>
                            <td><?php echo $row['email'] ?></td>
                            <td><?php echo $row['level_name'] ?></td>
                            <td>
                                <a href="?page=add-edit-user&edit=<?php echo $row['id'] ?>" class="btn btn-primary btn-sm">Sunting</a>
                                <a href="?page=user&delete=<?php echo $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah kamu yakin untuk menghapus data ini?');">Hapus</a>
                            </td>
                        </tr>
                    </tbody>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>