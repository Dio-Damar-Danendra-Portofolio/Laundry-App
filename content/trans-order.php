<?php 
    require_once "koneksi.php";

    $orderQuery = mysqli_query($koneksi, "SELECT orders.*, customers.* FROM orders LEFT JOIN customers ON orders.id_customers = customers.id
    WHERE deleted_at = 0 ORDER BY trans_order.id DESC");
    $rowOrder = mysqli_fetch_all($orderQuery, MYSQLI_ASSOC);

    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];
        $delete = mysqli_query($koneksi, "UPDATE orders SET deleted_at = 1 WHERE id = '$id'");
        header("Location:?page=trans-order&notif=success");
    }
?>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3>Data Transaksi Laundry</h3>
            </div>
            <div class="card-body">
                <div class="mb-3 mt-3" align="right">
                    <a href="?page=add-edit-order" class="btn btn-primary">Tambah Transaksi Baru</a>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Pemesanan</th>
                            <th>Nama Pelanggan</th>
                            <th>Tindakan</th>
                        </tr>
                    </thead>
                    <?php $no = 1; foreach ($rowOrder as $row) { ?>
                        <tbody>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $row['order_code'] ?></td>
                            <td><?php echo $row['customer_name'] ?></td>
                            <td><?php echo $row['status'] ?></td>
                            <td>
                                <a href="?page=add-edit-order&edit=<?php echo $row['id'] ?>" class="btn btn-primary btn-sm">Sunting</a>
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