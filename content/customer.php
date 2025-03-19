<?php 
    $customerQuery = mysqli_query($koneksi, "SELECT * FROM customers");
    $rowCustomers = mysqli_fetch_all($customerQuery, MYSQLI_ASSOC);

    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];
        $delete = mysqli_query($koneksi, "DELETE FROM customers WHERE id = '$id'");
        header("Location:?page=customer&notif=success");
    }
?>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3>Data Pelanggan</h3>
            </div>
            <div class="card-body">
                <div class="mb-3 mt-3" align="right">
                    <a href="?page=add-edit-customer" class="btn btn-primary">Tambah Pelanggan Baru</a>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Telepon</th>
                            <th>Alamat</th>
                            <th>Tindakan</th>
                        </tr>
                    </thead>
                    <?php $no = 1; foreach ($rowCustomers as $row) { ?>
                        <tbody>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $row['customer_name'] ?></td>
                            <td><?php echo $row['customer_phone'] ?></td>
                            <td><?php echo $row['customer_address'] ?></td>
                            <td>
                                <a href="?page=add-edit-customer&edit=<?php echo $row['id'] ?>" class="btn btn-primary btn-sm">Sunting</a>
                                <a href="?page=customer&delete=<?php echo $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah kamu yakin untuk menghapus data ini?');">Hapus</a>
                            </td>
                        </tr>
                    </tbody>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>