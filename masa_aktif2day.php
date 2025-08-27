<?php
date_default_timezone_set('Asia/Jakarta');

$host = "117.103.69.22";
$user = "kocak";
$password = "gaming";
$database = "billkapten";
$koneksi = mysqli_connect($host, $user, $password, $database);

if (mysqli_connect_errno()) {
    die('Koneksi ke database gagal: ' . mysqli_connect_error());
}

// === 1. Ambil data dari tb_gundala ===
$query = mysqli_query($koneksi, "
    SELECT g.id_log, g.kode_user, g.paket, g.telp_user 
    FROM tb_gundala g 
    WHERE g.kode_user IN (
'KM1455','KM1502','KM1605','KM1725','KM1761','KM1910','KM1989','KM2007',
'KM2181','KM2184','KM2219','KM2275','KM2330','KM2393','KM2467','KM2707',
'KM2781','KM2790','KM2791','KM2827','KM2828','KM2832','KM3020','KM3023',
'KM3051','KM3110','KM2975','KM3216','KM3229','KM3320','KM3327','KM3354',
'KM3363','KM3377','KM3415','KM3464','KM3485','KM3694','KM3763','KM3766',
'KM3802','KM3880','KM3883','KM3884','KM3922','KM3974','KP0005','KP0018',
'KP0125','KP0146','KP0287','KP0469','KP0107','KP0110','KP0132','KP0503',
'KP0500','KP0510','KM1132','KP0580','KP0620','KP0683','KP0853','KP0864',
'KP0862','KP0832','KP0871','KP0894','KP0893','KP0975','KP1012','KP1032',
'KP1052','KP1053','KP1070','KP1118','KP1315','KP1355','KP1399','KP1501',
'KP1581','KP1678','KP1763','KP1764','KP1804','KP1808','KP1859','KP1867',
'KP1890','KP1964','KP1985','KP1988','KP2004'
) 
      AND g.status_log = 'y' 
      AND g.stts_blast = 'n'
");
$data = mysqli_fetch_all($query, MYSQLI_ASSOC);

// === 2. Looping hasil query ===
foreach ($data as $key) {
    $hp = $key['telp_user'];
    $kode_user = $key['kode_user'];
    $paket = $key['paket'];

    // === 3. Generate token untuk user ini ===
    $payloadToken = json_encode([
        "username" => [$kode_user]
    ]);
    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_URL => 'http://117.103.68.238:8082/api_v1/auth/generate_token.php',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => $payloadToken,
        CURLOPT_HTTPHEADER => ['Content-Type: application/json'],
    ]);
    $tokenResponse = curl_exec($curl);
    curl_close($curl);

    $tokenData = json_decode($tokenResponse, true);
    $token = $tokenData['token'] ?? null;
    if (!$token) {
        echo "Gagal ambil token untuk $kode_user: $tokenResponse<br>";
        continue;
    }

    // === 4. Ambil detail user via API GetDetail ===
    $payloadDetail = json_encode([
        "kode_user" => [$kode_user]
    ]);
    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_URL => 'http://117.103.68.238:8082/api_v1/index.php/GetDetail',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => $payloadDetail,
        CURLOPT_HTTPHEADER => [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $token,
            'X-OAUTH-TOKEN: oauth-demo-token',
            'X-API-KEY: key789'
        ],
    ]);
    $detailResponse = curl_exec($curl);
    curl_close($curl);

    $detailData = json_decode($detailResponse, true);
    if (!$detailData || $detailData['status'] != 'success') {
        echo "Gagal ambil detail user $kode_user: $detailResponse<br>";
        continue;
    }

    // === 5. Cari Expiration dari data API ===
    $awal = null;
    foreach ($detailData['data'] as $attr) {
        if ($attr['attribute'] == 'Expiration') {
            $awal = $attr['value'];
            break;
        }
    }
    if (!$awal) {
        echo "Expiration tidak ditemukan untuk $kode_user<br>";
        continue;
    }

    // === 6. Hitung Expiration +1 hari ===
    $awal_fmt = date("d M Y", strtotime($awal));
    $akhir_fmt = date("d M Y", strtotime("+2 day", strtotime($awal)));
    $awalBaru = date("d M Y H:i:s", strtotime("+2 day", strtotime($awal)));

    // Update DB lokal
    mysqli_query($koneksi, "
        UPDATE radcheck 
        SET value = '" . $awalBaru . "' 
        WHERE username = '" . $kode_user . "' 
          AND attribute = 'Expiration';
    ");
    mysqli_query($koneksi, "
        UPDATE tb_gundala 
        SET stts_blast = 'y' 
        WHERE id_log = " . $key['id_log'] . ";
    ");

    // === 7. Update ke API eksternal ===
    // Buat token khusus dengan payload username + expiration
    $payloadToken2 = json_encode([
        "username" => [$kode_user, $awalBaru]
    ]);
    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_URL => 'http://117.103.68.238:8082/api_v1/auth/generate_token.php',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => $payloadToken2,
        CURLOPT_HTTPHEADER => ['Content-Type: application/json'],
    ]);
    $respToken2 = curl_exec($curl);
    curl_close($curl);

    $tokData2 = json_decode($respToken2, true);
    $token2 = $tokData2['token'] ?? null;

    if ($token2) {
        $payloadUpdate = json_encode([
            "kode_user" => [$kode_user, $awalBaru]
        ]);
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => 'http://117.103.68.238:8082/api_v1/index.php/Update_data',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $payloadUpdate,
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json',
                'Authorization: Bearer ' . $token2,
                'X-OAUTH-TOKEN: oauth-demo-token',
                'X-API-KEY: key789'
            ],
        ]);
        $respUpdate = curl_exec($curl);
        curl_close($curl);

        echo "Update_data response untuk $kode_user: $respUpdate<br>";
    } else {
        echo "Gagal generate token Update_data untuk $kode_user: $respToken2<br>";
    }

    // === 8. Kirim WhatsApp via MaxChat API ===
    $payloadWA = [
        "to" => $hp,
        "msgType" => "text",
        "templateId" => "6b4917fd-4f54-40e1-b34f-bf2995551e56",
        "values" => [
            "body" => [
                ["index" => 1, "type" => "text", "text" => $kode_user],
                ["index" => 2, "type" => "text", "text" => $paket],
                ["index" => 3, "type" => "text", "text" => $awal_fmt],
                ["index" => 4, "type" => "text", "text" => $akhir_fmt]
            ]
        ]
    ];
    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_URL => 'https://app.maxchat.id/api/messages/push',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => json_encode($payloadWA),
        CURLOPT_HTTPHEADER => [
            'Content-Type: application/json',
            'Authorization: Bearer j9dwest3x6s07ezeuo76e'
        ],
    ]);
    $waResponse = curl_exec($curl);
    curl_close($curl);

    echo "WA Response untuk $kode_user ($hp): $waResponse<br>";
}
?>
