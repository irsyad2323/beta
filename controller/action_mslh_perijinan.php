<?php
include('../controller/controller_mysqli.php');

   $lain_lain_perijinan=$_POST['lain_lain_perijinan'];
   $status_wo=$_POST['status_wo'];
   $key_fal=$_POST['key_fal'];
   $pending=$_POST['pending'];
   $pic_kendala=$_POST['pic_kendala'];
   

  if (!$koneksi) {
  die("Connection failed: " . mysqli_connect_error());
}

	$sql = "UPDATE tbl_fal SET status_wo='$status_wo', lain_lain='$lain_lain_perijinan', pic_kendala='$pic_kendala', kategori_kendala='$pending' WHERE key_fal='$key_fal'";


if (mysqli_query($koneksi, $sql)) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . mysqli_error($koneksi);
}
	
   

mysqli_close($koneksi);
  
  ?>	



