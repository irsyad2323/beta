<?php
// Koneksi ke database
$koneksi = new mysqli("117.103.69.22", "kocak", "gaming", "billkapten");

// Cek koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Ambil data dari radcheck dengan attribute = 'Expiration'
$query = "SELECT * FROM radcheck WHERE attribute = 'Expiration' LIMIT 1000 OFFSET 0;";
$result = $koneksi->query($query);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {

        // Ambil informasi dari tabel radcheck
        $username = $row['username'];
        $expiration = $row['value']; // format seperti: "27 May 2025 23:59:59"

        // Contoh data tambahan
        $data_user = [$username, $expiration, "10", "624"];
        $json_data = json_encode(["username" => $data_user]);

        // 1. Generate token
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://117.103.68.238:8082/api_v1/auth/generate_token.php',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $json_data,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);

        $token_response = json_decode($response, true);

        if (!isset($token_response['token'])) {
            echo "Gagal generate token untuk $username\n";
            continue; // skip ke user selanjutnya
        }

        $token = $token_response['token'];

        // 2. Kirim ke API Update_data
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://117.103.68.238:8082/api_v1/index.php/Update_data',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode(["kode_user" => $data_user]),
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Authorization: Bearer ' . $token,
                'X-OAUTH-TOKEN: oauth-demo-token',
                'X-API-KEY: key789'
            ),
        ));
        $update_response = curl_exec($curl);
        curl_close($curl);

        echo "Update untuk $username: $update_response\n";
    }
} else {
    echo "Tidak ada data dengan attribute Expiration.\n";
}

$koneksi->close();
