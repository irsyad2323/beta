<?php
include('../controller/controller_mysqli.php');

  
   $id=$_POST['id'];
   $status=$_POST['status'];
   $cabang=$_POST['cabang'];
   
  
  if (!$koneksi) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "UPDATE tb_kelurahan SET status='$status', kd_layanan='$cabang'  WHERE id='$id'";


if (mysqli_query($koneksi, $sql)) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . mysqli_error($koneksi);
}

   

mysqli_close($koneksi);
  
  ?>	



