<?php
session_start();

include('../controller/controller_mysqli.php');

// Memeriksa koneksi ke database
if (!$koneksi) {
	die("Connection failed: " . mysqli_connect_error());
}

// Mendapatkan data dari request POST
$id = $_POST['id']; // ID prospek yang ingin diupdate
$status = $_POST['status']; // Status saat ini (0 atau 1)
$updated_by = $_POST['updated_by']; // Status saat ini (0 atau 1)

// Mengubah status (toggle antara 0 dan 1)
$new_status = ($status == 1) ? 0 : 1;

// Query untuk update status hot prospek
$sql_toggle = "UPDATE business_solutions SET is_hot_prospek = $new_status, updated_by = '$updated_by' WHERE key_fal = '$id'";

if (mysqli_query($koneksi, $sql_toggle)) {
	echo 1;
} else {
	echo 0;
}

mysqli_close($koneksi);
