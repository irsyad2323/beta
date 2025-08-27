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
  $nama_odp1= $_POST['nama_odp'];
   function clean($string){
		$string = str_replace(' ', ' ', $string); // Replaces all spaces with hyphens.
		return preg_replace('/[^A-Za-z0-9\-]/', ' ', $string); // Removes special chars.
	}
	
   $nama_odpclean = clean($nama_odp1);  
   $key_odp=$_POST['key_odp'];
   $status_distribusi=$_POST['status_distribusi'];
	$pic = strtok($status_distribusi, '#');
	$status = substr($status_distribusi, strpos($status_distribusi, '#')+1);
   $status_distribusi2=$_POST['status_distribusi2'];
	$pic2 = strtok($status_distribusi2, '#');
	$status2 = substr($status_distribusi2, strpos($status_distribusi2, '#')+1);
   $jenis_kabel_distribusi=$_POST['jenis_kabel_distribusi'];
   $kabel_distribusi=$_POST['kabel_distribusi'];  
   $keterangan_distribusi=$_POST['keterangan_distribusi'];
   $status_wo_distribusi=$_POST['status_wo_distribusi'];
   $lain_lain=$_POST['lain_lain'];
   $letak_odp=$_POST['letak_odp'];
   $get_distribusi = $_POST ['get_distribusi'];
   $status_wo = $_POST ['status_wo'];
   $ket = $_POST ['get_distribusi'];   
    $latitude = strtok($get_distribusi, '#');
    $longitude = substr($get_distribusi, strpos($get_distribusi, '#')+1);
   
  
  if (!$koneksi) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "UPDATE tbl_distribusi SET nama_odp='$nama_odpclean', pic='$pic' ,pic2='$pic2',status='$status', status2='$status2',latitude='$latitude',longitude='$longitude',ket='$get_distribusi', tanggal_instalasi= CURRENT_TIMESTAMP(), lain_lain='$keterangan_distribusi', kabel1='$kabel_distribusi',jenis_kabel='$jenis_kabel_distribusi', status_wo='$status_wo_distribusi' WHERE key_odp='$key_odp'";


if (mysqli_query($koneksi, $sql)) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . mysqli_error($koneksi);
}

   

mysqli_close($koneksi);
  
  ?>	



