<?php 
$host       = "117.103.69.22";
$user       = "kocak";
$password   = "gaming";
$database   = "db_pendaftaran_kapten";
$koneksi    = mysqli_connect($host, $user, $password, $database);

if (!$koneksi) {
  die("Connection failed: " . mysqli_connect_error());
}

?>