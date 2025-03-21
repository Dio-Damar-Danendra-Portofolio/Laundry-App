<?php 
    require_once "koneksi.php";
    
    $orderQuery = mysqli_query($koneksi, "SELECT orders.*, customers.* FROM orders LEFT JOIN customers ON orders.id_customer = customers.id
    ORDER BY orders.id DESC");
    $rowOrder = mysqli_fetch_all($orderQuery, MYSQLI_ASSOC);

    $customerQuery = mysqli_query($koneksi, "SELECT * FROM customers");
    $rowCustomer = mysqli_fetch_all($customerQuery, MYSQLI_ASSOC);

    $serviceQuery = mysqli_query($koneksi, "SELECT * FROM services");
    $rowService = mysqli_fetch_all($serviceQuery, MYSQLI_ASSOC);

    // TR210325

    $queryTrans = mysqli_query($koneksi, "SELECT max(id) as order_id FROM orders;");
    $rowTrans = mysqli_fetch_assoc($queryTrans);
    $id_trans = $rowTrans['order_id'];
    $id_trans++;

    $kode_transaksi = "TR".date("mdy").sprintf("%03s", $id_trans);

?>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3><?php echo isset($_GET['edit']) ? 'Sunting Data' : 'Tambah' ?> Transaksi Pemesanan</h3>
            </div>
            <div class="card-body mt-3">
                <form action="" method="post">
                    <input type="hidden" id="service_price">
                <div class="col-sm-6">
                        <div class="mb-3 row">
                            <div class="col-sm-2">
                                <label for="order_code" class="form-label">Kode Pemesanan: </label>
                            </div>
                            <div class="col-sm-5">
                                <input type="text" name="order_code" id="order_code" class="form-control" readonly value="<?php echo $kode_transaksi?>">
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
                                <select name="id_customer" id="id_customer" class="form-select">
                                <option value="">Pilih Pelanggan</option>
                                <?php foreach ($rowCustomer as $customer) { ?>
                                    <option value="<?php echo $customer['id']?>"><?php echo $customer['customer_name']?></option>
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
                    <div class="col-sm-6">
                        <div class="mb-3 row">
                            <div class="col-sm-4">
                                <label for="" class="form-label">Layanan: </label>
                            </div>
                            <div class="col-sm-8">
                                <select name="" id="id_service" class="form-select">
                                    <option value="">Pilih Layanan</option>
                                    <?php foreach ($rowService as $service) { ?>
                                        <option value="<?php echo $service['id']?>"><?php echo $service['service_name']?></option>
                                        <?php } ?>
                                </select>
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
                                        <th>Tindakan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                    <div class="row mt-5">
                         <button type="submit" class="btn btn-primary btn-md">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>