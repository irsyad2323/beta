<?php
include('controller_mysqli.php');

header('Content-Type: application/json');

function sendResponse($status, $message, $data = null)
{
    http_response_code($status);
    $response = ['status' => $status, 'message' => $message];
    if ($data !== null) {
        $response['data'] = $data;
    }
    echo json_encode($response);
    exit();
}

// Mendapatkan data dari POST request
$permit_status_id = $_POST['id'];
$decision_by = $_POST['decision_by'];
$approval_status = $_POST['approval_status']; // Dapatkan status persetujuan dari permintaan

try {
    // Periksa apakah approval_status valid
    if (!in_array($approval_status, ['approved', 'pending', 'rejected'])) {
        throw new Exception('Status persetujuan tidak valid.');
    }

    // Update tabel dengan data baru sesuai approval_status
    $query = $koneksi->prepare("UPDATE tbl_permit_status SET approval_status = ?, decision_at = NOW(), decision_by = ? WHERE permit_status_id = ?");
    $query->bind_param('ssi', $approval_status, $decision_by, $permit_status_id);
    $query->execute();

    if ($query->affected_rows === 0) {
        throw new Exception('Data tidak ditemukan atau tidak ada perubahan yang dilakukan.');
    }

    // Pesan berdasarkan status
    $message = $approval_status === 'approved' ? 'Approval berhasil disetujui.' : ($approval_status === 'rejected' ? 'Approval telah ditolak.' : 'Status diatur ke pending.');

    sendResponse(200, $message);
} catch (Exception $e) {
    sendResponse(500, 'Maaf, Terjadi kesalahan pada server: ' . $e->getMessage());
}

// Menutup koneksi
$koneksi->close();
