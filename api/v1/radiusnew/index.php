<?php
header('Content-Type: application/json');
date_default_timezone_set("Asia/Jakarta");

// Koneksi database
$host = '117.103.69.22';
$user = 'kocak';
$pass = 'gaming';
$db = 'billkapten';

$koneksi = new mysqli($host, $user, $pass, $db);
if ($koneksi->connect_error) {
    http_response_code(500);
    echo json_encode([
        "status" => "error",
        "message" => "Koneksi database gagal",
        "data" => null
    ]);
    exit;
}

// Validasi parameter
if (!isset($_GET['username']) || empty($_GET['username'])) {
    echo json_encode([
        'status' => 'error',
        'message' => 'Parameter username diperlukan.'
    ]);
    exit;
}

$username = $_GET['username'];

// Koneksi database pakai prepared statement
$sql = "SELECT id, username, attribute, op, value FROM radcheck WHERE username = ?";
$stmt = mysqli_prepare($koneksi, $sql);

if (!$stmt) {
    echo json_encode([
        'status' => 'error',
        'message' => 'Gagal menyiapkan statement: ' . mysqli_error($koneksi)
    ]);
    exit;
}

mysqli_stmt_bind_param($stmt, "s", $username);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

// Ambil data
$data = [];
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

if (empty($data)) {
    echo json_encode([
        'status' => 'not_found',
        'message' => 'Data tidak ditemukan untuk username: ' . $username
    ]);
    exit;
}

// Sukses
echo json_encode([
    'status' => 'success',
    'username' => $username,
    'data' => $data
]);
exit;
