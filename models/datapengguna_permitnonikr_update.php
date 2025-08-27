<?php
session_start();
$level_user = $_SESSION["level_user"];
$kota = $_SESSION["level_kantor"];

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

$login_username = $_SESSION["username"];

// Ambil parameter status dari POST request
$statusFilter = isset($_POST['status']) ? $_POST['status'] : 'inisiasi_perkenalan'; // Default 'inisiasi_perkenalan' jika tidak ada parameter status

// Validasi parameter status
$allowedStatuses = ['inisiasi_perkenalan', 'negosiasi', 'closing', 'followup', 'reject', 're_visit', 'kolaborasi'];
if (!in_array($statusFilter, $allowedStatuses)) {
    sendResponse(400, 'Status tidak valid');
}

$query = "SELECT ps.permit_status_id, p.key_fal, CONCAT(p.nama, CASE WHEN p.rw IS NOT NULL AND p.rw <> '00' THEN CONCAT(', RW ', p.rw) ELSE '' END, ', Kelurahan ', p.kelurahan) AS nama, ps.jangka_waktu_komitmen, ps.total_komitmen, ps.deskripsi_komitmen,
  CASE 
        WHEN (
            SELECT COUNT(*) 
            FROM komitmen_pembayaran kp 
            WHERE kp.permit_status_id = ps.permit_status_id
        ) = 0 THEN NULL
        ELSE CASE 
            WHEN (
                SELECT COUNT(*) 
                FROM komitmen_pembayaran kp 
                WHERE kp.permit_status_id = ps.permit_status_id 
                AND kp.status = 'verified'
            ) = (
                SELECT COUNT(*) 
                FROM komitmen_pembayaran kp 
                WHERE kp.permit_status_id = ps.permit_status_id
            ) THEN 'completed'
            ELSE CONCAT(
                CAST((SELECT COUNT(*) 
                      FROM komitmen_pembayaran kp 
                      WHERE kp.permit_status_id = ps.permit_status_id 
                      AND kp.status = 'verified') AS CHAR),
                '/', 
                CAST((SELECT COUNT(*) 
                      FROM komitmen_pembayaran kp 
                      WHERE kp.permit_status_id = ps.permit_status_id) AS CHAR)
            )
        END
    END AS status_komitmen_pembayaran,
 ps.keterangan, ps.pic, ps.status, ps.dokumentasi,ps.metode_followup, ps.created_at, DATEDIFF(CURDATE(), ps.created_at) AS jumday FROM tbl_permit p JOIN tbl_permit_status ps ON p.key_fal = ps.key_fal WHERE ps.status = :status ORDER BY ps.created_at DESC";

$statement = $conn->prepare($query);
$statement->bindParam(':status', $statusFilter, PDO::PARAM_STR);
$statement->execute();
$data = $statement->fetchAll(PDO::FETCH_ASSOC);

// Memformat tanggal pada kolom created_at
foreach ($data as &$row) {
    $row['created_at'] = date('H:i:s, d M Y', strtotime($row['created_at']));
}

sendResponse(200, 'Data berhasil diambil', $data);
