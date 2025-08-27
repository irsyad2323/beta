<?php
// Koneksi
session_start();

// Cek jika session tidak ada (expire atau belum login)
if (!isset($_SESSION["username"])) {
    // Kalau session habis, redirect ke halaman logout.php atau index.php
    echo json_encode([
        'status' => 'error',
        'message' => 'Session expired, please login again.'
    ]);
    exit;
}

$acces_user_log = $_SESSION["username"];
$unit = $_SESSION["level_kantor"];

include('controller_mysqli.php');

file_put_contents("debug_log.txt", "POST:\n" . print_r($_POST, true));

// Terima POST
$data_json = $_POST['data_json'] ?? [];
$nominal_konsumsi = $_POST['nominal_konsumsi'] ?? 10000;
$nominal_bbm = $_POST['nominal_bbm'] ?? 0;
$detail_pekerjaan = $_POST['detail_pekerjaan'] ?? '';
$tanggal_pekerjaan = $_POST['tanggal_pekerjaan'] ?? date('Y-m-d');

//echo ($data_json); die();

$data_json = $_POST['data_json'] ?? [];

if (is_string($data_json)) {
    $data_json = json_decode($data_json, true);
}

if (!is_array($data_json) || empty($data_json)) {
    echo json_encode([
        "status" => "error",
        "message" => "data_json kosong atau bukan array"
    ]);
    exit;
}

// Hitung total BBM dalam 2 hari terakhir
$query_bbm = mysqli_query($koneksi, "
    SELECT SUM(nominal_bbm) as total_bbm 
    FROM tbl_reimburse 
    WHERE pic_ikr = '$acces_user_log'
    AND tanggal_pekerjaan >= DATE_SUB('$tanggal_pekerjaan', INTERVAL 2 DAY)
");

$boleh_isi_bbm = true;

if ($query_bbm) {
    $row = mysqli_fetch_assoc($query_bbm);
    $total_bbm = (int) ($row['total_bbm'] ?? 0);

    if ($total_bbm >= 15000) {
        $boleh_isi_bbm = false;
        $nominal_bbm = 0;
    }
}

// Mulai transaksi
mysqli_autocommit($koneksi, FALSE);


$id_ref_list = [];
$jenis_wo_list = [];

// Loop untuk ngumpulin id_ref & jenis_wo aja
foreach ($data_json as $item) {
    $id_ref = mysqli_real_escape_string($koneksi, $item['id'] ?? '');
    $jenis_wo = mysqli_real_escape_string($koneksi, $item['jenis_wo'] ?? '');
    $pic_ikr = mysqli_real_escape_string($koneksi, $item['pic_ikr'] ?? $acces_user_log);
	
	if ($jenis_wo == 'INSTALASI') {
		$query = "UPDATE tbl_fal SET log_reimburse = 'y' WHERE key_fal = '$id_ref'";
	} elseif ($jenis_wo == 'MAINTENANCE') {
		$query = "UPDATE tbl_maintenance SET log_reimburse = 'y' WHERE key_fal = '$id_ref'";
	} elseif ($jenis_wo == 'Maintenance ODP') {
		$query = "UPDATE tbl_maintenance_odp SET log_reimburse = 'y' WHERE key_fal = '$id_ref'";
	} elseif ($jenis_wo == 'INSTALASI_ODP') {
		$query = "UPDATE tbl_odp SET log_reimburse = 'y' WHERE key_odp = '$id_ref'";
	} elseif ($jenis_wo == 'INSTALASI_DISTRIBUSI') {
		$query = "UPDATE tbl_distribusi SET log_reimburse = 'y' WHERE key_odp = '$id_ref'";
	} elseif ($jenis_wo == 'MAINTENANCE_BACKBONE') {
		$query = "UPDATE tbl_backbone SET log_reimburse = 'y' WHERE key_backbone = '$id_ref'";
	}
	
	if (isset($query)) {
    mysqli_query($koneksi, $query);
}

    $id_ref_list[] = $id_ref;
    $jenis_wo_list[] = $jenis_wo;
}

// Cek total BBM dalam 2 hari terakhir SEBELUM input
$cek_bbm = mysqli_query($koneksi, "
    SELECT SUM(nominal_bbm) as total_bbm 
    FROM tbl_reimburse 
    WHERE pic_ikr = '$acces_user_log'
    AND tanggal_pekerjaan >= DATE_SUB('$tanggal_pekerjaan', INTERVAL 1 DAY)
");

if ($cek_bbm) {
    $row_bbm = mysqli_fetch_assoc($cek_bbm);
    $total_bbm_sekarang = (int)($row_bbm['total_bbm'] ?? 0);

    if ($total_bbm_sekarang >= 15000) {
        $nominal_bbm_saat_ini = 0;
    } else {
        $nominal_bbm_saat_ini = (int)$nominal_bbm;
    }
}

// Lakukan 1x insert saja
$query_insert = mysqli_query($koneksi, "
    INSERT INTO tbl_reimburse (
        id_ref, jenis_wo, pic_ikr, kd_layanan,
        nominal_konsumsi, nominal_bbm, detail_pekerjaan, tanggal_pekerjaan
    ) VALUES (
        '" . mysqli_real_escape_string($koneksi, json_encode($id_ref_list)) . "',
        '" . mysqli_real_escape_string($koneksi, json_encode($jenis_wo_list)) . "',
        '$unit',
        '$pic_ikr',
        '$nominal_konsumsi', '$nominal_bbm_saat_ini',
        '$detail_pekerjaan', '$tanggal_pekerjaan'
    )
");

if (!$query_insert) {
    mysqli_rollback($koneksi);
    echo json_encode([
        'status' => 'error',
        'message' => 'Gagal insert: ' . mysqli_error($koneksi)
    ]);
    exit;
}



// Commit
if (!mysqli_commit($koneksi)) {
    mysqli_rollback($koneksi);
    echo json_encode(['status' => 'error', 'message' => 'Gagal commit']);
    exit;
}

// Sukses
echo json_encode([
    'status' => 'success',
    'message' => 'Data berhasil disimpan',
    'bbm_diizinkan' => $boleh_isi_bbm ? 'Ya' : 'Tidak (otomatis 0)'
]);
?>
