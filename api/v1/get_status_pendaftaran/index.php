<?php

header("Content-Type: application/json");

// Koneksi database
$servername = "117.103.69.22";
$username   = "kocak";
$password   = "gaming";
$dbname     = "billkapten";

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    http_response_code(500);
    echo json_encode(["error" => "Connection failed: " . $conn->connect_error]);
    exit;
}

// Ambil input JSON
$input = json_decode(file_get_contents("php://input"), true);

// Cek parameter
if (!isset($input['userid_app'])) {
    http_response_code(400);
    echo json_encode(["error" => "Parameter 'userid_app' dibutuhkan."]);
    exit;
}

$userid_app = $conn->real_escape_string($input['userid_app']);

// Query
$sql = "SELECT 
            a.stts_ver AS status_verifikasi, 
            a.`status` AS status_create, 
            c.status_log AS status_pelanggan, 
            b.username_fal AS kode_user, 
            c.va_bca, 
            c.virtual_account AS briva 
        FROM tb_daf a
        LEFT JOIN tbl_fal b ON a.key_fal = b.uniq_daf
        LEFT JOIN tb_gundala c ON b.username_fal = c.kode_user
        WHERE a.userid_app = '$userid_app'";

// Eksekusi query
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    $records = [];
    while ($row = $result->fetch_assoc()) {
        $records[] = $row;
    }

    // Filter: hanya ambil yang kode_user tidak null dan verifikasi 'y' jika ada
    $filtered = array_filter($records, function($r) {
        return $r['kode_user'] !== null && $r['status_verifikasi'] === 'y';
    });

    // Ambil yang terbaik
    if (count($filtered) > 0) {
        $final = array_values($filtered)[0];
    } else {
        // Jika tidak ada yang valid, ambil baris pertama dari hasil asli
        $final = $records[0];
    }

    echo json_encode($final, JSON_UNESCAPED_UNICODE);
} else {
    echo json_encode(["error" => "Data tidak ditemukan."]);
}

$conn->close();
?>
