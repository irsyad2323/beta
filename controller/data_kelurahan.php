<?php 
// Sambungkan ke database
include('controller_mysqli.php');

// Query untuk mendapatkan data kelurahan
$sql_user = mysqli_query($koneksi, "SELECT a.kd_kel, a.kd_kec, a.kd_kabkota, b.nama_provinsi, c.nama_kabkota, d.nama_kec, a.nama_kel 
                                    FROM tb_kelurahan a
                                    LEFT JOIN tb_provinsi b ON a.kd_prov = b.kd_provinsi
                                    LEFT JOIN tb_kabkota c ON a.kd_kabkota = c.kd_kabkota
                                    LEFT JOIN tb_kecamatan d ON a.kd_kec = d.kd_kec
                                    WHERE a.status='y'");

$response = [];

// Ambil data dan susun sebagai array JSON
while ($data_user = mysqli_fetch_array($sql_user)) {
    $response[] = [
        'value' => "https://example.com/api/kelurahan?kd_kel=".$data_user['kd_kel'],
        'text'  => $data_user['nama_kel'].', '.$data_user['nama_kec'].', '.$data_user['nama_kabkota'].', '.$data_user['nama_provinsi']
    ];
}

// Mengirimkan respons JSON
header('Content-Type: application/json');
echo json_encode($response);
