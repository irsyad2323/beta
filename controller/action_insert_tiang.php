<?php
include('../controller/controller_mysqli.php');

// Ambil semua data dari POST
$nama_fal_s = $_POST['nama_tiang'];

function clean($string)
{
  $string = str_replace(' ', ' ', $string); // Replaces all spaces with hyphens.
  return preg_replace('/[^A-Za-z0-9\-]/', ' ', $string); // Removes special chars.
}

$nama_tiang = clean($nama_fal_s);
$kd_layanan = $_POST['kd_layanan'];
$alamat = $_POST['alamat'];
$alamatt = str_replace(["'", ','], '', $alamat);
$rt = $_POST['rt'];
$rw = $_POST['rw'];
$kelurahan = $_POST['kelurahan'];
$kecamatan = $_POST['kecamatan'];
$provinsi = $_POST['provinsi'];
$kabkota = $_POST['kabupaten'];
$pic_vendor = $_POST['pic_vendor'];
$id_tiang = $_POST['id_tiang'];
$keterangan = $_POST['keterangan'];
$status = $_POST['status'];
$jenis_tiang = $_POST['jenis_tiang'];
$latitude = isset($_POST['latitude']) ? $_POST['latitude'] : '';
$longitude = isset($_POST['longitude']) ? $_POST['longitude'] : '';

if (!$koneksi) {
  die("Connection failed: " . mysqli_connect_error());
}

// SQL Insert
$sql = "INSERT INTO tbl_instalasi_tiang (
            nama_tiang, jenis_tiang, id_tiang, alamat, keterangan, kd_layanan, pic_vendor,
            kelurahan, kecamatan, kabkota, provinsi, rt, rw, ket, latitude, longitude,
            tanggal_instalasi, status
        ) VALUES (
            '$nama_tiang', '$jenis_tiang', '$id_tiang', '$alamatt', '$keterangan', '$kd_layanan', '$pic_vendor',
            '$kelurahan', '$kecamatan', '$kabkota', '{$provinsi[0]}', '$rt', '$rw', '', '$latitude', '$longitude',
            CURRENT_TIMESTAMP(), 'Belum Dikerjakan'
        )";

if (mysqli_query($koneksi, $sql)) {
  echo "Record inserted successfully";
} else {
  echo "Error inserting record: " . mysqli_error($koneksi);
}

mysqli_close($koneksi);
