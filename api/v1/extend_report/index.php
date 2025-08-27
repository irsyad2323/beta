<?php
header('Content-Type: application/json');
include "../koneksi.php";

// Ambil parameter bulan & tahun dari GET
$bulan = isset($_GET['bulan']) ? intval($_GET['bulan']) : date("m");
$tahun = isset($_GET['tahun']) ? intval($_GET['tahun']) : date("Y");

$sql = "SELECT 
            DATE(tgl_request) AS tanggal, 
            CASE mitra_depart
                WHEN 'sps' THEN 'Transfer'
                WHEN 'mlg' THEN 'Naratel'
                WHEN 'pas' THEN 'SBM'
                WHEN 'pas1' THEN 'Balakosa'
                WHEN 'batu' THEN 'Jalibar'
                WHEN 'mlg1' THEN 'Jalantra'
                ELSE mitra_depart
            END AS unit,
            COUNT(kode_user) AS total_request
        FROM request_extend
        WHERE MONTH(tgl_request) = $bulan
          AND YEAR(tgl_request) = $tahun
        GROUP BY DATE(tgl_request), unit
        ORDER BY tanggal ASC, unit ASC";

$result = mysqli_query($koneksi, $sql);

$data = [];
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
}

echo json_encode([
    "status" => "success",
    "bulan" => $bulan,
    "tahun" => $tahun,
    "data" => $data
]);
