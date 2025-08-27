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
   $key_odp=$_POST['key_odp'];
   //echo ($username_sinden); die();
   $id_odp=$_POST['id_odp'];
   $pic_sinden=$_POST['pic_sinden'];
   $pic = strtok($pic_sinden, '#');
    $status = substr($pic_sinden, strpos($pic_sinden, '#')+1);
	
   $pic_sinden2=$_POST['pic_sinden2'];
   $pic2 = strtok($pic_sinden2, '#');
    $status2 = substr($pic_sinden2, strpos($pic_sinden2, '#')+1);
   $modem_sinden=$_POST['modem_sinden'];
   $lain_lainodp=$_POST['lain_lainodp'];
   $spltr=$_POST['spltr'];
   $spltr2=$_POST['spltr2'];
   $spltr3=$_POST['spltr3'];
   $kabel_sinden=$_POST['kabel_sinden'];
   $status_sinden = $_POST ['status_sinden'];
   $get_lokasi = $_POST ['get_lokasi'];   
    $latitude = strtok($get_lokasi, '#');
    $longitude = substr($get_lokasi, strpos($get_lokasi, '#')+1);
   
  
  if (!$koneksi) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "UPDATE tbl_maintenance_odp SET nama_fal='$nama_sinden', pic='$pic', pic2='$pic2', status='$status', status2='$status2',modem='$modem_sinden',kabel1='$kabel_sinden',kategori_maintenance='Maintenance ODP',status_wo='$status_sinden',spliter='$spltr',spliter2='$spltr2',spliter3='$spltr3',ket='$get_lokasi', latitude='$latitude',longitude='$longitude',ket_teknisi='$lain_lainodp', tanggal_instalasi= CURRENT_TIMESTAMP(), tgl_solved= CURRENT_TIMESTAMP() WHERE key_fal='$key_odp'";


if (mysqli_query($koneksi, $sql)) {
  echo "Record updated successfully";
  mysqli_query($koneksi,"UPDATE keluhan SET status = 'Solved', tanggal_handle = CURRENT_TIMESTAMP(), keterangan_solving = '$lain_lainodp' WHERE id_user = '$id_odp' and `status` = 'Visit'");
} else {
  echo "Error updating record: " . mysqli_error($koneksi);
}

   

mysqli_close($koneksi);
  
  ?>	



