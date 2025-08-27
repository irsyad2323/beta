<?php
require 'vendor/autoload.php';
require 'config.php';

use Firebase\JWT\JWT;

header("Content-Type: application/json");

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

// Validasi login sederhana (ganti dengan cek database)
if ($username === 'admin' && $password === '12345') {
    $payload = [
        'iss' => 'domainmu.com',
        'iat' => time(),
        'exp' => time() + 3600,
        'data' => [ 'username' => $username ]
    ];
    $jwt = JWT::encode($payload, $key, 'HS256');
    echo json_encode(['token' => $jwt]);
} else {
    http_response_code(401);
    echo json_encode(['error' => 'Login gagal']);
}
