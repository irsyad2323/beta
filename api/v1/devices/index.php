<?php
header("Content-Type: application/json");
require_once __DIR__ . '/../helpers/response.php';
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../middleware/auth.php';

try {
    // 🔹 **Autentikasi Token**
    $user_id = authenticate();

    // 🔹 **Ambil JSON dari frontend**
    $inputJSON = file_get_contents("php://input");
    $data = json_decode($inputJSON, true);

    if (!$data) {
        sendResponse("error", 400, "JSON tidak valid");
    }

    $token = $data['token'] ?? null;
    $device_info = $data['device_info'] ?? null;

    if (!$token || !$device_info) {
        sendResponse("error", 400, "Token atau device info tidak boleh kosong");
    }

    // 🔹 **Cek apakah token sudah ada di fcm_tokens**
    $stmt_check_token = $pdo->prepare("SELECT id FROM fcm_tokens WHERE token = :token");
    $stmt_check_token->execute(['token' => $token]);
    $fcm_token = $stmt_check_token->fetch(PDO::FETCH_ASSOC);

    if ($fcm_token) {
        // Jika token sudah ada, update last_login
        $fcm_token_id = $fcm_token['id'];
        $stmt_update_last_login = $pdo->prepare("UPDATE fcm_tokens SET last_login = NOW() WHERE id = :id");
        $stmt_update_last_login->execute(['id' => $fcm_token_id]);
    } else {
        // 🔹 **Insert token baru ke fcm_tokens**   
        $stmt_insert_token = $pdo->prepare("INSERT INTO fcm_tokens (token, device_info, last_login) VALUES (:token, :device_info, NOW()) RETURNING id");
        $stmt_insert_token->execute([
            'token' => $token,
            'device_info' => json_encode($device_info),
        ]);
        $fcm_token_id = $stmt_insert_token->fetchColumn();
    }

    // 🔹 **Cek apakah user sudah memiliki token ini di user_fcm_tokens**
    $stmt_check_user_token = $pdo->prepare("SELECT 1 FROM user_fcm_tokens WHERE user_id = :user_id AND fcm_token_id = :fcm_token_id");
    $stmt_check_user_token->execute([
        'user_id' => $user_id,
        'fcm_token_id' => $fcm_token_id
    ]);

    if ($stmt_check_user_token->fetch()) {
        sendResponse("success", 200, "Token sudah terdaftar untuk user ini");
    }

    // 🔹 **Insert relasi user dengan FCM token**
    $stmt_insert_user_token = $pdo->prepare("INSERT INTO user_fcm_tokens (user_id, fcm_token_id) VALUES (:user_id, :fcm_token_id)");
    $stmt_insert_user_token->execute([
        'user_id' => $user_id,
        'fcm_token_id' => $fcm_token_id
    ]);

    sendResponse("success", 201, "Token berhasil disimpan untuk user ini");
} catch (Exception $e) {
    sendResponse("error", 500, "Server error: " . $e->getMessage());
}
