<?php
include('../controller/controller_mysqli.php');

   $key_fal=$_POST['key_fal'];
   $jenis_pekerjaan2=$_POST['jenis_pekerjaan2'];
   $pic_ikr2=$_POST['pic_ikr2'];
   $lain_lain2=$_POST['lain_lain2'];   
   
  
  if (!$koneksi) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "UPDATE tbl_maintenance_odp SET jenis_pekerjaan='$jenis_pekerjaan2', pic_ikr='$pic_ikr2', lain_lain='$lain_lain2' WHERE key_fal='$key_fal';";


if (mysqli_query($koneksi, $sql)) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . mysqli_error($koneksi);
}

   

mysqli_close($koneksi);
  
  ?>	



