<?php

header("Content-Type: application/json");

$servername = "117.103.69.22";
$username = "kocak";
$password = "gaming";
$dbname = "billkapten";

// Koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die(json_encode(["error" => "Connection failed: " . $conn->connect_error]));
}

// Cek parameter
if (isset($_GET['id_cus'])) {
    $id_cus = $conn->real_escape_string($_GET['id_cus']);
    $sql = "SELECT * FROM tb_gundala WHERE kode_user = '$id_cus'";
} elseif (isset($_GET['no_telp'])) {
    $no_telp = $conn->real_escape_string($_GET['no_telp']);
    $sql = "SELECT * FROM tb_gundala WHERE telp_user = '$no_telp'";
} else {
    $sql = "SELECT * FROM tb_gundala";
}

// Eksekusi query
$result = $conn->query($sql);

// Tampilkan hasil
if ($result && $result->num_rows > 0) {
    $records = [];
    while ($row = $result->fetch_assoc()) {
        $records[] = $row;
    }

    // Kalau hanya 1 record dan parameter dicari, tampilkan sebagai objek
    if ((isset($_GET['id_cus']) || isset($_GET['no_telp'])) && count($records) == 1) {
        echo json_encode($records[0]);
    } else {
        echo json_encode($records);
    }
} else {
    echo json_encode(["error" => "Record not found"]);
}

$conn->close();
?>
