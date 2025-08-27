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
$nama = clean($_POST['nama']);
$alamat = $_POST['alamat'];
$rt = $_POST['rt'];
$rw = $_POST['rw'];
$kelurahan = $_POST['kelurahan'];
$tlp = $_POST['tlp'];
$jabatan = $_POST['jabatan'];
$kd_layanan = $_POST['kd_layanan'];

$nama_bank = !empty($_POST['nama_bank']) ? $_POST['nama_bank'] : NULL;
$no_rekening = !empty($_POST['no_rekening']) ? $_POST['no_rekening'] : NULL;
$atas_nama_rekening = !empty($_POST['atas_nama_rekening']) ? $_POST['atas_nama_rekening'] : NULL;

// Check database connection
if (!$koneksi) {
	die("Connection failed: " . mysqli_connect_error());
}

// Prepare the SQL statement
$sql = "UPDATE tbl_permit SET nama = '$nama', alamat = '$alamat', rt = '$rt', rw = '$rw', kelurahan = '$kelurahan', tlp = '$tlp', jabatan = '$jabatan', kd_layanan = '$kd_layanan', nama_bank = '$nama_bank', no_rekening = '$no_rekening', atas_nama_rekening = '$atas_nama_rekening', updated_by = '$login_username' WHERE key_fal = '$key_fal'";

// Execute the SQL statement
if (mysqli_query($koneksi, $sql)) {
	echo "Record updated successfully";
} else {
	echo "Error updating record: " . mysqli_error($koneksi);
}

// Close the database connection
mysqli_close($koneksi);
