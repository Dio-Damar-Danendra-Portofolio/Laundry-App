<?php 
    $customerQuery = mysqli_query($koneksi, "SELECT * FROM customers");
    $rowCustomers = mysqli_fetch_all($customerQuery, MYSQLI_ASSOC);

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
                <h3><?php echo isset($_GET['edit']) ? 'Sunting Data' : 'Tambah' ?> Pelanggan</h3>
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="mb-3">
                        <label class="form-label" for="customer_name">Nama Pelanggan: <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="customer_name" id="customer_name" required value="<?php echo isset($_GET['edit']) ? $rowEdit['customer_name'] : '' ?>">
                    </div>
                    <div class="mb-3">
                    <label class="form-label" for="customer_phone">Nomor Telepon Pelanggan: <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="customer_phone" id="customer_phone" required value="<?php echo isset($_GET['edit']) ? $rowEdit['customer_phone'] : '' ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="customer_address">Alamat Pelanggan: <span class="text-danger">*</span></>
                        <input class="form-control" type="text" name="customer_address" id="customer_address" required value="<?php echo isset($_GET['edit']) ? $rowEdit['customer_address'] : '' ?>">
                    </div>
                    <div class="mb-3">
                        <button type="submit" name="<?php echo isset($_GET['edit']) ? 'edit' : 'simpan' ?>" class="btn btn-success btn-md"><?php echo isset($_GET['edit']) ? 'Sunting' : 'Tambah' ?> Pelanggan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>