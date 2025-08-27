<?php
// Konfigurasi koneksi ke PostgreSQL
require '../db_connection.php';
header('Content-Type: application/json');

// Direktori penyimpanan gambar
$upload_dir = '../uploads/';
$upload_dir_url = 'https://dashboard.kaptennaratel.com/api/v1/uploads/';

// Menerima JSON dari frontend
$inputJSON = file_get_contents("php://input");
$data = json_decode($inputJSON, true);

// Tambahkan debugging untuk JSON yang tidak valid
if (!$data) {
    http_response_code(400);
    echo json_encode(["status" => "error", "message" => "JSON tidak valid", "received" => $inputJSON]);
    exit;
}

// Validasi data yang diperlukan
$required_fields = ["token", "title", "body", "user_id", "image", "notification_kategoris"];
foreach ($required_fields as $field) {
    if (!isset($data[$field])) {
        http_response_code(400);
        echo json_encode(["status" => "error", "message" => "Data tidak lengkap", "missing_field" => $field]);
        exit;
    }
}

// Fungsi untuk mengonversi gambar dari URL menjadi Base64
function convertImageUrlToBase64($imageUrl) {
    $imageData = file_get_contents($imageUrl);
    if ($imageData === false) {
        return false;
    }

    // Dapatkan tipe MIME gambar
    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $mimeType = $finfo->buffer($imageData);

    // Encode gambar ke Base64
    return "data:" . $mimeType . ";base64," . base64_encode($imageData);
}

// Proses penyimpanan gambar
$image_data = $data["image"];
$image_path = null;

if (!empty($image_data)) {
    // Jika `image` adalah URL, ubah ke Base64 terlebih dahulu
    if (filter_var($image_data, FILTER_VALIDATE_URL)) {
        $image_data = convertImageUrlToBase64($image_data);
        if (!$image_data) {
            http_response_code(500);
            echo json_encode(["status" => "error", "message" => "Gagal mengambil gambar dari URL"]);
            exit;
        }
    }

    // Decode gambar dari Base64
    $image_parts = explode(";base64,", $image_data);
    if (count($image_parts) == 2) {
        $image_type_aux = explode("image/", $image_parts[0]);
        if (count($image_type_aux) == 2) {
            $image_type = $image_type_aux[1]; // jpg, png, etc.
            $image_base64 = base64_decode($image_parts[1]);
            $file_name = uniqid() . "." . $image_type;
            $file_path = $upload_dir . $file_name;
            $file_database = $upload_dir_url . $file_name;

            // Simpan gambar ke server
            if (file_put_contents($file_path, $image_base64)) {
                $image_path = $file_database; // Simpan path file ke database
            } else {
                http_response_code(500);
                echo json_encode(["status" => "error", "message" => "Gagal menyimpan gambar ke server"]);
                exit;
            }
        }
    }
}

// Data untuk API kedua
$url2 = "https://survey.kaptennaratel.com/api/firebase/";
$data2 = [
    "token" => $data["token"],
    "title" => $data["title"],
    "body" => $data["body"],
    "image" => $image_path ? $image_path : null
];

// Eksekusi API kedua menggunakan cURL
$ch2 = curl_init($url2);
curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch2, CURLOPT_POST, true);
curl_setopt($ch2, CURLOPT_POSTFIELDS, json_encode($data2));
curl_setopt($ch2, CURLOPT_HTTPHEADER, ["Content-Type: application/json"]);
$response2 = curl_exec($ch2);
$http_code = curl_getinfo($ch2, CURLINFO_HTTP_CODE);
curl_close($ch2);

if ($http_code !== 200 || !$response2) {
    http_response_code(500);
    echo json_encode(["status" => "error", "message" => "Gagal mengakses API kedua"]);
    exit;
}

// Insert ke PostgreSQL tabel `notifications`
$query = "INSERT INTO notifications (title, body, category_id, image_url) VALUES ($1, $2, $3, $4) RETURNING id";
$result = pg_query_params($conn, $query, [$data["title"], $data["body"], $data["notification_kategoris"], $image_path]);

if (!$result) {
    http_response_code(500);
    echo json_encode(["status" => "error", "message" => "Gagal menyimpan ke tabel notifications", "error" => pg_last_error($conn)]);
    exit;
}

$notification_id = pg_fetch_result($result, 0, 'id');

if (!$notification_id) {
    http_response_code(500);
    echo json_encode(["status" => "error", "message" => "Gagal mendapatkan ID dari tabel notifications"]);
    exit;
}

// Insert ke tabel `notification_recipients`
$query2 = "INSERT INTO notification_recipients (notification_id, user_id) VALUES ($1, $2)";
$result2 = pg_query_params($conn, $query2, [$notification_id, $data["user_id"]]);

if (!$result2) {
    http_response_code(500);
    echo json_encode(["status" => "error", "message" => "Gagal menyimpan ke tabel notification_recipients", "error" => pg_last_error($conn)]);
    exit;
}

// Mengembalikan response JSON sukses
http_response_code(201);
echo json_encode([
    "status" => "success",
    "message" => "Notifikasi berhasil dikirim",
    "notification_id" => $notification_id,
    "image_path" => $image_path
]);

// Tutup koneksi
pg_close($conn);
?>
