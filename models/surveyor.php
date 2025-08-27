<?php
$conn = new PDO("mysql:host=103.163.139.36;dbname=survei", "irsyad", "231215");

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

// Ambil parameter status dari POST request
$statusFilter = isset($_POST['status']) ? $_POST['status'] : 'verified'; // Default 'verified' jika tidak ada parameter status

// Validasi parameter status
$allowedStatuses = ['verified', 'approved'];
if (!in_array($statusFilter, $allowedStatuses)) {
    sendResponse(400, 'Status tidak valid');
}

// Query SQL dengan filter berdasarkan status
$query = "SELECT i.id, i.total_harga, i.deskripsi, i.status, i.created_at, u.name 
          FROM invoice i 
          JOIN users u ON i.created_by = u.id 
          WHERE i.status = :status 
          ORDER BY i.created_at DESC";

$statement = $conn->prepare($query);
$statement->bindParam(':status', $statusFilter, PDO::PARAM_STR);
$statement->execute();
$data = $statement->fetchAll(PDO::FETCH_ASSOC);

// Memformat tanggal pada kolom created_at
foreach ($data as &$row) {
    $row['created_at'] = date('H:i:s, d M Y', strtotime($row['created_at']));
    $row['deskripsi'] = $row['deskripsi'] ? $row['deskripsi'] : '-';
}

sendResponse(200, 'Data berhasil diambil', $data);
