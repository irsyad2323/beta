<?php
session_start();
include('../controller/controller_mysqli.php');

// Ambil data dari POST
$jenis_pekerjaan_ins_odp = $_POST['jenis_pekerjaan_dis'];
$odp = $_POST['odp_induk'];
$nama_odp = $_POST['nama_dis'];
$alamat_odp = $_POST['alamat_dis'];
$lain_lain_odp = $_POST['lain_lain_dis'];
$date_wo = $_POST['date_wo'];
$kd_layanan2 = $_POST['kd_layanan2']; // Ambil kd_layanan2 yang dikirim

// Ubah format tanggal
$tgl = date('Y-m-d H:i:s', strtotime($date_wo));
$time = date('H:i:s', strtotime($date_wo));

// Pakai kd_layanan2 yang dikirim
$kd_layanan = $kd_layanan2;

// Optional: tentukan token berdasarkan layanan (kalau mau dipakai)
$token = "";
switch ($kd_layanan) {
    case 'mlg':
        $token = '93XWKl9OGzGuWOftO0ZgOoVOFNEnvjCMz9qI1xZZ6soficXpDjrH3ll1X6obmVIL';
        break;
    case 'pas':
        $token = 'nRtLakewmjAWhnxzVO2kjHavvAhL14Bgl7zScUijsDtMsPVce4dzAIdIn2tHYyge';
        break;
    case 'batu':
        $token = 'OKguQvywltMerXQkValMCeR29rzmo897aEAivh7yP0GbVbIy37jaJBfehSWpCYRM';
        break;
    case 'mlg1':
        $token = 'GLba17FEXQE52RiiU1Yuo2LXT1rzf8YReNYJz2jsCp5H9q8x6XGu8xh7pQT7Sv7k';
        break;
}

// Mulai transaksi
mysqli_autocommit($koneksi, FALSE);

// Query insert ke tbl_distribusi
$query1 = mysqli_query($koneksi, "INSERT INTO tbl_distribusi 
    (odp_induk, nama_odp, tgl_sign, alamat_odp, lain_lain, kd_layanan, produk) 
    VALUES 
    ('$odp', '$nama_odp', '$tgl', '$alamat_odp', '$lain_lain_odp', '$kd_layanan', 'Kapten Naratel');");

if (!$query1) {
    echo 'Error';
    mysqli_rollback($koneksi);
} else {
    if (!mysqli_commit($koneksi)) {
        echo 'Error2';
        mysqli_rollback($koneksi);
    } else {
        echo '1'; // Sukses
    }
}

// Tutup koneksi
mysqli_close($koneksi);
?>
