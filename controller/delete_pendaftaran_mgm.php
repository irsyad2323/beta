<?php

// Create connection
include('../controller/controller_vps.php');
// Check connection
if (!$koneksi) {
  die("Connection failed: " . mysqli_connect_error());
}
	
$key_fal = $_POST['key_fal'];

// sql to delete a record
$sql = "update tb_mgm set status='d' where key_fal = '".$_POST['key_fal']."';";

if (mysqli_query($koneksi, $sql)) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . mysqli_error($koneksi);
}

mysqli_close($koneksi);
?>