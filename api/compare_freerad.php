<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
header('Content-Type: application/json');

// Koneksi MySQL
$mysql = new mysqli("117.103.69.22", "kocak", "gaming", "billkapten");
if ($mysql->connect_error) {
    die(json_encode(["data" => [], "error" => "Koneksi MySQL gagal: " . $mysql->connect_error]));
}

// Koneksi PostgreSQL
$pg = pg_connect("host=10.246.2.170 dbname=radiusd user=radiusd password='radiusd2025##'");
if (!$pg) {
    die(json_encode(["data" => [], "error" => "Koneksi PostgreSQL gagal."]));
}

// Ambil semua username yang punya attribute Expiration
$query = "SELECT username, value FROM radcheck WHERE attribute = 'Expiration'";
$result_mysql = $mysql->query($query);
$data = [];

if (!$result_mysql) {
    die(json_encode(["data" => [], "error" => "Query MySQL gagal: " . $mysql->error]));
}

while ($row = $result_mysql->fetch_assoc()) {
    $username = $row['username'];
    $mysql_value = $row['value'];

    // Ambil dari PostgreSQL berdasarkan username
    $result_pg = pg_query_params($pg, "SELECT value FROM radcheck WHERE attribute = 'Expiration' AND username = $1", [$username]);
    $pg_value = '-';

    if ($result_pg && pg_num_rows($result_pg) > 0) {
        $pg_row = pg_fetch_assoc($result_pg);
        $pg_value = $pg_row['value'];
    }

    $status = ($mysql_value === $pg_value) ? 'Match' : 'Mismatch';

    $data[] = [
        'username' => $username,
        'mysql_value' => $mysql_value,
        'pgsql_value' => $pg_value,
        'status' => $status
    ];
}

echo json_encode(["data" => $data]);
