<?php
include('../controller/controller_mysqli.php');

   $lain_lain_pending=$_POST['lain_lain_pending'];
   $status_wo_pending=$_POST['status_wo_pending'];
   $key_fal_pending=$_POST['key_fal_pending'];
   $pending='Pending';
   $pic_kendala=$_POST['pic_kendala'];
   

  if (!$koneksi) {
  die("Connection failed: " . mysqli_connect_error());
}

	$sql = "UPDATE tbl_fal SET status_wo='$status_wo_pending', lain_lain='$lain_lain_pending', pic_kendala='$pic_kendala', kategori_kendala='$pending' WHERE key_fal='$key_fal_pending'";


if (mysqli_query($koneksi, $sql)) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . mysqli_error($koneksi);
}
	
   

mysqli_close($koneksi);
  
  ?>	



