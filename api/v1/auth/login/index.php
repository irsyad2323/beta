<?php
header("Content-Type: application/json");
require_once __DIR__ . '/../../config/db.php';
require_once __DIR__ . '/../../helpers/validation.php';
require_once __DIR__ . '/../../helpers/response.php';

// Pastikan request menggunakan metode POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    sendResponse('error', 405, "Invalid request method");
}

// Ambil JSON dari body
$inputJSON = file_get_contents("php://input");
$input = json_decode($inputJSON, true);

// Daftar field yang diperlukan
$requiredFields = [
    'email' => 'Email',
    'password' => 'Password',
    'platform' => 'Platform'
];

// Validasi field yang diperlukan
$missingFields = validateRequiredFields($requiredFields, $input);
if (!empty($missingFields)) {
    sendResponse('error', 400, "Mohon lengkapi: " . implode(', ', $missingFields));
}

// Trim data
$email = trim($input['email']);
$password = trim($input['password']);
$platform = trim($input['platform']); // "Web", "Android", "iOS"

// Validasi email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    sendResponse('error', 400, "Format email tidak valid.");
}

// Ambil data user berdasarkan email
$sql = "SELECT id, name, email, phone, password, created_at FROM users WHERE email = :email AND deleted_at IS NULL LIMIT 1";
$stmt = $pdo->prepare($sql);
$stmt->execute(['email' => $email]);
$user = $stmt->fetch();

if (!$user) {
    sendResponse('error', 404, "Email tidak terdaftar.");
}

// Verifikasi password
if (!password_verify($password, $user['password'])) {
    sendResponse('error', 401, "Password tidak sesuai.");
}

$token = bin2hex(random_bytes(64));

$pdo->beginTransaction();
try {
    // Simpan token ke database 
    $insertTokenSQL = "INSERT INTO personal_access_tokens (tokenable_id, name, token) VALUES (:tokenable_id, :name, :token)";
    $stmt = $pdo->prepare($insertTokenSQL);
    $stmt->execute([
        'tokenable_id' => $user['id'],
        'name' => $platform,
        'token' => hash('sha256', $token)
    ]);

    $pdo->commit();

    // Hapus data sensitif sebelum dikirim ke response
    unset($user['password']);

    http_response_code(200);
    echo json_encode(["status" => "success", "message" => 'Login berhasil.', "data" => $user, "token" => $token]);
    exit();
} catch (Exception $e) {
    $pdo->rollBack();
    sendResponse("error", 500, "Terjadi kesalahan saat login. Silakan coba lagi nanti.");
}
