<?php
session_start();

include('../controller/controller_mysqli.php');

$login_username = $_SESSION["username"];

$permit_status_id = $_POST['permit_status_id'];
$key_fal = $_POST['key_fal'];
$pic = $_POST['pic'];
$status = $_POST['status'];
$metode_followup = $_POST['metode_followup'];
$jangka_waktu_komitmen = $_POST['jangka_waktu_komitmen'];
$total_komitmen = $_POST['total_komitmen'];
$deskripsi_komitmen = $_POST['deskripsi_komitmen'];
$keterangan = $_POST['keterangan'];

$filename = $_FILES['file']['name'];
$file_ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
$acak = rand(1, 999);
$tujuan_dokumentasi = "../img/dokumentasi/" . $acak . "." . $file_ext;
$patch = "img/dokumentasi/" . $acak . "." . $file_ext;
$path_dokumentasi = $patch;
$path_dokumentasi = empty($filename) ? NULL : $patch;

if (!$koneksi) {
	die("Connection failed: " . mysqli_connect_error());
}

$sql = "UPDATE tbl_permit_status SET key_fal = '$key_fal', pic = '$pic', status = '$status', metode_followup = '$metode_followup', jangka_waktu_komitmen = '$jangka_waktu_komitmen', total_komitmen = '$total_komitmen', deskripsi_komitmen = '$deskripsi_komitmen', keterangan = '$keterangan', dokumentasi = '$path_dokumentasi', updated_by = '$login_username' WHERE permit_status_id = '$permit_status_id'";

// Execute the SQL statement
if (mysqli_query($koneksi, $sql)) {
	move_uploaded_file($_FILES['file']['tmp_name'], $tujuan_dokumentasi);
	echo "Record updated successfully";
} else {
	echo "Error updating record: " . mysqli_error($koneksi);
}

mysqli_close($koneksi);
