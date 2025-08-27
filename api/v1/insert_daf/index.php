<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


header('Content-Type: application/json');

try {

    // Koneksi ke database
    $host = '117.103.69.22';
    $user = 'kocak';
    $pass = 'gaming';
    $db = 'billkapten';

    $conn = mysqli_connect($host, $user, $pass, $db);
    if (!$conn) {
        http_response_code(500);
        echo json_encode([
            'code' => 500,
            'status' => 'error',
            'message' => 'Koneksi database gagal'
        ]);
        exit();
    }

    function sendMessage($telegram_id, $message, $secret_token)
    {
        $method = "sendMessage";
        $url = "https://api.telegram.org/bot" . $secret_token . "/" . $method;
        $post = [
            'chat_id' => $telegram_id,
            'parse_mode' => 'HTML', // aktifkan ini jika ingin menggunakan format type HTML, bisa juga diganti menjadi Markdown
            'text' => $message
        ];

        $header = [
            "X-Requested-With: XMLHttpRequest",
            "User-Agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.84 Safari/537.36"
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        //curl_setopt($ch, CURLOPT_REFERER, $refer);
        //curl_setopt($ch, CURLOPT_VERBOSE, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $datas = curl_exec($ch);
        $error = curl_error($ch);
        $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
    }

    // Fungsi kompres gambar dan konversi ke base64
    function compressImageBase64($fileTmp)
    {
        if (!file_exists($fileTmp))
            return null;

        $info = getimagesize($fileTmp);
        if (!$info)
            return null;

        $mime = $info['mime'];
        switch ($mime) {
            case 'image/jpeg':
            case 'image/jpg':
                $image = imagecreatefromjpeg($fileTmp);
                break;
            case 'image/png':
                $image = imagecreatefrompng($fileTmp);
                break;
            case 'image/webp':
                if (function_exists('imagecreatefromwebp')) {
                    $image = imagecreatefromwebp($fileTmp);
                } else {
                    return null;
                }
                break;
            default:
                return null;
        }

        if (!$image)
            return null;

        ob_start();
        if (!imagejpeg($image, null, 60)) {
            ob_end_clean();
            imagedestroy($image);
            return null;
        }
        $data = ob_get_clean();
        imagedestroy($image);

        return 'data:image/jpeg;base64,' . base64_encode($data);
    }

    // Fungsi untuk handle gambar dari upload atau POST base64
    function handleImage($key)
    {
        if (isset($_FILES[$key]) && $_FILES[$key]['error'] === UPLOAD_ERR_OK) {
            return compressImageBase64($_FILES[$key]['tmp_name']);
        } elseif (!empty($_POST[$key])) {
            $value = $_POST[$key];
            if (strpos($value, 'data:image') === 0) {
                return $value;
            } else {
                return 'data:image/jpeg;base64,' . $value;
            }
        }
        return null;
    }

    // Ambil data dari $_POST
    $userid_app = (int) ($_POST['userid_app'] ?? 0);
    $chanel_bayar = (int) ($_POST['chanel_bayar'] ?? 0);
    $paket_kapten = (int) ($_POST['paket_kapten'] ?? 0);

    $payload = json_encode([
        "user_id" => $userid_app,
        "new_customer" => true,
        "payment_methods_id" => $chanel_bayar,
        "discount_id" => null,
        "is_subscription" => true,
        "list_items" => [
            [
                "product_id" => $paket_kapten,
                "quantity" => 1
            ]
        ]
    ]);

    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.dev.sparkpay.id/v1/orders/checkout',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => $payload,
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Bearer aria@theoutliers27'
        ),
    ));

    $response = curl_exec($curl);
    $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    $curlError = curl_error($curl);
    curl_close($curl);

    if ($curlError) {
        http_response_code(500);
        echo json_encode([
            'code' => 500,
            'status' => 'error',
            'message' => 'Curl error: ' . $curlError
        ]);
        exit();
    }

    if ($httpCode !== 200 && $httpCode !== 201) {
        http_response_code($httpCode);
        echo json_encode([
            'code' => $httpCode,
            'status' => 'error',
            'message' => 'API request failed',
            'response' => $response
        ]);
        exit();
    }

    $responseData = json_decode($response, true);
    if (!$responseData) {
        http_response_code(500);
        echo json_encode([
            'code' => 500,
            'status' => 'error',
            'message' => 'Invalid JSON response from API'
        ]);
        exit();
    }



    // Ambil kategori & ubah ke huruf kecil
    $status = isset($responseData['data']['kategori']) ? strtolower($responseData['data']['kategori']) : '';

    // Ambil name
    $input = isset($responseData['data']['name']) ? $responseData['data']['name'] : '';

    // Jika name == "Superstar", ubah jadi "neosuperstar"
    if (strtolower(trim($input)) == "superstar") {
        $input = "neosuperstar";
    }

    // Ambil angka sesuai aturan
    if ($status == "edu") {
        preg_match('/^(\d+(?:-\d+)?)/', $input, $matches);
    } else {
        preg_match('/^(\d+)/', $input, $matches);
    }

    // Ambil hasil angka
    $angka = $matches[1] ?? "";




    // Ambil data dari $_POST
//$userid_app          = $_POST['userid_app'] ?? '';
    $jenis = $status;
    $jns_pend = $_POST['jns_pend'] ?? '';
    $nama_lengkap = $_POST['nama_lengkap'] ?? '';
    $no_wa = $_POST['no_wa'] ?? '';
    $no_wa2 = $_POST['no_wa2'] ?? '';
    $no_wa3 = $_POST['no_wa3'] ?? '';
    $no_wa4 = $_POST['no_wa4'] ?? '';
    $alamat = $_POST['alamat'] ?? '';
    $rt = $_POST['rt'] ?? '';
    $rw = $_POST['rw'] ?? '';
    $provinsi = $_POST['provinsi'] ?? '';
    $kabupaten = $_POST['kabupaten'] ?? '';
    $kecamatan = $_POST['kecamatan'] ?? '';
    $kelurahan = $_POST['kelurahan'] ?? '';
    $patokan = $_POST['patokan'] ?? '';
    $nik = $_POST['nik'] ?? '';
    $status_lokasi = $_POST['status_lokasi'] ?? '';
    $paket = $angka;
    $tahu_layanan = $_POST['tahu_layanan'] ?? '';
    $alasan = $_POST['alasan'] ?? '';
    $lain = $_POST['lain'] ?? '';
    $lokasi = $_POST['lokasi'] ?? '';
    $layanan = $_POST['layanan'] ?? '';
    $longlat = $_POST['longlat'] ?? '';
    $agen = $_POST['agen'] ?? '';
    $kode_referral = $_POST['kode_referral'] ?? '';
    $layanan_sebelumnya = $_POST['layanan_sebelumnya'] ?? '';    
    $kode_promo = $_POST['kode_promo'] ?? '';

    // Ambil dan bersihkan JSON dari POST
    $raw = $_POST['add_on'] ?? '';

    // Bersihkan karakter kontrol tak terlihat
    $clean = trim($raw);
    $clean = preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $clean);

    // Decode JSON
    $decoded = json_decode($clean, true);

    // Tampilkan error jika JSON invalid
    if (json_last_error() !== JSON_ERROR_NONE) {
        echo "\n❌ JSON Decode Error: " . json_last_error_msg();
        echo "\n📌 Tips: Pastikan data dikirim menggunakan JSON.stringify() di frontend.";
        exit;
    }

  //  echo "\n🔹 Decoded JSON Array:\n";
   // print_r($decoded);

    // Filter hanya key yang bernilai true
    $add_on_array = [];
    foreach ($decoded as $key => $val) {
        if ($val === true || $val === 1 || $val === "true" || $val === "1") {
            $add_on_array[] = $key;
        }
    }

    //echo "\n✅ Final Filtered Array (true only):\n";
    //print_r($add_on_array);

    // Encode ke JSON string untuk disimpan ke database
    $add_on_for_db = json_encode($add_on_array);

    //echo "\n✅ Final JSON string to DB:\n";
    //echo $add_on_for_db;
    //echo "</pre>";

    //die();

    // Set jns_pend berdasarkan kode_referral
    if (!empty($kode_referral)) {
        $jns_pend = 'mgm';
    } else {
        $jns_pend = 'reguler';
    }
    $order_id = $responseData['data']['order_id'];

    if ($layanan == 'mlg') {
        $hasilkd_layanan = 'Kantor Naratel';
        $notif = '-972387056';
    } elseif ($layanan == 'batu') {
        $hasilkd_layanan = 'Kantor Jalibar';
        $notif = '-980552332';
    } elseif ($layanan == 'mlg1') {
        $hasilkd_layanan = 'Kantor Jalantra';
        $notif = '-892884758';
    } elseif ($layanan == 'pas') {
        $hasilkd_layanan = 'Kantor SBM';
        $notif = '-868426390';
    } elseif ($layanan == 'pas1') {
        $hasilkd_layanan = 'Kantor Balakosa';
        $notif = '-868426390';
    }

    // Ambil dan konversi foto ke base64
    $nm_ktp = handleImage('foto_ktp');
    $nm_rumah = handleImage('foto_rumah');
    $nm_kk = handleImage('foto_kk');

    // Validasi minimal
    if (!$nama_lengkap || !$no_wa || !$alamat) {
        http_response_code(400);
        echo json_encode([
            'code' => 400,
            'status' => 'error',
            'message' => 'Data tidak lengkap: nama_lengkap, no_wa, dan alamat wajib diisi'
        ]);
        exit();
    }

    // Query insert
    $query = "
INSERT INTO tb_daf (
    userid_app, jenis, jns_pend, nama_lengkap, no_wa, no_wa2, no_wa3, no_wa4,
    alamat, rt, rw, provinsi, kabupaten, kecamatan, kelurahan, patokan, nik,
    foto_ktp, foto_rumah, foto_kk, status_lokasi, paket_kapten,
    tahu_layanan, alasan, lain, lokasi, layanan,
    tanggal, tanggal2, longlat, agen, layanan_digunakan, chanel_bayar, order_id, kode_referral, add_one, kode_promo
) VALUES (
    ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,
    NOW(), NOW(), ?, ?, ?, ?, ?, ?, ?, ?
)";

    $stmt = mysqli_prepare($conn, $query);
    if (!$stmt) {
        http_response_code(500);
        echo json_encode([
            'code' => 500,
            'status' => 'error',
            'message' => 'Gagal mempersiapkan query',
            'error_detail' => mysqli_error($conn)
        ]);
        exit();
    }

    mysqli_stmt_bind_param(
        $stmt,
        'sssssssssssssssssssssssssssssssssss',
        $userid_app,
        $jenis,
        $jns_pend,
        $nama_lengkap,
        $no_wa,
        $no_wa2,
        $no_wa3,
        $no_wa4,
        $alamat,
        $rt,
        $rw,
        $provinsi,
        $kabupaten,
        $kecamatan,
        $kelurahan,
        $patokan,
        $nik,
        $nm_ktp,
        $nm_rumah,
        $nm_kk,
        $status_lokasi,
        $paket,
        $tahu_layanan,
        $alasan,
        $lain,
        $lokasi,
        $layanan,
        $longlat,
        $agen,
        $layanan_sebelumnya,
        $chanel_bayar,
        $order_id,
        $kode_referral,
        $add_on_for_db,
        $kode_promo
    );

    if (mysqli_stmt_execute($stmt)) {
        // Get kabupaten name for notification
        $hasilkab = $kabupaten;

        // Get type from paket for notification
        $type = $paket;

        // Send Telegram notification
        $telegram_id = $notif;
        $message = '📩 DATA CALON PELANGGAN ' . $hasilkd_layanan . ' 📩 

<b>✔️ Agen</b>
' . '💬 ' . $agen . '

<b>✔️ Nama Lengkap</b>
' . '💬 ' . $nama_lengkap . '

<b>✔️ Alamat</b>
' . '💬 ' . $alamat . '

<b>✔️ No Whatsapp</b>
' . '💬 ' . $no_wa . '

<b>✔️ Kabupaten</b>
' . '💬 ' . $hasilkab . '

<b>✔️ Paket</b>
' . '💬 ' . $type . ' Mbps';

        $secret_token = '6825285032:AAGJhJGJhJGJhJGJhJGJhJGJhJGJhJGJhJG'; // Ganti dengan token bot Telegram yang sebenarnya
        //sendMessage($telegram_id, $message, $secret_token);

        // Send notification API
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.dev.sparkpay.id/v1/notifications/send',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'user_id' => $userid_app,
                'categori_id' => '1',
                'channel_id' => '3',
                'template_id' => '10',
                'data' => '{
    "customer_name" : "' . $nama_lengkap . '",
    "customer_alamat" : "' . $alamat . '"
}',
                'in_app' => 'true',
                'data_deeplink' => '{
  "conversation_id": "1"
}'
            ),
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer aria@theoutliers27'
            ),
        ));

        $api_response = curl_exec($curl);
        curl_close($curl);
        // print_r($api_response);


        echo json_encode([
            'code' => 200,
            'status' => 'success',
            'message' => 'Data berhasil disimpan',
            'data' => [
                'id' => mysqli_insert_id($conn),
                'nama_lengkap' => $nama_lengkap,
                'no_wa' => $no_wa,
                'paket' => $paket
            ]
        ]);
    } else {
        http_response_code(500);
        echo json_encode([
            'code' => 500,
            'status' => 'error',
            'message' => 'Gagal menyimpan data',
            'error_detail' => mysqli_stmt_error($stmt)
        ]);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);

} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'code' => 500,
        'status' => 'error',
        'message' => 'Terjadi kesalahan: ' . $e->getMessage()
    ]);
}