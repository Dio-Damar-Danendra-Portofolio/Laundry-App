<?php 
    require_once "koneksi.php";

    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $id_level = $_POST["id_level"];

    $levelQuery = mysqli_query($koneksi, "SELECT * FROM levels ORDER BY id DESC");
    $rowLevel = mysqli_fetch_all($levelQuery, MYSQLI_ASSOC);

    if (isset($_POST['create'])) {   
        $register_query = mysqli_query($koneksi, "INSERT INTO users (name, email, password, id_level) 
        VALUES ('$name', '$email', '$password', '$id_level') ");
        if ($register_query) {
            header("Location: index.php");
        } else {
            header("Location: register.php?register=error");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Daftar - Laundry Apps</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Apr 20 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo.png" alt="">
                  <span class="d-none d-lg-block">Aplikasi Laundry</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Buat Akun</h5>
                    <p class="text-center small">Masukkan data diri Anda untuk membuat akun</p>
                  </div>

                  <form class="row g-3 needs-validation" novalidate method="post">
                    <div class="col-12">
                      <label for="name" class="form-label">Nama Lengkap: </label>
                      <input type="text" name="name" class="form-control" id="name" required>
                      <div class="invalid-feedback">Masukkan nama lengkap Anda!</div>
                    </div>

                    <div class="col-12">
                      <label for="email" class="form-label">E-mail (Surel): </label>
                      <input type="email" name="email" class="form-control" id="email" required>
                      <div class="invalid-feedback">Masukkan alamat e-mail Anda!</div>
                    </div>

                    <div class="col-12">
                      <label for="password" class="form-label">Kata Sandi: </label>
                      <input type="password" name="password" class="form-control" id="password" required>
                      <div class="invalid-feedback">Masukkan kata sandi Anda!</div>
                    </div>

                    <div class="col-12">
                      <label for="level" class="form-label">Peran: </label>
                      <select name="id_level" class="form-control" id="level" required>
                        <?php foreach ($rowLevel as $row) { ?>
                            <option value="<?php echo $row['id'] ?>"><?php echo $row['level_name'] ?></option>
                            <?php } ?>
                        </select>
                      <div class="invalid-feedback">Pilih peran Anda!</div>
                    </div>

                    <div class="col-12">
                      <button class="btn btn-primary w-100" name="create" type="submit">Buat Akun</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Sudah mempunyai akun? <a href="index.php">Masuk</a></p>
                    </div>
                  </form>

                  </div>
              </div>

              <?php include "inc/credit.php"; ?>
              

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>