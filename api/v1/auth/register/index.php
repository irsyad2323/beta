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
    'name' => 'Nama',
    'email' => 'Email',
    'phone' => 'Nomor Telepon',
    'password' => 'Password'
];

// Validasi field yang diperlukan
$missingFields = validateRequiredFields($requiredFields, $input);
if (!empty($missingFields)) {
    sendResponse('error', 400, "Mohon lengkapi: " . implode(', ', $missingFields));
}

// Trim data
$name = trim($input['name']);
$email = trim($input['email']);
$phone = trim($input['phone']);
$password = trim($input['password']);

// Validasi email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    sendResponse('error', 400, "Format email tidak valid.");
}

// Validasi nomor telepon (hanya angka, min 8 digit, max 15 digit)
if (!preg_match('/^\d{8,15}$/', $phone)) {
    sendResponse('error', 400, "Nomor telepon tidak valid.");
}

// Cek apakah email atau nomor telepon sudah digunakan
$sqlCheck = "SELECT email, phone FROM users WHERE email = :email OR phone = :phone LIMIT 1";
$stmt = $pdo->prepare($sqlCheck);
$stmt->execute(['email' => $email, 'phone' => $phone]);
$existingUser = $stmt->fetch();

if ($existingUser) {
    $message = $existingUser['email'] === $email ? "Email sudah terdaftar." : "Nomor telepon sudah terdaftar.";
    sendResponse('error', 400, $message);
}

// Hash password
$hashedPassword = password_hash($password, PASSWORD_BCRYPT);

// Simpan user ke database
try {
    $sqlInsert = "INSERT INTO users (name, email, phone, password) 
                  VALUES (:name, :email, :phone, :password)";
    $stmt = $pdo->prepare($sqlInsert);
    $stmt->execute([
        'name' => $name,
        'email' => $email,
        'phone' => $phone,
        'password' => $hashedPassword
    ]);

    // Ambil user baru (tanpa password)
    $userId = $pdo->lastInsertId();
    $sqlUser = "SELECT id, name, email, phone, created_at FROM users WHERE id = :id";
    $stmt = $pdo->prepare($sqlUser);
    $stmt->execute(['id' => $userId]);
    $user = $stmt->fetch();

    // Siapkan respons sukses
    sendResponse('success', 200, 'Registrasi berhasil. Silakan login untuk melanjutkan.', $user);
} catch (Exception $e) {
    sendResponse("error", 500, "Terjadi kesalahan saat registrasi. Silakan coba lagi nanti.");
}
