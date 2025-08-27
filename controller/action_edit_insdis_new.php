<?php
include('../controller/controller_mysqli.php');

// Pastikan menerima data dari POST
$nama_sinden1 = $_POST['nama_ins_dis'];

function clean($string)
{
  $string = str_replace(' ', ' ', $string); // Replaces all spaces with hyphens.
  return preg_replace('/[^A-Za-z0-9\-]/', ' ', $string); // Removes special chars.
}

$nama_ins_dis = clean($nama_sinden1);
$key_odp_ins = $_POST['key_odp_ins_dis'];
$pic_ins_dis = $_POST['pic_ins_dis'];
$pic = strtok($pic_ins_dis, '#');
$status = substr($pic_ins_dis, strpos($pic_ins_dis, '#') + 1);

$pic_ins_dis2 = $_POST['pic_ins_dis2'];
$pic2 = strtok($pic_ins_dis2, '#');
$status2 = substr($pic_ins_dis2, strpos($pic_ins_dis2, '#') + 1);

$jenis_kabel_dis = $_POST['jenis_kabel_dis'];
$kabel_ins_dis = $_POST['kabel_ins_dis'];
$lain_lain_insdis = $_POST['lain_lain_insdis'];
$status_ins_dis = $_POST['status_ins_dis'];
$status_sinden = $_POST['status_ins_odp'];
$latitude = $_POST['latitude']; 
$longitude = $_POST['longitude'];

// Validasi koneksi ke database
if (!$koneksi) {
  die("Connection failed: " . mysqli_connect_error());
}

// Melakukan sanitasi pada input latitude dan longitude
$latitude = mysqli_real_escape_string($koneksi, $latitude);
$longitude = mysqli_real_escape_string($koneksi, $longitude);

// Query untuk update data ke dalam database
$sql = "UPDATE tbl_distribusi 
          SET pic='$pic', pic2='$pic2', status='$status', status2='$status2', 
              kabel1='$kabel_ins_dis', status_wo='$status_ins_dis', jenis_kabel='$jenis_kabel_dis', 
              ket='$get_lokasi', latitude='$latitude', longitude='$longitude', 
              lain_lain='$lain_lain_insdis', tanggal_instalasi= CURRENT_TIMESTAMP(), 
              tgl_solved= CURRENT_TIMESTAMP() 
          WHERE key_odp='$key_odp_ins';";

// Eksekusi query
if (mysqli_query($koneksi, $sql)) {
  echo "1";  // Berhasil
} else {
  echo "101";  // Error, query gagal
}

// Menutup koneksi database
mysqli_close($koneksi);
?>
