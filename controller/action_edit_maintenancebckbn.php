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
   $key_backbone=$_POST['key_backbone'];
   $lain_lain_backbone=$_POST['lain_lain_backbone'];
   $nama_backbone=$_POST['nama_backbone'];
   $pic_bckbn=$_POST['pic_bckbn'];
   $pic = strtok($pic_bckbn, '#');
    $status = substr($pic_bckbn, strpos($pic_bckbn, '#')+1);
	
   $pic_bckbn2=$_POST['pic_bckbn2'];
   $pic2 = strtok($pic_bckbn2, '#');
    $status2 = substr($pic_bckbn2, strpos($pic_bckbn2, '#')+1);
   $status_bckbn=$_POST['status_bckbn'];
   $bckbn = $_POST ['bckbn'];   
    $latitude = strtok($bckbn, '#');
    $longitude = substr($bckbn, strpos($bckbn, '#')+1);
   
  
  if (!$koneksi) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "UPDATE tbl_backbone SET nama_backbone='$nama_backbone', pic='$pic', pic2='$pic2', status='$status', status2='$status2',status_wo='$status_bckbn',ket='$bckbn', latitude='$latitude',longitude='$longitude',lain_lain_backbone='$lain_lain_backbone', tanggal_instalasi= CURRENT_TIMESTAMP() WHERE key_backbone='$key_backbone'";


if (mysqli_query($koneksi, $sql)) {
  echo "Record updated successfully";
  mysqli_query($koneksi,"UPDATE keluhan SET status = 'Solved', tanggal_handle = CURRENT_TIMESTAMP(), keterangan_solving = '$lain_lainodp' WHERE id_user = '$id_odp' and `status` = 'Visit'");
} else {
  echo "Error updating record: " . mysqli_error($koneksi);
}

   

mysqli_close($koneksi);
  
  ?>	



