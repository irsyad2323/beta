<?php
if ($level_user == 'ikr') {
	/* $servername = "localhost";
$username = "root";
$password = "";
$dbname = "ikilo"; */

	include('controller/controller_mysqli.php');
	if ($koneksi->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$tanggal_hari_ini = isset($_GET['tanggal']) ? $_GET['tanggal'] : date('Y-m-d');
	$now = new DateTime('now', new DateTimeZone('Asia/Jakarta')); // Adjust the timezone accordingly
	$dt = date_modify($now, "-3 hour");

	$sql_kotak = "SELECT * FROM baris_kotak WHERE tanggal = '$tanggal_hari_ini' ORDER BY baris_no ASC";
	$result_kotak = $koneksi->query($sql_kotak);

	$baris_kotak = [];
	if ($result_kotak->num_rows > 0) {
		while ($row = $result_kotak->fetch_assoc()) {
			$baris_kotak[$row['baris_no']] = $row;
		}
	}

	$timeslots = [
		'1' => ['06:00:00', '07:59:59'],
		'2' => ['08:00:00', '09:59:59'],
		'2' => ['08:00:00', '09:59:59'],
		'3' => ['10:00:00', '12:59:59'],
		'4' => ['13:00:00', '14:59:59'],
		'5' => ['15:00:00', '17:59:59'],
		'6' => ['18:00:00', '19:59:59'],
	];

	//$status_wo_pekerjaan = [];
	$letters = range('A', 'F');
	foreach ($timeslots as $baris_no => $times) {
		list($start, $end) = $times;
		$start_datetime = new DateTime("$tanggal_hari_ini $start", new DateTimeZone('Asia/Jakarta'));
		$end_datetime = new DateTime("$tanggal_hari_ini $end", new DateTimeZone('Asia/Jakarta'));
		$current_label = $letters[$baris_no - 1];

		// Format DateTime objects to string for SQL query
		$start_date_str = $start_datetime->format('Y-m-d H:i:s');
		$end_date_str = $end_datetime->format('Y-m-d H:i:s');

		$is_current_slot = $now >= $start_datetime && $now <= $end_datetime;
		$is_current_slot_ts = $now <= $start_datetime;

		if ($kota == 'mlg' or $kota == 'batu' or $kota == 'mlg1') {
			$sql_status_wo = "SELECT status_wo, SUM(aa) AS total
FROM (
    SELECT status_wo, COUNT(*) AS aa
    FROM tbl_distribusi
    WHERE kd_layanan IN ('mlg', 'batu', 'mlg1') 
      AND tgl_sign BETWEEN '$start_date_str' AND '$end_date_str'
    GROUP BY status_wo

    UNION ALL

    SELECT status_wo, COUNT(*) AS aa
    FROM tbl_backbone
    WHERE kd_layanan_backbone IN ('mlg', 'batu', 'mlg1') 
      AND tgl_sign BETWEEN '$start_date_str' AND '$end_date_str'
    GROUP BY status_wo

    UNION ALL

    SELECT status_wo, COUNT(*) AS aa
    FROM tbl_odp
    WHERE kd_layanan IN ('mlg', 'batu', 'mlg1') 
      AND tgl_sign BETWEEN '$start_date_str' AND '$end_date_str'
    GROUP BY status_wo

    UNION ALL

    SELECT status_wo, COUNT(*) AS aa
    FROM tbl_fal
    WHERE kd_layanan IN ('mlg', 'batu', 'mlg1') 
      AND tgl_fal_datetime BETWEEN '$start_date_str' AND '$end_date_str'
    GROUP BY status_wo

    UNION ALL

    SELECT status_wo, COUNT(*) AS aa
    FROM tbl_maintenance
    WHERE kd_layanan IN ('mlg', 'batu', 'mlg1') 
      AND tgl_date_time BETWEEN '$start_date_str' AND '$end_date_str'
    GROUP BY status_wo

    UNION ALL

    SELECT status_wo, COUNT(*) AS aa
    FROM tbl_maintenance_odp
    WHERE kd_layanan IN ('mlg', 'batu', 'mlg1') 
      AND tgl_sign BETWEEN '$start_date_str' AND '$end_date_str'
    GROUP BY status_wo

    UNION ALL

    SELECT status_wo, COUNT(*) AS aa
    FROM tbl_fal_correctiv
    WHERE kd_layanan IN ('mlg', 'batu', 'mlg1') 
      AND tgl_sign BETWEEN '$start_date_str' AND '$end_date_str'
    GROUP BY status_wo
) AS subquery
GROUP BY status_wo;
					";
		} elseif ($kota == 'pas') {
			$sql_status_wo = "SELECT status_wo, SUM(aa) AS total FROM (
						SELECT status_wo, COUNT(*) AS aa FROM tbl_distribusi WHERE kd_layanan IN ('pas','pas1') AND tgl_sign BETWEEN '$start_date_str' AND '$end_date_str' GROUP BY status_wo
						UNION ALL
						SELECT status_wo, COUNT(*) AS aa FROM tbl_backbone WHERE kd_layanan_backbone IN ('pas','pas1') AND tgl_sign BETWEEN '$start_date_str' AND '$end_date_str' GROUP BY status_wo
						UNION ALL
						SELECT status_wo, COUNT(*) AS aa FROM tbl_odp WHERE kd_layanan IN ('pas','pas1') AND tgl_sign BETWEEN '$start_date_str' AND '$end_date_str' GROUP BY status_wo
						UNION ALL
						SELECT status_wo, COUNT(*) AS aa FROM tbl_fal WHERE kd_layanan IN ('pas','pas1') AND tgl_fal_datetime BETWEEN '$start_date_str' AND '$end_date_str' GROUP BY status_wo
						UNION ALL
						SELECT status_wo, COUNT(*) AS aa FROM tbl_maintenance WHERE kd_layanan IN ('pas','pas1') AND tgl_date_time BETWEEN '$start_date_str' AND '$end_date_str' GROUP BY status_wo
						UNION ALL
						SELECT status_wo, COUNT(*) AS aa FROM tbl_maintenance_odp WHERE kd_layanan IN ('pas','pas1') AND tgl_sign BETWEEN '$start_date_str' AND '$end_date_str' GROUP BY status_wo
						UNION ALL
						SELECT status_wo, COUNT(*) AS aa FROM tbl_fal_correctiv WHERE kd_layanan IN ('pas','pas1') AND tgl_sign BETWEEN '$start_date_str' AND '$end_date_str' GROUP BY status_wo
					) AS subquery
					GROUP BY status_wo
					";
		}
		$result_status_wo = $koneksi->query($sql_status_wo);
		if (!$result_status_wo) {
			die("Error executing the query: " . $koneksi->error);
		}

		$status_wo_pekerjaan[$baris_no] = ['label' => "Slot $start - $end", 'hari' => "$tanggal_hari_ini $start", 'start' => "$start", 'end' => "$end", 'biru' => 0, 'kuning' => 0, 'merah' => 0, 'hijau' => $baris_kotak[$baris_no]['jumlah_hijau'] ?? 0];
		if ($result_status_wo->num_rows > 0) {
			while ($row = $result_status_wo->fetch_assoc()) {
				if ($row['status_wo'] == 'Belum Terpasang') {
					$status_wo_pekerjaan[$baris_no]['kuning'] += $row['total'];  // Pastikan menggunakan operator += untuk menambahkan
				} elseif ($row['status_wo'] == 'Sudah Terpasang') {
					$status_wo_pekerjaan[$baris_no]['biru'] += $row['total'];  // Sama di sini
				} elseif ($row['status_wo'] == 'Proses Pengerjaan') {
					$status_wo_pekerjaan[$baris_no]['merah'] += $row['total'];  // Sama di sini
				}
			}
		}

		echo "<div class='baris'>";
		echo "<div class='waktu'>Slot " . $start_datetime->format('H:i:s') . " - " . $end_datetime->format('H:i:s') . "</div>";
		echo "<div class='kotak-container'>";

		for ($i = 1; $i <= 10; $i++) {
			$box_label = $current_label . $i;
			$box_color = 'abu'; // Default color
			if ($i <= $status_wo_pekerjaan[$baris_no]['merah']) {
				$box_color = 'merah';
			} elseif ($i <= $status_wo_pekerjaan[$baris_no]['merah'] + $status_wo_pekerjaan[$baris_no]['biru']) {
				$box_color = 'biru';
			} elseif ($i <= $status_wo_pekerjaan[$baris_no]['merah'] + $status_wo_pekerjaan[$baris_no]['biru'] + $status_wo_pekerjaan[$baris_no]['kuning']) {
				$box_color = 'kuning';
			}

			$click_action = ($is_current_slot && $box_color == 'kuning') ? "" : "tes='{$status_wo_pekerjaan[$baris_no]['hari']}'
				start2='{$status_wo_pekerjaan[$baris_no]['start']}'
				end='{$status_wo_pekerjaan[$baris_no]['end']}')'";
			if ($box_color == 'kuning') {
				if ($dt > $start_datetime) {
					$class = "kotak $box_color inactive";
				} else {
					$class = "kotak $box_color addts";
				}
			} elseif ($box_color == 'merah') {
				$class = "kotak $box_color";
			} elseif ($box_color == 'biru') {
				$class = "kotak $box_color";
			} elseif ($box_color == 'abu') {
				$class = "kotak $box_color";
			}
			echo "<div class='btn btn-info btn-sm mr-2 $class' $click_action><i class='fas fa-user'></i>$box_label</div>";
		}
		echo "</div></div>";
	}

	$koneksi->close();
} else if ($level_user == 'kapten') {

	echo "<div id='malang' class='tabcontent'>";

	include('controller/controller_mysqli.php');
	if ($koneksi->connect_error) {
		die("Connection failed: " . $koneksi->connect_error);
	}

	$tanggal_hari_ini = isset($_GET['tanggal']) ? $_GET['tanggal'] : date('Y-m-d');
	$nowe = new DateTime('now', new DateTimeZone('Asia/Jakarta')); // Adjust the timezone accordingly
	$dte = date_modify($nowe, "-2 hour");
	$now = new DateTime('now', new DateTimeZone('Asia/Jakarta')); // Adjust the timezone accordingly
	$dt = date_modify($now, "+2 hour");
	$sql_kotak = "SELECT * FROM baris_kotak WHERE tanggal = '$tanggal_hari_ini' and area='mlg' ORDER BY baris_no ASC";
	$result_kotak = $koneksi->query($sql_kotak);
	$baris_kotak = [];
	if ($result_kotak->num_rows > 0) {
		while ($row = $result_kotak->fetch_assoc()) {
			$baris_kotak[$row['baris_no']] = $row;
		}
	}

	$timeslots = [
		'1' => ['06:00:00', '07:59:59'],
		'2' => ['08:00:00', '09:59:59'],
		'3' => ['10:00:00', '12:59:59'],
		'4' => ['13:00:00', '14:59:59'],
		'5' => ['15:00:00', '17:59:59'],
		'6' => ['18:00:00', '19:59:59'],
	];

	//$status_wo_pekerjaan = [];
	$letters = range('A', 'F');
	foreach ($timeslots as $baris_no => $times) {
		list($start, $end) = $times;
		$start_datetime = new DateTime("$tanggal_hari_ini $start", new DateTimeZone('Asia/Jakarta'));
		//$date_start_datetime = date_modify($start_datetime, "-1 hour");
		$end_datetime = new DateTime("$tanggal_hari_ini $end", new DateTimeZone('Asia/Jakarta'));
		$current_label = $letters[$baris_no - 1];

		// Format DateTime objects to string for SQL query
		$start_date_str = $start_datetime->format('Y-m-d H:i:s');
		$end_date_str = $end_datetime->format('Y-m-d H:i:s');

		$sql_status_wo = "SELECT status_wo, SUM(aa) AS total
FROM (
    SELECT status_wo, COUNT(*) AS aa
    FROM tbl_distribusi
    WHERE kd_layanan IN ('mlg', 'batu', 'mlg1') 
      AND tgl_sign BETWEEN '$start_date_str' AND '$end_date_str'
    GROUP BY status_wo

    UNION ALL

    SELECT status_wo, COUNT(*) AS aa
    FROM tbl_backbone
    WHERE kd_layanan_backbone IN ('mlg', 'batu', 'mlg1') 
      AND tgl_sign BETWEEN '$start_date_str' AND '$end_date_str'
    GROUP BY status_wo

    UNION ALL

    SELECT status_wo, COUNT(*) AS aa
    FROM tbl_odp
    WHERE kd_layanan IN ('mlg', 'batu', 'mlg1') 
      AND tgl_sign BETWEEN '$start_date_str' AND '$end_date_str'
    GROUP BY status_wo

    UNION ALL

    SELECT status_wo, COUNT(*) AS aa
    FROM tbl_fal
    WHERE kd_layanan IN ('mlg', 'batu', 'mlg1') 
      AND tgl_fal_datetime BETWEEN '$start_date_str' AND '$end_date_str'
    GROUP BY status_wo

    UNION ALL

    SELECT status_wo, COUNT(*) AS aa
    FROM tbl_maintenance
    WHERE kd_layanan IN ('mlg', 'batu', 'mlg1') 
      AND tgl_date_time BETWEEN '$start_date_str' AND '$end_date_str'
    GROUP BY status_wo

    UNION ALL

    SELECT status_wo, COUNT(*) AS aa
    FROM tbl_maintenance_odp
    WHERE kd_layanan IN ('mlg', 'batu', 'mlg1') 
      AND tgl_sign BETWEEN '$start_date_str' AND '$end_date_str'
    GROUP BY status_wo

    UNION ALL

    SELECT status_wo, COUNT(*) AS aa
    FROM tbl_fal_correctiv
    WHERE kd_layanan IN ('mlg', 'batu', 'mlg1') 
      AND tgl_sign BETWEEN '$start_date_str' AND '$end_date_str'
    GROUP BY status_wo
) AS subquery
GROUP BY status_wo;
					";

		$result_status_wo = $koneksi->query($sql_status_wo);
		if (!$result_status_wo) {
			die("Error executing the query: " . $koneksi->error);
		}

		$status_wo_pekerjaan[$baris_no] = ['label' => "Slot $start - $end", 'hari' => "$tanggal_hari_ini $start", 'start' => "$start", 'end' => "$end", 'biru' => 0, 'kuning' => 0, 'merah' => 0, 'hijau' => $baris_kotak[$baris_no]['jumlah_hijau'] ?? 0];
		if ($result_status_wo->num_rows > 0) {
			while ($row = $result_status_wo->fetch_assoc()) {
				if ($row['status_wo'] == 'Belum Terpasang') {
					$status_wo_pekerjaan[$baris_no]['kuning'] += $row['total'];  // Pastikan menggunakan operator += untuk menambahkan
				} elseif ($row['status_wo'] == 'Sudah Terpasang') {
					$status_wo_pekerjaan[$baris_no]['biru'] += $row['total'];  // Sama di sini
				} elseif ($row['status_wo'] == 'Proses Pengerjaan') {
					$status_wo_pekerjaan[$baris_no]['merah'] += $row['total'];  // Sama di sini
				} elseif ($row['status_wo'] == 'Pending') {
					$status_wo_pekerjaan[$baris_no]['hijau'] += $row['total'];  // Sama di sini
				}
				$status_wo_pekerjaan[$baris_no]['hijau'] = max(0, $status_wo_pekerjaan[$baris_no]['hijau'] - $row['total']);
			}
		}


		echo "<div class='baris'>";
		echo "<div class='waktu'>Slot " . $start_datetime->format('H:i:s') . " - " . $end_datetime->format('H:i:s') . "</div>";
		echo "<div class='kotak-container'>";
		//echo $now;
		for ($i = 1; $i <= 10; $i++) {
			$box_label = $current_label . $i;
			$box_color = 'abu'; // Default color
			if ($i <= $status_wo_pekerjaan[$baris_no]['kuning']) {
				$box_color = 'kuning';
			} elseif ($i <= $status_wo_pekerjaan[$baris_no]['merah'] + $status_wo_pekerjaan[$baris_no]['kuning']) {
				$box_color = 'merah';
			} elseif ($i <= $status_wo_pekerjaan[$baris_no]['kuning'] + $status_wo_pekerjaan[$baris_no]['merah'] + $status_wo_pekerjaan[$baris_no]['biru']) {
				$box_color = 'biru';
			} elseif ($i <= $status_wo_pekerjaan[$baris_no]['kuning'] + $status_wo_pekerjaan[$baris_no]['merah'] + $status_wo_pekerjaan[$baris_no]['hijau'] + $status_wo_pekerjaan[$baris_no]['biru']) {
				$box_color = 'hijau';
			}

			$click_action = ($is_current_slot && $box_color == 'hijau') ? "" : "tanggal='{$status_wo_pekerjaan[$baris_no]['hari']}'
				start='{$status_wo_pekerjaan[$baris_no]['start']}'
				end='{$status_wo_pekerjaan[$baris_no]['end']}')'";

			if ($leveladmin == 'cs') {
				if ($box_color == 'hijau') {
					//$date_start_datetime = date_modify($start_datetime, "-1 hour");
					if ($start_datetime < $dt) {
						$class = "kotak $box_color inactive";
					} else {
						$class = "kotak $box_color add";
					}
				} elseif ($box_color == 'kuning') {
					$class = "kotak $box_color list_sign";
				} elseif ($box_color == 'merah') {
					$class = "kotak $box_color list_pros";
				} elseif ($box_color == 'biru') {
					$class = "kotak $box_color list_solved";
				} elseif ($box_color == 'abu') {
					$class = "kotak $box_color list";
				}
			} elseif ($leveladmin == 'admin_ts') {
				if ($box_color == 'hijau') {
					if ($start_datetime < $dte) {
						$class = "kotak $box_color add";
					} else {
						$class = "kotak $box_color add";
					}
				} elseif ($box_color == 'kuning') {
					$class = "kotak $box_color list_sign";
				} elseif ($box_color == 'merah') {
					$class = "kotak $box_color list_pros";
				} elseif ($box_color == 'biru') {
					$class = "kotak $box_color list_solved";
				} elseif ($box_color == 'abu') {
					$class = "kotak $box_color list";
				}
			}


			echo "<div class='btn btn-info btn-sm mr-2 $class' $click_action><i class='fas fa-user'></i>$box_label</div>";
		}
		echo "</div></div>";
	}
	echo "</div>";

	echo "<div id='Pasuruan' class='tabcontent'>";

	include('controller/controller_mysqli.php');
	if ($koneksi->connect_error) {
		die("Connection failed: " . $koneksi->connect_error);
	}

	$tanggal_hari_ini = isset($_GET['tanggal']) ? $_GET['tanggal'] : date('Y-m-d');
	$nowe = new DateTime('now', new DateTimeZone('Asia/Jakarta')); // Adjust the timezone accordingly
	$dte = date_modify($nowe, "-2 hour");
	$now = new DateTime('now', new DateTimeZone('Asia/Jakarta')); // Adjust the timezone accordingly
	$dt = date_modify($now, "+2 hour");

	/* if($kota == 'mlg' or $kota == 'batu' or $kota == 'mlg1'){
$sql_kotak = "SELECT * FROM baris_kotak WHERE tanggal = '$tanggal_hari_ini' and area='mlg' ORDER BY baris_no ASC";
$result_kotak = $koneksi->query($sql_kotak);
}elseif($kota == 'pas'){ */
	$sql_kotak = "SELECT * FROM baris_kotak WHERE tanggal = '$tanggal_hari_ini' and area='pas' ORDER BY baris_no ASC";
	$result_kotak = $koneksi->query($sql_kotak);
	/* } */
	$baris_kotak = [];
	if ($result_kotak->num_rows > 0) {
		while ($row = $result_kotak->fetch_assoc()) {
			$baris_kotak[$row['baris_no']] = $row;
		}
	}

	$timeslots = [
		'1' => ['06:00:00', '07:59:59'],
		'2' => ['08:00:00', '09:59:59'],
		'3' => ['10:00:00', '12:59:59'],
		'4' => ['13:00:00', '14:59:59'],
		'5' => ['15:00:00', '17:59:59'],
		'6' => ['18:00:00', '19:59:59'],
	];

	//$status_wo_pekerjaan = [];
	$letters = range('A', 'F');
	foreach ($timeslots as $baris_no => $times) {
		list($start, $end) = $times;
		$start_datetime = new DateTime("$tanggal_hari_ini $start", new DateTimeZone('Asia/Jakarta'));
		$end_datetime = new DateTime("$tanggal_hari_ini $end", new DateTimeZone('Asia/Jakarta'));
		$current_label = $letters[$baris_no - 1];

		// Format DateTime objects to string for SQL query
		$start_date_str = $start_datetime->format('Y-m-d H:i:s');
		$end_date_str = $end_datetime->format('Y-m-d H:i:s');

		//$is_current_slot = $start_datetime <= $now;

		$sql_status_wo = "SELECT status_wo, SUM(aa) AS total FROM (
						SELECT status_wo, COUNT(*) AS aa FROM tbl_distribusi WHERE kd_layanan IN ('pas','pas1') AND tgl_sign BETWEEN '$start_date_str' AND '$end_date_str' GROUP BY status_wo
						UNION ALL
						SELECT status_wo, COUNT(*) AS aa FROM tbl_backbone WHERE kd_layanan_backbone IN ('pas','pas1') AND tgl_sign BETWEEN '$start_date_str' AND '$end_date_str' GROUP BY status_wo
						UNION ALL
						SELECT status_wo, COUNT(*) AS aa FROM tbl_odp WHERE kd_layanan IN ('pas','pas1') AND tgl_sign BETWEEN '$start_date_str' AND '$end_date_str' GROUP BY status_wo
						UNION ALL
						SELECT status_wo, COUNT(*) AS aa FROM tbl_fal WHERE kd_layanan IN ('pas','pas1') AND tgl_fal_datetime BETWEEN '$start_date_str' AND '$end_date_str' GROUP BY status_wo
						UNION ALL
						SELECT status_wo, COUNT(*) AS aa FROM tbl_maintenance WHERE kd_layanan IN ('pas','pas1') AND tgl_date_time BETWEEN '$start_date_str' AND '$end_date_str' GROUP BY status_wo
						UNION ALL
						SELECT status_wo, COUNT(*) AS aa FROM tbl_maintenance_odp WHERE kd_layanan IN ('pas','pas1') AND tgl_sign BETWEEN '$start_date_str' AND '$end_date_str' GROUP BY status_wo
						UNION ALL
						SELECT status_wo, COUNT(*) AS aa FROM tbl_fal_correctiv WHERE kd_layanan IN ('pas','pas1') AND tgl_sign BETWEEN '$start_date_str' AND '$end_date_str' GROUP BY status_wo
					) AS subquery
					GROUP BY status_wo
					";

		$result_status_wo = $koneksi->query($sql_status_wo);
		if (!$result_status_wo) {
			die("Error executing the query: " . $koneksi->error);
		}

		$status_wo_pekerjaan[$baris_no] = ['label' => "Slot $start - $end", 'hari' => "$tanggal_hari_ini $start", 'start' => "$start", 'end' => "$end", 'biru' => 0, 'kuning' => 0, 'merah' => 0, 'hijau' => $baris_kotak[$baris_no]['jumlah_hijau'] ?? 0];
		if ($result_status_wo->num_rows > 0) {
			while ($row = $result_status_wo->fetch_assoc()) {
				if ($row['status_wo'] == 'Belum Terpasang') {
					$status_wo_pekerjaan[$baris_no]['kuning'] += $row['total'];  // Pastikan menggunakan operator += untuk menambahkan
				} elseif ($row['status_wo'] == 'Sudah Terpasang') {
					$status_wo_pekerjaan[$baris_no]['biru'] += $row['total'];  // Sama di sini
				} elseif ($row['status_wo'] == 'Proses Pengerjaan') {
					$status_wo_pekerjaan[$baris_no]['merah'] += $row['total'];  // Sama di sini
				}
				$status_wo_pekerjaan[$baris_no]['hijau'] = max(0, $status_wo_pekerjaan[$baris_no]['hijau'] - $row['total']);
			}
		}


		echo "<div class='baris'>";
		echo "<div class='waktu'>Slot " . $start_datetime->format('H:i:s') . " - " . $end_datetime->format('H:i:s') . "</div>";
		echo "<div class='kotak-container'>";
		//echo $now;
		for ($i = 1; $i <= 10; $i++) {
			$box_label = $current_label . $i;
			$box_color = 'abu'; // Default color
			if ($i <= $status_wo_pekerjaan[$baris_no]['kuning']) {
				$box_color = 'kuning';
			} elseif ($i <= $status_wo_pekerjaan[$baris_no]['merah'] + $status_wo_pekerjaan[$baris_no]['kuning']) {
				$box_color = 'merah';
			} elseif ($i <= $status_wo_pekerjaan[$baris_no]['kuning'] + $status_wo_pekerjaan[$baris_no]['merah'] + $status_wo_pekerjaan[$baris_no]['biru']) {
				$box_color = 'biru';
			} elseif ($i <= $status_wo_pekerjaan[$baris_no]['kuning'] + $status_wo_pekerjaan[$baris_no]['merah'] + $status_wo_pekerjaan[$baris_no]['hijau'] + $status_wo_pekerjaan[$baris_no]['biru']) {
				$box_color = 'hijau';
			}

			$click_action = ($is_current_slot && $box_color == 'hijau') ? "" : "tanggal='{$status_wo_pekerjaan[$baris_no]['hari']}'
				start='{$status_wo_pekerjaan[$baris_no]['start']}'
				end='{$status_wo_pekerjaan[$baris_no]['end']}')'";

			if ($leveladmin == 'cs') {
				if ($box_color == 'hijau') {
					//$date_start_datetime = date_modify($start_datetime, "-1 hour");
					if ($start_datetime < $dt) {
						$class = "kotak $box_color inactive";
					} else {
						$class = "kotak $box_color add";
					}
				} elseif ($box_color == 'kuning') {
					$class = "kotak $box_color list_signp";
				} elseif ($box_color == 'merah') {
					$class = "kotak $box_color list_pros_pas";
				} elseif ($box_color == 'biru') {
					$class = "kotak $box_color list_solved";
				} elseif ($box_color == 'abu') {
					$class = "kotak $box_color list";
				}
			} elseif ($leveladmin == 'admin_ts') {
				if ($box_color == 'hijau') {
					if ($start_datetime < $dte) {
						$class = "kotak $box_color add";
					} else {
						$class = "kotak $box_color add";
					}
				} elseif ($box_color == 'kuning') {
					$class = "kotak $box_color list_signp";
				} elseif ($box_color == 'merah') {
					$class = "kotak $box_color list_pros_pas";
				} elseif ($box_color == 'biru') {
					$class = "kotak $box_color list_solved";
				} elseif ($box_color == 'abu') {
					$class = "kotak $box_color list";
				}
			}


			echo "<div class='btn btn-info btn-sm mr-2 $class' $click_action><i class='fas fa-user' ></i>$box_label</div>";
		}
		echo "</div></div>";
	}
	echo "</div>";
	$koneksi->close();
}
