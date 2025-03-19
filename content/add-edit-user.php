<?php 
    $userQuery = mysqli_query($koneksi, "SELECT * FROM users");
    $rowusers = mysqli_fetch_all($userQuery, MYSQLI_ASSOC);

    $levelQuery = mysqli_query($koneksi, "SELECT * FROM levels");
    $rowlevels = mysqli_fetch_all($levelQuery, MYSQLI_ASSOC);

    if (isset($_POST['simpan'])) {
        $user_name = $_POST['name'];
        $user_email = $_POST['email'];
        $user_password = $_POST['password'];
        $user_level_id = $_POST['id_level'];


        $insert = mysqli_query($koneksi, "INSERT INTO users (name, email, password, id_level) 
        VALUES ('$user_name', '$user_email', '$user_password', '$user_level_id')");

        if ($insert) {
            header("Location:?page=user&add=success");
        }
    }
    
        $id = isset($_GET['edit']) ? $_GET['edit'] : '';
        $queryEdit = mysqli_query($koneksi, "SELECT * FROM users WHERE id = '$id'");
        $rowEdit = mysqli_fetch_assoc($queryEdit);

    if (isset($_POST['edit'])){
        $id = $_GET['edit'];
        $user_name = $_POST['user_name'];
        $user_email = $_POST['email'];
        $user_level_id = $_POST['id_level'];

        if ($_POST['password']) {
            $user_password = sha1($_POST['password']);
        } else {
            $user_password = $rowEdit['password'];
        }

        $update = mysqli_query($koneksi, "UPDATE users SET name = '$user_name', 
        email = '$user_email', password = '$user_password', 
        id_level='$user_id_level' WHERE id = '$id'");

        if ($update) {
            header("Location:?page=user&update=success");
        }
    }
?>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3><?php echo isset($_GET['edit']) ? 'Sunting Data' : 'Tambah' ?> Pengguna</h3>
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="mb-3">
                        <label class="form-label" for="name">Nama Pengguna: <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="name" id="name" required value="<?php echo isset($_GET['edit']) ? $rowEdit['name'] : '' ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="email">E-mail Pengguna: <span class="text-danger">*</span></label>
                        <input class="form-control" type="email" name="email" id="email" required value="<?php echo isset($_GET['edit']) ? $rowEdit['email'] : '' ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="password"><i>Password</i> Pengguna: <span class="text-danger">*</span></label>
                        <input class="form-control" type="password" name="password" id="password" required value="<?php echo isset($_GET['edit']) ? $rowEdit['password'] : '' ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="id_level">Tingkat Pengguna: <span class="text-danger">*</span></label>
                        <select class="form-control"  name="id_level" id="id_level" required>
                            <option value="Pilih Tingkat Pengguna">Pilih Tingkat Pengguna</option>
                            <?php foreach ($rowlevels as $level) {?>
                                <option <?php echo isset($_GET['edit']) ? ($level['id_level'] == $rowEdit['id']) ? 'selected' : '' : '' ?> value="<?php echo $level['id']?>"><?php echo $level['level_name']?></option>
                            <?php } ?>

                        </select>
                    </div>
                    <div class="mb-3">
                        <button type="submit" name="<?php echo isset($_GET['edit']) ? 'edit' : 'simpan' ?>" class="btn btn-success btn-md"><?php echo isset($_GET['edit']) ? 'Sunting' : 'Tambah' ?> Pengguna</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>