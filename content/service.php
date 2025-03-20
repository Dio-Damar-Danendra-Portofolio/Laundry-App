<?php 
    require_once "koneksi.php";
    
    $serviceQuery = mysqli_query($koneksi, "SELECT * FROM services");
    $rowService = mysqli_fetch_all($serviceQuery, MYSQLI_ASSOC);

    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];
        $delete = mysqli_query($koneksi, "DELETE FROM services WHERE id = '$id'");
        header("Location:?page=service&notif=success");
    }
?>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3>Data Layanan</h3>
            </div>
            <div class="card-body">
                <div class="mb-3 mt-3" align="right">
                    <a href="?page=add-edit-service" class="btn btn-primary">Tambah Layanan Baru</a>
                </div>
                <table class="table table-striped table-bordered text-center" id="myTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Layanan</th>
                            <th>Harga Layanan</th>
                            <th>Deskripsi Layanan</th>
                            <th>Tindakan</th>
                        </tr>
                    </thead>
                    <?php $no = 1; foreach ($rowService as $row) { ?>
                        <tbody>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $row['service_name'] ?></td>
                            <td><?php echo $row['service_price'] ?></td>
                            <td><?php echo $row['service_description'] ?></td>
                            <td>
                                <a href="?page=add-edit-service&edit=<?php echo $row['id'] ?>" class="btn btn-primary btn-sm">Sunting</a>
                                <a href="?page=service&delete=<?php echo $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah kamu yakin untuk menghapus data ini?');">Hapus</a>
                            </td>
                        </tr>
                    </tbody>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>