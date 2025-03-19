<?php 
    $serviceQuery = mysqli_query($koneksi, "SELECT * FROM services");
    $rowservices = mysqli_fetch_all($serviceQuery, MYSQLI_ASSOC);

    if (isset($_POST['simpan'])) {
        $service_name = $_POST['service_name'];
        $service_address = $_POST['service_address'];
        $service_phone = $_POST['service_phone'];

        $insert = mysqli_query($koneksi, "INSERT INTO services (service_name, service_price, service_description) 
        VALUES ('$service_name', '$service_phone', '$service_address')");

        if ($insert) {
            header("Location:?page=service&add=success");
        }
    }
    
    if (isset($_GET['edit'])) {
        $id = $_GET['edit'];
        $queryEdit = mysqli_query($koneksi, "SELECT * FROM services WHERE id = '$id'");
        $rowEdit = mysqli_fetch_assoc($queryEdit);
    }

    if (isset($_POST['edit'])){
        $id = $_GET['edit'];
        $service_name = $_POST['service_name'];
        $service_price = $_POST['service_price'];
        $service_description = $_POST['service_description'];

        $update = mysqli_query($koneksi, "UPDATE services SET service_name = '$service_name', service_price = '$service_price', service_description = '$service_description'
         WHERE id = '$id'");
        header("Location:?page=service&update=success");
    }
?>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3><?php echo isset($_GET['edit']) ? 'Sunting Data' : 'Tambah' ?> Layanan</h3>
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="mb-3">
                        <label class="form-label" for="service_name">Nama Layanan: <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="service_name" placeholder="Masukkan nama layanan" id="service_name" required value="<?php echo isset($_GET['edit']) ? $rowEdit['service_name'] : '' ?>">
                    </div>
                    <div class="mb-3">
                    <label class="form-label" for="service_price">Harga Layanan: <span class="text-danger">*</span></label>
                    <input class="form-control" type="number" name="service_price" placeholder="Masukkan harga layanan" id="service_price" required value="<?php echo isset($_GET['edit']) ? $rowEdit['service_price'] : '' ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="service_description">Deskripsi Layanan: <span class="text-danger">*</span></>
                        <textarea class="form-control" cols="100" rows="5" placeholder="Masukkan deskripsi layanan" name="service_description" id="service_description" required value="<?php echo isset($_GET['edit']) ? $rowEdit['service_description'] : '' ?>"></textarea>
                    </div>
                    <div class="mb-3">
                        <button type="submit" name="<?php echo isset($_GET['edit']) ? 'edit' : 'simpan' ?>" class="btn btn-success btn-md"><?php echo isset($_GET['edit']) ? 'Sunting' : 'Tambah' ?> Layanan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>