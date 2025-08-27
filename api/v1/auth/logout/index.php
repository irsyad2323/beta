<?php
header("Content-Type: application/json");
require_once __DIR__ . '/../../config/db.php';
require_once __DIR__ . '/../../helpers/response.php';

// Pastikan request menggunakan metode POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    sendResponse('error', 405, "Invalid request method");
}

// Ambil token dari header (case insensitive)
$headers = array_change_key_case(getallheaders(), CASE_LOWER); // Buat semua key jadi lowercase
// echo json_encode($headers, JSON_PRETTY_PRINT);
if (!isset($headers['authorization'])) {
    sendResponse('error', 401, "Unauthorized: Token tidak ditemukan");
}

// Ambil token dari header
$raw_token = trim(str_replace('Bearer ', '', $headers['authorization']));
if (empty($raw_token)) {
    sendResponse('error', 401, "Unauthorized: Token kosong");
}

// Hash token untuk pencocokan di database
$hashed_token = hash('sha256', $raw_token);

try {
    global $pdo;
    $stmt = $pdo->prepare("DELETE FROM personal_access_tokens WHERE token = :token");
    $stmt->execute(['token' => $hashed_token]);

    if ($stmt->rowCount() === 0) {
        sendResponse('error', 400, "Token tidak valid atau sudah logout.");
    }

    sendResponse('success', 200, "Logout berhasil.");
} catch (Exception $e) {
    sendResponse('error', 500, "Gagal logout.");
}
