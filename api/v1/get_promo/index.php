<?php
header('Content-Type: application/json');
date_default_timezone_set("Asia/Jakarta");

// Koneksi database
$host = '117.103.69.22';
$user = 'kocak';
$pass = 'gaming';
$db = 'billkapten';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    http_response_code(500);
    echo json_encode([
        "status" => "error",
        "message" => "Koneksi database gagal",
        "data" => null
    ]);
    exit;
}

// Query promo aktif menggunakan BETWEEN
$query = "SELECT id, nama, tanggal_selesai 
          FROM promo 
          WHERE CURRENT_DATE BETWEEN tanggal_mulai AND tanggal_selesai
          ORDER BY tanggal_mulai DESC";

$result = $conn->query($query);

// Inisialisasi array data
$data = [];

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = [
            "active" => true,
            "id" => (int) $row['id'], // Cast ke integer
            "nama" => $row['nama'],
            "expires_at" => date('H:i:s', strtotime($row['tanggal_selesai']))
        ];

    }

    echo json_encode([
        "status" => "success",
        "message" => "Data promo berhasil diambil",
        "data" => $data
    ]);
} else {
    echo json_encode([
        "status" => "success",
        "message" => "Tidak ada promo aktif saat ini",
        "data" => []
    ]);
}
?>