<?php
header("Content-Type: application/json");

// Ambil path dari URL
$request_uri = $_SERVER['REQUEST_URI'];
$script_name = $_SERVER['SCRIPT_NAME'];


// $request_uri = /api/v1/tester/;
// $script_name = /api/v1/tester/index.php;


// Hapus bagian "/api/v1/index.php" dari URL    
$path = str_replace('/api/v1/tester/index.php', '', $request_uri);
// $path = /api/v1/tester/;
$path = trim($path, '/');
// $path = api/v1/tester;
$segments = explode('/', $path);
// $segments = [
//             "api",
//             "v1",
//             "tester"
//         ]

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
