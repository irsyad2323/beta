<?php
include('../controller/controller_mysqli.php');

   $nama=$_POST['nama'];
   $produk=$_POST['produk'];
   $kd_layanan=$_POST['kd_layanan'];
   $pic_ikr=$_POST['pic_ikr'];
   $alamat=$_POST['alamat'];
   $lain_lain=$_POST['lain_lain'];
   
  
  if (!$koneksi) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO tbl_lain_lain (nama, tanggal_wo, produk, kd_layanan, pic_ikr, alamat_fal, lain_lain, status_wo) 
	   VALUES ('$nama',CURRENT_TIMESTAMP(),'$produk','$kd_layanan','$pic_ikr','$alamat','$lain_lain','belum');";


if (mysqli_query($koneksi, $sql)) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . mysqli_error($koneksi);
}

   

mysqli_close($koneksi);
  
  ?>	



