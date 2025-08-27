<?php
session_start();
include('../controller/controller.php');

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

// Ambil parameter dari request
$permitStatusId = isset($_POST['permit_status_id']) ? $_POST['permit_status_id'] : null;

// Validasi permit_status_id 
if ($permitStatusId === null) {
    sendResponse(400, 'ID Permit Status tidak valid');
}

// Ambil data dari tabel komitmen_pembayaran
$query = "SELECT id, jadwal_bayar, nominal, actual_bayar, actual_nominal, status, kwitansi FROM komitmen_pembayaran WHERE permit_status_id = :permit_status_id";

$statement = $conn->prepare($query);
$statement->bindParam(':permit_status_id', $permitStatusId, PDO::PARAM_INT);
$statement->execute();
$data = $statement->fetchAll(PDO::FETCH_ASSOC);

sendResponse(200, 'Data komitmen berhasil diambil', $data);
