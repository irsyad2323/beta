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
  $nama_corporate1= $_POST['nama_corporate'];
   function clean($string){
		$string = str_replace(' ', ' ', $string); // Replaces all spaces with hyphens.
		return preg_replace('/[^A-Za-z0-9\-]/', ' ', $string); // Removes special chars.
	}
	
   $nama = clean($nama_corporate1);  
   $username_corporate=$_POST['username_corporate'];
   $pic_corporate=$_POST['pic_corporate'];
    $pic = strtok($pic_corporate, '#');
    $status = substr($pic_corporate, strpos($pic_corporate, '#')+1);
	
   $pic_corporate2=$_POST['pic_corporate2'];
   $pic2 = strtok($pic_corporate2, '#');
    $status2 = substr($pic_corporate2, strpos($pic_corporate2, '#')+1);
   $modem_corporate=$_POST['modem_corporate'];
   $total_modem=$_POST['total_modem'];
   $pembayaran_corporate=$_POST['pembayaran_corporate'];
   $kabel_corporate=$_POST['kabel_corporate'];
   $status_corporate = $_POST ['status_corporate'];
   $stor = $_POST ['stor'];
   $get_corporate = $_POST ['get_corporate'];   
    $latitude = strtok($get_corporate, '#');
    $longitude = substr($get_corporate, strpos($get_corporate, '#')+1);
   
  
  if (!$koneksi) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "UPDATE tbl_fal_correctiv SET nama_fal='$nama', pic='$pic', pic2='$pic2',status='$status', status2='$status2',modem='$modem_corporate', total_modem='$total_modem',kabel1='$kabel_corporate',pembayaran='$pembayaran_corporate',status_wo='$status_corporate',ket='$get_corporate', stor='$stor',longitude='$longitude', latitude='$latitude',longitude='$longitude', tanggal_instalasi= CURRENT_TIMESTAMP() WHERE username_fal='$username_corporate'";


if (mysqli_query($koneksi, $sql)) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . mysqli_error($koneksi);
}

   

mysqli_close($koneksi);
  
  ?>	



