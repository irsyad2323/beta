<?php
$conn = new mysqli("103.163.139.36", "irsyad", "231215", "survei");

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

$invoice_id = $_POST['invoice_id'];
$status = $_POST['status'];
$approved_by = $_POST['approved_by'];
$keterangan = isset($_POST['keterangan']) ? $_POST['keterangan'] : null;

$conn->begin_transaction();

try {
    // Update status di tabel invoice
    $update_invoice = $conn->prepare("UPDATE invoice SET status = ? WHERE id = ?");
    $update_invoice->bind_param('si', $status, $invoice_id);
    $update_invoice->execute();

    if ($update_invoice->affected_rows === 0) {
        throw new Exception('Invoice tidak ditemukan.');
    }

    // Insert ke tabel invoice_approval
    $insert_approval = $conn->prepare("INSERT INTO invoice_approval (invoice_id, approved_at, approved_by, status, keterangan) VALUES (?, NOW(), ?, 'approved', ?)");
    $insert_approval->bind_param('iis', $invoice_id, $approved_by, $keterangan);
    $insert_approval->execute();

    if ($insert_approval->affected_rows === 0) {
        throw new Exception('Gagal menyimpan data persetujuan.');
    }

    $conn->commit();

    $message = $status === 'verified' ? 'Invoice berhasil diverified.' : 'Invoice berhasil diunverified dengan alasan: ' . $keterangan;
    sendResponse(200, $message);
} catch (Exception $e) {
    $conn->rollback();
    sendResponse(500, 'Maaf, Terjadi kesalahan pada server: ' . $e->getMessage());
}

$conn->close();
