<button?php 
    require_once "koneksi.php";
    
    $orderQuery = mysqli_query($koneksi, "SELECT orders.*, customers.* FROM orders LEFT JOIN customers ON orders.id_customers = customers.id
    WHERE deleted_at = 0 ORDER BY trans_order.id DESC");
    $rowOrder = mysqli_fetch_all($orderQuery, MYSQLI_ASSOC);

    if (isset($_POST['simpan'])) {
        $customer_name = $_POST['customer_name'];
        $customer_address = $_POST['customer_address'];
        $customer_phone = $_POST['customer_phone'];

        $insert = mysqli_query($koneksi, "INSERT INTO customers (customer_name, customer_phone, customer_address) 
        VALUES ('$customer_name', '$customer_phone', '$customer_address')");

        if ($insert) {
            header("Location:?page=customer&add=success");
        }
    }
    
    if (isset($_GET['edit'])) {
        $id = $_GET['edit'];
        $queryEdit = mysqli_query($koneksi, "SELECT * FROM customers WHERE id = '$id'");
        $rowEdit = mysqli_fetch_assoc($queryEdit);
    }

    if (isset($_POST['edit'])){
        $id = $_GET['edit'];
        $customer_name = $_POST['customer_name'];
        $customer_address = $_POST['customer_address'];
        $customer_phone = $_POST['customer_phone'];

        $update = mysqli_query($koneksi, "UPDATE customers SET customer_name = '$customer_name', customer_phone = '$customer_phone', customer_address = '$customer_address'
         WHERE id = '$id'");
        header("Location:?page=customer&update=success");
    }
?>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3><?php echo isset($_GET['edit']) ? 'Sunting Data' : 'Tambah' ?> Transaksi Pemesanan</h3>
            </div>
            <div class="card-body mt-3">
                <form action="" method="post">
                    <div class="col-sm-6">
                        <div class="mb-3 row">
                            <div class="col-sm-2">
                                <label for="order_code" class="form-label">Kode Pemesanan: </label>
                            </div>
                            <div class="col-sm-5">
                                <input type="text" name="order_code" id="order_code" class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3 row">
                            <div class="col-sm-3">
                                <label for="order_date" class="form-label">Tanggal Pemesanan: </label>
                            </div>
                            <div class="col-sm-5">
                                <input type="date" name="order_date" id="order_date" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3 row">
                            <div class="col-sm-4">
                                <label for="id_customer" class="form-label">Nama Pelanggan: </label>
                            </div>
                            <div class="col-sm-8">
                                <select name="id_customer" id="id_customer" class="form-control">
                                <option value="">Pilih Pelanggan</option>
                                <?php foreach ($rowOrder as $order) { ?>
                                    <option value="<?php echo $order['']?>"></option>
                                <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3 row">
                            <div class="col-sm-4">
                                <label for="order_end_date" class="form-label">Tanggal Pengambilan: </label>
                            </div>
                            <div class="col-sm-8">
                                <input type="date" name="order_end_date" id="order_end_date" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-sm-12">
                            <div align="right">
                                <button type="button" class="btn btn-success btn-sm add-row">Tambah Baris</button>
                            </div>
                            <table class="table table-bordered table-order">
                                <thead>
                                    <tr>
                                        <th>Layanan</th>
                                        <th>Jumlah (dalam kilogram)</th>
                                        <th>Catatan</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>