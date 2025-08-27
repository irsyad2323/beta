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
$query = "SELECT 
p.key_fal,
p.is_hot_prospek,
p.kode, 
p.kelurahan,
p.nama_instansi AS pic_permit,
ps.pic AS permit,
ps.status,
CASE 
    WHEN LENGTH(ps.keterangan) > 100 THEN CONCAT(LEFT(ps.keterangan, 100), '...')
    ELSE ps.keterangan
END AS keterangan,
GREATEST(
    COALESCE(ps_inisiasi.created_at, '0000-00-00 00:00:00'),
    COALESCE(ps_follow_up.created_at, '0000-00-00 00:00:00'),
    COALESCE(ps_negosiasi.created_at, '0000-00-00 00:00:00'),
    COALESCE(ps_closing.created_at, '0000-00-00 00:00:00')
) AS created_at, -- Menggunakan GREATEST untuk tanggal terbaru
IF(ps_closing.created_at IS NOT NULL,
    TIMESTAMPDIFF(DAY, COALESCE(ps_inisiasi.created_at, ps_follow_up.created_at, ps_negosiasi.created_at), ps_closing.created_at),
    TIMESTAMPDIFF(DAY, COALESCE(ps_inisiasi.created_at, ps_follow_up.created_at, ps_negosiasi.created_at), NOW())
) AS leadtime
FROM
business_solutions AS p
LEFT JOIN (
    SELECT t1.*
    FROM business_solutions_status t1
    INNER JOIN (
        SELECT key_fal, MAX(created_at) AS max_created_at
        FROM business_solutions_status
        GROUP BY key_fal
    ) t2 ON t1.key_fal = t2.key_fal AND t1.created_at = t2.max_created_at
) AS ps ON p.key_fal = ps.key_fal
LEFT JOIN (
    SELECT key_fal, MAX(created_at) AS created_at
    FROM business_solutions_status
    WHERE status = 'inisiasi'
    GROUP BY key_fal
) AS ps_inisiasi ON p.key_fal = ps_inisiasi.key_fal
LEFT JOIN (
    SELECT key_fal, MAX(created_at) AS created_at
    FROM business_solutions_status
    WHERE status = 'follow_up'
    GROUP BY key_fal
) AS ps_follow_up ON p.key_fal = ps_follow_up.key_fal
LEFT JOIN (
    SELECT key_fal, MAX(created_at) AS created_at
    FROM business_solutions_status
    WHERE status = 'negosiasi'
    GROUP BY key_fal
) AS ps_negosiasi ON p.key_fal = ps_negosiasi.key_fal
LEFT JOIN (
    SELECT key_fal, MAX(created_at) AS created_at, MAX(approved_at) AS approved_at
    FROM business_solutions_status 
    WHERE status = 'closing'
    GROUP BY key_fal
) AS ps_closing ON p.key_fal = ps_closing.key_fal";

// Tambahkan kondisi WHERE jika `created_by` tidak kosong
if (!empty($created_by)) {
    $query .= " WHERE p.created_by = :created_by";
}

// Urutkan hasil berdasarkan `is_hot_prospek` dan `created_at`
// Prioritaskan yang is_hot_prospek = 1, Kemudian urutkan berdasarkan created_at terbaru
$query .= " ORDER BY p.is_hot_prospek DESC, ps.created_at DESC";

$statement = $conn->prepare($query);

// Jika ada filter, bind parameter created_by
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
