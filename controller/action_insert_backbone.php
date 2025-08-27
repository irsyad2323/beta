<?php
include('../controller/controller_mysqli.php');

   $nama_backbone=$_POST['nama_backbone'];
   $produk_backbone=$_POST['produk_backbone'];
   $kd_layanan_backbone=$_POST['kd_layanan_backbone'];
   $pic_ikr_backbone=$_POST['pic_ikr_backbone'];
   $alamat_fal_backbone=$_POST['alamat_fal_backbone'];
   $lain_lain_backbone=$_POST['lain_lain_backbone'];
   
  
  if (!$koneksi) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO tbl_backbone (nama_backbone, tanggal, produk_backbone, kd_layanan_backbone, pic_ikr_backbone, alamat_fal_backbone, lain_lain_backbone) 
	   VALUES ('$nama_backbone',CURRENT_TIMESTAMP(),'$produk_backbone','$kd_layanan_backbone','$pic_ikr_backbone','$alamat_fal_backbone','$lain_lain_backbone');";


if (mysqli_query($koneksi, $sql)) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . mysqli_error($koneksi);
}

   

mysqli_close($koneksi);
  
  ?>	



