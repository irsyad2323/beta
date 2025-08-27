<?php
session_start();

include('../controller/controller_mysqli.php');

if (!$koneksi) {
	die("Connection failed: " . mysqli_connect_error());
}

$login_username = $_SESSION["username"];

// Ambil data dari POST request
$permit_status_id = $_POST['permit_status_id'];
$pic = $_POST['pic'];
$status = $_POST['status'];
$metode_followup = $_POST['metode_followup'];
$keterangan = $_POST['keterangan'];

// Proses upload file dokumentasi
$dokumentasi = $_FILES['dokumentasi']['name'];
if (!empty($dokumentasi)) {
	$dokumentasi_ext = strtolower(pathinfo($dokumentasi, PATHINFO_EXTENSION));
	$acak_dokumentasi = rand(1, 999);
	$tujuan_dokumentasi = "../img/business_solutions_dokumentasi/" . $acak_dokumentasi . "." . $dokumentasi_ext;
	$path_dokumentasi = "img/business_solutions_dokumentasi/" . $acak_dokumentasi . "." . $dokumentasi_ext;

	// Log detail file dokumentasi
	error_log("Proses upload dokumentasi: $dokumentasi, tujuan: $tujuan_dokumentasi");
} else {
	$path_dokumentasi = null; // Tidak ada file dokumentasi diupload
}

// Jika status adalah 'closing'
if ($status == 'closing') {
	$total_komitmen = $_POST['total_komitmen'];
	$deskripsi_komitmen = $_POST['deskripsi_komitmen'];
	$termin_pembayaran = $_POST['termin_pembayaran'];

	// Proses upload file berita acara
	$berita_acara = $_FILES['berita_acara']['name'];
	if (!empty($berita_acara)) {
		$berita_acara_ext = strtolower(pathinfo($berita_acara, PATHINFO_EXTENSION));
		$acak_berita_acara = rand(1, 999);
		$tujuan_berita_acara = "../img/business_solutions_berita_acara/" . $acak_berita_acara . "." . $berita_acara_ext;
		$path_berita_acara = "img/business_solutions_berita_acara/" . $acak_berita_acara . "." . $berita_acara_ext;

		// Log detail file berita acara
		error_log("Proses upload berita acara: $berita_acara, tujuan: $tujuan_berita_acara");
	} else {
		$path_berita_acara = null; // Tidak ada file berita acara diupload
	}

	// Update data di business_solutions_status
	$sql = "UPDATE business_solutions_status SET pic = '$pic', status = '$status', metode_followup = '$metode_followup', total_komitmen = '$total_komitmen', deskripsi_komitmen = '$deskripsi_komitmen', termin_pembayaran = '$termin_pembayaran', keterangan = '$keterangan', updated_by = '$login_username'";

	if (!empty($berita_acara)) {
		$sql .= ", berita_acara = '$path_berita_acara'"; // Update kolom berita_acara
	} else {
		$sql .= ", berita_acara = IFNULL(berita_acara, berita_acara)"; // Tetap gunakan yang ada
	}

	if (!empty($dokumentasi)) {
		$sql .= ", dokumentasi = '$path_dokumentasi'"; // Update kolom dokumentasi
	} else {
		$sql .= ", dokumentasi = IFNULL(dokumentasi, dokumentasi)"; // Tetap gunakan yang ada
	}

	$sql .= " WHERE permit_status_id = '$permit_status_id'";
} else {
	// Update data di business_solutions_status untuk status selain 'closing'
	$sql = "UPDATE business_solutions_status SET pic = '$pic', status = '$status', metode_followup = '$metode_followup', keterangan = '$keterangan', updated_by = '$login_username'";

	if (!empty($dokumentasi)) {
		$sql .= ", dokumentasi = '$path_dokumentasi'"; // Update kolom dokumentasi
	} else {
		$sql .= ", dokumentasi = IFNULL(dokumentasi, dokumentasi)"; // Tetap gunakan yang ada
	}

	$sql .= " WHERE permit_status_id = '$permit_status_id'";
}

// Log query untuk update business_solutions_status
error_log("Query update business_solutions_status: $sql");

if (mysqli_query($koneksi, $sql)) {
	// Proses upload file berita acara jika ada
	if (!empty($berita_acara) && !move_uploaded_file($_FILES['berita_acara']['tmp_name'], $tujuan_berita_acara)) {
		die("Error: Gagal mengunggah file berita acara.");
	}

	// Proses upload file dokumentasi jika ada
	if (!empty($dokumentasi) && !move_uploaded_file($_FILES['dokumentasi']['tmp_name'], $tujuan_dokumentasi)) {
		die("Error: Gagal mengunggah file dokumentasi.");
	}

	echo "Record updated successfully";
} else {
	die("Error: Gagal mengupdate business_solutions_status. " . mysqli_error($koneksi));
}

mysqli_close($koneksi);
