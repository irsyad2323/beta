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
  $nama_mnt_bckbone1= $_POST['nama_mnt_bckbone'];
   function clean($string){
		$string = str_replace(' ', ' ', $string); // Replaces all spaces with hyphens.
		return preg_replace('/[^A-Za-z0-9\-]/', ' ', $string); // Removes special chars.
	}
	
   $nama_mnt_bckbone = clean($nama_mnt_bckbone1);  
   $key_mnt_bckbone=$_POST['key_mnt_bckbone'];
   //echo ($username_sinden); die();
   $pic_sinden=$_POST['pic_mnt_bckbone'];
   $kabel_ins_bckbn=$_POST['kabel_ins_bckbn'];
   $pic = strtok($pic_sinden, '#');
    $status = substr($pic_sinden, strpos($pic_sinden, '#')+1);
	
   $pic_sinden2=$_POST['pic_mnt_bckbone2'];
   $pic2 = strtok($pic_sinden2, '#');
    $status2 = substr($pic_sinden2, strpos($pic_sinden2, '#')+1);
   $lain_lain_bckbn=$_POST['lain_lain_bckbn'];
   $status_ins_bkbn=$_POST['status_ins_bkbn'];
   $get_lokasi = $_POST ['lokasi_kapten_mntn_bckbn'];   
    $latitude = strtok($get_lokasi, '#');
    $longitude = substr($get_lokasi, strpos($get_lokasi, '#')+1);
   
  
  if (!$koneksi) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "UPDATE tbl_backbone SET pic='$pic', pic2='$pic2', status='$status', status2='$status2',kabel1='$kabel_ins_bckbn',status_wo='$status_ins_bkbn',ket='$get_lokasi', latitude='$latitude',longitude='$longitude',lain_lain_backbone
='$lain_lain_bckbn', tanggal_instalasi= CURRENT_TIMESTAMP(), tgl_solved= CURRENT_TIMESTAMP() WHERE key_backbone='$key_mnt_bckbone';";


if (mysqli_query($koneksi, $sql)) {
  echo "1";
  mysqli_query($koneksi,"UPDATE keluhan SET status = 'Solved', tanggal_handle = CURRENT_TIMESTAMP(), keterangan_solving = '$lain_lainodp' WHERE id_user = '$id_odp' and `status` = 'Visit'");
} else {
  echo "101";
}

   

mysqli_close($koneksi);
  
  ?>	



