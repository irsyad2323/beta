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

// Ambil nilai `created_by` dari request POST
$created_by = isset($_POST['created_by']) ? $_POST['created_by'] : '';

// Query dasar tanpa kondisi WHERE
$query = "SELECT key_fal, nama_instansi, alamat_instansi, kelurahan, contact_person, telepon, jabatan, kd_layanan, created_at FROM business_solutions";

// Tambahkan kondisi WHERE jika `created_by` tidak kosong
if (!empty($created_by)) {
    $query .= " WHERE created_by = :created_by";
}

$query .= " ORDER BY created_at DESC";

$statement = $conn->prepare($query);

// Bind parameter `created_by` jika tidak kosong
if (!empty($created_by)) {
    $statement->bindParam(':created_by', $created_by);
}

$statement->execute();
$data = $statement->fetchAll(PDO::FETCH_ASSOC);

// Memformat tanggal pada kolom created_at
foreach ($data as &$row) {
    $row['created_at'] = date('H:i:s, d M Y', strtotime($row['created_at']));
}

sendResponse(200, 'Data berhasil diambil', $data);
