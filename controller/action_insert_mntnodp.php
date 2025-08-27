<?php
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
  $nama_fal_s= $_POST['nama_fal'];
   function clean($string){
		$string = str_replace(' ', ' ', $string); // Replaces all spaces with hyphens.
		return preg_replace('/[^A-Za-z0-9\-]/', ' ', $string); // Removes special chars.
	}
	
   $nama_fal = clean($nama_fal_s);
   $kd_layanan=$_POST['kd_layanan'];
   $alamat_fal=$_POST['alamat_fal'];
   $kelurahan = $_POST['kelurahan'];
   $pic_ikr=$_POST['pic_ikr'];
   $tlp_fal=$_POST['tlp_fal'];   
   $jenis_pekerjaan=$_POST['jenis_pekerjaan'];
   $produk=$_POST['produk'];
   $username_Maintenance=$_POST['username_Maintenance'];
   $lain_lain=$_POST['lain_lain'];
   
   if( $kd_layanan == 'mlg'){
	$token = '93XWKl9OGzGuWOftO0ZgOoVOFNEnvjCMz9qI1xZZ6soficXpDjrH3ll1X6obmVIL';
	}elseif( $kd_layanan == 'pas'){
	$token = 'nRtLakewmjAWhnxzVO2kjHavvAhL14Bgl7zScUijsDtMsPVce4dzAIdIn2tHYyge';
	}elseif( $kd_layanan == 'batu'){
	$token = 'OKguQvywltMerXQkValMCeR29rzmo897aEAivh7yP0GbVbIy37jaJBfehSWpCYRM';
	}elseif( $kd_layanan == 'mlg1'){
	$token = 'GLba17FEXQE52RiiU1Yuo2LXT1rzf8YReNYJz2jsCp5H9q8x6XGu8xh7pQT7Sv7k';
	}
	
	if($pic_ikr == "fio") {
		$no_blast = '089671467187';
		//$no_blast = '082228550709';
	}elseif($pic_ikr == "ricky") {
		$no_blast = '089683845842';
	}elseif($pic_ikr == "rafif") {
		$no_blast = '081553428726';
	}elseif($pic_ikr == "sonny") {
		$no_blast = '089523791209';
	}elseif($pic_ikr == "rozak") {
		$no_blast = '089627201994';
	}elseif($pic_ikr == "wawan") {
		$no_blast = '082257293851';
	}elseif($pic_ikr == "decky") {
		$no_blast = '082233541828';
	}elseif($pic_ikr == "saiin") {
		$no_blast = '081326594474';
	}elseif($pic_ikr == "siswanto") {
		$no_blast = '0895331297402';
	}elseif($pic_ikr == "amin") {
		$no_blast = '0895337237228';
	}elseif($pic_ikr == "heri") {
		$no_blast = '081235372888';
	}elseif($pic_ikr == "lukman") {
		$no_blast = '6282257876093';
	}elseif($pic_ikr == "wahyudi") {
		$no_blast = '6289699654803';
	}elseif($pic_ikr == "ahnaf") {
		$no_blast = '62858151324789';
	}elseif($pic_ikr == "majid") {
		$no_blast = '6281385766281';
	}elseif($pic_ikr == "bayu") {
		$no_blast = '6281359042213';
	}elseif($pic_ikr == "yusuf") {
		$no_blast = '6285733254225';
	}
   
  
  if (!$koneksi) {
  die("Connection failed: " . mysqli_connect_error());
}

//$sql = "INSERT INTO tbl_maintenance (nama_fal, alamat_fal, tlp_fal, username_fal, lain_lain, kd_layanan, pic_ikr, kelurahan, jenis_wo, produk, username_Maintenance, tgl_date_time) VALUES ('$nama_fal','$alamat_fal','$tlp_fal',CURRENT_TIMESTAMP(),'$lain_lain','$kd_layanan','$pic_ikr','$kelurahan','MAINTENANCE','$produk','$username_Maintenance',CURRENT_TIMESTAMP())";
$sql = "INSERT INTO tbl_maintenance_odp (nama_fal, username_fal, tgl_sign, lain_lain, kd_layanan, pic_ikr, kelurahan, jenis_wo, produk, id_odp, kategori_maintenance) 
VALUES ('$nama_fal',CURRENT_TIMESTAMP(), CURRENT_TIMESTAMP(),'$lain_lain','$kd_layanan','$pic_ikr','$kelurahan','MAINTENANCE_ODP','$produk','$username_Maintenance','Maintenance ODP')";


if (mysqli_query($koneksi, $sql)) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . mysqli_error($koneksi);
}

   

mysqli_close($koneksi);
  
  ?>	



