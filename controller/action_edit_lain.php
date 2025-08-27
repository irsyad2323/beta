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
  $nama_backbone1= $_POST['nama_backbone'];
   function clean($string){
		$string = str_replace(' ', ' ', $string); // Replaces all spaces with hyphens.
		return preg_replace('/[^A-Za-z0-9\-]/', ' ', $string); // Removes special chars.
	}
	
   $nama_backbone = clean($nama_backbone1);  
   $key_fal=$_POST['key_fal'];
   $lain_lain=$_POST['lain_lain'];
   $nama=$_POST['nama'];
   $pic_lain=$_POST['pic_lain'];
   $pic = strtok($pic_lain, '#');
    $status = substr($pic_lain, strpos($pic_lain, '#')+1);
	
   $pic_lain2=$_POST['pic_lain2'];
   $pic2 = strtok($pic_lain2, '#');
    $status2 = substr($pic_lain2, strpos($pic_lain2, '#')+1);
   $status_wo=$_POST['status_wo'];
   $loklain = $_POST ['loklain'];   
    $latitude = strtok($loklain, '#');
    $longitude = substr($loklain, strpos($loklain, '#')+1);
   
  
  if (!$koneksi) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "UPDATE tbl_lain_lain SET nama='$nama', pic='$pic', pic2='$pic2', status='$status', status2='$status2',status_wo='$status_wo',ket='$loklain', latitude='$latitude',longitude='$longitude',lain_lain='$lain_lain', tanggal_instalasi= CURRENT_TIMESTAMP() WHERE key_fal='$key_fal'";


if (mysqli_query($koneksi, $sql)) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . mysqli_error($koneksi);
}

   

mysqli_close($koneksi);
  
  ?>	



