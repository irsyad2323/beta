<?php
header("Content-Type: application/json");
require_once __DIR__ . '/../helpers/response.php';
require_once __DIR__ . '/../middleware/auth.php';

try {
    // Autentikasi Token
    $user_id = authenticate();

    require_once __DIR__ . '/config/db.php';

    // Ambil parameter ID notifikasi (jika ada)
    $notification_id = isset($_GET['id']) ? intval($_GET['id']) : null;

    if ($notification_id) {
        // Ambil Detail Notifikasi berdasarkan ID
        $stmt = $pdo->prepare("SELECT 
                                    n.id AS notification_id, 
                                    nc.name AS category, 
                                    nt.template_name AS title, 
                                    nt.body AS message, 
                                    n.data, 
                                    nr.status, 
                                    nr.sent_at, 
                                    nr.read_at
                                FROM notifications n
                                JOIN notification_categories nc ON n.category_id = nc.id
                                JOIN notification_templates nt ON n.template_id = nt.id
                                JOIN notification_recipients nr ON n.id = nr.notification_id
                                WHERE n.id = :notification_id AND nr.user_id = :user_id
                                LIMIT 1");
        $stmt->execute(['notification_id' => $notification_id, 'user_id' => $user_id]);
        $notification = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$notification) {
            sendResponse("error", 404, "Notifikasi tidak ditemukan");
        }

        // Decode JSON `data` jika ada
        if (!empty($notification['data'])) {
            $notification['data'] = json_decode($notification['data'], true);
        }

        // Ambil file/media jika ada
        $stmt = $pdo->prepare("SELECT file_url, file_type 
                               FROM notification_attachments 
                               WHERE notification_id = :notification_id");
        $stmt->execute(['notification_id' => $notification_id]);
        $attachments = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (!empty($attachments)) {
            $notification['attachments'] = $attachments;
        }

        // Tandai sebagai dibaca jika belum
        if ($notification['status'] === 'sent') {
            $updateStmt = $pdo->prepare("UPDATE notification_recipients 
                                        SET status = 'read', read_at = NOW() 
                                        WHERE notification_id = :notification_id AND user_id = :user_id");
            $updateStmt->execute(['notification_id' => $notification_id, 'user_id' => $user_id]);
            $notification['status'] = 'read';
            $notification['read_at'] = date('Y-m-d H:i:s'); // Waktu server saat dibaca
        }

        sendResponse("success", 200, "Detail notifikasi berhasil diambil", $notification);
    } else {
        // Ambil Semua Notifikasi User
        $stmt = $pdo->prepare("SELECT n.id AS notification_id, nc.name AS category, nt.template_name AS title, nt.body AS message, nr.status, nr.sent_at, nr.read_at FROM notifications n JOIN notification_categories nc ON n.category_id = nc.id JOIN notification_templates nt ON n.template_id = nt.id JOIN notification_recipients nr ON n.id = nr.notification_id WHERE nr.user_id = :user_id ORDER BY nr.sent_at DESC");
        $stmt->execute(['user_id' => $user_id]);
        $notifications = $stmt->fetchAll(PDO::FETCH_ASSOC);

        sendResponse("success", 200, "Data notifikasi berhasil diambil", $notifications);
    }
} catch (Exception $e) {
    sendResponse("error", 500, "Server error: " . $e->getMessage());
}
