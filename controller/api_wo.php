
<?php
header('Content-Type: application/json');

$servername = "117.103.69.22";
$username = "kocak";
$password = "gaming";
$dbname = "billkapten";

$koneksi = new mysqli($servername, $username, $password, $dbname);
if ($koneksi->connect_error) {
    die("Connection failed: " . $koneksi->connect_error);
}

$tanggal_hari_ini = isset($_GET['tanggal']) ? $_GET['tanggal'] : date('Y-m-d');
$kota = isset($_GET['kota']) ? $_GET['kota'] : 'mlg';
$nowe = new DateTime('now', new DateTimeZone('Asia/Jakarta')); // Adjust the timezone accordingly
$dte = date_modify($nowe, "-2 hour");

$sql_kotak = $kota == 'pas' ? 
    "SELECT * FROM baris_kotak WHERE tanggal = '$tanggal_hari_ini' and area='pas' ORDER BY baris_no ASC" :
    "SELECT * FROM baris_kotak WHERE tanggal = '$tanggal_hari_ini' and area IN ('mlg', 'batu', 'mlg1') ORDER BY baris_no ASC";
    
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

$status_wo_pekerjaan = [];
$letters = range('A', 'F');
foreach ($timeslots as $baris_no => $times) {
    list($start, $end) = $times;
    $start_datetime = new DateTime("$tanggal_hari_ini $start", new DateTimeZone('Asia/Jakarta'));
    $end_datetime = new DateTime("$tanggal_hari_ini $end", new DateTimeZone('Asia/Jakarta'));
    $current_label = $letters[$baris_no - 1];
    
    $start_date_str = $start_datetime->format('Y-m-d H:i:s');
    $end_date_str = $end_datetime->format('Y-m-d H:i:s');

    $sql_status_wo = "
    SELECT status_wo, SUM(aa) AS total FROM (
        SELECT status_wo, COUNT(*) AS aa FROM tbl_distribusi WHERE kd_layanan IN ('mlg', 'batu', 'mlg1') AND tgl_sign BETWEEN '$start_date_str' AND '$end_date_str' GROUP BY status_wo
        UNION ALL
        SELECT status_wo, COUNT(*) AS aa FROM tbl_backbone WHERE kd_layanan_backbone IN ('mlg', 'batu', 'mlg1') AND tgl_sign BETWEEN '$start_date_str' AND '$end_date_str' GROUP BY status_wo
        UNION ALL
        SELECT status_wo, COUNT(*) AS aa FROM tbl_odp WHERE kd_layanan IN ('mlg', 'batu', 'mlg1') AND tgl_sign BETWEEN '$start_date_str' AND '$end_date_str' GROUP BY status_wo
        UNION ALL
        SELECT status_wo, COUNT(*) AS aa FROM tbl_fal WHERE kd_layanan IN ('mlg', 'batu', 'mlg1') AND tgl_fal_datetime BETWEEN '$start_date_str' AND '$end_date_str' GROUP BY status_wo
        UNION ALL
        SELECT status_wo, COUNT(*) AS aa FROM tbl_maintenance WHERE kd_layanan IN ('mlg', 'batu', 'mlg1') AND tgl_date_time BETWEEN '$start_date_str' AND '$end_date_str' GROUP BY status_wo
        UNION ALL
        SELECT status_wo, COUNT(*) AS aa FROM tbl_maintenance_odp WHERE kd_layanan IN ('mlg', 'batu', 'mlg1') AND tgl_sign BETWEEN '$start_date_str' AND '$end_date_str' GROUP BY status_wo
        UNION ALL
        SELECT status_wo, COUNT(*) AS aa FROM tbl_fal_correctiv WHERE kd_layanan IN ('mlg', 'batu', 'mlg1') AND tgl_sign BETWEEN '$start_date_str' AND '$end_date_str' GROUP BY status_wo
    ) AS subquery
    GROUP BY status_wo
    ";

    $result_status_wo = $koneksi->query($sql_status_wo);
    if (!$result_status_wo) {
        die("Error executing the query: " . $koneksi->error);
    }

    $status_wo_pekerjaan[$baris_no] = [
        'label' => "Slot $start - $end", 
        'hari' => "$tanggal_hari_ini $start",
        'start' => "$start",
        'end' => "$end", 
        'biru' => 0, 
        'kuning' => 0, 
        'merah' => 0, 
        'hijau' => $baris_kotak[$baris_no]['jumlah_hijau'] ?? 0
    ];
    if ($result_status_wo->num_rows > 0) {
        while ($row = $result_status_wo->fetch_assoc()) {
            if ($row['status_wo'] == 'Belum Terpasang') {
                $status_wo_pekerjaan[$baris_no]['kuning'] += $row['total'];  
            } elseif ($row['status_wo'] == 'Sudah Terpasang') {
                $status_wo_pekerjaan[$baris_no]['biru'] += $row['total'];  
            } elseif ($row['status_wo'] == 'Proses Pengerjaan') {
                $status_wo_pekerjaan[$baris_no]['merah'] += $row['total'];  
            }
        }
    }
}

echo json_encode($status_wo_pekerjaan);
$koneksi->close();
?>
