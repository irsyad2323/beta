<?php

header("Content-Type: application/json");

// Konfigurasi database
$servername = "117.103.69.22";
$username = "mbkm";
$password = "mbkm2025";
$dbname = "dummy_billkapten";

$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi database
if ($conn->connect_error) {
    jsonResponse(["error" => "Connection failed: " . $conn->connect_error], 500);
}

// Fungsi untuk mengirim respon JSON
function jsonResponse($data, $status = 200) {
    http_response_code($status);
    echo json_encode($data);
    exit;
}

// Fungsi untuk memverifikasi API Key dari database
function verifyApiKey($conn) {
    $headers = getallheaders();
    if (!isset($headers['X-API-KEY'])) {
        return false;
    }

    $apiKey = $headers['X-API-KEY'];

    // Mengambil API Key yang valid dari database
    $stmt = $conn->prepare("SELECT api_key FROM tb_api_keys WHERE api_key = ? LIMIT 1");
    $stmt->bind_param("s", $apiKey);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        return true;
    }

    return false;
}

// Jika API Key tidak valid, berikan respon 401 Unauthorized
if (!verifyApiKey($conn)) {
    jsonResponse(["error" => "Unauthorized: Invalid API Key"], 401);
}

// Menentukan metode HTTP yang digunakan
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        if (isset($_GET['kode_user'])) {
            $kode_user = $_GET['kode_user'];
            $stmt = $conn->prepare("SELECT * FROM tb_gundala WHERE kode_user = ?");
            $stmt->bind_param("s", $kode_user);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if ($result->num_rows > 0) {
                jsonResponse($result->fetch_assoc());
            } else {
                jsonResponse(["error" => "Record not found"], 404);
            }
        } else {
            $result = $conn->query("SELECT * FROM tb_gundala");
            $records = $result->fetch_all(MYSQLI_ASSOC);
            jsonResponse($records);
        }
        break;

    case 'POST':
        $data = json_decode(file_get_contents('php://input'), true);
        if (!isset($data['kode_user'], $data['nama_user'])) {
            jsonResponse(["error" => "Missing required fields"], 400);
        }

        $stmt = $conn->prepare("INSERT INTO tb_gundala (kode_user, nama_user) VALUES (?, ?)");
        $stmt->bind_param("ss", $data['kode_user'], $data['nama_user']);

        if ($stmt->execute()) {
            jsonResponse(["message" => "Record created successfully"], 201);
        } else {
            jsonResponse(["error" => "Error creating record: " . $stmt->error], 500);
        }
        break;

    case 'PUT':
        if (!isset($_GET['kode_user'])) {
            jsonResponse(["error" => "Missing kode_user parameter"], 400);
        }

        $kode_user = $_GET['kode_user'];
        $data = json_decode(file_get_contents('php://input'), true);

        if (!isset($data['nama_user'])) {
            jsonResponse(["error" => "Missing required fields"], 400);
        }

        $stmt = $conn->prepare("UPDATE tb_gundala SET nama_user = ? WHERE kode_user = ?");
        $stmt->bind_param("ss", $data['nama_user'], $kode_user);

        if ($stmt->execute()) {
            jsonResponse(["message" => "Record updated successfully"]);
        } else {
            jsonResponse(["error" => "Error updating record: " . $stmt->error], 500);
        }
        break;

    case 'DELETE':
        if (!isset($_GET['kode_user'])) {
            jsonResponse(["error" => "Missing kode_user parameter"], 400);
        }

        $kode_user = $_GET['kode_user'];

        $stmt = $conn->prepare("DELETE FROM tb_gundala WHERE kode_user = ?");
        $stmt->bind_param("s", $kode_user);

        if ($stmt->execute()) {
            jsonResponse(["message" => "Record deleted successfully"]);
        } else {
            jsonResponse(["error" => "Error deleting record: " . $stmt->error], 500);
        }
        break;

    default:
        jsonResponse(["error" => "Invalid request method"], 405);
        break;
}

$conn->close();
?>
