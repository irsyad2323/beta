<?php
session_start();

include('../controller/controller_mysqli.php');

// Ambil data dari POST request
$key_fal = $_POST['key_fal'];
$pic = $_POST['pic'];
$status = $_POST['status'];
$metode_followup = $_POST['metode_followup'];
$keterangan = $_POST['keterangan'];
$login_username = $_SESSION["username"];

if ($status == 'closing') {
	$total_komitmen = !empty($_POST['total_komitmen']) ? $_POST['total_komitmen'] : 'NULL';
	$deskripsi_komitmen = !empty($_POST['deskripsi_komitmen']) ? $_POST['deskripsi_komitmen'] : 'NULL';
	$termin_pembayaran = !empty($_POST['termin_pembayaran']) ? $_POST['termin_pembayaran'] : 'NULL';

	// Proses upload file berita acara
	$berita_acara = $_FILES['berita_acara']['name'];
	$berita_acara_ext = strtolower(pathinfo($berita_acara, PATHINFO_EXTENSION));
	$acak_berita_acara = rand(1, 999);
	$tujuan_berita_acara = "../img/business_solutions_berita_acara/" . $acak_berita_acara . "." . $berita_acara_ext;
	$path_berita_acara = "img/business_solutions_berita_acara/" . $acak_berita_acara . "." . $berita_acara_ext;
}

// Buat koneksi
if (!$koneksi) {
	die("Connection failed: " . mysqli_connect_error());
}

// Cek status dan tentukan query SQL
if ($status == 'closing') {
	$sql_status = "INSERT INTO business_solutions_status (key_fal, pic, status, metode_followup, total_komitmen, deskripsi_komitmen, termin_pembayaran, keterangan, berita_acara, created_by) VALUES ('$key_fal', '$pic', '$status', '$metode_followup', $total_komitmen, '$deskripsi_komitmen', '$termin_pembayaran', '$keterangan', '$path_berita_acara', '$login_username')";
} else {
	$sql_status = "INSERT INTO business_solutions_status (key_fal, pic, status, metode_followup, keterangan, created_by) VALUES ('$key_fal', '$pic', '$status', '$metode_followup', '$keterangan', '$login_username')";
}

if (mysqli_query($koneksi, $sql_status)) {
	if ($status == 'closing') {
		// Proses upload file berita acara
		if (!empty($berita_acara)) {
			move_uploaded_file($_FILES['berita_acara']['tmp_name'], $tujuan_berita_acara);
		} else {
			$path_berita_acara = 'NULL';
		}
	}

	echo "Record created successfully";
} else {
	echo "Error creating record: " . mysqli_error($koneksi);
}

// Tutup koneksi
mysqli_close($koneksi);
