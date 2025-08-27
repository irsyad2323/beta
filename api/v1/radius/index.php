<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

date_default_timezone_set('Asia/Jakarta');
include('koneksi.php');

$response = [];

if (mysqli_connect_errno()) {
    http_response_code(500);
    echo json_encode(["status" => "error", "message" => "Koneksi ke database gagal: " . mysqli_connect_error()]);
    exit();
}

$input_data = json_decode(file_get_contents("php://input"), true);
if (!isset($input_data['kode_user'])) {
    http_response_code(400);
    echo json_encode(["status" => "error", "message" => "Parameter kode_user harus disertakan."]);
    exit();
}

$kode_user = $input_data['kode_user'];

$stmt = $koneksi->prepare("SELECT * FROM tb_gundala WHERE kode_user = ?");
$stmt->bind_param("s", $kode_user);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_all(MYSQLI_ASSOC);

if (!$data) {
    http_response_code(404);
    echo json_encode(["status" => "error", "message" => "Data tidak ditemukan untuk kode_user: $kode_user"]);
    exit();
}

foreach ($data as $key) {
    // Cek duplikasi di radcheck
    $cek = $koneksi->prepare("SELECT username FROM radcheck WHERE username = ?");
    $cek->bind_param("s", $kode_user);
    $cek->execute();
    $cek_result = $cek->get_result();
    if ($cek_result->num_rows > 0) {
        echo json_encode(['result' => 2]);
        exit;
    }

    // Data persiapan
    $kode = $key['kode_user'];
    $paket = $key['paket'];
    $type_paket = $key['type_paket'];
    $pakete = ($type_paket == 'edu') ? 'Edubiz-' . $paket . '-100_Profile' : $paket . 'M_Profile';
    $password = preg_replace('/[^A-Za-z0-9]/', '', $key['password_user']);

    $start_aktif = date('Y-m-d');
    $start = $start_aktif . ' 23:59:59';

    function getExactDateAfterMonths($timestamp, $months) {
        $day_current_date = date('d', $timestamp);
        $first_date_of_current_month = date('01-m-Y', $timestamp);
        $days_in_next_month = date('t', strtotime("+$months months", strtotime($first_date_of_current_month)));

        $days_to_substract = ($day_current_date > $days_in_next_month)
            ? $day_current_date - $days_in_next_month
            : 0;

        return strtotime("-$days_to_substract days", strtotime("+$months months", $timestamp));
    }

    $tgl_extend = getExactDateAfterMonths(strtotime($start), 1);
    $extend_rad = date('d M Y H:i:s', $tgl_extend);
    $masa_aktif = date('Y-m-d', $tgl_extend);

    // Start transaksi
    mysqli_begin_transaction($koneksi);

    $insert1 = mysqli_query($koneksi, "INSERT INTO radcheck (username, attribute, op, value) VALUES ('$kode','Cleartext-Password', ':=', '$password')");
    $insert2 = mysqli_query($koneksi, "INSERT INTO radcheck (username, attribute, op, value) VALUES ('$kode','User-Profile', ':=', '$pakete')");
    $insert3 = mysqli_query($koneksi, "INSERT INTO radcheck (username, attribute, op, value) VALUES ('$kode','Expiration', ':=', '$extend_rad')");
    $insert4 = mysqli_query($koneksi, "INSERT INTO radcheck (username, attribute, op, value) VALUES ('$kode','Simultaneous-Use', ':=', '1')");
    $update_gundala = mysqli_query($koneksi, "UPDATE tb_gundala SET status_log='y', active_log='$start_aktif', log_aktivasi='$start', expiration='$masa_aktif', extend_log='$masa_aktif', `status`='on' WHERE kode_user='$kode'");

    if (!$insert1 || !$insert2 || !$insert3 || !$insert4 || !$update_gundala) {
        mysqli_rollback($koneksi);
        echo json_encode([
            'result' => 0,
            'error' => [
                'insert1' => $insert1 ? '' : mysqli_error($koneksi),
                'insert2' => $insert2 ? '' : mysqli_error($koneksi),
                'insert3' => $insert3 ? '' : mysqli_error($koneksi),
                'insert4' => $insert4 ? '' : mysqli_error($koneksi),
                'update'  => $update_gundala ? '' : mysqli_error($koneksi)
            ]
        ]);
        exit;
    }

    // === GENERATE TOKEN API ===
    $userData = [$kode, $password, $pakete, $extend_rad];

    $curlToken = curl_init();
    curl_setopt_array($curlToken, [
        CURLOPT_URL => 'http://117.103.68.238:8082/api_v1/auth/generate_token.php',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => json_encode(["username" => $userData]),
        CURLOPT_HTTPHEADER => ['Content-Type: application/json'],
    ]);

    $responseToken = curl_exec($curlToken);
    $httpCodeToken = curl_getinfo($curlToken, CURLINFO_HTTP_CODE);
    curl_close($curlToken);

    if ($httpCodeToken !== 200 || !$responseToken) {
        mysqli_rollback($koneksi);
        $result['error'] = [
            'msg' => 'Gagal mendapatkan token',
            'response' => $responseToken,
            'http_code' => $httpCodeToken
        ];
        echo json_encode($result);
        exit;
    }

    $tokenData = json_decode($responseToken, true);
    $jwtToken = $tokenData['token'] ?? null;

    if (!$jwtToken) {
        mysqli_rollback($koneksi);
        $result['error'] = [
            'msg' => 'Token kosong dari API',
            'response' => $responseToken
        ];
        echo json_encode($result);
        exit;
    }

    // === KIRIM KE API CREATE ===
    $curlCreate = curl_init();
    curl_setopt_array($curlCreate, [
        CURLOPT_URL => 'http://117.103.68.238:8082/api_v1/index.php/Create',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => json_encode(["kode_user" => $userData]),
        CURLOPT_HTTPHEADER => [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $jwtToken,
            'X-OAUTH-TOKEN: oauth-demo-token',
            'X-API-KEY: key789'
        ],
    ]);

    $responseCreate = curl_exec($curlCreate);
    $httpCodeCreate = curl_getinfo($curlCreate, CURLINFO_HTTP_CODE);
    curl_close($curlCreate);

    if ($httpCodeCreate !== 200 || !$responseCreate) {
        mysqli_rollback($koneksi);
        $result['error'] = [
            'msg' => 'Gagal mengirim ke API Create',
            'response' => $responseCreate,
            'http_code' => $httpCodeCreate
        ];
        echo json_encode($result);
        exit;
    }

    // Semua sukses
    mysqli_commit($koneksi);
    echo json_encode(['result' => 1, 'token' => $jwtToken]);
}
?>
