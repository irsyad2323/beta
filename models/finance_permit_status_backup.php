<?php
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

// Ambil parameter status dari POST request
$statusFilter = isset($_POST['status']) ? $_POST['status'] : null;

// Cek validasi status
$allowedStatuses = ['completed', 'in_progress'];
if (!in_array($statusFilter, $allowedStatuses)) {
    sendResponse(400, 'Status tidak valid');
}

// Buat logika filtering berdasarkan status yang dikirim
$statusCondition = "";
if ($statusFilter === 'completed') {
    $statusCondition = "AND (
        SELECT COUNT(*) 
        FROM komitmen_pembayaran kp 
        WHERE kp.permit_status_id = ps.permit_status_id 
        AND kp.status = 'verified'
    ) = (
        SELECT COUNT(*) 
        FROM komitmen_pembayaran kp 
        WHERE kp.permit_status_id = ps.permit_status_id
    )";
} elseif ($statusFilter === 'in_progress') {
    $statusCondition = "AND (
        SELECT COUNT(*) 
        FROM komitmen_pembayaran kp 
        WHERE kp.permit_status_id = ps.permit_status_id 
        AND kp.status = 'verified'
    ) < (
        SELECT COUNT(*) 
        FROM komitmen_pembayaran kp 
        WHERE kp.permit_status_id = ps.permit_status_id
    )";
}

$approvedByCondition = (strpos($_SESSION['username'], 'firda') !== false)
    ? "AND ps.approved_by IS NOT NULL"
    : "AND ps.approved_by IS NULL";

// Query SQL dengan kondisi filtering berdasarkan status
$query = "
SELECT ps.permit_status_id, p.kode, p.nama, p.kelurahan, p.rw, p.rt, p.kd_layanan, ps.total_komitmen,
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
                CAST((
                    SELECT COUNT(*) 
                    FROM komitmen_pembayaran kp 
                    WHERE kp.permit_status_id = ps.permit_status_id 
                    AND kp.status = 'verified'
                ) AS CHAR),
                '/', 
                CAST((
                    SELECT COUNT(*) 
                    FROM komitmen_pembayaran kp 
                    WHERE kp.permit_status_id = ps.permit_status_id
                ) AS CHAR)
            )
        END
    END AS status_komitmen_pembayaran,
    ps.berita_acara,
    COALESCE(latest_kp.outstanding, 0) AS outstanding,
    COALESCE(latest_kp.jadwal_bayar, 'N/A') AS jadwal_bayar
FROM 
    tbl_permit p 
JOIN 
    tbl_permit_status ps ON p.key_fal = ps.key_fal
LEFT JOIN (
    SELECT 
        permit_status_id, 
        outstanding,
        jadwal_bayar
    FROM 
        komitmen_pembayaran
    WHERE 
        (permit_status_id, jadwal_bayar) IN (
            SELECT 
                permit_status_id, MAX(jadwal_bayar)
            FROM 
                komitmen_pembayaran
            GROUP BY 
                permit_status_id
        )
) latest_kp ON ps.permit_status_id = latest_kp.permit_status_id
WHERE 
    ps.berita_acara IS NOT NULL 
    AND ps.berita_acara <> ''
    $approvedByCondition
    $statusCondition
ORDER BY 
    ps.created_at DESC
";

// Eksekusi query
$statement = $conn->prepare($query);
$statement->execute();
$data = $statement->fetchAll(PDO::FETCH_ASSOC);

// Kirim hasil respon ke frontend
sendResponse(200, 'Data berhasil diambil', $data);
