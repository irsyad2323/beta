<?php
header("Content-Type: application/json");
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Ambil path dari URL
$request_uri = $_SERVER['REQUEST_URI'];
$script_name = $_SERVER['SCRIPT_NAME'];

// Hapus bagian "/api/v1/index.php" dari URL
$path = str_replace('/api/v1/index.php', '', $request_uri);
$path = trim($path, '/');
$segments = explode('/', $path);

// Cek isi segments untuk debugging
echo json_encode(["debug_segments" => $segments]);

// Route untuk GET /products
if ($segments[0] === "products") {
    if (isset($segments[1]) && is_numeric($segments[1])) {
        $_GET['id'] = $segments[1];  // Pasang ID ke GET
    }

    // Cek apakah file products.php ada
    if (!file_exists('products.php')) {
        echo json_encode(["error" => "File products.php tidak ditemukan"]);
        exit;
    }

    include 'products.php';  // Panggil file products.php
    exit;
}

// Jika tidak ditemukan
http_response_code(404);
echo json_encode(["status" => "error", "message" => "Endpoint tidak ditemukan"]);
