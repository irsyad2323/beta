<?php
include('../controller/controller.php');
session_start();

// Set respons JSON
header('Content-Type: application/json');

// Fungsi untuk mengirim respon
function sendResponse($status, $message, $data = null)
{
    http_response_code($status); // Mengatur kode status HTTP
    $response = ['status' => $status, 'message' => $message]; // Struktur dasar respon
    if ($data !== null) {
        $response['data'] = $data; // Sertakan data jika tersedia
    }
    echo json_encode($response); // Mengonversi respon ke format JSON
    exit(); // Menghentikan eksekusi skrip lebih lanjut
}

$query = "SELECT key_fal, nama, alamat, rt, rw, kelurahan, tlp, jabatan, kd_layanan, nama_bank, no_rekening, atas_nama_rekening, created_at FROM tbl_permit ORDER BY created_at DESC";

$statement = $conn->prepare($query);
$statement->execute();
$data = $statement->fetchAll(PDO::FETCH_ASSOC);

// Memformat tanggal pada kolom created_at
foreach ($data as &$row) {
    $row['created_at'] = date('H:i:s, d M Y', strtotime($row['created_at']));
}

sendResponse(200, 'Data berhasil diambil', $data);
