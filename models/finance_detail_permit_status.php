<?php
include('../controller/controller.php');

// Set respons JSON
header('Content-Type: application/json');

// Fungsi untuk mengirim respon
function sendResponse($status, $message, $approval_status, $data = null)
{
    http_response_code($status); // Mengatur kode status HTTP
    $response = ['status' => $status, 'message' => $message, 'approval_status' => $approval_status]; // Struktur respon
    if ($data !== null) {
        $response['data'] = $data; // Sertakan data jika tersedia
    }
    echo json_encode($response); // Mengonversi respon ke format JSON
    exit(); // Menghentikan eksekusi skrip lebih lanjut
}

// Cek apakah parameter permit_status_id ada dalam request
if (!isset($_POST['permit_status_id'])) {
    sendResponse(400, 'Parameter permit_status_id tidak ditemukan', 0);
}

$permit_status_id = $_POST['permit_status_id'];

// Query SQL dengan filter berdasarkan status
$query = "
    SELECT 
        kp.id, 
        ps.permit_status_id, 
        CONCAT(p.nama, CASE WHEN p.rw IS NOT NULL AND p.rw <> '00' THEN CONCAT(', RW ', p.rw) ELSE '' END, ', Kelurahan ', p.kelurahan) AS nama, 
        jadwal_bayar, 
        nominal, 
        actual_bayar, 
        actual_nominal, 
        outstanding, 
        kp.status, 
        kwitansi,
        CASE WHEN ps.decision_at IS NOT NULL AND ps.decision_by IS NOT NULL AND ps.approval_status = 'approved' THEN 1 ELSE 0 END AS approval_status
    FROM komitmen_pembayaran kp 
    JOIN tbl_permit_status ps ON kp.permit_status_id = ps.permit_status_id 
    JOIN tbl_permit p ON ps.key_fal = p.key_fal 
    WHERE ps.permit_status_id = :permit_status_id 
    ORDER BY kp.created_at DESC
";

$statement = $conn->prepare($query);
$statement->bindParam(':permit_status_id', $permit_status_id, PDO::PARAM_STR);
$statement->execute();
$data = $statement->fetchAll(PDO::FETCH_ASSOC);

// Mengambil approval_status dari hasil pertama
$approval_status = isset($data[0]) ? $data[0]['approval_status'] : 0;

// Kirim respons JSON
sendResponse(200, 'Data berhasil diambil', $approval_status, $data);
