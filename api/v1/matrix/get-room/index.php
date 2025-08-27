<?php
header("Content-Type: application/json");
require_once __DIR__ . '/../../config/db_matrix.php';

// Ambil parameter dari request (GET atau POST)
$user_id = $_GET['user_id'] ?? null;
$other_user_id = $_GET['other_user_id'] ?? null;

if (!$user_id || !$other_user_id) {
    echo json_encode(['success' => false, 'message' => 'Missing parameters']);
    exit;
}

try {
    $stmt = $pdo->prepare("
        SELECT room_id
        FROM users_who_share_private_rooms
        WHERE (user_id = :user_id AND other_user_id = :other_user_id)
           OR (user_id = :other_user_id AND other_user_id = :user_id)
        GROUP BY room_id
        HAVING COUNT(*) = 2
        LIMIT 1
    ");
    $stmt->execute([
        ':user_id' => $user_id,
        ':other_user_id' => $other_user_id
    ]);

    $room = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($room) {
        echo json_encode(['status' => "success", 'room_id' => $room['room_id']]);
    } else {
        echo json_encode(['status' => "success", 'message' => 'No shared room found']);
    }
} catch (PDOException $e) {
    echo json_encode(['status' => "error", 'message' => 'Database error', 'error' => $e->getMessage()]);
}
