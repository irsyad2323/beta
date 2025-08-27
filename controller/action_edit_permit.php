<?php
session_start();

include('../controller/controller_mysqli.php');

function clean($string)
{
	$string = str_replace(' ', ' ', $string); // Replaces all spaces with spaces.
	return preg_replace('/[^A-Za-z0-9\-]/', ' ', $string); // Removes special chars.
}

$login_username = $_SESSION["username"];

$key_fal = $_POST['key_fal'];
$permit_status_id = $_POST['permit_status_id'];
$nama = clean($_POST['nama']);
$alamat = $_POST['alamat'];
$rt = $_POST['rt'];
$rw = $_POST['rw'];
$kelurahan = $_POST['kelurahan'];
$tlp = $_POST['tlp'];
$jabatan = $_POST['jabatan'];
$kd_layanan = $_POST['kd_layanan'];
$pic = $_POST['pic'];
$status = $_POST['status'];
$metode_followup = $_POST['metode_followup'];
$keterangan = $_POST['keterangan'];

$filename = $_FILES['file']['name'];
$file_ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
$acak = rand(1, 999);
$tujuan_ktp = "../img/dokumentasi/" . $acak . "." . $file_ext;
$patch = "img/dokumentasi/" . $acak . "." . $file_ext;
$path_ktp = $patch;
$path_ktp = empty($filename) ? NULL : $patch;

if (!$koneksi) {
	die("Connection failed: " . mysqli_connect_error());
}

// Start transaction
mysqli_begin_transaction($koneksi);

try {
	$sql1 = "UPDATE tbl_permit SET nama = '$nama', alamat = '$alamat', rt = '$rt', rw = '$rw', kelurahan = '$kelurahan', tlp = '$tlp', jabatan = '$jabatan', kd_layanan = '$kd_layanan', updated_by = '$login_username'  WHERE key_fal = '$key_fal'";

	$sql2 = "UPDATE tbl_permit_status SET pic = '$pic', status = '$status', metode_followup = '$metode_followup', keterangan = '$keterangan', dokumentasi = '$path_ktp', updated_by = '$login_username' WHERE permit_status_id = '$permit_status_id'";

	if (mysqli_query($koneksi, $sql1) && mysqli_query($koneksi, $sql2)) {
		move_uploaded_file($_FILES['file']['tmp_name'], $tujuan_ktp);
		mysqli_commit($koneksi);
		echo "Record updated successfully";
	} else {
		mysqli_rollback($koneksi);
		echo "Error updating record: " . mysqli_error($koneksi);
	}
} catch (Exception $e) {
	mysqli_rollback($koneksi);
	echo "Transaction failed: " . $e->getMessage();
}

mysqli_close($koneksi);
