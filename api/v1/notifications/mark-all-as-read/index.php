<?php
header("Content-Type: application/json");
require_once __DIR__ . '/../../helpers/response.php';
require_once __DIR__ . '/../../middleware/auth.php';

try {
    // Autentikasi Token
    $user_id = authenticate();

    // Validasi method
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        sendResponse('error', 405, "Invalid request method");
    }

    require_once __DIR__ . '/../config/db.php';

    // 🔁 Tandai semua notifikasi dengan status 'sent' menjadi 'read'
    $stmt = $pdo->prepare("UPDATE notification_recipients SET status = 'read', read_at = NOW() WHERE user_id = :user_id AND status = 'sent'");

    $stmt->execute(['user_id' => $user_id]);

    if ($stmt->rowCount() > 0) {
        sendResponse("success", 200, "Semua notifikasi telah ditandai sebagai dibaca");
    } else {
        sendResponse("success", 200, "Tidak ada notifikasi baru untuk ditandai");
    }
} catch (Exception $e) {
    sendResponse("error", 500, "Terjadi kesalahan. Silakan coba lagi nanti.");
}
