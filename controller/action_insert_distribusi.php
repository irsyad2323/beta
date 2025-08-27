<?php
session_start();
$kota = $_SESSION["level_kantor"];
include('../controller/controller_mysqli.php');
/*   if (isset($_POST['username_sinden'])){
	  $nama_sinden = $_POST['nama_sinden'];
	  $alamat_sinden = $_POST['alamat_sinden'];
	  $tlp_sinden = $_POST['tlp_sinden'];
	  $paket_sinden = $_POST['paket_sinden'];
	  $tanggal_sinden = $_POST['tanggal_sinden'];
	  $username_sinden = $_POST['username_sinden'];
	  
	  $result = mysqli_query($koneksi,"UPDATE tbl_fal SET nama_fal='$nama_sinden', alamat_fal='$alamat_sinden', tgl_fal='$tanggal_sinden',tlp_fal='$tlp_sinden',paket_fal='$paket_sinden' WHERE username_fal='$username_sinden'");
	  if($result){
		  return 'data update'
	}
  } */
  $nama_odp1= $_POST['nama_odp'];
   function clean($string){
		$string = str_replace(' ', ' ', $string); // Replaces all spaces with hyphens.
		return preg_replace('/[^A-Za-z0-9\-]/', ' ', $string); // Removes special chars.
	}
	
   $nama_odpclean2 = clean($nama_odp1);  
   //$kd_layanan=$_POST['kd_layanan'];
   $alamat_odp=$_POST['alamat_odp'];
   $kelurahan=$_POST['kelurahan'];
   $pic_ikr=$_POST['pic_ikr'];     
   $status=$_POST['status'];
   $pic = strtok($status, '#');
    $status = substr($status, strpos($status, '#')+1);

    $status2=$_POST['status2'];
   $pic2 = strtok($status2, '#');
    $status2 = substr($status2, strpos($status2, '#')+1);   
   $kabel1=$_POST['kabel1'];
   $jenis_kabel=$_POST['jenis_kabel'];
   $odp_induk=$_POST['odp_induk'];   
   $lain_lain=$_POST['lain_lain'];
   $status_wo=$_POST['status_wo'];

  
    $get_lokasi = $_POST ['get_lokasi'];
    $latitude = strtok($get_lokasi, '#');
    $longitude = substr($get_lokasi, strpos($get_lokasi, '#')+1);
   
  
  if (!$koneksi) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO tbl_distribusi (odp_induk ,nama_odp, alamat_odp, lain_lain, kd_layanan, pic_ikr, kelurahan, pic, pic2, status, status2, ket,latitude,longitude, tanggal_instalasi, kabel1, jenis_kabel, status_wo) 
VALUES ('$odp_induk[0]','$nama_odpclean2','$alamat_odp', '$lain_lain', '$kota','$pic_ikr',  '$kelurahan', '$pic','$pic2', '$status', '$status2', '$get_lokasi', '$latitude','$longitude',CURRENT_TIMESTAMP(), '$kabel1','$jenis_kabel','$status_wo');";


if (mysqli_query($koneksi, $sql)) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . mysqli_error($koneksi);
}

   

mysqli_close($koneksi);
  
  ?>	



