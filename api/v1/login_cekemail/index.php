<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

header("Content-Type: application/json");

$host = "103.163.139.36";
$dbname = "db_kapten";
$user = "vps_postgress";
$password = "231215";

$conn = pg_connect("host=$host dbname=$dbname user=$user password=$password");

if (!$conn) {
    http_response_code(500);
    echo json_encode(["status" => "error", "message" => "Connection failed: " . pg_last_error()]);
    exit;
}

// Pastikan request menggunakan metode POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil JSON dari body
    $inputJSON = file_get_contents("php://input");
    $input = json_decode($inputJSON, true);

    // Validasi parameter JSON
    if (!isset($input['email']) || empty(trim($input['email']))) {
        http_response_code(400);
        echo json_encode(["status" => "error", "message" => "Email parameter is required"]);
        exit;
    }
    if (!isset($input['password']) || empty(trim($input['password']))) {
        http_response_code(400);
        echo json_encode(["status" => "error", "message" => "Password tidak boleh kosong"]);
        exit;
    }
    if (!isset($input['fcm_token']) || empty(trim($input['fcm_token'])) || 
        !isset($input['device_info']) || empty(trim($input['device_info']))) {
        http_response_code(400);
        echo json_encode(["status" => "error", "message" => "fcm_token dan device_info diperlukan"]);
        exit;
    }

    // Escape string untuk keamanan SQL Injection
    $email = pg_escape_string($conn, trim($input['email']));
    $password = trim($input['password']);
    $fcm_token = pg_escape_string($conn, trim($input['fcm_token']));
    $device_info = pg_escape_string($conn, trim($input['device_info']));

    // Ambil data user berdasarkan email
    $sql = "SELECT id, email, password, COALESCE(name, '') AS name, COALESCE(phone, '') AS phone FROM users WHERE email = '$email' AND deleted_at IS NULL";
    $result = pg_query($conn, $sql);

    // Jika tidak ada data ditemukan
    if (!$result || pg_num_rows($result) == 0) {
        http_response_code(404);
        echo json_encode(["status" => "error", "message" => "tidak ada data"]);
        exit;
    }

    $data = pg_fetch_assoc($result);
    $hashed_password = $data['password'];
    $name = $data['name'];
    $phone = $data['phone'];

    // Verifikasi password
    if (!password_verify($password, $hashed_password)) {
        http_response_code(401);
        echo json_encode(["status" => "error", "message" => "Password tidak sesuai"]);
        exit;
    }

    // Cek apakah fcm_token sudah ada
    $sql_fcm = "SELECT COUNT(*) FROM fcm_tokens WHERE token = '$fcm_token' AND device_info = '$device_info'";
    $result_fcm = pg_query($conn, $sql_fcm);

    if (!$result_fcm) {
        http_response_code(500);
        echo json_encode(["status" => "error", "message" => "Query error: " . pg_last_error($conn)]);
        exit;
    }

    $count = pg_fetch_result($result_fcm, 0, 0);
    $inserted_id = null;

    // Jika token tidak ada, tambahkan token ke dalam database dan ambil ID yang diinsert
    if ($count == 0) {
        $insert_fcm = "INSERT INTO fcm_tokens (token, device_info) VALUES ('$fcm_token', '$device_info') RETURNING id";
        $insert_result = pg_query($conn, $insert_fcm);

        if ($insert_result) {
            $inserted_id = pg_fetch_result($insert_result, 0, 0);
        } else {
            http_response_code(500);
            echo json_encode(["status" => "error", "message" => "Gagal menyimpan FCM token"]);
            exit;
        }
    }

    echo json_encode([
        "status" => "success",
        "data" => [
            "id" => $data['id'],
            "email" => $data['email'],
            "phone" => $phone,
            "name" => $name
        ],
		"message" => "Login berhasil",
    ]);
} else {
    http_response_code(405);
    echo json_encode(["status" => "error", "message" => "Invalid request method"]);
}

pg_close($conn);
?>
