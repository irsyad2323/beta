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
	$tujuan_dokumentasi = "../img/dokumentasi/" . $acak_dokumentasi . "." . $dokumentasi_ext;
	$path_dokumentasi = "img/dokumentasi/" . $acak_dokumentasi . "." . $dokumentasi_ext;

	// Log detail file dokumentasi
	error_log("Proses upload dokumentasi: $dokumentasi, tujuan: $tujuan_dokumentasi");
} else {
	$path_dokumentasi = null; // Tidak ada file dokumentasi diupload
}

// Jika status adalah 'closing'
if ($status == 'closing') {
	$total_komitmen = $_POST['total_komitmen'];
	$deskripsi_komitmen = $_POST['deskripsi_komitmen'];

	// Proses upload file berita acara
	$berita_acara = $_FILES['berita_acara']['name'];
	if (!empty($berita_acara)) {
		$berita_acara_ext = strtolower(pathinfo($berita_acara, PATHINFO_EXTENSION));
		$acak_berita_acara = rand(1, 999);
		$tujuan_berita_acara = "../img/berita_acara/" . $acak_berita_acara . "." . $berita_acara_ext;
		$path_berita_acara = "img/berita_acara/" . $acak_berita_acara . "." . $berita_acara_ext;

		// Log detail file berita acara
		error_log("Proses upload berita acara: $berita_acara, tujuan: $tujuan_berita_acara");
	} else {
		$path_berita_acara = null; // Tidak ada file berita acara diupload
	}

	// [BARU] Proses upload file KTP
	$ktp = $_FILES['ktp']['name'];
	if (!empty($ktp)) {
		$ktp_ext = strtolower(pathinfo($ktp, PATHINFO_EXTENSION));
		$acak_ktp = rand(1, 999);
		$tujuan_ktp = "../img/ktp/" . $acak_ktp . "." . $ktp_ext;
		$path_ktp = "img/ktp/" . $acak_ktp . "." . $ktp_ext;

		// Log detail file ktp
		error_log("Proses upload KTP: $ktp, tujuan: $tujuan_ktp");
	} else {
		$path_ktp = null;
	}

	// Update data di tbl_permit_status
	$sql = "UPDATE tbl_permit_status 
            SET pic = '$pic', status = '$status', metode_followup = '$metode_followup', 
                total_komitmen = '$total_komitmen', 
                deskripsi_komitmen = '$deskripsi_komitmen', keterangan = '$keterangan', 
                updated_by = '$login_username'";

	if (!empty($berita_acara)) {
		$sql .= ", berita_acara = '$path_berita_acara'"; // Update kolom berita_acara
	} else {
		$sql .= ", berita_acara = IFNULL(berita_acara, berita_acara)"; // Tetap gunakan yang ada
	}

	// [BARU] Tambah ktp ke query
	if (!empty($ktp)) {
		$sql .= ", ktp = '$path_ktp'";
	} else {
		$sql .= ", ktp = IFNULL(ktp, ktp)";
	}

	if (!empty($dokumentasi)) {
		$sql .= ", dokumentasi = '$path_dokumentasi'"; // Update kolom dokumentasi
	} else {
		$sql .= ", dokumentasi = IFNULL(dokumentasi, dokumentasi)"; // Tetap gunakan yang ada
	}

	$sql .= " WHERE permit_status_id = '$permit_status_id'";
} else {
	// Update data di tbl_permit_status untuk status selain 'closing'
	$sql = "UPDATE tbl_permit_status 
            SET pic = '$pic', status = '$status', metode_followup = '$metode_followup', 
                keterangan = '$keterangan', 
                updated_by = '$login_username'";

	if (!empty($dokumentasi)) {
		$sql .= ", dokumentasi = '$path_dokumentasi'"; // Update kolom dokumentasi
	} else {
		$sql .= ", dokumentasi = IFNULL(dokumentasi, dokumentasi)"; // Tetap gunakan yang ada
	}

	$sql .= " WHERE permit_status_id = '$permit_status_id'";
}

// Log query untuk update tbl_permit_status
error_log("Query update tbl_permit_status: $sql");

if (mysqli_query($koneksi, $sql)) {
	// Proses upload file berita acara jika ada
	if (!empty($berita_acara) && !move_uploaded_file($_FILES['berita_acara']['tmp_name'], $tujuan_berita_acara)) {
		die("Error: Gagal mengunggah file berita acara.");
	}

	// [BARU] Proses upload file KTP jika ada
	if (!empty($ktp) && !move_uploaded_file($_FILES['ktp']['tmp_name'], $tujuan_ktp)) {
		die("Error: Gagal mengunggah file ktp.");
	}

	// Proses upload file dokumentasi jika ada
	if (!empty($dokumentasi) && !move_uploaded_file($_FILES['dokumentasi']['tmp_name'], $tujuan_dokumentasi)) {
		die("Error: Gagal mengunggah file dokumentasi.");
	}

	// Ambil semua ID komitmen pembayaran yang ada di database
	$sql_existing_ids = "SELECT id FROM komitmen_pembayaran WHERE permit_status_id = '$permit_status_id'";
	$result_existing_ids = mysqli_query($koneksi, $sql_existing_ids);
	if (!$result_existing_ids) {
		die("Error: Gagal mengambil existing ids dari komitmen_pembayaran. " . mysqli_error($koneksi));
	}
	$existing_ids = [];
	while ($row = mysqli_fetch_assoc($result_existing_ids)) {
		$existing_ids[] = $row['id'];
	}

	// Log existing IDs komitmen_pembayaran
	error_log("Existing komitmen_pembayaran IDs: " . implode(", ", $existing_ids));

	// Proses form dinamis
	$jadwal_bayars = $_POST['jadwal_bayar'];
	$nominals = $_POST['nominal'];
	$ids = $_POST['id'];

	$submitted_ids = []; // Untuk menyimpan ID yang dikirim dari frontend

	foreach ($jadwal_bayars as $key => $jadwal_bayar) {
		$nominal = $nominals[$key];
		$id = isset($ids[$key]) ? $ids[$key] : null;

		// Proses upload file kwitansi
		if (isset($_FILES['kwitansi']['name'][$key]) && !empty($_FILES['kwitansi']['name'][$key])) {
			$filename = $_FILES['kwitansi']['name'][$key];
			$file_ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
			$acak = rand(1, 999);
			$tujuan_kwitansi = "../img/kwitansi/" . $acak . "." . $file_ext;
			$path_kwitansi = "img/kwitansi/" . $acak . "." . $file_ext;

			// Log proses upload kwitansi
			error_log("Proses upload kwitansi: $filename, tujuan: $tujuan_kwitansi");

			if (!move_uploaded_file($_FILES['kwitansi']['tmp_name'][$key], $tujuan_kwitansi)) {
				die("Error: Gagal mengunggah file kwitansi.");
			}
		} else {
			$path_kwitansi = null; // Tidak ada file kwitansi diupload
		}

		if ($id) {
			// Jika ID ada, lakukan UPDATE
			$sql_update_komitmen = "UPDATE komitmen_pembayaran 
			SET jadwal_bayar = '$jadwal_bayar', nominal = '$nominal'";

			// Cek untuk kolom kwitansi
			if (!empty($path_kwitansi)) {
				$sql_update_komitmen .= ", kwitansi = '$path_kwitansi'"; // Update kolom kwitansi
			} else {
				$sql_update_komitmen .= ", kwitansi = IFNULL(kwitansi, kwitansi)"; // Tetap gunakan yang ada
			}

			$sql_update_komitmen .= " WHERE id = '$id'";

			// Log query update komitmen_pembayaran
			error_log("Query update komitmen_pembayaran: $sql_update_komitmen");

			if (!mysqli_query($koneksi, $sql_update_komitmen)) {
				die("Error: Gagal memperbarui komitmen_pembayaran. " . mysqli_error($koneksi));
			}

			$submitted_ids[] = $id; // Tambahkan ke array submitted_ids
		} else {
			// Jika ID tidak ada, lakukan INSERT
			$sql_insert_komitmen = "INSERT INTO komitmen_pembayaran 
									(permit_status_id, jadwal_bayar, nominal, created_by) 
									VALUES ('$permit_status_id', '$jadwal_bayar', '$nominal', '$login_username')";

			// Log query insert komitmen_pembayaran
			error_log("Query insert komitmen_pembayaran: $sql_insert_komitmen");

			if (!mysqli_query($koneksi, $sql_insert_komitmen)) {
				die("Error: Gagal menambahkan komitmen_pembayaran. " . mysqli_error($koneksi));
			}
		}
	}

	// Hapus komitmen pembayaran yang ID-nya tidak ada di submitted_ids
	$ids_to_delete = array_diff($existing_ids, $submitted_ids);
	if (!empty($ids_to_delete)) {
		$ids_to_delete_string = implode(",", $ids_to_delete);
		$sql_delete_komitmen = "DELETE FROM komitmen_pembayaran WHERE id IN ($ids_to_delete_string)";

		// Log query delete komitmen_pembayaran
		error_log("Query delete komitmen_pembayaran: $sql_delete_komitmen");

		if (!mysqli_query($koneksi, $sql_delete_komitmen)) {
			die("Error: Gagal menghapus komitmen_pembayaran. " . mysqli_error($koneksi));
		}
	}

	echo "Record updated successfully";
} else {
	die("Error: Gagal mengupdate tbl_permit_status. " . mysqli_error($koneksi));
}

mysqli_close($koneksi);
