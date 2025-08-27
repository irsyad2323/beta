<?php
include('../controller/controller_mysqli.php');


  
   $kd_layanan=$_POST['kd_layanan'];
   $alamat_fal=$_POST['alamat_fal'];   
   $pic_ikr=$_POST['pic_ikr'];
   $lain_lain=$_POST['lain_lain'];
   $ket = $_POST ['ket'];   
    $latitude = strtok($ket, '#');
    $longitude = substr($ket, strpos($ket, '#')+1);
   
   
   
   
  
  if (!$koneksi) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO tbl_lain_lain (alamat_fal, lain_lain, kd_layanan, pic_ikr, ket, longitude, latitude, tanggal_wo) 
	   VALUES ('$alamat_fal','$lain_lain','$kd_layanan','$pic_ikr','$ket','$longitude','$latitude',CURRENT_TIMESTAMP())";


if (mysqli_query($koneksi, $sql)) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . mysqli_error($koneksi);
}

   

mysqli_close($koneksi);
  
  ?>	



