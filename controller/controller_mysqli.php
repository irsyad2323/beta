<?php 
$host       = "117.103.69.22";
$user       = "kocak";
$password   = "gaming";
$database   = "billkapten";
$koneksi    = mysqli_connect($host, $user, $password, $database);
$conn = new PDO("mysql:host=117.103.69.22;dbname=billkapten", "kocak", "gaming");

$host       = "117.103.69.22";
$user       = "kocak";
$password   = "gaming";
$database   = "billkapten";
$koneksi_daf  = mysqli_connect($host, $user, $password, $database);

// Koneksi ke database
$servername = "117.103.69.22";
$username = "kocak";
$password = "gaming";
$dbname = "billkapten";

$conn_new = new mysqli($servername, $username, $password, $dbname);
?>