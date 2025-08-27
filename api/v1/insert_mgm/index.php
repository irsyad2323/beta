<?php
header('Content-Type: application/json');

// Koneksi ke PostgreSQL
$host = '103.163.139.36';
$db = 'billkapten';
$user = 'vps_postgress';
$pass = '231215';

$conn = pg_connect("host=$host dbname=$db user=$user password=$pass");

if (!$conn) {
    echo json_encode(['status' => 'error', 'message' => 'Database connection failed']);
    exit();
}

// ===========================================
// Bearer Token Authentication
// ===========================================
$valid_token = "f43e1b5fa7e8b9d3c919ab62e4c2d8f3e56319f5b57b62e5b3e3e0f682d7a9c1";

$headers = getallheaders();

if (!isset($headers['Authorization'])) {
    echo json_encode(['status' => 'error', 'message' => 'Authorization header not found']);
    exit();
}

$auth_token = str_replace('Bearer ', '', $headers['Authorization']);

if ($auth_token !== $valid_token) {
    echo json_encode(['status' => 'error', 'message' => 'Invalid token']);
    exit();
}

// ===========================================
// Fungsi untuk menambahkan data baru ke `tb_mgm` (POST)
// ===========================================
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    if ($data) {
        // Validasi input
        $required_fields = [
            'jenis', 'nama_lengkap', 'no_wa', 'alamat', 'rt', 'rw', 'provinsi', 
            'kabupaten', 'kecamatan', 'kelurahan', 'patokan', 'nik', 'status_lokasi', 
            'paket_kapten', 'tahu_layanan', 'layanan_digunakan', 'nama_sobat', 
            'metode_pembayaran', 'no_wa_sobat', 'no_rekening', 'an_rek', 'kebijakan', 
            'layanan', 'latitude', 'longitude'
        ];

        foreach ($required_fields as $field) {
            if (!isset($data[$field])) {
                echo json_encode(['status' => 'error', 'message' => "Field '$field' is required"]);
                exit();
            }
        }

        $query = "
            INSERT INTO tb_mgm (
                jenis, nama_lengkap, no_wa, no_wa2, no_wa3, no_wa4, alamat, rt, rw, 
                provinsi, kabupaten, kecamatan, kelurahan, patokan, nik, foto_ktp, 
                foto_rumah, status_lokasi, paket_kapten, tahu_layanan, alasan, lain, 
                lokasi, nama_sobat, metode_pembayaran, wa_sobat, no_rekening, an_rek, 
                kebijakan, layanan, tanggal, tanggal2, latitude, longitude, layanan_digunakan
            ) VALUES (
                $1, $2, $3, $4, $5, $6, $7, $8, $9, $10, $11, $12, $13, $14, $15, $16, $17, 
                $18, $19, $20, $21, $22, $23, $24, $25, $26, $27, $28, $29, $30, CURRENT_TIMESTAMP, 
                CURRENT_TIMESTAMP, $31, $32, $33
            )
            ON CONFLICT DO NOTHING;
        ";

        $params = [
            $data['jenis'], $data['nama_lengkap'], $data['no_wa'], $data['no_wa2'], $data['no_wa3'], 
            $data['no_wa4'], $data['alamat'], $data['rt'], $data['rw'], $data['provinsi'], 
            $data['kabupaten'], $data['kecamatan'], $data['kelurahan'], $data['patokan'], $data['nik'], 
            $data['foto_ktp'], $data['foto_rumah'], $data['status_lokasi'], $data['paket_kapten'], 
            $data['tahu_layanan'], $data['alasan'], $data['lain'], $data['lokasi'], $data['nama_sobat'], 
            $data['metode_pembayaran'], $data['no_wa_sobat'], $data['no_rekening'], $data['an_rek'], 
            $data['kebijakan'], $data['layanan'], $data['latitude'], $data['longitude'], 
            $data['layanan_digunakan']
        ];

        $result = pg_query_params($conn, $query, $params);

        if ($result) {
            echo json_encode(['status' => 'success', 'message' => 'Data added successfully']);
        } else {
            $error_message = pg_last_error($conn);
            echo json_encode(['status' => 'error', 'message' => 'Failed to add data', 'error_detail' => $error_message]);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Invalid input']);
    }
}

pg_close($conn);
?>
