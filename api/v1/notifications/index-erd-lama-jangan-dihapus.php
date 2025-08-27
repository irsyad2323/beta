<?php
header("Content-Type: application/json");
require_once __DIR__ . '/../helpers/response.php';
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../middleware/auth.php';

try {
    // 🔹 **Autentikasi Token**
    $user_id = authenticate();

    // 🔹 **Ambil data notifikasi dari PostgreSQL**
    $stmt = $pdo->prepare("SELECT d.notification_id, b.title, b.body, b.image_url, h.name AS category, b.created_at FROM notification_recipients d JOIN notifications b ON d.notification_id = b.id JOIN notification_categories h ON h.id = b.category_id WHERE d.user_id = :user_id ORDER BY b.created_at DESC");
    $stmt->execute(['user_id' => $user_id]);
    $notifications = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (!$notifications) {
        sendResponse('error', 404, "Tidak ada notifikasi ditemukan.");
    }

    // 🔹 **Kirim response**
    sendResponse('success', 200, "Data notifikasi berhasil diambil.", $notifications);
} catch (Exception $e) {
    sendResponse('error', 500, "Server error: " . $e->getMessage());
}
