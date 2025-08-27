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

// Cek apakah parameter key_fal ada dalam request
if (!isset($_POST['key_fal'])) {
    sendResponse(400, 'Parameter key_fal tidak ditemukan');
}

$key_fal = $_POST['key_fal'];

$query = "SELECT key_fal, permit_status_id, pic, status, metode_followup, jangka_waktu_komitmen, total_komitmen, deskripsi_komitmen, keterangan, dokumentasi, berita_acara, ktp, created_at FROM tbl_permit_status WHERE key_fal = :key_fal ORDER BY created_at DESC";

$statement = $conn->prepare($query);
$statement->bindParam(':key_fal', $key_fal, PDO::PARAM_STR); // Bind parameter
$statement->execute();
$data = $statement->fetchAll(PDO::FETCH_ASSOC);

// Memformat tanggal pada kolom created_at
foreach ($data as &$row) {
    $row['created_at'] = date('H:i:s, d M Y', strtotime($row['created_at']));
}

sendResponse(200, 'Data berhasil diambil', $data);
