<?php
session_start();

include('controller_mysqli.php');

function clean($string)
{
	$string = str_replace(' ', ' ', $string); // Replaces all spaces with spaces.
	return preg_replace('/[^A-Za-z0-9\-]/', ' ', $string); // Removes special chars.
}

$login_username = $_SESSION["username"];

$key_fal = $_POST['key_fal'];
$nama_instansi = mysqli_real_escape_string($koneksi, clean($_POST['nama_instansi']));
$alamat_instansi = $_POST['alamat_instansi'];
$kelurahan = $_POST['kelurahan'];
$contact_person = $_POST['contact_person'];
$telepon = $_POST['telepon'];
$jabatan = $_POST['jabatan'];
$kd_layanan = $_POST['kd_layanan'];

// Check database connection
if (!$koneksi) {
	die("Connection failed: " . mysqli_connect_error());
}

// Prepare the SQL statement
$sql = "UPDATE business_solutions SET nama_instansi = '$nama_instansi', alamat_instansi = '$alamat_instansi', kelurahan = '$kelurahan', contact_person = '$contact_person', telepon = '$telepon', jabatan = '$jabatan', kd_layanan = '$kd_layanan', updated_by = '$login_username' WHERE key_fal = '$key_fal'";

// Execute the SQL statement
if (mysqli_query($koneksi, $sql)) {
	echo "Record updated successfully";
} else {
	echo "Error updating record: " . mysqli_error($koneksi);
}

// Close the database connection
mysqli_close($koneksi);
