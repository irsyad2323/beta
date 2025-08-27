<?php
header("Content-Type: application/json");
require_once __DIR__ . '/../../helpers/response.php';
require_once __DIR__ . '/../../middleware/auth.php';

try {
    // 🔐 Autentikasi token
    $user_id = authenticate();

    // ✅ Validasi method
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        sendResponse('error', 405, "Invalid request method");
    }

    require_once __DIR__ . '/../config/db.php';

    // 🔄 Update status notifikasi hanya yang dibaca dalam 5 detik terakhir
    $stmt = $pdo->prepare("
        UPDATE notification_recipients 
        SET status = 'sent', read_at = NULL
        WHERE user_id = :user_id
          AND status = 'read'
          AND read_at >= NOW() - INTERVAL '5 seconds'
          RETURNING id, status, read_at
    ");

    $stmt->execute(['user_id' => $user_id]);
    $updatedNotifications = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($updatedNotifications) > 0) {
        sendResponse("success", 200, "Undo berhasil dilakukan.", $updatedNotifications);
    } else {
        sendResponse("success", 200, "Tidak ada notifikasi yang bisa di-undo.");
    }
} catch (Exception $e) {
    sendResponse("error", 500, "Terjadi kesalahan pada server: " . $e->getMessage());
}
