<?php 

include 'koneksi.php';

$id = isset($_GET['id_service']) ? $_GET['id_service'] : '';

$kueri = mysqli_query($koneksi, "SELECT * FROM services WHERE id = '$id'");
$baris = mysqli_fetch_assoc($kueri);

$jawaban = ['status' => 'success', 'message' => 'Data berhasil diambil!', 'data' => $baris];
echo json_encode($jawaban);
?>