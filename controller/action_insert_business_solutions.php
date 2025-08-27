<?php
session_start();

include('../controller/controller_mysqli.php');

function clean($string)
{
	$string = str_replace(' ', ' ', $string); // Mengganti semua spasi dengan spasi (tidak mengubah apa-apa di sini)
	return preg_replace('/[^A-Za-z0-9\-]/', ' ', $string); // Menghapus karakter spesial
}

// Data dari form
$nama_instansi = mysqli_real_escape_string($koneksi, clean($_POST['nama_instansi']));
$alamat_instansi = $_POST['alamat_instansi'];
$kelurahan = $_POST['kelurahan'];
$contact_person = $_POST['contact_person'];
$telepon = $_POST['telepon'];
$jabatan = $_POST['jabatan'];
$kd_layanan = $_POST['kd_layanan'];
$login_username = $_SESSION["username"];

if (!$koneksi) {
	die("Connection failed: " . mysqli_connect_error());
}

// Ambil nomor izin terakhir dari kolom kode
$result = mysqli_query($koneksi, "SELECT MAX(SUBSTRING(kode, 6)) AS last_number FROM business_solutions");
$row = mysqli_fetch_assoc($result);
$last_number = $row['last_number'] ? (int)$row['last_number'] : 0;

// Generate nomor izin baru
$new_number = $last_number + 1;
$new_kode = 'BS.' . str_pad($new_number, 5, '0', STR_PAD_LEFT);

// Query untuk insert data dengan nomor izin baru
$sql = "INSERT INTO business_solutions (kode, nama_instansi, alamat_instansi, kelurahan, contact_person, telepon, jabatan, kd_layanan, created_by) VALUES ('$new_kode', '$nama_instansi', '$alamat_instansi', '$kelurahan', '$contact_person', '$telepon', '$jabatan', '$kd_layanan', '$login_username');";

if (mysqli_query($koneksi, $sql)) {
	echo "Data berhasil ditambahkan dengan kode: " . $new_kode;
} else {
	echo "Error: " . mysqli_error($koneksi);
}

mysqli_close($koneksi);
