<?php
session_start();
include('../controller/controller_mysqli.php');
$key_fal = $_POST['key_fal'];
$nama_fal = $_POST['nama_fal'];
$username_fal = $_POST['username_fal'];
$pic_ikr = $_POST['pic_ikr'];
$jenis_wo = $_POST['jenis_wo'];
$lokasi = $_POST['lokasi'];
$lok_hasil = "https://www.google.com/maps/search/?api=1&query=" . $lokasi;

if ($jenis_wo == 'INSTALASI') {
	mysqli_autocommit($koneksi, FALSE);
	// Insert some values
	$query1 = mysqli_query($koneksi, "UPDATE tbl_fal SET working = '1' , lokasi_proses = '$lok_hasil' ,tgl_proses_teknis= CURRENT_TIMESTAMP() WHERE key_fal='$key_fal';");
	if ((!$query1)) {
		echo '3';
		mysqli_rollback($koneksi);
	} else {
		if (!mysqli_commit($koneksi)) {
			echo '4';
			mysqli_rollback($koneksi);
		} else {
			echo '1';
		}
	}
	//}
} elseif ($jenis_wo == 'MAINTENANCE') {
	mysqli_autocommit($koneksi, FALSE);
	// Insert some values
	$query1 = mysqli_query($koneksi, "UPDATE tbl_maintenance SET pic_ikr = '" . $_SESSION["username"] . "', working = '1' , tgl_proses_teknis= CURRENT_TIMESTAMP(), lokasi_proses='$lok_hasil' WHERE key_fal='$key_fal';");
	if ((!$query1)) {
		echo '3';
		mysqli_rollback($koneksi);
	} else {
		if (!mysqli_commit($koneksi)) {
			echo '4';
			mysqli_rollback($koneksi);
		} else {
			echo '1';
		}
	}
	//}
} elseif ($jenis_wo == 'MAINTENANCE_ODP') {
	// Turn autocommit off
	mysqli_autocommit($koneksi, FALSE);
	// Insert some values
	$query1 = mysqli_query($koneksi, "UPDATE tbl_maintenance_odp SET pic_ikr = '" . $_SESSION["username"] . "', working = '1', status_wo = 'Proses Pengerjaan', tgl_proses= CURRENT_TIMESTAMP(), get_lokasi_proses= '$lok_hasil' WHERE key_fal='$key_fal';");
	if ((!$query1)) {
		echo '3';
		mysqli_rollback($koneksi);
	} else {
		if (!mysqli_commit($koneksi)) {
			echo '4';
			//$result['result'] = 0;
			mysqli_rollback($koneksi);
		} else {
			echo '1';
		}
	}
} elseif ($jenis_wo == 'INSTALASI_ODP') {
	// Turn autocommit off
	mysqli_autocommit($koneksi, FALSE);
	// Insert some values
	$query1 = mysqli_query($koneksi, "UPDATE tbl_odp SET pic_ikr = '" . $_SESSION["username"] . "', working = '1', status_wo = 'Proses Pengerjaan', tgl_proses= CURRENT_TIMESTAMP(), get_lokasi_proses= '$lok_hasil' WHERE key_odp='$key_fal';");
	if ((!$query1)) {
		echo '3';
		mysqli_rollback($koneksi);
	} else {
		if (!mysqli_commit($koneksi)) {
			echo '4';
			//$result['result'] = 0;
			mysqli_rollback($koneksi);
		} else {
			echo '1';
		}
	}
} elseif ($jenis_wo == 'INSTALASI_DISTRIBUSI') {
	// Turn autocommit off
	mysqli_autocommit($koneksi, FALSE);
	// Insert some values
	$query1 = mysqli_query($koneksi, "UPDATE tbl_distribusi SET pic_ikr = '" . $_SESSION["username"] . "', working = '1', status_wo = 'Proses Pengerjaan', tgl_proses= CURRENT_TIMESTAMP(), get_lokasi_proses= '$lok_hasil' WHERE key_odp='$key_fal';");
	if ((!$query1)) {
		echo '3';
		mysqli_rollback($koneksi);
	} else {
		if (!mysqli_commit($koneksi)) {
			echo '4';
			//$result['result'] = 0;
			mysqli_rollback($koneksi);
		} else {
			echo '1';
		}
	}
} elseif ($jenis_wo == 'MAINTENANCE_BACKBONE') {
	mysqli_autocommit($koneksi, FALSE);

	// Pisahkan lokasi jadi lat dan lon
	list($latitude, $longitude) = explode(',', $lok_hasil);

	$query1 = mysqli_query($koneksi, "
	UPDATE tbl_backbone 
	SET 
		pic_ikr_backbone = '" . $_SESSION["username"] . "', 
		working = '1', 
		status_wo = 'Proses Pengerjaan', 
		tgl_proses = CURRENT_TIMESTAMP(), 
		latitude = '$latitude',
		longitude = '$longitude'
	WHERE key_backbone = '$key_fal';
");


	if (!$query1) {
		echo '3: ' . mysqli_error($koneksi); // Debug log
		mysqli_rollback($koneksi);
	} else {
		if (!mysqli_commit($koneksi)) {
			echo '4';
			mysqli_rollback($koneksi);
		} else {
			echo '1';
		}
	}
}
