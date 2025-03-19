<?php 
    $host_koneksi = "localhost";
    $host_username = "root";
    $host_password = "";
    $host_db = "angkatan1_laundry";

    $koneksi = mysqli_connect($host_koneksi, $host_username, $host_password, $host_db);
    if (!$koneksi) {
        echo "Koneksi gagal. Silakan coba lagi";
    }
?>
