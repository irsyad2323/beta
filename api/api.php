<?php
// URL API
$api_url = "https://dashboard.kaptennaratel.com/api/api.php";
$token = "f43e1b5fa7e8b9d3c919ab62e4c2d8f3e56319f5b57b62e5b3e3e0f682d7a9c1";

$data = [
    "jenis" => "kapten",
    "nama_lengkap" => "John Doe",
    "no_wa" => "081234567890",
    "no_wa2" => "1",
    "no_wa3" => "1",
    "no_wa4" => "1",
    "alamat" => "Jl. Merdeka No. 1",
    "rt" => "01",
    "rw" => "02",
    "provinsi" => "Jawa Timur",
    "kabupaten" => "Malang",
    "kecamatan" => "Klojen",
    "kelurahan" => "Oro-Oro Dowo",
    "patokan" => "Dekat pasar",
    "nik" => "1234567890123456",
    "foto_ktp" => "url_foto_ktp.jpg",
    "foto_rumah" => "url_foto_rumah.jpg",
    "foto_kk" => "url_foto_kk.jpg",
    "status_lokasi" => "verified",
    "paket_kapten" => "Silver",
    "tahu_layanan" => "Teman",
    "alasan" => "Kebutuhan Internet",
    "lain" => "2",
    "lokasi" => "Malang",
    "layanan" => "mlg",
    "latitude" => "-7.966620",
    "longitude" => "112.632632",
    "agen" => "Agen001",
    "layanan_digunakan" => "Streaming"
];

$curl = curl_init();

curl_setopt($curl, CURLOPT_URL, $api_url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
    'Authorization: Bearer ' . $token
]);
curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));

$response = curl_exec($curl);
curl_close($curl);

echo $response;
