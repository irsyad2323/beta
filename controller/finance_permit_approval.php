<?php
include('controller_mysqli.php');

header('Content-Type: application/json');

function sendResponse($status, $message, $data = null)
{
    http_response_code($status);
    $response = ['status' => $status, 'message' => $message];
    if ($data !== null) {
        $response['data'] = $data;
    }
    echo json_encode($response);
    exit();
}

// Fungsi untuk membuat permintaan CURL
function makeCURLRequest($url, $postData, $token)
{
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => json_encode($postData),
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'apikey: ' . $token
        ),
    ));
    $response = curl_exec($curl);
    curl_close($curl);

    return $response;
}

// Mendapatkan data dari POST request dan memastikan semua data ada
if (!isset($_POST['id'], $_POST['actual_bayar'], $_POST['actual_nominal'], $_POST['nominal'], $_POST['status'], $_POST['approved_by'])) {
    sendResponse(400, 'Bad Request: Missing required fields.');
}

$id = $_POST['id'];
$actual_bayar = $_POST['actual_bayar'];
$actual_nominal = $_POST['actual_nominal'];
$nominal = $_POST['nominal'];
$status = $_POST['status'];
$approved_by = $_POST['approved_by'];

// Hitung outstanding
$outstanding = $nominal - $actual_nominal;

try {
    // Pastikan koneksi ke database tidak ada masalah
    if ($koneksi->connect_error) {
        throw new Exception('Database connection failed: ' . $koneksi->connect_error);
    }

    // Update tabel dengan data baru
    $query = $koneksi->prepare("UPDATE komitmen_pembayaran SET actual_bayar = ?, actual_nominal = ?, outstanding = ?, status = ?, approved_at = NOW(), approved_by = ? WHERE id = ?");
    if (!$query) {
        throw new Exception('Failed to prepare query: ' . $koneksi->error);
    }

    $query->bind_param('siissi', $actual_bayar, $actual_nominal, $outstanding, $status, $approved_by, $id);
    if (!$query->execute()) {
        throw new Exception('Failed to execute query: ' . $query->error);
    }

    if ($query->affected_rows === 0) {
        throw new Exception('Data not found or no changes made.');
    }

    // Ambil data dari tbl_permit berdasarkan permit_status_id
    $sql = "SELECT p.alamat, p.rt, p.rw, p.kelurahan, p.tlp, kp.created_by, x.url, x.instance, x.token FROM tbl_permit p JOIN tbl_permit_status ps ON ps.key_fal = p.key_fal JOIN komitmen_pembayaran kp ON kp.permit_status_id = ps.permit_status_id JOIN api_blast x ON x.unit = 'mlg' WHERE kp.id = ?";
    $stmt = $koneksi->prepare($sql);
    if (!$stmt) {
        throw new Exception('Failed to prepare permit query: ' . $koneksi->error);
    }

    $stmt->bind_param('i', $id);
    if (!$stmt->execute()) {
        throw new Exception('Failed to execute permit query: ' . $stmt->error);
    }

    $result = $stmt->get_result();
    $data = $result->fetch_assoc();
    if (!$data) {
        throw new Exception('No permit data found for the given id.');
    }

    if ($data['created_by'] == 'ivan_permit') {
        $number = "6281233992720";
    } else if (strpos(strtolower($data['created_by']), 'anisa') !== false) {
        $number = "6283898666512";
    } else if ($data['created_by'] == 'saiin') {
        $number = "081326594474";
    } else {
        $number = "628819569190";
    }

    // URL dan token untuk API
    $url = $data['url'] . "/message/sendText/" . $data['instance'];
    $token = $data['token'];

    // Format caption menggunakan data yang diambil dari tbl_permit
    $caption = "Diinformasikan bahwa kompensasi perijinan di " . $data['alamat'] . ", RT " . $data['rt'] . "/RW " . $data['rw'] . ", Kelurahan " . $data['kelurahan'] . ", nomor telepon: " . $data['tlp'] . " sudah ditransfer oleh Admin Keuangan. Mohon untuk segera mengupload kwitansinya.\n\nTerimakasih";

    // Data untuk API blasting
    $postData = [
        "number" => $number,
        "options" => [
            "delay" => 1200,
            "presence" => "composing",
            "linkPreview" => false
        ],
        "textMessage" => [
            "text" => $caption
        ]
    ];

    // Lakukan request ke API untuk blasting
    makeCURLRequest($url, $postData, $token);
    sendResponse(200, 'Pembayaran berhasil disetujui.');
} catch (Exception $e) {
    sendResponse(500, 'Error: ' . $e->getMessage());
}

// Menutup koneksi
$koneksi->close();
