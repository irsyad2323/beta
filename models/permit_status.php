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

$query = "SELECT 
p.key_fal, 
p.kode, 
p.kelurahan, 
p.rw, 
p.rt, 
p.nama AS pic_permit, 
ps.pic AS permit, 
ps.status, 
CASE 
    WHEN LENGTH(ps.keterangan) > 100 THEN CONCAT(LEFT(ps.keterangan, 100), '...') -- Batasi ke 100 karakter
    ELSE ps.keterangan
END AS keterangan,  
ps.created_at, -- Tanggal created_at terakhir dari tbl_permit_status
-- Leadtime dihitung dari status awal yang tersedia (followup, negosiasi, atau closing) ke closing atau sekarang
IF(ps_closing.created_at IS NOT NULL,   
    TIMESTAMPDIFF(DAY, COALESCE(ps_inisiasi.created_at, ps_followup.created_at, ps_negosiasi.created_at), ps_closing.created_at), -- Jika sudah closing, hitung sampai closing
    TIMESTAMPDIFF(DAY, COALESCE(ps_inisiasi.created_at, ps_followup.created_at, ps_negosiasi.created_at), NOW()) -- Jika belum closing, hitung sampai sekarang
) AS leadtime,
-- Logic untuk status tracking
CASE
    WHEN ps.status != 'closing' THEN NULL -- Jika status bukan closing, tampilkan NULL
    ELSE 
        CASE 
            WHEN ps.decision_by IS NULL THEN 'Waiting for approval from the head of the unit' -- Jika decision_by di permit status kosong
            ELSE 
                CASE
                    WHEN ps.approval_status != 'approved' THEN ps.approval_status -- Jika approval_status bukan approved, tampilkan approval_status
                    ELSE
                        -- Cek ke tabel komitmen_pembayaran jika approved_by ada isinya
                        CASE 
                            WHEN EXISTS (
                                -- Cek jika ada approved_by kosong di komitmen_pembayaran yang terhubung ke permit status
                                SELECT 1 
                                FROM komitmen_pembayaran kp 
                                WHERE kp.permit_status_id = ps.permit_status_id 
                                AND kp.approved_by IS NULL
                            ) THEN 'Awaiting payment processing by finance' -- Jika ada approved_by kosong
                            ELSE 'Completed' -- Jika semua approved_by sudah diisi
                        END
                END
        END
END AS status_tracking, 
-- Tambahkan kolom approval head of unit leadtime
-- Leadtime dihitung dari created_at ke decision_at pada status closing
IF(ps_closing.decision_at IS NOT NULL,
    TIMESTAMPDIFF(DAY, ps_closing.created_at, ps_closing.decision_at),
    NULL
) AS approval_head_of_unit_leadtime
FROM
tbl_permit AS p
LEFT JOIN (
-- Subquery untuk mendapatkan data terakhir (terbaru) dari tbl_permit_status berdasarkan key_fal
SELECT t1.* 
FROM tbl_permit_status t1
INNER JOIN (
    -- Mengambil record yang memiliki created_at terbaru untuk setiap key_fal
    SELECT key_fal, MAX(created_at) AS max_created_at
    FROM tbl_permit_status
    GROUP BY key_fal
) t2 ON t1.key_fal = t2.key_fal AND t1.created_at = t2.max_created_at
) AS ps ON p.key_fal = ps.key_fal
LEFT JOIN (
-- Subquery untuk mendapatkan tanggal dari status inisiasi_perkenalan
SELECT key_fal, MAX(created_at) AS created_at
FROM tbl_permit_status
WHERE status = 'inisiasi_perkenalan'
GROUP BY key_fal
) AS ps_inisiasi ON p.key_fal = ps_inisiasi.key_fal
LEFT JOIN (
-- Subquery untuk mendapatkan tanggal dari status followup
SELECT key_fal, MAX(created_at) AS created_at
FROM tbl_permit_status
WHERE status = 'followup'
GROUP BY key_fal
) AS ps_followup ON p.key_fal = ps_followup.key_fal
LEFT JOIN (
-- Subquery untuk mendapatkan tanggal dari status negosiasi
SELECT key_fal, MAX(created_at) AS created_at
FROM tbl_permit_status
WHERE status = 'negosiasi'
GROUP BY key_fal
) AS ps_negosiasi ON p.key_fal = ps_negosiasi.key_fal
LEFT JOIN (
-- Subquery untuk mendapatkan tanggal dari status closing (jika ada)
SELECT key_fal, MAX(created_at) AS created_at, MAX(decision_at) AS decision_at
FROM tbl_permit_status 
WHERE status = 'closing'
GROUP BY key_fal
) AS ps_closing ON p.key_fal = ps_closing.key_fal
GROUP BY p.key_fal
ORDER BY ps.created_at DESC
";

$statement = $conn->prepare($query);
$statement->execute();
$data = $statement->fetchAll(PDO::FETCH_ASSOC);

// Memformat tanggal pada kolom created_at
foreach ($data as &$row) {
    $row['created_at'] = date('H:i:s, d M Y', strtotime($row['created_at']));
}

sendResponse(200, 'Data berhasil diambil', $data);
