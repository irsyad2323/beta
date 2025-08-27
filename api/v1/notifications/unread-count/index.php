<?php
header("Content-Type: application/json");
require_once __DIR__ . '/../../helpers/response.php';
require_once __DIR__ . '/../../middleware/auth.php';

try {
    // 🔐 Autentikasi Token
    $user_id = authenticate();

    // ✅ Validasi method GET
    if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
        sendResponse('error', 405, "Invalid request method");
    }

    require_once __DIR__ . '/../config/db.php';

    // 🧮 Hitung notifikasi yang belum dibaca
    $stmt = $pdo->prepare("SELECT COUNT(*) as unread_count FROM notification_recipients WHERE user_id = :user_id AND status = 'sent'");
    $stmt->execute(['user_id' => $user_id]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // 🟢 Kirim response
    sendResponse('success', 200, 'Unread count fetched successfully', [
        'unread_count' => (int)$result['unread_count']
    ]);
} catch (Exception $e) {
    sendResponse('error', 500, "Terjadi kesalahan. Silakan coba lagi nanti.");
}
