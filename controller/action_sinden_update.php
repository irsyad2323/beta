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
  $nama_sinden1= $_POST['nama_sinden'];
   function clean($string){
		$string = str_replace(' ', ' ', $string); // Replaces all spaces with hyphens.
		return preg_replace('/[^A-Za-z0-9\-]/', ' ', $string); // Removes special chars.
	}
	
   $nama_sinden = clean($nama_sinden1);  
   $username_sinden=$_POST['username_sinden'];
   $pic_sinden=$_POST['pic_sinden'];
   $pic_sinden2=$_POST['pic_sinden2'];
   $modem_sinden=$_POST['modem_sinden'];
   $kabel_sinden=$_POST['kabel_sinden'];
   $status_sinden = $_POST ['status_sinden'];
   $get_lokasi = $_POST ['get_lokasi'];   
    $latitude = strtok($get_lokasi, '#');
    $longitude = substr($get_lokasi, strpos($get_lokasi, '#')+1);
   
  
  if (!$koneksi) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "UPDATE tbl_fal SET nama_fal='$nama_sinden', pic='$pic_sinden', pic2='$pic_sinden2',modem='$modem_sinden',kabel1='$kabel_sinden',status_wo='$status_sinden',ket='$get_lokasi', latitude='$latitude',longitude='$longitude', tanggal_instalasi= CURRENT_TIMESTAMP() WHERE username_fal='$username_sinden'";


if (mysqli_query($koneksi, $sql)) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . mysqli_error($koneksi);
}

   

mysqli_close($koneksi);
  
  ?>	



