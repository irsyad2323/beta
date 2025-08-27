<?php
session_start();
//$user = $_SESSION["username"];
//echo $user; die();
include('../controller/controller_mysqli.php');

   $lain_lain_perijinan=$_POST['lain_lain_perijinan'];
   $status_wo=$_POST['status_wo'];
   $key_fal=$_POST['key_fal'];
   

  if (!$koneksi) {
  die("Connection failed: " . mysqli_connect_error());
}

	$sql = "UPDATE tbl_fal SET status_wo='$status_wo', lain_lain='$lain_lain_perijinan', pic_kendala='".$_SESSION["username"]."', kategori_kendala='$pending', tgl_solved_kendala = CURRENT_TIMESTAMP() WHERE key_fal='$key_fal'";


if (mysqli_query($koneksi, $sql)) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . mysqli_error($koneksi);
}
	
   

mysqli_close($koneksi);
  
  ?>	



