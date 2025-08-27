<?php
session_start();

include('../controller/controller_mysqli.php');

$key_fal = $_POST['key_fal'];
$pic = $_POST['pic'];
$status = $_POST['status'];
$metode_followup = $_POST['metode_followup'];
$keterangan = $_POST['keterangan'];

$login_username = $_SESSION["username"];

if (!$koneksi) {
	die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO tbl_permit_status (key_fal, pic, status, metode_followup, keterangan, created_by) VALUES ($key_fal, '$pic', '$status', '$metode_followup', '$keterangan', '$login_username')";

if (mysqli_query($koneksi, $sql)) {
	echo "Record updated successfully";
} else {
	echo "Error updating record: " . mysqli_error($koneksi);
}

mysqli_close($koneksi);
