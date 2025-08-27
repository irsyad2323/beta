<?php
$servername = "117.103.69.22";
$username = "kocak";  // ganti dengan username database Anda
$password = "gaming";      // ganti dengan password database Anda
$dbname = "billkapten";  // ganti dengan nama database Anda

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
  die("Koneksi gagal: " . $conn->connect_error);
}

// Mengambil data dari tabel locations
$sql = "SELECT nama_odp, id_odp, longitude, latitude, kd_layanan FROM tbl_odp";
$result = $conn->query($sql);

$locations = array();

if ($result->num_rows > 0) {
  // Output data setiap baris
  while($row = $result->fetch_assoc()) {
    $locations[] = $row;
  }
}

// Mengembalikan data dalam format JSON
echo json_encode($locations);

$conn->close();
?>
